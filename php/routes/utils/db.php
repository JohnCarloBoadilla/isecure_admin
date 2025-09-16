<?php
function get_db_connection() {
    $host = "localhost";
    $db   = "your_database_name";
    $user = "your_db_user";
    $pass = "your_db_password";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        exit;
    }
}
?>