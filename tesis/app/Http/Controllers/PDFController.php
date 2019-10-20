<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{

    public function htmlPDF58()
    {
    
        return view('htmlPDF');
        
    }
 
    public function generatePDF58()
    {
        $data = ['title' => 'Laravel 5.8 HTML to PDF'];
        $pdf = PDF::loadView('htmlPDF', $data);
        return $pdf->download('demonutslaravel.pdf');
    }

}
