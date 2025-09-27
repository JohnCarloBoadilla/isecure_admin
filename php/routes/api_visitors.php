<?php
require_once '../models/Database.php';

$db = DBModel::getConnection();

// API endpoint to get all visitors' face encodings for face recognition
if ($_SERVER['REQUEST_METHOD'] === 'GET' && strpos($_SERVER['REQUEST_URI'], '/api/visitors/all_face_encodings') !== false) {
    header('Content-Type: application/json');
    $stmt = $db->query("SELECT id, visitor_name, face_encoding FROM visitors WHERE face_encoding IS NOT NULL");
    $visitors = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($visitors);
    exit;
}

// API endpoint to update time_in when visitor is recognized entering
if ($_SERVER['REQUEST_METHOD'] === 'POST' && strpos($_SERVER['REQUEST_URI'], '/api/visitors/update_time_in') !== false) {
    header('Content-Type: application/json');
    $data = json_decode(file_get_contents('php://input'), true);
    $visitor_id = $data['visitor_id'] ?? null;
    if ($visitor_id) {
        $stmt = $db->prepare("UPDATE visitors SET time_in = NOW() WHERE id = :id AND time_in IS NULL");
        $stmt->execute(['id' => $visitor_id]);
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Invalid visitor_id']);
    }
    exit;
}

// API endpoint to update time_out when visitor leaves
if ($_SERVER['REQUEST_METHOD'] === 'POST' && strpos($_SERVER['REQUEST_URI'], '/api/visitors/update_time_out') !== false) {
    header('Content-Type: application/json');
    $data = json_decode(file_get_contents('php://input'), true);
    $visitor_id = $data['visitor_id'] ?? null;
    if ($visitor_id) {
        $stmt = $db->prepare("UPDATE visitors SET time_out = NOW() WHERE id = :id AND time_out IS NULL");
        $stmt->execute(['id' => $visitor_id]);
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Invalid visitor_id']);
    }
    exit;
}
?>
