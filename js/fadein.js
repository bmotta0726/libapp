const indexImage = document.getElementById('index-image');
const changeRate = 0.05;
const intervalTime = 80;

let imageOpacity = 0;

indexImage.style.opacity = imageOpacity;

const fadeIn = setInterval(function() {
    if (imageOpacity < 1.0) {
        imageOpacity += changeRate;
        indexImage.style.opacity = imageOpacity;
    } else {
        clearInterval(fadeIn);
    }
}, intervalTime);


