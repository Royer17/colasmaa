const role = {
    btnAdd: document.querySelector('#role__add'),
    btnSave: $('#role-save'),
    btnUpdate: $('#role-update'),
    btnClose: $('#role-close'),

    modalTitle:$('#modal-title-role'),
    form:$('#role-form'),
    formId: '#role-form',

};

$datatable = $('#role-datatable').DataTable({
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
    ajax: `/admin/role-datatable`,
    columns: [
        {data:'id', name: 'id', 'searchable': false},
        {data:'name', name: 'name', 'searchable': true},
        {data:'description', name: 'description', 'searchable': true},
        {data:'Actions', 'searchable': false}
    ],
    "aoColumnDefs": [
        {
            "bVisible": false,
             "aTargets": [0]
        }, 
    ]
});

role.btnAdd.addEventListener('click', () => {
    cleanError();
    cleanModal();

    role.modalTitle.text("Crear Rol");
    role.btnUpdate.hide();
    role.btnSave.show();
    $('#modalRole').modal('show');
});

function Editar(btn){
    let _id = btn.value;

    cleanError();
    cleanModal();
    role.modalTitle.text("Editar Rol");
    role.form.append('<input type="hidden" name="_method" value="PUT" />');

    role.btnSave.hide();
    role.btnUpdate.show();

    const route = '/admin/role/'+_id;
    $.get(route, function(p){

        const {id, description, name} = p;

        document.querySelector(`${role.formId} input[name="id"]`).value = id;

        document.querySelector(`${role.formId} input[name="name"]`).value = name; 
        document.querySelector(`${role.formId} textarea[name="description"]`).value = description;

        $('#modalRole').modal('show');
    });

}

//---------------------------------------------
//Eliminar
function Eliminar(btn){
    const id = btn.value;

    Swal.fire({
    title: `Eliminar Rol`,
    showCancelButton: true,
    confirmButtonText: `Confirmar`,
    cancelButtonText: `Cancelar`,
    }).then((result) => {

    if (result.value) {
      const route = `/admin/role/${id}`;
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
                console.log(jqXHR);
                Swal.fire(`Error`, jqXHR.responseJSON.message, `warning`);
            }
       });
    }
    });
    return;
}
    
function cleanModal(){
    document.querySelector(role.formId).reset();
    $(`${role.formId} input[name="_method"]`).remove();
    //$(`${user.formId} img`).hide();
}

role.btnUpdate.on('click',function(e){
    e.preventDefault();
    lockWindow();
    cleanError();

    const route = "role/"+$(`${role.formId} input[name="id"]`).val();
    let formData = new FormData(role.form[0]);

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
            $('#modalRole').modal('hide');
        },
        error:function(jqXHR, textStatus, errorThrown)
        {
            unlockWindow();
            $('#modalRole').scrollTop(0);
            $.each(jqXHR.responseJSON.errors, function( key, value ) {
                    $.each(value, function( errores, eror ) {
                        $(`#role-${key}-error`).append("<li class='error-block'>"+eror+"</li>");
                    });
            });
        }
     });
});

role.btnSave.on('click',function(event){
    event.preventDefault();
    lockWindow();
    cleanError();
    const route = "role";
    let formData = new FormData(role.form[0]);

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
            $(`#modalRole`).modal('hide');
            unlockWindow();
		},
		error: function(jqXHR, textStatus, errorThrown)
		{
            unlockWindow();
            $('#modalRole').scrollTop(0);
            $.each(jqXHR.responseJSON.errors, function( key, value ) {
                    $.each(value, function( errores, eror ) {
                        $(`#role-${key}-error`).append("<li class='error-block'>"+eror+"</li>");
                    });
            });
        }
	});
});
