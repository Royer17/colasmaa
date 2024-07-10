<!-- <div id="modalCrearNoticia" class="modal container fade" data-width="1100" tabindex="-1" data-backdrop="static" data-keyboard="false" style="display: none;"> -->
    <div id="modalCrearConvocatoria" class="modal fade">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

        <div class="modal-header">
           <div class="row">
            <div class="col-md-6">
              <h4 class="solsoModalTitle" id="modal-title-convocatoria">Crear Convocatoria</h4>
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
                                {{ Form::open(array('id' => 'form-convocatorias', 'role' => 'form', 'files' => true, 'enctype' => 'multipart/form-data', 'autocomplete' => 'off')) }}
                                    <input type="hidden" name="id">

                                    <div class="col-md-12">
                                        <div class="col-md-1"></div>
                                        <div id="convocatoria_error" class="col-md-10 titulo-error"></div>
                                        <div class="col-md-1"></div>
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('title', 'Unidad') }}
                                        {{ Form::text('unidad', null, array('placeholder' => 'EJEMPLO: RECURSOS HUMANOS', 'class' => 'form-control')) }}
                                        <div id="convocatoria-unidad-error" class="text-danger mensaje-error"></div>
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('title', 'Referencia') }}
                                        {{ Form::text('referencia', null, array('placeholder' => 'EJEMPLO: CONVOCATORIA CAS Nº 000X-20XX', 'class' => 'form-control')) }}
                                        <div id="convocatoria-refencia-error" class="mensaje-error"></div>
                                    </div>

                                    <div class="form-group">
                                        <label>Bases</label>
                                        <input type="file" name="bases" value="" style="margin-bottom: 10px;" class="form-control">
                                        <a href="">Bases</a>
                                    </div>

                                    <div class="form-group">
                                        <label>Resultados</label>
                                        <input type="file" name="resultados" value="" style="margin-bottom: 10px;" class="form-control">
                                        <a href="">Resultados</a>

                                    </div>

                                    <div class="form-group">
                                        <label>Aptos</label>
                                        <input type="file" name="aptos" value="" style="margin-bottom: 10px;" class="form-control">
                                        <a href="">Aptos</a>
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('title', 'Visible') }}
                                        <select class="form-control" name="published">
                                            <option value="1">Si</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Fecha</label>
                                        <input type="text" name="fecha" value="" style="margin-bottom: 10px;" placeholder="d/m/Y" class="form-control">
                                        <div id="convocatoria-fecha-error" class=" text-danger mensaje-error"></div>
                                    </div>
                              {{ Form::close() }}
                            </div>
                            <div class="col-md-12">
                                <button class="pull-left btn btn-success btn-ms solsoSave" data-message-title="Create notification" data-message-error="Validation error messages" data-message-success="Data was saved" id="convocatoria-save">
                                        <i class="fa fa-save"></i> Guardar
                                </button>

                                <button class="pull-left btn btn-success btn-ms solsoSave margin-left" data-message-title="Create notification" data-message-error="Validation error messages" data-message-success="Data was saved" id="convocatoria-update">
                                        <i class="fa fa-save"></i> Actualizar
                                </button>

                                <button class="pull-left btn btn-default margin-left" id="convocatoria-cancel">Cancelar</button>
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
