<?php $__env->startSection('content'); ?>


<section class="banner__section banner__opacidad">

  <div id="banner__logo" class="text-white text-center">
    <div class="banner__logo--visible text-right mb-5">
        <img class="logo_size" src="img/logo1.png" alt="...">
    </div> 
    <div class="pr-2 pl-2 pr-md-4 pl-md-4 mb-5">
        <p class="muni__titulo1">Municipalidad Distrital de</p>
        <p class="muni__titulo2">Estique</p>
    </div>
    <div class="banner__logo--visible text-left mb-5">
        <img class="logo_size" src="img/logo20231.png" alt="...">
    </div>
</div>

<div id="carouselExampleIndicators" class="carousel slide banner__section" data-ride="carousel" style="position: relative;">
    <ol class="carousel-indicators">
        @foreach($sliders as $key => $slider)
            @if($key == 0)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" class="active"></li>
            @else
                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}"></li>
            @endif
        @endforeach

<!--         <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="7"></li> -->
    </ol>

    <div class="carousel-inner banner__caja">
        @foreach($sliders as $iu => $slider)
            @if($iu == 0)
                <div class="carousel-item active box2">
                    <img src="{{ $slider->img_slide }}" alt="...">
                    <div class="carousel-caption d-none d-md-block text-left" style="padding-bottom: 100px;">
                        <p><b>{{ $slider->titulo_slide }}</b> <br></p>
                    </div>
                </div>
            @else
                <div class="carousel-item box2">
                    <img src="{{ $slider->img_slide }}" alt="...">
                    <div class="carousel-caption d-none d-md-block text-left" style="padding-bottom: 100px;">
                        <p><b>{{ $slider->titulo_slide }}</b> <br></p>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
  </a>
</div>

</div> 
</section>


<section class="contenedor">
    <div class="contenedor__seccion">
        <div class="row naviconos"> 

         <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 pb-3">
            <div class="card card-body btn_ovrly">
                <a href="/convocatoria">
                    <h1><i class="fas fa-bullhorn"></i></h1>
                    <p>Convocatorias</p>
                </a>
            </div>
        </div>
        <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 pb-3">
            <div class="card card-body btn_ovrly">
                <a href="#" target="_blank">
                    <h1><i class="fas fa-clipboard"></i></h1>
                    <p>Mesa de Partes</p>
                </a>
            </div>
        </div>
        <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 pb-3">
            <div class="card card-body btn_ovrly">
                <a href="/normatividad/resoluciones-de-alcaldia">
                    <h1><i class="fab fa-leanpub"></i></h1>
                    <p>Normatividad</p>
                </a>
            </div>
        </div>
        <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 pb-3">
            <div class="card card-body btn_ovrly">
                <a href="{{ route('pages.modernization.operating-license') }}"> 
                    <h1><i class="fas fa-building"></i></h1>
                    <p >Licencias</p>
                </a>
            </div>
        </div>
        <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 pb-3">
            <div class="card card-body btn_ovrly">
                <a href="{{ route('pages.modernization.municipal-taxes') }}"> 
                    <h1><i class="fas fa-handshake"></i></h1>
                    <p >Tributos</p>
                </a>
            </div>
        </div>
        <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 pb-3">
            <div class="card card-body btn_ovrly">
                <a href="#"  target="_blank"> 
                    <h1><i class="fa fa-book"></i></h1>
                    <p >Reclamos</p>
                </a>
            </div>
        </div>
    </div>



    <div class="row pt-4">
        <div class="col-lg-12 px-3">
            <h3 class="section__titulo">Noticias</h3>
            <div class="row">
                @foreach($news as $item)
                <div class="col-lg-4 col-md-6 col-sm-12 pb-4">
                    <div class="card d-flex justify-content-end">
                        <div class="caja">
                            <div class="box img-hover-zoom">
                                <a href="/noticias/{{ $item->slug }}"><img src="{{ $item->image }}" alt="Sin Imagen"></a>
                            </div>
                        </div>
                        <div class="p-2 noticia__container">
                            <div class="row-12 text-right text-white">
                                <h6>{{ \Date::parse($item->date)->format('l\, d \d\e\ F \d\e\l\ Y') }} </h6>
                            </div>
                            <div class="row-12 text-center">
                                <a class="text-white" href="/noticias/{{ $item->slug }}"><h5>{{ $item->title }}</h5></a>
                            </div> 
                        </div>      
                    </div>     
                </div> 
                @endforeach

            </div>   
            <br>                               
            <div class="see-more centered">
                <a href="/noticias" class="theme-btn btn-style-three text-uppercase"><span class="btn-title">Ver más Noticias</span></a>
            </div>
        </div>
    </div>



    <div class="row pt-4">
        <div class="col-12 col-lg-8 px-3">
            <h3 class="section__titulo">Redes Sociales</h3>
            <div class="row">
                <div class="col-12 col-md-6 text-center pb-4 ">
                    <div class="card sombrax">
                        <div class="socialtwitter">
                            <i class="fab fa-twitter"></i> Twitter
                        </div> 
                        <a class="twitter-timeline" data-width="100%" data-height="400" href="https://twitter.com/CiudadNuevaMuni">Tweets by MCiudadnueva</a> <script async src="../platform.twitter.com/widgets.js" charset="utf-8"></script>
                    </div>                 
                </div> 

                <div class="col-12 col-md-6 text-center pb-4">
                    <div class="card sombrax">
                        <div class="socialfb">
                            <i class="fab fa-facebook-f"></i> Facebook
                        </div>                                 
                        <div id="fb-root"></div>
                        <script async defer crossorigin="anonymous" src="../connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v11.0" nonce="UkbjlAKm"></script>

                        <div class="fb-page"  data-href="https://www.facebook.com/profile.php?id=100089636037765" data-tabs="timeline" data-width="" data-height="400" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/profile.php?id=100089636037765" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/profile.php?id=100089636037765">Municipalidad Distrital de Estique</a></blockquote></div>

                    </div>
                </div>  
            </div>
        </div>  
        <div class="col-12 col-lg-4 px-3 pb-4">
            <h3 class="section__titulo">Anuncios</h3>
            <div class="row">
                <div class="col-12 text-center pb-4">
                    <div class="card sombrax">
                        <div class="carousel-box">
                            <div id="carouselExampleIndicators2" class="carousel slide carousel-fade" data-ride="carousel">
                                @if(count($modals_to_show)) 

                                <div class="carousel-inner">                                          
                                    @foreach($modals_to_show as $ix => $modal_to_show)                                     
                                        <div class="carousel-item {{ $ix == 0 ? 'active' : '' }}">
                                            <a href="{{ $modal_to_show->enlace }}" target="_blank">
                                                <img class="d-block w-100" src="{{ $modal_to_show->imagen }}" alt="...">
                                            </a>
                                        </div>
                                    @endforeach
                            </div>

                            @endif 
                        </div>
                    </div>
                    <div class="anuncio__option">
                        <a href="#carouselExampleIndicators2" role="button" data-slide="prev">
                            <div class="anuncio__boton">
                                <span class="ctxt"  aria-hidden="true"><i class="fas fa-long-arrow-alt-left"></i></span>
                                <span class="sr-only">Previous</span>
                            </div>
                        </a>

                        <a href="#carouselExampleIndicators2" role="button" data-slide="next">
                            <div class="anuncio__boton">
                                <span class="ctxt" aria-hidden="true"><i class="fas fa-long-arrow-alt-right"></i></span>
                                <span class="sr-only">Next</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div> 
        </div>
    </div>  
</div>  



<div class="row pt-4">
    <div class="col-12 pb-2">
        <script src="../apis.google.com/js/platform.js"></script>
        <div class="g-ytsubscribe" data-channelid="UCPAGvuGP5mFVtlyfVWbg2jw" data-layout="full" data-count="hidden"></div>
    </div>
    <br>


</div>



<div class="row pt-4">
    <div class="col-lg-12">
        <h3 class="section__titulo">Obras</h3>
        <div class="row">
            
            <div class="col-lg-4 col-md-4 col-sm-12 pb-4">
                @if($works_categories[0])
                <div class="card d-flex justify-content-end">
                    <div class="caja">

                        <div style="width:100%">
                            <div class="card__categoria">
                                Ejecutadas
                            </div> 
                        </div>  

                        @if($works_categories[0]['one_works'])
                        <div class="box caja__imagen">
                          <a href="#"><img src="{{ $works_categories[0]['one_works']['foto'] }}" alt="Sin Imagen"></a>
                      </div>
                    </div>

                    <div class="p-2 noticia__container">
                        <div class="row-12 text-right text-white">
                        <h6>{{ \Date::parse($works_categories[0]['one_works']['fechaini'])->format('l\, d \d\e\ F \d\e\l\ Y') }}</h6>
                        </div>
                        <div class="row-12 text-center">
                            <a class="text-white" href="#"><h5{{ $works_categories[0]['one_works']['actividad'] }}</h5></a>
                        </div> 
                    </div> 
                    @endif 
                </div> 
                @endif   
            </div>             
        
        
        
            <div class="col-lg-4 col-md-4 col-sm-12 pb-4">
                @if($works_categories[1])
                <div class="card d-flex justify-content-end">
                    <div class="caja">

                        <div style="width:100%">
                            <div class="card__categoria">
                                En ejecución
                            </div> 
                        </div>  

                        @if($works_categories[1]['one_works'])
                        <div class="box caja__imagen">
                          <a href="#"><img src="{{ $works_categories[1]['one_works']['foto'] }}" alt="Sin Imagen"></a>
                      </div>
                    </div>

                    <div class="p-2 noticia__container">
                        <div class="row-12 text-right text-white">
                        <h6>{{ \Date::parse($works_categories[1]['one_works']['fechaini'])->format('l\, d \d\e\ F \d\e\l\ Y') }}</h6>
                        </div>
                        <div class="row-12 text-center">
                            <a class="text-white" href="#"><h5{{ $works_categories[1]['one_works']['actividad'] }}</h5></a>
                        </div> 
                    </div> 
                    @endif 
                </div> 
                @endif
            </div>             
        
    </div> 
                <div class="col-lg-4 col-md-4 col-sm-12 pb-4">
                @if($works_categories[2])
                <div class="card d-flex justify-content-end">
                    <div class="caja">

                        <div style="width:100%">
                            <div class="card__categoria">
                                Por Ejecutar
                            </div> 
                        </div>  

                        @if($works_categories[2]['one_works'])
                        <div class="box caja__imagen">
                          <a href="#"><img src="{{ $works_categories[2]['one_works']['foto'] }}" alt="Sin Imagen"></a>
                      </div>
                    </div>

                    <div class="p-2 noticia__container">
                        <div class="row-12 text-right text-white">
                        <h6>{{ \Date::parse($works_categories[2]['one_works']['fechaini'])->format('l\, d \d\e\ F \d\e\l\ Y') }}</h6>
                        </div>
                        <div class="row-12 text-center">
                            <a class="text-white" href="#"><h5{{ $works_categories[2]['one_works']['actividad'] }}</h5></a>
                        </div> 
                    </div> 
                    @endif 
                </div> 
                 @endif
            </div>   
        </div>
    </div>                   

    <br>                               
    <div class="see-more centered">
        <a href="/obras" class="theme-btn btn-style-three text-uppercase"><span class="btn-title">Ver más Obras</span></a>
    </div>
</div>
</div>     



<div class="row pt-4">
    <div class="col col-lg-12">
        <h3 class="section__titulo">Últimos Documentos Emitidos</h3>
        <div class="row">
            <div class="col-sm-12 col-lg-4 col-md-6 pb-2">
                <div class="card sombrax">
                    <div class="nav-link tobra_e" style="background-color:#1f5acf">
                        <CENTER>ÚLTIMAS CONVOCATORIAS</CENTER> 
                    </div>
                    <div class="card-body">     

                        
                        <div class="overflow-auto"  style="height: 500px">
                            @foreach($calls as $call)
                            <div class="pb-1">
                                <b class="cbasic txtup">  {{ $call->referencia }}  </b>
                            </div>
                            <div class="texto__normatividad">
                                <i class="far fa-calendar-alt"></i>
                                <span>{{ \Date::parse($call->fecha)->format('l\, d \d\e\ F \d\e\l\ Y') }}</span> 
                            </div>
                            <div class="pb-2 texto__normatividad">
                                <p>{{ $call->unidad }}</p>
                            </div>
                            <div class="pb-3 text-center">
                                <a class="btn_e1 mr-1"  href="{{ $call->bases }}"  target="blank">
                                    <i class="far fa-copy"></i> Bases
                                </a> 

                                <a class="btn_e1 mr-1" href="{{ $call->aptos }}"  target="blank">
                                   <i class="far fa-address-book"></i> Aptos
                               </a>

                               <a class="btn_e1 mr-1" href="{{ $call->resultados }}"  target="blank">
                                  <i class="far fa-calendar-check"></i> Resultados
                              </a>
                          </div>
                          <hr class="pb-1">
                          @endforeach
                      </div>
                        
                  <br>

                  <div class="see-more centered">
                    <a href="/convocatoria" class="theme-btn btn-style-three text-uppercase"><span class="btn-title">Ver más Convocatorias</span></a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-12 col-lg-4 col-md-6 pb-2">
        <div class="card sombrax">
            <div class="nav-link tobra_p" style="background-color:#1f5acf">
               <CENTER>ÚLTIMAS NORMAS</CENTER> 
           </div>
           <div class="card-body">     
            <div class=" overflow-auto"  style="height: 500px">
                @foreach($resolutions as $resolution)                                    
                <div class="pb-2">
                    <b class="cbasic txtup"> {{ $resolution->numdoc }}</b>
                </div>
                <div class="conten-tab-detail">
                    <div class="pb-2 texto__normatividad">
                        <p>{{ $resolution->referenc }}</p>
                    </div>
                    <div class="pb-3 text-center">
                       @if($resolution->nomfile)
                       <a class="btn_e1" href="{{ $resolution->nomfile }}" target="blank" >

                        <i class="far fa-file-alt"></i> Documento
                    </a>@endif
                    </div>
                
                    <hr class="pb-1">
                </div>
                @endforeach
                <br>
            </div>
            <div class="see-more centered">
                <a href="/normatividad" class="theme-btn btn-style-three text-uppercase"><span class="btn-title">Ver más Normatividad</span></a>
            </div> 
        </div> 
    </div>
</div>

<div class="col-sm-12 col-lg-4 col-md-6 pb-2">
    <div class="card sombrax">
        <div class="nav-link tobra_pe" style="background-color:#1f5acf">
           <CENTER>Otros Documentos Importantes  </CENTER> 
       </div>
       <div class="card-body">     
        <div class="overflow-auto"  style="height: 500px">
            
            @foreach($last_documents as $document)
            @if(count($document['files']))
            <div class="pb-2">
                <b class="cbasic txtup"> {{ $document['title'] }}</b>
            </div>
            <div class="conten-tab-detail">
                <div class="pb-2 texto__normatividad">
                    <p>{{ $document['title'] }}</p> 
                </div>
                <div class="pb-3 text-center">
                    <a class="btn_e1" href="{{ $document['files'][0]['url'] }}" target="blank">
                        <i class="far fa-file-alt"></i> Documento
                    </a>
                </div>  
                <hr class="pb-1">
            </div>
            @endif
            @endforeach
        </div>
        <br>
        <div class="see-more centered">
            <a href="normatividad/otros-documentos" class="theme-btn btn-style-three text-uppercase"><span class="btn-title">Ver más Otros Documentos</span></a>
        </div> 
    </div>
</div>
</div>
</div>
</div>       
</div>    



<div class="row pt-4">
    <div class="col-12 col-sm-12 col-md-6 col-lg-7 col-xl-8 pb-5">
        <h3 class="section__titulo">Servicios Municipales</h3>
        <div class="row">
            @foreach($services as $service)
             <div class="col-6 col-md-4 col-xl-3 pb-2">
                <a href="/servicios-municipales/{{ $service['slug'] }}">
                    <div class="btnservicio" style="background-color: #8d50b3; border-color: #8d50b3;">
                        <div class="btnservicio_imagen">
                            <img style="height:100%;"  src="{{ $service['icon'] }}">
                        </div> 
                        <div class="btnservicio__texto" style="color: #8d50b3;">
                            <p><b>{{ $service['title'] }}</b></p>
                        </div>
                    </div>
                </a> 
            </div>
            @endforeach

    </div>
</div>

<div class="col-12 col-sm-12 col-md-6 col-lg-5 col-xl-4 pb-5">
    <h3 class="section__titulo">Documentos de Gestión</h3>
    <div class="card sombrax">
        <div class="nav-link tdocu" style="background-color:#1f5acf">
            <i class="fa fa-bolt"></i> DOCUMENTOS 
        </div>
        <div class="card-body">     
            <div class=" overflow-auto"  style="height: 440px;">

                @foreach($inst_documents as $document)
                <div class="col-12 col-sm-12 col-md-12 pb-2">
                    <a href="/docgestion/{{ $document['acronym'] }}" style="color:#57585A;">
                        <div class="col-12 btn_e2 pt-1 pb-1"><i class="fas fa-folder"></i> {{ $document['acronym'] }}</div>
                    </a>
                </div>
                @endforeach
                
            </div>
        </div>
    </div>
</div>  
</div>



<div class="row pt-4">
    <div class="col-12 col-sm-12 pb-5">
        <h3 class="section__titulo">Enlaces de interés</h3>
        <div class="carousel-box">
            <div class="owl-theme owl-carousel">

                <div class="item">
                    <a href="https://www.mim.org.pe/" target="_blank" class="image-box">
                        <figure class="image"><img src="img/links/mim-peru.jpg" alt=""></figure>
                    </a>
                </div>
                <div class="item">
                    <a href="http://www.drtpetacna.gob.pe/prg_os/" target="_blank" class="image-box">
                        <figure class="image"><img src="img/links/OselTacnaa.jpg" alt=""></figure>
                    </a>
                </div>
                <div class="item">
                    <a href="https://www.gob.pe/mef" target="_blank" class="image-box">
                        <figure class="image"><img src="img/links/mef-peru.jpg" alt=""></figure>
                    </a>
                </div>
                <div class="item">
                    <a href="https://www.gob.pe/cofopri" target="_blank" class="image-box">
                        <figure class="image"><img src="img/links/cofopri.jpg" alt=""></figure>
                    </a>
                </div>
                <div class="item">
                    <a href="https://www.osiptel.gob.pe/" target="_blank" class="image-box">
                        <figure class="image"><img src="img/links/osiptel.jpg" alt=""></figure>
                    </a>
                </div>
                <div class="item">
                    <a href="http://www.sunat.gob.pe/" target="_blank" class="image-box">
                        <figure class="image"><img src="img/links/sunat.jpg" alt=""></figure>
                    </a>
                </div>
                <div class="item">
                    <a href="https://www.gob.pe/apci" target="_blank" class="image-box">
                        <figure class="image"><img src="img/links/apci.jpg" alt=""></figure>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


</div>
</section>

@if($last_popup)
<div class="modal  fade modal-notice" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered  modal-md" role="document">
    <div class="modal-content border-0"  style="background-color: transparent;">
        <div class="carousel-box">
            <div id="carouselExampleIndicators3" class="carousel slide carousel-fade" data-ride="carousel">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #FFF;">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <a href="{{ $last_popup->enlace }}" target="_blank">
                            <img class="d-block w-100" src="{{ $last_popup->imagen }}" alt="...">
                        </a>
                    </div>

                </div>
                
            </div>
        </div>

    </div>
</div>
</div>
@endif



<!-- links -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('facebookRoot'); ?>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v8.0" nonce="crVYCqnk"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


