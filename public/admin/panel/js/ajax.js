function ajaxAll_GET(ruta,accion,datos){
    $.ajax({
        url: ruta,
        type: 'get',
		    data: datos,
        dataType: 'json',
        success:function(data)
        {
            accion(data);
        }
    });
}

function ajaxAll_PUT(ruta,data,accion,mistake){
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
  	 dataType: 'json',
  	 contentType: "application/json",
  	 processData: false,
     success: function(e){
       $('body').modalmanager('removeLoading');
       accion(e);
   },
   error:function(jqXHR, textStatus, errorThrown)
   {
	  $('body').modalmanager('removeLoading');
	  mistake(jqXHR, textStatus, errorThrown);
   }
   });
}

//ajax que funciona sin serializeObject
function ajaxAll_PUT_(ruta,data,accion){
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
       accion(e);
     }
   });
}

function ajaxAll_POST(ruta,data,accion,mistake){
  $('body').modalmanager('loading').find('.modal-scrollable').off('click.modalmanager');
  $.ajaxSetup({
      headers: {
           'X-CSRF-TOKEN': $('input[name=_token]').val()
      }
  });
  $.ajax({
	 url : ruta,
     type: 'post',
     data: data,
	 dataType: 'json',
	 contentType: "application/json",
	 processData: false,
     success: function(e){
       $('body').modalmanager('removeLoading');
       accion(e);
   },
   error:function(jqXHR, textStatus, errorThrown)
   {
	$('body').modalmanager('removeLoading');
	mistake(jqXHR, textStatus, errorThrown);
   }
   });
}

function ajaxall_POST_formData(ruta,data,accion,mistake){
  $('body').modalmanager('loading').find('.modal-scrollable').off('click.modalmanager');
  $.ajaxSetup({
      headers: {
           'X-CSRF-TOKEN': $('input[name=_token]').val()
      }
  });
  $.ajax({
	 url : ruta,
     type: 'post',
     data: data,
	 contentType: false,
	 processData: false,
     success: function(e){
       $('body').modalmanager('removeLoading');
       accion(e);
   },
   error:function(jqXHR, textStatus, errorThrown)
   {
	   $('body').modalmanager('removeLoading');
	   mistake(jqXHR, textStatus, errorThrown);
   }

   });
}
