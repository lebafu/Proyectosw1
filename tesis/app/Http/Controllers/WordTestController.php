<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Tesis;
use App\Comision;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
 use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Contracts\Auth\Guard;
use iio\libmergepdf\Merger;
use iio\libmergepdf\Pages;
use PDFMerger;
use DB;
use Auth;
use Closure;
use Session;
class WordTestController extends Controller
{
    //

 
    	public function msword(Request $request)
    {
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();
        $text = $section->addText($request->get('emp_name'));
        $text = $section->addText($request->get('emp_salary'));
        $text = $section->addText($request->get('emp_age'),array('name'=>'Arial','size' => 20,'bold' => true));
          
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save('Appdividend.docx');
        return response()->download(public_path('phpflow.docx'));
    }
}
