<!-- <div id="modalCrearNoticia" class="modal container fade" data-width="1100" tabindex="-1" data-backdrop="static" data-keyboard="false" style="display: none;"> -->
    <div id="modalCrearNorma" class="modal fade">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

        <div class="modal-header">
           <div class="row">
            <div class="col-md-6">
              <h4 class="solsoModalTitle title">Crear Norma</h4>
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
                                {{ Form::open(array('id' => 'form-normas', 'role' => 'form', 'files' => true, 'enctype' => 'multipart/form-data')) }}
                                    <input type="hidden" name="id">

                                    <div class="col-md-12">
                                        <div class="col-md-1"></div>
                                        <div id="convocatoria_error" class="col-md-10 titulo-error"></div>
                                        <div class="col-md-1"></div>
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('title', 'Tipo de Documento') }}
                                        <select name="tipodocu" class="form-control">
                                            @foreach($document_types as $document_type)
                                            <option value="{{ $document_type->id }}">{{ $document_type->name }}</option>
                                            @endforeach
                                            {{-- 
                                            <option value="Acuerdo de Concejo">Acuerdo de Concejo</option>
                                            <option value="Ordenanza Municipal">Ordenanza Municipal</option>
                                            <option value="Resolución de Alcaldia">Resolución de Alcaldia</option>
                                            <option value="Decreto de Alcaldia">Decreto de Alcaldia</option>
                                            <option value="Resolución de Gerencia Municipal">Resolución de Gerencia Municipal</option>
                                            --}}
                                        </select>
                                        <div id="norma-tipodocu-error" class="text-danger mensaje-error"></div>
                                    </div>

                                    <div class="form-group">
                                        <label>Fecha de Emisión</label>
                                        <input type="text" name="fechaemi" value="" style="margin-bottom: 10px;" placeholder="d/m/Y" class="form-control">
                                        <div id="norma-fechaemi-error" class=" text-danger mensaje-error"></div>
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('title', 'Número de Documento') }}
                                        {{ Form::text('numdoc', null, array('placeholder' => 'EJEMPLO: ORDENANZA MUNICIPAL Nº 000X-202X', 'class' => 'form-control')) }}
                                        <div id="norma-numdoc-error" class="mensaje-error"></div>
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('title', 'Referencia') }}
                                        {{ Form::textarea('referenc', null, array('placeholder' => 'EJEMPLO: ORDENANZA MUNICIPAL Nº 000X-202X: CONTENIDO DE LA ORDENANZA', 'class' => 'form-control')) }}
                                        <div id="norma-referenc-error" class="mensaje-error"></div>
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('title', 'Visible') }}
                                        <select class="form-control" name="published">
                                            <option value="1">Si</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Archivo</label>
                                        <input type="file" name="nomfile" value="" style="margin-bottom: 10px;" class="form-control">
                                        <div>
                                            <a href="" target="_blank">Archivo</a>
                                            <button type="button" onclick="EliminarArchivo(this);">X</button>
                                        </div>
                                        
                                    </div>
                                    
                              {{ Form::close() }}
                            </div>
                            <div class="col-md-12">
                                <button class="pull-left btn btn-success btn-ms solsoSave" data-message-title="Create notification" data-message-error="Validation error messages" data-message-success="Data was saved" id="norma-save">
                                        <i class="fa fa-save"></i> Guardar
                                </button>

                                <button class="pull-left btn btn-success btn-ms solsoSave margin-left" data-message-title="Create notification" data-message-error="Validation error messages" data-message-success="Data was saved" id="norma-update">
                                        <i class="fa fa-save"></i> Actualizar
                                </button>

                                <button class="pull-left btn btn-default margin-left" id="norma-cancel">Cancelar</button>
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
