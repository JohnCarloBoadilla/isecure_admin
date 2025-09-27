<?php
require 'auth_check.php';
require 'audit_log.php';
require_once '../models/Database.php';

$pdo = DBModel::getConnection();

header('Content-Type: application/json');

try {
    $stmt = $pdo->query("SELECT id, full_name, contact_number, email, time_in, time_out, status FROM visitors ORDER BY date DESC, time_in DESC");
    $visitors = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($visitors);
} catch (PDOException $e) {
    echo json_encode([]);
}
