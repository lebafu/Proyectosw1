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

class DocumentController extends Controller
{
    //

    public function create()
    {
        return view('createdocument');
    }

    public function store(Request $request)
    {
    	//dd($request);
    	$fecha_inicio=$request->fecha_inicio;
    	//dd($fecha_inicio);
    	$fecha_final=$request->fecha_fin;
    	//dd($fecha_final);
    	$id=Auth::id();
    	//Si el usuario no esta logueado va una vista sinpermiso y un mensaje
    	if($id==null)
    	{
    		return view('tesis.sinpermiso');
    	}else{
    		//Si existe id entonces se pregunta si el usuario es del tipo profesor y se procede a obtener los datos de la bd
    		$profesor=User::find($id);
    		//dd($profesor);
    		 if($profesor->tipo_usuario==2)
    		 {
    		 	//Se obtienen tesis en las que profesor es miembro comision y profesor guia.
    			$tesis=DB::table('tesis')->join('comision','tesis.id','=','comision.id')->where('tesis.estado1',4)->where('tesis.estado2',1)->whereBetween('tesis.fecha_inscripcion',[$fecha_inicio,$fecha_final])->where('tesis.profesor_guia','=',$profesor->name)->orwhere('comision.profesor1_comision','=',$profesor->name)->orwhere('comision.profesor2_comision','=',$profesor->name)->orwhere('comision.profesor3_comision','=',$profesor->name)->get();
    			//dd($tesis);
    		 }
    		 //dd($tesis);
    		 //se crea archivo word
        		$phpWord = new \PhpOffice\PhpWord\PhpWord();
        		$section= $phpWord->addSection();
				$section->addText("Tesis Profesor",array("size"=>22,"bold"=>true,"align"=>"center")); // Agregamos un titulo al documento con tamaño 22 y en negritas
				$styleTable = array('borderSize' => 6, 'borderColor' => '888888', 'cellMargin' => 40); // el borde de la tabla de 6px, color de borde = #888 , ...
				$styleFirstRow = array('borderBottomColor' => '0000FF', 'bgColor' => 'FFFFFF');
				$phpWord->addTableStyle('table1', $styleTable,$styleFirstRow);
				$table1 = $section->addTable("table1"); // creamos la tabla
				$table1->addRow(); // agregamos una fila a la tabla
				$table1->addCell()->addText("Tipo trabajo"); // agregamos la columna 1
				$table1->addCell()->addText("Nombre de Tesis"); // agregamos la columna 2
				$table1->addCell()->addText("Estado de desarrollo"); // agregamos la columna 3
				$table1->addCell()->addText("Observaciones"); // agregamos la columna 4
				$table1->addCell()->addText("Fecha de inscripcion"); // agregamos la columna 4
				foreach($tesis as $tes)
				{
					//si la fecha de inscripcion no existe, por que no esta dentro de los rangos de la consulta, simplemente no se añaden filas ni nada al documento.
					if($tes->fecha_inscripcion!=null){
					$table1->addRow();
					$table1->addCell()->addText($tes->tipo); 
					$table1->addCell()->addText($tes->nombre_tesis); 
					if($tes->fecha_presentacion_tesis==null)
					{
						$table1->addCell()->addText("En desarrollo"); 
					}else{
						$table1->addCell()->addText("Concluida"); 
					}
					if($tes->profesor_guia==$profesor->name)
					{
						$table1->addCell()->addText("Profesor Guia"); 
					}else{
						if(($tes->profesor1_comision==$profesor->name and $tes->coguia==null) or ($tes->profesor2_comision==$profesor->name or $tes->profesor3_comision==$profesor->name))
						{
						$table1->addCell()->addText("Revisor"); 
						}
						else{
							if($tes->profesor1_comision==$profesor->name and $tes->coguia==1)
							{
							 $table1->addCell()->addText("Coguia"); 
							}
						}
					}

					$table1->addCell()->addText($tes->fecha_inscripcion); 
					}
				}
        		$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        		$objWriter->save('Appdividend.docx');
        		return response()->download(public_path('Appdividend.docx'));
        	}
       }
    }
