<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public $module_title;

    public $module_name;

    function __construct()
    {
        $this->module_title = 'Role-Data';

        $this->module_name = 'Roles';

        $this->middleware('permission:lihat-data')->only('index', 'show');
        $this->middleware('permission:tambah-data')->only('create', 'store');
        $this->middleware('permission:edit-data')->only('edit', 'update');
        $this->middleware('permission:hapus-data')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $module_name = $this->module_name;

        $module_title = $this->module_title;

        $roles = Role::all();
        return view('pages.admin.role.index', compact('roles', 'module_name','module_title'));        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.role.create', compact('module_name','module_title'));        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
