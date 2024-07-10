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
                                        {{ Form::text('titulo_slide', null, array('placeholder' => 'Título', 'class' => 'form-control')) }}
                                        <div id="slider-titulo_slide-error" class="mensaje-error text-danger"></div>
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('title', 'Orden') }}
                                        {{ Form::text('orden_slide', null, array('placeholder' => 'Orden', 'class' => 'form-control')) }}
                                        <div id="slider-orden_slide-error" class="mensaje-error"></div>
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('title', 'Visible') }}
                                        <select class="form-control" name="published">
                                            <option value="1">Si</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Foto</label>
                                        <input type="file" name="img_slide" value="" style="margin-bottom: 10px;" class="form-control">
                                        <img src="" alt="" style="height: 200px;" id="slide_photo">
                                        <div id="slider-img_slide-error" class="mensaje-error"></div>
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
