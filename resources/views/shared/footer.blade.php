

<footer class="flex flex-col">
  <div class="flex flex-col md:flex-row w-full">
    <div
      class="flex sm:flex-wrap items-center justify-center bg-[#E7E7E7] w-full md:w-4/12 gap-5 sm:gap-20 md:gap-10 lg:gap-5 px-10 md:px-8 lg:px-4 py-2 mb-1 md:mb-0"
    >
      <img
        class="w-36 md:w-40 2xl:w-56"
        src="{{ asset('img/logo.png') }}"
        alt="Logo Municipalidad Alto de la Alianza"
      />
      <img
        class="w-36 md:w-40 2xl:w-56"
        src="{{ asset('img/logo4.png') }}"
        
        alt="Logo Slogan Municipalidad Alto de la Alianza"
      />
    </div>
    <div
      class="flex flex-col md:flex-row gap-2 md:gap-8 flex-1 bg-green-light text-white p-8 md:px-16 md:py-10 text-xs md:text-base"
    >
      <div>
        <p>
          Derechos Reservados Municipalidad Distrital Alto de la Alianza
        </p>
        <p>Dirección: {{ $setting->address }}</p>
      </div>

      <div>
        <p>Email: {{ $setting->email }}</p>
        <p>Central Telefonica: {{ $setting->phone }}</p>
      </div>
    </div>
  </div>

  <div
    class="bg-dark-blue text-white text-[0.5rem] md:text-base text-center py-0.5"
  >
    <p class="uppercase">
      Funcionario responsable: Sub gerencia de Tecnologías de la Información
      y Comunicación
    </p>
  </div>
</footer>

@if($last_popup)
<div id="news-popup" class="popup-gallery hidden">
  @foreach($last_popup as $record)
  <a
    href="{{ url($record->imagen) }}"
    ><img
      src="{{ url($record->imagen) }}"
      width="75"
      height="75"
  /></a>
  @endforeach
</div>
@endif
<!-- <script
  src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
  integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8="
  crossorigin="anonymous"
></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script src="./js/slides/homepage.min.js"></script>
<script src="./js/main.min.js"></script> -->