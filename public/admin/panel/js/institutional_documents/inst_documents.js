const roleId = document.querySelector('input[name="role_id"]').value;

$(document).on('ready',function(){
	datatableDocuments("");
});

inst_documents.btnCancel.on('click', function(){
    $('#modalCrearInstDocument').modal('hide');
});

function datatableDocuments()
{
    $videosTable = $('#inst-documents-datatable').DataTable({
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
        ajax: `/admin/institutional-documents-datatable?role_id=${roleId}`,
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
    inst_documents.modalTitle.text("Editar Documento");
    inst_documents.form.append('<input id="video_method" type="hidden" name="_method" value="PUT" />');

    inst_documents.btnSave.hide();
    inst_documents.btnUpdate.show();

    let _route = '/admin/institutional-document/'+_id;
    $.get(_route, function(p){
        const form = `#form-inst-documents`;
        
        const {image, external_image, description} = p;

        document.querySelector(`${form} input[name="title"]`).value = p.title; 
        document.querySelector(`${form} input[name="id"]`).value = p.id; 
        document.querySelector(`${form} textarea[name="description"]`).value = description;
        //document.querySelector(`${form} input[name="acronym"]`).value = p.acronym;
        document.querySelector(`${form} input[name="url"]`).value = p.url; 
        document.querySelector(`${form} select[name="published"]`).value = p.published;
        addSummernoteEditorMini($(`${form} textarea[name="description"]`));

        if(image){
            document.querySelector(`${form} .image`).setAttribute('src', `${image}`);
            $(`${form} .image`).show();
        }

        if(external_image){
            document.querySelector(`${form} .external_image`).setAttribute('src', `${external_image}`);
            $(`${form} .external_image`).show();
        }

        let content = "";
        p.files.forEach((element) => {
            content += `<div><a href="${element.url}" target="_blank">${element.title}</a><button data-index="${element.id}" type="button" onclick="EliminarArchivo(this);">X</button></div>`;
        });

        $('#form-inst-documents .links').append(content);

        $('#modalCrearInstDocument').modal('show');
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
      const url = `/admin/institutional-document/${idPost}`;
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
document.querySelector('#form-inst-documents .add-files')
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

        document.querySelector('#form-inst-documents .files').appendChild(div);
    })

inst_documents.btnAdd.on('click', function(){
    cleanError();
    cleanModal();
    inst_documents.modalTitle.text("Crear Documento");
    inst_documents.btnUpdate.hide();
    inst_documents.btnSave.show();
    addSummernoteEditorMini($(`#form-inst-documents textarea[name="description"]`));
    $('#modalCrearInstDocument').modal('show');

});

//Eventos de limpieza
function cleanModal(){
    destroySummernote($(`#form-inst-documents textarea[name="description"]`));

    $('#form-inst-documents')[0].reset();
    $(`#form-inst-documents textarea[name="description"]`).val("");
    $(`#video_method`).remove();
    //$('#modalCrearInstDocument a').hide();

    while(document.querySelector('#form-inst-documents .files').firstChild){
    document.querySelector('#form-inst-documents .files').removeChild(document.querySelector('#form-inst-documents .files').firstChild);
    }

    while(document.querySelector('#form-inst-documents .links').firstChild){
    document.querySelector('#form-inst-documents .links').removeChild(document.querySelector('#form-inst-documents .links').firstChild);
    }

    $(`#form-inst-documents .image`).hide();
    $(`#form-inst-documents .external_image`).hide();

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
	$('#modalCrearInstDocument').modal('hide');
});

inst_documents.btnUpdate.on('click',function(event){
    event.preventDefault();
    lockWindow();
    cleanError();

    let _route, _formData;

    _formData = new FormData(inst_documents.form[0]);
    _route = "institutional-document/"+$('#form-inst-documents input[name="id"]').val();

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
            $('#modalCrearInstDocument').modal('hide');
        },
        error:function(jqXHR, textStatus, errorThrown)
        {
            //$('body').modalmanager('removeLoading');
            unlockWindow();
            $('#modalCrearInstDocument').scrollTop(0);
            $.each(jqXHR.responseJSON.errors, function( key, value ) {
                    $.each(value, function( errores, eror ) {
                        $(`#inst-document-${key}-error`).append("<li class='error-block'>"+eror+"</li>");
                    });
            });
        }
     });

});

inst_documents.btnSave.on('click',function(event){
    event.preventDefault();
    lockWindow();
    cleanError();
    let _route, _formData;
    _formData = new FormData(inst_documents.form[0]);
    _route = "institutional-document";
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
            $(`#modalCrearInstDocument`).modal('hide');
            unlockWindow();
		},
		error: function(jqXHR, textStatus, errorThrown)
		{
            unlockWindow();
            $('#modalCrearInstDocument').scrollTop(0);
            $.each(jqXHR.responseJSON.errors, function( key, value ) {
                    $.each(value, function( errores, eror ) {
                        $(`#inst-document-${key}-error`).append("<li class='error-block'>"+eror+"</li>");
                    });
            });
        }
	});
});
