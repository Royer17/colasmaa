@extends('layouts.app')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href='https://unpkg.com/@fullcalendar/core@5.10.1/main.min.css' rel='stylesheet' />
  <link href='https://unpkg.com/@fullcalendar/daygrid@5.10.1/main.min.css' rel='stylesheet' />
  <script src='https://unpkg.com/@fullcalendar/core@5.10.1/main.min.js'></script>
  <script src='https://unpkg.com/@fullcalendar/daygrid@5.10.1/main.min.js'></script>
  <script src='https://unpkg.com/@fullcalendar/interaction@5.10.1/main.min.js'></script>
  <script src='https://unpkg.com/@fullcalendar/timegrid@5.10.1/main.min.js'></script>
  <script src='https://unpkg.com/@fullcalendar/list@5.10.1/main.min.js'></script>
  <script src='https://unpkg.com/@fullcalendar/core@5.10.1/locales/es.js'></script>

<section id="vision">
    <div
      class="flex items-center px-10 md:px-20 bg-dark-blue w-full h-16 md:h-20 text-white"
    >
      <h1 class="text-sm md:text-3xl uppercase">Agenda</h1>
    
      
    </div>
    <div class="bg-[#E9E9E9]">
      <div
        class="flex flex-col md:flex-row gap-4 px-3 md:px-20 py-2 md:py-10"
      >
        <div class="flex-1 bg-white shadow-md rounded-2xl h-fit p-4 md:p-6">
          <div id="calendar" class="max-w-4xl mx-auto mt-10"></div>
        </div>

        <!-- Modal -->
        <div id="modal-schedule" class="fixed inset-0 flex items-center justify-center z-50 hidden" role="dialog">
          <div class="bg-white rounded-lg shadow-lg max-w-lg w-full">
            <div class="flex justify-between items-center p-4 border-b border-gray-200">
              <h5 class="text-lg font-medium title">Título del Modal</h5>
              <button type="button" class="text-gray-400 hover:text-gray-500" id="close-modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="p-4">
              <p class="description">El texto del cuerpo del modal va aquí.</p>
            </div>
            <div class="flex justify-end p-4 border-t border-gray-200">
              <button type="button" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded" id="close-modal-footer">
                Cerrar
              </button>
            </div>
          </div>
        </div>
        



@include('shared.information')
@endsection




@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.js"></script>

    <script type="text/javascript">
      document.addEventListener('DOMContentLoaded', function() {
        const today = new Date();
        const yyyy = today.getFullYear();
        let mm = today.getMonth() + 1;
        let dd = today.getDate();
  
        if (dd < 10) dd = '0' + dd;
        if (mm < 10) mm = '0' + mm;
  
        const currentDate = `${yyyy}-${mm}-${dd}`;
  
        const modal = document.getElementById('modal-schedule');
        const closeModalButtons = document.querySelectorAll('#close-modal, #close-modal-footer');
  
        // Función para abrir el modal
        function openModal() {
          modal.classList.remove('hidden');
        }
  
        // Función para cerrar el modal
        function closeModal() {
          modal.classList.add('hidden');
        }
  
        // Añadir evento de cierre a los botones de cierre del modal
        closeModalButtons.forEach(button => {
          button.addEventListener('click', closeModal);
        });
  
        const calendarEl = document.getElementById('calendar');
        const calendar = new FullCalendar.Calendar(calendarEl, {
          eventClick: function(info) {
            const eventObj = info.event;
  
            console.log(eventObj.extendedProps.description);
  
            document.querySelector('#modal-schedule .title').textContent = eventObj.title;
            document.querySelector('#modal-schedule .description').innerHTML = eventObj.extendedProps.description;
  
            openModal();
          },
          initialDate: currentDate,
          locale: 'es',
          events: '/api/events'
        });
  
        calendar.render();
      });
    </script>



@endsection