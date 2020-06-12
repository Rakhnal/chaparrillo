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

        $i = 0;
        
        foreach ($comentarios as $co){
            
            $canti = DB::table('publicaciones')
                    ->join('respuestas','publicaciones.id_item','=','respuestas.id_respuesta')
                    ->where('publicaciones.tipo','=',4)
                    ->where('respuestas.id_tema','=',$co->id_item)
                    ->count('publicaciones.id_item');
            
            $cant[$i] = $canti;
            
            $ultFech = DB::table('publicaciones')
                    ->join('respuestas','publicaciones.id_item','=','respuestas.id_respuesta')
                    ->where('publicaciones.tipo','=',4)
                    ->where('respuestas.id_tema','=',$co->id_item)
                    ->max('publicaciones.fecha_subida');
            
            if($cant[$i] == 0){
                $ultFech = 0;
            }
            
            $ultFecha[$i] = $ultFech;
            
            $i++;
        }
        
                
        $datos = [
            'coment' => $comentarios,
            'cant' => $cant,
            'ultco' => $ultFecha
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
        
        return redirect('verForo');
        
    }
    
    public function borrarComentarioTema(Request $req){
        
        $id_coment = $req->get('id_itemb');
        
        $respuesta = DB::table('respuestas')
            ->where('respuestas.id_respuesta','=',$id_coment)
            ->delete();
        
        $publi = Publicacion::find($id_coment);
        
        $publi->delete();
        
        return redirect('verForo');
    }
    
    public function borrarTema(Request $req){
        $id_tema = $req->get('borrar');
        
        $coments = DB::table('respuestas')
                ->where('respuestas.id_tema','=',$id_tema)
                ->delete();
        
        $publi = Publicacion::find($id_tema);
        
        $publi->delete();

        
        return redirect('foro');
        
    }
}
