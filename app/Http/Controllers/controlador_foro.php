<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publicacion;
use App\Clases\Auxiliares\Constantes;
use Illuminate\Support\Facades\DB;
use App\Respuesta;

class controlador_foro extends Controller
{
    public function listarForo() {
        
        $comentarios = Publicacion::where('tipo', '=', 3)->paginate(8);

                

        $categorias = DB::table('categorias')
                ->join('asignar_categorias', 'asignar_categorias.id_categoria', '=', 'categorias.id_categoria')
                ->join('publicaciones', 'publicaciones.id_item', '=', 'asignar_categorias.id_item')
                ->select('categorias.nombre as categoria');

        $datos = [
            'coment' => $comentarios,
            'categorias' => $categorias
        ];

        return view(Constantes::FORO, $datos);
    }
    
    public function crearTemaForo(Request $req){
        
        $user = session()->get('userObj');
        $tema = new Publicacion();
        
        $tema->nombre = $req->get('tema');
        $tema->descripcion = $req->get('descripcion-t');
        $tema->id_user = intval($user->id_user);
        $tema->likes = 0;
        $tema->views = 0;
        $tema->editado = 0;
        $tema->fecha_subida = date('Y-m-d');
        $tema->tipo = Constantes::TEMA;
        
        $tema->save();
        
        
        return redirect('foro');
        
    }

    
    public function verTemaForo(Request $req){
        $id_foro = $req->get('ver');
        
        session()->put('id_actual',$id_foro);
        
        $tema = DB::table('publicaciones')
                ->where('publicaciones.id_item','=',$id_foro)
                ->first();
        
        $comentarios = DB::table('publicaciones')
                ->join('respuestas','publicaciones.id_item','=','respuestas.id_respuesta')
                ->join('usuarios','publicaciones.id_user','=','usuarios.id_user')
                ->where('publicaciones.tipo','=', 4)
                ->where('respuestas.id_tema','=', $id_foro)
                ->get();
                

        $respuestas = DB::table('publicaciones')
                ->join('respuestas','publicaciones.id_item','=','respuestas.id_origen')
                ->where('respuestas.id_origen','!=',$id_foro)
                ->where('respuestas.id_tema','=',$id_foro)
                ->get();
        
        $datos = [
          'coment' => $comentarios,
            'tema' => $tema,
            'respu' =>$respuestas
        ];
        
        return view(Constantes::VERFORO,$datos);
    }
    
    public function crearComentarioTema(Request $req){
        
        $user = session()->get('userObj');
        $tema1 = session()->get('tema');
        
        $coment = new Publicacion();
        $respuesta = new Respuesta();
        
        $coment->nombre = "comentario";
        $coment->descripcion = $req->get('comentario');
        $coment->id_user = intval($user->id_user);
        $coment->likes = 0;
        $coment->views = 0;
        $coment->editado = 0;
        $coment->fecha_subida = date('Y-m-d');
        $coment->tipo = Constantes::COMENTARIO;
        
        $coment->save();
        
        $respuesta->id_origen = $tema1;
        $respuesta->id_respuesta = $coment->id_item;
        $respuesta->id_tema = $tema1;
        
        $respuesta->save();
        
        $id_actual = session()->get('id_actual');
        
        $tema = DB::table('publicaciones')
                ->where('publicaciones.id_item','=',$id_actual)
                ->first();
        
        $comentarios = DB::table('publicaciones')
                ->join('respuestas','publicaciones.id_item','=','respuestas.id_respuesta')
                ->join('usuarios','publicaciones.id_user','=','usuarios.id_user')
                ->where('publicaciones.tipo','=', 4)
                ->where('respuestas.id_tema','=', $id_actual)
                ->get();
                

        $respuestas = DB::table('publicaciones')
                ->join('respuestas','publicaciones.id_item','=','respuestas.id_origen')
                ->where('respuestas.id_origen','!=',$id_actual)
                ->where('respuestas.id_tema','=',$id_actual)
                ->get();
        
        $datos = [
          'coment' => $comentarios,
            'tema' => $tema,
            'respu' =>$respuestas
        ];
        
        session()->forget('id_actual');
        
        return view(Constantes::VERFORO,$datos);
        
    }
}
