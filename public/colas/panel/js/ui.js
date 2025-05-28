/**
 * Customer Queue System - UI Module
 * Handles UI updates and interactions
 */

// UI Elements
const elements = {
    // Customer info
    customerNumber: document.getElementById('customerNumber'),
    customerType: document.getElementById('customerType'),
    customerRut: document.getElementById('customerRut'),
    waitTime: document.getElementById('waitTime'),
    
    // Queue status
    currentPosition: document.getElementById('currentPosition'),
    totalQueue: document.getElementById('totalQueue'),
    
    // Action buttons
    callBtn: document.getElementById('callBtn'),
    endServiceBtn: document.getElementById('endServiceBtn'),
    skipBtn: document.getElementById('skipBtn'),
    callSkippedBtn: document.getElementById('callSkippedBtn'),
    transferBtn: document.getElementById('transferBtn'),
    
    // Navigation buttons
    pauseBtn: document.getElementById('pauseBtn'),
    viewQueueBtn: document.getElementById('viewQueueBtn'),
    viewReservationsBtn: document.getElementById('viewReservationsBtn'),
    chatBtn: document.getElementById('chatBtn'),
    
    // Modals
    transferModal: new bootstrap.Modal(document.getElementById('transferModal')),
    queueModal: new bootstrap.Modal(document.getElementById('queueModal')),
    
    // Modal elements
    serviceSelect: document.getElementById('serviceSelect'),
    transferNote: document.getElementById('transferNote'),
    confirmTransferBtn: document.getElementById('confirmTransferBtn'),
    queueTableBody: document.getElementById('queueTableBody'),
    
    // Audio
    callSound: document.getElementById('callSound')
  };
  
  // Global variables
  let waitTimeInterval;
  let isPaused = false;
  
  /**
   * Updates the current customer display
   * @param {Object} customer - The customer object
   */
  function updateCurrentCustomerDisplay(customer) {
    if (!customer) {
      elements.customerNumber.textContent = '--';
      elements.customerType.textContent = 'No hay clientes en espera';
      elements.customerRut.textContent = '-';
      elements.waitTime.textContent = '00:00:00';
      clearInterval(waitTimeInterval);
      return;
    }
    
    // Apply animation
    elements.customerNumber.classList.add('pulse');
    setTimeout(() => {
      elements.customerNumber.classList.remove('pulse');
    }, 500);
    
    // Update display
    elements.customerNumber.textContent = customer.code;
    elements.customerType.textContent = customer.type;
    elements.customerRut.textContent = customer.rut || '-';
    
    // Update wait time
    updateWaitTime(customer.arrivalTime);
    
    // Play sound
    playCallSound();
  }
  
  /**
   * Updates the wait time display and starts interval
   * @param {Date} startTime - The arrival time
   */
  function updateWaitTime(startTime) {
    // Clear any existing interval
    clearInterval(waitTimeInterval);
    
    // Update immediately
    elements.waitTime.textContent = window.queueDataService.formatWaitTime(startTime);
    
    // Set interval to update every second
    waitTimeInterval = setInterval(() => {
      elements.waitTime.textContent = window.queueDataService.formatWaitTime(startTime);
    }, 1000);
  }
  
  /**
   * Updates the queue status display
   */
  function updateQueueStatus() {
    const waitingCount = window.queueDataService.getWaitingCount();
    elements.currentPosition.textContent = waitingCount > 0 ? '1' : '0';
    elements.totalQueue.textContent = waitingCount.toString();
    
    // Update queue count on button
    const queueCountElement = elements.viewQueueBtn.querySelector('.queue-count');
    queueCountElement.textContent = waitingCount.toString();
  }
  
  /**
   * Plays the call sound
   */
  function playCallSound() {
    elements.callSound.currentTime = 0;
    elements.callSound.play().catch(error => {
      console.log('Audio play prevented by browser policy. User interaction needed first.');
    });
  }
  
  /**
   * Updates the queue table in the modal
   */
  function updateQueueTable(waitingCustomers = []) {
    const tbody = elements.queueTableBody;
    
    // Clear existing rows
    tbody.innerHTML = '';
    
    if (waitingCustomers.length === 0) {
      const row = document.createElement('tr');
      row.innerHTML = `
        <td colspan="4" class="text-center">No hay clientes en espera</td>
      `;
      tbody.appendChild(row);
      return;
    }
    
    // Add rows for each waiting customer
    waitingCustomers.forEach(customer => {
      const row = document.createElement('tr');
      row.innerHTML = `
        <td>${customer.code}</td>
        <td>${customer.type}</td>
        <td>${window.queueDataService.formatWaitTime(customer.arrivalTime)}</td>
        <td>
          <button class="btn btn-sm btn-primary call-now-btn" data-id="${customer.id}">
            Llamar ahora
          </button>
        </td>
      `;
      tbody.appendChild(row);
      
      // Add event listener
      const callNowBtn = row.querySelector('.call-now-btn');
      callNowBtn.addEventListener('click', () => {
        callSpecificCustomer(customer.id);
        elements.queueModal.hide();
      });
    });
  }
  
  /**
   * Updates the UI based on paused state
   */
  function updatePausedState() {
    if (isPaused) {
      elements.pauseBtn.innerHTML = '<i class="bi bi-play-fill"></i> Reanudar';
      elements.pauseBtn.classList.add('btn-warning');
      document.body.classList.add('system-paused');
    } else {
      elements.pauseBtn.innerHTML = '<i class="bi bi-pause-fill"></i> Pausar';
      elements.pauseBtn.classList.remove('btn-warning');
      document.body.classList.remove('system-paused');
    }
  }
  
  /**
   * Calls a specific customer by ID
   * @param {String} customerId - The ID of the customer to call
   */
  function callSpecificCustomer(customerId) {
    const waitingCustomers = window.queueDataService.getWaitingCustomers();
    const currentCustomer = window.queueDataService.getCurrentCustomer();
    
    // If there's already a customer being served, put them back in waiting
    if (currentCustomer) {
      currentCustomer.status = 'waiting';
    }
    
    // Find the customer by ID
    const customerToCall = waitingCustomers.find(c => c.id === customerId);
    if (customerToCall) {
      //update on server
      // fetch('/colasv2/call', {
      //   method: 'POST',
      //   headers: {
      //     'Content-Type': 'application/json'
      //   },
      //   body: JSON.stringify({
      //     customer_id: customerId
      //   })
      // })
      // .then(response => response.json())
      // .then(data => {
      //   console.log(data);
      // });
      //customerToCall.status = 'serving';
      updateCurrentCustomerDisplay(customerToCall);
      updateQueueStatus();
    }
  }
  
  // Initialize UI
  function initializeUI() {
    // Set initial customer
    const currentCustomer = window.queueDataService.getCurrentCustomer();
    updateCurrentCustomerDisplay(currentCustomer);
    
    // Set initial queue status
    updateQueueStatus();
    
    // Set up event listeners
    elements.callBtn.addEventListener('click', () => {
      const currentCustomer = window.queueDataService.getCurrentCustomer();
      if (currentCustomer) {
        playCallSound();
        elements.customerNumber.classList.add('pulse');
        setTimeout(() => {
          elements.customerNumber.classList.remove('pulse');
        }, 500);
      }
    });
    
    elements.endServiceBtn.addEventListener('click', () => {
      const nextCustomer = window.queueDataService.finishCurrentService();
      updateCurrentCustomerDisplay(nextCustomer);
      updateQueueStatus();
    });
    
    elements.skipBtn.addEventListener('click', () => {
      const nextCustomer = window.queueDataService.skipCurrentCustomer();
      updateCurrentCustomerDisplay(nextCustomer);
      updateQueueStatus();
    });
    
    elements.callSkippedBtn.addEventListener('click', () => {
      const skippedCustomers = window.queueDataService.getSkippedCustomers();
      
      if (skippedCustomers.length > 0) {
        // For simplicity, just call the first skipped customer
        const calledCustomer = window.queueDataService.callSkippedCustomer(skippedCustomers[0].id);
        updateCurrentCustomerDisplay(calledCustomer);
        updateQueueStatus();
      } else {
        alert('No hay clientes saltados para llamar');
      }
    });
    
    elements.transferBtn.addEventListener('click', () => {
      elements.transferModal.show();
    });
    
    elements.confirmTransferBtn.addEventListener('click', () => {
      const serviceId = elements.serviceSelect.value;
      const note = elements.transferNote.value;
      
      const nextCustomer = window.queueDataService.transferCurrentCustomer(serviceId, note);
      updateCurrentCustomerDisplay(nextCustomer);
      updateQueueStatus();
      
      // Reset and close modal
      elements.transferNote.value = '';
      elements.transferModal.hide();
    });
    
    elements.viewQueueBtn.addEventListener('click', () => {
      //updateQueueTable();
      elements.queueModal.show();
    });
    
    elements.pauseBtn.addEventListener('click', () => {
      isPaused = !isPaused;
      updatePausedState();
    });
    
    // Just show alert for demo purposes
    elements.viewReservationsBtn.addEventListener('click', () => {
      alert('Vista de reservas no implementada en esta demostración');
    });
    
    elements.chatBtn.addEventListener('click', () => {
      alert('Chat no implementado en esta demostración');
    });
  }
  
  // Export the UI module API
  window.queueUI = {
    initializeUI,
    updateCurrentCustomerDisplay,
    updateQueueStatus,
    playCallSound
  };