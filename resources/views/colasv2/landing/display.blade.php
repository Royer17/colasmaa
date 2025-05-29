<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Monitor de Llamados</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
  <!-- <link rel="stylesheet" href="/colas/panel/css/styles.css"> -->
  <style>
    .monitor-container {
      height: 100vh;
      display: flex;
      flex-direction: column;
      background: linear-gradient(to bottom, #1a3a5f, #0066cc);
      overflow: hidden;
    }

    .video-section {
      height: 50vh;
      background: #000;
      position: relative;
    }

    .video-container {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .tickets-section {
      flex: 1;
      padding: 2rem;
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      grid-template-rows: repeat(2, 1fr);
      gap: 1.5rem;
      background: rgba(255, 255, 255, 0.1);
    }

    .ticket-card {
      background: #2c3e50;
      border-radius: 0.5rem;
      padding: 1.5rem;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
      transition: all 0.3s ease;
      aspect-ratio: 2/1;
    }

    .ticket-card.active {
      background: #e74c3c;
      animation: highlight 2s infinite;
    }

    .ticket-number {
      font-size: 3rem;
      font-weight: bold;
      color: white;
      margin-bottom: 0.5rem;
    }

    .ticket-desk {
      font-size: 1.5rem;
      color: rgba(255, 255, 255, 0.9);
      font-weight: 500;
    }

    @keyframes highlight {
      0% { transform: scale(1); }
      50% { transform: scale(1.05); }
      100% { transform: scale(1); }
    }

    .date-time {
      position: absolute;
      top: 1rem;
      right: 1rem;
      color: white;
      font-size: 1.2rem;
      text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
      z-index: 10;
    }
  </style>
</head>
<body>
  <div class="monitor-container">
    <div class="video-section">
    @if($videos)
        @foreach($videos as $key => $video)
            <input type="hidden" name="" id="video-to-play{{ $key + 1 }}" class="videos-to-play" value="{{ $video->foto }}">
        @endforeach
    @endif

      <div class="date-time" id="dateTime"></div>
      <video class="video-container" muted>
        <source src="" id="mp4Source" type="video/mp4">
      </video>
    </div>
    
    <div class="tickets-section" id="ticketsContainer">
      <!-- Tickets will be populated by JavaScript -->
    </div>
  </div>

  <!-- Sound for notifications -->
  <audio id="callSound" src="https://assets.mixkit.co/active_storage/sfx/933/933-preview.mp3"></audio>

  <script>
    // Sample tickets data
    const tickets = [
      { number: 'P18', desk: 'Módulo 04', active: true },
      { number: 'R45', desk: 'Módulo 02', active: false },
      { number: 'V03', desk: 'Módulo 01', active: false },
      { number: 'C31', desk: 'Módulo 03', active: false },
      { number: 'P20', desk: 'Módulo 05', active: false },
      { number: 'R46', desk: 'Módulo 06', active: false },
      { number: 'V04', desk: 'Módulo 07', active: false },
      { number: 'C32', desk: 'Módulo 08', active: false }
    ];

    function updateTickets() {
      const container = document.getElementById('ticketsContainer');
      container.innerHTML = '';

      tickets.forEach(ticket => {
        const card = document.createElement('div');
        card.className = `ticket-card ${ticket.active ? 'active' : ''}`;
        
        card.innerHTML = `
          <div class="ticket-number">${ticket.number}</div>
          <div class="ticket-desk">${ticket.desk}</div>
        `;

        container.appendChild(card);
      });
    }

    function updateDateTime() {
      const dateTimeElement = document.getElementById('dateTime');
      const now = new Date();
      const options = { 
        weekday: 'long', 
        year: 'numeric', 
        month: 'long', 
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit'
      };
      dateTimeElement.textContent = now.toLocaleDateString('es-ES', options);
    }

    // Initial updates
    updateTickets();
    updateDateTime();

    // Update date/time every second
    setInterval(updateDateTime, 1000);

    // Simulate new tickets every 5 seconds
    setInterval(() => {
      // Move active status to next ticket
      const currentActiveIndex = tickets.findIndex(t => t.active);
      tickets[currentActiveIndex].active = false;
      const nextActiveIndex = (currentActiveIndex + 1) % tickets.length;
      tickets[nextActiveIndex].active = true;

      // Play sound
      document.getElementById('callSound').play().catch(error => {
        console.log('Audio play prevented by browser policy. User interaction needed first.');
      });

      updateTickets();
    }, 5000);

    //video functions
    var count=0;
    var player=document.querySelector('.video-container');
    var mp4Vid = document.getElementById('mp4Source');
    player.addEventListener('ended',myHandler,false);

    let videos = document.querySelectorAll('.videos-to-play');
    let quantityOfVideos = videos.length;

    console.log(quantityOfVideos);
    function myHandler(e)
    {

      if(!e) 
      {
        e = window.event; 
      }
      count++;

      if (count > quantityOfVideos) {
        count = 1;
      }
      console.log(document.querySelector(`#video-to-play${count}`).value);
      //$(mp4Vid).attr('src', document.querySelector(`#video-to-play${count}`).value);
      mp4Vid.src = document.querySelector(`#video-to-play${count}`).value;
      player.load();
      player.play();
    }

    myHandler();

  </script>
</body>
</html>