@extends('admin.layouts.index')
@section('styles')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/slider/owl.carousel.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/slider/owl.theme.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/slider/owl-index.css') }}">
  {{-- Datepicker --}}
  <link rel="stylesheet" href="{{ asset('admin/plugins/datepicker/datepicker3.css') }}">

@stop

@section('content')

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-12">
          <div class="col-sm-12">
            <h1>Videos</h1>
          </div>
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Videos</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    
    <section>

    {{-- role --}}
    <input type="hidden" name="role_id" value="{{ \Auth::user()->role_id }}">

    <div class="card" id="post-datatable">
      <div class="col-lg-12">
        <div class="box">
          <div class="box-header mt-2 mb-2">
            <div class="col-lg-12 pl-0">
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="" id="video-add">
                <i class="fa fa-video"></i> Nuevo Video
              </button>
            </div>
          </div>

          <br>
          
          <div class="box-body">
            <div class="table-responsive">
              <table id="videos-datatable" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="width: 150px;">ID</th>
                    <th style="width: 150px;">Video</th>
                    <th style="width: 100px;">Nombre</th>
                    <th style="width: 30px;">Fecha</th>
                    <th style="width: 100px;">Imagen</th>
                    <th style="width: 100px;">Estado</th>
                    <th style="width: 60px;">Acciones</th>
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
                    <td></td>
                  </tr>
                </tbody>
              </table>
            </div><!-- /.box-body -->
          </div>
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->
  </div>

@include('admin.videos.crear-editar')

@stop

@section('scripts')

  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

  {{-- Datepicker --}}
  <script type="text/javascript" src="{{ URL::asset('admin/plugins/datepicker/bootstrap-datepicker.js') }}"></script>

  <script type="text/javascript" src="{{ asset('/admin/panel/js/videos/variables.js') }}"></script>
  <script type="text/javascript" src="{{ asset('/admin/panel/js/videos/videos.js') }}"></script>

@stop
