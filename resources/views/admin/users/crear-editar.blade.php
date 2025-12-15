<!-- <div id="modalCrearNoticia" class="modal container fade" data-width="1100" tabindex="-1" data-backdrop="static" data-keyboard="false" style="display: none;"> -->
    <div id="modalUser" class="modal fade">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

        <div class="modal-header">
           <div class="row">
            <div class="col">
              <h4 class="solsoModalTitle" id="modal-title-user">Crear Usuario</h4>
            </div>
           </div>
        </div>

        <div class="modal-body">
            <div class="row solsoShowForm">
                <div class="col-md-12">
                    <div class="tab-content responsive ">
                        <div class="">
                            <div class="col-md-12">
                                {{ Form::open(array('id' => 'user-form', 'role' => 'form', 'files' => true, 'enctype' => 'multipart/form-data', 'autocomplete' => 'off')) }}
                                    <input type="hidden" name="id">
                                    
                                    @if(\Auth::user()->role_id == 1)
                                    <div class="form-group">
                                        {{ Form::label('content', 'Rol') }}
    
                                        <select name="role_id" class="form-control">
                                            <option value="">Seleccione</option>
                                            @foreach($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                            {{-- 
                                            <option value="3">Imagen</option>
                                            <option value="4">Recursos</option>
                                            <option value="5">Legal</option>
                                            --}}

                                        </select>
                                        <div id="user-role_id-error" class="text-danger mensaje-error"></div>
                                    </div>
                                    @endif

                                    <div class="form-group">
                                        {{ Form::label('title', 'Nombre y Apellidos') }}
                                        <input type="text" name="name" class="form-control" placeholder="Nombre y Apellidos">
                                        <div id="user-name-error" class="text-danger mensaje-error"></div>
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('title', 'Celular') }}
                                        <input type="text" name="cellphone" class="form-control" placeholder="Número de celular">
                                        <div id="user-cellphone-error" class="text-danger mensaje-error"></div>
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('title', 'Correo') }}
                                        <input type="text" name="correo" class="form-control" placeholder="Correo">
                                        <div id="user-correo-error" class="text-danger mensaje-error"></div>
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('title', 'Cargo') }}
                                        <input type="text" name="position" class="form-control" placeholder="Cargo">
                                        <div id="user-position-error" class="text-danger mensaje-error"></div>
                                    </div>

<!--                                     <div class="form-group">
                                        <label>Foto</label>
                                        <input type="file" name="photo" value="" style="margin-bottom: 10px;" class="form-control">
                                        <img src="" alt="" style="height: 200px;">
                                    </div> -->
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" style="margin-bottom: 10px;" placeholder="Nombre de usuario" class="form-control">
                                        <div id="user-username-error" class=" text-danger mensaje-error"></div>
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('content', 'Oficina') }}
                                        
                                        <select name="office_id" class="form-control">
                                            <option value="0">Seleccione</option>
                                            @foreach($offices as $office)
                                            <option value="{{ $office->id }}">{{ $office->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group d-none">
                                        {{ Form::label('content', 'Ventanilla') }}

                                        <select name="ventanilla" class="form-control">
                                            <option value="0">Seleccione</option>
                                            @foreach($ventanillas as $ventanilla)
                                            <option value="{{ $ventanilla->id }}">{{ $ventanilla->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                   <div class="form-group">
                                        <label>Contraseña</label>
                                        <input type="text" name="password" style="margin-bottom: 10px;" placeholder="Nombre de usuario" class="form-control">
                                        <div id="user-password-error" class=" text-danger mensaje-error"></div>
                                    </div>

                                   <div class="form-group">
                                        <label>Confirmar contraseña</label>
                                        <input type="text" name="password_confirmation" style="margin-bottom: 10px;" placeholder="Nombre de usuario" class="form-control">
                                        <div id="user-password_confirmation-error" class=" text-danger mensaje-error"></div>
                                    </div>


                              {{ Form::close() }}
                            </div>
                            <div class="col-md-12">
                                <button class="pull-left btn btn-success btn-ms solsoSave" data-message-title="Create notification" data-message-error="Validation error messages" data-message-success="Data was saved" id="user-save">
                                        <i class="fa fa-save"></i> Guardar
                                </button>

                                <button class="pull-left btn btn-success btn-ms solsoSave margin-left" data-message-title="Create notification" data-message-error="Validation error messages" data-message-success="Data was saved" id="user-update">
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
