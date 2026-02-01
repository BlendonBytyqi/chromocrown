<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Products | CHROMOCROWN</title>


  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      background: #f5f5f5;
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 40px;
      background: #000;
    }

    .logo {
      color: #fff;
      font-size: 22px;
      font-weight: bold;
    }

    nav a {
      color: #fff;
      margin-left: 20px;
      text-decoration: none;
      transition: 0.3s;
    }

    .page-title {
      text-align: center;
      margin: 40px 0;
      font-size: 2.5rem;
    }

    .products-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 30px;
      padding: 0 40px 60px;
      max-width: 1200px;
      margin: auto;
    }

    .product-card {
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
      text-align: center;
      padding-bottom: 20px;
      transition: transform 0.3s;
    }

    .product-card:hover {
      transform: translateY(-5px);
    }

    .product-card img {
      width: 100%;
      height: 220px;
      object-fit: cover;
      border-radius: 10px 10px 0 0;
    }

    .product-card h3 {
      margin: 15px 0 10px;
    }

    .product-card p {
      font-size: 0.9rem;
      padding: 0 15px;
      color: #444;
    }

  </style>
</head>

<body>

<header>
  <div class="logo">CHROMOCROWN</div>
  <nav>
    <a href="home.php">Home</a>
    <a href="about.php">About</a>
    <a href="products.php" class="active">Products</a>
    <a href="news.php">News</a>
    <a href="contact.php">Contact</a>
    <a href="login.php">Login/Signup</a>
  </nav>
</header>

<h1 class="page-title">Our Watches</h1>

<div class="products-grid">

  <div class="product-card">
    <img src="images/image1.jpg" alt="Casio Watch">
    <h3>Casio G-Shock</h3>
    <p>Shock-resistant, reliable, and perfect for everyday use.</p>
  </div>

  <div class="product-card">
    <img src="images/image3.jpg" alt="Rolex Watch">
    <h3>Rolex Submariner</h3>
    <p>Luxury diving watch with timeless elegance.</p>
  </div>

  <div class="product-card">
    <img src="images/image4.jpg" alt="Rolex Watch">
    <h3>Rolex Datejust</h3>
    <p>A symbol of prestige and refined craftsmanship.</p>
  </div>

  <div class="product-card">
    <img src="images/image5.jpg" alt="Patek Philippe Watch">
    <h3>Patek Nautilus</h3>
    <p>Iconic design with exceptional mechanical precision.</p>
  </div>

  <div class="product-card">
    <img src="images/image6.jpg" alt="Patek Philippe Watch">
    <h3>Patek Calatrava</h3>
    <p>Classic elegance crafted for true collectors.</p>
  </div>

</div>

</body>
</html>