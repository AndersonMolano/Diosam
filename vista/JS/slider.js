const slider = document.querySelector('.slider');
const slides = document.querySelectorAll('.slide');
const overlays = document.querySelectorAll('.overlay');
const captions = document.querySelectorAll('.caption');
const pagination = document.querySelector('.pagination');

let currentIndex = 0;

function goToSlide(index) {
    if (index < 0) {
        index = slides.length - 1;
    } else if (index >= slides.length) {
        index = 0;
    }

    slider.style.transform = `translateX(-${index * 100}%)`;

    overlays[currentIndex].style.opacity = 0;
    captions[currentIndex].style.opacity = 0;

    overlays[index].style.opacity = 1;
    captions[index].style.opacity = 1;

    currentIndex = index;
    updatePagination();
}

function createPagination() {
    for (let i = 0; i < slides.length; i++) {
        const dot = document.createElement('span');
        dot.addEventListener('click', () => goToSlide(i));
        pagination.appendChild(dot);
    }
    updatePagination();
}

function updatePagination() {
    const dots = pagination.querySelectorAll('span');
    dots.forEach((dot, index) => {
        if (index === currentIndex) {
            dot.classList.add('active');
        } else {
            dot.classList.remove('active');
        }
    });
}

createPagination();

setInterval(() => {
    goToSlide(currentIndex + 1);
}, 5000);

goToSlide(0);
