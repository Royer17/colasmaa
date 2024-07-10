@extends('admin.layouts.index')

@section('estilos')
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/datatables/dataTables.bootstrap.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/dropzone/dropzone.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/slider/owl.carousel.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/slider/owl.theme.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/slider/owl-index.css') }}">
@stop

@section('administracion')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Destinos
      <small>administración</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Panel</a></li>
      <li class="active">Destinos</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCrearNoticia" id="btnCreardestino">
            <i class="fa fa-user-plus"></i> Crear Nuevo Destino
            </button>


          </div><!-- /.box-header -->
          <div class="table-responsive box-body">
            <table id="destinos-datatable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Titulo</th>
                  <th>Usuario</th>
                  <th>Publicado</th>
                  <th>ID</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->


@include('admin.posts.show')
@include('admin.posts.edit')

@include('admin.posts.crear-editar')
@include('admin.layouts.delete')


@stop

@section('scripts')
  <script type="text/javascript" src="{{ asset('admin/plugins/dropzone/dropzone.js') }}"></script>
  <script type="text/javascript" src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('admin/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('admin/panel/js/posts/image.js') }}"></script>
  <script type="text/javascript" src="{{ asset('admin/panel/js/cut-img-slide.js') }}"></script>

<!-- Slider opt 1 -->
  <script type="text/javascript" src="{{ asset('admin/plugins/slider/owl.carousel.js') }}"></script>
  <script type="text/javascript" src="{{ asset('admin/plugins/slider/owl-index.js') }}"></script>
  <script type="text/javascript" src="{{ asset('admin/panel/js/posts/posts.js') }}"></script>

@stop
