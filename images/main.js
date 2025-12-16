let i = 0;
let interval;

let imgArray = [

  
  'images/foto1.avif',
  'images/foto2.avif',
  'images/foto3.avif',
  'images/foto4.avif',


];
console.log(imgArray);

function showImg() {
  document.getElementById('slideshow').src = imgArray[i];
}

function nextImg() {
  i++;
  if (i >= imgArray.length) i = 0;
   showImg();
  resetInterval();
}

function backImg() {
  i--;
  if (i < 0) i = imgArray.length - 1;
  showImg();
  resetInterval();
}

function startSlider() {
  interval = setInterval(() => {
    nextImgAuto();
  }, 2600);
}

function nextImgAuto() {
  i++;
  if (i >= imgArray.length) i = 0;
   showImg();
}

function resetInterval() {
  clearInterval(interval);
  startSlider();
}

window.addEventListener('load', () => {
  showImg();
  startSlider();
});