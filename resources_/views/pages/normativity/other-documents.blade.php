@extends('layouts.app')

@section('content')
<section class="page-banner">
    <div class="image-layer" style="background-image:url({{ asset('assets/img/bgs/banner-img-1.jpg') }})"></div>
    <div class="banner-inner">
        <div class="container-lg">
            <div class="inner-container clearfix">
                <h1>Otros Documentos</h1>
                <div class="page-nav">
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ route('pages.home') }}">Inicio</a></li>
                        <li><a href="">Normatividad</a></li>
                        <li class="active">Otros Documentos</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="default-section">
    <div class="container-lg">

        <div class="row as">

            <div class="article pull-left">

                <div class="article-title">
                <a href=""></a>
                </div>
            </div>

        </div>

        <input type="hidden" name="" value="Otros documentos" id="tipodocu">
        <div class="row ">
        <!-- contenido -->

        <!--  table -->
        <table id="tabla_resolutions" class="table table-bordered" cellspacing="0" style="width:100%">
            <thead>
                <tr>
                    <th>Nº</th>
                    <th width="150px">Nombre</th>
                    <th>Sigla</th>
                    <th></th>
                    <th></th>
                    <th>Enlace</th>

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
                </tr>
            </tbody>
        </table>

        <br>

        </div>

        <div class="row as">

        </div>

    </div>
</section>
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        datatableConvocatoria();

        function datatableConvocatoria()
        {
            $postsTable = $('#tabla_resolutions').DataTable({
                "dom": 'flrtip',
                "language": {
                    "url": "/admin/panel/datatable.spanish.json"
                },
                order: [
                    [0, 'desc']
                ],
                processing: true,
                serverSide: true,
                destroy:true,
                ajax: `/normatividad/last-documents-datatable`,
                columns: [
                    {data:'id', name: 'id', searchable: false},
                    {data:'title', name: 'title', searchable: true},
                    {data:'acronym', name: 'acronym', searchable: true},
                    {data:'slug', name: 'slug', searchable: false},
                    {data:'created_at', name: 'created_at', searchable: false},
                    {data:'file'},

                ],
                "aoColumnDefs": [
                    {
                        "bVisible": false,
                         "aTargets": [0, 3, 4]
                    },
                    // {
                    //       "aTargets": [ 4 ],
                    //       "mData": "file",
                    //       "mRender": function ( data, type, full ) {

                    //         if (full['file']) {

                    //           return `
                    //             <a target="_blank" href="${full['file']}">
                    //               <img class="img-responsive" src="/img/pdf.png" width="50px">
                    //             </a>

                    //           `;
                    //         }
                    //         return "";
                    //       }
                    // },
                    // {
                    //       "aTargets": [ 3 ],
                    //       "mData": "fechaemi",
                    //       "mRender": function ( data, type, full ) {
                    //           return full['fecha_formatted'];
                    //       }
                    // },
                ]
            });
        }

    </script>
@endsection