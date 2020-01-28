<?php

use App\Clases\conexion;
use App\Clases\Auxiliares\Constantes;

session()->put("actPage", Constantes::INDEX);
?>
@extends('../general/base')

@section('titulo')
Inicio
@endsection

@section('contenido')
HOLA PISTACHEROS
@endsection