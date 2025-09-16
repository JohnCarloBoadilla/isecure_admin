<?php
require_once 'Database.php';

class Personnel {
    public static function getAll() {
        $db = Database::getConnection();
        $stmt = $db->query("SELECT * FROM personnels ORDER BY name ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function add($data) {
        $db = Database::getConnection();
        $stmt = $db->prepare("INSERT INTO personnels (name, department, position, contact, email, face_photo) VALUES (:name,:department,:position,:contact,:email,:face_photo)");
        $stmt->execute($data);
        return $db->lastInsertId();
    }

    public static function delete($id) {
        $db = Database::getConnection();
        $stmt = $db->prepare("DELETE FROM personnels WHERE id=:id");
        $stmt->execute(['id'=>$id]);
        return $stmt->rowCount();
    }
}