var accountability = {
    btnSave: $('#modalCrearRendicionCuenta .save'),
    btnUpdate: $('#modalCrearRendicionCuenta .update'),
    //btnClose: $('#inst-document-close'),
    btnCancel: $('#modalCrearRendicionCuenta .cancel'),
    btnAdd: $('.add'),
    modalTitle:$('#modalCrearRendicionCuenta .title'),
    form:$('#modalCrearRendicionCuenta form'),

};

datatableAccountability("");

accountability.btnCancel.on('click', function(){
    $('#modalCrearRendicionCuenta').modal('hide');
});

function datatableAccountability()
{
    $accountabilityTable = $('#accountability-datatable').DataTable({
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
        ajax: `/admin/accountability-datatable`,
        columns: [
            {data:'id', name: 'id', 'searchable': false},
            {data:'title', name: 'title', 'searchable': true},
            {data:'slug', name: 'slug', 'searchable': false},
            {data:'created_at', name: 'created_at', 'searchable': false},
            {data:'Image', 'searchable': false},
            {data:'published', 'searchable': false},
            {data:'Actions', 'searchable': false}
        ],
        "aoColumnDefs": [
            {
                "bVisible": false,
                 "aTargets": [0, 2, 4]
            },
            {
                  "aTargets": [ 3 ],
                  "mData": "created_at",
                  "mRender": function ( data, type, full ) {
                      return full['Image'];
                  }
            },
            {
                  "aTargets": [ 5 ],
                  "mData": "published",
                  "mRender": function ( data, type, full ) {

                    if (full['published'] == 1) {
                        return "Sí";
                    }
                    return "No";
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

function Editar(btn){
    let _id = btn.value;

    cleanError();
    cleanModal();
    accountability.modalTitle.text("Editar Rendición de Cuenta");
    accountability.form.append('<input id="accountability_method" type="hidden" name="_method" value="PUT" />');

    accountability.btnSave.hide();
    accountability.btnUpdate.show();

    let _route = '/admin/accountability/'+_id;
    $.get(_route, function(p){
        const modal = `#modalCrearRendicionCuenta`;

        const {image, external_image, description} = p;

        document.querySelector(`${modal} input[name="title"]`).value = p.title; 
        document.querySelector(`${modal} input[name="id"]`).value = p.id; 
        document.querySelector(`${modal} textarea[name="description"]`).value = description;
        document.querySelector(`${modal} select[name="published"]`).value = p.published;
        document.querySelector(`${modal} input[name="url"]`).value = p.url; 
        addSummernoteEditorMini($(`${modal} textarea[name="description"]`));

        if(image){
            document.querySelector(`${modal} .image`).setAttribute('src', `${image}`);
            $(`${modal} .image`).show();
        }

        if(external_image){
            document.querySelector(`${modal} .external_image`).setAttribute('src', `${external_image}`);
            $(`${modal} .external_image`).show();
        }

        let content = "";
        p.files.forEach((element) => {
            //content += `<a href="${element.url}" target="_blank">${element.title}</a><button>X</button>`;
            content += `<div><a href="${element.url}" target="_blank">${element.title}</a><button data-index="${element.id}" type="button" onclick="EliminarArchivo(this);">X</button></div>`;

        });

        $('#modalCrearRendicionCuenta .links').append(content);
        $('#modalCrearRendicionCuenta').modal('show');
    });
}

//---------------------------------------------
//Eliminar
function Eliminar(btn){
    const id = btn.value;
    const noticiaTitle = $(btn).data('title');

  Swal.fire({
    title: `Eliminar Rendición de Cuenta`,
    showCancelButton: true,
    confirmButtonText: `Confirmar`,
    cancelButtonText: `Cancelar`,
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.value) {
      const url = `/admin/accountability/${id}`;
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
         url : url,
         data: data,
            success: function(re){
                //$('body').modalmanager('removeLoading');
                //$('body,html').removeClass("page-overflow");
                //$('body,html').removeClass("modal-open");
                unlockWindow();
                $accountabilityTable.ajax.reload();
                Swal.fire(re.title, re.message, re.symbol);
            },
            error:function(jqXHR, textStatus, errorThrown)
            {
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

//Elimnar file
function EliminarArchivo(btn){
    const recordId = btn.dataset.index;

  Swal.fire({
    title: `Eliminar Archivo`,
    showCancelButton: true,
    confirmButtonText: `Confirmar`,
    cancelButtonText: `Cancelar`,
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.value) {
      const url = `/admin/content/${recordId}`;
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
         url : url,
         data: data,
            success: function(re){
                //$('body').modalmanager('removeLoading');
                //$('body,html').removeClass("page-overflow");
                //$('body,html').removeClass("modal-open");
                unlockWindow();
                btn.parentElement.remove();
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


//--------------------------------------------
document.querySelector('#modalCrearRendicionCuenta .add-files')
    .addEventListener('click', (e) => {
        e.preventDefault();

        const div = document.createElement('div');
        div.classList.add('row');

        div.innerHTML = `
                <div class="col-md-6">
                    <input type="text" name="name[]" class="form-control" placeholder="Nombre">
                </div>
                <div class="col-md-6">
                    <input type="file" name="file[]" value="" style="margin-bottom: 10px;" class="form-control">
                </div>`;

        document.querySelector('#modalCrearRendicionCuenta .files').appendChild(div);
    })

accountability.btnAdd.on('click', function(){
    cleanError();
    cleanModal();
    accountability.modalTitle.text("Crear Rendición de Cuenta");
    accountability.btnUpdate.hide();
    accountability.btnSave.show();
    addSummernoteEditorMini($(`#modalCrearRendicionCuenta textarea[name="description"]`));
    $('#modalCrearRendicionCuenta').modal('show');

});

//Eventos de limpieza
function cleanModal(){
    destroySummernote($(`#modalCrearRendicionCuenta textarea[name="description"]`));

    $('#modalCrearRendicionCuenta form')[0].reset();
    $(`#modalCrearRendicionCuenta textarea[name="description"]`).val("");
    $(`#accountability_method`).remove();
    //$('#modalCrearRendicionCuenta a').hide();

    while(document.querySelector('#modalCrearRendicionCuenta .files').firstChild){
    document.querySelector('#modalCrearRendicionCuenta .files').removeChild(document.querySelector('#modalCrearRendicionCuenta .files').firstChild);
    }

    while(document.querySelector('#modalCrearRendicionCuenta .links').firstChild){
    document.querySelector('#modalCrearRendicionCuenta .links').removeChild(document.querySelector('#modalCrearRendicionCuenta .links').firstChild);
    }

    $(`#modalCrearRendicionCuenta .image`).hide();
    $(`#modalCrearRendicionCuenta .external_image`).hide();

}

//-----------------------
// $(document).on('click', '#btn-delete',function(event) {
//     event.preventDefault();
//     var formData = new FormData($('#form-eliminar')[0]);
//     var ruta = "publicacion-delete";
//     var accion = "eliminar";
//     ajaxPost(ruta, formData, accion);
// });

// $('#cerrar-noticia').click(function(e){
//     $('#modalCrearRendicionCuenta').modal('hide');
// });

accountability.btnUpdate.on('click',function(event){
    event.preventDefault();
    lockWindow();
    cleanError();

    let _route, _formData;

    _formData = new FormData(accountability.form[0]);
    _route = "accountability/"+$('#modalCrearRendicionCuenta input[name="id"]').val();

    //$('body').modalmanager('loading').find('.modal-scrollable').off('click.modalmanager');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name=_token]').val()
        }
    });
    $.ajax({
        url : _route,
        type: 'POST',
        data: _formData,
        contentType: false,
        processData: false,
        success: function(e){
            unlockWindow();
            Swal.fire(e.title, e.message, e.symbol);
            $accountabilityTable.ajax.reload();
            $('#modalCrearRendicionCuenta').modal('hide');
        },
        error:function(jqXHR, textStatus, errorThrown)
        {
            //$('body').modalmanager('removeLoading');
            unlockWindow();
            $('#modalCrearRendicionCuenta').scrollTop(0);
            $.each(jqXHR.responseJSON.errors, function( key, value ) {
                    $.each(value, function( errores, eror ) {
                        $(`#accountability-${key}-error`).append("<li class='error-block'>"+eror+"</li>");
                    });
            });
        }
     });

});

accountability.btnSave.on('click',function(event){
    event.preventDefault();
    lockWindow();
    cleanError();
    let _route, _formData;
    _formData = new FormData(accountability.form[0]);
    _route = "accountability";
    //$('body').modalmanager('loading').find('.modal-scrollable').off('click.modalmanager');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name=_token]').val()
        }
    });
    $.ajax({
        url : _route,
        type: 'POST',
        data: _formData,
        contentType: false,
        processData: false,
        success: function(e){
            //$('body').modalmanager('removeLoading');
            Swal.fire(e.title, e.message, e.symbol);
            $accountabilityTable.ajax.reload();
            $(`#modalCrearRendicionCuenta`).modal('hide');
            unlockWindow();
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            unlockWindow();
            $('#modalCrearRendicionCuenta').scrollTop(0);
            $.each(jqXHR.responseJSON.errors, function( key, value ) {
                    $.each(value, function( errores, eror ) {
                        $(`#accountability-${key}-error`).append("<li class='error-block'>"+eror+"</li>");
                    });
            });
        }
    });
});
