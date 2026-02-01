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

  <main class="contact-container">
    <h1 class="page-title">Contact Us</h1>

    <p class="contact-text">
      At CHROMOCROWN, customer satisfaction is our highest priority.  
      For whatever concerns you have regarding the watches purchased through our website,
      our customer service team is always ready to assist you.  
      Please feel free to contact us using the form below, and we will respond as quickly as possible.
    </p>

    <form class="contact-form" onsubmit="return validateContactForm()">
      
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" placeholder="Enter your name">
      </div>

      <div class="form-group">
        <label for="lastname">Last Name</label>
        <input type="text" id="lastname" placeholder="Enter your last name">
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" placeholder="Enter your email">
      </div>

      <div class="form-group">
        <label for="message">Message</label>
        <textarea id="message" rows="5" placeholder="Write your message here"></textarea>
      </div>

      <button type="submit" class="btn-outline">Send Message</button>
    </form>
  </main>

  <footer class="footer">
    <p>&copy; 2025 CHROMOCROWN. All rights reserved.</p>
  </footer>

  <script>
    document.addEventListener('DOMContentLoaded',()=>{

const emailValid=e=>/\S+@\S+\.\S+/.test(e);

const contact=document.getElementById('contactForm');
if(contact){
contact.addEventListener('submit',e=>{
e.preventDefault();
if(!name.value||!emailValid(email.value)||!message.value){
contactError.textContent='Please fill all fields correctly';
}else alert('Message sent successfully');
});
}

  </script>
</body>
</html>