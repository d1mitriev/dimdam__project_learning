var banner = document.getElementById('header__banner--background');
var images = [
    '/asset/banner1.png',
    '/asset/banner2.png',
    '/asset/banner3.png',
];
var currentImageIndex = 0;

function changeBanner() {
    currentImageIndex = (currentImageIndex + 1) % images.length;
    banner.style.backgroundImage = 'url(' + images[currentImageIndex] + ')';
    banner.style.backgroundSize = 'cover'; // Растягиваем изображение на весь баннер
}

// Устанавливаем интервал для смены баннера (каждые 5 секунд)
setInterval(changeBanner, 10000);

