<?php
/*

PHP supports several data types. These are used to store different kinds of values.

MAIN DATA TYPES IN PHP:
1. String
2. Integer
3. Float (Double)
4. Boolean
5. Array
6. Object
7. NULL
8. Resource (advanced)

*/

// 1. STRING
echo "---- STRING ----<br>";
$name = "Aniket";
echo "Name: " . $name . "<br>";
echo "Type: " . gettype($name) . "<br><br>";


// 2. INTEGER
echo "---- INTEGER ----<br>";
$age = 21;
echo "Age: " . $age . "<br>";
echo "Type: " . gettype($age) . "<br><br>";


// 3. FLOAT (DOUBLE)
echo "---- FLOAT ----<br>";
$price = 99.99;
echo "Price: " . $price . "<br>";
echo "Type: " . gettype($price) . "<br><br>";


// 4. BOOLEAN
echo "---- BOOLEAN ----<br>";
$isStudent = true;
echo "Is Student: " . $isStudent . "<br>"; // true prints as 1
echo "Type: " . gettype($isStudent) . "<br><br>";


// 5. ARRAY
echo "---- ARRAY ----<br>";
$colors = array("Red", "Green", "Blue");
echo "Colors: ";
print_r($colors); // prints array
echo "<br>Type: " . gettype($colors) . "<br><br>";


// 6. OBJECT
echo "---- OBJECT ----<br>";

class Car {
    public $brand;
    public $model;

    function __construct($brand, $model) {
        $this->brand = $brand;
        $this->model = $model;
    }

    function display() {
        return "Car: " . $this->brand . " " . $this->model;
    }
}

$car1 = new Car("Toyota", "Fortuner");
echo $car1->display() . "<br>";
echo "Type: " . gettype($car1) . "<br><br>";


// 7. NULL
echo "---- NULL ----<br>";
$x = NULL;
echo "Value: ";
var_dump($x);
echo "<br>Type: " . gettype($x) . "<br><br>";



/*
NOTES:
- PHP is a loosely typed language.
- You don’t need to declare data types explicitly.
- PHP automatically detects the type of variable.
- gettype() function helps to check the type.
*/
?>