<?php

namespace App\Http\Controllers;

use Alert;
use Illuminate\Http\Request;
use App\Models\Lomba;
use App\Models\Peserta;
use App\Models\Slider;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class HomeController extends Controller
{
    public function index()
    {
        $lomba = Lomba::orderBy('id','asc')->get();
        $slider = Slider::offset(0)->limit(1)->get();
        return view('pages.user.home.index', compact('lomba','slider'));
    }

    public function lomba()
    {
        $lomba = Lomba::orderBy('id','asc')->get();
        $slider = Slider::offset(0)->limit(1)->get();
        return view('pages.user.lomba.index', compact('lomba','slider'));
    }

    public function showdetailLomba() 
    {
        
    }

    public function lombadetail($id) 
    {
        //return response
        $lomba = Lomba::find($id);

        $data = [
          'nama_lomba' => $lomba->nama_lomba,
          'tanggal_pendaftaran' => tanggal_indonesia($lomba->tanggal_pendaftaran),
          'tanggal_perlombaan' => tanggal_indonesia($lomba->tanggal_perlombaan),
          'pic' => $lomba->pic
        ];
    
        return response()->json($data);
    }

    public function pendaftaranlomba()
    {
        $lomba = Lomba::orderBy('id','asc')->get();
        return view('pages.user.daftar.index', compact('lomba'));
    }

    public function storedaftarpeserta(Request $request)
    {
        $pesan = [
            'lomba.required' => 'Lomba Wajib diisi',
            'nama.required' => 'Nama Wajib diisi',
            'no_wa.required' => 'No Whatsapp Wajib diisi',
            'asal_sekolah' => 'Asal Sekolah Wajib diisi',            
            'url.required' => 'Alamat URL Wajib diisi',
            'url.url' => 'Wajib halaman masukkan format url',
            'file_ktp_suket.required' => 'Wajib  Diisi',
            'file_ktp_suket.mimes' => 'File harus format jpg,jpeg,png',
            'file_ktp_suket.max' => 'Maksimal ukuran file harus 5MB',
            'setuju_syarat_ketentuan.required' => 'Syarat dan ketentuan harus diisi',
            'g-recaptcha-response.required' => 'Captcha harus diisi',                        

        ];

        //validate form
        $this->validate($request, [
            'lomba'     => 'required',
            'nama'     => 'required',
            'no_wa'   => 'required',
            'asal_sekolah'   => 'required',
            'file_ktp_suket' => 'required|max:5120',
            'url'   => 'required|url',
            'setuju_syarat_ketentuan'   => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ], $pesan);        

        try {
            $no_peserta = time().'PSERTA'.$request->no_wa.rand(4,9999);        

            $file = $request->file('file_ktp_suket');
            $fileName = $request->no_wa.'.'. $file->getClientOriginalExtension();
            $file->storeAs('public/filektpsuket', $fileName);

            if($request->setuju_syarat_ketentuan == ''){
                $request->setuju_syarat_ketentuan == 'tidak_setuju';
            }else{
                $request->setuju_syarat_ketentuan == 'setuju';
            }
            
            //create post
            $peserta = Peserta::create([            
                'lomba'         => $request->lomba,
                'no_peserta'    => $no_peserta,
                'slug'          => Str::slug($request->nama),
                'nama'          => $request->nama,
                'no_wa'         => $request->no_wa,
                'asal_sekolah'  => $request->asal_sekolah,
                'url'           => $request->url,
                'keterangan' => $request->keterangan,
                'setuju_syarat_ketentuan' => $request->setuju_syarat_ketentuan,
                'file_ktp_suket' => $fileName,
            ]);

            if($peserta){
                //redirect to index
                Alert::success('Success', 'Peserta berhasil didaftarkan');        
                return redirect()->route('pendaftaran.detail', $peserta->id);
            }else {
                return redirect()->back();
            }

        } catch (Exception $e) {
            $message = $e->getMessage();
            Alert::warning('Failed with error', $message);
            return redirect()->back();
        }            
    }

    public function detailpendaftaran($id){
        //get post by ID
        $peserta = Peserta::where('id',$id)->first();
        $filedownload = Storage::download('public/filektpsuket/'.$peserta->file_ktp_suket);

        if($peserta == '') {
            return redirect()->back();
        }

        //render view with post
        return view('pages.user.daftar.detaildaftar', compact('peserta','filedownload'));
    }

    public function pencarianpendaftar() {
        return view('pages.user.caripeserta.index');
    }

    public function caripendaftar(Request $request){
        $pesan = [            
            'no_wa.required' => 'No Whatsapp Wajib diisi',            
            'g-recaptcha-response.required' => 'Captcha harus diisi',            

        ];

        //validate form
        $this->validate($request, [            
            'no_wa'   => 'required',            
            'g-recaptcha-response' => 'required|captcha',
        ], $pesan);        

        $cari = Peserta::where('no_wa', 'like', '%'.$request->no_wa.'%')->get();

        return view('pages.user.caripeserta.listpendaftar', compact('cari'));

    }

    public function viewpanduanpdf(){
        return view('pages.user.panduan.index');
    }
}