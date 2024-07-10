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
                                    <input type="hidden" name="cover" value="" id="post_cover-base-64">

                                    <div class="col-md-12">
                                        <div class="col-md-1"></div>
                                        <div id="post_error" class="col-md-10 titulo-error"></div>
                                        <div class="col-md-1"></div>
                                    </div>

									<div class="form-group">
                                        {{ Form::label('title', 'Título') }}
                                        {{ Form::text('vc_titulo_informacion', null, array('placeholder' => 'Introduzca el título de la publicación', 'class' => 'form-control', 'id' =>'title-post')) }}
                                        <div id="post-title-error" class="mensaje-error text-danger"></div>
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('content', 'Resumen') }}
                                        <textarea name="vc_resumen_informacion" placeholder="" class="form-control" rows="5"></textarea>
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('content', 'Descripción') }}
                                        <textarea name="tx_contenido_informacion" placeholder="Descripción de la noticia." class="form-control" id="content-post" rows="12"></textarea>
                                        <div id="post-content-error" class="mensaje-error"></div>
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('title', 'Video') }}
                                        {{ Form::text('video', null, array('placeholder' => 'Enlace del video', 'class' => 'form-control', 'id' =>'video-post')) }}
                                        <div id="post-video-error" class="mensaje-error"></div>
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
                                        <label>Foto 4</label>
                                        <input type="file" name="foto3" value="" style="margin-bottom: 10px;" class="form-control">
                                        <img src="" alt="" style="height: 200px;" id="post_photo3">
                                    </div>

                                    <div class="form-group">
                                        <label>Foto 5</label>
                                        <input type="file" name="foto4" value="" style="margin-bottom: 10px;" class="form-control">
                                        <img src="" alt="" style="height: 200px;" id="post_photo4">
                                    </div>
                                   
                                    <div class="form-group">
                                        <label>Fecha</label>
                                        <input type="text" name="fecha" value="" style="margin-bottom: 10px;" placeholder="d/m/Y" class="form-control">
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
