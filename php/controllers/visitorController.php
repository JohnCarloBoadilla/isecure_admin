<?php
require_once '../models/Visitor.php';

$action = $_GET['action'] ?? '';
$id = $_GET['id'] ?? '';

if($action && $id) {
    if($action === 'approve') {
        Visitor::updateStatus($id,'approved');
    } elseif($action === 'deny') {
        Visitor::updateStatus($id,'denied');
    }
    header("Location: ../routes/pendings.php");
    exit;
}