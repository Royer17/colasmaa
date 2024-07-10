const roleId = document.querySelector('input[name="role_id"]').value;

$(document).on('ready',function(){
    datatableDocuments("");
});

last_document.btnCancel.on('click', function(){
    $('#modalCrearLastDocument').modal('hide');
});

function datatableDocuments()
{
    $videosTable = $('#last-documents-datatable').DataTable({
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
        ajax: `/admin/last-documents-datatable?role_id=${roleId}`,
        columns: [
            {data:'id', name: 'id', 'searchable': false},
            {data:'title', name: 'title', 'searchable': true},
            {data:'acronym', name: 'acronym', 'searchable': false},
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
    last_document.modalTitle.text("Editar Documento");
    last_document.form.append('<input id="video_method" type="hidden" name="_method" value="PUT" />');

    last_document.btnSave.hide();
    last_document.btnUpdate.show();

    let _route = '/admin/last-document/'+_id;
    $.get(_route, function(p){
        const form = `#form-last-documents`;

        const {image, external_image, description, url} = p;

        document.querySelector(`${form} input[name="title"]`).value = p.title; 
        document.querySelector(`${form} input[name="id"]`).value = p.id; 
        document.querySelector(`${form} textarea[name="description"]`).value = description;
        document.querySelector(`${form} select[name="published"]`).value = p.published;
        document.querySelector(`${form} input[name="url"]`).value = url;
        addSummernoteEditorMini($(`${last_document.formId} textarea[name="description"]`));

        if(image){
            document.querySelector(`${last_document.formId} .image`).setAttribute('src', `${image}`);
            $(`${last_document.formId} .image`).show();
        }

        if(external_image){
            document.querySelector(`${last_document.formId} .external_image`).setAttribute('src', `${external_image}`);
            $(`${last_document.formId} .external_image`).show();
        }

        let content = "";
        p.files.forEach((element) => {
            content += `<div><a href="${element.url}" target="_blank">${element.title}</a><button data-index="${element.id}" type="button" onclick="EliminarArchivo(this);">X</button></div>`;
        });

        $('#form-last-documents .links').append(content);

        $('#modalCrearLastDocument').modal('show');
    });

}

//---------------------------------------------
//Eliminar
function Eliminar(btn){
    const idPost = btn.value;
    const noticiaTitle = $(btn).data('title');

  Swal.fire({
    title: `Eliminar Documento`,
    showCancelButton: true,
    confirmButtonText: `Confirmar`,
    cancelButtonText: `Cancelar`,
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.value) {
      const url = `/admin/last-document/${idPost}`;
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
                $videosTable.ajax.reload();
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
document.querySelector('#form-last-documents .add-files')
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

        document.querySelector('#form-last-documents .files').appendChild(div);
    })

last_document.btnAdd.on('click', function(){
    cleanError();
    cleanModal();
    last_document.modalTitle.text("Crear Documento");
    last_document.btnUpdate.hide();
    last_document.btnSave.show();
    addSummernoteEditorMini($(`${last_document.formId} textarea[name="description"]`));
    $('#modalCrearLastDocument').modal('show');

});

//Eventos de limpieza
function cleanModal(){
    destroySummernote($(`${last_document.formId} textarea[name="description"]`));

    $('#form-last-documents')[0].reset();
    $(`${last_document.formId} textarea[name="description"]`).val("");
    $(`#video_method`).remove();
    //$('#modalCrearLastDocument a').hide();

    while(document.querySelector('#form-last-documents .files').firstChild){
    document.querySelector('#form-last-documents .files').removeChild(document.querySelector('#form-last-documents .files').firstChild);
    }

    while(document.querySelector('#form-last-documents .links').firstChild){
    document.querySelector('#form-last-documents .links').removeChild(document.querySelector('#form-last-documents .links').firstChild);
    }

    $(`${last_document.formId} .image`).hide();
    $(`${last_document.formId} .external_image`).hide();

}

//-----------------------
// $(document).on('click', '#btn-delete',function(event) {
//     event.preventDefault();
//     var formData = new FormData($('#form-eliminar')[0]);
//     var ruta = "publicacion-delete";
//     var accion = "eliminar";
//     ajaxPost(ruta, formData, accion);
// });

$('#cerrar-noticia').click(function(e){
    $('#modalCrearLastDocument').modal('hide');
});

last_document.btnUpdate.on('click',function(event){
    event.preventDefault();
    lockWindow();
    cleanError();

    let _route, _formData;

    _formData = new FormData(last_document.form[0]);
    _route = "last-document/"+$('#form-last-documents input[name="id"]').val();

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
            $videosTable.ajax.reload();
            $('#modalCrearLastDocument').modal('hide');
        },
        error:function(jqXHR, textStatus, errorThrown)
        {
            //$('body').modalmanager('removeLoading');
            unlockWindow();
            $('#modalCrearLastDocument').scrollTop(0);
            $.each(jqXHR.responseJSON.errors, function( key, value ) {
                    $.each(value, function( errores, eror ) {
                        $(`#last-document-${key}-error`).append("<li class='error-block'>"+eror+"</li>");
                    });
            });
        }
     });

});

last_document.btnSave.on('click',function(event){
    event.preventDefault();
    lockWindow();
    cleanError();
    let _route, _formData;
    _formData = new FormData(last_document.form[0]);
    _route = "last-document";
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
            $videosTable.ajax.reload();
            $(`#modalCrearLastDocument`).modal('hide');
            unlockWindow();
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            unlockWindow();
            $('#modalCrearLastDocument').scrollTop(0);
            $.each(jqXHR.responseJSON.errors, function( key, value ) {
                    $.each(value, function( errores, eror ) {
                        $(`#last-document-${key}-error`).append("<li class='error-block'>"+eror+"</li>");
                    });
            });
        }
    });
});
