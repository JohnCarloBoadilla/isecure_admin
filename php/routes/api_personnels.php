<?php
require_once '../models/Database.php';

$db = DBModel::getConnection();

// API endpoint to get all personnels' face encodings for face recognition
if ($_SERVER['REQUEST_METHOD'] === 'GET' && strpos($_SERVER['REQUEST_URI'], '/api/personnels/all_face_encodings') !== false) {
    header('Content-Type: application/json');
    $stmt = $db->query("SELECT id, name, face_encoding FROM personnels WHERE face_encoding IS NOT NULL");
    $personnels = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($personnels);
    exit;
}

// API endpoint to update time_in when personnel is recognized entering
if ($_SERVER['REQUEST_METHOD'] === 'POST' && strpos($_SERVER['REQUEST_URI'], '/api/personnels/update_time_in') !== false) {
    header('Content-Type: application/json');
    $data = json_decode(file_get_contents('php://input'), true);
    $personnel_id = $data['personnel_id'] ?? null;
    if ($personnel_id) {
        $stmt = $db->prepare("UPDATE personnels SET time_in = NOW() WHERE id = :id AND time_in IS NULL");
        $stmt->execute(['id' => $personnel_id]);
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Invalid personnel_id']);
    }
    exit;
}

// API endpoint to update time_out when personnel leaves
if ($_SERVER['REQUEST_METHOD'] === 'POST' && strpos($_SERVER['REQUEST_URI'], '/api/personnels/update_time_out') !== false) {
    header('Content-Type: application/json');
    $data = json_decode(file_get_contents('php://input'), true);
    $personnel_id = $data['personnel_id'] ?? null;
    if ($personnel_id) {
        $stmt = $db->prepare("UPDATE personnels SET time_out = NOW() WHERE id = :id AND time_out IS NULL");
        $stmt->execute(['id' => $personnel_id]);
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Invalid personnel_id']);
    }
    exit;
}
?>