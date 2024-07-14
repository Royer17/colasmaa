@extends('admin.layouts.index')
@section('styles')
  {{-- Datepicker --}}
  <link rel="stylesheet" href="{{ asset('admin/plugins/datepicker/datepicker3.css') }}">

@stop

@section('content')

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-12">
          <div class="col-sm-12">
            <h1>Atención</h1>
          </div>
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Atención</li>
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
          <div class="box-header">
            TITLE
          </div>

          <br>
          
          <div class="box-body">
            BODY
          </div>
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->
  </div>

@stop

@section('scripts')

  <script type="text/javascript">
    
  </script>

@stop
