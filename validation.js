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
}