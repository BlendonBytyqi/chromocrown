<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>CHROMOCROWN | Register</title>
<link rel="stylesheet" href="style.css">

<style>
.login-container {
  max-width: 400px;
  margin: 80px auto;
  background: #fff;
  padding: 30px;
  border-radius: 10px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.login-container input {
  width: 100%;
  padding: 10px;
  margin-bottom: 12px;
  border-radius: 6px;
  border: 1px solid #ccc;
}

.login-container button {
  width: 100%;
  padding: 10px;
  background: #3498db;
  border: none;
  color: white;
  border-radius: 6px;
  font-weight: bold;
  cursor: pointer;
}

.login-container button:hover {
  background: #2980b9;
}

.error {
  color: red;
  text-align: center;
  margin-bottom: 10px;
}

.success {
  color: green;
  text-align: center;
  margin-bottom: 10px;
}
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

<?php if(isset($_GET['error'])): ?>
  <div class="error">
    <?php
      if($_GET['error']=='empty') echo "Mbushi të gjitha fushat!";
      if($_GET['error']=='exists') echo "Username ose email ekziston!";
    ?>
  </div>
<?php endif; ?>

<?php if(isset($_GET['success']) && $_GET['success']=='registered'): ?>
  <div class="success">Regjistrimi u bë me sukses! Mundesh me bo login.</div>
<?php endif; ?>

<form method="POST" class="active" action="register_handler.php">
    <input type="text" name="username" placeholder="Username" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Signup</button>
</form>

<p style="text-align:center; margin-top:10px;">
<a href="login.php">Ke account? Kyçu këtu</a>
</p>

</section>

<footer>© 2025 CHROMOCROWN</footer>

</body>
</html>
