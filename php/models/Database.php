<?php
require_once '../routes/utils/db.php';

class DBModel {
    public static function getConnection() {
        return get_db_connection();
    }
}
