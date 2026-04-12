?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP Form Example</title>
</head>
<body>

<h2>User Registration Form</h2>

<form method="POST" action="">
    Name: <input type="text" name="name"><br><br>
    Email: <input type="text" name="email"><br><br>
    Age: <input type="number" name="age"><br><br>

    Gender:
    <input type="radio" name="gender" value="Male"> Male
    <input type="radio" name="gender" value="Female"> Female<br><br>

    <input type="submit" name="submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    echo "<h3>Form Data:</h3>";

    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $age = htmlspecialchars($_POST["age"]);
    $gender = isset($_POST["gender"]) ? $_POST["gender"] : "Not selected";

    if (empty($name) || empty($email) || empty($age)) {
        echo "Please fill all required fields.<br>";
    } else {
        echo "Name: " . $name . "<br>";
        echo "Email: " . $email . "<br>";
        echo "Age: " . $age . "<br>";
        echo "Gender: " . $gender . "<br>";
    }
}
?>

</body>
</html>