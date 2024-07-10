const user = {
    btnAdd: document.querySelector('#user__add'),
    btnSave: $('#user-save'),
    btnUpdate: $('#user-update'),
    btnClose: $('#user-close'),

    modalTitle:$('#modal-title-user'),
    form:$('#user-form'),
    formId: '#user-form',

};

$datatable = $('#user-datatable').DataTable({
    "dom": 'flrtip',
    "language": {
        "url": "/admin/panel/datatable.spanish.json"
    },
    order: [
        [0, 'desc']
    ],
    processing: true,
    serverSide: true,
    destroy:true,
    ajax: `/admin/user-datatable`,
    columns: [
        {data:'id', name: 'id', 'searchable': false},
        {data:'role_id', name: 'role_id', 'searchable': false},
        {data:'name', name: 'name', 'searchable': true},
        {data:'email', name: 'email', 'searchable': true},
        {data:'Actions', 'searchable': false}
    ],
    "aoColumnDefs": [
        {
            "bVisible": false,
             "aTargets": [0]
        }, 
        {
              "aTargets": [ 1 ],
              "mData": "role_id",
              "mRender": function ( data, type, full ) {
                return full['role_id'];
                // if (full['role_id'] == 1) {
                //     return "Administrador";
                // }

                // if (full['role_id'] == 3) {
                //     return "Imagen";
                // }

                // if (full['role_id'] == 4) {
                //     return "Recursos";
                // }

                // if (full['role_id'] == 5) {
                //     return "Legal";
                // }

              }
        }

    ]
});

user.btnAdd.addEventListener('click', () => {
    cleanError();
    cleanModal();

    user.modalTitle.text("Crear Usuario");
    user.btnUpdate.hide();
    user.btnSave.show();
    $('#modalUser').modal('show');
});

function Editar(btn){
    let _id = btn.value;

    cleanError();
    cleanModal();
    user.modalTitle.text("Editar Usuario");
    user.form.append('<input type="hidden" name="_method" value="PUT" />');

    user.btnSave.hide();
    user.btnUpdate.show();

    const route = '/admin/user/'+_id;
    $.get(route, function(p){

        const {id, role_id, name, email, cellphone, position, correo} = p;

        document.querySelector(`${user.formId} input[name="id"]`).value = id;

        if (document.querySelector(`${user.formId} select[name="role_id"]`)) {
            document.querySelector(`${user.formId} select[name="role_id"]`).value = role_id; 
        }

        document.querySelector(`${user.formId} input[name="name"]`).value = name; 
        document.querySelector(`${user.formId} input[name="username"]`).value = email;
        document.querySelector(`${user.formId} input[name="cellphone"]`).value = cellphone;
        document.querySelector(`${user.formId} input[name="position"]`).value = position;
        document.querySelector(`${user.formId} input[name="correo"]`).value = correo;

        $('#modalUser').modal('show');
    });

}

//---------------------------------------------
//Eliminar
function Eliminar(btn){
    const id = btn.value;

    Swal.fire({
    title: `Eliminar Usuario`,
    showCancelButton: true,
    confirmButtonText: `Confirmar`,
    cancelButtonText: `Cancelar`,
    }).then((result) => {

    if (result.value) {
      const route = `/admin/user/${id}`;
      lockWindow();
      const data = {};

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('input[name=_token]').val()
          }
      });
      $.ajax({
         type: 'DELETE',
         url: route,
         data: data,
            success: function(re){
                unlockWindow();
                $datatable.ajax.reload();
                Swal.fire(re.title, re.message, re.symbol);
            },
            error:function(jqXHR, textStatus, errorThrown)
            {
                unlockWindow();
                Swal.fire(`Error`, `Ha ocurrido un error`, `warning`);
            }
       });
    }
    });
    return;
}
    
function cleanModal(){
    document.querySelector(user.formId).reset();
    $(`${user.formId} input[name="_method"]`).remove();
    //$(`${user.formId} img`).hide();
}

user.btnUpdate.on('click',function(e){
    e.preventDefault();
    lockWindow();
    cleanError();

    const route = "user/"+$(`${user.formId} input[name="id"]`).val();
    let formData = new FormData(user.form[0]);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name=_token]').val()
        }
    });
    $.ajax({
        url : route,
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(e){
            unlockWindow();
            Swal.fire(e.title, e.message, e.symbol);
            $datatable.ajax.reload();
            $('#modalUser').modal('hide');
        },
        error:function(jqXHR, textStatus, errorThrown)
        {
            unlockWindow();
            $('#modalUser').scrollTop(0);
            $.each(jqXHR.responseJSON.errors, function( key, value ) {
                    $.each(value, function( errores, eror ) {
                        $(`#user-${key}-error`).append("<li class='error-block'>"+eror+"</li>");
                    });
            });
        }
     });
});

user.btnSave.on('click',function(event){
    event.preventDefault();
    lockWindow();
    cleanError();
    const route = "user";
    let formData = new FormData(user.form[0]);

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('input[name=_token]').val()
		}
	});
	$.ajax({
		url : route,
		type: 'POST',
		data: formData,
		contentType: false,
		processData: false,
		success: function(e){
            Swal.fire(e.title, e.message, e.symbol);
            $datatable.ajax.reload();
            $(`#modalUser`).modal('hide');
            unlockWindow();
		},
		error: function(jqXHR, textStatus, errorThrown)
		{
            unlockWindow();
            $('#modalUser').scrollTop(0);
            $.each(jqXHR.responseJSON.errors, function( key, value ) {
                    $.each(value, function( errores, eror ) {
                        $(`#user-${key}-error`).append("<li class='error-block'>"+eror+"</li>");
                    });
            });
        }
	});
});
