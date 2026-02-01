<?php
require_once __DIR__ . '/db.php';

class User {
    private PDO $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    // return: true | 'exists' | false
    public function register(string $username, string $email, string $password, string $role = 'user') {
        $check = $this->conn->prepare("SELECT id FROM users WHERE username = :u OR email = :e LIMIT 1");
        $check->execute([':u' => $username, ':e' => $email]);

        if ($check->fetch()) return 'exists';

        $stmt = $this->conn->prepare("
            INSERT INTO users (username, email, password, role)
            VALUES (:u, :e, :p, :r)
        ");

        return $stmt->execute([
            ':u' => $username,
            ':e' => $email,
            ':p' => $password,   // ✅ PA HASH
            ':r' => $role
        ]);
    }

    // return: user array | false
    public function login(string $username, string $password) {
        $stmt = $this->conn->prepare("SELECT id, username, password, role FROM users WHERE username = :u LIMIT 1");
        $stmt->execute([':u' => $username]);

        $user = $stmt->fetch();
        if (!$user) return false;

        // ✅ PA password_verify, krahasim direkt
        if ($password !== $user['password']) return false;

        unset($user['password']);
        return $user;
    }
}
