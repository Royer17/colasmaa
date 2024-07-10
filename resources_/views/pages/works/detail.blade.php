@extends('layouts.app')

@section('content')
<section class="page-banner">
    <div class="image-layer" style="background-image:url({{ asset('/assets/img/bgs/banner-img-1.jpg') }})"></div>
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
<div class="sidebar-page-container">
    <div class="container-lg">
        <div class="row clearfix">
            <!--Content Side-->
            <div class="content-side col-lg-8 col-md-12 col-sm-12">
                <div class="content-inner">
                    <div class="single-post">
                        <div class="post-details">
                            <div class="main-image-box">
                                <figure class="image"><img src="{{ asset('/assets/img/news/news-01.jpg') }}" alt=""></figure>
                            </div>

                            <h2>{!! $works->actividad !!}</h2>

                            {!! $works->programa !!}

                            <br>
                            <img src="/{{ $works->foto }}" style="  display: block;margin-left: auto;margin-right: auto;width: 50%;">

                            <br>
                            <img src="/{{ $works->foto1 }}" style="  display: block;margin-left: auto;margin-right: auto;width: 50%;">

                            <br>
                            <img src="/{{ $works->foto2 }}" style="  display: block;margin-left: auto;margin-right: auto;width: 50%;">

                            <!-- <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eaque qui officia ipsum esse neque excepturi sed officiis libero! Labore aperiam consectetur nulla illum tempora vitae sed laborum veniam reiciendis delectus?</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, saepe, inventore possimus asperiores, laboriosam temporibus explicabo maxime nisi hic deserunt molestias veritatis minima fugit dolorem nesciunt excepturi consequuntur. Vero, delectus?</p> -->
                            <br>

                            Fecha de inicio: {!! $works->fechaini !!}
                            <br>
                            Fecha de término: {!! $works->fechater !!}
                        </div>
                        <div class="share-post">
                            <strong>Comparte esta publicación con tus amigos</strong>
                            <ul class="links clearfix">
                                <li class="facebook"><a href="#"><span class="txt">Facebook</span></a></li>
                                <li class="twitter"><a href="#"><span class="txt">Twiter</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Sidebar Side-->
            <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                <aside class="sidebar">
                    <div class="bg-layer">
                        <div class="image-layer"></div>
                    </div>
                    <div class="sidebar-widget search-box">
                        <div class="widget-inner">
                            <div class="sidebar-title">
                                <h4>Buscar</h4>
                            </div>
                            <form method="GET" action="">
                                <div class="form-group">
                                    <input type="search" name="q" placeholder="Búsqueda por título" required>
                                    <button type="submit"><span class="material-icons">search</span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- post -->
                    <div class="sidebar-widget recent-posts">
                        <div class="widget-inner">
                            <div class="sidebar-title">
                                <h4>Últimas Obras</h4>
                            </div>
                            <div class="recent-posts-box">
                                @foreach($other_works as $item)
                                <div class="post">
                                    <div class="inner">
                                        <figure class="post-thumb">
                                            <img src="{{ $item->foto }}" alt="">
                                            <a href="" class="overlink"><span class="icon material-icons">info</span></a>
                                        </figure>
                                        <div class="post-date">{{ $item->fechaini }}</div>
                                        <h5 class="title"><a href="/obras/{{ $item->slug }}">{{ $item->actividad }}</a></h5>
                                    </div>
                                </div>
                                @endforeach
                                {{-- 
                                <div class="post">
                                    <div class="inner">
                                        <figure class="post-thumb">
                                            <img src="{{ asset('/assets/img/news/news-03.jpg') }}" alt="">
                                            <a href="" class="overlink"><span class="icon material-icons">info</span></a>
                                        </figure>
                                        <div class="post-date">Hace 2 minutos</div>
                                        <h5 class="title"><a href="">Clausuran e Intervienen Boticas en Ciudad Nueva</a></h5>
                                    </div>
                                </div>
                                <div class="post">
                                    <div class="inner">
                                        <figure class="post-thumb">
                                            <img src="{{ asset('/assets/img/news/news-04.jpg') }}" alt="">
                                            <a href="" class="overlink"><span class="icon material-icons">info</span></a>
                                        </figure>
                                        <div class="post-date">Hace 2 minutos</div>
                                        <h5 class="title"><a href="">Clausuran e Intervienen Boticas en Ciudad Nueva</a></h5>
                                    </div>
                                </div>
                                --}}
                            </div>
                        </div>
                    </div>
                    <!-- tags -->
                    <div class="sidebar-widget popular-tags">
                        <div class="widget-inner">
                            <div class="sidebar-title">
                                <h4>Tags</h4>
                            </div>
                            <ul class="tags-list clearfix">
                                <li><a href="">Cultura</a></li>
                                <li><a href="">Seguridad</a></li>
                                <li><a href="">Deportes</a></li>
                                <li><a href="">Recreación</a></li>
                            </ul>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>
@endsection