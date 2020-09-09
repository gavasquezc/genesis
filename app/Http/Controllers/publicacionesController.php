<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use App\publications;
use App\comments;
use DB;
use Mail;
use Illuminate\Mail\Mailable;

class publicacionesController extends Controller{

    public function inicio(){

        $public = publications::where('pu_status', 1)->get();

    	return view('publicaciones' , compact('public'));
    } 


public function publicacionSave (Request $request){ 

	 if($request->ajax()){

	 	$titulo = $request->titulo;
        $descripcion = $request->descripcion;

        if ($request->imgUpload1 !="") {

        	$file = $request->file('imgUpload1');
            $name = $file->getClientOriginalName();

        $request->file('imgUpload1')->move('imagenes', $name);

        $publication = new publications;
        $publication->pu_desc = $descripcion;
        $publication->pu_status =1;
        $publication->pu_id_user = 1;
        $publication->pu_titulo = $titulo;
        $publication->pu_foto = $name;

        $publication->save();
                  
        return response()->json([
            "mensaje" => 'Registro Creado'
        ]);

      }
  }

}


public function publicacionDatos (Request $request, $id_pu){

    if($request->ajax()){

        $publicaciones = DB::table('publications')
            ->where('id_publications',$id_pu)
            ->get();

            return response()->json($publicaciones);

    }

}

public function updatePub(Request $request){

    if($request->ajax()){

        $titulo2 = $request->titulo2;
        $descripcion2 = $request->descripcion2;
        $id = $request->id;

        if ($request->imgUpload2 !="") {

            $file = $request->file('imgUpload2');
            $name = $file->getClientOriginalName();

            $request->file('imgUpload2')->move('imagenes', $name);


            $publication = DB::table('publications')
                            ->where('id_publications', $id)
                            ->update(['pu_desc' => $descripcion2,
                                      'pu_titulo' => $titulo2,
                                      'pu_foto' => $name
                            ]);


            if ($publication == true) {
                return response()->json([
                    "mensaje" => 'Registro Creado'
                ]);
            }

        }

  //  return redirect()->back();    

}
}



public function listarPublicacion(Request $request, $id){

    $publication = DB::table('publications')
            ->join('comments', 'publications.id_publications', '=', 'comments.co_id_publicacion')
            ->where('id_publications', $id)
            ->get();

        return view('home' , compact('publication'));


}



public function listaInicio(){

    $publicacion = publications::all();

    $publicar = publications::orderByDesc('id_publications')->take(1)->get();

  /*  $publicar = DB::table('publications')
            ->join('comments', 'publications.id_publications', '=', 'comments.co_id_publicacion')
            ->orderByDesc('id_publications')
            ->take(1)
            ->get();
*/


        return view('home' , compact('publicacion','publicar'));

}

public function saveComentario (Request $data){

        $comentario = $data->comentario;
        $id_pu = $data->id_pu;

        $data = ['comentario' => $comentario];

        $comment = new comments;
        $comment->co_desc = $comentario;
        $comment->co_status =1;
        $comment->co_id_publicacion = $id_pu;

        $comment->save();

        $alerta = $comment->save();

        if ($alerta == true) {

            $fromEmail= 'gavasquezc@vive.gob.ve';
            $fromName= 'Ichirin No Hana';

            Mail::send('correo', $data, function($message) use ($fromName,$fromEmail){ 

                $message->to($fromEmail)->subject('Email de contacto');

            });

                $mensaje= "se envio el mensaje" ;

                return response()->json([
                    "mensaje" => 'Mensaje enviado'
                ]);



        }




}






















}


