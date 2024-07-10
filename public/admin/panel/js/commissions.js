const commission = {
    btnAdd: document.querySelector('#commission__add'),
    btnSave: $('#commission-save'),
    btnUpdate: $('#commission-update'),
    btnClose: $('#commission-close'),

    modalTitle:$('#modal-title-schedule'),
    form:$('#commission-form'),
    formId: '#commission-form',

};

const roleId = document.querySelector('input[name="role_id"]').value;

$datatable = $('#commissions-datatable').DataTable({
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
    ajax: `/admin/commissions-datatable?role_id=${roleId}`,
    columns: [
        {data:'id', name: 'id', 'searchable': false},
        {data:'title', name: 'title', 'searchable': true},
        {data:'president', name: 'president', 'searchable': true},
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

commission.btnAdd.addEventListener('click', () => {
    cleanError();
    cleanModal();

    commission.modalTitle.text("Crear Comisión");
    commission.btnUpdate.hide();
    commission.btnSave.show();
    $('#modalCommission').modal('show');
});

function Editar(btn){
    let _id = btn.value;

    cleanError();
    cleanModal();
    commission.modalTitle.text("Editar Comisión");
    commission.form.append('<input type="hidden" name="_method" value="PUT" />');

    commission.btnSave.hide();
    commission.btnUpdate.show();

    const route = '/admin/commission/'+_id;
    $.get(route, function(p){

        const {id, title, president, members, published} = p;

        document.querySelector(`${commission.formId} input[name="id"]`).value = id; 
        document.querySelector(`${commission.formId} input[name="title"]`).value = title; 
        document.querySelector(`${commission.formId} input[name="president"]`).value = president; 
        document.querySelector(`${commission.formId} textarea[name="members"]`).value = members;
        document.querySelector(`${commission.formId} select[name="published"]`).value = published;

        $('#modalCommission').modal('show');
    });

}

//---------------------------------------------
//Eliminar
function Eliminar(btn){
    const id = btn.value;

    Swal.fire({
    title: `Eliminar Comisión`,
    showCancelButton: true,
    confirmButtonText: `Confirmar`,
    cancelButtonText: `Cancelar`,
    }).then((result) => {

    if (result.value) {
      const route = `/admin/commission/${id}`;
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
    document.querySelector(commission.formId).reset();
    $(`${commission.formId} input[name="_method"]`).remove();

}

commission.btnUpdate.on('click',function(e){
    e.preventDefault();
    lockWindow();
    cleanError();

    const route = "commission/"+$(`${commission.formId} input[name="id"]`).val();
    let formData = new FormData(commission.form[0]);

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
            $('#modalCommission').modal('hide');
        },
        error:function(jqXHR, textStatus, errorThrown)
        {
            unlockWindow();
            $('#modalCommission').scrollTop(0);
            $.each(jqXHR.responseJSON.errors, function( key, value ) {
                    $.each(value, function( errores, eror ) {
                        $(`#commission-${key}-error`).append("<li class='error-block'>"+eror+"</li>");
                    });
            });
        }
     });

});

commission.btnSave.on('click',function(event){
    event.preventDefault();
    lockWindow();
    cleanError();
    const route = "commission";
    let formData = new FormData(commission.form[0]);

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
            $(`#modalCommission`).modal('hide');
            unlockWindow();
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            unlockWindow();
            $('#modalCommission').scrollTop(0);
            $.each(jqXHR.responseJSON.errors, function( key, value ) {
                    $.each(value, function( errores, eror ) {
                        $(`#commission-${key}-error`).append("<li class='error-block'>"+eror+"</li>");
                    });
            });
        }
    });
});
