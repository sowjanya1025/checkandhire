<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use App\Models\User;
use App\Models\Test;


class TestController extends Controller
{
    public function exportIntoExcel()
    {        
        return Excel::download(new UserExport, 'EmployeeList.xlsx');
    }
    public function exportIntoCSV()
    {        
        return Excel::download(new UserExport, 'EmployeeList.csv');
    }
    public function ExportIntoPdf(){
        $data = Test::get();
        $pdf = PDF::loadView('web.pdf.index', compact('data'));
        return $pdf->download('invoice.pdf');
    }
}
