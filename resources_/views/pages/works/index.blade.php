@extends('layouts.app')

@section('content')
<section class="page-banner">
    <div class="image-layer" style="background-image:url({{ asset('assets/img/bgs/banner-img-1.jpg') }})"></div>
    <div class="banner-inner">
        <div class="container-lg">
            <div class="inner-container clearfix">
                <h1>Obras</h1>
                <div class="page-nav">
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ route('pages.home') }}">Inicio</a></li>
                        <li class="active">Obras</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="default-section">


    <div class="see-more centered">
        <a href="/obras" class="theme-btn btn-style-three text-uppercase"><span class="btn-title">Todos</span></a>
        <a href="/obras?tipo=ejecutadas" class="theme-btn btn-style-three text-uppercase"><span class="btn-title">Realizadas</span></a>
        <a href="/obras?tipo=en-proceso" class="theme-btn btn-style-three text-uppercase"><span class="btn-title">En Proceso</span></a>
        <a href="/obras?tipo=por-ejecutar" class="theme-btn btn-style-three text-uppercase"><span class="btn-title">Por ejecutar</span></a>
    </div>
    <br>
    <div class="col-xl-8 ">

            <div class="container-lg">
              <!-- rows -->
                <div class="row clearfix">
                    <!-- col -->
                    @foreach($works as $item)
                    <div class="column col-lg-4 col-md-6 col-sm-12">
                        <!-- item -->
                        <div class="news-block-two">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><img src="{{ $item->foto }}" alt=""></figure>
                                </div>
                                <div class="lower-box">
                                    <div class="post-info">{{ \Date::parse($item->fechaini)->format('l\, d \d\e\ F \d\e\l\ Y') }}</div>
                                    <div class="upper-title">
                                        <h4><a href="/obras/{{ $item->slug }}">{{ $item->actividad }}</a></h4>
                                    </div>
                                    <div class="more-link"><a href="/obras/{{ $item->slug }}">Sigue Leyendo</a></div>
                                </div>
                            </div>
                        </div>
                        <!-- item -->
                    </div>
                    @endforeach
                    {{-- 
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
                    --}}
                    <!-- col -->
                </div>
                <!-- rows -->
                <!-- pagination -->
                @if ($works->hasPages())
                <div class="pagination-box text-center">
                        <ul class="pagination">

                            @if($works->currentPage() >= 3)
                                <li class="hidden-xs"><a href="{{ $works->url(1) }}" style="margin-right: 16px;">1</a></li>
                            @endif
                            @if($works->currentPage() == 4)
                                <li class="hidden-xs"><a href="{{ $works->url(2) }}" style="margin-right: 16px;">2</a></li>
                            @endif
                            @if($works->currentPage() > 4)
                                <li><span style="margin-right: 16px;">...</span></li>
                            @endif
                            @foreach(range(1, $works->lastPage()) as $i)
                                @if($i >= $works->currentPage() - 1 && $i <= $works->currentPage() + 1)
                                    @if ($i == $works->currentPage())
                                        <li class="active"><span style="margin-right: 16px;">{{ $i }}</span></li>
                                    @else
                                        <li><a href="{{ $works->url($i) }}" style="margin-right: 16px;">{{ $i }}</a></li>
                                    @endif
                                @endif
                            @endforeach
                            @if($works->currentPage() < $works->lastPage() - 3)
                                <li><span style="margin-right: 16px;">...</span></li>
                            @endif
                            @if($works->currentPage() < $works->lastPage() - 2)
                                <li class="hidden-xs"><a href="{{ $works->url($works->lastPage()) }}" style="margin-right: 16px;">{{ $works->lastPage() }}</a></li>
                            @endif
                        </ul>


<!--                     <ul class="styled-pagination">
                        <li class="prev"><a href="#"><i class="material-icons">navigate_before</i></a></li>
                        <li><a href="#" class="active">1</a></li>
                        <li><a href="#">2</a></li>
                        <li class="next"><a href="#"><i class="material-icons">navigate_next</i></a></li>
                    </ul> -->
                </div>
                @endif

                <!-- pagination -->
            </div>
    
    
    
    </div>
    <div class="col-xl-4">
    </div>
</section>
@endsection