// Form submission and popup display logic
const form = document.getElementById('signupForm');
const popup = document.getElementById('popup');
const closePopup = document.getElementById('closePopup');

form.addEventListener('submit', function (event) {
  event.preventDefault(); // Prevent form submission
  // Show popup
  popup.classList.remove('hidden');
  popup.classList.add('visible');
});

// Close popup on button click
closePopup.addEventListener('click', function () {
  popup.classList.remove('visible');
  popup.classList.add('hidden');
});
