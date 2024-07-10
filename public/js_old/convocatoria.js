datatableConvocatoria();

function datatableConvocatoria()
{
    $postsTable = $('#tabla_convoca').DataTable({
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
        ajax: `/convocatoria-datatable`,
        columns: [
            {data:'idnoti', name: 'idnoti', searchable: false},
            {data:'referencia', name: 'referencia', searchable: false},
            {data:'unidad', name: 'unidad', searchable: false},
            {data:'fecha', name: 'fecha', searchable: false},
            {data:'bases', name: 'bases', searchable: false},
            {data:'aptos', name: 'aptos', searchable: false},
            {data:'resultados', name: 'resultados', searchable: false},
            {data:'Image', searchable: false},
        ],
        "aoColumnDefs": [
            {
                "bVisible": false,
                 "aTargets": [0, 2, 3, 7]
            },
            {
                  "aTargets": [ 4 ],
                  "mData": "bases",
                  "mRender": function ( data, type, full ) {

                    if (full['bases']) {

                      return `
                        <a target="_blank" href="${full['bases']}">
                          <img class="img-responsive" src="/img/pdf.png" width="50px">
                        </a>

                      `;
                    }
                    return "";
                  }
            },
            {
                  "aTargets": [ 5 ],
                  "mData": "aptos",
                  "mRender": function ( data, type, full ) {

                    if (full['aptos']) {

                      return `
                        <a target="_blank" href="${full['aptos']}">
                          <img class="img-responsive" src="/img/pdf.png" width="50px">
                        </a>

                      `;
                    }
                    return "";
                  }
            },
            {
                  "aTargets": [ 6 ],
                  "mData": "resultados",
                  "mRender": function ( data, type, full ) {

                    if (full['resultados']) {

                      return `
                        <a target="_blank" href="${full['resultados']}">
                          <img class="img-responsive" src="/img/pdf.png" width="50px">
                        </a>

                      `;
                    }
                    return "";
                  }
            },
            {
                  "aTargets": [ 1 ],
                  "mData": "referencia",
                  "mRender": function ( data, type, full ) {
                      return `
                        <dl>
                          <dt>${full['referencia']}</dt>
                          <dd>${full['unidad']}</dd>
                          <dd class="c-orange">${full['Image']}</dd>
                        </dl>
                      `;
                  }
            },
        ]
    });
}

// $(document).ready(function() {
// $('#tabla_convoca').dataTable( {
// "language": {
// "lengthMenu": "Visualizando _MENU_ Registros por Página",
// "zeroRecords": "Ningun Registro Encontrado",
// "info": "Mostrando Páginas _PAGE_ de _PAGES_",
// "infoEmpty": "No hay registros disponibles",
// "infoFiltered": "(filtrado de _MAX_ total de registros)",
// "search":"Buscar por N° de Convocatoria"
// }
// } );
// } );
