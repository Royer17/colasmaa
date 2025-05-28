<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistema de Colas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="/colas/panel/css/styles.css">
</head>
<body>
  <div class="container-fluid p-0">
    <!-- Header Bar -->
    <header class="header-bar">
      <div class="d-flex justify-content-between align-items-center">
        <button class="btn pause-btn" id="pauseBtn">
          <i class="bi bi-pause-fill"></i> Pausar
        </button>
        <h1 class="system-title">{{ $office_name }}</h1>
        <div class="agent-info">
          <span class="ticket-number">04</span>
          <span class="agent-name text-capitalize">{{ strtolower($user_name) }}</span>
          <button class="btn-close text-white" aria-label="Close"></button>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="row g-0 main-content">
      <!-- Left Panel - Current Customer -->
      <div class="col-lg-6 current-customer-panel">
        <div class="current-customer-card">
          <div class="serving-label">Atendiendo a</div>
          <div class="customer-number" id="customerNumber">P18</div>
          <div class="customer-type" id="customerType">Preferencial</div>
          
          <div class="customer-info mt-4">
            <div class="info-row">
              <div class="info-label">
                <i class="bi bi-person-vcard"></i> Rut:
              </div>
              <div class="info-value" id="customerRut">-</div>
            </div>
            
            <div class="info-row">
              <div class="info-label">
                <i class="bi bi-clock"></i> Espera:
              </div>
              <div class="info-value" id="waitTime">00:02:59</div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Right Panel - Actions -->
      <div class="col-lg-6 actions-panel">
        <!-- Queue Status -->
        <div class="queue-status">
          <span id="currentPosition">0</span> / <span id="totalQueue">2</span>
          <button class="call-btn" id="callBtn">
            Rellamar <i class="bi bi-volume-up"></i>
          </button>
        </div>
        
        <!-- Action Buttons -->
        <div class="action-buttons">
          <button class="action-btn end-btn" id="endServiceBtn">
            Terminar atención <i class="bi bi-x-lg"></i>
          </button>
          
          <button class="action-btn skip-btn" id="skipBtn">
            Saltar número <i class="bi bi-trash"></i>
          </button>
          
          <button class="action-btn call-skipped-btn" id="callSkippedBtn">
            Llamar Saltado <i class="bi bi-pencil-square"></i>
          </button>
          
          <button class="action-btn transfer-btn" id="transferBtn">
            Derivar Número <i class="bi bi-arrow-right"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Footer Bar -->
    <footer class="footer-bar">
      <div class="d-flex justify-content-between">
        <button class="footer-btn view-queue-btn" id="viewQueueBtn">
          <i class="bi bi-people-fill"></i> Ver en fila <span class="queue-count">0</span>
        </button>
        
        <button class="footer-btn view-reservations-btn" id="viewReservationsBtn">
          <i class="bi bi-calendar-check"></i> Ver Reservas
        </button>
        
        <button class="footer-btn chat-btn" id="chatBtn">
          <i class="bi bi-chat-dots-fill"></i> Chat
        </button>
      </div>
    </footer>
  </div>

  <!-- Modals -->
  <div class="modal fade" id="transferModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Derivar a otro servicio</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="serviceSelect" class="form-label">Seleccionar servicio:</label>
            <select class="form-select" id="serviceSelect">
              <option value="1">Atención General</option>
              <option value="2">Atención Prioritaria</option>
              <option value="3">Caja de Pagos</option>
              <option value="4">Servicios Especiales</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="transferNote" class="form-label">Nota (opcional):</label>
            <textarea class="form-control" id="transferNote" rows="3"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary" id="confirmTransferBtn">Confirmar</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="queueModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Clientes en espera</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Número</th>
                  <th>Tipo</th>
                  <th>Tiempo de espera</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody id="queueTableBody">
                <!-- Will be populated by JavaScript -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Sound for notifications -->
  <audio id="callSound" src="https://assets.mixkit.co/active_storage/sfx/933/933-preview.mp3"></audio>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/colas/panel/js/data.js"></script>
  <script src="/colas/panel/js/ui.js"></script>
  <script src="/colas/panel/js/queue.js"></script>


  <script>
    setInterval(() => {

        fetch('/colasv2/enespera')
            .then(response => response.json())
            .then(data => {
                //console.log(data);
                queueData = data.tickets_waiting;
                document.querySelector('.queue-count').textContent = data.tickets_waiting.length;
                updateQueueTable(data.tickets_waiting);
            });
        //console.log('hola');
    }, 5000);

  </script>
</body>
</html>