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
            <h1>Oficina</h1>
          </div>
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Oficina</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    
    <section>

    {{-- role --}}
    <input type="hidden" name="role_id" value="{{ \Auth::user()->role_id }}">

    <div class="card">
      <div class="col-lg-12">
        <div class="box">
          <div class="box-header mt-2 mb-2">
            <div class="col-lg-12 pl-0">
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="" id="city-council__add">
                <i class="fa fa-book-open"></i> Nuevo Oficina
              </button>
            </div>
          </div>
          
          <div class="box-body">
            <div class="table-responsive">
              <table id="city-council-datatable" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="width: 150px;">#</th>
                    <th style="width: 350px;">Nombre</th>
                    <th style="width: 100px;">Sigla</th>
                    <th style="width: 350px;">Ventanilla</th>
                    <th style="width: 100px;">Posición</th>
                    <!-- <th style="width: 100px;">Imagen</th> -->
                    <th style="width: 100px;">Estado</th>
                    <th style="width: 60px;">Acción</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td></td>
                    <!-- <td></td> -->
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

@include('admin.city_council.crear-editar')

@stop

@section('scripts')

  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

  {{-- Datepicker --}}
  <script type="text/javascript" src="{{ URL::asset('admin/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
  <script type="text/javascript" src="{{ asset('/admin/panel/js/city_council.js') }}"></script>

@stop
