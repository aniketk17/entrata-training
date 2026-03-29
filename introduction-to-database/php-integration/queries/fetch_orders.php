<?php
require_once __DIR__ . '/../connection/odbc_connection.php';

$conn = getConnection();

$sql = "SELECT u.name, o.amount
        FROM users u
        JOIN orders o ON u.id = o.user_id";

$result = odbc_exec($conn, $sql);

while ($row = odbc_fetch_array($result)) {
    echo $row['name'] . " - " . $row['amount'] . "<br>";
}
?>