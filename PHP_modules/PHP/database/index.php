<?php

require_once __DIR__ . '/env.php';


loadEnv(__DIR__ . '/.env');

class Database {
    private static $instance = null;
    private $pdo;

    private function __construct() {
        $host = $_ENV['DB_HOST'];
        $port = $_ENV['DB_PORT'];
        $db   = $_ENV['DB_NAME'];
        $user = $_ENV['DB_USER'];
        $pass = $_ENV['DB_PASS'];

        try {
            $this->pdo = new PDO(
                "mysql:host=$host;port=$port;dbname=$db",
                $user,
                $pass
            );

            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            die("DB Error: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->pdo;
    }
}


$db = Database::getInstance();
$pdo = $db->getConnection();

$stmt = $pdo->query("SELECT * FROM blogs");
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

print_r($posts);