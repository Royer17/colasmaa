<!-- <div id="modalCrearNoticia" class="modal container fade" data-width="1100" tabindex="-1" data-backdrop="static" data-keyboard="false" style="display: none;"> -->
    <div id="modalCityCouncil" class="modal fade">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

        <div class="modal-header">
           <div class="row">
            <div class="col">
              <h4 class="solsoModalTitle" id="modal-title-city-council">Crear OFICINA</h4>
            </div>
           </div>
        </div>

        <div class="modal-body">
            <div class="row solsoShowForm">
                <div class="col-md-12">
                    <div class="tab-content responsive ">
                        <div class="">
                            <div class="col-md-12">
                                {{ Form::open(array('id' => 'city-council-form', 'role' => 'form', 'files' => true, 'enctype' => 'multipart/form-data', 'autocomplete' => 'off')) }}
                                    <input type="hidden" name="id">


                                    <div class="form-group">
                                        {{ Form::label('title', 'Nombre') }}
                                        <input type="text" name="name" class="form-control" placeholder="Nombre">
                                        <div id="city-council-name-error" class="text-danger mensaje-error"></div>
                                    </div>

                                    <div class="form-group">
                                        <label>Sigla</label>
                                        <input type="text" name="email" style="margin-bottom: 10px;" placeholder="Sigla" class="form-control">
                                        <div id="city-council-email-error" class=" text-danger mensaje-error"></div>
                                    </div>


                                    <div class="form-group">
                                        {{ Form::label('content', 'Posición') }}
                                        <input type="text" name="position" class="form-control" placeholder="Cargo">
                                        <div id="city-council-subject-error" class="text-danger mensaje-error"></div>
                                    </div>
                                

<!--                                     <div class="form-group">
                                        <label>Foto</label>
                                        <input type="file" name="photo" value="" style="margin-bottom: 10px;" class="form-control">
                                        <img src="" alt="" style="height: 200px;">
                                    </div> -->

                                    <div class="form-group">
                                        {{ Form::label('title', 'Ventanilla') }}
                                        <select class="form-control" name="commission_id">
                                            <option value="">Seleccione</option>
                                            @foreach($ventanillas as $ventanilla)
                                            <option value="{{ $ventanilla->id }}">{{ $ventanilla->title }}</option>
                                            @endforeach
                                        </select>
                                        <div id="city-council-commission_id-error" class="text-danger mensaje-error"></div>
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('title', 'Estado') }}
                                        <select class="form-control" name="published">
                                            <option value="1">Activo</option>
                                            <option value="0">Inactivo</option>
                                        </select>
                                    </div>

                              {{ Form::close() }}
                            </div>
                            <div class="col-md-12">
                                <button class="pull-left btn btn-success btn-ms solsoSave" data-message-title="Create notification" data-message-error="Validation error messages" data-message-success="Data was saved" id="city-council-save">
                                        <i class="fa fa-save"></i> Guardar
                                </button>

                                <button class="pull-left btn btn-success btn-ms solsoSave margin-left" data-message-title="Create notification" data-message-error="Validation error messages" data-message-success="Data was saved" id="city-council-update">
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
