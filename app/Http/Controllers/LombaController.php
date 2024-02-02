<?php

namespace App\Http\Controllers;

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




class LombaController extends Controller
{
    public $module_title;

    public $module_name;


    public function __construct()
    {
        // Page Title
        $this->module_title = 'Lomba-Data';

        $this->module_name = 'Lomba';
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $module_name = $this->module_name;

        $module_title = $this->module_title;

        return view('pages.admin.lomba.index', compact('module_name','module_title'));   
    }

    public function getLomba(Request $request)
    {
        if ($request->ajax()) {
            $data = Lomba::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn(['width' => '50px'])                
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" id="btn-edit-lomba" data-id="'.$row->id.'" class="edit btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a> <a href="javascript:void(0)" data-id="'.$row->id.'" class="delete btn btn-danger btn-sm" id="deleteLomba"><i class="fa fa-trash"></i></a>';
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
        $validator = Validator::make($request->all(), [
            'gambar'     => 'required',
            'nama_lomba'   => 'required',
            'tanggal_pendaftaran' => 'required',
            'tanggal_perlombaan' => 'required',
            'pic'                => 'required',
        ]);  
        
        if ($validator->fails()) {
            return response()->json([
                'status'  => 422,
                'success' => false,
                'message' => 'Data gagal ditambahkan cek kembali pengisian!',
            ]);
        }        

        $file = $request->file('gambar');
		$fileName = time() . '.' . $file->getClientOriginalExtension();
		$file->storeAs('public/lomba', $fileName);

        $lomba = Lomba::create([
            'gambar'     => $fileName, 
            'nama_lomba' => $request->nama_lomba,
            'slug'       => Str::slug($request->nama_lomba),
            'tanggal_pendaftaran'     => $request->tanggal_pendaftaran, 
            'tanggal_perlombaan'     => $request->tanggal_perlombaan, 
            'keterangan'     => $request->keterangan, 
            'pic'     => $request->pic, 
        ]);

        if ($lomba) {
            return response()->json([
                'status'  => 200,
                'success' => true,
                'message' => 'Data Lomba berhasil ditambahkan',
                'data'    => $lomba  
            ]); 
        }
        
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Lomba $lomba)
    {
        //return response
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Lomba',
            'data'    => $lomba  
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
    public function update(Request $request, Lomba $lomba)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [            
            'nama_lomba'   => 'required',
            'tanggal_pendaftaran' => 'required',
            'tanggal_perlombaan' => 'required',
            'pic'                => 'required',
        ]);

        $lomba = Lomba::findOrFail($request->lomba_id);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if($request->file('gambar') == "") {

            $lomba->update([
                'nama_lomba' => $request->nama_lomba,
                'slug'       => Str::slug($request->nama_lomba),
                'tanggal_pendaftaran'     => $request->tanggal_pendaftaran, 
                'tanggal_perlombaan'     => $request->tanggal_perlombaan, 
                'keterangan'     => $request->keterangan, 
                'pic'     => $request->pic, 
            ]);
        } else {
            //hapus old image
            Storage::disk('local')->delete('public/lomba/'.$lomba->gambar);

            $image = $request->file('gambar');
            $image->storeAs('public/lomba', $image->hashName());

            $lomba->update([
                'gambar'     => $image->hashName(), 
                'nama_lomba' => $request->nama_lomba,
                'slug'       => Str::slug($request->nama_lomba),
                'tanggal_pendaftaran'     => $request->tanggal_pendaftaran, 
                'tanggal_perlombaan'     => $request->tanggal_perlombaan, 
                'keterangan'     => $request->keterangan, 
                'pic'     => $request->pic, 
            ]);
        }

        //return response
        return response()->json([
            'status'  => 200,
            'success' => true,
            'message' => 'Data Berhasil Diudapte!',
            'data'    => $lomba 
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {	
        $id = $request->id;
		$lomba = Lomba::find($id);
		if (Storage::delete('public/lomba/' . $lomba->gambar)) {
			Lomba::destroy($id);
		}

        return response()->json([
            'status'  => 200,
            'success' => true,
            'message' => 'Data Berhasil Dihapus!',
            'data'    => $lomba 
        ]);
    }
}
