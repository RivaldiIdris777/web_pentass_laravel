<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\PesertaExport;
use Maatwebsite\Excel\Facades\Excel;

class PesertaController extends Controller
{
    public $module_title;

    public $module_name;


    public function __construct()
    {
        // Page Title
        $this->module_title = 'Peserta Data';

        $this->module_name = 'Peserta';
    }

    public function index()
    {            
        $module_name = $this->module_name;

        $module_title = $this->module_title;

        return view('pages.admin.peserta.index', compact('module_name','module_title'));
    }

    public function export_excel()
	{
		return Excel::download(new PesertaExport, 'data_peserta.xlsx');
	}
}
