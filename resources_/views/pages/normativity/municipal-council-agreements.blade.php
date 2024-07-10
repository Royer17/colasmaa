@extends('layouts.app')

@section('content')
<section class="page-banner">
    <div class="image-layer" style="background-image:url({{ asset('assets/img/bgs/banner-img-1.jpg') }})"></div>
    <div class="banner-inner">
        <div class="container-lg">
            <div class="inner-container clearfix">
                <h1>Acuerdos de Concejo Municipal</h1>
                <div class="page-nav">
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ route('pages.home') }}">Inicio</a></li>
                        <li><a href="">Normatividad</a></li>
                        <li class="active">Acuerdos de Concejo Municipal</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="default-section">
    <div class="container-lg">

        <div class="row as">

            <div class="article pull-left">

                <div class="article-title">
                <a href=""></a>
                </div>
            </div>

        </div>

        <input type="hidden" name="" value="Acuerdo de Concejo" id="tipodocu">
        <div class="row ">
        <!-- contenido -->

        <!--  table -->
        <table id="tabla_resolutions" class="table table-bordered" cellspacing="0" style="width:100%">
            <thead>
                <tr>
                    <th>Nº</th>
                    <th width="150px">Nombre</th>
                    <th>Resumen</th>
                    <th>Fecha</th>
                    <th>Enlace</th>
                    <th>Imagen</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>

        <br>

        </div>

        <div class="row as">

        </div>


    </div>
</section>
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="/js/resolutions.js"></script>
@endsection