const roleId = document.querySelector('input[name="role_id"]').value;

$(document).on('ready',function(){
	datatableServices("");
});

service.btnCancel.on('click', function(){
    $('#modalCrearService').modal('hide');
});

function datatableServices()
{
    $videosTable = $('#services-datatable').DataTable({
        "dom": 'flrtip',
        "language": {
            "url": "/admin/panel/datatable.spanish.json"
        },
        processing: true,
        serverSide: true,
        destroy:true,
        ajax: `/admin/services-datatable?role_id=${roleId}`,
        columns: [
            {data:'id', name: 'id', 'searchable': false},
            {data:'title', name: 'title', 'searchable': true},
            {data:'created_at', name: 'created_at', 'searchable': false},
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
                  "aTargets": [ 3 ],
                  "mData": "created_at",
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
    service.modalTitle.text("Editar Servicio");
    service.form.append('<input id="service_method" type="hidden" name="_method" value="PUT" />');

    service.btnSave.hide();
    service.btnUpdate.show();
    
    let _route = '/admin/service/'+_id;
    $.get(_route, function(p){
        const form = `#form-services`;

        const {image, external_image} = p;

        document.querySelector(`${form} input[name="title"]`).value = p.title;
        document.querySelector(`${form} input[name="id"]`).value = p.id; 
        document.querySelector(`${form} textarea[name="description"]`).value = p.description;
        document.querySelector(`${form} select[name="published"]`).value = p.published;
        document.querySelector(`${form} input[name="order"]`).value = p.order;
        document.querySelector(`${form} input[name="url"]`).value = p.url;
        addSummernoteEditorMini($(`textarea[name="description"]`));

        if(p.icon){
            $('#form-services input[name="icon"]').next().children().attr('href', p.icon);
            $('#form-services input[name="icon"]').next().show();
        }

        if(image){
            document.querySelector(`${service.formId} .image`).setAttribute('src', `${image}`);
            $(`${service.formId} .image`).show();
        }

        if(external_image){
            document.querySelector(`${service.formId} .external_image`).setAttribute('src', `${external_image}`);
            $(`${service.formId} .external_image`).show();
        }

        $('#modalCrearService').modal('show');
    });

}

//---------------------------------------------
//Eliminar
function Eliminar(btn){
    const idPost = btn.value;
    const noticiaTitle = $(btn).data('title');

  Swal.fire({
    title: `Eliminar Servicio`,
    showCancelButton: true,
    confirmButtonText: `Confirmar`,
    cancelButtonText: `Cancelar`,
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.value) {
      const url = `/admin/service/${idPost}`;
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
   const recordId = $('#form-services input[name="id"]').val();

  Swal.fire({
    title: `Eliminar Archivo`,
    showCancelButton: true,
    confirmButtonText: `Confirmar`,
    cancelButtonText: `Cancelar`,
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.value) {
      const url = `/admin/service/${recordId}/file`;
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
                $postsTable.ajax.reload();
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
service.btnAdd.on('click', function(){
    cleanError();
    cleanModal();
    service.modalTitle.text("Crear Servicio");
    service.btnUpdate.hide();
    service.btnSave.show();
    $('#modalCrearService').modal('show');
    addSummernoteEditorMini($(`textarea[name="description"]`));

});

//Eventos de limpieza
function cleanModal(){
    $(`textarea[name="description"]`).summernote('reset');
    destroySummernote($(`textarea[name="description"]`));
    $('#form-services')[0].reset();
    $(`#service_method`).remove();
    $('#modalCrearService img').hide();

    $(`${service.formId} .image`).hide();
    $(`${service.formId} .external_image`).hide();
    $('#form-services input[name="icon"]').next().hide();


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
	$('#modalCrearService').modal('hide');
});

service.btnUpdate.on('click',function(event){
    event.preventDefault();
    lockWindow();
    cleanError();

    let _route, _formData;

    _formData = new FormData(service.form[0]);
    _route = "service/"+$('#form-services input[name="id"]').val();

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
            $('#modalCrearService').modal('hide');
        },
        error:function(jqXHR, textStatus, errorThrown)
        {
            //$('body').modalmanager('removeLoading');
            unlockWindow();
            $('#modalCrearService').scrollTop(0);
            $.each(jqXHR.responseJSON.errors, function( key, value ) {
                    $.each(value, function( errores, eror ) {
                        $(`#service-${key}-error`).append("<li class='error-block'>"+eror+"</li>");
                    });
            });
        }
     });

});

service.btnSave.on('click',function(event){
    event.preventDefault();
    lockWindow();
    cleanError();
    let _route, _formData;
    _formData = new FormData(service.form[0]);
    _route = "service";
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
            $(`#modalCrearService`).modal('hide');
            unlockWindow();
		},
		error: function(jqXHR, textStatus, errorThrown)
		{
            unlockWindow();
            $('#modalCrearService').scrollTop(0);
            $.each(jqXHR.responseJSON.errors, function( key, value ) {
                    $.each(value, function( errores, eror ) {
                        $(`#service-${key}-error`).append("<li class='error-block'>"+eror+"</li>");
                    });
            });
        }
	});
});
