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
            <h1>Permisos</h1>
          </div>
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Permisos</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    
    <section>

    {{-- role --}}
    <input type="hidden" id="role-id" value="{{ $role->id }}">

    <div class="card">
      <div class="col-lg-12">
        <div class="box">
          <div class="box-header">
            <div class="col-lg-12">
              <h3>Rol: <b>{{ $role->name }}</b></h3>
            </div>
          </div>

          <br>
          
          <div class="box-body">
            <div class="col-md-12">
              <form id="permission-form">
                @foreach($permission_list as $key => $permission_one)
                  <div class="form-check">
                    <input type="hidden" name="permission_id[]" value="{{ $permission_one->id }}">
                    <input data-xd="{{ $permission_one->role }}" data-index="{{ $permission_one->id }}" id="flexCheckChecked{{ $key }}" class="form-check-input" name="permission_value[]" type="checkbox" {{ $permission_one->role == "[]" ? '' : 'checked' }}>
                    <label class="form-check-label" for="flexCheckChecked{{ $key }}">
                      {{ $permission_one->name }}
                    </label>
                  </div>
                @endforeach
              </form>
            </div>

            <br>

            <div class="col-md-12">
                <button class="pull-right btn btn-success btn-ms solsoSave margin-left" data-message-title="Create notification" data-message-error="Validation error messages" data-message-success="Data was saved" id="role-update">
                        <i class="fa fa-save"></i> Actualizar
                </button>
            </div>
            <br>


          </div>
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->
  </div>
@stop

@section('scripts')

  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

  {{-- Datepicker --}}
  <script type="text/javascript" src="{{ URL::asset('admin/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
  <script type="text/javascript">
    document.querySelector('#role-update').addEventListener('click', (e) => {
      e.preventDefault();
      lockWindow();

      let permission_arr  = [];

      document.querySelectorAll('.form-check-input').forEach((input, index) => {
        if (input.checked) {
          permission_arr = [...permission_arr, input.dataset.index];
        }
      });

      const route = "/admin/role/"+document.querySelector('#role-id').value+`/permissions`;
      //let formData = new FormData(document.querySelector('#permission-form'));

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('input[name=_token]').val()
          }
      });
      $.ajax({
          url : route,
          type: 'POST',
          data: {'permissions': permission_arr},
          //contentType: false,
          //processData: false,
          success: function(e){
              unlockWindow();
              Swal.fire(e.title, e.message, e.symbol);
          },
          error:function(jqXHR, textStatus, errorThrown)
          {
              unlockWindow();
          }
       });
    });


  </script>
@stop
