<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Clases\conexion;
use App\Clases\Auxiliares\Constantes;
use Illuminate\Support\Facades\DB;

class controlador_noticias extends Controller {
    //************************************************************************//
    //DES11: Página para administrar noticias
    //************************************************************************//
    /**
     * Esta función lista todos las noticias de la base de datos.
     * @return type
     */
    public function listarnoticias() {
        $noticias = DB::table('noticias')
                ->join('publicaciones','noticias.id_noticia','=','publicaciones.id_item')
                ->join('usuarios','usuarios.id_user','=','publicaciones.id_user')
                ->join('categorias','noticias.tipo','=','categorias.id_categoria')
                ->join('imagenes','imagenes.id_item','=','publicaciones.id_item')
                ->select('noticias.id_noticia','noticias.destacada','imagenes.imagen','usuarios.nombre as usuario','usuarios.apellidos','usuarios.email', 'categorias.nombre as categoria', 'noticias.enlace','publicaciones.descripcion','publicaciones.nombre as titulo','publicaciones.fecha_subida')
                ->orderby('publicaciones.fecha_subida','desc')
                ->paginate(8);
        $destacadas = DB::table('noticias')
                ->join('publicaciones','noticias.id_noticia','=','publicaciones.id_item')
                ->join('categorias','noticias.tipo','=','categorias.id_categoria')
                ->select('noticias.id_noticia','categorias.nombre as categoria','publicaciones.nombre as titulo','publicaciones.fecha_subida')
                ->orderby('publicaciones.fecha_subida','desc')
                ->where('noticias.destacada','=','1')
                ->paginate(10);
        return view(Constantes::AD_NOTICIAS, ['noticias' => $noticias,'destacadas'=>$destacadas]);
    }

}
