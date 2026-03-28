<?php
require_once __DIR__ . '/../connection/odbc_connection.php';

$conn = getConnection();

if ($conn) {
    echo "ODBC Connection Successful!";
}
?>