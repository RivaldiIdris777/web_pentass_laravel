<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Lomba;
use Carbon\Carbon;
use Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PesertaExport;



class PesertaController extends Controller
{
    public $module_title;

    public $module_name;


    public function __construct()
    {
        // Page Title
        $this->module_title = 'Peserta-Data';

        $this->module_name = 'Peserta';
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $module_name = $this->module_name;

        $module_title = $this->module_title;

        return view('pages.admin.peserta.index', compact('module_name','module_title'));   
    }

    public function getPeserta(Request $request)
    {
        if ($request->ajax()) {
            $data = Peserta::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn(['width' => '50px'])                
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'. route('peserta.edit', $row->id).'" id="btn-edit-peserta" data-id="'.$row->id.'" class="edit btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a> <a href="javascript:void(0)" data-id="'.$row->id.'" id="deletePeserta" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                    return $actionBtn;
                })                
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $module_name = $this->module_name;

        $module_title = $this->module_title;

        $lomba = Lomba::orderBy('id','asc')->get();
        return view('pages.admin.peserta.create', compact('module_name','module_title','lomba'));   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pesan = [
            'lomba.required' => 'Lomba Wajib diisi',
            'email.required' => 'Email Wajib diisi',
            'nama.required' => 'Nama Wajib diisi',
            'no_wa.required' => 'No Whatsapp Wajib diisi',
            'asal_sekolah' => 'Asal Sekolah Wajib diisi',            
            'url.required' => 'Alamat URL Wajib diisi',
            'url.url' => 'Wajib halaman masukkan format url',
            'file_ktp_suket.required' => 'Wajib  Diisi',
            'file_ktp_suket.mimes' => 'File harus format jpg,jpeg,png',
            'file_ktp_suket.max' => 'Maksimal ukuran file harus 5MB',
            'setuju_syarat_ketentuan.required' => 'Syarat dan ketentuan harus diisi',            

        ];

        //validate form
        $this->validate($request, [
            'email'     => 'required',
            'lomba'     => 'required',
            'nama'     => 'required',
            'no_wa'   => 'required',
            'asal_sekolah'   => 'required',
            'file_ktp_suket' => 'required|max:5120',
            'url'   => 'required|url',
            'setuju_syarat_ketentuan'   => 'required',            
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
                'email'         => $request->email,
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
                return redirect()->route('peserta.index');                
            }else {
                return redirect()->back();
            }

        } catch (Exception $e) {
            $message = $e->getMessage();
            Alert::warning('Failed with error', $message);
            return redirect()->back();
        }         
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $module_name = $this->module_name;

        $module_title = $this->module_title;

        $lomba = Lomba::orderBy('id','asc')->get();

        $peserta = Peserta::find($id);

        return view('pages.admin.peserta.edit', compact('module_name','module_title','lomba','peserta'));   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pesan = [
            'lomba.required' => 'Lomba Wajib diisi',
            'email.required' => 'Email Wajib diisi',
            'nama.required' => 'Nama Wajib diisi',
            'no_wa.required' => 'No Whatsapp Wajib diisi',
            'asal_sekolah' => 'Asal Sekolah Wajib diisi',            
            'url.required' => 'Alamat URL Wajib diisi',
            'url.url' => 'Wajib halaman masukkan format url',
            'file_ktp_suket.required' => 'Wajib  Diisi',
            'file_ktp_suket.mimes' => 'File harus format jpg,jpeg,png',
            'file_ktp_suket.max' => 'Maksimal ukuran file harus 5MB',
            'setuju_syarat_ketentuan.required' => 'Syarat dan ketentuan harus diisi',            

        ];

        //validate form
        $this->validate($request, [
            'email'     => 'required',
            'lomba'     => 'required',
            'nama'     => 'required',
            'no_wa'   => 'required',
            'asal_sekolah'   => 'required',
            'file_ktp_suket' => 'required|max:5120',
            'url'   => 'required|url',            
        ], $pesan);        

        try {
            if($request->file('file_ktp_suket') == "") {
                //edit 
                $peserta = Peserta::where('id', $id)->update([            
                    'email'         => $request->email,
                    'lomba'         => $request->lomba,
                    'no_peserta'    => $no_peserta,
                    'slug'          => Str::slug($request->nama),
                    'nama'          => $request->nama,
                    'no_wa'         => $request->no_wa,
                    'asal_sekolah'  => $request->asal_sekolah,
                    'url'           => $request->url,
                    'keterangan' => $request->keterangan,                                
                ]);
            
            }else {
                $no_peserta = time().'PSERTA'.$request->no_wa.rand(4,9999);        

                $file = $request->file('file_ktp_suket');
                $fileName = $request->no_wa.'.'. $file->getClientOriginalExtension();
                $file->storeAs('public/filektpsuket', $fileName);            
                
                //edit 
                $peserta = Peserta::where('id', $id)->update([
                    'email'         => $request->email,
                    'lomba'         => $request->lomba,
                    'no_peserta'    => $no_peserta,
                    'slug'          => Str::slug($request->nama),
                    'nama'          => $request->nama,
                    'no_wa'         => $request->no_wa,
                    'asal_sekolah'  => $request->asal_sekolah,
                    'url'           => $request->url,
                    'keterangan' => $request->keterangan,                
                    'file_ktp_suket' => $fileName,
                ]);
                
            }      
            
            if($peserta){
                //redirect to index                
                Alert::success('Success', 'Peserta berhasil diupdate');        
                return redirect()->route('peserta.index');                
            }else {
                return redirect()->back();
            }

        } catch (Exception $e) {
            $message = $e->getMessage();
            Alert::warning('Failed with error', $message);
            return redirect()->back();
        }         
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {        		
        $id = $request->id;
		$peserta = Peserta::find($id);
		if (Storage::delete('public/filektpsuket/' . $peserta->file_ktp_suket)) {
			Peserta::destroy($id);
		}

        return response()->json([
            'status'  => 200,
            'success' => true,
            'message' => 'Data Berhasil Dihapus!',
            'data'    => $peserta 
        ]);
		        
    }

    public function export_excel()
    {
        return Excel::download(new PesertaExport, 'peserta_excel.xlsx');
    }
}
