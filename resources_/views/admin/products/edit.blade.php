@extends('admin.layouts.index') 
@section('content')
<div class="ui-container">
    <!--page title and breadcrumb start -->
    <div class="row">
        <div class="col-md-8">
            <h1 class="page-title"> eCommerce Products
                <small>View Products</small>
            </h1>
        </div>
        <div class="col-md-4">
            <ul class="breadcrumb pull-right">
                <li>Home</li>
                <li><a href="#" class="active">Dashboard</a></li>
            </ul>
        </div>
    </div>
    <!--page title and breadcrumb end -->

    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="row order-srch-form" role="form">
                                <div class="form-group col-md-3">
                                    <label class="sr-only">product # or Product Name..</label>
                                    <input class="form-control" placeholder="product # or Product Name.." type="text">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="sr-only">Category</label>
                                    <select class="form-control">
                                        <option>Category</option>
                                        <option>Category one</option>
                                        <option>Category two</option>
                                        <option>Category three</option>
                                        <option>Category four</option>
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-info">Find Products</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel">
                <header class="panel-heading panel-border">
                    Editar Producto
                    <span class="tools pull-right">
                        <a class="close-box fa fa-times" href="javascript:;"></a>
                    </span>
                </header>
                <div class="panel-body">
                    <div class="row u-mx4 u-mb4 u-mt5 u-bg-white">
                        <div class="row">
                            <h3 class="text-center u-primary u-mb5 u-mt0">Información del Producto: <b>{{ $product['name'] }}</b></h3>
                            <div id="product-error" class="col-md-12 u-center u-color-error u-mb3 titulo-error"></div>

                            <form id="product_form">
                                <input type="hidden" name="_method" value="PUT"/>
                                <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                                {{ csrf_field() }}
                                <div class="col-md-12">
                                    <div class="col-md-7">
                                        <div class="form-group">
                                        <label for="">Nombre comercial de producto</label>
                                        <input type="text" name="name" class="form-control" id="product_name" value="{{ $product['name'] }}">
                                        <div class="mensaje-error" id="product-name-error"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Descripción</label>
                                            <textarea name="description" rows="9" class="form-control" id="product_description">{{ $product['description'] }}</textarea>
                                            <div class="mensaje-error" id="product-description-error"></div>
                                        </div>
                                        <div class="form-group">
                                        <label for="">Detalles del Producto (Especificaciones)</label>
                                        <textarea name="specifications" rows="9" class="form-control" id="product_specifications">{{ $product['specifications'] }}</textarea>
                                        </div>
                                        <div class="form-group">
                                        <label for="">Características del Producto</label>
                                        <textarea name="features" rows="9" class="form-control" id="product_features">{{ $product['features'] }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="">Código de Producto</label>
                                            <input type="text" name="code" class="form-control" id="" value="{{ $product['code'] }}">
                                        </div>
                                        <div class="form-grup">
                                            <label for="">Categoría</label>
                                            <select name="category_id" class="form-control" id="product_category">
                                                <option value="">Seleccione</option>
                                                @foreach($categories as $category)
                                                    @if($category->id == $product['category_id'])
                                                        <option value="{{ $category->id }}" selected="selected">{{ $category->name }}</option>
                                                    @else
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <div class="mensaje-error" id="product-category_id-error"></div>
                                        </div>
                                        <div class="form-grup" style="margin-top:10px;">
                                            <label for="">Subcategoría</label>
                                            <select name="subcategory_id" class="form-control" id="product_subcategory">
                                            <option value="">Seleccione</option>
                                                @foreach($subcategories as $subcategory)
                                                    @if($subcategory->id == $product['subcategory_id'])
                                                        <option value="{{ $subcategory->id }}" selected="selected">{{ $subcategory->name }}</option>
                                                    @else
                                                        <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <div class="mensaje-error" id="product-subcategory_id-error"></div>
                                        </div>
                                        <div class="form-group" style="margin-top:10px;">
                                        <label for="">Precio Web S/.</label> &emsp;&emsp;
                                        <div class="input-group">
                                        <input type="text" name="price" class="form-control" id="product_price" value="{{ $product['price'] }}">
                                        <span class=" input-group-addon u-mb4 u-bg-success"> S/. </span>
                                        </div>
                                        <div class="mensaje-error" id="product-price-error"></div>
                                        </div>
                                        {{-- 
                                        <div class="form-group">
                                        <label for="">Comisión:</label>
                                        <input type="text" name="" class="form-control">
                                        </div>
                                        --}}
                                        <div class="form-group">
                                        <label for="">Stock</label> &emsp;&emsp;
                                        {{--<label class="radio-inline"><input type="radio" name="optradio" checked>Disponible</label>
                                        <label class="radio-inline"><input type="radio" name="optradio">Agotado</label>--}}
                                        <input type="text" name="stock" value="{{ $product['stock'] }}" class="form-control" id="product_stock">
                                        <div class="mensaje-error" id="product-stock-error"></div>
                                        </div>
                                        {{-- 
                                        <div class="form-group">
                                        <label for="">Compra mínima</label> &emsp;&emsp;
                                        <input type="text" name="minimum_quantity" class="form-control" id="product_minimum-quantity" value="1">
                                        <div class="mensaje-error" id="product-minimum-quantity-error"></div>
                                        </div>
                                        <div class="form-group">
                                        <label for="">Tiempo de entrega</label>
                                        <input type="text" name="delivery_time" id="product_delivery-time" class="form-control">
                                        </div>
                                        <div class="form-group">
                                        <label for="">Tiempo de instalación</label>
                                        <input type="text" name="installation_time" id="product_installation-time" class="form-control">
                                        </div>
                                        <div class="form-group">
                                        <label for="">Garantía</label>
                                        <input type="text" name="warranty" class="form-control" id="product_warranty">
                                        </div>
                                        <div class="form-group">
                                        <label for="">Filtros para la búsqueda</label>
                                        </div>
                                        <div id="product_attributes">
                                        </div>
                                        <div class="form-group">
                                        <label for="">País</label>
                                        <select name="country_id" class="form-control" id="product_country"></select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Ciudad</label>
                                        <select name="city_id" class="form-control" id="product_city"></select>
                                        </div>
                                        <div class="form-group">
                                        <label for="">Dirección</label>
                                        <input type="text" name="address" id="product_address_" class="form-control">
                                        </div>
                                        <div class="form-group">
                                        <input type="text" id="product_address" name="" class="form-control u-mb3" placeholder="Google Maps" />
                                        <input type="hidden" id="product_latitude" name="latitude" value="">
                                        <input type="hidden" id="product_longitude" name="longitude" value="">
                                        <div id="location" style="width: 100%; height: 200px;" class="u-mb3"></div>
                                        </div>
                                        --}}
                                        <div class="form-grup">
                                        <label for="">Ficha técnica</label>
                                        <input type="file" class="form-control" id="product_pdf" name="product_pdf">
                                        @if($product['pdf'])
                                        <a href="{{ $product['pdf'] }}" class="" id="product_pdf-link">Ver Ficha técnica</a>
                                        @endif
                                        </div>
                                        {{-- 
                                        <div class="form-grup">
                                        <label for="">Brochure del producto</label>
                                        <input type="file" class="form-control" id="product_brochure" name="brochure">
                                        <a href="" class="" id="product_brochure-link">Ver Brochure</a>
                                        </div>
                                        --}}
                                        <div class="form-group">
                                        <label for="">Enlace de Youtube</label>
                                        <input type="text" name="link" class="form-control" id="product_link">
                                        </div>
                                        {{-- 
                                        <div class="form-group" style="display:none">
                                        <label for="">Video Promocional</label>
                                        <input type="text" name="video" class="form-control" id="product_video">
                                        </div>
                                        --}}
                                        <div class="form-group">
                                            <label for="">Estado</label>
                                            <select name="type_id" class="form-control">
                                                @if($product['published'])
                                                    <option value="1" selected="selected">Publicado</option>
                                                    <option value="0">No Publicado</option>
                                                @else
                                                    <option value="1">Publicado</option>
                                                    <option value="0" selected="selected">No Publicado</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="col-md-12 col-xs-12 u-mb3 text-center">
                                <button type="button" class="btn btn-primary btn-modal" id="product__update">Actualizar</button>
                                <a href="/admin/productos" class="btn btn-primary btn-modal">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('scripts')
    <script type="text/javascript" src="/admin/product_update.js"></script>
    <script type="text/javascript">
        console.log("blank page");
    </script>
@endsection
