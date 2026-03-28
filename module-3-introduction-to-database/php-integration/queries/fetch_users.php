<?php
require_once __DIR__ . '/../connection/odbc_connection.php';

$conn = getConnection();

$sql = "SELECT * FROM users";
$result = odbc_exec($conn, $sql);

$users = [];

while ($row = odbc_fetch_array($result)) {
    $users[] = $row;
}

print_r($users);
?>