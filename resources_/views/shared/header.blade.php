<header class="main-header header-style-one">
    
<div class="header-upper">
        <div class="auto-container" style="background-color:#1f5acf;">
            <div class="inner-container clearfix">
                <div class="nav-outer clearfix">
                    <div class="mobile-nav-toggler"><i class="material-icons">menu</i></div>
                    <nav class="main-menu navbar-expand-md navbar-light">
                        <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                <li><a href="{{ route('pages.home') }}">Inicio</a></li>
                                <li class="dropdown">
                                    <a href="">Distrito</a>
                                    <ul>
                                        <li><a href="/distrito/historia">Historia</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="">Municipalidad</a>
                                    <ul>
                                        <li><a href="{{ route('pages.municipality.mission-vision') }}">Misión y Visión</a></li>
                                        <li><a href="{{ route('pages.municipality.mayor') }}">Alcalde</a></li>
                                        <li><a href="{{ route('pages.municipality.city-council') }}">Concejo Municipal</a></li>
                                        <li><a href="{{ route('pages.municipality.commissions') }}">Comisiones</a></li>
                                        <li><a href="/agenda">Agenda</a></li>

                                    </ul>
                                </li>
                                <!--
                                <li class="dropdown"><a href="">Modernización</a>
                                    <ul>
                                        <li><a href="{{ route('pages.modernization.municipal-taxes') }}">Tributos Municipales</a></li>
                                        <li><a href="{{ route('pages.modernization.building-license') }}">Licencia de Edificaciones</a></li>
                                        <li><a href="{{ route('pages.modernization.operating-license') }}">Licencia de Funcionamiento</a></li>
                                        <li><a href="{{ route('pages.modernization.complaints-book') }}">Libro de Reclamaciones</a></li>
                                    </ul>
                                </li> -->
                                <li class="dropdown"><a href="">Servicios Municipales</a>
                                    <ul>
                                        @foreach($services as $service)
                                        <li><a href="/servicios-municipales/{{ $service['slug'] }}">{{ $service['title'] }}</a></li>
                                        @endforeach

                                        {{-- 
                                        <li><a href="{{ route('pages.services.codisec') }}">CODISEC</a></li>
                                        <li><a href="{{ route('pages.services.glass-of-milk') }}">Vaso de Leche</a></li>
                                        <li><a href="{{ route('pages.services.demuna') }}">DEMUNA</a></li>
                                        <li><a href="{{ route('pages.services.sports') }}">Deportes</a></li>
                                        <li><a href="{{ route('pages.services.civil-registration') }}">Registro Civil</a></li>
                                        <li><a href="{{ route('pages.services.civil-defense') }}">Defensa Civil</a></li>
                                        <li><a href="{{ route('pages.services.itse') }}">ITSE</a></li>
                                        <li><a href="{{ route('pages.services.sisfoh') }}">SISFOH</a></li>
                                        --}}
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="">Normatividad</a>
                                    <ul>
                                        <li><a href="/normatividad/resoluciones-de-alcaldia">Resoluciones de Alcaldía</a></li>
                                        <li><a href="/normatividad/decretos-de-alcaldia">Decretos de Alcaldía</a></li>
                                        <li><a href="/normatividad/ordenanzas-municipales">Ordenanzas Municipales</a></li>
                                        <li><a href="/normatividad/resoluciones-de-gerencia-municipal">Resoluciones de Gerencia Municipal</a></li>
                                        <li><a href="/normatividad/acuerdos-de-concejo-municipal">Acuerdos de Concejo Municipal</a></li>
                                        <li><a href="/normatividad/otros-documentos">Otros Documentos</a></li>
                                    </ul>
                                </li>
                                <li><a href="/portal-de-transparencia">Portal de Transparencia</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="sticky-header">
        <div class="auto-container clearfix">
            <div class="pull-right">
                <nav class="main-menu clearfix"></nav>
            </div>
        </div>
    </div>
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><i class="material-icons">close</i></div>
        <nav class="menu-box">
            <div class="nav-logo">
                <a href=""><img src="{{ 'img/nav-logo.png' }}" alt="" title=""></a>
            </div>
            <div class="menu-outer"></div>
        </nav>
    </div>
    <div class="header-ban">
        <div class="auto-container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    
                    {{-- <img class="img-fluid" src="{{ asset('/img/logo-ban.jpg') }}"> --}}
                    <img class="img-fluid" src="{{ $setting->cover }}">

                </div>
            </div>
        </div>
    </div>
    
</header>