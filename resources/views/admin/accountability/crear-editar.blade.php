<!-- <div id="modalCrearNoticia" class="modal container fade" data-width="1100" tabindex="-1" data-backdrop="static" data-keyboard="false" style="display: none;"> -->
    <div id="modalCrearRendicionCuenta" class="modal fade">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

        <div class="modal-header">
           <div class="row">
            <div class="col-md-6">
              <h4 class="solsoModalTitle title"></h4>
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
                                {{ Form::open(array('role' => 'form', 'files' => true, 'enctype' => 'multipart/form-data')) }}
                                    <input type="hidden" name="id">

                                    <div class="col-md-12">
                                        <div class="col-md-1"></div>
                                        <div id="convocatoria_error" class="col-md-10 titulo-error"></div>
                                        <div class="col-md-1"></div>
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('title', 'Título') }}
                                        {{ Form::text('title', null, array('placeholder' => 'EJEMPLO: RENDICION DE CUENTAS ', 'class' => 'form-control')) }}
                                        <div id="accountability-title-error" class="mensaje-error"></div>
                                    </div>

                                    <div class="form-group">
                                        <label>Imágen</label>
                                        <input type="file" name="image" value="" style="margin-bottom: 10px;" class="form-control">
                                        <img class="image" src="" alt="" style="height: 200px;">
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('content', 'Descripción') }}
                                        <textarea name="description" placeholder="Resumen de la noticia." class="form-control" rows="5"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Imágen Externa</label>
                                        <input type="file" name="external_image" value="" style="margin-bottom: 10px;" class="form-control">
                                        <img class="external_image" src="" alt="" style="height: 200px;">
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('title', 'URL') }}
                                        {{ Form::text('url', null, array('placeholder' => 'Enlace', 'class' => 'form-control')) }}
                                    </div>
                                    
                                    <div class="form-group">
                                        {{ Form::label('title', 'Visible') }}
                                        <select class="form-control" name="published">
                                            <option value="1">Si</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group links">
                                        <a href="">File1</a><button>X</button>
                                        <a href="">File2</a><button>X</button>
                                        <a href="">File3</a><button>X</button>
                                    </div>
                                    <div class="form-group">
                                        <label>Archivo</label><button title="Agregar" class="add-files">+</button>
                                    </div>
                                    <div class="form-group files">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" name="files_title[]" class="form-control" placeholder="Nombre">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="file" name="files[]" value="" style="margin-bottom: 10px;" class="form-control">
                                            </div>                     
                                        </div>
                                    </div>
                                    
                              {{ Form::close() }}
                            </div>
                            <div class="col-md-12">
                                <button class="pull-left btn btn-success btn-ms solsoSave save" data-message-title="Create notification" data-message-error="Validation error messages" data-message-success="Data was saved">
                                        <i class="fa fa-save"></i> Guardar
                                </button>

                                <button class="pull-left btn btn-success btn-ms solsoSave update margin-left" data-message-title="Create notification" data-message-error="Validation error messages" data-message-success="Data was saved">
                                        <i class="fa fa-save"></i> Actualizar
                                </button>

                                <button class="pull-left btn btn-default margin-left cancel">Cancelar</button>
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
