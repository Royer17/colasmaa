//Mensajes generales
var msgError = "Corrija los siguientes campos por favor!";


// Variables necesarias desde el principio
var arrayImagenes = [];
// Para el Jcrop
//Variables globales para recortar la imagen
var id_img_slide;

//variable global para eliminar itinerarios por id del itinerario
var id_delete;
var array_delete = [];

//

//variable global noticia id por ahora

var noticia_id;

//Imagen base64 del input_image
// var imagen_base;
//---------------------------
//Tamaño de la imagen
var dimension_img;

//Referencia al input file usado (existe varios inputs file con la misma clase)
var inputFileUsed;

//Recursos para el manejo de imagenes de perfil
var areaImage; //Zona donde irá la imagen, que se esconde al cargar la imagen
var	userImage; //Div que contiene la imagen previa luego de cargarla
var existImgPerfil;//input- Existe una imagen para guardarla o actualizar.
var dataImgPerfil; //input -Dato de la imagen existente

//Variables para redirigir las acciones al cortar la imagen.
var bandera;
//Existe imagen from database.
var exist_img = 0;



var target;
var realImg;
var displayedImg;
var previewCSS;
var ratioCanvas;
var canvas;
var context;

var ratioCSS;
var previewImageCSS;
var realImgCrop;

// Para poder ubicar los imput y las imagenes
var input_id;
var div_id;
var id_img;
var canvas_id;
var w_id;

// Para determinar el tamaño de las imagenes
var model_table;

//Id item a asignar la imagen
var idItemToAssignToAImage;

//ModelType para obtener imagenes
var modelTypeToGetImages;

//Div Contenedor del carousel
var carouselContainer;
//Id elemento carousel (owl-demo-product) e.g
var carouselId;

function getPreviewImage(file,inputImage,inputData,dimension){
	if (file) {
		var reader = new FileReader();
		reader.readAsDataURL(file);
		reader.onload = function(e) {
			inputImage.append("<img name='' src="+e.target.result+" class='"+dimension+"'>");
			if (inputData == null) {

			}
			else {
				inputData.val(e.target.result);
			}
		};
	}
}

//Manejo perfil usuario Imagen
$('#input-profile-image').on('change',function(){
	$('#profile-image').empty();
	var file = $('#input-profile-image')[0].files[0];
	getPreviewImage(file,$('#profile-image'),$('#data-img-perfil'),'imgPerfil');
	$('#area-imagen-perfil').hide();
	$('#exist-img-perfil').val(1);
});
//----

// Funcion para capturar los valores del crop
function updatePreview(crop) {
    if (parseInt(crop.w) <= 0) return;
    realImgCrop = {
        width: Math.round(ratioCanvas.x * crop.w),
        height: Math.round(ratioCanvas.y * crop.h),
        x: Math.round(ratioCanvas.x * crop.x),
        y: Math.round(ratioCanvas.y * crop.y)
    }
    context.drawImage(target[0], realImgCrop.x, realImgCrop.y, realImgCrop.width, realImgCrop.height, 0, 0, canvas.width, canvas.height);
    var xId = $('#'+input_id).parent().parent().next().next().children().attr('id');
    var yId = $('#'+xId).next().attr('id');
    var wId = $('#'+yId).next().attr('id');
    var hId = $('#'+wId).next().attr('id');
    w_id = wId;
    $('#'+xId).val(realImgCrop.x);
    $('#'+yId).val(realImgCrop.y);
    $('#'+wId).val(realImgCrop.width);
    $('#'+hId).val(realImgCrop.height);
};

// Cambiar la vista previa de imagenes en los input
function cambiarInputimage(idInput){
    var archivos = document.getElementById(idInput).files;
    var navegador = window.URL || window.webkitURL;
    for(x=0; x<archivos.length; x++)
    {
        var objeto_url = navegador.createObjectURL(archivos[x]);
		$('#dz-crop-container').empty();
		$('#dz-crop-container').append('<img id="dz-crop-preview-image" src="'+objeto_url+'" crossOrigin="Anonymous" height="600">')
    }
};

function setPublished(selector,valor){
	selector.val(valor);
}

// Input con crop para las imagenes
$(document).on('change', '.input_image',function(event) {
	inputFileUsed = $(this);
    var inputId = $(this).attr('id');
    if ($('#'+inputId).get(0).files.length !== 0) {
		cambiarInputimage(inputId);
		project.modalCrop.modal('show');
		
		setTimeout(function(){
			$('#crop-image-btn').click();
		}, 500);


    }
});

// Acción al cortar una imagen
$('#boton-cortar').click(function(){
    $(this).attr("disabled", true);
    target = $('#target');
    realImg = {
      width: target[0].naturalWidth,
      height: target[0].naturalHeight
    }
    displayedImg = {
      width: target.width(),
      height: target.height()
    }
    ratioCanvas = {
      x: realImg.width / displayedImg.width,
      y: realImg.height / displayedImg.height
    }
    var newId = (new Date).getTime();
    var inputId = input_id;
    var divId = $('#'+inputId).parent().parent().next().attr('id');

    if (model_table == "usuario") {
        var dimension = 350;
    }
    else if (model_table == "perfil") {
        var dimension = 475;
    }
    else if (model_table == "peque") {
        var dimension = 150;
    }
    else {
        var dimension = 475;
    };
    $('#'+divId).append(
    "<canvas id='canvasImagen_"+newId+"' width='"+dimension+"' height='"+dimension+"'></canvas>"
    );
    var canvasID = "canvasImagen_"+newId;
    canvas = document.getElementById(canvasID);

    context = canvas.getContext("2d");
    target.Jcrop({
        addClass: 'jcrop-centered',
        onChange: updatePreview,
        onSelect: updatePreview,
        aspectRatio: 1
    });
});

// Botón CANCELAR para cancelar el recorte
$('#cerrar-crop').click(function(){
    var newId = (new Date).getTime();
    var inputId = input_id;
    var imgClear = $('#'+inputId).parent().parent().next().children().attr('id');
    $('#'+imgClear).remove();
    var divId = $('#'+inputId).parent().parent().next().attr('id');
    id_img = "img-usuario_"+newId;
    var idImg = id_img;
    if (model_table == "usuario") {
            var classImg = "imgUsuario";
    }
    else if (model_table == "perfil") {
        var classImg = "imgPerfil";
    }
    else {
        var classImg = "imgFormulario";
    };
    cambiarInputimage(inputId, divId, idImg, classImg);
    var hiddenId = $('#'+divId).next().next().attr('id');
    $('#'+hiddenId).val(newId);
    var area = $('#'+divId).next().next().next().attr('id');
    $('#'+area).hide();
    $('#crop-imagen').modal('hide');
});

// Borrar los div genereados dinamicamente
$(document).on("click", ".delete-generado", function(){
    id_delete = $(this).attr("value");
    console.log(id_delete);
    array_delete.push(id_delete);
    console.log(array_delete);
    var contenedor_id = $(this).parent().attr('id');
    // console.log(contenedor_id);
    $("#"+contenedor_id).remove();
});

// Inicio Editar Perfil
function limpiarErroresProfile(){
    $('#error-profile').empty();
    $('#error-username-profile').empty();
    $('#error-first-name-profile').empty();
    $('#error-last-name-profile').empty();
    $('#error-email-profile').empty();
    $('#error-birthday-profile').empty();
    $('#error-phone-profile').empty();
    $('#error-cel-profile').empty();
    $('#error-address-profile').empty();
}

function resetImage(){
	$('#input-profile-image').val('');
	$('#profile-image').empty();
	$('#area-imagen-perfil').show();
	$('#data-img-perfil').val('');
	$('#exist-img-perfil').val(0);
}

$('#editar_perfil').click(function(event){
	resetImage();
    event.preventDefault();
    model_table = "perfil";
    var id = $('#this_profile_id').val();
    var url = "usuario-perfil/"+id;
    var accion = "perfil";
    getBase(url, accion);
});

$('.cerrar-profile').click(function(e){
    e.preventDefault();
    limpiarErroresProfile();
    $('#form-profile')[0].reset();
	resetImage();
});

$('#save-profile').click(function(event){
    event.preventDefault();
    limpiarErroresProfile();
    // var formData = new FormData($('#form-profile')[0]);
	var formData = JSON.stringify($('#form-profile').serializeObject());
    var ruta = "usuario-profile";
    var accion = "perfil";
    postBase(ruta, formData, accion);
});

$('#cambiar_password').click(function(event){
    event.preventDefault();
    $('#miModalpassword').modal('show');
    $('#id_password').val(0);
});

$('#change_password').click(function(event){
    event.preventDefault();
    $('#error-password').empty();
    $('#error-password_confirmation').empty();
	let _formData = JSON.stringify($('#form-password').serializeObject());
    let _route = 'users/'+$('#id_password').val()+'/password';

    $('body').modalmanager('loading').find('.modal-scrollable').off('click.modalmanager');
    $.ajaxSetup({
        headers: {
            'csrftoken': $('input[name=_token]').val()
        }
    });
    $.ajax({
        url : _route,
        type: 'post',
        data : _formData,
        dataType: 'json',
        contentType: "application/json",
        processData: false,
        success:function(re)
        {
            $('body').modalmanager('removeLoading');

            $('#error-password').empty();
            $('#error-password_confirmation').empty();
            $('#miModalpassword').modal('hide');
            $('#form-password')[0].reset();
            $('#password_name').text("");
            $('#id_password').val("");
            if (re.user == "online")
            {
                window.location.replace("../plataforma");
            } else {
                $.growl.notice({ message: re.message });
            }
        },
        error:function(jqXHR, textStatus, errorThrown)
        {
            $('body').modalmanager('removeLoading');
            $('#error-editar-usuario').append(jqXHR.responseJSON.msg);
            $.each(jqXHR.responseJSON.errors, function( key, value ) {
                if (key == "password") {
                    $.each(value, function( errores, eror ) {
                        $('#error-password').append("<li class='error-block'>"+eror+"</li>");
                    });
                }
                else if (key == "password_confirmation") {
                    $.each(value, function( errores, eror ) {
                        $('#error-password_confirmation').append("<li class='error-block'>"+eror+"</li>");
                    });
                };
            });
        },
    });
});

// Arreglo para el mensaje de bloqueo de pantalla
// $.fn.modal.defaults.spinner = $.fn.modalmanager.defaults.spinner =
//     '<div class="loading-spinner" style="width: 200px; margin-left: -100px;">' +
//         '<div class="progress progress-striped active">' +
//             '<div class="progress-bar progress-bar-primary" style="width: 100%; color:#000; font-weight:bold;">'+
//               'Espere por Favor...' +
//             '</div>' +
//         '</div>' +
//     '</div>';



function getBase(ruta, accion, idOpcional, modeloOpcional){
    $.ajax({
        url: ruta,
        type: 'get',
        dataType: 'json',
        success:function(data)
        {
            if (accion == "perfil")
            {
                $("#editprofile").val("profile");
                $("#profile_id").val(data.user.id);
                $("#profile-username").val(data.user.username);
                $('#profile-first-name').val(data.user.first_name);
                $('#profile-last-name').val(data.user.last_name);
                $("#profile-email").val(data.user.email);
                $("#profile-birthday").val(data.user.birthday);
                $("#profile-cel").val(data.user.cel);
                $("#profile-address").val(data.user.address);

				if (!data.user.user_image) {
				}
				else {
					$('#area-imagen-perfil').hide();
					$('#profile-image').append("<img class='imgPerfil' src="+data.user.user_image+">");
				}

                $('#modalProfile').modal('show');
            }
            else if (accion == "password")
            {
                //$("#password_name").text(data.user);
                $("#id_password").val(data.id);
                $('#miModalpassword').modal('show');
            }
        },
        error:function (xhr, ajaxOptions, thrownError)
        {
            alert(xhr.status);
            alert(xhr.responseText);
            alert(thrownError);
        },
    });
}

function postBase(ruta, data, accion){
    $('body').modalmanager('loading').find('.modal-scrollable').off('click.modalmanager');
    $.ajaxSetup({
        headers: {
            'csrftoken': $('input[name=_token]').val()
        }
    });
    $.ajax({
        url : ruta,
        type: 'post',
        data : data,
		dataType: 'json',
		contentType: "application/json",
        processData: false,
        success:function(re)
        {
            $('body').modalmanager('removeLoading');
            if (accion == "perfil")
            {
				if (re.perfil_img) {
					$('.profile_img img').attr('src', re.perfil_img);
				}
                $('#modalProfile').modal('hide');
                limpiarErroresProfile();
                $('#form-profile')[0].reset();
				resetImage();
                $.growl.notice({ message: re.msg });
            }
            else if (accion == "password")
            {
                $('#error-password').empty();
                $('#error-password_confirmation').empty();
                $('#miModalpassword').modal('hide');
                $('#form-password')[0].reset();
                $('#password_name').text("");
                $('#id_password').val("");
                $.growl.notice({ message: re.msg });
                if (re.user == "online")
                {
                    window.location.replace("../plataforma");
                };
            }
            else
            {
                alert("Accion no permitida");
            }
        },
        error:function(jqXHR, textStatus, errorThrown)
        {
            $('body').modalmanager('removeLoading');
            if (jqXHR.responseJSON.action == "perfil") {
                $('#error-profile').append(jqXHR.responseJSON.msg);
                $.each(jqXHR.responseJSON.errors, function( key, value ) {
                    if (key == "username") {
                        $.each(value, function( errores, eror ) {
                            $('#error-username-profile').append("<li class='error-block'>"+eror+"</li>");
                        });
                    }
                    else if (key == "first_name") {
                        $.each(value, function( errores, eror ) {
                            $('#error-first-name-profile').append("<li class='error-block'>"+eror+"</li>");
                        });
                    }
                    else if (key == "last_name") {
                        $.each(value, function( errores, eror ) {
                            $('#error-last-name-profile').append("<li class='error-block'>"+eror+"</li>");
                        });
                    }
                    else if (key == "email") {
                        $.each(value, function( errores, eror ) {
                            $('#error-email-profile').append("<li class='error-block'>"+eror+"</li>");
                        });
                    }
                    else if (key == "birthday") {
                        $.each(value, function( errores, eror ) {
                            $('#error-birthday-profile').append("<li class='error-block'>"+eror+"</li>");
                        });
                    }
                    else if (key == "cel") {
                        $.each(value, function( errores, eror ) {
                            $('#error-cel-profile').append("<li class='error-block'>"+eror+"</li>");
                        });
                    }
                    else if (key == "address") {
                        $.each(value, function( errores, eror ) {
                            $('#error-address-profile').append("<li class='error-block'>"+eror+"</li>");
                        });
                    };
                });
            }
            else if (jqXHR.responseJSON.action == "password") {
                $('#error-editar-usuario').append(jqXHR.responseJSON.msg);
                $.each(jqXHR.responseJSON.errors, function( key, value ) {
                    if (key == "password") {
                        $.each(value, function( errores, eror ) {
                            $('#error-password').append("<li class='error-block'>"+eror+"</li>");
                        });
                    }
                    else if (key == "password_confirmation") {
                        $.each(value, function( errores, eror ) {
                            $('#error-password_confirmation').append("<li class='error-block'>"+eror+"</li>");
                        });
                    };
                });
            };
        },
    });
}

// function deleteSlide(index,imageId,swiper,swiperContainer)
// {
//     swal({   title: "Borrar Imagen",
//       text: "¿Estás seguro?",
//       type: "warning",
//       showCancelButton: true,
//       confirmButtonColor: "#DD6B55",
//       confirmButtonText: "Si,borrar",
//       closeOnConfirm: true },
//       function(){
//           let _route = "contents";
//           $('body').modalmanager('loading').find('.modal-scrollable').off('click.modalmanager');
//           $.ajaxSetup({
//             headers: {
//                 'X-CSRF-TOKEN': $('input[name=_token]').val()
//             }
//           });
//           $.ajax({
//               url: _route,
//               data: {'contentId':imageId},
//               type: 'DELETE',
//               success: function(result) {
//                       $('body').modalmanager('removeLoading');
//                       var number = swiperContainer.attr('data-number');
//                       swiperContainer.attr('data-number',parseInt(number)-1);
//                       swiper.removeSlide(parseInt(index));
//                       $.growl.notice({ message: "La imágen se ha eliminado." });
//               },
//               error: function(jqXHR, textStatus, errorThrown)
//               {
//                     $('body').modalmanager('removeLoading');
//                     $.growl.error({ message: "Ha ocurrido un error." });

//               }
//           });
//       });
// }


//Form to json
$.fn.serializeObject = function()
{
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};

function cleanError(){
	$('.titulo-error').empty();
	$('.mensaje-error').empty();
}

function addInputPut(form, id)
{
    form.append('<input type="hidden" name="_method" id="'+id+'" value="PUT" />');
}


//New functions

var project = {
	modalCrop: $('#imageModal'),
}

function cl(element)
{
	console.log(element);
}


//Functions javascript pure without Jquery//



function click(element, action)
{
    element.addEventListener("click", action);
}

function keyUp(element, action)
{
    element.addEventListener("keyup", action);
}

function element(attribute)
{
    return document.querySelector(attribute);
}

function ajaxGet(url, action)
{

    let _ajax = new XMLHttpRequest();

    _ajax.open("GET", url, true);
    _ajax.send();

    _ajax.onreadystatechange = function() {

        if (_ajax.readyState == 4 && _ajax.status == 200) {

            let _data = _ajax.responseText;

            action(_data);
        }
    }


}
