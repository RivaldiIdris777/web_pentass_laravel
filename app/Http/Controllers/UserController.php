<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{

    public $module_title;

    public $module_name;


    public function __construct()
    {
        // Page Title
        $this->module_title = 'User-Data';

        $this->module_name = 'Users';
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {            
        $module_name = $this->module_name;

        $module_title = $this->module_title;

        return view('pages.admin.user.index', compact('module_name','module_title'));
    }

    public function getUser(Request $request)
    {
        if ($request->ajax()) {
            $data = User::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn(['width' => '50px'])
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'. route('users.edit', $row->id).'" class="edit btn btn-success btn-sm">Edit</a> <a href="'. route('users.destroy', $row->id).'" class="delete btn btn-danger btn-sm">Delete</a>';
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
        $module_name = 'New |';

        $module_title = $this->module_title;

        return view('pages.admin.user.create', compact('module_name','module_title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required', 
        ]); 

        if ($request->confirm_password != $request->password) {
            Alert::warning('Failed', 'Confirm Password not match');
            return redirect()->back();        
        }
        
        $currentMail = DB::table('users')->where('email',$request->email)->get();

        if($currentMail) {
            Alert::warning('Failed', 'Email Sudah Terdaftar');
            return redirect()->back();
        }

        $verified = Carbon::now();

        $simpan = DB::table('users')->insert([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'email_verified_at' => $verified
        ]);

        if ($simpan) {
            Alert::success('Success', 'User Added');
        } else {
            Alert::warning('Failed', 'Check Input Form');
        }
        return redirect()->route('users.index');
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
        dd('Masuk');
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
        $data = User::where('id', $id)->get();

        $data[0]->delete();

        if($data) {
            Alert::success('Success', 'User Dihapus');            
        }

        return redirect()->route('users.index');
    }
}
