@extends('admin.layouts.index') 
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Panel administrativo</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Panel</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        @if(count($configuration_permission))
        <div class="card-body">
          {{ Form::open(array('id' => 'form-first-part', 'role' => 'form', 'files' => true, 'enctype' => 'multipart/form-data')) }}
            <input type="hidden" name="_method" value="PUT" />
            <input type="hidden" name="id" value="{{ $setting->id }}">
          <div class="row">
            
            <div class="col-md-6">
              <h3>Alcalde</h3>

                <div class="form-group">
                  {{ Form::label('title', 'Nombre') }}
                  <input class="form-control" placeholder="Nombre Completo" name="major" value="{{ $setting->major }}">
                  <div id="dashboard-description-error" class="text-danger mensaje-error"></div>
                </div>

                <div class="form-group">
                  {{ Form::label('title', 'Descripción') }}
                  <textarea class="form-control" placeholder="Descripción" name="description">{{ $setting->description }}</textarea>
                  <div id="dashboard-description-error" class="text-danger mensaje-error"></div>
                </div>

                <div class="form-group">
                    <label>Imágen</label>
                    <input type="file" name="photo" value="" style="margin-bottom: 10px;" class="form-control">
                    @if($setting->photo)
                    <img src="{{ $setting->photo }}" width="200px">
                    @endif
                </div>

              <h3>Visión y Misión</h3>
                <div class="form-group">
                  {{ Form::label('title', 'Visión') }}
                  <textarea class="form-control" placeholder="Visión" name="vision">{{ $setting->vision }}</textarea>
                  <div id="dashboard-vision-error" class="text-danger mensaje-error"></div>
                </div>
                <div class="form-group">
                  {{ Form::label('title', 'Misión') }}
                  <textarea class="form-control" placeholder="Misión" name="mission">{{ $setting->mission }}</textarea>
                  <div id="dashboard-mission-error" class="text-danger mensaje-error"></div>
                </div>
                <div class="form-group">
                    <label>Organigrama(img)</label>
                    <input type="file" name="organization_chart" value="" style="margin-bottom: 10px;" class="form-control">
                    @if($setting->organization_chart)
                    <img src="{{ $setting->organization_chart }}" width="200px">
                    @endif
                </div>

              <h3>Distrito</h3>

                <div class="form-group">
                    <label>Historia del distrito</label>
                    <textarea name="history" value="" placeholder="Historia del distrito" style="margin-bottom: 10px;" class="form-control" rows="10">{{ $setting->history }}</textarea>
                </div>

            </div>

            <div class="col-md-6">

              <h3>Datos de la Página</h3>

                <div class="form-group">
                    <label>Título de la página</label>
                    <input type="text" name="web_title" value="{{ $setting->web_title }}" placeholder="Título de la página" style="margin-bottom: 10px;" class="form-control">
                </div>
                <div class="form-group">
                    <label>Portada (770x135px aprox.)</label>
                    <input type="file" name="cover" placeholder="Portada" style="margin-bottom: 10px;" class="form-control">
                    @if($setting->cover)
                    <img src="{{ $setting->cover }}" width="500px">
                    @endif
                </div>

                <div class="form-group">
                    <label>Dirección</label>
                    <input type="text" name="address" value="{{ $setting->address }}" placeholder="Dirección" style="margin-bottom: 10px;" class="form-control">
                </div>

                <div class="form-group">
                    <label>Referencia</label>
                    <input type="text" name="reference" value="{{ $setting->reference }}" placeholder="Referencia" style="margin-bottom: 10px;" class="form-control">
                </div>
                
                <div class="form-group">
                    <label>Teléfono</label>
                    <input type="text" name="phone" value="{{ $setting->phone }}" placeholder="Teléfono" style="margin-bottom: 10px;" class="form-control">
                </div>

                <div class="form-group">
                    <label>Correo electrónico</label>
                    <input type="text" name="email" value="{{ $setting->email }}" placeholder="Correo electrónico" style="margin-bottom: 10px;" class="form-control">
                </div>

                <div class="form-group">
                    <label>Horario: Días</label>
                    <input type="text" name="schedule_days" value="{{ $setting->schedule_days }}" placeholder="Ejm. De Lunes a Viernes" style="margin-bottom: 10px;" class="form-control">
                </div>
                
                <div class="form-group">
                    <label>Horario: Horas</label>
                    <input type="text" name="schedule_hours" value="{{ $setting->schedule_hours }}" placeholder="Ejm. De 7:30 a.m. a 03:30 p.m." style="margin-bottom: 10px;" class="form-control">
                </div>

            </div>
          </div>
          <button class="btn btn-success float-right" id="first_part">Actualizar</button>
          {{ Form::close() }}

        </div>
        @endif
        <!-- /.card-body -->
        <div class="card-footer">
          
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>


@endsection
@section('scripts')
    <script type="text/javascript">
        var council_index;


        $(document).on('click', '.person__remove', function(e){
          e.preventDefault();
          $(e.target).parent().parent().remove();
        });

          document.querySelector('#first_part').addEventListener('click',function(event){
              event.preventDefault();
              lockWindow();
              cleanError();

              const _formData = new FormData($('#form-first-part')[0]);
              const _route = `/admin/setting/${document.querySelector('#form-first-part input[name="id"]').value}`;
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('input[name=_token]').val()
              }
            });
            $.ajax({
              url : _route,
              type: 'POST',
              data: _formData,
              contentType: false,
              processData: false,
              success: function(e){
                Swal.fire(`Operación Exitosa`, `Se ha actualizado correctamente`, `success`);
                unlockWindow();
              },
              error: function(jqXHR, textStatus, errorThrown)
              {
                      // unlockWindow();
                      // $('#modalCrearNoticia').scrollTop(0);
                      // $.each(jqXHR.responseJSON.errors, function( key, value ) {
                      //     if (key == "vc_titulo_informacion") {
                      //         $.each(value, function( errores, eror ) {
                      //             $('#post-title-error').append("<li class='error-block'>El campo título es obligatorio</li>");
                      //         });
                      //     }
                      //     else if (key == "tx_contenido_informacion") {
                      //         $.each(value, function( errores, eror ) {
                      //             $('#post-content-error').append("<li class='error-block'>El campo descripción es obligatorio</li>");
                      //         });
                      //     }
                      //     else if (key == "video") {
                      //         $.each(value, function( errores, eror ) {
                      //             $('#post-video-error').append("<li class='error-block'>El campo video es obligatorio</li>");
                      //         });
                      //     }
                      // });
                  }
            });
          });

          addSummernoteEditorSuperMini($(`#form-first-part textarea[name="history"]`));
    </script>
@endsection
