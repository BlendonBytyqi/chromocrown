<?php


require_once __DIR__ . '/db.php';
require_once __DIR__ .'/admin_guard.php';


$db = new Database();
$conn = $db->connect();

$stmt = $conn->query("SELECT id, name, description, image FROM products ORDER BY id DESC");
$products = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Products | CHROMOCROWN</title>

  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; font-family: Arial, sans-serif; }
    body { background: #f5f5f5; }
    header { display: flex; justify-content: space-between; align-items: center; padding: 15px 40px; background: #000; }
    .logo { color: #fff; font-size: 22px; font-weight: bold; }
    nav a { color: #fff; margin-left: 20px; text-decoration: none; transition: 0.3s; }
    .page-title { text-align: center; margin: 40px 0; font-size: 2.5rem; }

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
    .product-card:hover { transform: translateY(-5px); }
    .product-card img {
      width: 100%;
      height: 220px;
      object-fit: cover;
      border-radius: 10px 10px 0 0;
    }
    .product-card h3 { margin: 15px 0 10px; }
    .product-card p { font-size: 0.9rem; padding: 0 15px; color: #444; }
  </style>
</head>

<body>

<header>
  <div class="logo">CHROMOCROWN</div>

  <nav>
    <a href="home.php">Home</a>
    <a href="about.php">About</a>
    <a href="products.php">Products</a>
    <a href="news.php">News</a>
    <a href="contact.php">Contact</a>

    <?php if (isset($_SESSION['user_id'])): ?>

      <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
        <a href="admin_products.php">Admin</a>
      <?php endif; ?>

      <a href="logout.php">Logout</a>

    <?php else: ?>
      <a href="login.php">Login</a>
    <?php endif; ?>
  </nav>
</header>

<h1 class="page-title">Our Watches</h1>

<div class="products-grid">
  <?php foreach ($products as $p): ?>
    <div class="product-card">
      <img src="<?= htmlspecialchars($p['image']) ?>" alt="<?= htmlspecialchars($p['name']) ?>">
      <h3><?= htmlspecialchars($p['name']) ?></h3>
      <p><?= htmlspecialchars($p['description']) ?></p>
    </div>
  <?php endforeach; ?>
</div>

</body>
</html>
