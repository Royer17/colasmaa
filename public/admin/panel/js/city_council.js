const city_council = {
    btnAdd: document.querySelector('#city-council__add'),
    btnSave: $('#city-council-save'),
    btnUpdate: $('#city-council-update'),
    btnClose: $('#city-council-close'),

    modalTitle: $('#modal-title-city-council'),
    form: $('#city-council-form'),
    formId: '#city-council-form',

};

const roleId = document.querySelector('input[name="role_id"]').value;

$datatable = $('#city-council-datatable').DataTable({
    "dom": 'flrtip',
    "language": {
        "url": "/admin/panel/datatable.spanish.json"
    },
    order: [
        [0, 'desc']
    ],
    processing: true,
    serverSide: true,
    destroy: true,
    ajax: `/admin/city-council-datatable?role_id=${roleId}`,
    columns: [
        { data: 'id', name: 'city_council.id', 'searchable': false },
        { data: 'name', name: 'city_council.name', 'searchable': true },
        { data: 'email', name: 'city_council.email', 'searchable': false },
        { data: 'ventanilla_name', name: 'commissions.title', 'searchable': true },
        { data: 'position', name: 'city_council.position', 'searchable': true },
        // {data:'Image', 'searchable': false},
        { data: 'published', 'searchable': false },
        { data: 'Actions', 'searchable': false }
    ],
    "aoColumnDefs": [
        {
            "bVisible": false,
            "aTargets": [0, 3]
        },
        {
            "aTargets": [5],
            "mData": "published",
            "mRender": function (data, type, full) {

                if (full['published'] == 1) {
                    return "Activo";
                }
                return "No Activo";
            }
        }
    ]
});

city_council.btnAdd.addEventListener('click', () => {
    cleanError();
    cleanModal();

    city_council.modalTitle.text("Crear Oficina");
    city_council.btnUpdate.hide();
    city_council.btnSave.show();
    $('#modalCityCouncil').modal('show');
});

function Editar(btn) {
    let _id = btn.value;

    cleanError();
    cleanModal();
    city_council.modalTitle.text("Editar Oficina");
    city_council.form.append('<input type="hidden" name="_method" value="PUT" />');

    city_council.btnSave.hide();
    city_council.btnUpdate.show();

    const route = '/admin/city-council/' + _id;
    $.get(route, function (p) {

        const { id, position, name, email, photo, published, commission_id, icon } = p;

        document.querySelector(`${city_council.formId} input[name="id"]`).value = id;
        document.querySelector(`${city_council.formId} input[name="position"]`).value = position;
        document.querySelector(`${city_council.formId} input[name="icon"]`).value = icon;
        document.querySelector(`${city_council.formId} input[name="name"]`).value = name;
        document.querySelector(`${city_council.formId} input[name="email"]`).value = email;
        document.querySelector(`${city_council.formId} select[name="published"]`).value = published;
        document.querySelector(`${city_council.formId} select[name="commission_id"]`).value = commission_id;

        // if(photo){
        //     document.querySelector(`${city_council.formId} img`).setAttribute('src', `${photo}`);
        //     $(`${city_council.formId} img`).show();
        // }

        $('#modalCityCouncil').modal('show');
    });

}

//---------------------------------------------
//Eliminar
function Eliminar(btn) {
    const id = btn.value;

    Swal.fire({
        title: `Eliminar Oficina`,
        showCancelButton: true,
        confirmButtonText: `Confirmar`,
        cancelButtonText: `Cancelar`,
    }).then((result) => {

        if (result.value) {
            const route = `/admin/city-council/${id}`;
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
                success: function (re) {
                    unlockWindow();
                    $datatable.ajax.reload();
                    Swal.fire(re.title, re.message, re.symbol);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    unlockWindow();
                    Swal.fire(`Error`, `Ha ocurrido un error`, `warning`);
                }
            });
        }
    });
    return;
}

function cleanModal() {
    document.querySelector(city_council.formId).reset();
    $(`${city_council.formId} input[name="_method"]`).remove();
    $(`${city_council.formId} img`).hide();
}

city_council.btnUpdate.on('click', function (e) {
    e.preventDefault();
    lockWindow();
    cleanError();

    const route = "city-council/" + $(`${city_council.formId} input[name="id"]`).val();
    let formData = new FormData(city_council.form[0]);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name=_token]').val()
        }
    });
    $.ajax({
        url: route,
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (e) {
            unlockWindow();
            Swal.fire(e.title, e.message, e.symbol);
            $datatable.ajax.reload();
            $('#modalCityCouncil').modal('hide');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            unlockWindow();
            $('#modalCityCouncil').scrollTop(0);
            $.each(jqXHR.responseJSON.errors, function (key, value) {
                $.each(value, function (errores, eror) {
                    $(`#city-council-${key}-error`).append("<li class='error-block'>" + eror + "</li>");
                });
            });
        }
    });

});

city_council.btnSave.on('click', function (event) {
    event.preventDefault();
    lockWindow();
    cleanError();
    const route = "city-council";
    let formData = new FormData(city_council.form[0]);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name=_token]').val()
        }
    });
    $.ajax({
        url: route,
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (e) {
            Swal.fire(e.title, e.message, e.symbol);
            $datatable.ajax.reload();
            $(`#modalCityCouncil`).modal('hide');
            unlockWindow();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            unlockWindow();
            $('#modalCityCouncil').scrollTop(0);
            $.each(jqXHR.responseJSON.errors, function (key, value) {
                $.each(value, function (errores, eror) {
                    $(`#city-council-${key}-error`).append("<li class='error-block'>" + eror + "</li>");
                });
            });
        }
    });
});
