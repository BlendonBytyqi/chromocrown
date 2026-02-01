<?php


require_once __DIR__ . '/admin_guard.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Contact Us | CHROMOCROWN</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <style>
    .news-container {
      padding: 60px 40px;
    }

    .news-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 30px;
    }

    .news-card {
      background: #fff;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    }

    .news-card h3 {
      margin-bottom: 10px;
    }

    .news-date {
      font-size: 0.85rem;
      color: #777;
      margin-bottom: 15px;
    }

    .news-card p {
      line-height: 1.6;
    }
  </style>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>News | CHROMOCROWN</title>
    <link rel="stylesheet" href="style.css">
  </head>

  <body>
    <style>
      .news-container {
        padding: 60px 40px;
      }

      .news-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
      }

      .news-card {
        background: #fff;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
      }

      .news-card h3 {
        margin-bottom: 10px;
      }

      .news-date {
        font-size: 0.85rem;
        color: #777;
        margin-bottom: 15px;
      }

      .news-card p {
        line-height: 1.6;
      }
    </style>
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

    <main class="news-container">
      <h1 class="page-title">Latest News</h1>

      <div class="news-grid">

        <div class="news-card">
          <h3>Rolex Introduces New Submariner Collection</h3>
          <p class="news-date">March 2025</p>
          <p>
            Rolex has unveiled its newest Submariner models featuring improved water resistance,
            refined ceramic bezels, and enhanced precision movements. The new collection continues
            Rolex’s tradition of combining luxury with professional-grade performance.
          </p>
        </div>

        <div class="news-card">
          <h3>Casio Expands Smart & Sports Watch Line</h3>
          <p class="news-date">February 2025</p>
          <p>
            Casio announced new additions to its G-Shock and Edifice series, offering solar charging,
            Bluetooth connectivity, and improved durability. These watches are ideal for customers
            who value technology, reliability, and modern design.
          </p>
        </div>

        <div class="news-card">
          <h3>Patek Philippe Releases Limited Edition Watch</h3>
          <p class="news-date">January 2025</p>
          <p>
            Patek Philippe has revealed a new limited-edition luxury timepiece crafted with exceptional
            mechanical precision. Only a small number of units will be produced, making it highly
            desirable among collectors worldwide.
          </p>
        </div>

      </div>
    </main>

    <footer class="footer">
      <p>&copy; 2025 CHROMOCROWN. All rights reserved.</p>
    </footer>

  </body>

  </html>

  <script>

  </script>
</body>

</html>