/**
 * Customer Queue System - Main Module
 * Initializes the application and connects modules
 */

// Wait for DOM to be fully loaded
document.addEventListener('DOMContentLoaded', () => {
  console.log('Queue Management System Initialized');

  // Initialize the UI
  window.queueUI.initializeUI();

  // Add some demo functionality
  setupDemoFunctionality();
});

/**
 * Sets up demo functionality for the queue system
 */
function setupDemoFunctionality() {
  // Simulate new customers arriving every 30-60 seconds
  setInterval(() => {
    // Only add new customers if there are fewer than 10 in the queue
    const waitingCount = window.queueDataService.getWaitingCount();

    if (waitingCount < 10) {
      addRandomCustomer();
    }
  }, getRandomInt(30000, 60000));
}

/**
 * Adds a random customer to the queue
 */
function addRandomCustomer() {
  // Generate a random customer type
  const customerTypes = Object.values(window.queueDataService.CUSTOMER_TYPES);
  const randomType = customerTypes[Math.floor(Math.random() * customerTypes.length)];

  // Generate a prefix based on type
  let prefix;
  switch (randomType) {
    case window.queueDataService.CUSTOMER_TYPES.REGULAR:
      prefix = 'R';
      break;
    case window.queueDataService.CUSTOMER_TYPES.PREFERENTIAL:
      prefix = 'P';
      break;
    case window.queueDataService.CUSTOMER_TYPES.VIP:
      prefix = 'V';
      break;
    case window.queueDataService.CUSTOMER_TYPES.CORPORATE:
      prefix = 'C';
      break;
  }

  // Generate a random number from 1 to 99
  const number = getRandomInt(1, 99).toString().padStart(2, '0');

  // Create a new customer object
  const newCustomer = {
    id: `${prefix}${number}`,
    type: randomType,
    arrivalTime: new Date(),
    rut: Math.random() > 0.5 ? generateRandomRut() : '-',
    status: 'waiting'
  };

  // Add to the queue data
  window.queueDataService.getWaitingCustomers().push(newCustomer);

  // Update the UI
  window.queueUI.updateQueueStatus();

  // Show notification
  //showNewCustomerNotification(newCustomer);
}

/**
 * Shows a notification when a new customer arrives
 * @param {Object} customer - The new customer object
 */
function showNewCustomerNotification(customer) {
  // Create notification element
  const notification = document.createElement('div');
  notification.className = 'toast show position-fixed bottom-0 end-0 m-3';
  notification.setAttribute('role', 'alert');
  notification.setAttribute('aria-live', 'assertive');
  notification.setAttribute('aria-atomic', 'true');

  notification.innerHTML = `
      <div class="toast-header">
        <strong class="me-auto">Nuevo Cliente</strong>
        <small>${new Date().toLocaleTimeString()}</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        Cliente <strong>${customer.id}</strong> (${customer.type}) ha ingresado a la fila.
      </div>
    `;

  // Add to document
  document.body.appendChild(notification);

  // Remove after 3 seconds
  setTimeout(() => {
    notification.remove();
  }, 3000);
}

/**
 * Generates a random RUT (Chilean ID number)
 * @returns {String} A formatted RUT
 */
function generateRandomRut() {
  const number = getRandomInt(10000000, 25000000);
  const dv = calculateDv(number);
  return `${number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.')}-${dv}`;
}

/**
 * Calculates the verification digit for a RUT
 * @param {Number} rut - The RUT number
 * @returns {String} The verification digit
 */
function calculateDv(rut) {
  let sum = 0;
  let multiplier = 2;

  // Convert to string and reverse
  let rutStr = rut.toString().split('').reverse().join('');

  // Calculate sum
  for (let i = 0; i < rutStr.length; i++) {
    sum += parseInt(rutStr.charAt(i)) * multiplier;
    multiplier = multiplier === 7 ? 2 : multiplier + 1;
  }

  // Calculate DV
  const remainder = sum % 11;
  const dv = 11 - remainder;

  if (dv === 11) return '0';
  if (dv === 10) return 'K';
  return dv.toString();
}

/**
 * Gets a random integer between min and max (inclusive)
 * @param {Number} min - Minimum value
 * @param {Number} max - Maximum value
 * @returns {Number} A random integer
 */
function getRandomInt(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min + 1)) + min;
}