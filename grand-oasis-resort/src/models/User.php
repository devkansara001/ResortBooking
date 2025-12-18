<?php
class User {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function createUser($username, $password) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $user = [
            'username' => $username,
            'password' => $hashedPassword
        ];
        $this->db->users->insertOne($user);
    }

    public function findUserByUsername($username) {
        return $this->db->users->findOne(['username' => $username]);
    }

    public function verifyPassword($inputPassword, $storedHash) {
        return password_verify($inputPassword, $storedHash);
    }
}
?>