<?php

// Get clean path
$request = strtok($_SERVER['REQUEST_URI'], '?');
$request = rtrim($request, '/') ?: '/';

// If project is inside folder (IMPORTANT)
$base = ''; // e.g. '/project' if needed
$request = str_replace($base, '', $request);

// Routes
$routes = [
    '/' => 'home.php',
    '/blogs' => 'blogs.php',
    '/about' => 'about.php',
    '/contact' => 'contact.php',
];

// Load controller
if (array_key_exists($request, $routes)) {
    require __DIR__ . '/controllers/' . $routes[$request];
} else {
    http_response_code(404);
    require __DIR__ . '/views/404.php';
}