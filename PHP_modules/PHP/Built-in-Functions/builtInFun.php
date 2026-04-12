<?php
/*
===========================================
        PHP BUILT-IN FUNCTIONS
===========================================

Built-in functions are predefined functions provided by PHP
to perform common tasks like string handling, math operations,
array manipulation, etc.

*/


// 1. STRING FUNCTIONS
echo "---- STRING FUNCTIONS ----<br>";

$text = "Hello World";

echo "Length: " . strlen($text) . "<br>";
echo "Word Count: " . str_word_count($text) . "<br>";
echo "Reverse: " . strrev($text) . "<br>";
echo "Uppercase: " . strtoupper($text) . "<br>";
echo "Replace: " . str_replace("World", "PHP", $text) . "<br><br>";


// 2. MATH FUNCTIONS
echo "---- MATH FUNCTIONS ----<br>";

echo "Absolute: " . abs(-10) . "<br>";
echo "Power: " . pow(2, 3) . "<br>";
echo "Square Root: " . sqrt(16) . "<br>";
echo "Max: " . max(10, 20, 30) . "<br>";
echo "Min: " . min(10, 20, 30) . "<br>";
echo "Random: " . rand(1, 100) . "<br><br>";


// 3. ARRAY FUNCTIONS
echo "---- ARRAY FUNCTIONS ----<br>";

$numbers = array(10, 20, 30, 40);

echo "Count: " . count($numbers) . "<br>";

array_push($numbers, 50);
echo "After Push: ";
print_r($numbers);

array_pop($numbers);
echo "<br>After Pop: ";
print_r($numbers);

echo "<br>Sum: " . array_sum($numbers) . "<br><br>";


// 4. DATE & TIME FUNCTIONS
echo "---- DATE & TIME ----<br>";

echo "Current Date: " . date("Y-m-d") . "<br>";
echo "Current Time: " . date("H:i:s") . "<br>";
echo "Timestamp: " . time() . "<br><br>";


// 5. VARIABLE HANDLING FUNCTIONS
echo "---- VARIABLE FUNCTIONS ----<br>";

$x = 100;
echo "Type: " . gettype($x) . "<br>";
var_dump($x);

echo "<br>Is Integer? ";
var_dump(is_int($x));

echo "<br><br>";


// 6. FILE HANDLING FUNCTIONS
echo "---- FILE HANDLING ----<br>";

$file = fopen("sample.txt", "w");
fwrite($file, "Hello PHP File Handling!");
fclose($file);

echo "File 'sample.txt' created and written successfully.<br><br>";


// 7. STRING CHECK FUNCTIONS
echo "---- STRING CHECK ----<br>";

$email = "test@example.com";

echo "Valid Email? ";
var_dump(filter_var($email, FILTER_VALIDATE_EMAIL));

echo "<br><br>";


// 8. TYPE CASTING FUNCTIONS
echo "---- TYPE CASTING ----<br>";

$num = "123";
$intNum = (int)$num;

echo "Original: " . gettype($num) . "<br>";
echo "Converted: " . gettype($intNum) . "<br>";


/*
===========================================
NOTES:
- PHP has 1000+ built-in functions
- They save development time
- Always check PHP documentation for usage
===========================================
*/
?>