<div class="hidden md:flex flex-col gap-5">

    
  </div>
</div>
</div>
</section>



<section class="section md:hidden" id="news-mobile">
<h1 class="title">Noticias</h1>
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


<section class="section md:hidden mt-10" id="services">
<div
class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4 px-4 md:px-20 md:py-6 md:gap-x-7 md:gap-y-8"
>



@foreach($services as $service)
@if($service->url)
<div class="service-card-base">
  <a href="{{ $service->url }}" target="_blank"> <img src="{{ $service->image }}" /> </a>
</div>
@else
<div class="service-card-base">
  <a href="/servicios-municipales/{{ $service->slug }}" target="_blank"> <img src="{{ $service->image }}" /> </a>
</div>
@endif
@endforeach

</div>
</section>



