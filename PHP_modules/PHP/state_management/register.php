<?php

require_once __DIR__ . '/users.php';

session_start();


if (isset($_SESSION['user'])) {
    header('Location: dashboard.php');
    exit;
}

$error   = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username  = trim($_POST['username'] ?? '');
    $email     = trim($_POST['email'] ?? '');
    $password  = $_POST['password'] ?? '';
    $confirm   = $_POST['confirm_password'] ?? '';

    if (!$username || !$email || !$password || !$confirm) {
        $error = 'All fields are required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please enter a valid email address.';
    } elseif (strlen($password) < 6) {
        $error = 'Password must be at least 6 characters.';
    } elseif ($password !== $confirm) {
        $error = 'Passwords do not match.';
    } else {
        $registered = registerUser($username, $email, $password);

        if ($registered) {
            $_SESSION['flash'] = "Account created! Please log in.";
            header('Location: login.php');
            exit;
        } else {
            $error = "Username '{$username}' is already taken.";
        }
    }
}

require __DIR__ . '/views/register.view.php';
