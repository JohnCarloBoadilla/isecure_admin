<?php
require 'auth_check.php';
require_once '../models/Database.php';

$db = DBModel::getConnection();

$id = $_GET['id'] ?? null;

if (!$id) {
    die("Visitor ID missing.");
}

$stmt = $pdo->prepare("DELETE FROM visitors WHERE id = :id");
$stmt->execute([':id' => $id]);

header("Location: visitors.php");
exit;
