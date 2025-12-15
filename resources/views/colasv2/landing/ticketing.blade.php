<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Generación de Turnos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
  <style>
    :root {
      --primary-blue: #0066cc;
      --secondary-blue: #003366;
      --turquoise: #40E0D0;
      --light-turquoise: #7FFFD4;
    }

    body {
      min-height: 100vh;
      background: linear-gradient(135deg, var(--primary-blue), var(--turquoise));
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
    }

    .company-header {
      position: fixed;
      top: 2rem;
      left: 2rem;
      display: flex;
      align-items: center;
      gap: 1rem;
    }

    .company-logo {
      width: 60px;
      height: 60px;
      background-color: white;
      border-radius: 12px;
      padding: 8px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .company-name {
      color: white;
      font-size: 1.8rem;
      font-weight: 600;
      margin: 0;
      text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .main-container {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 2rem;
    }

    .buttons-container {
      display: flex;
      flex-direction: column;
      gap: 1.5rem;
      max-width: 400px;
      width: 100%;
    }

    .service-btn {
      padding: 1.5rem;
      font-size: 1.2rem;
      font-weight: 500;
      text-align: left;
      border: none;
      border-radius: 12px;
      background: white;
      color: var(--secondary-blue);
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      justify-content: space-between;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .service-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
      background: var(--light-turquoise);
    }

    .service-btn i {
      font-size: 1.5rem;
      color: var(--turquoise);
    }

    .developer-info {
      position: fixed;
      bottom: 1rem;
      right: 1rem;
      color: rgba(255, 255, 255, 0.8);
      font-size: 1.2rem;
    }

    /* Ticket Modal Styles */
    .modal-content {
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .ticket-number {
      font-size: 4rem;
      font-weight: bold;
      color: var(--primary-blue);
      text-align: center;
      margin: 1rem 0;
    }

    .ticket-info {
      text-align: center;
      color: #666;
    }

    @media (max-width: 768px) {
      .company-header {
        position: relative;
        top: 0;
        left: 0;
        justify-content: center;
        margin-bottom: 2rem;
      }

      .buttons-container {
        padding: 1rem;
      }

      .service-btn {
        padding: 1.2rem;
        font-size: 1.1rem;
      }
    }
  </style>
</head>
<body>
  <div class="company-header">
    <!-- <img src="https://images.pexels.com/photos/3756679/pexels-photo-3756679.jpeg?auto=compress&cs=tinysrgb&w=60" alt="Logo" class="company-logo"> -->
    <img src="/colas/images/muni.png" alt="Logo" class="company-logo" style="width: 70px !important;">
    <h1 class="company-name">Municipalidad Distrital Alto de la Alianza</h1>
  </div>

  <div class="main-container">
    <div class="buttons-container">

      @foreach($offices as $office)
      <button class="service-btn" onclick="generateTicket('{{$office->id}}')">
        {{ucfirst(strtolower($office->name))}}
        {!! $office->icon !!}
      </button>
      @endforeach

      {{-- 
      <button class="service-btn" onclick="generateTicket('ATG')">
        Atención General
        <i class="bi bi-people-fill"></i>
      </button>
      
      <button class="service-btn" onclick="generateTicket('ATP')">
        Atención Prioritaria
        <i class="bi bi-heart-fill"></i>
      </button>
      
      <button class="service-btn" onclick="generateTicket('CAJ')">
        Caja de Pagos
        <i class="bi bi-cash"></i>
      </button>
      --}}
      
      {{--
      <button class="service-btn" onclick="generateTicket('SES')">
        Servicios Especiales
        <i class="bi bi-star-fill"></i>
      </button>
      --}}
    </div>
  </div>

  <div class="developer-info">
    Sistema de colas v2 © 2025
  </div>


  <!-- Ticket Modal -->
  <div class="modal fade" id="ticketModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body p-4">
          <div class="ticket-number" id="ticketNumber"></div>
          <div class="ticket-info">
            <p class="mb-1">Por favor, espere a ser llamado</p>
            <p class="mb-0" id="estimatedTime">Muchas gracias por sacar su ticket</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Print Sound -->
  <audio id="printSound" src="https://assets.mixkit.co/active_storage/sfx/2432/2432-preview.mp3"></audio>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    let ticketCounts = {
      'ATG': 0,
      'ATP': 0,
      'CAJ': 0,
      'SES': 0
    };

    function generateTicket(type) {

        fetch('/colasv2', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ type })
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById('ticketNumber').textContent = data.ticketNumber;
            // document.getElementById('estimatedTime').textContent = 
            //     `Tiempo estimado de espera: ${data.estimatedTime} minutos`;
            const ticketModal = new bootstrap.Modal(document.getElementById('ticketModal'));
            ticketModal.show();
            document.getElementById('printSound').play().catch(error => {
                console.log('Audio play prevented by browser policy. User interaction needed first.');
            });

            setTimeout(() => {
                ticketModal.hide();
            }, 3000);
        })
        .catch(error => {
            console.error('Error generating ticket:', error);
        });

    //   ticketCounts[type]++;
      
    //   const prefixes = {
    //     'ATG': 'R',
    //     'ATP': 'P',
    //     'CAJ': 'C',
    //     'SES': 'S'
    //   };
      
    //   const ticketNumber = `${prefixes[type]}${String(ticketCounts[type]).padStart(2, '0')}`;
      
    //   // Update modal content
    //   document.getElementById('ticketNumber').textContent = ticketNumber;
    //   document.getElementById('estimatedTime').textContent = 
    //     `Tiempo estimado de espera: ${Math.floor(Math.random() * 15) + 5} minutos`;
      
    //   // Show modal
    //   const ticketModal = new bootstrap.Modal(document.getElementById('ticketModal'));
    //   ticketModal.show();
      
    //   // Play print sound
    //   document.getElementById('printSound').play().catch(error => {
    //     console.log('Audio play prevented by browser policy. User interaction needed first.');
    //   });
      
      // Auto close modal after 3 seconds
    }
  </script>
</body>
</html>