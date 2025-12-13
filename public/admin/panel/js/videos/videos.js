const roleId = document.querySelector('input[name="role_id"]').value;

$(document).on('ready', function () {
    datatableVideos("");
});

video.btnCancel.on('click', function () {
    $('#modalCrearVideo').modal('hide');
});

function datatableVideos() {
    $videosTable = $('#videos-datatable').DataTable({
        "dom": 'flrtip',
        "language": {
            "url": "/admin/panel/datatable.spanish.json"
        },
        processing: true,
        serverSide: true,
        destroy: true,
        ajax: `/admin/videos-datatable?role_id=${roleId}`,
        columns: [
            { data: 'id', name: 'id', 'searchable': false },
            { data: 'foto', name: 'foto', 'searchable': false },
            { data: 'titulo', name: 'titulo', 'searchable': true },
            { data: 'created_at', name: 'created_at', 'searchable': false },
            { data: 'Image', 'searchable': false },
            { data: 'published', 'searchable': false },
            { data: 'Actions', 'searchable': false }
        ],
        "aoColumnDefs": [
            {
                "bVisible": false,
                "aTargets": [0, 4]
            },
            {
                "aTargets": [1],
                "mData": "foto",
                "mRender": function (data, type, full) {
                    return `<a href="${full['foto']}" target="_blank">Enlace</a>`;
                }
            },
            {
                "aTargets": [3],
                "mData": "created_at",
                "mRender": function (data, type, full) {
                    return full['Image'];
                }
            },
            {
                "aTargets": [5],
                "mData": "published",
                "mRender": function (data, type, full) {

                    if (full['published'] == 1) {
                        return "Activo";
                    }
                    return "Inactivo";
                }
            }

            // {
            //       "aTargets": [ 4 ],
            //       "mData": "nomfile",
            //       "mRender": function ( data, type, full ) {
            //           if (full['nomfile']) {
            //             return `<a href="${full['nomfile']}">Link</a>`;
            //           }
            //           return "";
            //       }
            // },
        ]
    });
}

function Editar(btn) {
    let _id = btn.value;

    cleanError();
    cleanModal();
    video.modalTitle.text("Editar video");
    video.form.append('<input id="video_method" type="hidden" name="_method" value="PUT" />');

    video.btnSave.hide();
    video.btnUpdate.show();

    let _route = '/admin/video/' + _id;
    $.get(_route, function (p) {
        const form = `#form-videos`;
        document.querySelector(`${form} input[name="titulo"]`).value = p.titulo;
        document.querySelector(`${form} input[name="id"]`).value = p.id;
        //document.querySelector(`${form} input[name="video"]`).value = p.video; 
        document.querySelector(`${form} select[name="published"]`).value = p.published;

        //$('#form-videos input[name="foto"]').next().hide();
        if (p.foto) {
            $('#form-videos input[name="foto"]').val(p.foto);
            // $('#form-videos input[name="foto"]').next().show();
        }

        $('#modalCrearVideo').modal('show');
    });

}

//---------------------------------------------
//Eliminar
function Eliminar(btn) {
    const idPost = btn.value;
    const noticiaTitle = $(btn).data('title');

    Swal.fire({
        title: `Eliminar video`,
        showCancelButton: true,
        confirmButtonText: `Confirmar`,
        cancelButtonText: `Cancelar`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.value) {
            const url = `/admin/video/${idPost}`;
            lockWindow();
            const data = {};

            //$('body').modalmanager('loading').find('.modal-scrollable').off('click.modalmanager');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('input[name=_token]').val()
                }
            });
            $.ajax({
                type: 'DELETE',
                url: url,
                data: data,
                success: function (re) {
                    //$('body').modalmanager('removeLoading');
                    //$('body,html').removeClass("page-overflow");
                    //$('body,html').removeClass("modal-open");
                    unlockWindow();
                    $videosTable.ajax.reload();
                    Swal.fire(re.title, re.message, re.symbol);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    //$('body').modalmanager('removeLoading');
                    //$('body,html').removeClass("page-overflow");
                    //$('body,html').removeClass("modal-open");
                    unlockWindow();

                    Swal.fire(`Error`, `Ha ocurrido un error`, `warning`);
                }

            });
        }
    })
    return;
}

//--------------------------------------------
video.btnAdd.on('click', function () {
    cleanError();
    cleanModal();
    video.modalTitle.text("Crear video");
    video.btnUpdate.hide();
    video.btnSave.show();
    $('#modalCrearVideo').modal('show');

});

//Eventos de limpieza
function cleanModal() {
    $('#form-videos')[0].reset();
    $(`#video_method`).remove();
    $('#modalCrearVideo a').hide();
}

//-----------------------
// $(document).on('click', '#btn-delete',function(event) {
//     event.preventDefault();
//     var formData = new FormData($('#form-eliminar')[0]);
//     var ruta = "publicacion-delete";
//     var accion = "eliminar";
//     ajaxPost(ruta, formData, accion);
// });

$('#cerrar-noticia').click(function (e) {
    $('#modalCrearVideo').modal('hide');
});

video.btnUpdate.on('click', function (event) {
    event.preventDefault();
    lockWindow();
    cleanError();

    let _route, _formData;

    _formData = new FormData(video.form[0]);
    _route = "video/" + $('#form-videos input[name="id"]').val();

    //$('body').modalmanager('loading').find('.modal-scrollable').off('click.modalmanager');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name=_token]').val()
        }
    });
    $.ajax({
        url: _route,
        type: 'POST',
        data: _formData,
        contentType: false,
        processData: false,
        success: function (e) {
            unlockWindow();
            Swal.fire(e.title, e.message, e.symbol);
            $videosTable.ajax.reload();
            $('#modalCrearVideo').modal('hide');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            //$('body').modalmanager('removeLoading');
            unlockWindow();
            $('#modalCrearVideo').scrollTop(0);
            $.each(jqXHR.responseJSON.errors, function (key, value) {
                $.each(value, function (errores, eror) {
                    $(`#video-${key}-error`).append("<li class='error-block'>" + eror + "</li>");
                });
            });
        }
    });

});

video.btnSave.on('click', function (event) {
    event.preventDefault();
    lockWindow();
    cleanError();
    let _route, _formData;
    _formData = new FormData(video.form[0]);
    _route = "video";
    //$('body').modalmanager('loading').find('.modal-scrollable').off('click.modalmanager');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name=_token]').val()
        }
    });
    $.ajax({
        url: _route,
        type: 'POST',
        data: _formData,
        contentType: false,
        processData: false,
        success: function (e) {
            //$('body').modalmanager('removeLoading');
            Swal.fire(e.title, e.message, e.symbol);
            $videosTable.ajax.reload();
            $(`#modalCrearVideo`).modal('hide');
            unlockWindow();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            unlockWindow();
            $('#modalCrearVideo').scrollTop(0);
            $.each(jqXHR.responseJSON.errors, function (key, value) {
                $.each(value, function (errores, eror) {
                    $(`#video-${key}-error`).append("<li class='error-block'>" + eror + "</li>");
                });
            });
        }
    });
});
