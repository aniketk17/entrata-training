<?php require "partials/head.php"; ?>

    <!-- 🔹 Navbar -->
    <?php require "partials/nav.php"; ?> 

    <!-- 🔹 Hero Section -->
    <section class="text-center py-20 bg-white">
        <h2 class="text-4xl font-bold mb-4">Welcome to My Blog 🚀</h2>
        <p class="text-gray-600 mb-6">Read, write and share amazing content.</p>
        <a href="#" class="bg-gray-900 text-white px-6 py-3 rounded hover:bg-gray-700">
            <?= $heading ?>
        </a>
    </section>

    <!-- 🔹 Blog Cards -->
    <section class="px-6 py-12">
        <h3 class="text-2xl font-semibold mb-6">Latest Posts</h3>

        <div class="grid md:grid-cols-3 gap-6">

            <!-- Card 1 -->
            <div class="bg-white p-5 rounded shadow">
                <h4 class="text-xl font-bold mb-2">Post Title 1</h4>
                <p class="text-gray-600 mb-3">Short description of the blog post.</p>
                <a href="#" class="text-blue-500 hover:underline">Read More →</a>
            </div>

            <!-- Card 2 -->
            <div class="bg-white p-5 rounded shadow">
                <h4 class="text-xl font-bold mb-2">Post Title 2</h4>
                <p class="text-gray-600 mb-3">Short description of the blog post.</p>
                <a href="#" class="text-blue-500 hover:underline">Read More →</a>
            </div>

            <!-- Card 3 -->
            <div class="bg-white p-5 rounded shadow">
                <h4 class="text-xl font-bold mb-2">Post Title 3</h4>
                <p class="text-gray-600 mb-3">Short description of the blog post.</p>
                <a href="#" class="text-blue-500 hover:underline">Read More →</a>
            </div>

        </div>
    </section>

<?php require "partials/footer.php"?>