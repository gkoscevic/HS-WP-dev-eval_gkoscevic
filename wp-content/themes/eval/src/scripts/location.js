/**
 * This module will do the following
 * - pulls the user's IP address from the browser
 * - calls ipapi to fetch the user's location based on their API
 * - handles business logic to determine what text to display to the user
 */

const RenderLocation = {
  init: async function () {
    await RenderLocation.renderLocationText();
  },
  getLocationData: async function () {
    try {
      return fetch('https://ipapi.co/json/').then(res => res.json());
    } catch {
      return false;
    }
  },
  getPostalCode: async function () {
    const locationData = await this.getLocationData();
    return locationData.postal;
  },
  determineLocationText: async function () {
    const postalCode = await this.getPostalCode();
    if (postalCode) {
      return `Our gutters available in ${postalCode}`;
    }

    return 'No gutters available in your area';
  },
  renderLocationText: async function () {
    const locationTextElement = document.getElementById('location-text');
    if (!locationTextElement) return false;
    
    const locationText = await this.determineLocationText();
    const locationTextNode = document.createTextNode(locationText);


    locationTextElement.appendChild(locationTextNode);
  }
};

export default RenderLocation;
