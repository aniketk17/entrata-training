<?php
/*
===========================================
            PHP OPERATORS
===========================================

Operators are used to perform operations on variables and values.

TYPES OF OPERATORS:
1. Arithmetic Operators
2. Assignment Operators
3. Comparison Operators
4. Increment / Decrement Operators
5. Logical Operators
6. String Operators
7. Array Operators

===========================================
*/


// 1. ARITHMETIC OPERATORS
echo "---- ARITHMETIC OPERATORS ----<br>";

$a = 10;
$b = 5;

echo "Addition: " . ($a + $b) . "<br>";
echo "Subtraction: " . ($a - $b) . "<br>";
echo "Multiplication: " . ($a * $b) . "<br>";
echo "Division: " . ($a / $b) . "<br>";
echo "Modulus: " . ($a % $b) . "<br>";
echo "Exponentiation: " . ($a ** $b) . "<br><br>";


// 2. ASSIGNMENT OPERATORS
echo "---- ASSIGNMENT OPERATORS ----<br>";

$x = 10;
$x += 5;  // x = x + 5
echo "x += 5 → " . $x . "<br>";

$x -= 3;
echo "x -= 3 → " . $x . "<br>";

$x *= 2;
echo "x *= 2 → " . $x . "<br>";

$x /= 4;
echo "x /= 4 → " . $x . "<br><br>";


// 3. COMPARISON OPERATORS
echo "---- COMPARISON OPERATORS ----<br>";

$p = 10;
$q = "10";

var_dump($p == $q);   // true (value equal)
echo "<br>";

var_dump($p === $q);  // false (type + value)
echo "<br>";

var_dump($p != $q);   // false
echo "<br>";

var_dump($p > 5);     // true
echo "<br><br>";


// 4. INCREMENT / DECREMENT
echo "---- INCREMENT / DECREMENT ----<br>";

$i = 5;

echo "i++: " . $i++ . "<br>"; // prints 5, then increments
echo "After i++: " . $i . "<br>";

echo "++i: " . ++$i . "<br>"; // increments first

echo "i--: " . $i-- . "<br>";
echo "After i--: " . $i . "<br><br>";


// 5. LOGICAL OPERATORS
echo "---- LOGICAL OPERATORS ----<br>";

$age = 20;

var_dump($age > 18 && $age < 30); // AND
echo "<br>";

var_dump($age < 18 || $age > 15); // OR
echo "<br>";

var_dump(!($age < 18)); // NOT
echo "<br><br>";


// 6. STRING OPERATORS
echo "---- STRING OPERATORS ----<br>";

$str1 = "Hello";
$str2 = "World";

echo $str1 . " " . $str2 . "<br>"; // Concatenation

$str1 .= " PHP"; // Append
echo $str1 . "<br><br>";


// 7. ARRAY OPERATORS
echo "---- ARRAY OPERATORS ----<br>";

$arr1 = array("a" => 1, "b" => 2);
$arr2 = array("c" => 3, "d" => 4);

$result = $arr1 + $arr2; // Union

print_r($result);

echo "<br>";

var_dump($arr1 == $arr2);  // false
echo "<br>";

var_dump($arr1 === $arr2); // false


/*
===========================================
NOTES:
- == compares values only
- === compares value + type (strict)
- . is used for string concatenation
- ++ and -- are very important in loops
===========================================
*/
?>