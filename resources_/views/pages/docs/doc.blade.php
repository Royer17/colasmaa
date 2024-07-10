@extends('layouts.app')

@section('content')
<section class="page-banner">
    <div class="image-layer" style="background-image:url({{ asset('assets/img/bgs/banner-img-1.jpg') }})"></div>
    <div class="banner-inner">
        <div class="container-lg">
            <div class="inner-container clearfix">
                <h1>{{ $document->acronym }}</h1>
                <div class="page-nav">
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ route('pages.home') }}">Inicio</a></li>
                        <li><a href="">Documentos Institucionales</a></li>
                        <li class="active">{{ $document->title }}</li>
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

        <input type="hidden" name="" value="4" id="tipodocu">
        <div class="row ">
        <!-- contenido -->

        <!--  table -->
        <table id="tabla_resolutions" class="table table-bordered" cellspacing="0" style="width:100%">
            <thead>
                <tr>
                    <th>Nº</th>
                    <th width="150px">Nombre</th>
                    <th>Archivo</th>


                </tr>
            </thead>
            <tbody>
                @foreach($document->files as $key => $file)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $file->title }}</td>
                    <td>
                        <a target="_blank" href="{{ $file->url }}" title="{{ $file->url }}">
                          <img class="img-responsive" src="/img/pdf.png" width="50px">
                        </a>
                    </td>
                </tr>
                @endforeach
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

    {{-- <script src="/js/resolutions.js"></script> --}}


@endsection