<?php
/**
 * dashboard.php — Protected page. Only accessible when logged in.
*/

session_start();


if (empty($_SESSION['logged_in'])) {
    header('Location: login.php');
    exit;
}


$flash = '';
if (isset($_SESSION['flash'])) {
    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']); 
}

// Pull session info for the dashboard
$username   = $_SESSION['user'];
$email      = $_SESSION['email'];
$login_time = $_SESSION['login_time'];

// Read cookie examples
$remember_cookie = $_COOKIE['remember_me'] ?? null; 
$session_id      = session_id();     

require __DIR__ . '/views/dashboard.view.php';
