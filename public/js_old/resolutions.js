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
            {data:'fechaemi', name: 'fechaemi', searchable: false},
            {data:'nomfile', name: 'nomfile', searchable: false},
            {data:'fecha_formatted'},

        ],
        "aoColumnDefs": [
            {
                "bVisible": false,
                 "aTargets": [0, 5]
            },
            {
                  "aTargets": [ 4 ],
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
                  "aTargets": [ 3 ],
                  "mData": "fechaemi",
                  "mRender": function ( data, type, full ) {
                      return full['fecha_formatted'];
                  }
            },
        ]
    });
}
