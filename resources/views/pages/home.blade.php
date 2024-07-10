<?php $__env->startSection('content'); ?>
<style>
  .swiper-slide img {
    @apply w-full h-full object-cover; /* Aplica ancho completo, altura completa y ajuste de objeto de la imagen */
  }
</style>


<section class="section" id="slider">
  <div class="swiper main-swiper">
    <div class="swiper-wrapper">
      @foreach($sliders as $slider)
          <div class="swiper-slide">
            <img
              class="w-full"
              src="{{ $slider->img_slide }}"
              alt="Foto principal alto de alianza"
            />
          </div>
      @endforeach
      
    </div>

    <div class="button-next custom-next">
      <svg class="text-white" fill="currentColor" viewBox="0 0 20 20">
        <path
          fill-rule="evenodd"
          d="M7.293 14.707a1 1 0 010-1.414L11.586 9 7.293 4.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z"
          clip-rule="evenodd"
        />
      </svg>
    </div>
    <div class="button-prev custom-prev">
      <svg class="text-white" fill="currentColor" viewBox="0 0 20 20">
        <path
          fill-rule="evenodd"
          d="M12.707 14.707a1 1 0 010-1.414L8.414 9l4.293-4.293a1 1 0 00-1.414-1.414l-5 5a1 1 0 000 1.414l5 5a1 1 0 001.414 0z"
          clip-rule="evenodd"
        />
      </svg>
    </div>
  </div>
</section>
<section class="section flex" id="services">
  <div
    class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4 px-4 md:py-6 md:gap-x-7 md:gap-y-8 mx-auto max-w-[1300px]"
  >
    @foreach($services as $service)
    <div class="service-card-base">
      @if($service->url)
      <a href="{{ $service->url }}" >
      @else
      <a href="/servicios-municipales/{{ $service->slug }}" >
      @endif
        <img src="{{ $service->image }}" />
      </a>
    </div>
    @endforeach

  </div>
</section>
<section class="section hidden md:block bg-[#E3E3E3]" id="news-desktop">
  <div class="flex p-5 lg:max-w-[1300px] mx-auto py-10">
    <div class="max-w-4xl">
      <a href="/noticias"> <h1 class="title">Noticias</h1> </a>
      
      <div
        thumbsSlider=""
        class="swiper news-thumb-swiper h-[435px] rounded-l-xl"
      >
        <div class="swiper-wrapper">

          @foreach($news as $item)
          <div class="swiper-slide">
            <div class="group slide-item">
              <div>
                <img
                  class="max-w-[200px] w-full"
                  src="{{ $item->image }}"
                />
              </div>
              <div class="flex flex-col justify-center gap-2 text-white">
                <p class="text-sm font-bold group-hover:text-white">
                  {{ $item->title }}
                </p>
                <p class="text-xs group-hover:text-white">{{ \Date::parse($item->date)->format('l\, d \d\e\ F \d\e\l\ Y') }}</p>
                <a href="/noticias/{{ $item->slug }}"> <p class="text-xs group-hover:text-white"> ver más </p></a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>

    <div class="w-8/12">
      <div
        class="swiper news-swiper max-w-full max-h-[500px] w-full rounded-xl overflow-hidden"
      >
        <div class="swiper-wrapper w-full">
          @foreach($news as $item)
          <div class="swiper-slide">
            <img
              class="w-full h-full"
              src="{{ $item->image }}"
            />
          </div>
          @endforeach

        </div>

        <div class="button-next custom-next">
          <svg class="text-white" fill="currentColor" viewBox="0 0 20 20">
            <path
              fill-rule="evenodd"
              d="M7.293 14.707a1 1 0 010-1.414L11.586 9 7.293 4.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z"
              clip-rule="evenodd"
            />
          </svg>
        </div>
        <div class="button-prev custom-prev">
          <svg class="text-white" fill="currentColor" viewBox="0 0 20 20">
            <path
              fill-rule="evenodd"
              d="M12.707 14.707a1 1 0 010-1.414L8.414 9l4.293-4.293a1 1 0 00-1.414-1.414l-5 5a1 1 0 000 1.414l5 5a1 1 0 001.414 0z"
              clip-rule="evenodd"
            />
          </svg>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="section md:hidden" id="news-mobile">
  <a href="/noticias"><h1 class="title">Noticias</h1></a>
  <div class="swiper news-swiper bg-dark-blue rounded-tl-xl">
    <div class="swiper-wrapper">

      @foreach($news as $item)
      <div class="swiper-slide">
        <div class="news-slide">
          <div>
            <img src="{{ $item->image }}" />
          </div>
          <div class="flex flex-col justify-center gap-2 text-white">
            <p class="text-sm font-bold">
              {{ $item->title }}
            </p>
            <p class="text-xs">{{ \Date::parse($item->date)->format('l\, d \d\e\ F \d\e\l\ Y') }}</p>
            <a href="/noticias/{{ $item->slug }}"> <p class="text-xs group-hover:text-white"> ver más </p></a>
          </div>
        </div>
      </div>

      @endforeach


    </div>

    <div class="button-next custom-next">
      <svg class="text-white" fill="currentColor" viewBox="0 0 20 20">
        <path
          fill-rule="evenodd"
          d="M7.293 14.707a1 1 0 010-1.414L11.586 9 7.293 4.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z"
          clip-rule="evenodd"
        />
      </svg>
    </div>
    <div class="button-prev custom-prev">
      <svg class="text-white" fill="currentColor" viewBox="0 0 20 20">
        <path
          fill-rule="evenodd"
          d="M12.707 14.707a1 1 0 010-1.414L8.414 9l4.293-4.293a1 1 0 00-1.414-1.414l-5 5a1 1 0 000 1.414l5 5a1 1 0 001.414 0z"
          clip-rule="evenodd"
        />
      </svg>
    </div>
  </div>
</section>

<section class="section hidden md:block" id="works-desktop">
  <div class="flex p-5 lg:max-w-[1300px] mx-auto py-10">
    <div class="max-w-4xl">
      <a href="/obras"><h1 class="title">Obras</h1></a>
      <div
        thumbsSlider=""
        class="swiper works-thumb-swiper border-solid border-l-2 border-t-2 border-b-2 border-[#B0B0B0] h-[435px] rounded-l-xl"
      >
        <div class="swiper-wrapper">
          @foreach($works as $work)
          <div class="swiper-slide">
            <div class="group slide-item">
              <div>
                <img
                  class="max-w-[200px] w-full"
                  src="{{ $work['foto'] }} " alt="Sin Imagen"
                />
              </div>
              <div class="flex flex-col justify-center gap-2 text-white">
                <p class="text-sm font-bold group-hover:text-white">
                  {{ $work['actividad'] }}
                </p>
              </div>
            </div>
          </div>
          @endforeach
                   
        </div>
      </div>
    </div>

    <div class="w-8/12">
      <div
        class="swiper works-swiper max-w-full max-h-[500px] w-full rounded-xl overflow-hidden"
      >
        <div class="swiper-wrapper w-full">
          @foreach($works as $work)
          <div class="swiper-slide">
            <img
              class="w-full h-full"
              src="{{ $work['foto'] }} "
            />
          </div>
          @endforeach
        </div>

        <div class="button-next custom-next">
          <svg class="text-white" fill="currentColor" viewBox="0 0 20 20">
            <path
              fill-rule="evenodd"
              d="M7.293 14.707a1 1 0 010-1.414L11.586 9 7.293 4.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z"
              clip-rule="evenodd"
            />
          </svg>
        </div>
        <div class="button-prev custom-prev">
          <svg class="text-white" fill="currentColor" viewBox="0 0 20 20">
            <path
              fill-rule="evenodd"
              d="M12.707 14.707a1 1 0 010-1.414L8.414 9l4.293-4.293a1 1 0 00-1.414-1.414l-5 5a1 1 0 000 1.414l5 5a1 1 0 001.414 0z"
              clip-rule="evenodd"
            />
          </svg>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="section md:hidden" id="works-mobile">
  <h1 class="title">Obras</h1>
  <div class="swiper works-swiper bg-dark-blue rounded-tl-xl">
    <div class="swiper-wrapper">

      @foreach($works as $work)
        <div class="swiper-slide">
        <div class="works-slide">
          <div>
            <img src="{{ $work['foto'] }}" alt="Foto obras 1" />
          </div>
          <div class="flex flex-col justify-center gap-2 text-white">
            <p class="text-sm font-bold">
              {{ $work['actividad'] }}
            </p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <div class="button-next custom-next">
      <svg class="text-white" fill="currentColor" viewBox="0 0 20 20">
        <path
          fill-rule="evenodd"
          d="M7.293 14.707a1 1 0 010-1.414L11.586 9 7.293 4.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z"
          clip-rule="evenodd"
        />
      </svg>
    </div>
    <div class="button-prev custom-prev">
      <svg class="text-white" fill="currentColor" viewBox="0 0 20 20">
        <path
          fill-rule="evenodd"
          d="M12.707 14.707a1 1 0 010-1.414L8.414 9l4.293-4.293a1 1 0 00-1.414-1.414l-5 5a1 1 0 000 1.414l5 5a1 1 0 001.414 0z"
          clip-rule="evenodd"
        />
      </svg>
    </div>
  </div>
  <div></div>
</section>
<section class="section mt-5" id="photo-gallery">
  <div class="bg-dark-blue py-2 md:pt-6 md:pb-10">
    <h1
    class="text-white text-[14px] md:text-[32px] text-center font-bold mb-3 mt-1"
  >
  <a href="/municipalidad/galeria-de-fotos"></a>
    Galeria de Fotos
  </h1>
    <div class=" flex p-5 py-10 max-w-[350px] md:max-w-[900px] lg:max-w-[1300px] mx-auto">
      


      <div class="swiper photo-gallery-swiper">
        <div class="swiper-wrapper">
          
          @foreach($notice_images as $image)
          <div class="swiper-slide px-[20px]">
            <img src="{{ $image->foto }}" alt="Fotos Alto de Alianza">
          </div>
          @endforeach
          
        </div>
        <div class="button-next custom-next">
          <svg class="text-white" fill="currentColor" viewBox="0 0 20 20">
            <path
              fill-rule="evenodd"
              d="M7.293 14.707a1 1 0 010-1.414L11.586 9 7.293 4.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z"
              clip-rule="evenodd"
            />
          </svg>
        </div>
        <div class="button-prev custom-prev">
          <svg class="text-white" fill="currentColor" viewBox="0 0 20 20">
            <path
              fill-rule="evenodd"
              d="M12.707 14.707a1 1 0 010-1.414L8.414 9l4.293-4.293a1 1 0 00-1.414-1.414l-5 5a1 1 0 000 1.414l5 5a1 1 0 001.414 0z"
              clip-rule="evenodd"
            />
          </svg>
        </div>
      </div>
    </div>
  </div>
  <div></div>
</section>
</section>



<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<div class="max-w-7xl mx-auto">
  <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
      <!-- Normatividad Column -->
      <div class="bg-white p-4 shadow-md rounded-lg">
          <h2 class="text-xl font-bold mb-4" style="color: var(--custom-blue);">Normatividad</h2>
          @foreach($document_types as $document_type)
          <div class="flex items-center border-l-4 border-blue-500 mb-4 p-3 bg-white shadow-sm">
              <div class="flex-shrink-0">
                  <div class="w-12 h-6 bg-white text-blue-500 text-center text-lg flex items-center justify-center">
                      <i class="fa fa-folder"></i>
                  </div>
              </div>
              <div class="flex-grow pl-3">
                  <a href="/normatividad?tipo={{ $document_type->slug }}" title="Actas de Sesión" class="uppercase text-blue-500 hover:text-blue-700">
                      {{ $document_type->name }}
                  </a>
              </div>
          </div>
          @endforeach

          {{--
          <div class="flex items-center border-l-4 border-blue-500 mb-4 p-3 bg-white shadow-sm">
              <div class="flex-shrink-0">
                  <div class="w-12 h-6 bg-white text-blue-500 text-center text-lg flex items-center justify-center">
                      <i class="fa fa-folder"></i>
                  </div>
              </div>
              <div class="flex-grow pl-3">
                  <a href="#" title="Acuerdos de Concejo" class="uppercase text-blue-500 hover:text-blue-700">
                      Acuerdos de Concejo
                  </a>
              </div>
          </div>
          <div class="flex items-center border-l-4 border-blue-500 mb-4 p-3 bg-white shadow-sm">
              <div class="flex-shrink-0">
                  <div class="w-12 h-6 bg-white text-blue-500 text-center text-lg flex items-center justify-center">
                      <i class="fa fa-folder"></i>
                  </div>
              </div>
              <div class="flex-grow pl-3">
                  <a href="#" title="Convenios" class="uppercase text-blue-500 hover:text-blue-700">
                      Ordenanzas municipales
                  </a>
              </div>
          </div>
          --}}
      </div>

      <!-- Enlaces Column -->
      <div class="bg-white p-4 shadow-md rounded-lg">
          <h2 class="text-xl font-bold mb-4" style="color: var(--custom-blue);">Enlaces</h2>
          @foreach($last_documents as $document)
          <div class="flex items-center border-l-4 border-green-500 mb-4 p-3 bg-white shadow-sm">
            <div class="flex-shrink-0">
                <div class="w-12 h-6 bg-white text-green-500 text-center text-lg flex items-center justify-center">
                    <i class="fa fa-folder"></i>
                </div>
            </div>

            
            <div class="flex-grow pl-3">
              @if($document->url)
              <a href="{{ $document->url }}" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2" target="_blank" 
                >{{ $document->title }}</a>
                @else

                <a
              href="/enlaces/{{ $document->slug }}"
              class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2"
              >{{ $document->title }}</a
            >
                @endif

              
            </div>
          </div>

    
          @endforeach



          
      </div>

      <!-- Favoritos Column -->
      <div class="bg-white p-4 shadow-md rounded-lg">
          <h2 class="text-xl font-bold mb-4" style="color: var(--custom-blue);">Favoritos</h2>

          @foreach($inst_documents as $document)
         
          <div class="flex items-center border-l-4 border-blue-500 mb-4 p-3 bg-white shadow-sm">
            <div class="flex-shrink-0">
                <div class="w-12 h-6 bg-white text-blue-500 text-center text-lg flex items-center justify-center">
                    <i class="fa fa-folder"></i>
                </div>
            </div>
            <div class="flex-grow pl-3">

              @if($document->url)
              <a href="{{ $document->url }}" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2" target="_blank" 
                >{{ $document->title }}</a>
              @else
              <a
              href="/favoritos/{{ $document->slug }}"
              class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2"
              >{{ $document->title }}</a
            >
            @endif
            </div>
          </div>
          @endforeach

         
      </div>
  </div>
</div>



</section>
<section class="section" id="links">
  <h1 class="title md:hidden">Enlaces</h1>
  <div class="swiper links-swiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <img class="mx-auto" src="icons/INDECOPI.svg" alt="Indecopi" />
      </div>
      <div class="swiper-slide">
        <img
          class="mx-auto"
          src="icons/CONTRALORIA.svg"
          alt="Contraloria"
        />
      </div>
      <div class="swiper-slide">
        <img class="mx-auto" src="icons/OSCE.svg" alt="Osce" />
      </div>
      <div class="swiper-slide">
        <img class="mx-auto" src="icons/SUNASS.svg" alt="Sunass" />
      </div>
    </div>

    <div class="button-next custom-next">
      <svg fill="currentColor" viewBox="0 0 20 20">
        <path
          fill-rule="evenodd"
          d="M7.293 14.707a1 1 0 010-1.414L11.586 9 7.293 4.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z"
          clip-rule="evenodd"
        />
      </svg>
    </div>
    <div class="button-prev custom-prev">
      <svg fill="currentColor" viewBox="0 0 20 20">
        <path
          fill-rule="evenodd"
          d="M12.707 14.707a1 1 0 010-1.414L8.414 9l4.293-4.293a1 1 0 00-1.414-1.414l-5 5a1 1 0 000 1.414l5 5a1 1 0 001.414 0z"
          clip-rule="evenodd"
        />
      </svg>
    </div>
  </div>


    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
