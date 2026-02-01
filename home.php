<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CHROMOCROWN | Home</title>
</head>
<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box
}

body {
  font-family: Arial;
  background: #f4f4f4;
  color: #222
}

header {
  background: #000;
  color: #fff;
  padding: 15px;
  display: flex;
  justify-content: space-between
}

.simple-header {
  text-align: center;
  background: #000;
  color: #fff;
  padding: 15px;
  font-weight: bold
}

nav a {
  color: #fff;
  margin-left: 15px;
  text-decoration: none
}

.center {
  text-align: center;
  margin: 40px 0
}


.slide {
  display: none
}

.slide.active {
  display: block
}

.slider {
  width: 100%;
  height: 100%;
  position: relative;
  overflow: hidden;
}


#slideshow {
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
  display: block;
}


.prev {
  left: 20px;
}

.next {
  right: 20px;
}

footer {
  text-align: center;
  background: #000;
  color: #aaa;
  padding: 20px
}
.nav {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  width: 42px;
  height: 42px;
  border-radius: 50%;
  border: none;
  background: rgba(0, 0, 0, 0.6);
  color: #fff;
  font-size: 19px;
  cursor: pointer;
  z-index: 10;
  transition: 0.3s;
}
</style>

<body>
    <header>
        <div class="logo">CHROMOCROWN</div>
        <nav> <a href="index.php">Home</a> <a href="about.php">About</a> <a href="products.php">Products</a> <a
                href="news.php">News</a> <a href="contact.php">Contact</a> <a href="login.php">Login/Signup</a> </nav>
    </header>
    <div class="slider"> <img id="slideshow" /> <button class="nav prev" onclick="backImg()">‹</button> <button
            class="nav next" onclick="nextImg()">›</button> </div>
    <footer>© 2025 CHROMOCROWN</footer>
    <script>
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
</script>
</body>

</html>