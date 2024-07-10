<?php $__env->startSection('content'); ?>

<style type="text/css">
    .inner_column
        {
            position: relative;
            display: block;
            padding: 20px 20px 20px;
            border: 1px solid rgba(0, 0, 0, 0.05);
            border-top: none;
            box-shadow: 0px 0px 30px 0px rgb(0 0 0 / 7%);
        }

    .inner_column2{
        position: relative;
            display: block;
            padding: 20px 20px 20px;
            border: 1px solid rgba(0, 0, 0, 0.05);
            border-top: none;
            box-shadow: 0px 0px 30px 0px rgb(0 0 0 / 7%);

    }

    .inner_column3{
        position: relative;
            display: block;
            padding: 20px 20px 20px;
            border: 1px solid rgba(0, 0, 0, 0.05);
            border-top: none;
            box-shadow: 0px 0px 30px 0px rgb(0 0 0 / 7%);

    }
</style>

<section class="banner-section-two">
    <div class="banner-carousel-two owl-theme owl-carousel">
    </div>

    <div class="owl-carousel owl-theme">
        @foreach($sliders as $slider)
        <div class="item">
            <img class="w-100" src="{{ $slider->img_slide }}">
        </div>
        @endforeach

    </div>
     
</div>

</section>

<section class="featured-section">
    <div class="upper-row">
        <div class="auto-container">
            <div class="upper-container">
                <div class="row justify-content-center clearfix">
                    <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 d-flex align-items-stretch my-3">
                        <a class="ad-item"  href="/convocatoria">
                            <div class="ad-item__icon">   
                                <div class=""><br><h1><i class="fas fa-user-plus"></i></h1> </div> 
                                <div class="ad-item__title font-one">Convocatorias de Personal<p></div>
                            </div>
                            
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 d-flex align-items-stretch my-3">
                        <a class="ad-item" href="#" target="_blank">
                            <div class="ad-item__icon">   
                                <div class=""><br><h1><i class="fas fa-clipboard "></i></h1> </div> 
                                <div class="ad-item__title font-one">Mesa de Partes Virtual <p></div>
                            </div>
                            
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 d-flex align-items-stretch my-3">
                        <a class="ad-item" href="/normatividad/resoluciones-de-alcaldia">
                            <div class="ad-item__icon">   
                                <div class=""><br><h1><i class="fab fa-leanpub"></i></h1> </div> 
                                <div class="ad-item__title font-one">Normatividad <p> <br></div>
                            </div>
                            
                        </a>
                    </div>
                    <!-- 
                    <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 d-flex align-items-stretch my-3">
                        <a class="ad-item" href="{{ route('pages.modernization.operating-license') }}">
                            <div class="ad-item__icon">   
                                <div class=""><br><h1><i class="fas fa-building"></i></h1> </div> 
                                <div class="ad-item__title font-one">Licencias de Funcionamiento <p></div>
                            </div>
                            
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 d-flex align-items-stretch my-3">
                        <a class="ad-item" href="{{ route('pages.modernization.municipal-taxes') }}">
                            <div class="ad-item__icon">   
                                <div class=""><br><h1><i class="fas fa-handshake"></i></h1> </div> 
                                <div class="ad-item__title font-one">Tributos Municipales<p></div>
                            </div>
                            
                        </a>
                    </div> -->
                    <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 d-flex align-items-stretch my-3">
                        <a class="ad-item" href="#">
                            <div class="ad-item__icon">   
                                <div class=""><br><h1><i class="fa fa-book "></i></h1> </div> 
                                <div class="ad-item__title font-one">Libro de Reclamaciones<p></div>
                            </div>
                            
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- news -->
<section class="news-section-two py-3">
    <div class="container-fluid">
        <div class="row mx-xl-5 px-xl-5">
            <div class="col col-lg-12 px-3">
                
                        <div class="sec-title with-separator">
                            <h2>Nuestras Notas de Prensa</h2>
                            <div class="separator"></div>
                        </div>
                     
                        
                        <div class="row">
                        @foreach($news as $item)
                        <div class="column col-lg-4 col-md-6 col-sm-12">
                            
                            <div class="news-block-two inner_column2">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image"><img src="{{ $item->image }}" alt=""></figure>
                                    </div>
                                    <div class="">
                                        <div class="post-info">{{ \Date::parse($item->date)->format('l\, d \d\e\ F \d\e\l\ Y') }}</div>
                                        <div class="upper-title">
                                            <h4><a href="/noticias/{{ $item->slug }}">{{ $item->title }}</a></h4>
                                        </div>
                                        <div class="more-link"><a href="/noticias/{{ $item->slug }}">Sigue Leyendo</a></div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        @endforeach
                                  
                        </div>                       
                        </div>
                    </div>                                       
                    <div class="see-more centered">
                        <a href="/noticias" class="theme-btn btn-style-three text-uppercase"><span class="btn-title">Ver más Noticias</span></a>
                    </div>
                    
                </div>
            </div>
       
        </div>    
    </div>
</section>
<!-- news -->
<!-- redes sociales -->
<section class="w-100 services-info py-3">
    <div class="container-fluid">
        <div class="row mx-xl-5 px-xl-5">

            <div class="col col-lg-12 px-3">

                <div class="sec-title with-separator">
                    <h2>Redes Sociales</h2>
                    <div class="separator"></div>
                </div>
                <div class="row">
                 
                    <div class="column col-lg-4 col-md-6 col-sm-12 centered">
                                                    
                       
                                                    
                    </div>
                    
                    <div class="column col-lg-4 col-md-6 col-sm-12">
                         <div class="news-block-two centered" >
                            <div class="inner-box">
                                <div class="embed-responsive" style="position: static; visibility: visible; display: inline-block; width: 400px; height: 600px; padding: 0px; border: none; max-width: 100%; min-width: 180px; margin-top: 0px; margin-bottom: 0px; min-height: 200px;">
                                    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fmunicipalidaddistritaldecalana%2F&amp;tabs=timeline&amp;width=315&amp;height=500&amp;small_header=true&amp;adapt_container_width=true&amp;hide_cover=false&amp;show_facepile=true&amp;appId" width="400" height="600" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
                                </div>                             
                            </div>
                        </div>
                    </div>
                    @if(count($modals_to_show))
                    <div class="column col-lg-4 col-md-6 col-sm-12">
                         <div class="centered">
                            <div class="inner-box">                                
                                <img width="400" height="600" class=" img-responsive" style="position: static; visibility: visible; display: inline-block; width: 400px; height: 600px; padding: 0px; border: none; max-width: 100%; min-width: 180px; margin-top: 0px; margin-bottom: 0px; min-height: 200px;" src="{{ $modals_to_show[0]->imagen }}" alt="">
                                {{-- https://www.municalana.gob.pe/img/noticia/POST_CIRCUITO_TURISTICO.JPG --}}
                            </div> 
                    </div>
                    @endif     
                    
                                     
                </div>  
            </div> 
            <div class="column col-lg-12 col-md-12 col-sm-12">
                <div class="py-lg-4">
                    <script src="https://apis.google.com/js/platform.js"></script>

                    <div class="g-ytsubscribe" data-channelid="UCPAGvuGP5mFVtlyfVWbg2jw" data-layout="full" data-count="hidden"></div>
                </div>
                <div class="news-block-two">
                    <div class="inner-box">

                        <div class="row">
                            @foreach($videos as $video)
                            <div class="column col-lg-4 col-md-6 col-sm-12 py-sm-3">
                               
                                <div class="centered">

                                    <div class="embed-responsive embed-responsive-16by9">
                                      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $video->identifier }}" allowfullscreen></iframe>

                                    </div>
{{--                                     <div class="embed-responsive embed-responsive-16by9">

                                        <iframe src="#" width="400" height="356" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>
                                    </div> --}}
                                </div>

                            </div>
                            @endforeach
                            {{-- 
                            <div class="column col-lg-4 col-md-6 col-sm-12 py-sm-3">
                                 <div class="centered">

                                    <div class="embed-responsive embed-responsive-16by9">
                                      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/7XxKK1BOc3Q" allowfullscreen></iframe>

                                    </div>
                                    
                                </div>
                                
                            </div>

                            <div class="column col-lg-4 col-md-6 col-sm-12 py-sm-3">
                                 <div class="centered">

                                    <div class="embed-responsive embed-responsive-16by9">
                                      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/EQ8gb6fYEcs" allowfullscreen></iframe>

                                    </div>
                                    
                                </div>
                                
                            </div>
                            --}}


                        </div>

                         <div class="see-more centered py-lg-2">
                                    <a href="/videos" class="theme-btn btn-style-three text-uppercase"><span class="btn-title">Ver más VIDEOS</span></a>
                        </div>

                    </div>
                </div>
                </p>

            </div>  
        </div>      
    </div>
</section>
<!-- fin redes sociales-->
<!-- obras -->
<section class="news-section-two py-3">
    <div class="container-fluid">
        <div class="row mx-xl-5 px-xl-5">
            <div class="col col-lg-12 px-3">
                
                <div class="sec-title with-separator">
                    <h2>Obras</h2>
                    <div class="separator"></div>
                </div>
                  
                <div class="row">
                    @if($works_categories[0])
                    <div class="column col-lg-4 col-md-6 col-sm-12">
                        
                        <div class="news-block-two inner_column3">
                                <div class="inner-box">
                                 
                                    <div>
                                        <a class="nav-link active  " data-toggle="tab" href="#obra1" role="tab" aria-controls="obra1" aria-selected="true" style="
                                        background: #31c631 ;
                                        color: white;
                                        border-top-left-radius: 3px;
                                        border-top-right-radius: 3px;" >
                                        Ejecutadas   
                                        
                                    </a>
                                </div>
                                @if($works_categories[0]['one_works'])
                                <div class="news-block-two pt-lg-3">
                                    <div class="inner-box">
                                     <div class="image-box">
                                        <figure class="image"><img src="{{ $works_categories[0]['one_works']['foto'] }}" alt=""></figure>
                                    </div>
                                    <div class="">
                                        <div class="post-info">{{ \Date::parse($works_categories[0]['one_works']['fechaini'])->format('l\, d \d\e\ F \d\e\l\ Y') }}</div>
                                        <div class="upper-title">
                                            <h4><a href="">{{ $works_categories[0]['one_works']['actividad'] }}</a></h4>
                                        </div>
                                        <div class="more-link"><a href="">Sigue Leyendo</a></div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            </div>
                        </div>
                    </div>  
                    @endif
                    
                    @if($works_categories[1])
                    <div class="column col-lg-4 col-md-6 col-sm-12">
                        <div class="news-block-two inner_column3">
                            <div class="inner-box">
                                <div class="news-block-two">
                                    <div class="inner-box">
                                     
                                        <div>
                                                <a class="nav-link active  " data-toggle="tab" href="#obra1" role="tab" aria-controls="obra1" aria-selected="true" style="
                                                background: #3a843a ;
                                                color: white;
                                                border-top-left-radius: 3px;
                                                border-top-right-radius: 3px;" >
                                                En Proceso   
                                                
                                            </a>
                                        </div>

                                    
                                        @if($works_categories[1]['one_works'])
                                        <div class="news-block-two pt-lg-3">
                                            <div class="inner-box">
                                               <div class="image-box">
                                                <figure class="image"><img src="{{ $works_categories[1]['one_works']['foto'] }}" alt=""></figure>
                                                </div>
                                                <div class="">
                                                    <div class="post-info">{{ \Date::parse($works_categories[1]['one_works']['fechaini'])->format('l\, d \d\e\ F \d\e\l\ Y') }}</div>
                                                    <div class="upper-title">
                                                        <h4><a href="">{{ $works_categories[1]['one_works']['actividad'] }}</a></h4>
                                                    </div>
                                                    <div class="more-link"><a href="">Sigue Leyendo</a></div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>

                                </div>
                               
                            </div>
                        </div>
                        
                    </div>
                    @endif

                    @if($works_categories[2])
                    <div class="column col-lg-4 col-md-6 col-sm-12">
                        <div class="news-block-two inner_column3">
                            <div class="inner-box">
                                <div class="news-block-two">
                                    <div class="inner-box">
                                     
                                        <div>
                                            <a class="nav-link active  " data-toggle="tab" href="#obra1" role="tab" aria-controls="obra1" aria-selected="true" style="
                                            background: #004f00 ;
                                            color: white;
                                            border-top-left-radius: 3px;
                                            border-top-right-radius: 3px;" >
                                            Por Ejecutar   
                                            
                                        </a>
                                    </div>

                                    
                                    @if($works_categories[2]['one_works'])
                                    <div class="news-block-two pt-lg-3">
                                        <div class="inner-box">
                                           <div class="image-box">
                                            <figure class="image"><img src="{{ $works_categories[2]['one_works']['foto'] }}" alt=""></figure>
                                        </div>
                                        <div class="">
                                            <div class="post-info">{{ \Date::parse($works_categories[2]['one_works']['fechaini'])->format('l\, d \d\e\ F \d\e\l\ Y') }}</div>
                                            <div class="upper-title">
                                                <h4><a href="">{{ $works_categories[2]['one_works']['actividad'] }}</a></h4>
                                            </div>
                                            <div class="more-link"><a href="">Sigue Leyendo</a></div>
                                        </div>
                                    </div>
                                </div>
                                @endif


                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    @endif


                    <div class="column col-lg-4 col-md-6 col-sm-12">
                        <div class="see-more centered">
                            <a href="/obras?tipo=ejecutadas" class="theme-btn btn-style-three text-uppercase"><span class="btn-title">Ver más Obras Ejecutadas </span></a>
                        </div>
                    </div>
                    <div class="column col-lg-4 col-md-6 col-sm-12">
                        <div class="see-more centered">
                            <a href="/obras?tipo=en-proceso" class="theme-btn btn-style-three text-uppercase"><span class="btn-title">Ver más Obras en Proceso</span></a>
                        </div>
                    </div>
                    <div class="column col-lg-4 col-md-6 col-sm-12">
                        <div class="see-more centered">
                            <a href="/obras?tipo=por-ejecutar" class="theme-btn btn-style-three text-uppercase"><span class="btn-title">Ver más Obras Por Ejecutar</span></a>
                        </div>
                    </div>                                         
                </div>                       
            </div>
        </div>      
    </div>     
</section>
<!-- fin obras -->
<!-- obras -->
<section class="w-100 services-info py-3">
    <div class="container-fluid">
        <div class="row mx-xl-5 px-xl-5">
            <div class="col col-lg-12 px-3">
                
                <div class="sec-title with-separator">
                    <h2>Ultimos Documentos Emitidos</h2>
                    <div class="separator"></div>
                </div>
                  
                <div class="row">
                    <div class="column col-lg-4 col-md-6 col-sm-12">
                        <div class="news-block-two inner_column">
                            <div class="inner-box">                                         
                                <div>
                                    <a class="nav-link active  " data-toggle="tab" href="#obra1" role="tab" aria-controls="obra1" aria-selected="true" style="
                                    background: #31c631 ;
                                    color: white;
                                    border-top-left-radius: 3px;
                                    border-top-right-radius: 3px;" >
                                    Convocatorias
                                    </a>
                                </div>
                                <div class="news-block-two pt-lg-3">
                                    <div class="inner-box">
                                         
                                        <div class="">
                                             <div role="tabpanel" class="tab-pane conten-tab-item active" id="messages">
                                                @foreach($calls as $call)
                                                <div class="conten-tab-titulo">
                                                    <a href="" target="blank"> 
                                                        <span class="glyphicon glyphicon-menu-right"></span>
                                                    {{ $call->referencia }}              </a>
                                                </div>
                                                <div class="conten-tab-detail">
                                                    <div><span class="glyphicon glyphicon-calendar"></span> <span style="text-transform: uppercase;">{{ \Date::parse($call->fecha)->format('l\, d \d\e\ F \d\e\l\ Y') }}</span> </div>
                                                    <div><p><strong>{{ $call->unidad }}</strong>
                                                        @if($call->bases)
                                                        <br>
                                                        <a target="_blank" href="{{ $call->bases }}">Bases</a>
                                                        @endif

                                                        @if($call->aptos)
                                                         <br> <a target="_blank" href="{{ $call->aptos }}">Aptos</a> 
                                                         @endif

                                                         @if($call->resultados)
                                                         <br> <a target="_blank" href="{{ $call->resultados }}">Resultados</a>
                                                         @endif
                                                          </p>
                                                    </div>  
                                                </div>
                                                @endforeach
                                               
                                                <a href="/convocatoria">Ver todas las convocatorias <span class="glyphicon glyphicon-th-list"></span></a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                               
                      
                            </div>
                        </div>
                    </div>
                    <div class="column col-lg-4 col-md-6 col-sm-12">                           
                        <div class="news-block-two inner_column">
                            <div class="inner-box">                                                                   
                                <div>
                                    <a class="nav-link active  " data-toggle="tab" href="#obra1" role="tab" aria-controls="obra1" aria-selected="true" style="
                                    background: #3a843a ;
                                    color: white;
                                    border-top-left-radius: 3px;
                                    border-top-right-radius: 3px;" >
                                    Normatividad
                                    </a>
                                </div>
                                <div class="news-block-two pt-lg-3">
                                    <div class="">
                                        <div role="tabpanel" class="tab-pane conten-tab-item active" id="messages">

                                            @foreach($resolutions as $resolution)
                                            <div class="conten-tab-titulo">
                                                <a href="" target="blank"> 
                                                    <span class="glyphicon glyphicon-menu-right"></span>
                                                <!-- {{ $resolution->tipodocu }} -->
                                                {{ $resolution->numdoc }}                                     </a>
                                            </div>
                                            <div class="conten-tab-detail">
                                                <div><span class="glyphicon glyphicon-calendar"></span>
                                                <span style="text-transform: uppercase;">{{ \Date::createFromFormat('Y-m-d', $resolution->fechaemi)->format('l\, d \d\e\ F \d\e\l\ Y') }}</span></div>
                                                <div><p>{{ $resolution->referenc }}</p>
                                                @if($resolution->nomfile)
                                                <a href="/portaltransparencia/publicaciones/{{ $resolution->nomfile }}">Documento</a>
                                                @endif
                                                </div> 
                                            </div>
                                            @endforeach

                                           
                                            <a href="/normatividad/resoluciones-de-alcaldia">Ver todas las resoluciones <span class="glyphicon glyphicon-th-list"></span></a>
                                        </div>


                                    </div>
                                </div>
                               

                            </div>
                                                                                        
                        </div> <!-- fin de news-bloc-two-->
                    </div> <!-- fin de colum col-lg -->                                   
                                                
                    <div class="column col-lg-4 col-md-6 col-sm-12">                            
                        <div class="content">
                            <div class="news-block-two inner_column">
                                <div class="inner-box">                                                                                 
                                    <div>
                                        <a class="nav-link active  " data-toggle="tab" href="#obra1" role="tab" aria-controls="obra1" aria-selected="true" style="
                                        background: #004f00 ;
                                        color: white;
                                        border-top-left-radius: 3px;
                                        border-top-right-radius: 3px;" >
                                        Otros Documentos Importantes                                                   
                                    </a>
                                    </div>                                       
                                    <div class="news-block-two pt-lg-3">
                                        <div class="inner-box">                                                   
                                            <div class="">   
                                                <ul class="list-group list-group-flush">
                                                    @foreach($last_documents as $document)
                                                        @if(count($document['files']))
                                                        <li class="list-group-item">                         
                                                            <i class="fa fa-folder"></i>
                                                            
                                                            <a href="{{ $document['files'][0]['url'] }}" target="_blank">{{ $document['title'] }}</a>
                                                        </li>
                                                        @endif
                                                    
                                                    @endforeach
                                                     
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="column col-lg-4 col-md-6 col-sm-12"> 
                        <div class="see-more centered">
                            <a href="/convocatoria" class="theme-btn btn-style-three text-uppercase"><span class="btn-title">Ver más Convocatorias</span></a>
                        </div> 
                    </div>

                    <div class="column col-lg-4 col-md-6 col-sm-12"> 
                        <div class="see-more centered">
                            <a href="/normatividad/resoluciones-de-alcaldia" class="theme-btn btn-style-three text-uppercase"><span class="btn-title">Ver más Normatividad</span></a>
                        </div> 
                    </div>
                    <div class="column col-lg-4 col-md-6 col-sm-12"> 
                        <div class="see-more centered">
                            <a href="/noticias" class="theme-btn btn-style-three text-uppercase"><span class="btn-title">Ver más Otros Documentos</span></a>
                        </div> 
                    </div>




                    
                </div>
            </div>       
        </div>    
    </div>
</section>
<!-- fin obras -->
<!-- services -->
<section class="w-100 py-3">
    <div class="container-fluid">
        <div class="row mx-xl-5 px-xl-5 ">
            <div class="col col-lg-9">
                    <div class="container-fluid">
                        <div class="sec-title with-separator">
                            <h2>Servicios Municipales</h2>
                            <div class="separator"></div>
                        </div>
                        <div class="row">
                            @foreach($services as $service)
                            <div class="col-md-3 col-sm-4 my-3">
                                <div class="services-icon-box">
                                    
                                    <h6 class="font-one text-uppercase">
                                        <a href="/servicios-municipales/{{ $service['slug'] }}"> 
                                            <div class="">
                                                <br>
                                                    <h1>
                                                        <img src="{{ $service['icon'] }}">
                                                    </h1>
                                            </div> {{ $service['title'] }}
                                        </a>
                                    </h6>

                                    <a class="rm" href="/servicios-municipales/{{ $service['slug'] }}">Información</a>
                                </div>
                            </div>
                            @endforeach
                           
                        </div>
                    </div>
            </div>
            <div class="col col-lg-3 py-3">

                <div class="sec-title with-separator">
                    <h2>DOCUMENTOS INSTITUCIONALES</h2>
                    <div class="separator"></div>
                </div>
                <div class="card-header">
                    DOCUMENTOS 
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($inst_documents as $document)
                    <li class="list-group-item">                         
                        <i class="fa fa-folder"></i> 
                        <a href="/docgestion/{{ $document['acronym'] }}">{{ $document['acronym'] }}</a> 
                    </li>
                    @endforeach
                   
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
@foreach($modals_to_show as $modal_to_show)
<div class="modal fade modal-notice" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close close-modal-notice">
          <!-- <span aria-hidden="true">&times;</span> -->X
        </button>
        <a target="_blank" href="{{ $modal_to_show->enlace }}"><img class="img-responsive" src="{{ $modal_to_show->imagen }}" style="width: 100%"></a>
      </div>
    </div>
  </div>
</div>
@endforeach

<!-- services -->
<!-- links -->
<section class="links-section services-info py-3">
    <div class="container-lg">
        <div class="sec-title with-separator">
            <h2>Enlaces de interés</h2>
            <div class="separator"></div>
        </div>
        <div class="carousel-box">
            <div class="links-carousel owl-theme owl-carousel">
                <div class="links-block">
                    <div class="inner-box">
                        <a href="https://mim.org.pe/" target="_blank" class="image-box">
                            <figure class="image"><img src="<?php echo e(asset('img/links/mim-peru.jpg')); ?>" alt=""></figure>
                        </a>
                    </div>
                </div>
                <div class="links-block">
                    <div class="inner-box">
                        <a href="https://www.gob.pe/mef" target="_blank" class="image-box">
                            <figure class="image"><img src="<?php echo e(asset('img/links/mef-peru.jpg')); ?>" alt=""></figure>
                        </a>
                    </div>
                </div>
                <div class="links-block">
                    <div class="inner-box">
                        <a href="https://www.gob.pe/cofopri" target="_blank" class="image-box">
                            <figure class="image"><img src="<?php echo e(asset('img/links/cofopri.jpg')); ?>" alt=""></figure>
                        </a>
                    </div>
                </div>
                <div class="links-block">
                    <div class="inner-box">
                        <a href="https://www.osiptel.gob.pe/" target="_blank" class="image-box">
                            <figure class="image"><img src="<?php echo e(asset('img/links/osiptel.jpg')); ?>" alt=""></figure>
                        </a>
                    </div>
                </div>
                <div class="links-block">
                    <div class="inner-box">
                        <a href="http://www.sunat.gob.pe/" target="_blank" class="image-box">
                            <figure class="image"><img src="<?php echo e(asset('img/links/sunat.jpg')); ?>" alt=""></figure>
                        </a>
                    </div>
                </div>
                <div class="links-block">
                    <div class="inner-box">
                        <a href="https://www.gob.pe/apci" target="_blank" class="image-box">
                            <figure class="image"><img src="<?php echo e(asset('img/links/apci.jpg')); ?>" alt=""></figure>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- links -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('facebookRoot'); ?>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v8.0" nonce="crVYCqnk"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


