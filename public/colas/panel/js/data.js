/**
 * Customer Queue System - Data Module
 * Handles data structures and state management
 */

// Customer types
const CUSTOMER_TYPES = {
    REGULAR: 'Regular',
    PREFERENTIAL: 'Preferencial',
    VIP: 'VIP',
    CORPORATE: 'Corporativo'
  };
  
  // Service types
  const SERVICE_TYPES = {
    GENERAL: 'Atención General',
    PRIORITY: 'Atención Prioritaria',
    CASHIER: 'Caja de Pagos',
    SPECIAL: 'Servicios Especiales'
  };
  
  // Mock queue data
  // let queueData = [
  //   {
  //     id: 'P18',
  //     code: 'P18',
  //     type: CUSTOMER_TYPES.PREFERENTIAL,
  //     arrivalTime: Date.now() - 3 * 60 * 1000,
  //     rut: '-',
  //     status: 'serving'
  //   },
  //   {
  //     id: 'C31',
  //     code: 'C31',
  //     type: CUSTOMER_TYPES.CORPORATE,
  //     arrivalTime: Date.now() - 15 * 60 * 1000,
  //     rut: '12.345.678-9',
  //     status: 'waiting'
  //   },
  //   {
  //     id: 'R44',
  //     code: 'R44',
  //     type: CUSTOMER_TYPES.REGULAR,
  //     arrivalTime: Date.now() - 22 * 60 * 1000,
  //     rut: '98.765.432-1',
  //     status: 'waiting'
  //   },
  //   {
  //     id: 'P20',
  //     code: 'P20',
  //     type: CUSTOMER_TYPES.PREFERENTIAL,
  //     arrivalTime: Date.now() - 10 * 60 * 1000,
  //     rut: '45.678.901-2',
  //     status: 'waiting'
  //   },
  //   {
  //     id: 'V03',
  //     code: 'V03',
  //     type: CUSTOMER_TYPES.VIP,
  //     arrivalTime: Date.now() - 5 * 60 * 1000,
  //     rut: '34.567.890-3',
  //     status: 'waiting'
  //   },
  //   {
  //     id: 'R45',
  //     code: 'R45',
  //     type: CUSTOMER_TYPES.REGULAR,
  //     arrivalTime: Date.now() - 25 * 60 * 1000,
  //     rut: '-',
  //     status: 'waiting'
  //   }
  // ];

  let queueData = [];
  
  // Skipped customers
  let skippedCustomers = [];
  
  // Agent data
  const agentData = {
    id: '04',
    name: 'Asistente Principal',
    status: 'active',
    currentCustomer: 'P18'
  };
  
  // Service history
  let serviceHistory = [];
  
  /**
   * Gets the current customer being served
   * @returns {Object} The current customer object
   */
  function getCurrentCustomer() {
    return null;
    //return queueData.find(customer => customer.status === 'serving') || null;
  }
  
  /**
   * Gets customers waiting in the queue
   * @returns {Array} Array of waiting customers
   */
  function getWaitingCustomers() {
    return queueData;
  }
  
  /**
   * Gets skipped customers
   * @returns {Array} Array of skipped customers
   */
  function getSkippedCustomers() {
    return skippedCustomers;
  }
  
  /**
   * Gets the total count of waiting customers
   * @returns {Number} Number of waiting customers
   */
  function getWaitingCount() {
    return getWaitingCustomers().length;
  }
  
  /**
   * Formats a date to display the wait time (MM:SS or HH:MM:SS)
   * @param {Date} startTime - The start time to calculate from
   * @returns {String} Formatted time string
   */
  function formatWaitTime(startTime) {

    startTime = new Date(startTime);

    if (!startTime) return '00:00:00';
    
    const now = new Date();
    const diffMs = now - startTime;
    
    const hours = Math.floor(diffMs / (1000 * 60 * 60));
    const minutes = Math.floor((diffMs % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((diffMs % (1000 * 60)) / 1000);
    
    const formattedHours = hours.toString().padStart(2, '0');
    const formattedMinutes = minutes.toString().padStart(2, '0');
    const formattedSeconds = seconds.toString().padStart(2, '0');
    
    return hours > 0 
      ? `${formattedHours}:${formattedMinutes}:${formattedSeconds}`
      : `${formattedMinutes}:${formattedSeconds}`;
  }
  
  /**
   * Finishes service for the current customer
   * @returns {Object|null} The next customer or null if queue is empty
   */
  function finishCurrentService() {
    const currentCustomer = getCurrentCustomer();
    
    if (currentCustomer) {
      // Add to history
      serviceHistory.push({
        ...currentCustomer,
        endTime: new Date(),
        serviceDuration: new Date() - currentCustomer.arrivalTime
      });
      
      // Remove from queue
      queueData = queueData.filter(customer => customer.id !== currentCustomer.id);
      
      // Get next customer and set to serving
      return callNextCustomer();
    }
    
    return null;
  }
  
  /**
   * Calls the next customer in line
   * @returns {Object|null} The next customer or null if queue is empty
   */
  function callNextCustomer() {
    const waitingCustomers = getWaitingCustomers();
    
    if (waitingCustomers.length > 0) {
      // Sort by priority and arrival time
      waitingCustomers.sort((a, b) => {
        // VIP first, then Preferential, then Corporate, then Regular
        const priorityOrder = {
          [CUSTOMER_TYPES.VIP]: 0,
          [CUSTOMER_TYPES.PREFERENTIAL]: 1,
          [CUSTOMER_TYPES.CORPORATE]: 2,
          [CUSTOMER_TYPES.REGULAR]: 3
        };
        
        const priorityDiff = priorityOrder[a.type] - priorityOrder[b.type];
        
        // If same priority, sort by arrival time
        if (priorityDiff === 0) {
          return a.arrivalTime - b.arrivalTime;
        }
        
        return priorityDiff;
      });
      
      const nextCustomer = waitingCustomers[0];
      nextCustomer.status = 'serving';
      
      return nextCustomer;
    }
    
    return null;
  }
  
  /**
   * Skips the current customer
   * @returns {Object|null} The next customer or null if queue is empty
   */
  function skipCurrentCustomer() {
    const currentCustomer = getCurrentCustomer();
    
    if (currentCustomer) {
      currentCustomer.status = 'skipped';
      currentCustomer.skipTime = new Date();
      
      // Move to skipped list
      skippedCustomers.push(currentCustomer);
      
      // Remove from active queue
      queueData = queueData.filter(customer => customer.id !== currentCustomer.id);
      
      // Get next customer
      return callNextCustomer();
    }
    
    return null;
  }
  
  /**
   * Calls a skipped customer back to service
   * @param {String} customerId - The ID of the skipped customer to call
   * @returns {Object|null} The called customer or null if not found
   */
  function callSkippedCustomer(customerId) {
    const skippedIndex = skippedCustomers.findIndex(c => c.id === customerId);
    
    if (skippedIndex >= 0) {
      // Move current customer to waiting if there is one
      const currentCustomer = getCurrentCustomer();
      if (currentCustomer) {
        currentCustomer.status = 'waiting';
      }
      
      // Get the skipped customer
      const skippedCustomer = skippedCustomers[skippedIndex];
      
      // Update their status and add back to main queue
      skippedCustomer.status = 'serving';
      queueData.push(skippedCustomer);
      
      // Remove from skipped list
      skippedCustomers.splice(skippedIndex, 1);
      
      return skippedCustomer;
    }
    
    return null;
  }
  
  /**
   * Transfers the current customer to another service
   * @param {String} serviceId - The ID of the service to transfer to
   * @param {String} note - Optional note about the transfer
   * @returns {Object|null} The next customer or null if queue is empty
   */
  function transferCurrentCustomer(serviceId, note = '') {
    const currentCustomer = getCurrentCustomer();
    
    if (currentCustomer) {
      // Record the transfer
      serviceHistory.push({
        ...currentCustomer,
        endTime: new Date(),
        transferredTo: serviceId,
        transferNote: note,
        serviceDuration: new Date() - currentCustomer.arrivalTime
      });
      
      // Remove from queue
      queueData = queueData.filter(customer => customer.id !== currentCustomer.id);
      
      // Get next customer
      return callNextCustomer();
    }
    
    return null;
  }
  
  // Export the data module API
  window.queueDataService = {
    getCurrentCustomer,
    getWaitingCustomers,
    getSkippedCustomers,
    getWaitingCount,
    formatWaitTime,
    finishCurrentService,
    callNextCustomer,
    skipCurrentCustomer,
    callSkippedCustomer,
    transferCurrentCustomer,
    CUSTOMER_TYPES,
    SERVICE_TYPES
  };