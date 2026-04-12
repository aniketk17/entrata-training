<?php
function currentPath() {
    $path = strtok($_SERVER['REQUEST_URI'], '?');
    return rtrim($path, '/') ?: '/';
}

function isActive($path) {
    return currentPath() === $path;
}
?>

<ul class="flex space-x-2 bg-gray-900 p-2 rounded-xl shadow-lg">

    <li>
        <a href="/"
           class="<?= isActive('/') ? 'bg-blue-500 text-white px-4 py-2 rounded-lg' : 'text-gray-300 hover:bg-gray-800 px-4 py-2 rounded-lg' ?>">
           Home
        </a>
    </li>

    <li>
        <a href="/blogs"
           class="<?= isActive('/blogs') ? 'bg-blue-500 text-white px-4 py-2 rounded-lg' : 'text-gray-300 hover:bg-gray-800 px-4 py-2 rounded-lg' ?>">
           Blogs
        </a>
    </li>

    <li>
        <a href="/about"
           class="<?= isActive('/about') ? 'bg-blue-500 text-white px-4 py-2 rounded-lg' : 'text-gray-300 hover:bg-gray-800 px-4 py-2 rounded-lg' ?>">
           About
        </a>
    </li>

    <li>
        <a href="/contact"
           class="<?= isActive('/contact') ? 'bg-blue-500 text-white px-4 py-2 rounded-lg' : 'text-gray-300 hover:bg-gray-800 px-4 py-2 rounded-lg' ?>">
           Contact
        </a>
    </li>

</ul>