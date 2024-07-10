var swiperPost;
const roleId = document.querySelector('input[name="role_id"]').value;

$(document).on('ready',function(){
	datatablePosts("");

    $(`#form-post input[name="fecha"]`).datepicker({
        format: 'dd/mm/yyyy',
        language: 'es-ES',
    });

});

function datatablePosts(categoryId)
{
    $postsTable = $('#posts-datatable').DataTable({
        "dom": 'flrtip',
        "language": {
            "url": "/admin/panel/datatable.spanish.json"
        },
        processing: true,
        serverSide: true,
        destroy:true,
        ajax: `/admin/popup-datatable?role_id=${roleId}`,
        columns: [
            {data:'id', name: 'id', 'searchable': false},
            {data:'enlace', name: 'enlace', 'searchable': true},
            {data:'visible', name: 'visible', 'searchable': false},
            {data:'finished_at', name: 'finished_at', 'searchable': false},
            {data:'imagen', name: 'imagen', 'searchable': false},
            {data:'Image', 'searchable': false},
            {data:'Actions', 'searchable': false}
        ],
        "aoColumnDefs": [
            {
                "bVisible": false,
                 "aTargets": [0, 5]
            },
            {
                  "aTargets": [ 3 ],
                  "mData": "photo",
                  "mRender": function ( data, type, full ) {
                      return full['Image'];
                  }
            },

            {
                  "aTargets": [ 4 ],
                  "mData": "imagen",
                  "mRender": function ( data, type, full ) {
                      if (full['imagen']) {
                        return `<img src="${full['imagen']}" style="height:50px;">`;
                      }
                      return "";
                  }
            },
        ]
    });
}

function Editar(btn){
    let _id = btn.value;

    cleanError();
    cleanModal();
    post.modalTitle.text("Editar Popup");
    post.form.append('<input id="post_method" type="hidden" name="_method" value="PUT" />');
    $(`#popup-photo`).hide();
    post.btnSave.hide();
    post.btnUpdate.show();

    let _route = '/admin/popup/'+_id;
    $.get(_route, function(p){
        const form = `#form-post`;
        document.querySelector(`${form} input[name="id"]`).value = p.id; 
        document.querySelector(`${form} input[name="enlace"]`).value = p.enlace; 
        document.querySelector(`${form} select[name="visible"]`).value = p.visible; 
        document.querySelector(`${form} input[name="fecha"]`).value = p.fecha_formatted; 

        if(p.imagen){
            document.querySelector(`#popup-photo`).setAttribute('src', `${p.imagen}`);
            $(`#popup-photo`).show();
        }
    
        $('#modalCrearNoticia').modal('show');
    });

}

//---------------------------------------------
//Eliminar
function Eliminar(btn){
    const idPost = btn.value;
    const noticiaTitle = $(btn).data('title');

  Swal.fire({
    title: `Eliminar ${noticiaTitle}`,
    showCancelButton: true,
    confirmButtonText: `Confirmar`,
    cancelButtonText: `Cancelar`,
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.value) {
      lockWindow();
      const url = `/admin/popup/${idPost}`;
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
                $postsTable.ajax.reload();
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

//--------------------------------------------
$('#btnCrearpublicacion').on('click', function(){
	cleanError();
	cleanModal();

  post.modalTitle.text("Crear Popup");
	post.btnUpdate.hide();
  post.btnSave.show();

  $(`#popup-photo`).hide();

	$('#modalCrearNoticia').modal('show');

});

//Eventos de limpieza
function cleanModal(){
  $('#form-post')[0].reset();
  $(`#post_method`).remove();
}

post.btnUpdate.on('click',function(event){
    event.preventDefault();
    lockWindow();
    cleanError();

    let _route, _formData;

    _formData = new FormData(post.form[0]);
    _route = "popup/"+$('#post_id').val();

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
            $postsTable.ajax.reload();
            $('#modalCrearNoticia').modal('hide');
        },
        error:function(jqXHR, textStatus, errorThrown)
        {
            //$('body').modalmanager('removeLoading');
            unlockWindow();

            if(jqXHR.responseJSON.hasOwnProperty('errors')){
                $('#modalCrearNoticia').scrollTop(0);
                $.each(jqXHR.responseJSON.errors, function( key, value ) {
                        $.each(value, function( errores, eror ) {
                            $(`#popup-${key}-error`).append("<li class='error-block'>"+eror+"</li>");
                        });
                });
                return;
            }

            Swal.fire(`Ha ocurrido un error`, `No se ha actualizado el registro. Puede ser debido a un error procesando la imágen. Inténtelo de nuevo.`, `warning`);

        }
     });

});

post.btnSave.on('click',function(event){
    event.preventDefault();
    lockWindow();
    cleanError();
    let _route, _formData;
    _formData = new FormData(post.form[0]);
    _route = "popup";
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
            $postsTable.ajax.reload();
            $(`#modalCrearNoticia`).modal('hide');
            unlockWindow();

		},
		error: function(jqXHR, textStatus, errorThrown)
		{
            unlockWindow();

            if(jqXHR.responseJSON.hasOwnProperty('errors')){
                $('#modalCrearNoticia').scrollTop(0);
                $.each(jqXHR.responseJSON.errors, function( key, value ) {
                        $.each(value, function( errores, eror ) {
                            $(`#popup-${key}-error`).append("<li class='error-block'>"+eror+"</li>");
                        });
                });
                return;
            }
            
            Swal.fire(`Ha ocurrido un error`, `No se ha creado el registro. Puede ser debido a un error procesando la imágen. Inténtelo de nuevo.`, `warning`);


        }
	});
});

$(`#post-cancel`).on('click', function(){
  $('#modalCrearNoticia').modal('hide');
});