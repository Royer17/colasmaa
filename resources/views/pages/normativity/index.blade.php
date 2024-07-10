@extends('layouts.app')

@section('content')
<style>
  /* Agrega un relleno a todas las celdas de la tabla */
#tabla_resolutions td {
    padding: 10px; /* Puedes ajustar este valor según tu preferencia */
}


.table-resolutions {
    width: 100%;
    border-collapse: collapse;
    background-color: #fff;
    border: 1px solid black;
}

.table-resolutions thead {
    background-color: #f9f9f9;
}

.table-resolutions th, .table-resolutions td {
    padding: 15px;
    text-align: left;
    border: 1px solid black;
}

.table-resolutions th {
    font-weight: bold;
    text-transform: uppercase;
    font-size: 12px;
    color: #000;
}

.table-resolutions td {
    font-size: 14px;
    color: #333;
}

.table-resolutions tr:nth-child(odd) {
    background-color: #f9f9f9;
}

.table-resolutions tr:nth-child(even) {
    background-color: #ffffff;
}

.img-responsive {
    width: 32px;
    height: auto;
}

</style>

<section id="vision">
    <div class="flex items-center px-10 md:px-20 bg-dark-blue w-full h-16 md:h-20 text-white">
        <h1 class="text-sm md:text-3xl uppercase">Normatividad</h1>
    </div>
    <div class="bg-gray-100">
        <div class="flex flex-col items-center md:flex-row gap-4 px-3 md:px-20 py-2 md:py-10 w-full">
            <div class="bg-white shadow-md rounded-2xl h-fit p-4 md:p-6 w-full">
                <div>
                  <label for="tipodocu" class="block text-sm font-medium text-gray-700 mb-1">Filtrar por disposición</label>
                  <div class="relative mt-2">
                      <select id="tipodocu" class="block w-full py-2 pl-3 pr-10 text-base border border-gray-300 focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md appearance-none">
                          <option value="">Todas</option>
                          @foreach($document_types as $document)
                                @if($document->slug == $document_type_slug_selected)
                                    <option value="{{ $document->id }}" selected>{{ $document->name }}</option>
                                @else
                                    <option value="{{ $document->id }}">{{ $document->name }}</option>
                                @endif
                          @endforeach
                      </select>
                      <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                          <svg class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                          </svg>
                      </div>
                  </div>
                   
                    <div class="mt-4 overflow-x-auto">
                      <br> <br>
                        <table id="tabla_resolutions" class="min-w-full divide-y divide-gray-200 w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nº</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" width="150px">Número de documento</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Resumen</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo de documento</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Enlace</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Imagen</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap"></td>
                                    <td class="px-6 py-4 whitespace-nowrap"></td>
                                    <td class="px-6 py-4 whitespace-nowrap"></td>
                                    <td class="px-6 py-4 whitespace-nowrap"></td>
                                    <td class="px-6 py-4 whitespace-nowrap"></td>
                                    <td class="px-6 py-4 whitespace-nowrap"></td>
                                    <td class="px-6 py-4 whitespace-nowrap"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('shared.information2')

@endsection

@section('scripts')
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    datatableNormatividad();

    function datatableNormatividad() {
        $postsTable = $('#tabla_resolutions').DataTable({
            "dom": '<"flex flex-col md:flex-row justify-between items-center pb-4"lf>rt<"flex flex-col md:flex-row justify-between items-center pt-4"ip>',
            "language": {
                "url": "/admin/panel/datatable.spanish.json"
            },
            order: [
                [4, 'desc'] // Cambiado el índice de la columna a 4 para ordenar por fecha de forma descendente
            ],
            processing: true,
            serverSide: true,
            destroy: true,
            ajax: `/normatividad/resolutions-datatable?tipodocu=${document.querySelector('#tipodocu').value}`,
            columns: [
                {data: 'idnor', name: 'normas.idnor', searchable: false},
                {data: 'numdoc', name: 'normas.numdoc', searchable: true},
                {data: 'referenc', name: 'normas.referenc', searchable: true},
                {data: 'tipodocu', name: 'document_types.name', searchable: true},
                {data: 'fechaemi', name: 'normas.fechaemi', searchable: false},
                {data: 'nomfile', name: 'normas.nomfile', searchable: false},
                {data: 'fecha_formatted'},
            ],
            "aoColumnDefs": [
                {
                    "bVisible": false,
                    "aTargets": [0, 6]
                },
                {
                    "aTargets": [5],
                    "mData": "nomfile",
                    "mRender": function (data, type, full) {
                        if (full['nomfile']) {
                            return `
                                <a target="_blank" href="${full['nomfile']}">
                                    <img class="w-8 h-auto" src="/img/pdf.svg">
                                </a>
                            `;
                        }
                        return "";
                    }
                },
                {
                    "aTargets": [4],
                    "mData": "fechaemi",
                    "mRender": function (data, type, full) {
                        return full['fecha_formatted'];
                    }
                },
            ],
            "initComplete": function(settings, json) {
                // Add Tailwind CSS classes to pagination elements
                $('.dataTables_paginate').addClass('flex items-center justify-between');
                $('.dataTables_paginate a').addClass('px-3 py-1 bg-white border border-gray-300 text-gray-700 rounded-md hover:bg-gray-100 mx-1');
                $('.dataTables_paginate span').addClass('flex items-center');
                $('.dataTables_paginate .paginate_button').not('.disabled').addClass('hover:bg-gray-100');
                $('.dataTables_paginate .paginate_button.current').addClass('bg-indigo-500 text-white');
                $('.dataTables_length select').addClass('mt-2 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md');
                $('.dataTables_filter input').addClass('mt-2 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md');
                $('.dataTables_filter').addClass('md:w-1/3 w-full');
                $('.dataTables_length').addClass('md:w-1/3 w-full');
            }
        });
    }

    document.querySelector('#tipodocu').addEventListener('change', () => {
        datatableNormatividad();
    });

</script>
@endsection
