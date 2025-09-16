<?php
require_once 'Database.php';

class Visitor {
    public static function getAll() {
        $db = Database::getConnection();
        $stmt = $db->query("SELECT * FROM visitors ORDER BY datetime_request DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getPending() {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM visitors WHERE status='pending' ORDER BY datetime_request DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function updateStatus($id, $status) {
        $db = Database::getConnection();
        $stmt = $db->prepare("UPDATE visitors SET status=:status WHERE id=:id");
        $stmt->execute(['status'=>$status, 'id'=>$id]);
        return $stmt->rowCount();
    }
}
