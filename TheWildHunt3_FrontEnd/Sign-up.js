// Ambil elemen-elemen yang dibutuhkan
let form = document.getElementById('signupForm');
let popup = document.getElementById('popup');
let closePopup = document.getElementById('closePopup');

// Tambahkan event listener saat form disubmit
form.addEventListener('submit', function (event) {
    // Tampilkan popup setelah form disubmit
    popup.classList.remove('hidden');
    popup.classList.add('visible');
});

document.getElementById('closePopup').onclick = function () {
  window.location.href = 'ChooseRegion.php';
};

document.getElementById('signupForm').addEventListener('submit', function(event) {
  const password = document.getElementById('password').value;
  const confirmPassword = document.getElementById('confirm-password').value;

  if (password !== confirmPassword) {
      event.preventDefault(); // Mencegah form submit
      alert('Password dan konfirmasi password tidak sesuai!');
  }
});

