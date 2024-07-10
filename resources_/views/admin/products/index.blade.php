@extends('admin.layouts.index') 
@section('content')
<div class="ui-container">
    <!--page title and breadcrumb start -->
    <div class="row">
        <div class="col-md-8">
            <h1 class="page-title"> Productos
                <small>Lista</small>
            </h1>
        </div>
        <div class="col-md-4">
            <ul class="breadcrumb pull-right">
                <li>Home2</li>
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
                            <form class=" row order-srch-form" role="form">
                                <div class="form-group col-md-3">
                                    <label class="sr-only">product # or Product Name..</label>
                                    <input class="form-control" placeholder="Nombre del producto" type="text" id="product_name">
                                </div>
                                <div class="form-group col-md-3" style="padding-left: 0px">
                                    <label class="sr-only">Categoría</label>
                                    <select class="form-control" id="product_category">
                                        <option value="">Categoría</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-3" style="padding-left: 0px">
                                    <label class="sr-only">Subcategoría</label>
                                    <select class="form-control" id="product_subcategory">
                                        <option value="">Subcategoría</option>
                                    </select>
                                </div>
                                <div class="col-md-1" style="padding-left: 0px">
                                    <button type="button" class="btn btn-info" onclick="re_call_datatable_products()">Buscar</button>
                                </div>
                                <div class="col-md-2 pull-right">
                                    <a href="/admin/crear-producto" class="btn btn-success">Crear Producto</a>
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
                    Blank Page
                    <span class="tools pull-right">
                        <a class="close-box fa fa-times" href="javascript:;"></a>
                    </span>
                </header>
                <div class="panel-body">
                    <div class="col-md-12">
                        <div class="table-responsive box-body">
                            <table id="products-datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Código</th>
                                        <th>Nombre de producto</th>
                                        <th>Categoría</th>
                                        <th>Subcategoría</th>
                                        <th>Precio unitario</th>
                                        <th>Stock</th>
                                        <th>Publicado</th>
                                        <th>Destacado</th>
                                        <th>Promocion</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.products.image_modal')

@endsection
@section('scripts')
    <script type="text/javascript" src="/admin/products.js"></script>
    <script type="text/javascript" src="/admin/product_dropzone.js"></script>
    <script type="text/javascript">
        console.log("blank page");
    </script>
@endsection
