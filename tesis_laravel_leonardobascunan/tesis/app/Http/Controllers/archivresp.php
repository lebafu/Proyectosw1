<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Tesis;
use App\Comision;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Redirect;
use DB;
use PDF;
class PdfController extends Controller
{
    public function generarpdf(Request $request)
    {
        
        
        $inicial =$request->get('rango_in');
        $fin =$request->get('rango_fn');
        
        $cant_us =DB::table('users')
        ->join ('info_personal', 'users.id', '=' , 'info_personal.id')
        ->join('info_egreso','users.id','=','info_egreso.id')
        ->whereDate('info_egreso.fecha_examen','>=',$inicial)
        ->whereDate('info_egreso.fecha_examen','<=',$fin)
        ->count();
        $fecha_actual=new \DateTime();
        //$fecha_actual->format('d-m-Y H:i:s');
        $usuarios =DB::table('users')
        ->join ('info_personal', 'users.id', '=' , 'info_personal.id')
        ->join('info_egreso','users.id','=','info_egreso.id')
        ->whereDate('info_egreso.fecha_examen','>=',$inicial)
        ->whereDate('info_egreso.fecha_examen','<=',$fin)
        ->select('users.id as id',
        'info_personal.rut as rut',
        'info_personal.nombres as nombres',
        'info_personal.apellidos as apellidos',
        'info_egreso.titulo as titulo',
        'info_egreso.año_egreso as año_egreso',
        'info_egreso.fecha_examen as fecha_examen')
        ->get();
        if($cant_us>0){
            $pdf =PDF::loadView('vistapdf',['usuarios'=>$usuarios,'cant_us'=>$cant_us,'fecha_actual'=>$fecha_actual]);
            //return $fecha_actual->format('Y-m-d');
            return $pdf->download('archivo.pdf');
            // return $pdf->stream(); para ver el pdf
        }else{
            return Redirect::to('usuarios')->with('success','No se encontraron alumnos en este rango de tiempo');
        }
        
    }
}



/*public function exportar_pdf_tesis_empresa()
    {
        $tes_empresas=DB::table('tesis')->orderby('fecha_peticion','desc')->where('estado1','=',4)->where('estado2','=',1)->where('tipo_vinculacion','=','Empresa')->select('tesis.id','tesis.nombre_completo','tesis.profesor_guia','tesis.nombre_tesis','tesis.tipo_vinculacion');
         $pdf=PDF::loadView('tesis.tesis_empresa',compact('tes_empresas'));
         return $pdf->download('tesis_empresa.pdf');
    }*/

    /*Route::get('pdf',function(){
    $tes_empresas=DB::table('tesis')->orderby('fecha_peticion','desc')->where('estado1','=',4)->where('estado2','=',1)->where('tipo_vinculacion','=','Empresa')->select('tesis.id','tesis.nombre_completo','tesis.profesor_guia','tesis.nombre_tesis','tesis.tipo_vinculacion')->paginate(7);
    $pdf= PDF::loadview('tesis.tesis_empresa', compact('tes_empresas'));
    return $pdf->download('tesis_empresas.pdf');
});*/

    /*public function exportPdf()
    {
        $users=User::get();
        $pdf =PDF::loadView('pdf.users',compact('users'));
        
        return $pdf->download('user-list.pdf');
    }*/

    //Route::get('user-list-pdf','UsersController@exportPdf')->name('users.pdf');