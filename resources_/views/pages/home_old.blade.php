<?php $__env->startSection('content'); ?>

<style type="text/css">
    .ml-20 {
    margin-left: ($spacer * .25) !important;
    }

</style>

<section class="banner-section-two">
    <div class="banner-carousel-two owl-theme owl-carousel">
    </div>

    <div class="owl-carousel owl-theme">
        <div class="item">
            <img class="w-100" src="<?php echo e('/img/banners/banner-01.jpg'); ?>">
        </div>
        <div class="item">
            <img class="w-100" src="<?php echo e('/img/banners/banner-02.jpg'); ?>">
        </div>
        <div class="item">
            <img class="w-100" src="<?php echo e('/img/banners/banner-01.jpg'); ?>">
        </div>
        <div class="item">
            <img class="w-100" src="<?php echo e('/img/banners/banner-02.jpg'); ?>">
        </div>
    </div>
     
</div>

</section>

<section class="featured-section">
    <div class="upper-row">
        <div class="auto-container">
            <div class="upper-container">
                <div class="row justify-content-center clearfix">
                    <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 d-flex align-items-stretch my-3">
                        <a class="ad-item"  href="http://dev.municiudadnueva.gob.pe/convocatoria">
                            <div class="ad-item__icon">   
                                <div class=""><br><h1><i class="fas fa-user-plus"></i></h1> </div> 
                                <div class="ad-item__title font-one">Convocatorias de Personal<p></div>
                            </div>
                            
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 d-flex align-items-stretch my-3">
                        <a class="ad-item" href="http://mesadepartes.municiudadnueva.gob.pe/" target="_blank">
                            <div class="ad-item__icon">   
                                <div class=""><br><h1><i class="fas fa-clipboard "></i></h1> </div> 
                                <div class="ad-item__title font-one">Mesa de Partes Virtual <p></div>
                            </div>
                            
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 d-flex align-items-stretch my-3">
                        <a class="ad-item" href="http://dev.municiudadnueva.gob.pe/publicaciones/">
                            <div class="ad-item__icon">   
                                <div class=""><br><h1><i class="fab fa-leanpub"></i></h1> </div> 
                                <div class="ad-item__title font-one">Normatividad <p> <br></div>
                            </div>
                            
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 d-flex align-items-stretch my-3">
                        <a class="ad-item" href="http://dev.municiudadnueva.gob.pe/modernizacion/licencias_funcionamiento">
                            <div class="ad-item__icon">   
                                <div class=""><br><h1><i class="fas fa-building"></i></h1> </div> 
                                <div class="ad-item__title font-one">Licencias de Funcionamiento <p></div>
                            </div>
                            
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 d-flex align-items-stretch my-3">
                        <a class="ad-item" href="http://dev.municiudadnueva.gob.pe/modernizacion/tributos">
                            <div class="ad-item__icon">   
                                <div class=""><br><h1><i class="fas fa-handshake"></i></h1> </div> 
                                <div class="ad-item__title font-one">Tributos Municipales<p></div>
                            </div>
                            
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 d-flex align-items-stretch my-3">
                        <a class="ad-item" href="http://dev.municiudadnueva.gob.pe/modernizacion/reclamaciones">
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
        <div class="row mx-lg-5 px-lg-5">
            <div class="col col-lg-12 px-3">
                
                        <div class="sec-title with-separator">
                            <h2>Nuestras Notas de Prensa</h2>
                            <div class="separator"></div>
                        </div>
                     
                        <!--
                    <div class="container-lg">
                        <div class="row clearfix">
                            <div class="column col-lg-12 col-md-12 col-sm-12">
                               
                                <div class="news-block-two">
                                    <div class="inner-box">
                                        <div class="image-box">
                                        <figure class="image"><img src="{{ 'img/news/news-01.jpg' }}" alt=""></figure>
                                        </div>                                        
                                    <div class="lower-box">
                                        <div class="post-info">Viernes, 19 de Marzo del 2021</div>
                                        <div class="upper-title"><h4><a href="">Ciudad Nueva Adelanta Homenaje a Tacna</a></h4></div>
                                        <div class="more-link"><a href="">Sigue Leyendo</a></div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>    -->
                        
                        <div class="row">
                        @foreach($news as $item)
                        <div class="column col-lg-4 col-md-6 col-sm-12">
                            
                            <div class="news-block-two">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image"><img src="{{ $item->image }}" alt=""></figure>
                                    </div>
                                    <div class="lower-box">
                                        <div class="post-info">{{ \Date::parse($item->date)->format('l\, d \d\e\ F \d\e\l\ Y') }}</div>
                                        <div class="upper-title">
                                            <h4><a href="">{{ $item->title }}</a></h4>
                                        </div>
                                        <div class="more-link"><a href="/noticias/{{ $item->slug }}">Sigue Leyendo</a></div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        @endforeach
                        {{-- 
                        <div class="column col-lg-4 col-md-6 col-sm-12">
                           
                            <div class="news-block-two">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image"><img src="{{ 'img/news/news-02.jpg' }}" alt=""></figure>
                                    </div>
                                    <div class="lower-box">
                                        <div class="post-info">Viernes, 19 de Marzo del 2021</div>
                                        <div class="upper-title">
                                            <h4><a href="">Ciudad Nueva es el epicentro del Plan Tayta</a></h4>
                                        </div>
                                        <div class="more-link"><a href="">Sigue Leyendo</a></div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="column col-lg-4 col-md-6 col-sm-12">
                            
                            <div class="news-block-two">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image"><img src="{{ 'img/news/news-03.jpg' }}" alt=""></figure>
                                    </div>
                                    <div class="lower-box">
                                        <div class="post-info">Viernes, 19 de Marzo del 2021</div>
                                        <div class="upper-title">
                                            <h4><a href="">Clausuran e Intervienen Boticas en Ciudad Nueva</a></h4>
                                        </div>
                                        <div class="more-link"><a href="">Sigue Leyendo</a></div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        --}}            
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
<section class="news-section-two py-3">
    <div class="container-fluid">
        <div class="row mx-lg-5 px-lg-5">
            <div class="col col-lg-12 px-3">
                
                        <div class="sec-title with-separator">
                            <h2>Redes Sociales</h2>
                            <div class="separator"></div>
                        </div>
                     
                        <!--
                    <div class="container-lg">
                        <div class="row clearfix">
                            <div class="column col-lg-12 col-md-12 col-sm-12">
                               
                                <div class="news-block-two">
                                    <div class="inner-box">
                                        <div class="image-box">
                                        <figure class="image"><img src="{{ 'img/news/news-01.jpg' }}" alt=""></figure>
                                        </div>                                        
                                    <div class="lower-box">
                                        <div class="post-info">Viernes, 19 de Marzo del 2021</div>
                                        <div class="upper-title"><h4><a href="">Ciudad Nueva Adelanta Homenaje a Tacna</a></h4></div>
                                        <div class="more-link"><a href="">Sigue Leyendo</a></div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>    -->
                        
                        <div class="row">
                        
                        <div class="column col-lg-4 col-md-6 col-sm-12">
                            
                            <div class="news-block-two">
                                <div class="inner-box">
                                    <blockquote class="instagram-media" data-instgrm-captioned data-instgrm-permalink="https://www.instagram.com/tv/CChlUHyhaTW/?utm_source=ig_embed&amp;utm_campaign=loading" data-instgrm-version="13" 
                                   style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); 
                                   width:calc(100% - 2px);">
                                   <div style="padding:16px;"> <a href="https://www.instagram.com/tv/CChlUHyhaTW/?utm_source=ig_embed&amp;utm_campaign=loading" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank"> <div style=" display: flex; flex-direction: row; align-items: center;"> <div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;"></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;"></div></div></div><div style="padding: 19% 0;"></div> <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-511.000000, -20.000000)" fill="#000000"><g><path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631"></path></g></g></g></svg></div><div style="padding-top: 8px;"> <div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;"> Ver esta publicación en Instagram</div></div><div style="padding: 12.5% 0;"></div> <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;"><div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);"></div> <div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;"></div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);"></div></div><div style="margin-left: 8px;"> <div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;"></div> <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)"></div></div><div style="margin-left: auto;"> <div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);"></div> <div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);"></div> <div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);"></div></div></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;"></div></div></a><p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;"><a href="https://www.instagram.com/tv/CChlUHyhaTW/?utm_source=ig_embed&amp;utm_campaign=loading" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">Una publicación compartida de Ciudad Nueva (@muni_ciudad_nueva)</a></p></div></blockquote> <script async src="//www.instagram.com/embed.js"></script>   
                                  
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="column col-lg-4 col-md-6 col-sm-12">
                           
                            <div class="news-block-two">
                                <div class="inner-box">
                                    <script async="1" defer="1" crossorigin="anonymous" 
                                        src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v10.0" width="auto" nonce="77TraNNW">
                                            
                                    </script><div class="fb-page" data-href="https://www.facebook.com/MunicipalidadDistritalDeCiudadNueva" data-height="920" data-small-header="" data-adapt-container-width="1" 
                                    data-hide-cover="" data-show-facepile="" data-show-posts="true" data-width="540"><blockquote cite="https://www.facebook.com/MunicipalidadDistritalDeCiudadNueva" 
                                    class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/MunicipalidadDistritalDeCiudadNueva">Municipalidad Distrital de Ciudad Nueva</a></blockquote></div>
                                   
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="column col-lg-4 col-md-6 col-sm-12">
                            
                            <div class="news-block-two">
                                <div class="inner-box">
                                    
                                </div>
                            </div>
                            
                        </div>
                                         
                    </div>                       
                        </div>
                    </div>                                       
                   
                    
                </div>
            </div>
       
        </div>    
    </div>
</section>
<!-- fin redes sociales-->
<!-- obras -->

<section class="news-section-two py-3">
    <div class="container-fluid">
        <div class="row mx-lg-5 px-lg-5">

            <div class="col col-lg-12 col-sm-12 col-xs-12">
                    
                    <div class="sec-title with-separator">
                        <h2>OBRAS CIUDAD NUEVA</h2>
                        <div class="separator"></div>
                        <div class="container-fluid">
                                <div class="">
                                    
                                    <ul class="nav nav-tabs nav-fill " role="tablist">
                                        <div class="column col-lg-4 col-md-6 col-sm-12">
                                            <li class="nav-item">
                                                <a class="nav-link active  " data-toggle="tab" href="#obra1" role="tab" aria-controls="obra1" aria-selected="true" style="
                                                    background: #f39c12 ;
                                                    color: white;
                                                    border-top-left-radius: 3px;
                                                    border-top-right-radius: 3px;" >
                                                    Ejecutadas   
                                                    
                                                </a>
                                            </li>
                                        </div>
                                        <div class="column col-lg-4 col-md-6 col-sm-12">
                                            <li class="nav-item">
                                                <a class="nav-link " data-toggle="tab" href="#obra2" role="tab" aria-controls="obra2" aria-selected="false" style="
                                                    background: #e67e22; 
                                                    color: white;
                                                    border-top-left-radius: 3px;
                                                    border-top-right-radius: 3px;">
                                                    En Ejecución</a>
                                            </li>
                                        </div>
                                        <div class="column col-lg-4 col-md-6 col-sm-12">
                                           
                                            <li class="nav-item">
                                                <a class="nav-link " data-toggle="tab" href="#obra3" role="tab" aria-controls="obra3" aria-selected="false" style="
                                                    background: #d35400; 
                                                    color: white;
                                                    border-top-left-radius: 3px;
                                                    border-top-right-radius: 3px;">
                                                    Por Ejecutar </a>
                                            </li>
                                        </div>
                
                                    
                                    </ul>
                                </div>
                            </div>                                            
                            <div class="container-fluid">
                                <div class="tab-content mt-3">
                                  <div class="tab-pane active" id="obra1" role="tabpanel" aria-labelledby="obra1-tab">
                                    <div class="container-fluid">

                                        <div class="row clearfix">  

                                            <!-- item -->

                                            <!-- obra 1 -principal -->
                                        
                                            <!-- fin obra 1 -principal -->

                                            <div class="row clearfix">
                                                    <!-- col -->
                                                <div class="column col-lg-4 col-md-6 col-sm-12">
                                                        <!-- item -->
                                                    <div class="news-block-two">
                                                        <div class="inner-box">
                                                             <div class="image-box">
                                                                <figure class="image"><img src="{{ 'img/news/drenaje.jpg' }}" alt=""></figure>
                                                            </div>
                                                        <div class="lower-box">
                                                        <div class="post-info">Viernes, 19 de Marzo del 2021</div>
                                                            <div class="upper-title">
                                                                <h4><a href="">CONSTRUCCION DE CANAL DE DRENAJE</a></h4>
                                                            </div>
                                                            <div class="more-link"><a href="">Sigue Leyendo</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- item -->
                                            </div>
                                                <!-- col -->
                                                    <div class="column col-lg-4 col-md-6 col-sm-12">
                                                        <!-- item -->
                                                        <div class="news-block-two">
                                                            <div class="inner-box">
                                                                <div class="image-box">
                                                                    <figure class="image"><img src="{{ 'img/news/insectpark.jpg' }}" alt=""></figure>
                                                                </div>
                                                                <div class="lower-box">
                                                                    <div class="post-info">Viernes, 19 de Marzo del 2021</div>
                                                                    <div class="upper-title">
                                                                        <h4><a href="">PARQUE TEMATICO – INSECT PARK </a></h4>
                                                                    </div>
                                                                    <div class="more-link"><a href="">Sigue Leyendo</a></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- item -->
                                                    </div>
                                                <!-- col -->
                                                    <div class="column col-lg-4 col-md-6 col-sm-12">
                                                        <!-- item -->
                                                        <div class="news-block-two">
                                                            <div class="inner-box">
                                                                <div class="image-box">
                                                                    <figure class="image"><img src="{{ 'img/news/proceres.jpg' }}" alt=""></figure>
                                                                </div>
                                                                <div class="lower-box">
                                                                    <div class="post-info">Viernes, 19 de Marzo del 2021</div>
                                                                    <div class="upper-title">
                                                                        <h4><a href="">LUMINARIAS EN LA ALAMEDA PROCERES </a></h4>
                                                                    </div>
                                                                    <div class="more-link"><a href="">Sigue Leyendo</a></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- item -->
                                                    </div>
                                                    <!-- col -->                  
                                                </div>                       
                                            </div>
                                        
                                        
                                        <!-- rows -->
                                        <div class="see-more centered">
                                            <a href="https://municiudadnueva.gob.pe/noticias" class="theme-btn btn-style-three text-uppercase"><span class="btn-title">Ver más Obras Realizadas</span></a>
                                        </div>
                                    </div>
                                        
           
                                  </div>

                                  <div class="tab-pane" id="obra2" role="tabpanel" aria-labelledby="obra2-tab">
                                    <div class="container-lg">
                                        <div class="row clearfix">                                                  
                                          
                                            <!-- fin obra 2 -principal -->
                                                    <!-- col -->
                                                <div class="column col-lg-4 col-md-6 col-sm-12">
                                                        <!-- item -->
                                                    <div class="news-block-two">
                                                        <div class="inner-box">
                                                            <div class="image-box">
                                                                <figure class="image"><img src="{{ 'img/news/pocollay2.jpg' }}" alt=""></figure>
                                                            </div>
                                                            <div class="lower-box">
                                                                <div class="post-info">Viernes, 19 de Marzo del 2021</div>
                                                                <div class="upper-title">
                                                                    <h4><a href="">CREACION DE LOS SERVICIOS POLICIALES DE LA COMISARIA PNP TIPO C</a></h4>
                                                                </div>
                                                                <div class="more-link"><a href="">Sigue Leyendo</a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <!-- item -->
                                                </div>
                                                <!-- col -->
                                                <div class="column col-lg-4 col-md-6 col-sm-12">
                                                        <!-- item -->
                                                    <div class="news-block-two">
                                                        <div class="inner-box">
                                                            <div class="image-box">
                                                                <figure class="image"><img src="{{ 'img/news/pocollay2.jpg' }}" alt=""></figure>
                                                            </div>
                                                            <div class="lower-box">
                                                                <div class="post-info">Viernes, 19 de Marzo del 2021</div>
                                                                    <div class="upper-title">
                                                                        <h4><a href="">MEJORAMIENTO DE LOS SERVICIOS DE TRANSITABILIDAD VEHICULAR Y PEATONAL EN LA CALLE DANIEL ALCIDES CARRION </a></h4>
                                                                    </div>
                                                                <div class="more-link"><a href="">Sigue Leyendo</a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                        <!-- item -->
                                                </div>
                                            <!-- col -->
                                                <div class="column col-lg-4 col-md-6 col-sm-12">
                                                        <!-- item -->
                                                    <div class="news-block-two">
                                                        <div class="inner-box">
                                                            <div class="image-box">
                                                                <figure class="image"><img src="{{ 'img/news/palacio.jpg' }}" alt=""></figure>
                                                            </div>

                                                            <div class="lower-box">
                                                                <div class="post-info">Viernes, 19 de Marzo del 2021</div>
                                                                    <div class="upper-title">
                                                                        <h4><a href="https://municiudadnueva.gob.pe/noticias">MEJORAMIENTO DE LA CAPACIDAD OPERATIVA DEL PALACIO MUNICIPAL</a></h4>
                                                                    </div>
                                                                <div class="more-link"><a href="">Sigue Leyendo</a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                        <!-- item -->
                                                </div>
                                                    <!-- col -->                  
                                                                
                                            
                                        </div>
                                        
                                        <!-- rows -->
                                        <div class="see-more centered">
                                            <a href="https://municiudadnueva.gob.pe/noticias" class="theme-btn btn-style-three text-uppercase"><span class="btn-title">Ver más Obras En Proceso</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="obra3" role="tabpanel" aria-labelledby="obra2-tab">
                                    <div class="container-lg">
                                        <div class="row clearfix">                                                  
                                                
                                                    <!-- col -->
                                                <div class="column col-lg-4 col-md-6 col-sm-12">
                                                        <!-- item -->
                                                    <div class="news-block-two">
                                                        <div class="inner-box">
                                                            <div class="image-box">
                                                                <figure class="image"><img src="{{ 'img/news/comisaria.jpg' }}" alt=""></figure>
                                                            </div>
                                                            <div class="lower-box">
                                                                <div class="post-info">Viernes, 19 de Marzo del 2021</div>
                                                                <div class="upper-title">
                                                                    <h4><a href="">MEJORAMIENTO DE LOS SERVICIOS POLICIALES DE LA COMISARIA PNP TIPO C</a></h4>
                                                                </div>
                                                                <div class="more-link"><a href="">Sigue Leyendo</a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <!-- item -->
                                                </div>
                                                <!-- col -->
                                                <div class="column col-lg-4 col-md-6 col-sm-12">
                                                        <!-- item -->
                                                    <div class="news-block-two">
                                                        <div class="inner-box">
                                                            <div class="image-box">
                                                                <figure class="image"><img src="{{ 'img/news/pocollay2.jpg' }}" alt=""></figure>
                                                            </div>
                                                            <div class="lower-box">
                                                                <div class="post-info">Viernes, 19 de Marzo del 2021</div>
                                                                    <div class="upper-title">
                                                                        <h4><a href="">MEJORAMIENTO DE LOS SERVICIOS DE TRANSITABILIDAD VEHICULAR Y PEATONAL EN LA CALLE DANIEL ALCIDES CARRION </a></h4>
                                                                    </div>
                                                                <div class="more-link"><a href="">Sigue Leyendo</a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                        <!-- item -->
                                                </div>
                                            <!-- col -->
                                                <div class="column col-lg-4 col-md-6 col-sm-12">
                                                        <!-- item -->
                                                    <div class="news-block-two">
                                                        <div class="inner-box">
                                                            <div class="image-box">
                                                                <figure class="image"><img src="{{ 'img/news/palacio.jpg' }}" alt=""></figure>
                                                            </div>

                                                            <div class="lower-box">
                                                                <div class="post-info">Viernes, 19 de Marzo del 2021</div>
                                                                    <div class="upper-title">
                                                                        <h4><a href="">MEJORAMIENTO DE LA CAPACIDAD OPERATIVA DEL PALACIO MUNICIPAL</a></h4>
                                                                    </div>
                                                                <div class="more-link"><a href="">Sigue Leyendo</a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                        <!-- item -->
                                                </div>
                                                    <!-- col -->                  
                                                                
                                            
                                        </div>
                                        
                                        <!-- rows -->
                                        <div class="see-more centered">
                                            <a href="{{ route('pages.news') }}" class="theme-btn btn-style-three text-uppercase"><span class="btn-title">Ver más Obras En Proceso</span></a>
                                        </div>
                                    </div>
                                </div>

                            </div>    
                            
                      
                    </div>
              
            </div>  

 
        </div>    
    </div>
</section>

<!-- fin obras -->

<!-- services -->
<section class="w-100 services-info py-3">
    <div class="container-lg">
        <div class="row">
            <div class="col col-lg-9">
                    <div class="container-lg">
                        <div class="sec-title with-separator">
                            <h2>Servicios Municipales</h2>
                            <div class="separator"></div>
                        </div>
                        <div class="row"> 
                            <!-- item -->
                            <div class="col-md-3 col-sm-4 my-3">
                                <div class="services-icon-box">
                                    
                                    <h6 class="font-one text-uppercase"><a href="http://dev.municiudadnueva.gob.pe/servicios/seguridadciudadana"> 
                                    <div class=""><br><h1><i class="fas fa-user-shield"></i></h1> </div> Seguridad Ciudadana</a></h6>
                                    <a class="rm" href="<?php echo e(route('pages.services.citizen-security')); ?>">Información</a>
                                </div>
                            </div>
                            <!-- item -->
                            <div class="col-md-3 col-sm-4 my-3">
                                <div class="services-icon-box">
                                    
                                    <h6 class="font-one text-uppercase"><a href="http://dev.municiudadnueva.gob.pe/servicios/sisfoh">
                                    <div class=""><br><h1><i class="fas fa-address-card"></i></h1> </div> 
                                    SISFOH</a></h6>
                                    <a class="rm" href="<?php echo e(route('pages.services.sisfoh')); ?>">Información</a>
                                </div>
                            </div>
                            <!-- item -->
                            <div class="col-md-3 col-sm-4 my-3">
                                <div class="services-icon-box">
                                     
                                    <h6 class="font-one text-uppercase"><a href="http://dev.municiudadnueva.gob.pe/servicios/demuna">
                                    <div class=""><br><h1><i class="fa fa-universal-access"></i></h1> </div>DEMUNA</a></h6>
                                    <a class="rm" href="<?php echo e(route('pages.services.demuna')); ?>">Información</a>
                                </div>
                            </div>
                            <!-- item -->
                            <div class="col-md-3 col-sm-4 my-3">
                                <div class="services-icon-box">
                                    
                                    <h6 class="font-one text-uppercase"><a href="http://dev.municiudadnueva.gob.pe/servicios/vasodeleche"> <div class=""><br><h1><i class="fab fa-bitbucket"></i></h1> </div> Vaso de Leche</a></h6>
                                    <a class="rm" href="<?php echo e(route('pages.services.glass-of-milk')); ?>">Información</a>
                                </div>
                            </div>
                            <!-- item -->
                            <div class="col-md-3 col-sm-4 my-3">
                                <div class="services-icon-box">
                                    
                                    <h6 class="font-one text-uppercase"><a href="http://dev.municiudadnueva.gob.pe/servicios/codisec"> <div class=""><br><h1><i class="fas fa-shield-alt"></i></h1> </div> CODISEC</a></h6>
                                    <a class="rm" href="<?php echo e(route('pages.services.codisec')); ?>">Información</a>
                                </div>
                            </div>
                            <!-- item -->
                            <div class="col-md-3 col-sm-4 my-3">
                                <div class="services-icon-box">
                                    
                                    <h6 class="font-one text-uppercase"><a href="http://dev.municiudadnueva.gob.pe/servicios/registrocivil"> <div class=""><br><h1><i class="fas fa-id-badge"></i></h1> </div> Registro Civil</a></h6>
                                    <a class="rm" href="<?php echo e(route('pages.services.civil-registration')); ?>">Información</a>
                                </div>
                            </div>
                            <!-- item -->
                            <div class="col-md-3 col-sm-4 my-3">
                                <div class="services-icon-box">
                                    
                                    <h6 class="font-one text-uppercase"><a href="http://dev.municiudadnueva.gob.pe/servicios/defensacivil"><div class=""><br><h1><i class="fas fa-user-friends"></i></h1> </div>  Defensa Civil</a></h6>
                                    <a class="rm" href="<?php echo e(route('pages.services.civil-defense')); ?>">Información</a>
                                </div>
                            </div>
                            <!-- item -->
                            <div class="col-md-3 col-sm-4 my-3">
                                <div class="services-icon-box">
                                    
                                    <h6 class="font-one text-uppercase"><a href="<?php echo e(route('pages.services.sports')); ?>"><div class=""><br><h1><i class="fab fa-odnoklassniki"></i></h1> </div>Deportes</a></h6>
                                    <a class="rm" href="<?php echo e(route('pages.services.sports')); ?>">Información</a>
                                </div>
                            </div>
                            <!-- item -->
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
                    <li class="list-group-item">                         
                        <i class="fa fa-folder"></i> 
                        <a href="http://dev.municiudadnueva.gob.pe/docgestion/tupa">TUPA</a> 
                    </li>  
                    <li class="list-group-item">                         
                        <i class="fa fa-folder"></i> 
                        <a href="http://dev.municiudadnueva.gob.pe/docgestion/rof">ROF</a> 
                    </li>
                    <li class="list-group-item">                         
                        <i class="fa fa-folder"></i> 
                        <a href="http://dev.municiudadnueva.gob.pe/documentos/CAP%202016.pdf">CAP</a> 
                    </li>
                    <li class="list-group-item">                         
                        <i class="fa fa-folder"></i> 
                        <a href="http://dev.municiudadnueva.gob.pe/docgestion/mof">MOF</a>
                    </li>
                    <li class="list-group-item">                         
                        <i class="fa fa-folder"></i> 
                        <a href="http://dev.municiudadnueva.gob.pe/documentos/MAPRO%202010.pdf">MAPRO</a>
                    </li>
                    <li class="list-group-item">                         
                        <i class="fa fa-folder"></i> 
                        <a href="http://dev.municiudadnueva.gob.pe/documentos/PAP%202015.pdf">PAP</a>
                    </li>
                    <li class="list-group-item">                         
                        <i class="fa fa-folder"></i> 
                        <a href="http://dev.municiudadnueva.gob.pe/documentos/MEMORIA%20ANUAL%202016.pdf">MEMORIA ANUAL</a> 
                    </li>
                    <li class="list-group-item">                         
                        <i class="fa fa-folder"></i> 
                       <a href="http://dev.municiudadnueva.gob.pe/documentos/Organigrama.pdf">ORGANIGRAMA</a> 
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- services -->






<!-- links -->
<section class="links-section py-3">
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


