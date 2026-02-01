<?php
session_start();

// 1️⃣ Përfshi klasën User
require_once 'user.php';

// 2️⃣ Kontrollo që request është POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.php');
    exit;
}

// 3️⃣ Merr input dhe pastro
$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');

// 4️⃣ Kontrollo fushat bosh
if ($username === '' || $password === '') {
    header('Location: login.php?error=empty');
    exit;
}

// 5️⃣ Krijo objektin User dhe provo login
$userObj = new User();
$user = $userObj->login($username, $password);

// 6️⃣ Nëse user ekziston
if ($user) {

    // Gjenero session id të re për siguri
    session_regenerate_id(true);

    // Ruaj të dhënat në session
    $_SESSION['user_id']  = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['role']     = $user['role'];

    // 7️⃣ Redirect sipas role
    if ($user['role'] === 'admin') {
        header("Location: admin_panel.php");
    } else {
        header("Location: home.php");
    }
    exit;

} else {
   
    header('Location: login.php?error=invalid');
    exit;
}
