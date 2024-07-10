    <div id="modalProfileUser" class="modal fade">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

        <div class="modal-header">
           <div class="row">
            <div class="col">
              <h4 class="solsoModalTitle modal-title-user">Editar Perfil</h4>
            </div>
           </div>
        </div>

        <div class="modal-body">
            @php
                $user_logged = \Auth::user();
            @endphp
            <div class="row solsoShowForm">
                <div class="col-md-12">
                    <div class="tab-content responsive ">
                        <div class="">
                            <div class="col-md-12">
                                {{ Form::open(array('id' => 'user-profile-form', 'role' => 'form', 'files' => true, 'enctype' => 'multipart/form-data', 'autocomplete' => 'off')) }}
                                    <input type="hidden" name="_method" value="PUT"/>
                                    <input type="hidden" name="id" value="{{ $user_logged->id }}">
                                    
                                    <div class="form-group">
                                        {{ Form::label('title', 'Nombre y Apellidos') }}
                                        <input type="text" name="name" value="{{ $user_logged->name }}" class="form-control" placeholder="Nombre y Apellidos">
                                        <div id="user-profile-name-error" class="text-danger mensaje-error"></div>
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('title', 'Celular') }}
                                        <input type="text" name="cellphone" value="{{ $user_logged->cellphone }}" class="form-control" placeholder="Número de celular">
                                        <div id="user-profile-cellphone-error" class="text-danger mensaje-error"></div>
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('title', 'Correo') }}
                                        <input type="text" name="correo" value="{{ $user_logged->correo }}" class="form-control" placeholder="Correo">
                                        <div id="user-profile-correo-error" class="text-danger mensaje-error"></div>
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('title', 'Cargo') }}
                                        <input type="text" name="position" value="{{ $user_logged->position }}" class="form-control" placeholder="Cargo">
                                        <div id="user-profile-position-error" class="text-danger mensaje-error"></div>
                                    </div>

<!--                                     <div class="form-group">
                                        <label>Foto</label>
                                        <input type="file" name="photo" value="" style="margin-bottom: 10px;" class="form-control">
                                        <img src="" alt="" style="height: 200px;">
                                    </div> -->
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" value="{{ $user_logged->email }}" style="margin-bottom: 10px;" placeholder="Nombre de usuario" class="form-control">
                                        <div id="user-profile-username-error" class=" text-danger mensaje-error"></div>
                                    </div>

                                   <div class="form-group">
                                        <label>Contraseña</label>
                                        <input type="text" name="password" style="margin-bottom: 10px;" placeholder="Nombre de usuario" class="form-control">
                                        <div id="user-profile-password-error" class=" text-danger mensaje-error"></div>
                                    </div>

                                   <div class="form-group">
                                        <label>Confirmar contraseña</label>
                                        <input type="text" name="password_confirmation" style="margin-bottom: 10px;" placeholder="Nombre de usuario" class="form-control">
                                        <div id="user-profile-password_confirmation-error" class=" text-danger mensaje-error"></div>
                                    </div>

                              {{ Form::close() }}
                            </div>
                            <div class="col-md-12">
                                <button class="pull-left btn btn-success btn-ms solsoSave margin-left" data-message-title="Create notification" data-message-error="Validation error messages" data-message-success="Data was saved" id="user-profile-update">
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
