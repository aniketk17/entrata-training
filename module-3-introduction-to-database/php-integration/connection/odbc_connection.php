<?php
require_once __DIR__ . '/../config/db_config.php';

function getConnection() {
    $conn = odbc_connect(DB_DSN, DB_USER, DB_PASS);

    if (!$conn) {
        die("ODBC Connection Failed: " . odbc_errormsg());
    }

    return $conn;
}
?>