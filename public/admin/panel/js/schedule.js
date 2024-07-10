const schedule = {
    btnAdd: document.querySelector('#schedule__add'),
    btnSave: $('#schedule-save'),
    btnUpdate: $('#schedule-update'),
    btnClose: $('#schedule-close'),
    btnCancel: $('#schedule-cancel'),

    selectCategories:$('#categories-schedule'),
    modalTitle:$('#modal-title-schedule'),
    form:$('#form-schedule'),
    formId: '#form-schedule',

};

const roleId = document.querySelector('input[name="role_id"]').value;

$(document).on('ready',function(){
	//datatableSchedule("");

    $(`#form-schedule input[name="fecha"]`).datepicker({
        format: 'dd/mm/yyyy',
        language: 'es-ES',
    });

});

schedule.btnCancel.on('click', function(){
    $('#modalSchedule').modal('hide');
});


$datatable = $('#schedule-datatable').DataTable({
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
    ajax: `/admin/schedule-datatable?role_id=${roleId}`,
    columns: [
        {data:'id', name: 'id', 'searchable': false},
        {data:'type', name: 'type', 'searchable': true},
        {data:'date', name: 'date', 'searchable': false},
        {data:'Image', 'searchable': false},
        {data:'published', 'searchable': false},
        {data:'Actions', 'searchable': false}
    ],
    "aoColumnDefs": [
        {
            "bVisible": false,
             "aTargets": [0, 3]
        },
        {
              "aTargets": [ 2 ],
              "mData": "date",
              "mRender": function ( data, type, full ) {
                  return full['Image'];
              }
        },
        {
              "aTargets": [ 4 ],
              "mData": "published",
              "mRender": function ( data, type, full ) {

                if (full['published'] == 1) {
                    return "Sí";
                }
                return "No";
              }
        }
    ]
});


schedule.btnAdd.addEventListener('click', () => {
    cleanError();
    cleanModal();
    addSummernoteEditorMini($(`${schedule.formId} textarea[name="subject"]`));

    schedule.modalTitle.text("Crear Agenda");
    schedule.btnUpdate.hide();
    schedule.btnSave.show();
    $('#modalSchedule').modal('show');
});

function Editar(btn){
    let _id = btn.value;

    cleanError();
    cleanModal();
    schedule.modalTitle.text("Editar Agenda");
    schedule.form.append('<input type="hidden" name="_method" value="PUT" />');

    schedule.btnSave.hide();
    schedule.btnUpdate.show();
    $(`#slide_photo`).hide();

    const route = '/admin/schedule/'+_id;
    $.get(route, function(p){

        const {id, fecha, subject, type, fecha_formatted, published} = p;

        document.querySelector(`${schedule.formId} input[name="id"]`).value = id; 
        document.querySelector(`${schedule.formId} input[name="fecha"]`).value = fecha_formatted; 
        document.querySelector(`${schedule.formId} select[name="type"]`).value = type; 
        document.querySelector(`${schedule.formId} textarea[name="subject"]`).value = subject;
        addSummernoteEditorMini($(`${schedule.formId} textarea[name="subject"]`));
        document.querySelector(`${schedule.formId} select[name="published"]`).value = published;

        $('#modalSchedule').modal('show');
    });

}

//---------------------------------------------
//Eliminar
function Eliminar(btn){
    const id = btn.value;

    Swal.fire({
    title: `Eliminar Agenda`,
    showCancelButton: true,
    confirmButtonText: `Confirmar`,
    cancelButtonText: `Cancelar`,
    }).then((result) => {

    if (result.value) {
      const route = `/admin/schedule/${id}`;
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
    })
    return;
}

function cleanModal(){
    destroySummernote($(`${schedule.formId} textarea[name="subject"]`));
    document.querySelector(schedule.formId).reset();
    //document.querySelector(`${schedule.formId} input[name="_method"]`).remove();
  //$('#form-schedule')[0].reset();
    $(`${schedule.formId} input[name="_method"]`).remove();
}

schedule.btnUpdate.on('click',function(e){
    e.preventDefault();
    lockWindow();
    cleanError();

    const route = "schedule/"+$('#form-schedule input[name="id"]').val();
    let formData = new FormData(schedule.form[0]);

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
            $('#modalSchedule').modal('hide');
        },
        error:function(jqXHR, textStatus, errorThrown)
        {
            unlockWindow();
            $('#modalSchedule').scrollTop(0);
            $.each(jqXHR.responseJSON.errors, function( key, value ) {
                    $.each(value, function( errores, eror ) {
                        $(`#schedule-${key}-error`).append("<li class='error-block'>"+eror+"</li>");
                    });
            });
        }
     });

});

schedule.btnSave.on('click',function(event){
    event.preventDefault();
    lockWindow();
    cleanError();
    const route = "schedule";
    let formData = new FormData(schedule.form[0]);

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
            $(`#modalSchedule`).modal('hide');
            unlockWindow();
		},
		error: function(jqXHR, textStatus, errorThrown)
		{
            unlockWindow();
            $('#modalSchedule').scrollTop(0);
            $.each(jqXHR.responseJSON.errors, function( key, value ) {
                    $.each(value, function( errores, eror ) {
                        $(`#schedule-${key}-error`).append("<li class='error-block'>"+eror+"</li>");
                    });
            });
        }
	});
});
