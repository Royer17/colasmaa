<div id="modalCrearNoticia" class="modal container fade" data-width="1100" tabindex="-1" data-backdrop="static" data-keyboard="false" style="display: none;">

    <div class="modal-content">
        <div class="modal-header">
            <h4 id='noticia-title' class="solsoModalTitle"></h4>
        </div>
        <div class="modal-body">
            <div class="row solsoShowForm">

                <div class="col-md-12">
                    <ul class="nav ul-edit nav-tabs responsive">
                        <li class="active"><a href="#publicacion_tab1" data-toggle="tab">Publicación00</a></li>
                        <li class=""><a href="#publicacion_tab2" data-toggle="tab">Imagenes</a></li>
                    </ul>
                    <div class="tab-content responsive ">
                        <div class="tab-pane active fade in" id="publicacion_tab1">
                          <div class="col-md-12" id="divPhotos"></div>
                          <div class="col-md-12" id="divContents"></div>
                            <div class="col-md-12">
                                {{ Form::open(array('id' => 'form-crear-noticia', 'role' => 'form', 'files' => true, 'enctype' => 'multipart/form-data')) }}

                                    <div class="col-md-12">
                                        <div class="col-md-1"></div>
                                        <div id="error-crear-noticia" class="col-md-10 titulo-error"></div>
                                        <div class="col-md-1"></div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group col-md-8">
                                            {{ Form::label('name', 'Título') }}
                                            {{ Form::text('name', null, array('placeholder' => 'Introduzca el nombre del cliente', 'class' => 'form-control')) }}
                                            <div id="error-name-noticia-crear" class="mensaje-error"></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            {{ Form::label('published', 'Publicado') }}
                                            {{ Form::select('published', [true => 'Si', false => 'No'], null, ['class' =>'form-control group-select']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('content', 'Descripción') }}
                                            {{ Form::textarea('noticia', null, array('placeholder' => 'Descripción de la noticia del cliente', 'class' => 'form-control editor_texto', 'id' => 'content_noticia')) }}
                                            <div id="error-content-programa-crear" class="mensaje-error"></div>
                                        </div>

                                    </div>
                                {{ Form::close() }}
                            </div>
                        </div>

                        <div class="tab-pane fade" id="publicacion_tab2">
                            <div class="col-md-12">
                                <div class="sugerencia centrar-contenido titulo-error"> Asegúrese de Subir Imagenes Por Favor</div>
                                <div id="contenedor_imagen-noticia">
                                    <ol id="carousel-li"></ol>
                                    <div id="carousel-items" role="listbox"></div>
                                    <form action="/file-upload" id="my-dropzone" class="dropzone"></form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="modal-footer">
    <button type="reset" data-dismiss="modal" class="btn btn-default" id="cerrar-crear-noticia">Cancelar</button><button type="button" class="btn btn-primary" data-message-title="Create notification" data-message-error="Validation error messages" data-message-success="Data was saved" id="SavePost"><i class="fa fa-save"></i></button>
      </div>
    <div->
</div>
