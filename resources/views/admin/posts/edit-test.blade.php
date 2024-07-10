<!-- <div id="modalEditarNoticia" class="modal container fade" data-width="1100" tabindex="-1" data-backdrop="static" data-keyboard="false" style="display: none;">


	<div class="modal-header">
			<button type="button" data-dismiss="modal" aria-hidden="true" class="close cerrar-editar-publicacion">×</button>
		<h4 class="solsoModalTitle"><b>Editar publicacion</b></h4>
	</div>
	<div class="modal-body">
		<div class="row solsoShowForm">


			<div class="col-md-12">
					<ul class="nav ul-edit nav-tabs responsive">
							<li class="active"><a href="#edit_tab1" data-toggle="tab">Publicación</a></li>
							<li class=""><a href="#edit_tab2" data-toggle="tab">Imagenes</a></li>
					</ul>

					<div class="tab-content responsive">
						<div class="tab-pane active fade in" id="edit_tab1">
								<div class="col-md-12" id="divPhotos-edit"></div>
								<div class="col-md-12" id="divContents-edit"></div>

									<div class="col-md-12">

													{{ Form::open(array('id' => 'form-editar-noticia', 'role' => 'form', 'files' => true, 'enctype' => 'multipart/form-data')) }}

														<input type="hidden" name="_method" value="PUT" />
														<input type="hidden" name="edit-noticia-id" id ="edit-noticia-id">

														<input type="hidden" id ="noticia-editable">

														<div class="col-md-12">
																	<div class="col-md-1"></div>
																	<div id="error-editar-noticia" class="col-md-10 titulo-error"></div>
																	<div class="col-md-1"></div>
														</div>

														<div class="col-md-12">
																<div class="form-group col-md-8">
																			{{ Form::label('title', 'Titulo') }}
																			{{ Form::text('title', null, array('placeholder' => 'Introduzca el nombre del Menú', 'class' => 'form-control', 'id' => 'edit-noticia-title')) }}
																			<div id="error-title-noticia-editar" class="mensaje-error"></div>
																</div>
																<div class="form-group col-md-4">
																		{{ Form::label('published', 'Publicado') }}
																		{{ Form::select('published', [], null, ['class' =>'form-control', 'id' => 'edit-noticia-published']) }}
																</div>
																<div class="form-group">
																			{{ Form::label('content', 'Contenido') }}
																			{{ Form::textarea('content', null, array('placeholder' => 'Introduzca su Contenido', 'class' => 'form-control', 'id' => 'edit-noticia-content')) }}
																			<div id="error-content-noticia-editar" class="mensaje-error"></div>
																</div>

														</div>
							        {{ Form::close() }}

									</div>
					  </div>
					  <div class="tab-pane fade" id="edit_tab2">
								<div class="col-md-12">
										<div class="sugerencia centrar-contenido titulo-error"> Asegúrese de Subir Imagenes Por Favor</div>
										<div id="contenedor_imagen-noticia">
												<ol id="carousel-li">Slider</ol>
													<div id="carousel-items-test" role="listbox">


													</div>

												<form action="/file-upload" id="my-dropzone-edit" class="dropzone"></form>
										</div>
								</div>
						</div>
					</div>
				</div>

			</div>
	</div>

		<div class="modal-footer">
		<div class="form-group col-md-12">
						<button class="btn btn-success btn-sm" data-message-title="Create notification" data-message-error="Validation error messages" data-message-success="Data was saved" id="update-noticia-test">
							<i class="fa fa-save"></i> Actualizar
						</button>
							<button type="reset" class="btn btn-default solsoCancel cerrar-editar-noticia" data-dismiss="modal" >Cancel</button>
					</div>

			</div>

	</div> -->
