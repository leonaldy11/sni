<?php
require_once __DIR__ . '/../Models/Login.php';

class LoginController
{    
    private $model;

    public function __construct()
    {
        $this->model = new Login();
    }

    public function index()
    {
        require_once VIEW_PATH . 'login/index.php';
    }

    public function login()
    {
        // Implement login logic here
        // For example, validate user credentials and start a session
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            // Dummy validation for demonstration purposes
            if ($username === 'admin' && $password === 'password') {
                session_start();
                $_SESSION['user'] = $username;
                header('Location: /admin/dashboard');
                exit();
            } else {
                $error = 'Invalid username or password';
                require_once VIEW_PATH . 'login.php';
            }
        } else {
            require_once VIEW_PATH . 'login.php';
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: /login');
        exit();
    }
}