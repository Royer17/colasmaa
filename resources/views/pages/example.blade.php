<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title></title>
    <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;500;700&family=Nunito:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link href="{{ '/css/bootstrap.css' }}" rel="stylesheet">
    <link href="{{ '/css/plugins.css' }}" rel="stylesheet">
    <link href="{{ '/css/app.css' }}" rel="stylesheet">
    <link href="{{ '/css/owl.carousel.css' }}" rel="stylesheet">
    <link href="{{ '/css/fontawesome.css' }}" rel="stylesheet">
    <link href="{{ '/store/css/stylus.css' }}" rel="stylesheet">
    <link href="/plugins/evo-calendar/evo-calendar.min.css" rel="stylesheet">
    <link rel="icon" href="{{ 'favicon.png' }}" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <style>
        .popup_wrapper {
    background: rgba(0, 0, 0, 0.7) none repeat scroll 0 0;
    height: 100%;
    opacity: 0;
    position: fixed;
    top: 0;
    left: 0;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    -webkit-transition: all 0.5s ease;
    -ms-transition: all 0.5s ease;
    transition: all 0.5s ease;
    visibility: hidden;
    width: 100%;
    z-index: 9999999
}

.popup_wrapper .popup_content {
    background-color: #fff;
    top: 50%;
    left: 50%;
    right: 0;
    transform: translate(-50%, -50%);
    position: absolute;
    width: 500px
}

@media (max-width: 767px) {
    .popup_wrapper .popup_content {
        width: 300px
    }
}

.popup_wrapper .popup_content.newsletter {
    width: 800px
}

@media (max-width: 767px) {
    .popup_wrapper .popup_content.newsletter {
        width: 300px
    }
}

.popup_wrapper .popup_content.newsletter figure {
    position: absolute;
    overflow: hidden;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: 0
}

.popup_wrapper .popup_content.newsletter figure img {
    height: 100%;
    width: auto
}

.popup_wrapper .popup_content.newsletter .content {
    height: 100%;
    padding: 120px 60px;
    text-align: center;
    display: flex;
    align-items: center
}

@media (max-width: 767px) {
    .popup_wrapper .popup_content.newsletter .content {
        padding: 30px 30px 15px 30px;
        height: auto
    }
}

.popup_wrapper .popup_content.newsletter .content .wrapper {
    width: 100%
}

.popup_wrapper .popup_content.newsletter .content .wrapper h3 {
    font-size: 21px;
    font-size: 1.3125rem;
    margin-top: 25px
}

.popup_wrapper .popup_close {
    color: #ffffff;
    cursor: pointer;
    display: block;
    text-align: center;
    text-decoration: none;
    background: #000;
    width: 53px;
    height: 25px;
    line-height: 27px;
    position: absolute;
    top: -25px;
    right: 0;
    font-size: 13px;
    font-weight: 700;
    -moz-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    -webkit-transition: all 0.3s ease;
    -ms-transition: all 0.3s ease;
    transition: all 0.3s ease
}

.popup_wrapper .popup_close:hover {
    background: #cc0000
}

    </style>
</head>
<body>
    <div class="page-wrapper">
        <div class="preloader">
            <div class="icon"></div>
        </div>

        <div id="demoEvoCalendar"></div>

    </div>

    <script src="{{ '/js/jquery-3.5.1.min.js'}}"></script>
    <script src="{{ '/js/bootstrap.bundle.min.js' }}"></script>
    <script src="{{ '/js/owl.carousel.js' }}"></script>
    <script src="{{ '/js/fontawesome.js' }}"></script>
    <script src="{{ '/js/app.js' }}"></script>
    <script src="/plugins/evo-calendar/evo-calendar.min.js"></script>
    <script src="/js/evo-calendar-config.js"></script>

    <script>

        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:0,
            nav:true,
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
        })
    
        setTimeout(function(){
            $(`.modal-notice`).modal('show')
        }, 1000);

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
    </script>

</body>
</html>
