<!-- <div id="modalCrearNoticia" class="modal container fade" data-width="1100" tabindex="-1" data-backdrop="static" data-keyboard="false" style="display: none;"> -->
    <div id="modalDocumentType" class="modal fade">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

        <div class="modal-header">
           <div class="row">
            <div class="col">
              <h4 class="solsoModalTitle" id="modal-title-role">Crear Tipo de documento</h4>
            </div>
           </div>
        </div>

        <div class="modal-body">
            <div class="row solsoShowForm">
                <div class="col-md-12">
                    <div class="tab-content responsive ">
                        <div class="">
                            <div class="col-md-12">
                                {{ Form::open(array('role' => 'form', 'files' => true, 'enctype' => 'multipart/form-data', 'autocomplete' => 'off')) }}
                                    <input type="hidden" name="id">
                                    
                                    <div class="form-group">
                                        {{ Form::label('title', 'Nombre') }}
                                        <input type="text" name="name" class="form-control" placeholder="Nombre">
                                        <div id="document-type-name-error" class="text-danger mensaje-error"></div>
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('title', 'Descripción') }}
                                        <textarea name="description" class="form-control" cols="30" rows="5"></textarea>
                                    </div>

                              {{ Form::close() }}
                            </div>
                            <div class="col-md-12">
                                <button class="pull-left btn btn-success btn-ms solsoSave save" data-message-title="Create notification" data-message-error="Validation error messages" data-message-success="Data was saved">
                                        <i class="fa fa-save"></i> Guardar
                                </button>

                                <button class="pull-left btn btn-success btn-ms solsoSave margin-left update" data-message-title="Create notification" data-message-error="Validation error messages" data-message-success="Data was saved">
                                        <i class="fa fa-save"></i> Actualizar
                                </button>

                                <button class="pull-left btn btn-default margin-left" data-dismiss="modal">Cancelar</button>
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
