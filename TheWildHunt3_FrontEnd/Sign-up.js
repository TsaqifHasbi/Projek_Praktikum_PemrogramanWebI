// Ambil elemen-elemen yang dibutuhkan
let form = document.getElementById('signupForm');
let popup = document.getElementById('popup');
let closePopup = document.getElementById('closePopup');
let validationPopup = document.getElementById('validationPopup');
let closeValidationPopup = document.getElementById('closeValidationPopup');

// Tambahkan event listener saat form disubmit
form.addEventListener('submit', function (event) {
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm-password').value;

    // Cek kesesuaian password
    if (password !== confirmPassword) {
        event.preventDefault();  // Mencegah form submit jika password tidak cocok
        validationPopup.classList.remove('hidden');  // Tampilkan popup error
        validationPopup.classList.add('visible');

        // Reset password dan confirm password
        document.getElementById('password').value = '';
        document.getElementById('confirm-password').value = '';
    } else {
        // Jika password valid, tampilkan popup sukses dan proses submit setelah popup ditutup
        popup.classList.remove('hidden');
        popup.classList.add('visible');
        event.preventDefault(); // Mencegah form submit sementara untuk menunggu popup ditutup
    }
});

// Menutup popup validasi dan membiarkan pengguna mencoba lagi
closeValidationPopup.onclick = function () {
    validationPopup.classList.remove('visible');
    validationPopup.classList.add('hidden');
};

// Menutup popup sukses dan redirect ke ChooseRegion.php setelah beberapa detik
closePopup.onclick = function () {
    // Delay sedikit untuk memberi waktu popup ditutup, lalu redirect
    setTimeout(function() {
        window.location.href = 'ChooseRegion.php';
    }, 500); // Delay 500ms sebelum redirect
};
