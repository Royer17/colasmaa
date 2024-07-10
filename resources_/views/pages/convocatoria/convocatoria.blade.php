@extends('layouts.app')

@section('content')
<section class="page-banner">
    <div class="image-layer" style="background-image:url({{ asset('assets/img/bgs/banner-img-1.jpg') }})"></div>
    <div class="banner-inner">
        <div class="container-lg">
            <div class="inner-container clearfix">
                <h1>Convocatorias</h1>
                <div class="page-nav">
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ route('pages.home') }}">Inicio</a></li>
                        <li><a href="">Convocatorias </a></li>
                        <li class="active">CAS</li>
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
            <a href="/portaltransparencia/Ficha Curricular.xls">DESCARGAR FICHA CURRICULAR</a>
            </div>
        </div>

        </div>

        <?php $i=1; ?>
        <div class="row ">
        <!-- contenido -->

        <!--  table -->
        <table id="tabla_convoca" class="table table-bordered" cellspacing="0" style="width:100%">
        <thead>
        <tr>
        <th>Nº</th>
        <th>Descripcion</th>
        <th>Unidad</th>
        <th>Fecha</th>
        <th>Bases</th>
        <th>Aptos</th>
        <th>Resultados</th>
        <th>Imagen</th>

        </tr>
        </thead>

        <tbody>
        <?php foreach ($query as $registro): ?>
        <tr>
        <td>
        <?= $i ?>
        </td>
        <td>
        <dl>
        <dt><?= $registro->referencia ?> </dt>
        <dd><?= $registro->unidad ?></dd>
        <dd class="c-orange"><?= $registro->fecha ?></dd>
        </dl>
        </td>
        <td>
        <?php if ($registro->bases): ?>
        {{-- portaltransparencia/convocatoria/Bases/ --}}
        <a target="_blank" href="<?= url($registro->bases); ?>" >
        <img class="img-responsive" src="<?= url('img/pdf.png') ?>" width="50px">
        </a>
        <!--<?php if ($i==1): ?>-->
        <!--    <dd class="c-orange"><a target="_blank" href="<?= url('portaltransparencia/convocatoria/Comunicado/COMUNICADO.pdf'); ?>">COMUNICADO</a></dd>-->
        <!--<?php endif ?>-->
        <!--<?php if ($i==2): ?>-->
        <!--    <dd class="c-orange"><a target="_blank" href="<?= url('portaltransparencia/convocatoria/Comunicado/COMUNICADO.pdf'); ?>">COMUNICADO</a></dd>-->
        <!--<?php endif ?>-->
        <?php endif ?>
        </td>
        <td>
        <?php if ($registro->aptos): ?>
        <a target="_blank" href="<?= url('portaltransparencia/convocatoria/Aptos/'.$registro->aptos); ?>">
        <img class="img-responsive" src="<?= url('img/pdf.png') ?>" width="50px">
        </a>
        <?php endif ?>
        </td>
        <td>
        <?php if ($registro->resultados): ?>
        <a target="_blank" href="<?= url('portaltransparencia/convocatoria/Resultados/'.$registro->resultados); ?>">
        <img class="img-responsive" src="<?= url('img/pdf.png') ?>" width="50px">
        </a>
        <?php endif ?>
        </td>
        <td></td>
        <td></td>
        <td></td>
        </tr>
        <?php $i++ ?>

        <?php endforeach; ?>

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
<script src="/js/convocatoria.js"></script>
@endsection