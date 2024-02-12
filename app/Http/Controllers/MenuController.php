<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
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
        
        $menus = Menu::all();
        return view('pages.admin.menu.index ', compact('module_name','module_title'));        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $module_name = $this->module_name;

        $module_title = $this->module_title;

        return view('pages.admin.menu.create', compact('module_name','module_title'));        
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
