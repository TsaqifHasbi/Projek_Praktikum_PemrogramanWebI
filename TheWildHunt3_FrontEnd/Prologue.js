document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    });
});

document.querySelectorAll('.choice').forEach(choice => {
    choice.addEventListener('click', function () {
        let choiceText = this.querySelector('p').innerText;
        alert(`You selected: ${choiceText}`);
    });
});

document.querySelector('.end-chapter').addEventListener('click', function () {
    const endChapterSection = document.querySelector('.end-chapter-content');
    endChapterSection.style.display = (endChapterSection.style.display === 'none' || endChapterSection.style.display === '') ? 'block' : 'none';
});

document.querySelectorAll('.event img').forEach(img => {
    img.addEventListener('mouseenter', function () {
        this.style.transform = 'scale(1.1)';
        this.style.transition = 'transform 0.3s ease';
    });
    img.addEventListener('mouseleave', function () {
        this.style.transform = 'scale(1)';
    });
});

const profileButton = document.querySelector('.profile');
profileButton.addEventListener('click', function () {
    const profileMenu = document.querySelector('.profile-menu');
    profileMenu.classList.toggle('visible');
});

