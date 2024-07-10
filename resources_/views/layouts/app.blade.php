<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $setting->web_title }}</title>
   

    <link href="{{ '/css/bootstrap.css' }}" rel="stylesheet">

    <link href="{{ '/css/plugins.css' }}" rel="stylesheet">
    <link href="{{ '/css/app.css' }}" rel="stylesheet">

    <link href="{{ '/store/css/stylus.css' }}" rel="stylesheet">
    <link href="{{ '/css/styles.html' }}" rel="stylesheet">

    <link href="{{ '/css/dataTables.bootstrap4.min.css' }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">

    <link href="{{ '/css/owl.carousel.css' }}" rel="stylesheet">
    <link href="{{ '/css/owl.theme.default.min.css' }}" rel="stylesheet">

 <link rel="preconnect" href="https://fonts.googleapis.com/">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&amp;display=swap" rel="stylesheet">


    <link rel="icon" href="{{ 'favicon.png' }}" type="image/x-icon">

 
   <style>
       .gc-bubbleDefault{background-color:transparent!important;text-align:left;padding:0!important;margin:0!important;border:0!important;table-layout:auto!important}.gc-reset{background-color:transparent!important;border:0!important;padding:0!important;margin:0!important;text-align:left}.pls-bubbleTop{border-bottom:1px solid #ccc!important}.pls-contentLeft,.pls-topTail,.pls-vertShimLeft{background-image:url(//ssl.gstatic.com/s2/oz/images/stars/po/bubblev1/border_3.gif)!important}.pls-topTail{background-repeat:repeat-x!important;background-position:bottom!important}.pls-vertShim{background-color:#fff!important;text-align:right}.tbl-grey .pls-vertShim{background-color:#f5f5f5!important}.pls-vertShimLeft{background-repeat:repeat-y!important;background-position:100%!important;height:4px}.pls-vertShimRight{height:4px}.pls-confirm-container .pls-vertShim{background-color:#fff3c2!important}.pls-contentWrap{background-color:#fff!important;position:relative!important;vertical-align:top}.pls-contentLeft{background-repeat:repeat-y;background-position:100%;vertical-align:top}.pls-dropRight{background-image:url(//ssl.gstatic.com/s2/oz/images/stars/po/bubblev1/bubbleDropR_3.png)!important;background-repeat:repeat-y!important;vertical-align:top}.pls-dropBL,.pls-dropTR .pls-dropBR,.pls-tailleft,.pls-vert,.pls-vert img{vertical-align:top}.pls-dropBottom{background-image:url(//ssl.gstatic.com/s2/oz/images/stars/po/bubblev1/bubbleDropB_3.png)!important;background-repeat:repeat-x!important;width:100%;vertical-align:top}.pls-topLeft{background:inherit!important;text-align:right;vertical-align:bottom}.pls-topRight{background:inherit!important;text-align:left;vertical-align:bottom}.pls-bottomLeft{background:inherit!important;text-align:right}.pls-bottomRight{background:inherit!important;text-align:left;vertical-align:top}.pls-tailbottom,.pls-tailleft,.pls-tailright,.pls-tailtop{display:none;position:relative}.pls-dropBL,.pls-dropBR,.pls-dropTR,.pls-tailbottom,.pls-tailleft,.pls-tailright,.pls-tailtop{background-image:url(//ssl.gstatic.com/s2/oz/images/stars/po/bubblev1/bubbleSprite_3.png)!important;background-repeat:no-repeat}.tbl-grey .pls-dropBL,.tbl-grey .pls-dropBR,.tbl-grey .pls-dropTR,.tbl-grey .pls-tailbottom,.tbl-grey .pls-tailleft,.tbl-grey .pls-tailright,.tbl-grey .pls-tailtop{background-image:url(//ssl.gstatic.com/s2/oz/images/stars/po/bubblev1/bubbleSprite-grey.png)!important}.pls-tailbottom{background-position:-23px 0}.pls-confirm-container .pls-tailbottom{background-position:-23px -10px}.pls-tailtop{background-position:-19px -20px}.pls-tailright{background-position:0 0}.pls-tailleft{background-position:-10px 0}.pls-tailtop{vertical-align:top}.gc-bubbleDefault td{line-height:0;font-size:0}.pls-tailbottom,.pls-topLeft img,.pls-topRight img{vertical-align:bottom}.bubbleDropTR,.pls-bottomLeft,.pls-bottomLeft img,.pls-dropBottom img,.pls-dropBottomL img,.pls-dropBottomR img{vertical-align:top}.pls-dropTR{background-position:0 -22px}.pls-dropBR{background-position:0 -27px}.pls-dropBL{background-position:0 -16px}.pls-spacerbottom,.pls-spacerleft,.pls-spacerright,.pls-spacertop{position:static!important}.pls-spinner{bottom:0;position:absolute;left:0;margin:auto;right:0;top:0}
   </style>
</head>
<body>
    @yield('facebookRoot')
    <div class="page-wrapper">
        <div class="preloader">
            <div class="icon"></div>
        </div>
        @include('shared.header')
        @yield('content')


  @include('shared.footer')
    </div>

    <script src="{{ '/js/jquery-3.5.1.min.js'}}"></script>
    <script src="{{ '/js/bootstrap.bundle.min.js' }}"></script>
    <script src="{{ '/js/owl.carousel.js' }}"></script>
    <script src="{{ '/js/fontawesome.js' }}"></script>
    <script src="{{ '/js/app.js' }}"></script>
    <script src="{{ '/js/jquery.fancybox.min.js' }} "></script>
    <script src="{{ '/js/jquery.dataTables.min.js' }}"></script>
    <script src="{{ '/js/dataTables.bootstrap4.min.js' }}"></script>



          <script>
            $(document).ready(main);

            var contador = 1;

            function main () {
                $('.menu_bar').click(function(){
                    if (contador == 1) {
                        $('.sacar').animate({
                            left: '0'
                        });
                        contador = 0;
                    } else {
                        contador = 1;
                        $('.sacar').animate({
                            left: '-100%'
                        });
                    }
                });
            }

            // Fancybox Config
            $('[data-fancybox="zoom"]').fancybox({
            buttons: [
                "slideShow",
                "thumbs",
                "zoom",
                "fullScreen",
                "share",
                "close"
            ],
            loop: false,
            protect: true
            });

            var owl = $('.owl-carousel');
            owl.owlCarousel({
                loop:true,
                margin:10,
                autoplay:true,
                autoplayTimeout:5000,
                autoplayHoverPause:true,
                responsive:{
                    0:{
                        items:2
                    },
                    600:{
                        items:3
                    },
                    1000:{
                        items:5
                    }
                }
                
            });

            var owl = $('.owl-carousel-2');
            owl.owlCarousel({
                loop:true,
                margin:10,
                autoplay:true,
                autoplayTimeout:5000,
                autoplayHoverPause:true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:1
                    },
                    1000:{
                        items:1
                    }
                }
                
            });

        
            setTimeout(function(){
                $(`.modal-notice`).modal('show')
            } , 1000);

            $(`.close-modal-notice`).on('click', function(){
                $(this).parent().parent().parent().parent().modal('hide');
            });

        $(document).ready(function(){
            var heights =[];
            $('.inner_column').each(function(){
                heights.push($(this).height());
            });
        var maxHeight=Math.max.apply(null, heights);
            $('.inner_column').height(maxHeight);


            var heights2 =[];
            $('.inner_column2').each(function(){
                heights2.push($(this).height());
            });
            var maxHeight2=Math.max.apply(null, heights2);
            $('.inner_column2').height(maxHeight2);


            var heights3 =[];
            $('.inner_column3').each(function(){
                heights3.push($(this).height());
            });
            var maxHeight3=Math.max.apply(null, heights3);
            $('.inner_column3').height(maxHeight3);
        });
    
        $(document).ready(function() {
            $('#myTable').dataTable( {
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
                },
            } );
        });
        
        $(document).ready(function() {
            $('.mydatatable').dataTable( {
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
                },
            });
        });
        
        $('button[data-toggle="tab"]').on('shown.bs.tab', function(e){
          $($.fn.dataTable.tables(true)).DataTable()
             .columns.adjust()
             .fixedColumns().relayout();
       });
        
        
        </script>

    @yield('scripts')

</body>
</html>
