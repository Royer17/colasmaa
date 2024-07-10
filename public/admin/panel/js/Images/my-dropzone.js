Dropzone.options.myDropzone = {
		dictDefaultMessage: "Arrastre imágenes aqui",
		parallelUploads: 1,
		autoProcessQueue: true,
		uploadMultiple: true,
		maxFilezise: 10,
		maxFiles: 5,

         init: function() {

             myDropzone = this;

             this.on("addedfile", function(file) {
                console.log("Archivo agregado...")
             });

             this.on("complete", function(file) {
				if (file.accepted == false) {
					$.growl.error({ message: "Solo se aceptan 5 imágenes al mismo tiempo" });
					this.removeFile(file);
				}
				else {
					myobjeto = JSON.parse(file.xhr.response);
					var itemId = myobjeto.id;
					var modelId = idItemToAssignToAImage;

					var ruta = GLOBAL.path+'api/contents/edit-model-id';
                    console.log(ruta);
					var data = { itemId: itemId , modelId: modelId };
                    console.log(data);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('input[name=_token]').val()
                        }
                    });
					$.ajax({
						url: ruta,
						type: 'PUT',
						data:data,
						success: function(result) {
							$.get('images/'+modelId+'/'+modelTypeToGetImages,function(data){
								charge_slider(carouselContainer,data.images,carouselId);
								carouselContainer.show();
							});
						}
					});
					myDropzone.removeFile(file);
				}
             });

            this.on("uploadprogress", function(progress) {

            });

             this.on("success", myDropzone.processQueue.bind(myDropzone));
         }
};
