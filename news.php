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
  <header class="navbar">
    <h2 class="logo">CHROMOCROWN</h2>
    <nav>
      <a href="home.php">Home</a>
      <a href="about.php">About</a>
      <a href="products.php">Products</a>
      <a href="news.php">News</a>
      <a href="contact.php" class="active">Contact</a>
      <a href="login.php">Login</a>
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

  </script>
</body>
</html>