var swiperPost;
const roleId = document.querySelector('input[name="role_id"]').value;
const postPhoto = document.querySelector(`#post_photo`);
const postPhoto1 = document.querySelector(`#post_photo1`);
const postPhoto2 = document.querySelector(`#post_photo2`);

$(document).on('ready',function(){
	datatablePosts("");

  $(`#form-post input[name="fechaini"]`).datepicker({
    format: 'dd/mm/yyyy',
    language: 'es-ES',
  });
  $(`#form-post input[name="fechater"]`).datepicker({
    format: 'dd/mm/yyyy',
    language: 'es-ES',
  });
	//post.selectCategories.empty();
	// content = '<option value="0">Seleccione una categoría</option>'
	// $.get('categories',function(data){
	// 	$.each(data.categories,function(i,category){
	// 		content = content + '<option value="'+category.id+'">'+category.name+'</option>'
	// 	});
	// 	post.selectCategories.append(content);
	// });

    // var postModal = element('#modalCrearNoticia');

    // (function(){
    //     click(element('#post-cancel'), function(){
    //         postModal.hide();
    //     })
    // })();

});

post.btnCancel.on('click', function(){
    post.modalPost.modal('hide');
});

var varGlobalPost = {
	published:$('#noticia-published'),
}

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
        ajax: `/admin/works-datatable?category_id=${categoryId}&role_id=${roleId}`,
        columns: [
            {data:'id', name: 'obra.id', 'searchable': false},
            {data:'type', name: 'obras.titulo', 'searchable': false},
            {data:'activity', name: 'obra.actividad', 'searchable': true},
            {data:'date', name: 'obra.fechaini', 'searchable': false},
            {data:'photo', name: 'obra.foto', 'searchable': false},
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
                  "aTargets": [ 3 ],
                  "mData": "photo",
                  "mRender": function ( data, type, full ) {
                      return full['Image'];
                  }
            },

            {
                  "aTargets": [ 4 ],
                  "mData": "photo",
                  "mRender": function ( data, type, full ) {
                      if (full['photo']) {
                        return `<img src="/${full['photo']}" style="height:50px;">`;
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

function goCover(btn)
{
	noticia_id = btn.value;
	var noticiaTitle = $(btn).data('title');

	swal({
      title: "Poner en portada "+noticiaTitle+' ?',
	  text: "Usted va a publicarlo como noticia principal",
	  type: "info",
	  showCancelButton: true,
	  confirmButtonColor: "#DD6B55",
	  cancelButtonText: "No",
	  confirmButtonText: "Si!",
	  closeOnConfirm: true },
	  function(){
		  var ruta = "posts/"+noticia_id+"/cover";
		  var data = {};
		  $('body').modalmanager('loading').find('.modal-scrollable').off('click.modalmanager');
		  $.ajaxSetup({
		      headers: {
                    'X-CSRF-TOKEN': $('input[name=_token]').val()
		      }
		  });
		  $.ajax({
		     type: 'PUT',
		     url : ruta,
		     data: data,
		     success: function(e){
                  $('body').modalmanager('removeLoading');
                  $('body,html').removeClass("page-overflow");
                  $('body,html').removeClass("modal-open");
			      $.growl.notice({ message: "La noticia esta de portada ahora." });
			      $postsTable.ajax.reload();
		     }
		    }).fail(function (jqXHR, textStatus, error) {
                $('body').modalmanager('removeLoading');
                $('body,html').removeClass("page-overflow");
                $('body,html').removeClass("modal-open");
                $.growl.error({ message: "Ha ocurrido un error." });
            })
    });
}

//------------------------------
function Publicar(btn){
	noticia_id = btn.value;
	var noticiaTitle = $(btn).data('title');
	swal({   title: "Publicar "+noticiaTitle,
	  text: "",
	  type: "info",
	  showCancelButton: true,
	  confirmButtonColor: "#DD6B55",
	  cancelButtonText: "No",
	  confirmButtonText: "Si!",
	  closeOnConfirm: true },
	  function(){
		  var url = "posts/"+noticia_id+"/publish";
          var data = {};
          $('body').modalmanager('loading').find('.modal-scrollable').off('click.modalmanager');
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('input[name=_token]').val()
              }
          });
          $.ajax({
             type: 'PUT',
             url : url,
             data: data,
                success: function(re){
                    $('body').modalmanager('removeLoading');
                    $('body,html').removeClass("page-overflow");
                    $('body,html').removeClass("modal-open");
                    $postsTable.ajax.reload();
                    $.growl.notice({ message: "La noticia se ha publicado" });
                },
                error:function(jqXHR, textStatus, errorThrown)
                {
                   $('body').modalmanager('removeLoading');
                   $('body,html').removeClass("page-overflow");
                   $('body,html').removeClass("modal-open");
                   $.growl.error({ message: "Ha ocurrido un error." });
                }

           });


		 });
}

function Despublicar(btn){
	noticia_id = btn.value;
	var noticiaTitle = $(btn).data('title');
	swal({   title: "No publicar "+noticiaTitle,
	  text: "",
	  type: "info",
	  showCancelButton: true,
	  confirmButtonColor: "#DD6B55",
	  cancelButtonText: "No",
	  confirmButtonText: "Si!",
	  closeOnConfirm: true },
	  function(){
		  var ruta = "posts/"+noticia_id+"/not-publish";
		  var data = {};
		  $('body').modalmanager('loading').find('.modal-scrollable').off('click.modalmanager');
		  $.ajaxSetup({
		      headers: {
		          'X-CSRF-TOKEN': $('input[name=_token]').val()
		      }
		  });
		  $.ajax({
		     type: 'PUT',
		     url : ruta,
		     data: data,
                success: function(re){
                    $('body').modalmanager('removeLoading');
                    $('body,html').removeClass("page-overflow");
                    $('body,html').removeClass("modal-open");
                    $postsTable.ajax.reload();
                    $.growl.notice({ message: "La noticia ya no está publicada" });
                },
                error:function(jqXHR, textStatus, errorThrown)
                {
                   $('body').modalmanager('removeLoading');
                   $('body,html').removeClass("page-overflow");
                   $('body,html').removeClass("modal-open");
                   $.growl.error({ message: "Ha ocurrido un error." });
                }

		   });
		 });
}
//------------------------------

function Editar(btn){
    let _id = btn.value;

    cleanError();
    cleanModal();
    post.modalTitle.text("Editar Obra");
    post.form.append('<input id="post_method" type="hidden" name="_method" value="PUT" />');

    post.btnSave.hide();
    post.btnUpdate.show();

    postPhoto.style.display = 'none';
    postPhoto1.style.display = 'none';
    postPhoto2.style.display = 'none';

    let _route = '/admin/works/'+_id;
    $.get(_route, function(p){
        const form = `#form-post`;
        document.querySelector(`${form} select[name="type"]`).value = p.type; 
        document.querySelector(`${form} textarea[name="actividad"]`).value = p.actividad;
        document.querySelector(`${form} textarea[name="programa"]`).value = p.programa;
        document.querySelector(`${form} input[name="id"]`).value = p.id; 
        document.querySelector(`${form} input[name="fechaini"]`).value = p.fechaini_formatted; 
        document.querySelector(`${form} input[name="fechater"]`).value = p.fechater_formatted; 
        addSummernoteEditorMini($(`textarea[name="programa"]`));
        document.querySelector(`${form} select[name="published"]`).value = p.published;

        if(p.foto){
            document.querySelector(`#post_photo`).setAttribute('src', `${p.foto}`);
            postPhoto.style.display = 'block';
        }

        if(p.foto1){
            document.querySelector(`#post_photo1`).setAttribute('src', `${p.foto1}`);
            postPhoto1.style.display = 'block';
        }

        if(p.foto2){
            document.querySelector(`#post_photo2`).setAttribute('src', `${p.foto2}`);
            postPhoto2.style.display = 'block';
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
      const url = `/admin/works/${idPost}`;
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
  addSummernoteEditorMini($(`textarea[name="programa"]`));

  post.modalTitle.text("Crear Obra");
	post.btnUpdate.hide();
  post.btnSave.show();

  $(`#post_photo`).hide();
  $(`#post_photo1`).hide();
  $(`#post_photo2`).hide();

	//let _content = '<option value="">Seleccione una opción</option>';
	// $.get('categories',function(data){
	// 	$.each(data.categories,function(id,value) {
	// 			_content += '<option value="'+value.id+'">'+value.name+'</option>';
	// 	});
	// 	post.selectCategory.append(_content);
	// });

	$('#modalCrearNoticia').modal('show');
  //$('#modal-lg').modal('show');

});

post.selectCategories.on('change',function(){
	var categoryId = post.selectCategories.val();
	datatablePosts(categoryId);
});

//Eventos de limpieza
function cleanModal(){
  destroySummernote($(`textarea[name="programa"]`));
  $(`#post_method`).remove();
  $('#form-post')[0].reset();


}

//Limpiar el dropzone en base al id, remover las imagenes puestas
function cleanDropzone(identificador){
	var myDropzone = Dropzone.forElement("#"+identificador);
	var files = myDropzone.files;
	myDropzone.removeAllFiles(true);
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
    _route = "works/"+$('#post_id').val();

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
            unlockWindow();
            
            if(jqXHR.responseJSON.hasOwnProperty('errors')){
                $('#modalCrearNoticia').scrollTop(0);
                $.each(jqXHR.responseJSON.errors, function( key, value ) {
                        $.each(value, function( errores, eror ) {
                            $(`#works-${key}-error`).append("<li class='error-block'>"+eror+"</li>");
                        });
                });

                return;
            }

            Swal.fire(`Ha ocurrido un error`, `No se ha actualizado el registro. Puede ser debido a un error procesando la/las imágenes y/o archivos. Inténtelo de nuevo.`, `warning`);



        }
     });
});

post.btnSave.on('click',function(event){
    event.preventDefault();
    lockWindow();
    cleanError();
    let _route, _formData;
    _formData = new FormData(post.form[0]);
    _route = "works";
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
                            $(`#works-${key}-error`).append("<li class='error-block'>"+eror+"</li>");
                        });
                });

                return;
            }

            Swal.fire(`Ha ocurrido un error`, `No se ha creado el registro. Puede ser debido a un error procesando la/las imágenes y/o archivos. Inténtelo de nuevo.`, `warning`);
        }
	});
});

$(document).on('click', '.elimina_slide', function(){

   id_img = $(this).attr("value");
    var ruta = "img_slide_delete";

    $('body').modalmanager('loading').find('.modal-scrollable').off('click.modalmanager');
    $.ajaxSetup({
        headers: {
            'csrftoken': $('input[name=_token]').val()
        }
    });

    $.ajax({
       type: 'PUT',
       url : ruta,
       data: {'idImage': id_img},
       success: function(e){
         $('body').modalmanager('removeLoading');

         if (e.internet == 0) {
               $.growl.error({ message: e.msg });
     	}
         else if(e.internet == 2) {
            recarga_slider();
         }
       }
     });
});

post.btnClose.on('click',function(){
	post.tabInfoPost.children().click();
	$postsTable.ajax.reload();
	cleanDropzone('post_dropzone');
	post.modalPost.modal('hide');
});


function startCarouselPost(){
    swiperPost = new Swiper('#post-swiper-container', {
        loop: false,
        pagination: '#post-swiper-pagination',
        nextButton: '#post-swiper-button-next',
        prevButton: '#post-swiper-button-prev',
        slidesPerView: 3,
        spaceBetween: 30,
    });
}

function appendImageToSliderPost(swiper,swiperContainer,images)
{
    var number = swiperContainer.attr('data-number');
    if (number == "") {
        number = -1;
    }
    else {
        number = parseInt(number);
    }
    $.each(images,function(i,image) {
        number = number + 1;
        swiper.appendSlide('<div class="swiper-slide" data-index="'+number+'" style="display:flex;flex-direction:column"><img src="'+image.resource_thumb+'" alt="" style="height: 300px;" /><button class="image-slider-post__delete form-control" data-image_id="'+image.id+'" style="margin-right: auto;margin-left: auto;margin-top: 10px;max-width:8rem;">Eliminar</button></div>');
    });
        swiperContainer.attr('data-number',number);
}

function prependImageToSliderPost(swiper,swiperContainer,images)
{
    var number = swiperContainer.attr('data-number');
    if (number == "") {
        number = -1;
    }
    else {
        number = parseInt(number);
    }
    $.each(images,function(i,image) {
        number = number + 1;
        swiper.prependSlide('<div class="swiper-slide" data-index="'+number+'" style="display:flex;flex-direction:column"><img src="'+image.resource_thumb+'" alt="" style="height: 300px;" /><button class="image-slider-post__delete form-control" data-image_id="'+image.id+'" style="margin-right: auto;margin-left: auto;margin-top: 10px;max-width:8rem;">Eliminar</button></div>');
    });
        swiperContainer.attr('data-number',number);
}

$(document).on('click','.image-slider-post__delete',function(){
    deleteSlidePost($(this).parent().data('index'),$(this).data('image_id'),swiperPost,$('#post-swiper-container'));
});


function deleteSlidePost(index,imageId,swiper,swiperContainer)
{
    swal({   title: "Borrar Imagen",
      text: "¿Estás seguro?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Si,borrar",
      closeOnConfirm: true },
      function(){
          let _route = "contents";
          $('body').modalmanager('loading').find('.modal-scrollable').off('click.modalmanager');
          $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[name=_token]').val()
            }
          });
          $.ajax({
              url: _route,
              data: {'contentId':imageId},
              type: 'DELETE',
              success: function(result) {
                      $('body').modalmanager('removeLoading');
                      swiperContainer.attr('data-number', -1);
                      $.growl.notice({ message: "La imágen se ha eliminado." });
                      $('#post-swiper-container .swiper-wrapper').empty();

                      setTimeout(function () {
                          $.get('contents/'+$('#post_id').val()+'/3/1', function(r){
                              startCarouselPost();
                              if (r.images.length) {
                                  addImageToSliderPost(swiperPost,$('#post-swiper-container'),r.images);
                              }
                      });
                      }, 500);



              },
              error: function(jqXHR, textStatus, errorThrown)
              {
                    $('body').modalmanager('removeLoading');
                    $.growl.error({ message: "Ha ocurrido un error." });

              }
          });
      });
}
