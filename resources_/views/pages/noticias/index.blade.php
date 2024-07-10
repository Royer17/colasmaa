@extends('layouts.app')

@section('content')
<section class="page-banner">
    <div class="image-layer" style="background-image:url({{ asset('assets/img/bgs/banner-img-1.jpg') }})"></div>
    <div class="banner-inner">
        <div class="container-lg">
            <div class="inner-container clearfix">
                <h1>Noticias</h1>
                <div class="page-nav">
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ route('pages.home') }}">Inicio</a></li>
                        <li class="active">Noticias23123123  </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="default-section">
    <div class="col-xl-8 ">
    
            <div class="container-lg">
              <!-- rows -->
                <div class="row clearfix">
                    <!-- col -->
                    <div class="column col-lg-4 col-md-6 col-sm-12">
                        <!-- item -->
                        <div class="news-block-two">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><img src="{{ asset('assets/img/news/news-01.jpg') }}" alt=""></figure>
                                </div>
                                <div class="lower-box">
                                    <div class="post-info">Viernes, 28 de Agosto del 2020</div>
                                    <div class="upper-title">
                                        <h4><a href="{{ route('pages.news.detail', ['id' => 031120, 'title' => 'ciudad-nueva-adelanta-homenaje-a-tacna']) }}">Ciudad Nueva Adelanta Homenaje a Tacna</a></h4>
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
                                    <figure class="image"><img src="{{ asset('assets/img/news/news-02.jpg') }}" alt=""></figure>
                                </div>
                                <div class="lower-box">
                                    <div class="post-info">Viernes, 28 de Agosto del 2020</div>
                                    <div class="upper-title">
                                        <h4><a href="">Ciudad Nueva es el epicentro del Plan Tayta</a></h4>
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
                                    <figure class="image"><img src="{{ asset('assets/img/news/news-03.jpg') }}" alt=""></figure>
                                </div>
                                <div class="lower-box">
                                    <div class="post-info">Viernes, 28 de Agosto del 2020</div>
                                    <div class="upper-title">
                                        <h4><a href="">Clausuran e Intervienen Boticas en Ciudad Nueva</a></h4>
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
                                    <figure class="image"><img src="{{ asset('assets/img/news/news-04.jpg') }}" alt=""></figure>
                                </div>
                                <div class="lower-box">
                                    <div class="post-info">Viernes, 28 de Agosto del 2020</div>
                                    <div class="upper-title">
                                        <h4><a href="">Colegios que Albergarán al Plan Tayta fueron desinfectados</a></h4>
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
                                    <figure class="image"><img src="{{ asset('assets/img/news/news-02.jpg') }}" alt=""></figure>
                                </div>
                                <div class="lower-box">
                                    <div class="post-info">Viernes, 28 de Agosto del 2020</div>
                                    <div class="upper-title">
                                        <h4><a href="">Ciudad Nueva Adelanta Homenaje a Tacna</a></h4>
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
                                    <figure class="image"><img src="{{ asset('assets/img/news/news-01.jpg') }}" alt=""></figure>
                                </div>
                                <div class="lower-box">
                                    <div class="post-info">Viernes, 28 de Agosto del 2020</div>
                                    <div class="upper-title">
                                        <h4><a href="">Ciudad Nueva Adelanta Homenaje a Tacna</a></h4>
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
                                    <figure class="image"><img src="{{ asset('assets/img/news/news-02.jpg') }}" alt=""></figure>
                                </div>
                                <div class="lower-box">
                                    <div class="post-info">Viernes, 28 de Agosto del 2020</div>
                                    <div class="upper-title">
                                        <h4><a href="">Ciudad Nueva Adelanta Homenaje a Tacna</a></h4>
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
                                    <figure class="image"><img src="{{ asset('assets/img/news/news-02.jpg') }}" alt=""></figure>
                                </div>
                                <div class="lower-box">
                                    <div class="post-info">Viernes, 28 de Agosto del 2020</div>
                                    <div class="upper-title">
                                        <h4><a href="">Ciudad Nueva Adelanta Homenaje a Tacna</a></h4>
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
                                    <figure class="image"><img src="{{ asset('assets/img/news/news-02.jpg') }}" alt=""></figure>
                                </div>
                                <div class="lower-box">
                                    <div class="post-info">Viernes, 28 de Agosto del 2020</div>
                                    <div class="upper-title">
                                        <h4><a href="">Ciudad Nueva Adelanta Homenaje a Tacna</a></h4>
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
                                    <figure class="image"><img src="{{ asset('assets/img/news/news-02.jpg') }}" alt=""></figure>
                                </div>
                                <div class="lower-box">
                                    <div class="post-info">Viernes, 28 de Agosto del 2020</div>
                                    <div class="upper-title">
                                        <h4><a href="">Ciudad Nueva Adelanta Homenaje a Tacna</a></h4>
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
                                    <figure class="image"><img src="{{ asset('assets/img/news/news-02.jpg') }}" alt=""></figure>
                                </div>
                                <div class="lower-box">
                                    <div class="post-info">Viernes, 28 de Agosto del 2020</div>
                                    <div class="upper-title">
                                        <h4><a href="">Ciudad Nueva Adelanta Homenaje a Tacna</a></h4>
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
                                    <figure class="image"><img src="{{ asset('assets/img/news/news-02.jpg') }}" alt=""></figure>
                                </div>
                                <div class="lower-box">
                                    <div class="post-info">Viernes, 28 de Agosto del 2020</div>
                                    <div class="upper-title">
                                        <h4><a href="">Ciudad Nueva Adelanta Homenaje a Tacna</a></h4>
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
                                    <figure class="image"><img src="{{ asset('assets/img/news/news-02.jpg') }}" alt=""></figure>
                                </div>
                                <div class="lower-box">
                                    <div class="post-info">Viernes, 28 de Agosto del 2020</div>
                                    <div class="upper-title">
                                        <h4><a href="">Ciudad Nueva Adelanta Homenaje a Tacna</a></h4>
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
                                    <figure class="image"><img src="{{ asset('assets/img/news/news-02.jpg') }}" alt=""></figure>
                                </div>
                                <div class="lower-box">
                                    <div class="post-info">Viernes, 28 de Agosto del 2020</div>
                                    <div class="upper-title">
                                        <h4><a href="">Ciudad Nueva Adelanta Homenaje a Tacna</a></h4>
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
                                    <figure class="image"><img src="{{ asset('assets/img/news/news-02.jpg') }}" alt=""></figure>
                                </div>
                                <div class="lower-box">
                                    <div class="post-info">Viernes, 28 de Agosto del 2020</div>
                                    <div class="upper-title">
                                        <h4><a href="">Ciudad Nueva Adelanta Homenaje a Tacna</a></h4>
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
                <!-- pagination -->
                <div class="pagination-box text-center">
                    <ul class="styled-pagination">
                        <li class="prev"><a href="#"><i class="material-icons">navigate_before</i></a></li>
                        <li><a href="#" class="active">1</a></li>
                        <li><a href="#">2</a></li>
                        <li class="next"><a href="#"><i class="material-icons">navigate_next</i></a></li>
                    </ul>
                </div>
                <!-- pagination -->
            </div>
    
    
    
    </div>
    <div class="col-xl-4">

    hola
    </div>
</section>
@endsection