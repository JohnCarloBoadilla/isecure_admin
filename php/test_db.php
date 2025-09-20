<?php
require_once 'models/Database.php';

try {
    $db = DBModel::getConnection();
    echo "Database connection successful!";
} catch (Exception $e) {
    echo "Database connection failed: " . $e->getMessage();
}