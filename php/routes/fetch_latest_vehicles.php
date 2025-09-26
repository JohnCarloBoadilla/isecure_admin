<?php
require 'auth_check.php';
require_once '../models/Database.php';

$pdo = DBModel::getConnection();

header('Content-Type: application/json');

try {
    $stmt = $pdo->prepare("SELECT vehicle_brand, vehicle_model, vehicle_owner, created_at
                           FROM vehicles
                           WHERE status = 'Inside'
                           ORDER BY created_at DESC
                           LIMIT 5");  // fetch 5 most recent
    $stmt->execute();
    $vehicles = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($vehicles);
} catch (Exception $e) {
    echo json_encode([]);
}
