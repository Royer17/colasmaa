<!-- <div id="modalCrearNoticia" class="modal container fade" data-width="1100" tabindex="-1" data-backdrop="static" data-keyboard="false" style="display: none;"> -->
    <div id="modalCrearNoticia" class="modal fade">

        <div class="modal-dialog modal-lg">
          <div class="modal-content">

        <div class="modal-header">
           <div class="row">
            <div class="col-md-6">
              <h4 class="solsoModalTitle" id="modal-title-post"></h4>
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
                                {{ Form::open(array('id' => 'form-post', 'role' => 'form', 'files' => true, 'enctype' => 'multipart/form-data')) }}

                                  	<input type="hidden" name="id" id="post_id">

                                    <div class="col-md-12">
                                        <div class="col-md-1"></div>
                                        <div id="post_error" class="col-md-10 titulo-error"></div>
                                        <div class="col-md-1"></div>
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('content', 'Categoría') }}
                                        <select class="form-control" name="type">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->titulo }}</option>
                                            @endforeach
                                        </select>
                                        <div id="post-type-error" class="mensaje-error"></div>
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('content', 'Actividad') }}
                                        <textarea name="actividad" placeholder="Actividad" class="form-control" id="summary-post" rows="2"></textarea>
                                        <div id="works-actividad-error" class="text-danger mensaje-error"></div>
                                    </div>
                                    
                                    <div class="form-group">
                                        {{ Form::label('content', 'Programa') }}
                                        <textarea name="programa" placeholder="Programa" class="form-control" rows="5"></textarea>
                                        <div id="works-programa-error" class="text-danger mensaje-error"></div>
                                    </div>

                                    <div class="form-group">
                                        <label>Foto</label>
                                        <input type="file" name="foto" value="" style="margin-bottom: 10px;" class="form-control">
                                        <img src="" alt="" style="height: 200px;" id="post_photo">
                                    </div>

                                    <div class="form-group">
                                        <label>Foto 2</label>
                                        <input type="file" name="foto1" value="" style="margin-bottom: 10px;" class="form-control">
                                        <img src="" alt="" style="height: 200px;" id="post_photo1">
                                    </div>

                                    <div class="form-group">
                                        <label>Foto 3</label>
                                        <input type="file" name="foto2" value="" style="margin-bottom: 10px;" class="form-control">
                                        <img src="" alt="" style="height: 200px;" id="post_photo2">
                                    </div>
                                   
                                    <div class="form-group">
                                        <label>Fecha de Inicio</label>
                                        <input type="text" name="fechaini" value="" style="margin-bottom: 10px;" placeholder="d/m/Y" class="form-control">
                                        <div id="works-fechaini-error" class=" text-danger mensaje-error"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Fecha de término</label>
                                        <input type="text" name="fechater" value="" style="margin-bottom: 10px;" placeholder="d/m/Y" class="form-control">
                                        <div id="works-fechater-error" class="text-danger mensaje-error"></div>
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
								<button class="pull-left btn btn-success btn-ms solsoSave" data-message-title="Create notification" data-message-error="Validation error messages" data-message-success="Data was saved" id="save-post">
										<i class="fa fa-save"></i> Guardar
								</button>

								<button class="pull-left btn btn-success btn-ms solsoSave margin-left" data-message-title="Create notification" data-message-error="Validation error messages" data-message-success="Data was saved" id="update-post">
										<i class="fa fa-save"></i> Actualizar
								</button>

								<button class="pull-left btn btn-default margin-left" id="post-cancel">Cancelar</button>
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
