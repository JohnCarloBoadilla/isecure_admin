<?php
require_once 'Database.php';

class Vehicle {
    public static function getAll() {
        $db = DBModel::getConnection();
        $stmt = $db->query("SELECT * FROM vehicles ORDER BY logged_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getByStatus($status) {
        $db = DBModel::getConnection();
        $stmt = $db->prepare("SELECT * FROM vehicles WHERE status=:status ORDER BY logged_at DESC");
        $stmt->execute(['status'=>$status]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function updateStatus($id, $status) {
        $db = DBModel::getConnection();
        $stmt = $db->prepare("UPDATE vehicles SET status=:status WHERE id=:id");
        $stmt->execute(['status'=>$status, 'id'=>$id]);
        return $stmt->rowCount();
    }
}