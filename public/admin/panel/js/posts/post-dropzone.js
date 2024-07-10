var postDropzone = $('#post_dropzone').dropzone({
    dictDefaultMessage: "Arrastre sus imágenes aquí!.",
    autoProcessQueue: true,
    uploadMultiple: true,
    parallelUploads: 1,
    maxFilezise: 10,
    maxFiles: 5,
    
    init: function() {
        postDropzone = this;

        this.on("addedfile", function(file) {

        });

        this.on("complete", function(file) {
            let _that;
            _that = this;
            _that.removeFile(file);
            //this.removeFile(file);
        });

        this.on('canceled',function(file){

        });

        this.on('sending',function(file){

        });

        this.on('error',function(file){

        });

        this.on("uploadprogress", function(progress) {

        });

        this.on("success",function(file){
            let _that = "", _myobjeto = {};
            let _route;

            _route = 'contents/change-model-id';
            _that = this;
            _myobjeto = JSON.parse(file.xhr.response);

            $('body').modalmanager('loading').find('.modal-scrollable').off('click.modalmanager');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('input[name=_token]').val()
                }
            });

            $.ajax({
                type: 'POST',
                url : _route,
                data: {'modelId':$('#post_id').val(),'contentId':_myobjeto.id},
                success: function(data){
                    $('body').modalmanager('removeLoading');
                    $.growl.notice({ message: "Se ha subido correctamente la imágen." });
                    prependImageToSliderPost(swiperPost,$('#post-swiper-container'),data.images);
                    $('body,html').removeClass("page-overflow");
                    $('body,html').removeClass("modal-open");


                },
                error: function(jqXHR, textStatus, errorThrown)
                {
                    $('body').modalmanager('removeLoading');
                    $.growl.notice({ message: "Ha ocurrido un error." });
                }
            });
            _that.removeFile(file);
        });
    }
});
