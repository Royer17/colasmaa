<nav class="bg-white">
  <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
    <div class="relative flex items-center justify-between h-16">
      <div class="absolute inset-y-0 right-0 flex items-center md:hidden">
        <button
          id="menu-button"
          type="button"
          class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-gray-500"
          aria-controls="mobile-menu"
          aria-expanded="false"
          onclick="toggleMenu()"
        >
          <span class="sr-only">Open main menu</span>
          <svg
            id="menu-icon"
            class="block h-6 w-6"
            xmlns="http://www.w3.org/2000/svg"
            fill="currentColor"
            viewBox="0 0 24 24"
            aria-hidden="true"
          >
            <path
              fill-rule="evenodd"
              d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"
            />
          </svg>
        </button>
      </div>
      <div
        class="flex-1 flex items-center sm:items-stretch sm:justify-start"
      >
        <div
          class="flex w-full md:justify-between gap-4 md:gap-0 px-2 py-2 h-fit"
        >
          <div class="flex items-center gap-8 max-w-32 md:max-w-[300px]">
            <a href="{{ route('pages.home') }}">
              <img
              src="{{ $setting->cover }}"
                alt="Municipalidad Alto de la Alianza Logo"
              />
            </a>
            <a class="hidden md:block" href="{{ route('pages.home') }}">
              <img
              src="{{ $setting->image1 }}"
                alt="Municipalidad Alto de la Alianza Slogan"
              />
            </a>
          </div>
          <div class="flex gap-4 items-center">
            <div class="hidden md:flex gap-2 max-w-28">
              <a href="{{ $setting->facebook }}"  target="_blank">
                <img src="{{ asset('img/fb.png') }}" alt="Facebook" />
              </a>
              <a href="{{ $setting->tiktok }}"  target="_blank">
                <img src="{{ asset('img/tiktok.png') }}" alt="Tiktok" />
              </a>
              <a href="{{ $setting->instagram }}"  target="_blank">
                <img src="{{ asset('img/ig.png') }}" alt="instagram" />
              </a>
              <!-- <a href="{{ $setting->youtube }}"  target="_blank">
                <img src="{{ asset('img/ig.png') }}" alt="youtube" />
              </a> -->
            </div>
            <a href="/mesa_partes" target="_blank" >
              <img
                src="{{ $setting->image2 }}"
                class="max-w-[110px]"
                alt="Portal de Transparencia"
              />
            </a>
            <a href="/portal-de-transparencia" target="_blank" >
              <img
                src="{{ $setting->image3 }}"
                class="max-w-[110px]"
                alt="Portal de Transparencia"
              />
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div
    class="hidden md:flex justify-center mx-auto bg-[#E9E9E9] rounded-t-full w-fit lg:px-5 xl:px-5 2xl:px-20"
  >
    <div class="flex items-center md:space-x-0 lg:space-x-2 xl:space-x-4">
      <a
        href="{{ route('pages.home') }}"
        class="text-black block px-1 2xl:px-3 py-2 rounded-md md:text-xs xl:text-base font-medium"
        >Inicio</a
      >

      <div class="h-6 bg-dark-blue w-0.5"></div>

      <a
        href="/rendicion-de-cuentas"
        class="text-black block px-1 2xl:px-3 py-2 rounded-md md:text-xs xl:text-base font-medium"
        >Informe de Rendición Cuentas</a
      >
      <div class="h-6 bg-dark-blue w-0.5"></div>

      <button
      id="dropdownNavbarLink"
      data-dropdown-toggle="dropdownNavbar"
      class="text-black font-medium flex items-center justify-between w-fit"
    >
      El Distrito
      <svg
        class="w-4 h-4 ml-1"
        fill="currentColor"
        viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"
        ></path>
      </svg>
    </button>
    <div
      id="dropdownNavbar"
      class="hidden bg-white text-base z-10 list-none divide-y divide-gray-100 rounded shadow my-4 w-44"
    >
      <ul class="py-1" aria-labelledby="dropdownLargeButton">
        <li>
          <a
            href="/distrito/historia"
            class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2"
            >Historia</a
          >
        </li>
        <li>
          <a
            href="/distrito/turismo"
            class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2"
            >Turismo</a
          >
        </li>
        <li>
          <a
            href="/municipalidad/galeria-de-fotos"
            class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2"
            >Galeia de Fotos</a
          >
        </li>
      </ul>
    </div>


        <div class="h-6 bg-dark-blue w-0.5"></div>


      <button
        id="dropdownNavbarLink"
        data-dropdown-toggle="dropdownNavbar2"
        class="text-black font-medium flex items-center justify-between w-fit"
      >
        La Municipalidad
        <svg
          class="w-4 h-4 ml-1"
          fill="currentColor"
          viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            fill-rule="evenodd"
            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
            clip-rule="evenodd"
          ></path>
        </svg>
      </button>
      <div
        id="dropdownNavbar2"
        class="hidden bg-white text-base z-10 list-none divide-y divide-gray-100 rounded shadow my-4 w-44"
      >
        <ul class="py-1" aria-labelledby="dropdownLargeButton">
          <li>
            <a
              href="/municipalidad/mision-y-vision"
              class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2"
              >Misión y Visión</a
            >
          </li>
          <li>
            <a
              href="/municipalidad/alcalde"
              class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2"
              >Alcalde</a
            >
          </li>
        </ul>
        <div class="py-1">
          <a
            href="{{ route('pages.municipality.city-council') }}"
            class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2"
            >Concejo Municipal </a
          >
        </div>
        <div class="py-1">
          <a
            href="/municipalidad/funcionarios"
            class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2"
            >Funcionarios</a
          >
        </div>
        <div class="py-1">
          <a
            href="/municipalidad/organigrama"
            class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2"
            >Organigrama </a
          >
        </div>

        <div class="py-1">
          <a
            href="/municipalidad/directorio"
            class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2"
            >Directorio Telefónico </a
          >
        </div>
        <div class="py-1">
          <a
            href="{{ route('pages.municipality.commissions') }}"
            class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2"
            >Comisiones de Regidores</a
          >
        </div>
        <div class="py-1">
          <a
            href="/municipalidad/planeamiento-y-organizacion"
            class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2"
            >Planeamiento y Organización </a
          >
        </div>
        <div class="py-1">
          <a
            href="/municipalidad/directivas"
            class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2"
            >Directivas Municipal </a
          >
        </div>
      </div>
      <div class="h-6 bg-dark-blue w-0.5"></div>
      <a
        href="/obras"
        class="text-black block px-1 2xl:px-3 py-2 rounded-md md:text-xs xl:text-base font-medium"
        >Obras</a
      >
      <div class="h-6 bg-dark-blue w-0.5"></div>

      
      <button
      id="dropdownNavbarLink"
      data-dropdown-toggle="dropdownNavbar3"
      class="text-black font-medium flex items-center justify-between w-fit"
    >
      Enlaces
  
      <svg
        class="w-4 h-4 ml-1"
        fill="currentColor"
        viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"
        ></path>
      </svg>
    </button>
    <div
      id="dropdownNavbar3"
      class="hidden bg-white text-base z-10 list-none divide-y divide-gray-100 rounded shadow my-4 w-44"
    >
      <ul class="py-1" aria-labelledby="dropdownLargeButton">
        @foreach($last_documents as $document)
        <li>
          @if($document->url)
            <a href="{{ $document->url }}" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2" target="_blank" 
            >{{ $document->title }}</a>
          @else
            <a href="/enlaces/{{ $document->slug }}" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2"
            >{{ $document->title }}</a>
          @endif

        </li>
        @endforeach

      </ul>
    </div>

      <div class="h-6 bg-dark-blue w-0.5"></div>
        <button
        id="dropdownNavbarLink"
        data-dropdown-toggle="dropdownNavbar4"
        class="text-black font-medium flex items-center justify-between w-fit"
      >
        Servicios
    
        <svg
          class="w-4 h-4 ml-1"
          fill="currentColor"
          viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            fill-rule="evenodd"
            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
            clip-rule="evenodd"
          ></path>
        </svg>
      </button>
      <div
        id="dropdownNavbar4"
        class="hidden bg-white text-base z-10 list-none divide-y divide-gray-100 rounded shadow my-4 w-44"
      >
        <ul class="py-1" aria-labelledby="dropdownLargeButton">
          @foreach($services as $service)
          <li>
            @if($service->url)
              <a href="{{ $service->url }}" target="_blank" 
              class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2"
              >{{ $service->title }}</a>
            @else
              <a href="/servicios-municipales/{{ $service->slug }}"
              class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2"
              >{{ $service->title }}</a>
            @endif
            
          </li>
          @endforeach

        </ul>
      </div>
      <div class="h-6 bg-dark-blue w-0.5"></div>
        <button
        id="dropdownNavbarLink"
        data-dropdown-toggle="dropdownNavbar5"
        class="text-black font-medium flex items-center justify-between w-fit"
      >
        Favoritos
    
        <svg
          class="w-4 h-4 ml-1"
          fill="currentColor"
          viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            fill-rule="evenodd"
            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
            clip-rule="evenodd"
          ></path>
        </svg>
      </button>
      <div
        id="dropdownNavbar5"
        class="hidden bg-white text-base z-10 list-none divide-y divide-gray-100 rounded shadow my-4 w-44"
      >
        <ul class="py-1" aria-labelledby="dropdownLargeButton">
          @foreach($inst_documents as $document)
          <li>
            @if($document->url)
            <a href="{{ $document->url }}" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2" target="_blank" 
              >{{ $document->title }}</a>
            @else
              <a href="/favoritos/{{ $document->slug }}" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2"
              >{{ $document->title }}</a>

            @endif
          </li>
          @endforeach

        </ul>
      </div>
      <div class="h-6 bg-dark-blue w-0.5"></div>
      <a
        href="/portal-de-transparencia"
        class="text-black block px-1 2xl:px-3 py-2 rounded-md md:text-xs xl:text-base font-medium"
        target="_blank" >Portal de Transparencia</a
      >


    </div>
  </div>


<!-- moblile -->
  <div class="hidden" id="mobile-menu">
    <div class="px-2 pt-2 pb-3 space-y-1 absolute bg-white w-full z-50 md:hidden">
      <a
      href="{{ route('pages.home') }}"
      class="text-gray-900 block px-3 py-2 rounded-md text-base font-medium"
      >Inicio</a
      >
      <a
        href="/rendicion-de-cuentas"
        class="text-gray-900 block px-3 py-2 rounded-md text-base font-medium"
        >Informe de Rendición de Cuentas</a
      >
      <!-- Distrito mobile -->
      <button
        id="dropdownNavbarLink"
        data-dropdown-toggle="dropdownNavbar11"
        class="text-gray-900 block px-3 py-2 rounded-md text-base font-medium flex items-center justify-between w-fit"
      >
        El Distrito
        <svg
          class="w-4 h-4 ml-1"
          fill="currentColor"
          viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            fill-rule="evenodd"
            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
            clip-rule="evenodd"
          ></path>
        </svg>
      </button>
      <div
        id="dropdownNavbar11"
        class="hidden bg-white text-base z-10 list-none divide-y divide-gray-100 rounded shadow my-154 w-244"
      >
        <ul class="py-1" aria-labelledby="dropdownLargeButton">
          <li>
            <a
              href="/distrito/historia"
              class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2"
              >Historia</a
            >
          </li>
          <li>
            <a
              href="/distrito/turismo"
              class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2"
              >Turismo</a
            >
          </li>
          <li>
            <a
              href="/municipalidad/galeria-de-fotos"
              class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2"
              >Galería de Fotos</a
            >
          </li>
        </ul>
      </div>
      <!-- fin Distrito mobile -->
      <!-- Municipalidad mobile -->
      <button
        id="dropdownNavbarLink"
        data-dropdown-toggle="dropdownNavbar12"
        class="text-gray-900 block px-3 py-2 rounded-md text-base font-medium flex items-center justify-between w-fit "
      >
        La Municipalidad
        <svg
          class="w-4 h-4 ml-1"
          fill="currentColor"
          viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            fill-rule="evenodd"
            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
            clip-rule="evenodd"
          ></path>
        </svg>
      </button>
      <div
        id="dropdownNavbar12"
        class="hidden bg-white text-base z-10 list-none divide-y divide-gray-100 rounded shadow my-154 w-244"
      >
        <ul class="py-1" aria-labelledby="dropdownLargeButton">
          <li>
            <a
              href="/municipalidad/mision-y-vision"
              class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2"
              >Misión y Visión</a
            >
          </li>
          <li>
            <a
              href="/municipalidad/alcalde"
              class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2"
              >Alcalde</a
            >
          </li>
        </ul>
        <div class="py-1">
          <a
            href="{{ route('pages.municipality.city-council') }}"
            class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2"
            >Concejo Municipal </a
          >
        </div>
        <div class="py-1">
          <a
             href="/municipalidad/funcionarios"
            class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2"
            >Funcionarios</a
          >
        </div>
        <div class="py-1">
          <a
          href="/municipalidad/organigrama"
            class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2"
            >Organigrama </a
          >
        </div>

        <div class="py-1">
          <a
          href="/municipalidad/directorio"
            class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2"
            >Directorio Telefónico </a
          >
        </div>
        <div class="py-1">
          <a
          href="{{ route('pages.municipality.commissions') }}"
            class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2"
            >Comisiones de Regidores</a
          >
        </div>
        <div class="py-1">
          <a
          href="/municipalidad/planeamiento-y-organizacion"
            class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2"
            >Planeamiento y Organización </a
          >
        </div>
        <div class="py-1">
          <a
            href="/municipalidad/directivas"
            class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2"
            >Directivas Municipal </a
          >
        </div>
      </div>
      <!--Fin municipalidad mobile -->
      <a
        
        href="/obras"
        class="text-gray-900 block px-3 py-2 rounded-md text-base font-medium"
        >Obras Municipales</a
      >

       <!-- Enlaces mobile -->
      <button
      id="dropdownNavbarLink"
      data-dropdown-toggle="dropdownNavbar13"
      class="text-gray-900 block px-3 py-2 rounded-md text-base font-medium flex items-center justify-between w-fit"
    >
      Enlaces
  
      <svg
        class="w-4 h-4 ml-1"
        fill="currentColor"
        viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"
        ></path>
      </svg>
    </button>
    <div
      id="dropdownNavbar13"
      class="hidden bg-white text-base z-10 list-none divide-y divide-gray-100 rounded shadow my-154 w-244"
    >
      <ul class="py-1" aria-labelledby="dropdownLargeButton">
        @foreach($last_documents as $document)
        <li>
          <a
            href="/enlaces/{{ $document->slug }}"
            class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2"
            >{{ $document->title }}</a
          >
        </li>
        @endforeach

      </ul>
    </div>
     <!-- fin Enlaces mobile -->
    <!-- Servicio mobile -->
    <button
        id="dropdownNavbarLink"
        data-dropdown-toggle="dropdownNavbar14"
        class="text-gray-900 block px-3 py-2 rounded-md text-base font-medium flex items-center justify-between w-fit"
      >
        Servicios
    
        <svg
          class="w-4 h-4 ml-1"
          fill="currentColor"
          viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            fill-rule="evenodd"
            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
            clip-rule="evenodd"
          ></path>
        </svg>
      </button>
      <div
        id="dropdownNavbar14"
        class="hidden bg-white text-base z-10 list-none divide-y divide-gray-100 rounded shadow my-154 w-244"
      >
        <ul class="py-1" aria-labelledby="dropdownLargeButton">
          @foreach($services as $service)
          <li>
            @if($service->url)
              <a href="{{ $service->url }}" target="_blank" 
              class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2"
              >{{ $service->title }}</a>
            @else
              <a href="/servicios-municipales/{{ $service->slug }}" target="_blank" 
              class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2"
              >{{ $service->title }}</a>
            @endif
            
          </li>
          @endforeach

        </ul>
      </div>
    <!--Fin servicio mobile-->
     <!-- Favoritos mobile -->
      <button
      id="dropdownNavbarLink"
      data-dropdown-toggle="dropdownNavbar15"
      class="text-gray-900 block px-3 py-2 rounded-md text-base font-medium flex items-center justify-between w-fit"
    >
      Favoritos
  
      <svg
        class="w-4 h-4 ml-1"
        fill="currentColor"
        viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"
        ></path>
      </svg>
    </button>
    <div
      id="dropdownNavbar15"
      class="hidden bg-white text-base z-10 list-none divide-y divide-gray-100 rounded shadow my-154 w-244"
    >
      <ul class="py-1" aria-labelledby="dropdownLargeButton">
        @foreach($inst_documents as $document)
        <li>
          <a
            href="/favoritos/{{ $document->slug }}"
            class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2"
            >{{ $document->title }}</a
          >
        </li>
        @endforeach

      </ul>
    </div>
    <!--Fin  Favoritos mobile -->
      <a
        href="/portal-de-transparencia"
        class="text-gray-900 block px-3 py-2 rounded-md text-base font-medium"
        target="_blank" >Portal de Transparencia</a
      >
    </div>
  </div>
  <div class="flex">
    <div class="h-1 w-3/4 bg-dark-blue"></div>
    <div class="h-1 w-1/4 bg-green-light"></div>
  </div>
</nav>