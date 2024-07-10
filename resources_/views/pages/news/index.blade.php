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
                        <li class="active">Noticias</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="default-section">
    <div class="col">
            
            <div class="container-lg">
              <!-- rows -->
                <div class="row clearfix">
                    <!-- col -->
                    @foreach($news as $item)
                    <div class="column col-lg-4 col-md-6 col-sm-12">
                        <!-- item -->
                        <div class="news-block-two">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><img src="{{ $item->image }}" alt=""></figure>
                                </div>
                                <div class="lower-box">
                                    <div class="post-info">{{ \Date::parse($item->created_at)->format('l\, d \d\e\ F \d\e\l\ Y') }}</div>
                                    <div class="upper-title">
                                        <h4><a href="/noticias/{{ $item->slug }}">{{ $item->title }}</a></h4>
                                    </div>
                                    <div class="more-link"><a href="/noticias/{{ $item->slug }}">Sigue Leyendo</a></div>
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
                @if ($news->hasPages())
                <div class="pagination-box text-center">
                        <ul class="pagination">

                            @if($news->currentPage() >= 3)
                                <li class="hidden-xs"><a href="{{ $news->url(1) }}" style="margin-right: 16px;">1</a></li>
                            @endif
                            @if($news->currentPage() == 4)
                                <li class="hidden-xs"><a href="{{ $news->url(2) }}" style="margin-right: 16px;">2</a></li>
                            @endif
                            @if($news->currentPage() > 4)
                                <li><span style="margin-right: 16px;">...</span></li>
                            @endif
                            @foreach(range(1, $news->lastPage()) as $i)
                                @if($i >= $news->currentPage() - 1 && $i <= $news->currentPage() + 1)
                                    @if ($i == $news->currentPage())
                                        <li class="active"><span style="margin-right: 16px;">{{ $i }}</span></li>
                                    @else
                                        <li><a href="{{ $news->url($i) }}" style="margin-right: 16px;">{{ $i }}</a></li>
                                    @endif
                                @endif
                            @endforeach
                            @if($news->currentPage() < $news->lastPage() - 3)
                                <li><span style="margin-right: 16px;">...</span></li>
                            @endif
                            @if($news->currentPage() < $news->lastPage() - 2)
                                <li class="hidden-xs"><a href="{{ $news->url($news->lastPage()) }}" style="margin-right: 16px;">{{ $news->lastPage() }}</a></li>
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