<?php
header('Content-Type: application/json');
require_once '../models/Database.php';

// Get the POST body
$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['id']) || !isset($data['action'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing id or action']);
    exit;
}

$visitorId = $data['id'];
$action = strtolower($data['action']);

if (!in_array($action, ['approve', 'deny'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid action']);
    exit;
}

try {
    $conn = Database::getConnection();
    
    // Update the visitor status
    $stmt = $conn->prepare("UPDATE visitors SET status = :status WHERE id = :id");
    $stmt->bindParam(':status', $action);
    $stmt->bindParam(':id', $visitorId);
    $stmt->execute();

    echo json_encode([
        'message' => "Visitor status updated successfully to '{$action}'",
        'visitor_id' => $visitorId,
        'status' => $action
    ]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: '.$e->getMessage()]);
}
?>
