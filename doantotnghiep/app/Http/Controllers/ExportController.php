<?php

namespace App\Http\Controllers;

use App\Exports\DangTins;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ExportController extends Controller
{

    public function export()
    {
        return Excel::download(new DangTins(),'dangtin.xlsx');
    }
}
