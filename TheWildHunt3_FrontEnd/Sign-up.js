// Sign-up.js
let form = document.getElementById('signupForm');
let popup = document.getElementById('popup');
let closePopup = document.getElementById('closePopup');
let validationPopup = document.getElementById('validationPopup');
let closeValidationPopup = document.getElementById('closeValidationPopup');

form.addEventListener('submit', function (event) {
    const name = document.getElementById('name').value;
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm-password').value;

    if (password !== confirmPassword) {
        event.preventDefault();
        validationPopup.classList.remove('hidden');
        validationPopup.classList.add('visible');
        document.getElementById('password').value = '';
        document.getElementById('confirm-password').value = '';
    } else {
        popup.classList.remove('hidden');
        popup.classList.add('visible');
        event.preventDefault(); // Pastikan form tidak langsung disubmit
    }
});

closeValidationPopup.onclick = function () {
    validationPopup.classList.remove('visible');
    validationPopup.classList.add('hidden');
};

closePopup.onclick = function () {
    // Menunggu beberapa detik agar sesi dapat diproses
    setTimeout(function() {
        console.log('Redirecting to ChooseRegion.php'); // Tambahkan logging
        window.location.href = 'ChooseRegion.php';
    }, 1000);  // Penundaan 3 detik
};
