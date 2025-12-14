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

                <div class="form-group">
                    <label>Imagen 1</label>
                    <input type="file" name="image1" placeholder="Imagen1" style="margin-bottom: 10px;" class="form-control">
                    @if($setting->image1)
                    <img src="{{ $setting->image1 }}" width="500px">
                    @endif
                </div>

                <div class="form-group">
                    <label>Imagen 2</label>
                    <input type="file" name="image2" placeholder="Imagen2" style="margin-bottom: 10px;" class="form-control">
                    @if($setting->image2)
                    <img src="{{ $setting->image2 }}" width="500px">
                    @endif
                </div>

                <div class="form-group">
                    <label>Imagen 3</label>
                    <input type="file" name="image3" placeholder="Imagen3" style="margin-bottom: 10px;" class="form-control">
                    @if($setting->image3)
                    <img src="{{ $setting->image3 }}" width="500px">
                    @endif
                </div>
            </div>

            <div class="col-md-6">

                <h3>Distrito</h3>

                <div class="form-group">
                    <label>Historia del distrito</label>
                    <textarea name="history" value="" placeholder="Historia del distrito" style="margin-bottom: 10px;" class="form-control" rows="10">{{ $setting->history }}</textarea>
                </div>

                <h3>Redes Sociales</h3>
                <div class="form-group">
                    <label>Facebook</label>
                    <input type="text" name="facebook" value="{{ $setting->facebook }}" placeholder="Facebook" style="margin-bottom: 10px;" class="form-control">
                </div>
                <div class="form-group">
                    <label>Tiktok</label>
                    <input type="text" name="tiktok" value="{{ $setting->tiktok }}" placeholder="Tiktok" style="margin-bottom: 10px;" class="form-control">
                </div>
                <div class="form-group">
                    <label>Instagram</label>
                    <input type="text" name="instagram" value="{{ $setting->instagram }}" placeholder="Instagram" style="margin-bottom: 10px;" class="form-control">
                </div>
                <div class="form-group">
                    <label>Youtube</label>
                    <input type="text" name="youtube" value="{{ $setting->youtube }}" placeholder="Youtube" style="margin-bottom: 10px;" class="form-control">
                </div>

                <h3>Turismo</h3>
                <div class="form-group">
                    <label>Turismo</label>
                    <textarea name="tourism" value="" placeholder="" style="margin-bottom: 10px;" class="form-control" rows="10">{{ $setting->tourism }}</textarea>
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
                location.reload();
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
          addSummernoteEditorSuperMini($(`#form-first-part textarea[name="tourism"]`));
    </script>
@endsection
