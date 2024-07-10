
function editor3(element, high) {
  element.summernote({
    height: high || 200,
    lang: 'es-ES',
    toolbar: [
      ['style', ['bold', 'italic', 'underline', 'clear']],
      ['fontsize', ['fontsize']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['insert', ['link', 'table']],
    ]
  });
}

const addSummernoteEditor = (element, high) => {
  element.summernote({
    dialogsInBody: true,
    height: high || 200,
    lang: 'es-ES',
    toolbar: [
      ['style', ['bold', 'italic', 'underline', 'clear','color']],
      ['fontsize', ['fontsize']],
      ['fontname', ['fontname']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['height', ['height']],
      ['insert', ['link', 'picture', 'video']],
      ['table', ['table']],

     /* ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
    ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],*/

     /* ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
      ['float', ['floatLeft', 'floatRight', 'floatNone']],
      ['remove', ['removeMedia']],*/

      ['view', ['fullscreen', 'codeview', 'help']],
      ['custom', ['examplePlugin']],
      
     
    ],
  });
};

const addSummernoteEditorMini = (element, high) => {
  element.summernote({
    dialogsInBody: true,
    height: high || 200,
    lang: 'es-ES',
    toolbar: [
      ['style', ['bold', 'italic', 'underline', 'clear','color']],
      ['fontsize', ['fontsize']],
      ['fontname', ['fontname']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['height', ['height']],
      ['insert', ['link']],
      ['table', ['table']],

     /* ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
    ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],*/

     /* ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
      ['float', ['floatLeft', 'floatRight', 'floatNone']],
      ['remove', ['removeMedia']],*/
     
    ],
  });
};

const addSummernoteEditorSuperMini = (element, high) => {
  element.summernote({
    //dialogsInBody: true,
    height: high || 200,
    lang: 'es-ES',
    toolbar: [
      ['style', ['bold', 'italic', 'underline', 'clear','color']],
      ['fontsize', ['fontsize']],
      ['fontname', ['fontname']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['height', ['height']],
      // ['insert', ['link']],
      // ['table', ['table']],

     /* ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
    ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],*/

     /* ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
      ['float', ['floatLeft', 'floatRight', 'floatNone']],
      ['remove', ['removeMedia']],*/
     
    ],
  });
};

const addSummernoteEditorTest = (element, high) => {
  element.summernote({
    dialogsInBody: true,
    height: high || 200,
    lang: 'es-ES',
    toolbar: [
      ['style', ['bold', 'italic', 'underline', 'clear','color']],
      ['fontsize', ['fontsize']],
      ['fontname', ['fontname']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['height', ['height']],
     
    ],
  });
};

const destroySummernote = (element) => element.summernote('destroy');



const get_element = (element) => {
  return document.querySelector(element);
};

const lockWindow = () => {
  $.blockUI({
    message: "<h1>Espere por favor...</h1>",
    css: {
      border: 'none',
      padding: '15px',
      backgroundColor: '#000',
      opacity: .5,
      color: '#fff',
      display: 'flex',
      top: 0,
      bottom: 0,
      left: 0,
      right: 0,
      'z-index': 1051,
      width: '100%',
      'justify-content': 'center',
      'align-items': 'center',
    }
  });
};

const unlockWindow = () => $.unblockUI();

const fillSelect = (selectElement, values, valueSelected, valueFirstOptionText) => {
  let _content = `<option value="">${valueFirstOptionText}</option>`;

  values.forEach(value => {
    _content += `<option value="${value.id}">${value.name}</option>`;
  });

  selectElement.innerHTML = _content;

  if (valueSelected != null) {
    selectElement.value = valueSelected;
  }
}

function clean_error() {
  $('.mensaje-error').empty();
  $('.titulo-error').empty();
}

const simbolPublished = (publishedVal) => {
  var data = {};
  if (publishedVal == 0) {
    data.simbol = 'glyphicon glyphicon-eye-open';
    data.name = 'Publicar';
    return data;
  }

  if (publishedVal == 1) {
    data.simbol = 'glyphicon glyphicon-eye-close';
    data.name = 'Dejar de publicar';
    return data;
  }
}

const statusPromotion = (promotionAvailabe) => {
  var data = {};
  if (promotionAvailabe == 1) {
    data.style = "";
    data.name = "Promocionado";
    return data;
  } else if (promotionAvailabe == 0) {
    data.style = "background-color: red;";
    data.name = "No promocionado";
    return data;
  }
}

const updatePublishedWithAxios = (route, data, title, successFunction, errorFunction) => {

  Swal.fire({
    title: title,
    text: `¿Está usted seguro?`,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: `Aceptar`,
    cancelButtonText: 'Cancelar',
  }).then((result) => {
    if (result.value) {
      lockWindow();
      axios.put(route, data)
        .then((response) => {
          unlockWindow();
          successFunction(response);
        })
        .catch((error) => {
          unlockWindow();
          errorFunction(error);
        });
    }
  })
}

const swalDeleteWithAxios = (route, data, title, successFunction, errorFunction) => {
  
  Swal.fire({
    title: title,
    text: `¿Está usted seguro?`,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: `Aceptar`,
    cancelButtonText: 'Cancelar',
  }).then((result) => {
    if (result.value) {
      lockWindow();
      axios.delete(route, data)
        .then((response) => {
          unlockWindow();
          successFunction(response);
        })
        .catch((error) => {
          unlockWindow();
          errorFunction(error);
        });
    }
  })
}

const swal_note = (title, content, type = 'success') => {
  Swal.fire(
    title,
    content,
    type,
  );
}
