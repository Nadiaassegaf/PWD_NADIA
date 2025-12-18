<?php
class User {
    private $conn;
    private $table = "users";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function login($username, $password) {
        $sql = "SELECT * FROM {$this->table}
                WHERE username = :username
                AND password = :password";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $password);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
