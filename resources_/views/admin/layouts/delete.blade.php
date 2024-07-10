<div class="modal fade" id="miModaleliminar" data-width="760" data-keyboard="false" data-backdrop="static">
      <div class="modal-header">
      <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
        <h4 class="solsoModalTitle">Eliminar Campo</h4>
      </div>
      <div class="modal-body">

      	<div class="modal-body">
      	    <p>Usted va ha eliminar este item, este procedimiento es irreversible ! </p>
      	    <p>¿Desea continuar?<p>
      	</div>

      </div>
      <div class="modal-footer">
      	{{ Form::open(array('id' => 'form-eliminar', 'role' => 'form', 'enctype' => 'multipart/form-data')) }}

			<input type="hidden" name="_method" value="PUT" />
      		<input type="hidden" name="id-eliminar" id ="id-eliminar">
      		
      		<button class="btn btn-danger solsoDelete" id="btn-delete" data-message-title="Delete notification" data-message-success="Data was deleted">Si</button>
                  <button type="button" class="btn btn-default solsoCancel" data-dismiss="modal">No</button>
      	{{ Form::close() }}

      </div>
</div>
