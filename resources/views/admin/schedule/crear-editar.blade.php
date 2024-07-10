<!-- <div id="modalCrearNoticia" class="modal container fade" data-width="1100" tabindex="-1" data-backdrop="static" data-keyboard="false" style="display: none;"> -->
    <div id="modalSchedule" class="modal fade">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

        <div class="modal-header">
           <div class="row">
            <div class="col">
              <h4 class="solsoModalTitle" id="modal-title-schedule">Crear Convocatoria</h4>
            </div>
           </div>
        </div>

        <div class="modal-body">
            <div class="row solsoShowForm">
                <div class="col-md-12">
                    <div class="tab-content responsive ">
                        <div class="" id="publicacion_tab1">
                            <div class="col-md-12">
                                {{ Form::open(array('id' => 'form-schedule', 'role' => 'form', 'files' => true, 'enctype' => 'multipart/form-data', 'autocomplete' => 'off')) }}
                                    <input type="hidden" name="id">

                                    <div class="form-group">
                                        {{ Form::label('content', 'Asunto') }}
                                        <textarea name="subject" placeholder="Asunto" class="form-control" rows="5"></textarea>
                                        <div id="schedule-subject-error" class="text-danger mensaje-error"></div>

                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('title', 'Tipo de reunión') }}
                                        <select name="type" class="form-control">
                                            <option value="">Seleccione</option>
                                            <option value="Social">Social</option>
                                            <option value="Deportivo">Deportivo</option>
                                            <option value="Economico ">Económico</option>
                                            <option value="Academico">Académico</option>
                                            <option value="Cultural">Cultural</option>
                                            <option value="Politico">Político</option>
                                        </select>
                                        <div id="schedule-type-error" class="text-danger mensaje-error"></div>
                                    </div>
                                  
                                    <div class="form-group">
                                        <label>Fecha</label>
                                        <input type="text" name="fecha" value="" style="margin-bottom: 10px;" placeholder="d/m/Y" class="form-control">
                                        <div id="schedule-fecha-error" class=" text-danger mensaje-error"></div>
                                    </div>
                                    
                                    <div class="form-group">
                                        {{ Form::label('title', 'Visible') }}
                                        <select class="form-control" name="published">
                                            <option value="1">Si</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>

                              {{ Form::close() }}
                            </div>
                            <div class="col-md-12">
                                <button class="pull-left btn btn-success btn-ms solsoSave" data-message-title="Create notification" data-message-error="Validation error messages" data-message-success="Data was saved" id="schedule-save">
                                        <i class="fa fa-save"></i> Guardar
                                </button>

                                <button class="pull-left btn btn-success btn-ms solsoSave margin-left" data-message-title="Create notification" data-message-error="Validation error messages" data-message-success="Data was saved" id="schedule-update">
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
