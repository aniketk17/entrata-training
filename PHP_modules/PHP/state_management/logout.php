<?php


session_start();

// Step 1: Clear all $_SESSION variables 
session_unset();

// Step 2: Destroy the session data on the server 
session_destroy();

// Step 3: Delete the "remember me" cookie from the browser 
if (isset($_COOKIE['remember_me'])) {
    setcookie(
        'remember_me',
        '',           // empty value
        time() - 3600, // ← expiry in the past forces browser to delete it
        '/',
        '',
        false,
        true
    );
}

// Redirect  to login 
header('Location: login.php');
exit;
