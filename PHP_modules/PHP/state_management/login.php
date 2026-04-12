<?php


require_once __DIR__ . '/users.php';

session_start(); 

if (isset($_SESSION['user'])) {
    header('Location: dashboard.php');
    exit;
}

$remembered_username = $_COOKIE['remember_me'] ?? '';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username   = trim($_POST['username'] ?? '');
    $password   = $_POST['password'] ?? '';
    $remember   = isset($_POST['remember_me']);

    if (!$username || !$password) {
        $error = 'Please fill in all fields.';
    } else {
        $user = validateCredentials($username, $password);

        if ($user) {

            session_regenerate_id(true); 

            $_SESSION['user']       = $user['username'];
            $_SESSION['email']      = $user['email'];
            $_SESSION['logged_in']  = true;
            $_SESSION['login_time'] = date('Y-m-d H:i:s');

            if ($remember) {
                setcookie(
                    'remember_me',
                    $user['username'],
                    time() + (30 * 24 * 3600), 
                    '/',                   
                    '',                    
                    false,                 
                    true                   
                );
            }

            header('Location: dashboard.php');
            exit;
        } else {
            $error = 'Invalid username or password.';
        }
    }
}

require __DIR__ . '/views/login.view.php';
