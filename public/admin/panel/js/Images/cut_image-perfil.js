File.prototype.convertToBase64 = function(callback){
            var reader = new FileReader();
            reader.onload = function(e) {
                 callback(e.target.result)
            };
            reader.onerror = function(e) {
                 callback(null);
            };
            reader.readAsDataURL(this);
};

function saveImageCrop_perfil(){
	var blob = dataURItoBlob($("#canvas-crop")[0].toDataURL("image/png"));
	var reader = new window.FileReader();
	reader.readAsDataURL(blob);
	reader.onloadend = function() {
	base64data = reader.result;
	var imagen_base = base64data;

	addImageToModal(imagen_base);
   }
   $("#imageModal").modal('hide');
}

function saveImageFull_perfil(){
	var selectedFile = inputFileUsed[0].files[0];
      selectedFile.convertToBase64(function(base64){
           var imagen_base = base64;
		   addImageToModal(imagen_base);
      });
	  $("#imageModal").modal('hide');
}

function addImageToModal(imagen_base){
	//Remover divs previos
	areaImage.hide();
	// $('.img_previa').remove();
	userImage.empty();
	//Agregar imagen previa
	if (dimension_img == 'perfil') {
		userImage.append("<img name='imagen_perfil' src="+imagen_base+" class='imgPerfil'>");
	}
	else if(dimension_img == 'normal') {
		userImage.append("<img name='imagen_perfil' src="+imagen_base+" class='imgUsuario'>");
	}
	else if(dimension_img =='dashboard'){
		userImage.append("<img name='imagen_perfil' src="+imagen_base+" class='imgDashboard'>");
	}
	//Existe una imagen
	exist_img = 0;
	dataImgPerfil.val(imagen_base);
	existImgPerfil.val(1);
}
