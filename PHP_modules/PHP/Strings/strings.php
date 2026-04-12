<?php
/*

A string is a sequence of characters enclosed in:
- Double quotes (" ")
- Single quotes (' ')

*/

// 1. CREATING STRINGS
echo "---- CREATING STRINGS ----<br>";

$str1 = "Hello World";   // Double quotes
$str2 = 'Hello PHP';     // Single quotes

echo $str1 . "<br>";
echo $str2 . "<br><br>";


// 2. STRING LENGTH
echo "---- STRING LENGTH ----<br>";

$text = "Hello Aniket";
echo "Text: " . $text . "<br>";
echo "Length: " . strlen($text) . "<br><br>";


// 3. WORD COUNT
echo "---- WORD COUNT ----<br>";

echo "Words: " . str_word_count($text) . "<br><br>";


// 4. STRING REVERSE
echo "---- STRING REVERSE ----<br>";

echo "Reversed: " . strrev($text) . "<br><br>";


// 5. SEARCH IN STRING
echo "---- SEARCH ----<br>";

echo "Position of 'Aniket': " . strpos($text, "Aniket") . "<br><br>";


// 6. STRING REPLACE
echo "---- REPLACE ----<br>";

echo str_replace("Aniket", "Developer", $text) . "<br><br>";


// 7. CONCATENATION
echo "---- CONCATENATION ----<br>";

$first = "Hello";
$second = "World";

echo $first . " " . $second . "<br><br>";


// 8. UPPERCASE / LOWERCASE
echo "---- CASE CONVERSION ----<br>";

echo strtoupper($text) . "<br>";
echo strtolower($text) . "<br><br>";


// 9. TRIM (REMOVE SPACES)
echo "---- TRIM ----<br>";

$spaceText = "   Hello PHP   ";
echo "Before: '" . $spaceText . "'<br>";
echo "After: '" . trim($spaceText) . "'<br><br>";


// 10. SUBSTRING
echo "---- SUBSTRING ----<br>";

echo substr($text, 0, 5) . "<br><br>";


// 11. SINGLE vs DOUBLE QUOTES
echo "---- QUOTES DIFFERENCE ----<br>";

$name = "Aniket";

echo "Hello $name<br>";   // Variable works
echo 'Hello $name<br>';   // Variable not parsed

?>