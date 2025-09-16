<?php
require_once 'Database.php';

class Log {
    public static function getFiltered($type='all',$status='all') {
        $db = Database::getConnection();
        $sql = "SELECT * FROM logs WHERE 1=1";
        $params = [];

        if($type !== 'all'){
            $sql .= " AND type=:type";
            $params['type']=$type;
        }
        if($status !== 'all'){
            $sql .= " AND status=:status";
            $params['status']=$status;
        }

        $sql .= " ORDER BY logged_at DESC";
        $stmt = $db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}