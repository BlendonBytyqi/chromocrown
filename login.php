<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>CHROMOCROWN | Login</title>
<link rel="stylesheet" href="style.css">
<script defer src="main.js"></script>
<script defer >
const login=document.getElementById('loginForm');
if(login){
login.addEventListener('submit',e=>{
e.preventDefault();
if(!loginEmail.value||loginPassword.value.length<6){
loginError.textContent='Invalid login credentials';
}else alert('Login successful');
});
}

const register=document.getElementById('registerForm');
if(register){
register.addEventListener('submit',e=>{
e.preventDefault();
if(!regName.value||!emailValid(regEmail.value)||regPassword.value.length<6){
registerError.textContent='Invalid registration data';
}else alert('Registration successful');
});
}

});

const loginTab = document.getElementById('login-tab');
const signupTab = document.getElementById('signup-tab');
const loginForm = document.getElementById('login-form');
const signupForm = document.getElementById('signup-form');

loginTab.addEventListener('click', () => {
    loginTab.classList.add('active');
    signupTab.classList.remove('active');
    loginForm.classList.add('active');
    signupForm.classList.remove('active');
});

signupTab.addEventListener('click', () => {
    signupTab.classList.add('active');
    loginTab.classList.remove('active');
    signupForm.classList.add('active');
    loginForm.classList.remove('active');
});

loginForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const email = document.getElementById('login-email').value.trim();
    const password = document.getElementById('login-password').value;

    if (!validateEmail(email)) {
        alert("Please enter a valid email.");
        return;
    }
    if (password.length < 6) {
        alert("Password must be at least 6 characters.");
        return;
    }
    alert("Login successful!");
    loginForm.reset();
});

signupForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const name = document.getElementById('signup-name').value.trim();
    const lastname = document.getElementById('signup-lastname').value.trim();
    const email = document.getElementById('signup-email').value.trim();
    const phone = document.getElementById('signup-phone').value.trim();
    const password = document.getElementById('signup-password').value;
    const confirmPassword = document.getElementById('signup-confirm-password').value;

    if (!name || !lastname || !email || !phone || !password || !confirmPassword) {
        alert("All fields are required.");
        return;
    }
    if (!validateEmail(email)) {
        alert("Please enter a valid email.");
        return;
    }
    if (!validatePhone(phone)) {
        alert("Please enter a valid phone number.");
        return;
    }
    if (password.length < 6) {
        alert("Password must be at least 6 characters.");
        return;
    }
    if (password !== confirmPassword) {
        alert("Passwords do not match.");
        return;
    }
    alert("Signup successful!");
    signupForm.reset();
});

function validateEmail(email) {
    const re = /\S+@\S+\.\S+/;
    return re.test(email);
}

function validatePhone(phone) {
    const re = /^[0-9]{6,15}$/;
    return re.test(phone);
}</script>
<style>
.login-container {
  max-width: 400px;
  margin: 80px auto;
  background: #fff;
  padding: 30px;
  border-radius: 10px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.login-container .tab {
  display: flex;
  justify-content: space-around;
  margin-bottom: 20px;
  cursor: pointer;
}

.login-container .tab div {
  padding: 10px 20px;
  border-bottom: 2px solid transparent;
  font-weight: bold;
}

.login-container .tab .active {
  border-color: #3498db;
  color: #3498db;
}</style>
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
    <a href="login.php">Login/Signup</a>
  </nav>
</header>

<section class="login-container">
  <div class="tab">
    <div id="login-tab" class="active">Login</div>
    <div id="signup-tab">Signup</div>
  </div>

  <form id="login-form" class="active">
    <input type="email" id="login-email" placeholder="Email" required>
    <input type="password" id="login-password" placeholder="Password" required>
    <button type="submit">Login</button>
  </form>

  <form id="signup-form">
    <input type="text" id="signup-name" placeholder="Name" required>
    <input type="text" id="signup-lastname" placeholder="Last Name" required>
    <input type="email" id="signup-email" placeholder="Email" required>
    <input type="tel" id="signup-phone" placeholder="Phone Number" required>
    <input type="password" id="signup-password" placeholder="Password" required>
    <input type="password" id="signup-confirm-password" placeholder="Confirm Password" required>
    <button type="submit">Signup</button>
  </form>
</section>

<footer>© 2025 CHROMOCROWN</footer>
</body>
</html>