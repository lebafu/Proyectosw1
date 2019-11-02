<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Tesis;
use App\Comision;
use Carbon\Carbon;
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

    	//El punto sirve para concatener string en php
    	$fecha=Carbon::parse(now());
    	$año=$fecha->year;
    	//dd($año);
    	$mes_dia_inicio="01-01";
    	$mes_dia_final="11-30";
    	$fecha_inicio=$año."-" . $mes_dia_inicio;
    	$fecha_final=$año."-". $mes_dia_final;
        return view('createdocument',compact('fecha_inicio','fecha_final'));
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
				//$table1->addCell()->addText("Fecha de presentacion"); // agregamos la columna 4
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

					//$table1->addCell()->addText($tes->fecha_presentacion_tesis); 
					}
				}
        		$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        		$objWriter->save('Lista_Tesis.docx');
        		return response()->download(public_path('Lista_Tesis.docx'));
        	}
       }

       public function create_formulario_inscripcion($id)
    {

      $phpWord = new \PhpOffice\PhpWord\PhpWord();
      $phpWord->setDefaultFontName('Times New Roman');
       $phpWord->addParagraphStyle('parrafo_titulo', array('align' => 'center'));
       $section= $phpWord->addSection();
       $tesis=Tesis::find($id);
       $comision=Comision::find($id);
       $alumno1=DB::table('users')->where('name','=',$tesis->nombre_completo)->get();
       $alumno2=DB::table('users')->where('name','=',$tesis->nombre_completo2)->get();
       foreach($alumno1 as $al) $email1=$al->email;
       if($alumno2!=null){
       foreach($alumno2 as $al) $email2=$al->email;
        }
       $phpWord = new \PhpOffice\PhpWord\PhpWord();
       $section= $phpWord->addSection();
  
       $nombre1="NOMBRE COMPLETO:". $tesis->nombre_completo;
       $rut1_año_ingreso1="RUT:". $tesis->rut."            AÑO INGRESO:". $tesis->ano_ingreso;
       if($alumno2!=null){
       $nombre2="NOMBRE COMPLETO:". $tesis->nombre_completo2;
       $rut2_año_ingreso2="RUT:". $tesis->rut2."            AÑO INGRESO:". $tesis->ano_ingreso2;
        }
       $carrera="CARRERA:".$tesis->carrera;
       $email1_telefono1="EMAIL:  ". $email1. "            TELÉFONO: ". $tesis->telefono1;
       $nombre_tesis="NOMBRE TESIS/MEMORIA: ".$tesis->nombre_tesis;
       $descripcion="BREVE DESCRIPCIÓN DEL TEMA: ". $tesis->descripcion;
       $objetivos="OBJETIVOS DEL TEMA: ".$tesis->objetivos;
       $contribucion="CONTRIBUCIÓN ESPERADA: ". $tesis->contribucion;
      //primer array de fuente segundo array es de parrafo centrado, izquierda derecha justificado.
       //size es para el tamaño bold=>true es para que la letra sea negrita, y align, para centrar ese texto.
       $section->addText('UNIVERSIDAD CATÓLICA DEL MAULE',array("size"=>11,"bold"=>true), array('align'=>'center')); // Agregamos un titulo al documento con 
       $section->addText("FACULTAD DE CIENCIAS DE LA INGENIERÍA",array("size"=>11,"bold"=>true),array('align'=>'center'));
       $section->addText("ESCUELA DE INGENIERÍA CIVIL INFORMÁTICA",array("size"=>11,"bold"=>true),array('align'=>'center'));
       $section->addTextBreak();
       $section->addText("FORMULARIO DE INSCRIPCIÓN DE TEMAS DE TESIS Y  ",array("size"=>11,"bold"=>true),array('align'=>'center')); 
       $section->addText("MEMORÍAS DE TÍTULO",array("size"=>11,"bold"=>true),array('align'=>'center')); 
       $section->addTextBreak(); 
       $section->addText("(A COMPLETAR POR EL ALUMNO)",array("size"=>11,"bold"=>true),array('align'=>'center'));
       $section->addTextBreak();
       $section->addTextBreak();
       $section->addText($nombre1 ,array("size"=>11),array("align"=>"left"));
       $section->addTextBreak();
       $section->addText($rut1_año_ingreso1,array("size"=>11,"bold"=>false),array("align"=>"left"));
       $section->addTextBreak();
       $section->addText($carrera,array("size"=>11,"bold"=>false),array("align"=>"left"));
       $section->addTextBreak();
       $section->addText($email1_telefono1,array("size"=>11,"bold"=>false),array("align"=>"left"));
       $section->addTextBreak();
       $section->addText($nombre_tesis,array("size"=>11,"bold"=>false),array("align"=>"left"));
       $section->addTextBreak();
       $section->addText($descripcion,array("size"=>11,"bold"=>false),array("align"=>"left"));
       $section->addText($objetivos,array("size"=>11,"bold"=>false),array("align"=>"left"));
       $section->addText($contribucion,array("size"=>11,"bold"=>false),array("align"=>"left"));
       $section->addTextBreak();
       $section->addTextBreak();
       $section->addTextBreak();
       $section->addTextBreak();
       $section->addText("FIRMA ALUMNO",array("size"=>11,"bold"=>true),array("align"=>"center"));
       $section->addText("FECHA:...../...../.....",array("size"=>11,"bold"=>false),array("align"=>"left"));
       $section->addPageBreak();
       if($tesis->nombre_completo2!=null)
       {
      $section->addText('UNIVERSIDAD CATÓLICA DEL MAULE',array("size"=>11,"bold"=>true), array('align'=>'center')); // Agregamos un titulo al documento con 
       $section->addText("FACULTAD DE CIENCIAS DE LA INGENIERÍA",array("size"=>11,"bold"=>true),array('align'=>'center'));
       $section->addText("ESCUELA DE INGENIERÍA CIVIL INFORMÁTICA",array("size"=>11,"bold"=>true),array('align'=>'center'));
       $section->addTextBreak();
       $section->addText("FORMULARIO DE INSCRIPCIÓN DE TEMAS DE TESIS Y  ",array("size"=>11,"bold"=>true),array('align'=>'center')); 
       $section->addText("MEMORÍAS DE TÍTULO",array("size"=>11,"bold"=>true),array('align'=>'center')); 
       $section->addTextBreak(); 
       $section->addText("(A COMPLETAR POR EL ALUMNO)",array("size"=>11,"bold"=>true),array('align'=>'center'));
       $section->addTextBreak();
       $section->addTextBreak();
       $section->addText($nombre2 ,array("size"=>11),array("align"=>"left"));
       $section->addTextBreak();
       $section->addText($rut2_año_ingreso2,array("size"=>11,"bold"=>false),array("align"=>"left"));
       $section->addTextBreak();
       $section->addText($carrera,array("size"=>11,"bold"=>false),array("align"=>"left"));
       $section->addTextBreak();
       $section->addText("EMAIL: ". $email2. "             TELÉFONO: ". $tesis->telefono2,array("size"=>11,"bold"=>false),array("align"=>"left"));
       $section->addTextBreak();
       $section->addText($nombre_tesis,array("size"=>11,"bold"=>false),array("align"=>"left"));
       $section->addTextBreak();
       $section->addText($descripcion,array("size"=>11,"bold"=>false),array("align"=>"left"));
       $section->addText($objetivos,array("size"=>11,"bold"=>false),array("align"=>"left"));
       $section->addText($contribucion,array("size"=>11,"bold"=>false),array("align"=>"left"));
       $section->addTextBreak();
       $section->addTextBreak();
       $section->addTextBreak();
       $section->addTextBreak();
       $section->addText("FIRMA ALUMNO",array("size"=>11,"bold"=>true),array("align"=>"center"));
       $section->addText("FECHA:...../...../.....",array("size"=>11,"bold"=>true),array("align"=>"left"));
       $section->addPageBreak();
       }
       
        $section->addText("(A COMPLETAR POR PROFESOR GUIA)",array("size"=>11,"bold"=>true),array("align"=>"center"));
        $section->addTextBreak();
        $section->addTextBreak();
        $section->addTextBreak();
        $section->addText("PROFESOR GUÍA: $tesis->profesor_guia",array("size"=>11,"bold"=>false),array("align"=>"left"));
        $section->addTextBreak();
        $section->addText("COMISION SUGERIDA POR PROFESOR GUIA:",array("size"=>11,"bold"=>false),array("align"=>"left"));
        $section->addText("1-$comision->profesor1_comision",array("size"=>11,"bold"=>false),array("align"=>"left"));
        $section->addText("2-$comision->profesor2_comision",array("size"=>11,"bold"=>false),array("align"=>"left"));
        $section->addText("3-$comision->profesor3_comision",array("size"=>11,"bold"=>false),array("align"=>"left"));
        $section->addText("(EXTERNO(S) U OTRO(S) SI ES REQUERIDO. INDICAR CORREO E INSTITUCIÓN EN CASO DE SER EXTERNO):",array("size"=>11,"bold"=>false),array("align"=>"center"));
        if($comision->profesor1_externo!=null){
        $section->addText("4-$comision->profesor1_externo",array("size"=>11,"bold"=>false,"align"=>"left"));
        $section->addText("CORREO:$comision->correo_profe1_externo",array("size"=>11,"bold"=>false,"align"=>"left"));
        $section->addText("INSTITUCIÓN:$comision->institucion1",array("size"=>11,"bold"=>false,"align"=>"center"));
        $section->addText("DIRECCIÓN POSTAL:$comision->codigo_postal1",array("size"=>11,"bold"=>false,"align"=>"left"));
        }
        if($comision->profe2_externo!=null){
        $section->addText("5-$comision->profe2_externo",array("size"=>11,"bold"=>false,"align"=>"left"));
        $section->addText("CORREO:$comision->correo_profe2_externo",array("size"=>11,"bold"=>false,"align"=>"left"));
        $section->addText("INSTITUCIÓN:$comision->institucion2",array("size"=>11,"bold"=>false,"align"=>"left"));
        $section->addText("DIRECCIÓN POSTAL:$comision->codigo_postal2",array("size"=>11,"bold"=>false,"align"=>"left"));
        }
        if($comision->profesor1_externo!=null and $comision->profe2_externo!=null){
        $section->addTextBreak();
        $section->addTextBreak();
        }
      $section->addText("FIRMA PROFESOR GUIA                           FIRMA DIRECTOR DE ESCUELA ",array("size"=>11,"bold"=>true,"align"=>"center"));
         $section->addText("FECHA: …......../ …...... / …............-                    FECHA: …......../ …...... / …............-    ",array("size"=>11,"bold"=>false),array("align"=>"left"));
        $section->addText("**********************************************************************************",array("size"=>11,"bold"=>true));
        $section->addText("A COMPLETAR POR DIRECTOR DEL DEPARTAMENTO)",array("size"=>11,"bold"=>true),array("align"=>"center"));
         $section->addTextBreak();
        $section->addText("OBSERVACIONES DEL DIRECTOR DEL DEPARTAMENTO:",array("size"=>11,"bold"=>false),array("align"=>"left"));
        if($comision->profesor1_externo!=null or $comision->profe2_externo!=null){
        $section->addTextBreak();
        $section->addTextBreak();
        $section->addTextBreak();
        }
        if($comision->profesor1_externo==null and $comision->profe2_externo==null){
        $section->addTextBreak();
        $section->addTextBreak();
        $section->addTextBreak();
      }
        $section->addText("FIRMA DIRECTOR DEL DEPARTAMENTO",array("size"=>11,"bold"=>true),array("align"=>"right"));
        $section->addText("FECHA: …......../ …...... / …............-",array("size"=>11,"bold"=>false),array("align"=>"right"));
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save('Formulario_Inscripcion.docx');
        return response()->download(public_path('Formulario_Inscripcion.docx'));
    }
    }
    //la funcion addText igualmente imprime los valores dentro de las comillas como el objeto que se encuentra allí despues de $.
    //Al generar el word puede que algunas fechas de presentaciones sean extrañas, pero esto es debido a que fueron ingresadas antes de que tuviesen la restriccion por hora y dia  en el calendario.
