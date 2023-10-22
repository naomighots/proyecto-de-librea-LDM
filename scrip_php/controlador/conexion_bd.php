<?php
class db {
    static function connect() {
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "mydb";
        $conn = new mysqli($host, $user, $pass, $db);
        if ($conn->connect_error) {
            die("Error de conexion: " . $conn->connect_error);
        }
        return $conn;
    }
}
?>