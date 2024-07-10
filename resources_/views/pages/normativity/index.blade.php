@extends('layouts.app')

@section('content')
<section class="page-banner">
    <div class="image-layer" style="background-image:url({{ asset('assets/img/bgs/banner-img-1.jpg') }})"></div>
    <div class="banner-inner">
        <div class="container-lg">
            <div class="inner-container clearfix">
                <h1>Normatividad</h1>
                <div class="page-nav">
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ route('pages.home') }}">Inicio</a></li>
                        <li class="active">Normatividad</li>
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

        <input type="hidden" name="" value="" id="tipodocu">
        <div class="row ">
        <!-- contenido -->

        <!--  table -->
        <table id="tabla_resolutions" class="table table-bordered" cellspacing="0" style="width:100%">
            <thead>
                <tr>
                    <th>Nº</th>
                    <th width="150px">Número de documento</th>
                    <th>Resumen</th>
                    <th>Tipo de documento</th>
                    <th>Fecha</th>
                    <th>Enlace</th>
                    <th>Imagen</th>

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
                    [3, 'desc']
                ],
                processing: true,
                serverSide: true,
                destroy:true,
                ajax: `/normatividad/resolutions-datatable?tipodocu=${document.querySelector('#tipodocu').value}`,
                columns: [
                    {data:'idnor', name: 'idnor', searchable: false},
                    {data:'numdoc', name: 'numdoc', searchable: true},
                    {data:'referenc', name: 'referenc', searchable: true},
                    {data:'tipodocu', name: 'tipodocu', searchable: true},
                    {data:'fechaemi', name: 'fechaemi', searchable: false},
                    {data:'nomfile', name: 'nomfile', searchable: false},
                    {data:'fecha_formatted'},

                ],
                "aoColumnDefs": [
                    {
                        "bVisible": false,
                         "aTargets": [0, 6]
                    },
                    {
                          "aTargets": [ 5 ],
                          "mData": "nomfile",
                          "mRender": function ( data, type, full ) {

                            if (full['nomfile']) {

                              return `
                                <a target="_blank" href="${full['nomfile']}">
                                  <img class="img-responsive" src="/img/pdf.png" width="50px">
                                </a>

                              `;
                            }
                            return "";
                          }
                    },
                    {
                          "aTargets": [ 4 ],
                          "mData": "fechaemi",
                          "mRender": function ( data, type, full ) {
                              return full['fecha_formatted'];
                          }
                    },
                ]
            });
        }


    </script>
@endsection