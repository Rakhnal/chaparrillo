<?php

use App\Clases\conexion;
use App\Clases\Auxiliares\Constantes;
?>
@extends('../general/base')
@section('titulo')
Inicio
@endsection
@section('contenido')
<link rel="stylesheet" type="text/css" href="css/editUsu/editarusuario.css" />
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ URL::asset('scripts/general/editar_usuario.js') }}"></script>
<link href="css/editUsu/cropper.min.css" rel="stylesheet" type="text/css"/>
<div class="col-12 mt-1">
    <div class="row col-12 form_base m-auto">
        <div class="row col-12">
            @csrf
            <div class="col-12">
                <a class="kicker  kicker_live width_full uppercase color_gray_ultra_dark  " href="https://elpais.com/noticias/ncov/">
                    <span class="block text_indent">Última hora</span>
                </a>
                <h2 class="headline color_gray_ultra_dark font_secondary width_full  headline_md ">
                    <a href="/sociedad/2020-03-09/ultimas-noticias-del-coronavirus-en-directo.html">Últimas noticias del coronavirus, en directo</a></h2>
                <div class="col desktop_12 tablet_8 mobile_4">
                    <div class="bylineuppercase color_gray_ultra_dark margin_bottom width_full">
                        <span class=" false"><a href="https://elpais.com/autor/el_pais/a/" class="author ">El País</a></span>
                        <span>
                            <span class="separator">|</span>
                            <span class="capitalize">Madrid</span>
                        </span></div><p class="description  color_gray_medium block width_full false false">Los muertos y contagios en Madrid se duplican La Comunidad de Madrid eleva a 16 los fallecidos y 436 los contagios en la región | Al menos 907 infectados y 25 muertos en España | Las Bolsas europeas y asiáticas se desploman | Pedro Sánchez preside la reunión de la comisión de seguimiento en Sanidad | Cierran tres colegios en Euskadi</p>
                    <div class="width_full margin_top">
                        <div class="related_story  flex margin_bottom color_gray_ultra_dark ">
                            <div>
                                <span class="kicker   uppercase">
                                    <span>ESPECIAL</span>
                                </span>
                                <div class="middle_dot  background_gray_ultra_dark border_round inline_block"></div> 
                                <a href="https://elpais.com/sociedad/crisis-del-coronavirus/" class="related_story_headline">La crisis del coronavirus</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row col-12 form_base m-auto mt-5">
        <div class="row col-12">
            @csrf
            <div class="col-12">
                <a class="kicker  kicker_live width_full uppercase color_gray_ultra_dark  " href="https://elpais.com/noticias/ncov/">
                    <span class="block text_indent">Última hora</span>
                </a>
                <h2 class="headline color_gray_ultra_dark font_secondary width_full  headline_md ">
                    <a href="/sociedad/2020-03-09/ultimas-noticias-del-coronavirus-en-directo.html">Últimas noticias del coronavirus, en directo</a></h2>
                <div class="col desktop_12 tablet_8 mobile_4">
                    <div class="bylineuppercase color_gray_ultra_dark margin_bottom width_full">
                        <span class=" false"><a href="https://elpais.com/autor/el_pais/a/" class="author ">El País</a></span>
                        <span>
                            <span class="separator">|</span>
                            <span class="capitalize">Madrid</span>
                        </span>
                    </div>
                    <p class="description  color_gray_medium block width_full false false">Los muertos y contagios en Madrid se duplican La Comunidad de Madrid eleva a 16 los fallecidos y 436 los contagios en la región | Al menos 907 infectados y 25 muertos en España | Las Bolsas europeas y asiáticas se desploman | Pedro Sánchez preside la reunión de la comisión de seguimiento en Sanidad | Cierran tres colegios en Euskadi</p>
                    <div class="width_full margin_top">
                        <div class="related_story  flex margin_bottom color_gray_ultra_dark ">
                            <div>
                                <span class="kicker   uppercase">
                                    <span>ESPECIAL</span>
                                </span>
                                <div class="middle_dot  background_gray_ultra_dark border_round inline_block"></div> 
                                <a href="https://elpais.com/sociedad/crisis-del-coronavirus/" class="related_story_headline">La crisis del coronavirus</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row col-12 form_base m-auto mt-5 mb-5">
        <div class="row col-12">
            @csrf
            <div class="col-12">
                <a class="kicker  kicker_live width_full uppercase color_gray_ultra_dark  " href="https://elpais.com/noticias/ncov/">
                    <span class="block text_indent">Última hora</span>
                </a>
                <h2 class="headline color_gray_ultra_dark font_secondary width_full  headline_md ">
                    <a href="/sociedad/2020-03-09/ultimas-noticias-del-coronavirus-en-directo.html">Últimas noticias del coronavirus, en directo</a></h2>
                <div class="col desktop_12 tablet_8 mobile_4">
                    <div class="bylineuppercase color_gray_ultra_dark margin_bottom width_full">
                        <span class=" false"><a href="https://elpais.com/autor/el_pais/a/" class="author ">El País</a></span>
                        <span>
                            <span class="separator">|</span>
                            <span class="capitalize">Madrid</span>
                        </span>
                    </div>
                    <p class="description  color_gray_medium block width_full false false">Los muertos y contagios en Madrid se duplican La Comunidad de Madrid eleva a 16 los fallecidos y 436 los contagios en la región | Al menos 907 infectados y 25 muertos en España | Las Bolsas europeas y asiáticas se desploman | Pedro Sánchez preside la reunión de la comisión de seguimiento en Sanidad | Cierran tres colegios en Euskadi</p>
                    <div class="width_full margin_top">
                        <div class="related_story  flex margin_bottom color_gray_ultra_dark ">
                            <div>
                                <span class="kicker   uppercase">
                                    <span>ESPECIAL</span>
                                </span>
                                <div class="middle_dot  background_gray_ultra_dark border_round inline_block"></div> 
                                <a href="https://elpais.com/sociedad/crisis-del-coronavirus/" class="related_story_headline">La crisis del coronavirus</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
