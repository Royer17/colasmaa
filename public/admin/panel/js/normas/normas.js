const roleId = document.querySelector('input[name="role_id"]').value;

$(document).on('ready',function(){
	datatableConvocatorias("");

    $(`#form-normas input[name="fechaemi"]`).datepicker({
        format: 'dd/mm/yyyy',
        language: 'es-ES',
    });
});

norma.btnCancel.on('click', function(){
    $('#modalCrearNorma').modal('hide');
});

function datatableConvocatorias()
{
    $postsTable = $('#normas-datatable').DataTable({
        "dom": 'flrtip',
        "language": {
            "url": "/admin/panel/datatable.spanish.json"
        },
        order: [
            [2, 'desc']
        ],
        processing: true,
        serverSide: true,
        destroy:true,
        ajax: `/admin/normas-datatable?role_id=${roleId}`,
        columns: [
            {data:'idnor', name: 'idnor', 'searchable': false},
            {data:'detalle', name: 'document_types.name', 'searchable': true},
            {data:'fechaemi', name: 'fechaemi', 'searchable': false},
            {data:'numdoc', name: 'numdoc', 'searchable': true},
            {data:'nomfile', name: 'nomfile', 'searchable': false},
            {data:'Image', 'searchable': false},
            {data:'published', 'searchable': false},
            {data:'Actions', 'searchable': false}
        ],
        "aoColumnDefs": [
            {
                "bVisible": false,
                 "aTargets": [0, 5]
            },
            {
                  "aTargets": [ 2 ],
                  "mData": "fechaemin",
                  "mRender": function ( data, type, full ) {
                      return full['Image'];
                  }
            },
            {
                  "aTargets": [ 4 ],
                  "mData": "nomfile",
                  "mRender": function ( data, type, full ) {
                      if (full['nomfile']) {
                        return `<a href="${full['nomfile']}" target="_blank">Archivo</a>`;
                      }
                      return "";
                  }
            },

            {
                  "aTargets": [ 6 ],
                  "mData": "published",
                  "mRender": function ( data, type, full ) {

                    if (full['published'] == 1) {
                        return "Sí";
                    }
                    return "No";
                  }
            }

        ]
    });
}

function Editar(btn){
    let _id = btn.value;

    cleanError();
    cleanModal();
    norma.modalTitle.text("Editar norma");
    norma.form.append('<input id="norma_method" type="hidden" name="_method" value="PUT" />');

    norma.btnSave.hide();
    norma.btnUpdate.show();

    let _route = '/admin/norma/'+_id;
    $.get(_route, function(p){
        const form = `#form-normas`;
        document.querySelector(`${form} select[name="tipodocu"]`).value = p.tipodocu; 
        document.querySelector(`${form} input[name="fechaemi"]`).value = p.fecha_formatted; 
        document.querySelector(`${form} input[name="id"]`).value = p.idnor; 
        document.querySelector(`${form} input[name="numdoc"]`).value = p.numdoc; 
        document.querySelector(`${form} textarea[name="referenc"]`).value = p.referenc; 
        document.querySelector(`${form} select[name="published"]`).value = p.published;

        if(p.nomfile){
            $('#form-normas input[name="nomfile"]').next().children().attr('href', p.nomfile);
            $('#form-normas input[name="nomfile"]').next().show();
        }

        $('#modalCrearNorma').modal('show');
    });

}

//---------------------------------------------
//Eliminar
function Eliminar(btn){
    const idPost = btn.value;
    const noticiaTitle = $(btn).data('title');

  Swal.fire({
    title: `Eliminar norma`,
    showCancelButton: true,
    confirmButtonText: `Confirmar`,
    cancelButtonText: `Cancelar`,
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.value) {
      const url = `/admin/norma/${idPost}`;
      lockWindow();
      const data = {};

      //$('body').modalmanager('loading').find('.modal-scrollable').off('click.modalmanager');
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('input[name=_token]').val()
          }
      });
      $.ajax({
         type: 'DELETE',
         url : url,
         data: data,
            success: function(re){
                //$('body').modalmanager('removeLoading');
                //$('body,html').removeClass("page-overflow");
                //$('body,html').removeClass("modal-open");
                unlockWindow();
                $postsTable.ajax.reload();
                Swal.fire(re.title, re.message, re.symbol);
            },
            error:function(jqXHR, textStatus, errorThrown)
            {
               //$('body').modalmanager('removeLoading');
               //$('body,html').removeClass("page-overflow");
               //$('body,html').removeClass("modal-open");
               unlockWindow();

              Swal.fire(`Error`, `Ha ocurrido un error`, `warning`);
            }

       });
    }
  })
  return;
}

//Elimnar file
function EliminarArchivo(btn){
   const recordId = $('#form-normas input[name="id"]').val();

  Swal.fire({
    title: `Eliminar Archivo`,
    showCancelButton: true,
    confirmButtonText: `Confirmar`,
    cancelButtonText: `Cancelar`,
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.value) {
      const url = `/admin/norma/${recordId}/file`;
      lockWindow();
      const data = {};
      //$('body').modalmanager('loading').find('.modal-scrollable').off('click.modalmanager');
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('input[name=_token]').val()
          }
      });
      $.ajax({
         type: 'DELETE',
         url : url,
         data: data,
            success: function(re){
                //$('body').modalmanager('removeLoading');
                //$('body,html').removeClass("page-overflow");
                //$('body,html').removeClass("modal-open");
                unlockWindow();
                btn.parentElement.remove();
                Swal.fire(re.title, re.message, re.symbol);
                $postsTable.ajax.reload();
            },
            error:function(jqXHR, textStatus, errorThrown)
            {
               unlockWindow();

              Swal.fire(`Error`, `Ha ocurrido un error`, `warning`);
            }

       });
    }
  })
  return;
}

//--------------------------------------------
$('#btnCrearpublicacion').on('click', function(){
    cleanError();
    cleanModal();
    norma.modalTitle.text("Crear Norma");
    norma.btnUpdate.hide();
    norma.btnSave.show();
    $('#modalCrearNorma').modal('show');

});

//Eventos de limpieza
function cleanModal(){
  $('#form-normas')[0].reset();
  $(`#norma_method`).remove();
  //$('#modalCrearNorma a').hide();
  $('#form-normas input[name="nomfile"]').next().hide();
}

//-----------------------
$(document).on('click', '#btn-delete',function(event) {
    event.preventDefault();
    var formData = new FormData($('#form-eliminar')[0]);
    var ruta = "publicacion-delete";
    var accion = "eliminar";
    ajaxPost(ruta, formData, accion);
});

$('#cerrar-noticia').click(function(e){
	$('#modalCrearNorma').modal('hide');
});

norma.btnUpdate.on('click',function(event){
    event.preventDefault();
    lockWindow();
    cleanError();

    let _route, _formData;

    _formData = new FormData(norma.form[0]);
    _route = "norma/"+$('#form-normas input[name="id"]').val();

    //$('body').modalmanager('loading').find('.modal-scrollable').off('click.modalmanager');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name=_token]').val()
        }
    });
    $.ajax({
        url : _route,
        type: 'POST',
        data: _formData,
        contentType: false,
        processData: false,
        success: function(e){
            unlockWindow();
            Swal.fire(e.title, e.message, e.symbol);
            $postsTable.ajax.reload();
            $('#modalCrearNorma').modal('hide');
        },
        error:function(jqXHR, textStatus, errorThrown)
        {
            //$('body').modalmanager('removeLoading');
            unlockWindow();
            $('#modalCrearNorma').scrollTop(0);
            $.each(jqXHR.responseJSON.errors, function( key, value ) {
                    $.each(value, function( errores, eror ) {
                        $(`#norma-${key}-error`).append("<li class='error-block'>"+eror+"</li>");
                    });
            });
        }
     });

});

norma.btnSave.on('click',function(event){
    event.preventDefault();
    lockWindow();
    cleanError();
    let _route, _formData;
    _formData = new FormData(norma.form[0]);
    _route = "norma";
    //$('body').modalmanager('loading').find('.modal-scrollable').off('click.modalmanager');
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('input[name=_token]').val()
		}
	});
	$.ajax({
		url : _route,
		type: 'POST',
		data: _formData,
		contentType: false,
		processData: false,
		success: function(e){
			//$('body').modalmanager('removeLoading');
            Swal.fire(e.title, e.message, e.symbol);
            $postsTable.ajax.reload();
            $(`#modalCrearNorma`).modal('hide');
            unlockWindow();
		},
		error: function(jqXHR, textStatus, errorThrown)
		{
            unlockWindow();

            if(jqXHR.responseJSON.hasOwnProperty('errors')){
                $('#modalCrearNorma').scrollTop(0);
                $.each(jqXHR.responseJSON.errors, function( key, value ) {
                        $.each(value, function( errores, eror ) {
                            $(`#norma-${key}-error`).append("<li class='error-block'>"+eror+"</li>");
                        });
                });

                return;
            }

            Swal.fire(`Ha ocurrido un error`, `No se ha creado la norma. Puede ser debido a un error procesando el archivo. Inténtelo de nuevo.`, `warning`);



        }
	});
});
