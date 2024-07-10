function charge_slider(area,data,container){
  area.empty();
if (data == null) {
  }
  else {
      area.append('<div id="'+container+'" class="owl-carousel"></div>');
        $.each(data, function(id, content){
                // $('#'+config).append('<div class="item"><img class="lazyOwl" data-src="'+content.resource+'" alt="" height="100"><div align="center"><button class="btn btn-default recorta_slide" id="'+content.id+'" value="'+content.resource+'">Recortar</button><button class="btn btn-default elimina_slide" value="'+content.id+'">Eliminar</button></div></div>');
				$('#'+container).append('<div class="item"><img class="lazyOwl" data-src="'+content.resource+'" alt="" height="100" style="display: block;margin: 0 auto 2rem;"><div align="center"><button class="btn btn-default elimina_slide" value="'+content.id+'">Eliminar</button></div></div>');
	    });
      $("#"+container).owlCarousel({
        items : 4,
        lazyLoad : true,
        navigation : true
      });
  }
}
