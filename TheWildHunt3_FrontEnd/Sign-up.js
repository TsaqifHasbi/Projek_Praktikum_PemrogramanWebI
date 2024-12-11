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
