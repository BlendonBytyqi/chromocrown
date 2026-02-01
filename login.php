<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>CHROMOCROWN | Login</title>
<link rel="stylesheet" href="style.css">
<style>
.login-container { max-width: 420px; margin: 90px auto; background:#fff; padding:30px; border-radius:12px; box-shadow:0 5px 15px rgba(0,0,0,.1); }
.login-container input { width:100%; padding:12px; margin-bottom:12px; border-radius:8px; border:1px solid #ccc; }
.login-container button { width:100%; padding:12px; background:#3498db; border:none; color:#fff; border-radius:8px; font-weight:bold; cursor:pointer; }
.login-container button:hover { background:#2980b9; }
.error { color:red; text-align:center; margin-bottom:10px; }


.login-container form,
.login-container input,
.login-container button { display:block !important; visibility:visible !important; opacity:1 !important; height:auto !important; }
</style>
</head>
<body>

<header>
  <h2 class="logo">CHROMOCROWN</h2>
  <nav>
    <a href="home.php">Home</a>
    <a href="about.php">About</a>
    <a href="products.php">Products</a>
    <a href="news.php">News</a>
    <a href="contact.php">Contact</a>
    <a href="login.php">Login</a>
  </nav>
</header>

<section class="login-container">
  <?php if (isset($_GET['error'])): ?>
    <div class="error">
      <?php
        if ($_GET['error'] === 'empty') echo "Mbushi të gjitha fushat!";
        else if ($_GET['error'] === 'invalid') echo "Username ose password gabim!";
        else echo "Gabim i panjohur.";
      ?>
    </div>
  <?php endif; ?>

  <form method="POST" class="active" action="login_handler.php">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
  </form>

  <p style="text-align:center; margin-top:10px;">
    <a href="register.php">Nuk ke account? Regjistrohu këtu</a>
  </p>
</section>

<footer>© 2025 CHROMOCROWN</footer>
</body>
</html>
