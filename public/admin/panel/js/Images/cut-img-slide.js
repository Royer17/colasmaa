function saveImageCrop_slider(){

      var blob = dataURItoBlob($("#canvas-crop")[0].toDataURL("image/png"));

      var reader = new window.FileReader();
      reader.readAsDataURL(blob);
      reader.onloadend = function() {
      base64data = reader.result;

      data = {'img': base64data, 'id': id_img_slide}

     ajaxAll_PUT_('save-cut',data,success_save_crop);
     }

     //Cerrar modal luego OK
     $("#imageModal").modal('hide');
}
function success_save_crop(e)
{
  $('body,html').removeClass("page-overflow");
  $('body,html').removeClass("modal-open");
  if (e.internet == 0) {
    $.growl.error({ message: e.msg });
  }
  else if(e.internet == 1) {
    recarga_slider();
  }
}
