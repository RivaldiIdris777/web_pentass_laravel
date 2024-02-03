<?php

namespace App\Livewire;

use Alert;
use Illuminate\Support\Str;
use App\Models\Peserta as ModelsPeserta;
use App\Models\Lomba as ModelsLomba;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Js;
use Illuminate\Support\Facades\Storage;



class Peserta extends Component
{
    public $lomba_id;
    public $lomba;
    public $nama;
    public $no_wa;
    public $asal_sekolah;
    public $status;
    public $keterangan;    
    public $setuju_syarat_ketentuan;    
    public $url;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $katakunci;
    public $peserta_id;
    public $peserta_selected_id = [];
    public $updateData = false;
    

    public function render()
    {
        if ($this->katakunci != null) {
            $data = ModelsPeserta::with('ModelsLomba')->where('nama', 'like', '%' . $this->katakunci . '%')
            ->orWhere('no_wa', 'like', '%' . $this->katakunci . '%')
            ->orWhere('asal_sekolah', 'like', '%' . $this->katakunci . '%')
            ->orWhere('status', 'like', '%' . $this->katakunci . '%')
            ->orderBy('nama', 'asc')->paginate(8);
        } else {
            $data = ModelsPeserta::orderBy('nama', 'asc')->paginate(8);
            $lomba = ModelsLomba::orderBy('nama_lomba', 'asc')->get();
        }                
        return view('livewire.peserta', ['dataPeserta' => $data, 'dataLomba' => $lomba]);
    }

    public function store() 
    {        
        $pesan = [
            'lomba_id.required' => 'Lomba Id Wajib diisi',
            'nama.required' => 'Nama Wajib diisi',
            'no_wa.required' => 'No Whatsapp Wajib diisi',
            'asal_sekolah' => 'Asal Sekolah Wajib diisi',
            'keterangan' => 'Keterangan Wajib diisi',
            'setuju_syarat_ketentuan' => 'Syarat dan ketentuan harus diisi',
            'url.required' => 'Alamat URL Wajib diisi',
            'url.url' => 'Wajib halaman masukkan format url'
        ];

        $this->validate([
            'lomba_id' => 'required',
            'nama' => 'required',
            'no_wa' => 'required',
            'asal_sekolah' => 'required',
            'keterangan' => 'required',
            'setuju_syarat_ketentuan'   => 'required',
            'url'       => 'required|url'            
        ], $pesan);
        
        ModelsPeserta::create([
            'lomba_id' => $this->lomba_id,
            'nama'          => $this->nama,
            'slug'          => Str::slug($this->nama),
            'no_wa'         => $this->no_wa,            
            'asal_sekolah'  => $this->asal_sekolah,
            'status'        => 'calon_peserta',
            'keterangan'    => $this->keterangan,
            'setuju_syarat_ketentuan' => $request->setuju_syarat_ketentuan,
            'url'           => $this->url,
        ]);

        Alert::success('Success', 'User Added');        
        $this->clear();
        $this->js('window.location.reload()'); 
    }

    public function edit($id)
    {
        $data = ModelsPeserta::find($id);
        $this->lomba = $data->lomba;        
        $this->nama = $data->nama;
        $this->no_wa = $data->no_wa;
        $this->asal_sekolah = $data->asal_sekolah;
        $this->status = $data->status;
        $this->keterangan = $data->keterangan;
        $this->setuju_syarat_ketentuan = $data->setuju_syarat_ketentuan;
        $this->url = $data->url;

        $this->updateData = true;
        $this->peserta_id = $id;
    }

    public function update() {
        $pesan = [
            'lomba_id.required' => 'Lomba Id Wajib diisi',
            'nama.required' => 'Nama Wajib diisi',
            'no_wa.required' => 'No Whatsapp Wajib diisi',
            'asal_sekolah' => 'Asal Sekolah Wajib diisi',
            'keterangan' => 'Keterangan Wajib diisi',
            'setuju_syarat_ketentuan' => 'Syarat dan ketentuan harus diisi',
            'url'        => 'URL Wajib diisi'
        ];

        $this->validate([
            'lomba_id' => 'required',
            'nama' => 'required',
            'no_wa' => 'required',
            'asal_sekolah' => 'required',
            'keterangan' => 'required',
            'setuju_syarat_ketentuan.required' => 'Syarat dan ketentuan harus diisi',
            'url' => 'required',
        ], $pesan);
        
        $data = ModelsPeserta::find($this->peserta_id);
        $data->update([
            'lomba_id'          => $this->lomba_id,
            'nama'          => $this->nama,
            'slug'          => Str::slug($this->nama),
            'no_wa'         => $this->no_wa,            
            'asal_sekolah'  => $this->asal_sekolah,
            'status'        => 'calon_peserta',
            'keterangan'    => $this->keterangan,
            'setuju_syarat_ketentuan'    => $this->setuju_syarat_ketentuan,
            'url'           => $this->url,
        ]);
        
        $this->clear();
        $this->js('window.location.reload()'); 
    }

    public function delete() 
    {
        if($this->peserta_id !='') {
            $id = $this->peserta_id;

            $find = ModelsPeserta::find($id);

            Storage::delete('public/filektpsuket/'. $find->file_ktp_suket);

            // ModelsPeserta::find($id)->delete();

            $find->delete();
        }
        if (count($this->peserta_selected_id)) {
            for ($x = 0; $x < count($this->peserta_selected_id); $x++) {
                $find = ModelsPeserta::find($this->peserta_selected_id[$x]);
                Storage::delete('public/filektpsuket/'. $find->file_ktp_suket);
                ModelsPeserta::find($this->peserta_selected_id[$x])->delete();
            }
        }
        Alert::success('Success', 'Delete data');
        $this->clear();
    }

    public function delete_confirmation($id) 
    {
        if($id != ''){
            $this->peserta_id = $id;
        }
    }

    public function clear() 
    {
        $this->nama = '';
        $this->no_wa = '';
        $this->asal_sekolah = '';
        $this->status = '';
        $this->keterangan = '';
        $this->setuju_syarat_ketentuan = '';
        $this->url = '';

        $this->peserta_id = '';
        $this->peserta_selected_id = [];
    }    
}
