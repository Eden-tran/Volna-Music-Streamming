<?php
class connection
{
    var $pdo;
    private static $instance = null, $conn = null;

    private function __construct()
    {
        try {
            $this->pdo = new PDO(
                'mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME,
                DB_USER,
                DB_PASSWORD,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES => false,
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
                ]
            );
            self::$conn = $this->pdo;
            return $this->pdo;
        } catch (PDOException $errors) {
            exit('DB Error: ' . $errors->getMessage()); // Để về return false;  khi hoàn thành dự án.
        }
    }

    public static function getInstance() // kiểm tra xem đã gọi db chưa tránh gọi lại 2 lần .
    {
        if (self::$instance == null) {
            $connection = new connection();
            self::$instance = self::$conn;
        }

        return self::$instance;
    }
}