<?php
require_once '../routes/utils/db.php';

class Database {
    public static function getConnection() {
        return get_db_connection();
    }
}