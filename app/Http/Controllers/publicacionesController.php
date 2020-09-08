<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use App\publications;
use DB;

class publicacionesController extends Controller
{
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

    return redirect()->back();    

}

}


















}


