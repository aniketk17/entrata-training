<?php
function isActive($page) {
    $currentPage = basename($_SERVER['REQUEST_URI']);
    return $currentPage == $page;
}
?>

<ul class="flex space-x-2 bg-gray-900 p-2 rounded-xl">

    <li>
        <a href="/"
           class="px-4 py-2 rounded-lg transition-all duration-200
           <?= isActive('') || isActive('index.php')
                ? 'bg-blue-500 text-white shadow-md'
                : 'text-gray-300 hover:bg-gray-800 hover:text-white' ?>">
           Home
        </a>
    </li>

    <li>
        <a href="/blogs"
           class="px-4 py-2 rounded-lg transition-all duration-200
           <?= isActive('blogs')
                ? 'bg-blue-500 text-white shadow-md'
                : 'text-gray-300 hover:bg-gray-800 hover:text-white' ?>">
           Blogs
        </a>
    </li>

    <li>
        <a href="/about.php"
           class="px-4 py-2 rounded-lg transition-all duration-200
           <?= isActive('about.php')
                ? 'bg-blue-500 text-white shadow-md'
                : 'text-gray-300 hover:bg-gray-800 hover:text-white' ?>">
           About
        </a>
    </li>

    <li>
        <a href="/contact.php"
           class="px-4 py-2 rounded-lg transition-all duration-200
           <?= isActive('contact.php')
                ? 'bg-blue-500 text-white shadow-md'
                : 'text-gray-300 hover:bg-gray-800 hover:text-white' ?>">
           Contact
        </a>
    </li>

</ul>