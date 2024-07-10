var btnSaveImage = $('#save-image-btn');
var btnCropImage = $('#crop-image-btn');

$('#btn-cancel-dz-crop').click(function(event) {
    event.preventDefault();
    $('#dz-crop-container').empty();
    $('#crop-image-btn').show();
    $('#save-image-btn').hide();
    
    //post.inputImgCover.val('');
    //post.imgCover.attr("src", "");
    //post.inputHiddenCover.val("");
});

$('#crop-image-btn').click( function() {
    crop();
    $(this).hide();
    $('#save-image-btn').show();
});

$('#save-image-btn').click( function() {
    saveImageCrop();
    $('#crop-image-btn').show();
    $('#dz-crop-container').empty();
    project.modalCrop.modal('hide');
});

function setDataURIS(resolution,cb){
    var description = [];
    var d = $(".description");
    $.each(d, function() {
        var content = $(this).val();
        if (content == "") {
            content = "Descripción de la Imagen";
        }
        $('#divContents').append('<input type="hidden" name="content[]" value="'+content+'">');
    });

    var myDropzone = Dropzone.forElement("#my-dropzone");
    var files = myDropzone.files;
    //Remover imagenes del dropzone
    //myDropzone.removeAllFiles(true)
    var resizes = [];

    for (var i = 0; i < files.length; i++) {
        var resizeFile = new Promise(function(resolve,reject){
            var reader = new FileReader();
            reader.onload = function(e){
                resize(e.target.result,resolution,function(dataURI){
                    resolve(dataURI);
                });
            };
            reader.readAsDataURL(files[i]);
        });
        resizes.push(resizeFile);
    }

    var uploads = [];
    Promise.all(resizes).then(function(values){

        values.forEach(function(targetValue){
              //console.log(targetValue);
                //$('#dz_images').val(values);
                uploads.push(targetValue);


              $('#divPhotos').append('<input type="hidden" name="image[]" value="'+targetValue+'">');
        })
        //arrayImagenes = uploads;

        cb()
    })

}

function resize(dataURI,width,cb){
    var newImage = new Image();
    var newWidth = width;
    newImage.onload = function(){
        var canvasOffLine = document.createElement("canvas"),
        canvasContext = canvasOffLine.getContext("2d");

        var ratio = newImage.height/newImage.width;
        var newHeigth = newWidth*ratio;

        canvasOffLine.width = newWidth;
        canvasOffLine.height = newHeigth;

        // draw image into canvas element
        canvasContext.drawImage(newImage, 0, 0, newWidth, newHeigth);
        cb(canvasOffLine.toDataURL("image/png"));
    };
    newImage.src=dataURI;
}

function saveImageCrop(){

    var blob = dataURItoBlob($("#canvas-crop")[0].toDataURL("image/png"));
    var reader = new window.FileReader();
    reader.readAsDataURL(blob);
    reader.onloadend = function() {
        base64data = reader.result;
            post.inputHiddenCover.val(base64data);
            post.imgCover.attr('src', base64data);
    }
}

function dataURItoBlob(dataURI) {
    'use strict'
    var byteString,
        mimestring

    if(dataURI.split(',')[0].indexOf('base64') !== -1 ) {
        byteString = atob(dataURI.split(',')[1])
    } else {
        byteString = decodeURI(dataURI.split(',')[1])
    }

    mimestring = dataURI.split(',')[0].split(':')[1].split(';')[0]

    var content = new Array();
    for (var i = 0; i < byteString.length; i++) {
        content[i] = byteString.charCodeAt(i)
    }

    return new Blob([new Uint8Array(content)], {type: mimestring});
}

function crop(){
    //event.preventDefault();
    $("#canvas-crop")[0].style.display = "inline";
    $('#dz-crop-preview-image').Jcrop({
        addClass: 'jcrop-centered',
        onChange: genCoords,
        onSelect: genCoords,
        minSize: [950, 400], // min crop size
        maxSize: [950, 400], // max crop size
        aspectRatio: 950/400, //keep aspect ratio
        setSelect: [ 100, 100, 50, 50 ],
     });
    btnSaveImage.removeClass('hide');
    $(this).addClass('hide');
}

function genCoords(c){

    var rx, ry;
    var canvas = document.getElementById('canvas-crop'); //canvas
    ctx = canvas.getContext("2d"); //Contexto
    var img = $("#dz-crop-preview-image"); //Imagen original

    //Radio canvas es la proporcion en que se reduce las dimensiones
    var ratioCanvas = {
      x: img[0].naturalWidth / img.width(),
      y: img[0].naturalHeight / img.height()
    }

    var realImgCrop = {
        width   : Math.round(ratioCanvas.x * c.w),
        height  : Math.round(ratioCanvas.y * c.h),
        x: Math.round(ratioCanvas.x * c.x),
        y: Math.round(ratioCanvas.y * c.y)
    }

    canvas.width = 950;
    canvas.height = 400;

    ctx.drawImage(img[0], realImgCrop.x, realImgCrop.y, realImgCrop.width, realImgCrop.height , 0, 0, canvas.width , canvas.height);
}

Dropzone.options.myDropzone = {
    init: function() {
        var self = this;
        // config
        //self.options.previewTemplate  = previewTemplate;
        self.options.autoProcessQueue   = false;
        self.options.addRemoveLinks     = true;
        self.options.dictRemoveFile     = "Delete";
        self.options.thumbnailWidth = 150;
        self.options.thumbnailHeight = 150;
        //self.options.clickable = true;

        // load already saved files
        /*$.get('/upload', function(data) {
            var files = JSON.parse(data).files;
            for (var i = 0; i < files.length; i++) {
                var mockFile = {
                    name: files[i].name,
                    size: files[i].size,
                    type: 'image/jpeg'
                };
                self.options.addedfile.call(self, mockFile);
                self.options.thumbnail.call(self, mockFile, files[i].url);
            };
        });*/

        // bind events
        //New file added
        self.on("addedfile", function(file) {

            var i = self.files.length-1;

            var btn = Dropzone.createElement("<button class='crop'> Recortar </button>");
            file.previewElement.appendChild(btn);

            // Añadir Descripcion
            var myInput = Dropzone.createElement('<textarea class="form-control description" style="width=150;" placeholder="Escriba una Descripción"></textarea>');
            file.previewElement.appendChild(myInput);

            $(btn).unbind("click").click(function(e){
                e.preventDefault();

                var index = $(this).parent().parent().children().index($(this).parent())-1;
                var file = self.files[index];

                this.id = index;

                var reader = new FileReader();
                $("#canvas-crop").attr('data-id',index);

                reader.onload = function(e){
                    var image = new Image();
                    image.style.display = "none";

                    image.onload = function(){
                        var ratio = image.width/image.height;

                        $('#dz-crop-container').append(
                            '<img id="dz-crop-preview-image" src="'+image.src+'" width="'+ratio*400+'" height="'+400+'"/>'

                        );


                        /*$("#preview-image").attr('src',image.src)
                        $("#preview-image").attr('width',ratio*400);
                        $("#preview-image").attr('height',400);*/

                        var canvas = document.getElementById('canvas-crop'),
                        ctx = canvas.getContext("2d");
                        canvas.style.display="none";
                        canvas.width = ratio*300;
                        canvas.height = 300;
                        ctx.drawImage(image, 0, 0, canvas.width, canvas.height);
                    }
                    image.src = e.target.result;
                };
                reader.readAsDataURL(file);
                //$('#crop-image-btn').show();
                $("#imageModal").modal('show');
            });
        });
        // Send file starts
        self.on("sending", function(file) {
            //console.log('upload started', file);
            $('.meter').show();
        });
        self.on("drop",function(){
            //console.log(this.files);
        });
        // File upload Progress
        self.on("totaluploadprogress", function(progress) {
            //console.log("progress ", progress);
            $('.roller').width(progress + '%');
        });
        self.on("queuecomplete", function(progress) {
            $('.meter').delay(999).slideUp(999);
        });
        // On removing file
        /*self.on("removedfile", function(file) {
            //console.log('Remove file');
            //console.log(file);
            $.ajax({
                url: '/uploaded/files/' + file.name,
                type: 'DELETE',
                success: function(result) {
                    //console.log(result);
                }
            });
        });*/
    }
};
