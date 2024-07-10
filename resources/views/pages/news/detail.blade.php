@extends('layouts.app')

@section('content')

<style>
    .slider-container {
    position: relative;
    width: 100%;
    overflow: hidden;
    margin: 20px 0;
}

.slider {
    display: flex;
    transition: transform 0.5s ease;
}

.slider img {
    width: 100%;
    height: auto;
}

.prev, .next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    border: none;
    cursor: pointer;
    padding: 10px;
    z-index: 1;
}

.prev {
    left: 0;
}

.next {
    right: 0;
}
</style>

<section id="vision">
    <div
      class="flex items-center px-10 md:px-20 bg-dark-blue w-full h-16 md:h-20 text-white"
    >
      <h1 class="text-sm md:text-3xl uppercase">Nuestras Noticias</h1>
    
      
    </div>
    <div class="bg-[#E9E9E9]">
      <div
        class="flex flex-col md:flex-row gap-4 px-3 md:px-20 py-2 md:py-10"
      >
        <div class="flex-1 bg-white shadow-md rounded-2xl h-fit p-4 md:p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Content Side -->
                <div class="col-span-1 md:col-span-2">
                    <div class="content-inner">
                        <div class="single-post">
                            <div class="post-details">
                                <div class="main-image-box">
                                    
                                </div>
            
                                <h2 class="text-2xl font-bold"> {!! $main_news->vc_titulo_informacion !!}</h2>
                                <BR></BR>
                                @if ($main_news->tx_contenido_informacion)
                                <p class="text-gray-500">
                                    @php
                                        $programa = strip_tags($main_news->tx_contenido_informacion, '<br>'); // Esto eliminará todas las etiquetas HTML excepto <br>
                                        $programa2 = str_replace('<br>', '', $programa);
                                    @endphp
                                    {{$programa2}}
                                </p>
                                @endif
            
                                <div class="slider-container">
                                    <div class="slider">
                                        @if ($main_news->foto)
                                        <img src="{{ $main_news->foto }}" alt="Foto 1">
                                        @endif
                                        @if ($main_news->foto1)
                                        <img src="{{ $main_news->foto1 }}" alt="Foto 2">
                                        @endif
                                        @if ($main_news->foto2)
                                        <img src="{{ $main_news->foto2 }}" alt="Foto 3">
                                        @endif
                                        @if ($main_news->foto3)
                                        <img src="{{ $main_news->foto3 }}" alt="Foto 3">
                                        @endif
                                        @if ($main_news->foto4)
                                        <img src="{{ $main_news->foto4 }}" alt="Foto 3">
                                        @endif
                                    </div>
                                    <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
                                    <button class="next" onclick="moveSlide(1)">&#10095;</button>
                                </div>
            
                                @if ($main_news->fecha)
                                <p class="text-sm text-gray-500 mt-8">Fecha: {{ $main_news->fecha }}</p>
                                @endif
            
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

        </div>
       


  @include('shared.information')
@endsection
<script>
    let slideIndex = 0;

function moveSlide(n) {
    const slides = document.querySelectorAll('.slider img');
    slideIndex += n;
    if (slideIndex >= slides.length) {
        slideIndex = 0;
    } else if (slideIndex < 0) {
        slideIndex = slides.length - 1;
    }
    const offset = -slideIndex * 100;
    document.querySelector('.slider').style.transform = `translateX(${offset}%)`;
}

</script>