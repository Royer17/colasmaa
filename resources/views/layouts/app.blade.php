<!doctype html>
<html>
  <head>
    <title>{{ $setting->web_title }}</title>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
      rel="stylesheet"
    />
    <link href="{{ '/css/output.css' }}" rel="stylesheet">
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css"
    />
    <style>
      .mfp-active {
        overflow: hidden;
      }

      .mfp-bg {
        overflow: hidden;
      }
      .mfp-wrap {
        overflow: hidden !important;
      }
    </style>
  </head>
    <body>

        @include('shared.header')
        @yield('content')

        
        @include('shared.footer')   

<!--       <script
        src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
        integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8="
        crossorigin="anonymous"
      ></script> -->
        
        <script src="{{ '/js/jquery-3.5.1.min.js'}}"></script>
        <script src="{{ '/js/owl.carousel.js' }}"></script>
        <script src="{{ '/js/jquery.fancybox.min.js' }} "></script>
        <script src="{{ '/js/jquery.dataTables.min.js' }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
        <script src="./js/slides/homepage.js"></script>
        <script src="./js/main.min.js"></script>
        @yield('scripts')
    </body>
</html>
