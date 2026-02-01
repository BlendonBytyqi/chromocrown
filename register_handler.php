<?php
session_start();
require_once __DIR__ . '/user.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: register.php');
    exit;
}

$username = trim($_POST['username'] ?? '');
$email    = trim($_POST['email'] ?? '');
$password = trim($_POST['password'] ?? '');
$confirm  = trim($_POST['confirm'] ?? '');

if ($username === '' || $email === '' || $password === '' || $confirm === '') {
    header('Location: register.php?error=empty');
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: register.php?error=invalid_email');
    exit;
}

if ($password !== $confirm) {
    header('Location: register.php?error=password_mismatch');
    exit;
}

$userObj = new User();
$result = $userObj->register($username, $email, $password, 'user');

if ($result === 'exists') {
    header('Location: register.php?error=exists');
    exit;
}

if ($result === true) {
    header('Location: register.php?success=registered');
    exit;
}

header('Location: register.php?error=server');
exit;
