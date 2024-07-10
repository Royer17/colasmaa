@extends('admin.layouts.index') 
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Municipalidad</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Municipalidad</li>
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
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Funcionarios</label>
                    <textarea name="officials" value="" style="margin-bottom: 10px;" class="form-control" rows="10">{{ $setting->officials }}</textarea>
                </div>
                <div class="form-group">
                    <label>Directorio</label>
                    <textarea name="directory" value="" style="margin-bottom: 10px;" class="form-control" rows="10">{{ $setting->directory }}</textarea>
                </div>
                <div class="form-group">
                    <label>Planeamiento y Organización</label>
                    <textarea name="planning_and_organization" value="" style="margin-bottom: 10px;" class="form-control" rows="10">{{ $setting->planning_and_organization }}</textarea>
                </div>
                <div class="form-group">
                    <label>Directivas</label>
                    <textarea name="directives" value="" style="margin-bottom: 10px;" class="form-control" rows="10">{{ $setting->directives }}</textarea>
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

          addSummernoteEditorSuperMini($(`#form-first-part textarea[name="officials"]`));
          addSummernoteEditorSuperMini($(`#form-first-part textarea[name="directory"]`));
          addSummernoteEditorSuperMini($(`#form-first-part textarea[name="planning_and_organization"]`));
          addSummernoteEditorSuperMini($(`#form-first-part textarea[name="directives"]`));
    </script>
@endsection
