const roleId = document.querySelector('input[name="role_id"]').value;

$(document).on('ready',function(){
	datatableConvocatorias("");

    $(`#form-convocatorias input[name="fecha"]`).datepicker({
        format: 'dd/mm/yyyy',
        language: 'es-ES',
    });

});

convocatoria.btnCancel.on('click', function(){
    $('#modalCrearConvocatoria').modal('hide');
});

function datatableConvocatorias()
{
    $postsTable = $('#convocatorias-datatable').DataTable({
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
        ajax: `/admin/convocatorias-datatable?role_id=${roleId}`,
        columns: [
            {data:'idnoti', name: 'idnoti', 'searchable': false},
            {data:'fecha', name: 'fecha', 'searchable': false},
            {data:'unidad', name: 'unidad', 'searchable': true},
            {data:'bases', name: 'bases', 'searchable': false},
            {data:'resultados', name: 'resultados', 'searchable': false},
            {data:'aptos', name: 'aptos', 'searchable': false},
            {data:'Image', 'searchable': false},
            {data:'published', 'searchable': false},
            {data:'Actions', 'searchable': false}
        ],
        "aoColumnDefs": [
            {
                "bVisible": false,
                 "aTargets": [0, 6]
            },
            {
                  "aTargets": [ 1 ],
                  "mData": "fecha",
                  "mRender": function ( data, type, full ) {
                      return full['Image'];
                  }
            },
            {
                  "aTargets": [ 3 ],
                  "mData": "bases",
                  "mRender": function ( data, type, full ) {
                      if (full['bases']) {
                        return `<a target="_blank" href="${full['bases']}">Bases</a>`;
                      }
                      return "";
                  }
            },
            {
                  "aTargets": [ 4 ],
                  "mData": "resultados",
                  "mRender": function ( data, type, full ) {
                      if (full['resultados']) {
                        return `<a target="_blank" href="${full['resultados']}">Resultados</a>`;
                      }
                      return "";
                  }
            },
            {
                  "aTargets": [ 5 ],
                  "mData": "aptos",
                  "mRender": function ( data, type, full ) {
                      if (full['aptos']) {
                        return `<a target="_blank" href="${full['aptos']}">Aptos</a>`;
                      }
                      return "";
                  }
            },
            {
                  "aTargets": [ 7 ],
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
    convocatoria.modalTitle.text("Editar Convocatoria");
    convocatoria.form.append('<input id="convocatoria_method" type="hidden" name="_method" value="PUT" />');

    convocatoria.btnSave.hide();
    convocatoria.btnUpdate.show();
    $(`#slide_photo`).hide();

    let _route = '/admin/convocatoria/'+_id;
    $.get(_route, function(p){
        const form = `#form-convocatorias`;
        document.querySelector(`${form} input[name="unidad"]`).value = p.unidad; 
        document.querySelector(`${form} input[name="referencia"]`).value = p.referencia; 
        document.querySelector(`${form} input[name="id"]`).value = p.idnoti; 
        document.querySelector(`${form} input[name="fecha"]`).value = p.fecha_formatted; 
        document.querySelector(`${form} select[name="published"]`).value = p.published;

        // if(p.bases){
        //     document.querySelector(`#slide_photo`).setAttribute('src', `/${p.img_slide}`);
        //     $(`#slide_photo`).show();
        // }

        $('#form-convocatorias input[name="resultados"]').next().hide();
        if(p.resultados){
            $('#form-convocatorias input[name="resultados"]').next().attr('href', p.resultados);
            $('#form-convocatorias input[name="resultados"]').next().show();
        }

        $('#form-convocatorias input[name="bases"]').next().hide();
        if(p.bases){
            $('#form-convocatorias input[name="bases"]').next().attr('href', p.bases);
            $('#form-convocatorias input[name="bases"]').next().show();
        }

        $('#form-convocatorias input[name="aptos"]').next().hide();
        if(p.aptos){
            $('#form-convocatorias input[name="aptos"]').next().attr('href', p.aptos);
            $('#form-convocatorias input[name="aptos"]').next().show();
        }


        $('#modalCrearConvocatoria').modal('show');
    });

}

//---------------------------------------------
//Eliminar
function Eliminar(btn){
    const idPost = btn.value;
    const noticiaTitle = $(btn).data('title');

  Swal.fire({
    title: `Eliminar Convocatoria`,
    showCancelButton: true,
    confirmButtonText: `Confirmar`,
    cancelButtonText: `Cancelar`,
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.value) {
      const url = `/admin/convocatoria/${idPost}`;
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

//--------------------------------------------
$('#btnCrearpublicacion').on('click', function(){
    cleanError();
    cleanModal();
    //convocatoria.tabImageconvocatoria.addClass('disabledElementWithOutColor');
    //$('#content-post').summernote({});
    convocatoria.modalTitle.text("Crear Convocatoria");
    convocatoria.btnUpdate.hide();
    convocatoria.btnSave.show();
    $('#modalCrearConvocatoria').modal('show');

});

//Eventos de limpieza
function cleanModal(){
  $('#form-convocatorias')[0].reset();
  $(`#convocatoria_method`).remove();
  $('#modalCrearConvocatoria a').hide();
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
	$('#modalCrearConvocatoria').modal('hide');
});

convocatoria.btnUpdate.on('click',function(event){
    event.preventDefault();
    lockWindow();
    cleanError();

    let _route, _formData;

    _formData = new FormData(convocatoria.form[0]);
    _route = "convocatoria/"+$('#form-convocatorias input[name="id"]').val();

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
            $('#modalCrearConvocatoria').modal('hide');
        },
        error:function(jqXHR, textStatus, errorThrown)
        {
            //$('body').modalmanager('removeLoading');
            unlockWindow();
            $('#modalCrearConvocatoria').scrollTop(0);
            $.each(jqXHR.responseJSON.errors, function( key, value ) {
                    $.each(value, function( errores, eror ) {
                        $(`#convocatoria-${key}-error`).append("<li class='error-block'>"+eror+"</li>");
                    });
            });
        }
     });

});

convocatoria.btnSave.on('click',function(event){
    event.preventDefault();
    lockWindow();
    cleanError();
    let _route, _formData;
    _formData = new FormData(convocatoria.form[0]);
    _route = "convocatoria";
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
            $(`#modalCrearConvocatoria`).modal('hide');
            unlockWindow();
		},
		error: function(jqXHR, textStatus, errorThrown)
		{
            unlockWindow();
            $('#modalCrearConvocatoria').scrollTop(0);
            $.each(jqXHR.responseJSON.errors, function( key, value ) {
                    $.each(value, function( errores, eror ) {
                        $(`#convocatoria-${key}-error`).append("<li class='error-block'>"+eror+"</li>");
                    });
            });
        }
	});
});
