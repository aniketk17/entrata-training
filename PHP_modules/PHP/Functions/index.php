<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Recommended Books</h1>
    <?php 
        $books_details = [
            [
                "title" => "The Great Gatsby",
                "author" => "F. Scott Fitzgerald",
                "year" => 1925,
                "genre" => "Novel",
                "purchaseUrl" => "https://www.amazon.com/Great-Gatsby-F-Scott-Fitzgerald/dp/0743273567"
            ],
            [
                "title" => "To Kill a Mockingbird",
                "author" => "Harper Lee",
                "year" => 1960,
                "genre" => "Novel",
                "purchaseUrl" => "https://www.amazon.com/Kill-Mockingbird-Harper-Lee/dp/0061120081"
            ],
            [
                "title" => "1984",
                "author" => "George Orwell",
                "year" => 1949,
                "genre" => "Dystopian",
                "purchaseUrl" => "https://www.amazon.com/1984-George-Orwell/dp/0451524934"
            ],
            [
                "title" => "Project Hail Mary",
                "author" => "Andy Weir",
                "year" => 2021,
                "genre" => "Science Fiction",
                "purchaseUrl" => "https://www.amazon.com/Project-Hail-Mary-Andy-Weir/dp/0593135202"    
            ]
        ];

        function filterByAuthor($books_details, $author) {
            $filteredBooks = [];

            foreach ($books_details as $book) {
                if ($book['author'] === $author) {
                    $filteredBooks[] = $book;
                }
            }
            return $filteredBooks;
        }
    
    ?>

    <h3>Functions</h3>

     <ul>
        <?php foreach (filterByAuthor($books_details, 'Andy Weir') as $book) { ?>
            <li>
                <a href="<?php echo $book['purchaseUrl']; ?>"><?php echo $book['title']; ?></a>
            </li>
        <?php } ?>
    </ul>


</body>
</html>