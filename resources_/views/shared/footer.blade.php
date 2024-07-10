@include('shared.information')
<footer class="main-footer align-content-center">
    <div class="widgets-section">
        <div class="container-lg ">
            <div class="row clearfix">
                <div class="column col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-widget links-widget">
                        <div class="widget-title">
                            <h4 class="font-one">Municipalidad</h4>
                        </div>
                        <div class="widget-content">
                            <ul class="links">
                                <li><a href="/municipalidad/mision-y-vision">Visión y Misión</a></li>
                                <li><a href="/municipalidad/concejo-municipal">Consejo Municipal</a></li>
                                <li><a href="/municipalidad/comisiones">Comisiones</a></li>
                                <li><a href="{{ route('pages.municipality.officials') }}">Funcionarios</a></li>
                                <li><a href="/municipalidad/organigrama">Organigrama</a></li>
                                <li><a href="{{ route('pages.municipality.phone-book') }}">Directorio Teléfonico</a></li>
                                <li><a href="/agenda">Agenda</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="column col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-widget links-widget">
                        <div class="widget-title">
                            <h4 class="font-one">Servicios Municipales</h4>
                        </div>
                        <div class="widget-content">
                            <ul class="links">
                                @foreach($services as $service)
                                <li><a href="/servicios-municipales/{{ $service['slug'] }}">{{ $service['title'] }}</a></li>
                                @endforeach
                                {{-- 
                                <li><a href="/servicios/defensacivil">Defensa Civil</a></li>
                                <li><a href="/servicios/demuna">Demuna</a></li>
                                <li><a href="/servicios/seguridad-ciudadana">Seguridad Ciudadana</a></li>
                                <li><a href="/servicios/registrocivil">Registro Civil</a></li>
                                <li><a href="/servicios/vasodeleche">Vaso de Leche</a></li>
                                --}}
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="column col-lg-4 col-md-6 col-sm-12">
                    <div class="footer-widget links-widget">
                        <div class="widget-title">
                            <h4 class="font-one">Normatividad</h4>
                        </div>
                        <div class="widget-content">
                            <ul class="links">
                                <li><a href="/normatividad/acuerdos-de-concejo-municipal"><i class="bi bi-facebook"></i> Acuerdos de Consejo</a></li>
                                <li><a href="/normatividad/decretos-de-alcaldia">Decretos de Alcaldía</a></li>
                                <li><a href="/normatividad/ordenanzas-municipales">Ordenanzas Municipales</a></li>
                                <li><a href="/normatividad/resoluciones-de-alcaldia">Resoluciones de Alcaldía</a></li>
                                <li><a href="/normatividad/resoluciones-de-gerencia-municipal">Resoluciones de Gerencia Municipal</a></li>
                                <li><a href="/normatividad/otros-documentos">Otros Documentos</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="column col-lg-2 col-md-6 col-sm-12">
                    <div class="footer-widget about-widget">
                        <div class="logo">
                            <a href=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container-lg">
            <div class="inner">
                <div class="copyright">Derechos Reservados 2023 © Portal Institucional </div>
            </div>
        </div>
    </div>
</footer>