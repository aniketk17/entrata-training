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
        $books = array("The Great Gatsby", "To Kill a Mockingbird", "1984", "Project Hail Mary");
    ?>
    <ul>
        <?php foreach ($books as $book) {
            echo "<li>$book</li>";
        } ?>
    </ul>
    

    <?php 
        $books_details = [
            [
                "title" => "The Great Gatsby",
                "author" => "F. Scott Fitzgerald",
                "year" => 1925,
                "genre" => "Novel"
            ],
            [
                "title" => "To Kill a Mockingbird",
                "author" => "Harper Lee",
                "year" => 1960,
                "genre" => "Novel"
            ],
            [
                "title" => "1984",
                "author" => "George Orwell",
                "year" => 1949,
                "genre" => "Dystopian"
            ],
            [
                "title" => "Project Hail Mary",
                "author" => "Andy Weir",
                "year" => 2021,
                "genre" => "Science Fiction"    
            ]
        ]
    
    ?>
    
    <?php 
        foreach ($books_details as $book) {
            echo "<li>" . $book['title'] . "</li>";
            echo "<li>" . $book['author'] . "</li>";
            echo "<li>" . $book['year'] . "</li>";
            echo "<li>" . $book['genre'] . "</li>";
        } 
    ?> 
</body>
</html>