<?php
require_once __DIR__ . '/../Database/database.php';
class Login
{   
    private $conn;
    private $users;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
        // Dummy user data for demonstration purposes
        $this->users = [
            ['username' => 'admin', 'password' => 'password'],
            ['username' => 'user', 'password' => 'userpass'],
        ];
    }

    public function validateCredentials($username, $password)
    {
        foreach ($this->users as $user) {
            if ($user['username'] === $username && $user['password'] === $password) {
                return true;
            }
        }
        return false;
    }
}