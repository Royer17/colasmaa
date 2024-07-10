<div id="product-images-modal" tabindex="-1" aria-hidden="true" role="dialog" class="modal fade" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body row">
        <div class="col-md-12 text-right prl">
          <button class="modal-close glyphicon glyphicon-remove" type="button" data-dismiss="modal" aria-hidden="true"></button>
        </div>

        <h3 class="col-md-12 text-center u-primary u-mb4">
          <b>Imágenes del Producto</b>
        </h3>

        <input type="hidden" name="" id="images_product-id">

        <div class="row">
          <div class="col-md-2">
          </div>
          <div class="col-md-8">
            <!-- <label for="">Tipo</label> -->
            <input type="hidden" id="product_gallery-type" value="1">
            
            {{-- 
            <select name="gallery_type_id" id="">
                @foreach ($gallery_types as $type)
                  <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
            --}}
            <!-- <br> -->
            <form action="/admin/upload-product-dropzone" method="POST" files='true' id="product_dropzone" class="dropzone" enctype="multipart/form-data">
            {{ csrf_field() }}

            </form>
            {{-- 
            {!! Form::open(['route'=> 'upload-product-images', 'method' => 'POST', 'files'=>'true', 'id' => 'product_dropzone' ,
            'class' => 'dropzone']) !!}
            {!! Form::close() !!}
            --}}
            <hr>
            <div id="product-swiper-container" class="swiper-container" data-number style="text-align: center;">
              <div class="swiper-wrapper">
              </div>

              <div id="product-swiper-pagination" style="display: inline-block;"></div>
              <div id="product-swiper-button-next"></div>
              <div id="product-swiper-button-prev"></div>
            </div>

          </div>
          <div class="col-md-2"></div>
        </div>

        <div class="col-md-12 mbl text-center">
          <button type="button" data-dismiss="modal" class="btn btn-primary btn-modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
</div>
