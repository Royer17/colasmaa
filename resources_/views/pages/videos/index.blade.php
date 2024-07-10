@extends('layouts.app')

@section('content')
<section class="page-banner">
    <div class="image-layer" style="background-image:url({{ asset('assets/img/bgs/banner-img-1.jpg') }})"></div>
    <div class="banner-inner">
        <div class="container-lg">
            <div class="inner-container clearfix">
                <h1>Videos</h1>
                <div class="page-nav">
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ route('pages.home') }}">Inicio</a></li>
                        <li class="active">Videos</li>
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
                    @foreach($videos as $video)
                        @php
                            $video_url_arr = explode("=", $video->video);
                            $video_id = "";
                            if(count($video_url_arr) >= 2){
                                $video_id = $video_url_arr[1];
                            }
                        @endphp
                    <div class="column col-lg-6 col-md-6 col-sm-12">
                        <!-- item -->
                        <div class="news-block-two">
                            <div class="inner-box">
                                <div class="image-box">
                                    <!-- <figure class="image"><img src="" alt=""></figure> -->
                                </div>
                                <div class="lower-box">
                                    <div class="post-info">{{ \Date::parse($video->created_at)->format('l\, d \d\e\ F \d\e\l\ Y') }}</div>
                                    <div class="upper-title">
                                        <h4><a href="#">{{ $video->title }}</a></h4>
                                    </div>
                                    <div class="">
                                    <iframe width="500" height="300"  src="https://www.youtube.com/embed/{{ $video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- item -->
                    </div>
                    @endforeach
                    <!-- col -->
                </div>
                <!-- rows -->
                <!-- pagination -->
                @if ($videos->hasPages())
                <div class="pagination-box text-center">
                        <ul class="pagination">

                            @if($videos->currentPage() >= 3)
                                <li class="hidden-xs"><a href="{{ $videos->url(1) }}" style="margin-right: 16px;">1</a></li>
                            @endif
                            @if($videos->currentPage() == 4)
                                <li class="hidden-xs"><a href="{{ $videos->url(2) }}" style="margin-right: 16px;">2</a></li>
                            @endif
                            @if($videos->currentPage() > 4)
                                <li><span style="margin-right: 16px;">...</span></li>
                            @endif
                            @foreach(range(1, $videos->lastPage()) as $i)
                                @if($i >= $videos->currentPage() - 1 && $i <= $videos->currentPage() + 1)
                                    @if ($i == $videos->currentPage())
                                        <li class="active"><span style="margin-right: 16px;">{{ $i }}</span></li>
                                    @else
                                        <li><a href="{{ $videos->url($i) }}" style="margin-right: 16px;">{{ $i }}</a></li>
                                    @endif
                                @endif
                            @endforeach
                            @if($videos->currentPage() < $videos->lastPage() - 3)
                                <li><span style="margin-right: 16px;">...</span></li>
                            @endif
                            @if($videos->currentPage() < $videos->lastPage() - 2)
                                <li class="hidden-xs"><a href="{{ $videos->url($videos->lastPage()) }}" style="margin-right: 16px;">{{ $videos->lastPage() }}</a></li>
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