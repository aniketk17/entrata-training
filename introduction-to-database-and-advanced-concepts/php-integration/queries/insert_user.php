<?php
require_once __DIR__ . '/../connection/odbc_connection.php';

$conn = getConnection();

$name = "Test User";
$email = "testuser@mail.com";

$sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";

$result = odbc_exec($conn, $sql);

if ($result) {
    echo "User inserted successfully";
} else {
    echo "Insert failed";
}
?>