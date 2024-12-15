// Ambil elemen dari DOM
const signupBtn = document.getElementById('signupBtn');
const signinBtn = document.getElementById('signinBtn');
const loadingPopup = document.getElementById('loadingPopup');

// Fungsi untuk menampilkan popup loading
function showLoadingPopup() {
    loadingPopup.style.display = 'block';
}

// Fungsi untuk menyembunyikan popup loading
function hideLoadingPopup() {
    loadingPopup.style.display = 'none';
}


/// Event listener untuk tombol Sign Up
signupBtn.addEventListener('click', function(event) {
  event.preventDefault();  
  showLoadingPopup();  
  sessionStorage.setItem('isLoading', 'true');  
  setTimeout(() => {
      document.getElementById('signupForm').submit();  
      window.location.href = 'Sign-up.php';  
  }, 1000);  
});

// Event listener untuk tombol Sign In
signinBtn.addEventListener('click', function(event) {
  event.preventDefault();
  showLoadingPopup();
  sessionStorage.setItem('isLoading', 'true');
  setTimeout(() => {
      document.getElementById('signinForm').submit();
      window.location.href = 'Sign-in.php';
  }, 1000); 
});

window.onload = function() {
  if (sessionStorage.getItem('isLoading') === 'true') {
      loadingPopup.style.display = 'none';
      sessionStorage.removeItem('isLoading');
  }
}

