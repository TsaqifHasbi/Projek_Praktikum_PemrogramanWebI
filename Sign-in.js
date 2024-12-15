//  Sign-up.js
// let form = document.getElementById('signinForm');
// let popup = document.getElementById('popup');
// let closePopup = document.getElementById('closePopup');
// let validationPopup = document.getElementById('validationPopup');
// let closeValidationPopup = document.getElementById('closeValidationPopup');

// form.addEventListener('submit', function (event) {
//     event.preventDefault(); 

//     const formData = new FormData(form);

//     // Kirim data ke server menggunakan fetch
//     fetch('Sign-in.php', {
//         method: 'POST',
//         body: formData
//     })
//         .then(response => response.json())
//         .then(data => {
//             if (data.status === 'success') {
//                 // Tampilkan popup sukses
//                 popup.classList.remove('hidden');
//                 popup.classList.add('visible');

//                 setTimeout(() => {
//                     window.location.href = data.redirect;
//                 }, 1000);
//             } else if (data.status === 'error') {
//                 validationPopup.classList.remove('hidden');
//                 validationPopup.classList.add('visible');
//             }
//         })
//         .catch(error => {
//             console.error('Error:', error);
//         });
// });

// // Tutup popup validasi
// closeValidationPopup.onclick = function () {
//     validationPopup.classList.remove('visible');
//     validationPopup.classList.add('hidden');
// };
