<!-- <div id="modalCrearNoticia" class="modal container fade" data-width="1100" tabindex="-1" data-backdrop="static" data-keyboard="false" style="display: none;"> -->
    <div id="modalCrearService" class="modal fade">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

        <div class="modal-header">
           <div class="row">
            <div class="col-md-6">
              <h4 class="solsoModalTitle" id="modal-title-service">Crear Servicio</h4>
            </div>
            <div class="col-md-6">
            </div>
           </div>
        </div>

        <div class="modal-body">
            <div class="row solsoShowForm">
                <div class="col-md-12">
                    <div class="tab-content responsive ">
                        <div class="" id="publicacion_tab1">
                            <div class="col-md-12">
                                {{ Form::open(array('id' => 'form-services', 'role' => 'form', 'files' => true, 'enctype' => 'multipart/form-data')) }}
                                    <input type="hidden" name="id">

                                    <div class="col-md-12">
                                        <div class="col-md-1"></div>
                                        <div id="convocatoria_error" class="col-md-10 titulo-error"></div>
                                        <div class="col-md-1"></div>
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('title', 'Título') }}
                                        {{ Form::text('title', null, array('placeholder' => 'Título', 'class' => 'form-control')) }}
                                        <div id="service-title-error" class="mensaje-error"></div>
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('title', 'Orden') }}
                                        <P>Nota: Se ordenara respecto a todos los servicios</P>
                                        {{ Form::text('order', null, array('placeholder' => 'Ejemplo : 11', 'class' => 'form-control')) }}
                                    </div>

                                    <div class="form-group">
                                        <label>Icono </label><p style="color:green">se Recomienda medidas :335px x 110px  </p>
                                        <input type="file" name="image" value="" style="margin-bottom: 10px;" class="form-control">
                                        <img class="image" src="" alt="" style="height: 200px;">
                                    </div>

                                    <div class="form-group">
                                        
                                        {{ Form::label('title', 'URL') }}
                                        <p style="color:red">Nota: Solo si es necesario, Al dar click en icono te enviara directo a esta "URL" o "ENLACE" </p>
                                        {{ Form::text('url', null, array('placeholder' => 'Enlace', 'class' => 'form-control')) }}
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('title', 'Descripción') }}
                                        {{ Form::textarea('description', null, array('placeholder' => 'Descripción', 'class' => 'form-control')) }}
                                        <div id="service-description-error" class="mensaje-error"></div>
                                    </div>

                                    <div class="form-group">
                                        <label>Imagen contenido</label>
                                        <input type="file" name="external_image" value="" style="margin-bottom: 10px;" class="form-control">
                                        <img class="external_image" src="" alt="" style="height: 200px;">
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('title', 'Visible') }}
                                        <select class="form-control" name="published">
                                            <option value="1">Si</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>PDF</label>
                                        <input type="file" name="icon" value="" style="margin-bottom: 10px;" class="form-control">
                                        <div>
                                            <a href="" target="_blank">Archivo</a>
                                            <button type="button" onclick="EliminarArchivo(this);">X</button>
                                        </div>
                                    </div>
                                    
                              {{ Form::close() }}
                            </div>
                            <div class="col-md-12">
                                <button class="pull-left btn btn-success btn-ms solsoSave" data-message-title="Create notification" data-message-error="Validation error messages" data-message-success="Data was saved" id="service-save">
                                        <i class="fa fa-save"></i> Guardar
                                </button>

                                <button class="pull-left btn btn-success btn-ms solsoSave margin-left" data-message-title="Create notification" data-message-error="Validation error messages" data-message-success="Data was saved" id="service-update">
                                        <i class="fa fa-save"></i> Actualizar
                                </button>

                                <button class="pull-left btn btn-default margin-left" id="service-cancel">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id='footer' class="modal-footer" style="padding-left: 5rem;">

        </div>


    </div>
          <!-- /.modal-content -->
</div>
</div>
