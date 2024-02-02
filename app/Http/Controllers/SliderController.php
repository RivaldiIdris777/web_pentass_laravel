<?php

namespace App\Http\Controllers;

use App\Models\Slider;
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

class SliderController extends Controller
{
    public $module_title;

    public $module_name;


    public function __construct()
    {
        // Page Title
        $this->module_title = 'Slider-Data';

        $this->module_name = 'Slider';
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $module_name = $this->module_name;

        $module_title = $this->module_title;

        return view('pages.admin.slider.index', compact('module_name','module_title'));   
    }

    public function getSlider(Request $request)
    {
        if ($request->ajax()) {
            $data = Slider::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn(['width' => '50px'])                
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" id="btn-edit-slider" data-id="'.$row->id.'" class="edit btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a> <a href="javascript:void(0)" data-id="'.$row->id.'" class="delete btn btn-danger btn-sm" id="deleteSlider"><i class="fa fa-trash"></i></a>';
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pesan = [
            'gambar.required' => 'Gambar Wajib diupload',
            'nama_slider.required' => 'Nama Slider Wajib diisi',
        ];

        $validator = Validator::make($request->all(), [
            'gambar'     => 'required',
            'nama_slider'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status'  => 422,
                'success' => false,
                'message' => 'Data gagal ditambahkan cek kembali pengisian!',
            ]);
        }        
        
        $file = $request->file('gambar');
		$fileName = time() . '.' . $file->getClientOriginalExtension();
		$file->storeAs('public/slider', $fileName);        

        $slider = Slider::create([
            'gambar'     => $fileName, 
            'nama_slider' => $request->nama_slider,
            'slug'       => Str::slug($request->nama_slider),            
            'keterangan'     => $request->keterangan,             
        ]);
        
        if ($slider) {
            return response()->json([
                'status'  => 200,
                'success' => true,
                'message' => 'Data Slider berhasil ditambahkan',
                'data'    => $slider  
            ]); 
        }
        return redirect()->route('slider.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //return response
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Slider',
            'data'    => $slider  
        ]); 
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
    public function update(Request $request, Slider $slider)
    {        
        $validator = Validator::make($request->all(), [
            'gambar'     => 'required',
            'nama_slider'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status'  => 422,
                'success' => false,
                'message' => 'Data gagal diubah cek kembali pengisian!',
            ]);
        }        

        $slider = Slider::findOrFail($request->slider_id);        

        if($request->file('gambar') == "") {

            $slider->update([
                'nama_lomba' => $request->nama_slider,
                'slug'       => Str::slug($request->nama_slider),                
                'keterangan' => $request->keterangan,                 
            ]);
        } else {
            //hapus old image
            Storage::disk('local')->delete('public/slider/'.$slider->gambar);

            $file = $request->file('gambar');
			$fileName = time() . '.' . $file->getClientOriginalExtension();
			$file->storeAs('public/slider', $fileName);

            $slider->update([
                'gambar'         => $fileName, 
                'nama_slider'    => $request->nama_slider,
                'slug'           => Str::slug($request->nama_slider),                
                'keterangan'     => $request->keterangan,                 
            ]);
        }

        //return response
        return response()->json([
            'status'  => 200,
            'success' => true,
            'message' => 'Data Berhasil Diudapte!',
            'data'    => $slider 
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
		$slider = Slider::find($id);
		if (Storage::delete('public/slider/' . $slider->gambar)) {
			Slider::destroy($id);
		}

        return response()->json([
            'status'  => 200,
            'success' => true,
            'message' => 'Data Berhasil Dihapus!',
            'data'    => $slider 
        ]);
    }
}
