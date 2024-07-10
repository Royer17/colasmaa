@extends('layouts.app')

@section('content')
<section class="page-banner">
    <div class="image-layer" style="background-image:url({{ asset('assets/img/bgs/banner-img-1.jpg') }})"></div>
    <div class="banner-inner">
        <div class="container-lg">
            <div class="inner-container clearfix">
                <h1>Agenda</h1>
                <div class="page-nav">
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ route('pages.home') }}">Inicio</a></li>
                        <!-- <li><a href="">Distrito</a></li> -->
                        <li class="active">Agenda</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="default-section">
    <div class="container-lg">



        <div class="row as">
        <!-- contenido -->

        </div>

        <div class="parrafodf">
            <div id='calendar'></div>

        </div>
    </div>
</section>

<div id="modal-schedule" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="description">Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.js"></script>

    <script type="text/javascript">

        $("#modal-schedule").prependTo("body");

        const today = new Date();
        const yyyy = today.getFullYear();
        let mm = today.getMonth() + 1; // Months start at 0!
        let dd = today.getDate();

        if (dd < 10) dd = '0' + dd;
        if (mm < 10) mm = '0' + mm;

        const currentDate = `${yyyy}-${mm}-${dd}`;

        document.addEventListener('DOMContentLoaded', function() {
          var calendarEl = document.getElementById('calendar');

          var calendar = new FullCalendar.Calendar(calendarEl, {
            eventClick: function(info) {
              var eventObj = info.event;

              console.log(eventObj.extendedProps.description);

              document.querySelector('#modal-schedule .title').textContent = eventObj.title;

              document.querySelector('#modal-schedule .description').innerHTML = ``;

              document.querySelector('#modal-schedule .description').innerHTML = eventObj.extendedProps.description;

              $('#modal-schedule').modal('show');
              // if (eventObj.url) {
              //   alert(
              //     'Clicked ' + eventObj.title + '.\n' +
              //     'Will open ' + eventObj.description + ' in a new tab'
              //   );

              //   window.open(eventObj.url);

              //   info.jsEvent.preventDefault(); // prevents browser from following link in current tab.
              // } else {
              //   alert('Clicked ' + eventObj.title);
              // }
            },
            initialDate: currentDate,
            locale: 'es',
            events: `/api/events`
            // events: [
            //   {
            //     title: 'simple event',
            //     start: '2023-05-02'
            //   },
            //   {
            //     title: 'event with URL',
            //     url: 'https://www.google.com/',
            //     start: '2023-05-03'
            //   }
            // ]
          });

          calendar.render();
        });

        // document.addEventListener('DOMContentLoaded', function() {
        //   var calendarEl = document.getElementById('calendar');

        //   var calendar = new FullCalendar.Calendar(calendarEl, {
        //     timeZone: 'UTC',
        //     initialView: 'dayGridMonth',
        //     events: 'https://fullcalendar.io/api/demo-feeds/events.json',
        //     editable: true,
        //     selectable: true
        //   });

        //   calendar.render();
        // });

    </script>



@endsection