<!-- <div id="modalEditarpublicacion" class="modal container fade" data-width="1100" tabindex="-1" data-backdrop="static" data-keyboard="false" style="display: none;">

	<div class="modal-header">
			<button type="button" data-dismiss="modal" aria-hidden="true" class="close cerrar-editar-publicacion">×</button>
		<h4 class="solsoModalTitle"><b>Editar publicacion</b></h4>
	</div>
	<div class="modal-body">
		<div class="row solsoShowForm">

			{{ Form::open(array('id' => 'form-editar-publicacion', 'role' => 'form', 'files' => true, 'enctype' => 'multipart/form-data')) }}

				<input type="hidden" name="_method" value="PUT" />
				<input type="hidden" name="edit-publicacion-id" id ="edit-publicacion-id">

				<input type="hidden" id ="publicacion-editable">

				<div class="col-md-12">
					<div class="col-md-1"></div>
					<div id="error-editar-publicacion" class="col-md-10 titulo-error"></div>
					<div class="col-md-1"></div>
				</div>

				<div class="col-md-6">
					<div class="sugerencia centrar-contenido titulo-error"> Asegúrese de Subir Imagenes Por Favor</div>
					<a id="add-images-editar" class="btn btn-default btn-xs">Agregar más imagenes</a>
					<div id="contenedor_imagenes-editar"></div>
				</div>

				<div class="col-md-6">
				    <div class="form-group">
				  		{{ Form::label('published', 'Publicado') }}
				  		{{ Form::select('published', [], null, ['class' =>'form-control', 'id' => 'edit-publicacion-published']) }}
					</div>
					<div class="form-group">
				    	{{ Form::label('title', 'Titulo') }}
				    	{{ Form::text('title', null, array('placeholder' => 'Introduzca el nombre del Menú', 'class' => 'form-control', 'id' => 'edit-publicacion-title')) }}
				    	<div id="error-title-publicacion-editar" class="mensaje-error"></div>
				    </div>

				    <div class="form-group">
				    	{{ Form::label('content', 'Contenido') }}
				    	{{ Form::textarea('content', null, array('placeholder' => 'Introduzca su Contenido', 'class' => 'form-control', 'id' => 'edit-publicacion-content')) }}
				    	<div id="error-content-publicacion-editar" class="mensaje-error"></div>
				    </div>

				</div>



			{{ Form::close() }}

		</div>
	</div>
	<div class="modal-footer">
	<div class="form-group col-md-12">
					<button class="btn btn-success btn-sm" data-message-title="Create notification" data-message-error="Validation error messages" data-message-success="Data was saved" id="update-publicacion">
						<i class="fa fa-save"></i> Actualizar
					</button>
						<button type="reset" class="btn btn-default solsoCancel cerrar-editar-publicacion" data-dismiss="modal" >Cancel</button>
				</div>

		</div>
</div> -->
