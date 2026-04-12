<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: sans-serif;
            text-align: center;
            margin-top: 50px;
        }
    </style>    
</head>
<body>
    <?php
        $bookTitle = "Dark Matter";
        $isRead = true;
    ?>
    <h1>
        You have read "<?php echo $bookTitle; ?>"
    </h1>
    <?php 
        if ($isRead) {
            echo "<p>Congratulations on finishing the book!</p>";
        } else {
            echo "<p>You haven't finished the book yet.</p>";
        }
    ?>
    <?php
        $num = 10;

        if ($num > 0) {
            echo "Positive number";
        } elseif ($num < 0) {
            echo "Negative number";
        } else {
            echo "Zero";
        }
    ?>
</body>
</html>