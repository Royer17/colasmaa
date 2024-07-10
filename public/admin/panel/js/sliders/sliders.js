const roleId = document.querySelector('input[name="role_id"]').value;

$(document).on('ready',function(){
	datatablePosts("");

});

post.btnCancel.on('click', function(){
    post.modalPost.modal('hide');
});

var varGlobalPost = {
	published:$('#noticia-published'),
}

function datatablePosts()
{
    $postsTable = $('#posts-datatable').DataTable({
        "dom": 'flrtip',
        "language": {
            "url": "/admin/panel/datatable.spanish.json"
        },
        processing: true,
        serverSide: true,
        destroy:true,
        ajax: `/admin/slider-datatable?role_id=${roleId}`,
        columns: [
            {data:'id_slide', name: 'id_slide', 'searchable': false},
            {data:'titulo_slide', name: 'titulo_slide', 'searchable': true},
            {data:'orden_slide', name: 'orden_slide', 'searchable': false},
            {data:'created_at', name: 'created_at', 'searchable': false},
            {data:'img_slide', name: 'img_slide', 'searchable': false},
            {data:'Image', 'searchable': false},
            {data:'published', 'searchable': false},
            {data:'Actions', 'searchable': false}
        ],
        "aoColumnDefs": [
            {
                "bVisible": false,
                 "aTargets": [0, 5]
            },
            {
                  "aTargets": [ 4 ],
                  "mData": "img_slide",
                  "mRender": function ( data, type, full ) {
                      if (full['img_slide']) {
                        return `<img src="${full['img_slide']}" style="height:50px;">`;
                      }
                      return "";
                  }
            },
            {
                  "aTargets": [ 6 ],
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
}

function Editar(btn){
    let _id = btn.value;

    cleanError();
    cleanModal();
    post.modalTitle.text("Editar Slide");
    post.form.append('<input id="post_method" type="hidden" name="_method" value="PUT" />');

    post.btnSave.hide();
    post.btnUpdate.show();
    $(`#slide_photo`).hide();

    let _route = '/admin/slider/'+_id;
    $.get(_route, function(p){
        const form = `#form-post`;
        document.querySelector(`${form} input[name="id"]`).value = p.id_slide; 
        document.querySelector(`${form} input[name="titulo_slide"]`).value = p.titulo_slide; 
        document.querySelector(`${form} input[name="orden_slide"]`).value = p.orden_slide; 
        document.querySelector(`${form} select[name="published"]`).value = p.published;

        if(p.img_slide){
            document.querySelector(`#slide_photo`).setAttribute('src', `${p.img_slide}`);
            $(`#slide_photo`).show();
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
      const url = `/admin/slider/${idPost}`;
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
	//post.tabImagePost.addClass('disabledElementWithOutColor');
	//$('#content-post').summernote({});

  post.modalTitle.text("Crear Slide");
	post.btnUpdate.hide();
  post.btnSave.show();

  $(`#slide_photo`).hide();
	
	$('#modalCrearNoticia').modal('show');

});

//Eventos de limpieza
function cleanModal(){
  $('#form-post')[0].reset();
  $(`#post_method`).remove();
}

//-----------------------
$(document).on('click', '#btn-delete',function(event) {
    event.preventDefault();
    var formData = new FormData($('#form-eliminar')[0]);
    var ruta = "publicacion-delete";
    var accion = "eliminar";
    ajaxPost(ruta, formData, accion);
});

$('#cerrar-noticia').click(function(e){
	$('#modalCrearNoticia').modal('hide');
});

post.btnUpdate.on('click',function(event){
    event.preventDefault();
    lockWindow();
    cleanError();

    let _route, _formData;

    _formData = new FormData(post.form[0]);
    _route = "slider/"+$('#post_id').val();

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
                            $(`#slider-${key}-error`).append("<li class='error-block'>"+eror+"</li>");
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
    _route = "slider";
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
                            $(`#slider-${key}-error`).append("<li class='error-block'>"+eror+"</li>");
                        });
                });

                return;
            }
            Swal.fire(`Ha ocurrido un error`, `No se ha creado el registro. Puede ser debido a un error procesando la imágen. Inténtelo de nuevo.`, `warning`);
        }
	});
});
