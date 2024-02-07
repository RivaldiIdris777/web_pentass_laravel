<?php

namespace App\Http\Controllers;

use App\Models\Qrcode;
use Carbon\Carbon;
use Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class QrcodeController extends Controller
{
    public $module_title;

    public $module_name;


    public function __construct()
    {
        // Page Title
        $this->module_title = 'Qrcode-Data';

        $this->module_name = 'Qrcode';
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {        
        $module_name = $this->module_name;

        $module_title = $this->module_title;

        return view('pages.admin.qrcode.index' ,compact('module_name','module_title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $module_name = $this->module_name;

        $module_title = $this->module_title;

        return view('pages.admin.qrcode.create',compact('module_name','module_title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pesan = [
            // 'gambar' => 'Gambar Wajib diupload',
            'nama_qrcode.required' => 'Nama Qrcode Wajib diisi',
            'url.required' => 'Url Wajib Diisi',
        ];

        $validator = Validator::make($request->all(), [            
            'nama_qrcode'   => 'required',
            'url'   => 'required',
        ], $pesan);

        //check if validation fails        

        $image = \QrCode::format('png')                 
                 ->size(300)
                 ->generate($request->url);
        $output_file = '/qr-code/img-' . time() . '.jpg';
        Storage::disk('public')->put($output_file, $image);

        $qrcode = Qrcode::create([
            'gambar'        => $output_file,
            'nama_qrcode'   => $request->nama_qrcode,
            'url'           => $request->url
        ]);

        if($qrcode) {
            Alert::success('Success', 'Qrcode berhasil dibuat');        
            return redirect()->route('qrcode.index');            
        }else{
            Alert::warning('Failed', 'Qrcode gagal dibuat');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
