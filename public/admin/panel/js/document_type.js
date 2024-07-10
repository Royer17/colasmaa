const documentType = {
    btnAdd: document.querySelector('.add'),
    btnSave: $('#modalDocumentType .save'),
    btnUpdate: $('#modalDocumentType .update'),
    btnClose: $('#modalDocumentType .close'),

    modalTitle:$('#modalDocumentType .title'),
    form:$('#modalDocumentType form'),
    formId: '#modalDocumentType form',

};

$datatable = $('#document-type-datatable').DataTable({
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
    ajax: `/admin/document-types-datatable`,
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

documentType.btnAdd.addEventListener('click', () => {
    cleanError();
    cleanModal();

    documentType.modalTitle.text("Crear Tipo de Documento");
    documentType.btnUpdate.hide();
    documentType.btnSave.show();
    $('#modalDocumentType').modal('show');
});

function Editar(btn){
    let _id = btn.value;

    cleanError();
    cleanModal();
    documentType.modalTitle.text("Editar Tipo de Documento");
    documentType.form.append('<input type="hidden" name="_method" value="PUT" />');

    documentType.btnSave.hide();
    documentType.btnUpdate.show();

    const route = '/admin/document-type/'+_id;
    $.get(route, function(p){

        const {id, description, name} = p;

        document.querySelector(`${documentType.formId} input[name="id"]`).value = id;

        document.querySelector(`${documentType.formId} input[name="name"]`).value = name; 
        document.querySelector(`${documentType.formId} textarea[name="description"]`).value = description;

        $('#modalDocumentType').modal('show');
    });

}

//---------------------------------------------
//Eliminar
function Eliminar(btn){
    const id = btn.value;

    Swal.fire({
    title: `Eliminar: ${btn.dataset.name}`,
    showCancelButton: true,
    confirmButtonText: `Confirmar`,
    cancelButtonText: `Cancelar`,
    }).then((result) => {

    if (result.value) {
      const route = `/admin/document-type/${id}`;
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
    document.querySelector(documentType.formId).reset();
    $(`${documentType.formId} input[name="_method"]`).remove();
    //$(`${user.formId} img`).hide();
}

documentType.btnUpdate.on('click',function(e){
    e.preventDefault();
    lockWindow();
    cleanError();

    const route = "document-type/"+$(`${documentType.formId} input[name="id"]`).val();
    let formData = new FormData(documentType.form[0]);

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
            $('#modalDocumentType').modal('hide');
        },
        error:function(jqXHR, textStatus, errorThrown)
        {
            unlockWindow();
            $('#modalDocumentType').scrollTop(0);
            $.each(jqXHR.responseJSON.errors, function( key, value ) {
                    $.each(value, function( errores, eror ) {
                        $(`#document-type-${key}-error`).append("<li class='error-block'>"+eror+"</li>");
                    });
            });
        }
     });
});

documentType.btnSave.on('click',function(event){
    event.preventDefault();
    lockWindow();
    cleanError();
    const route = "document-type";
    let formData = new FormData(documentType.form[0]);

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
            $(`#modalDocumentType`).modal('hide');
            unlockWindow();
		},
		error: function(jqXHR, textStatus, errorThrown)
		{
            unlockWindow();
            $('#modalDocumentType').scrollTop(0);
            $.each(jqXHR.responseJSON.errors, function( key, value ) {
                    $.each(value, function( errores, eror ) {
                        $(`#document-type-${key}-error`).append("<li class='error-block'>"+eror+"</li>");
                    });
            });
        }
	});
});
