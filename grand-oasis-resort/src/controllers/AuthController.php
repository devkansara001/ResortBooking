<?php

namespace App\Controllers;

use App\Models\User;

class AuthController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function login($email, $password)
    {
        $user = $this->userModel->findByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            // Start session and set user data
            session_start();
            $_SESSION['user_id'] = $user['_id'];
            $_SESSION['user_email'] = $user['email'];
            return true;
        }

        return false;
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
    }

    public function isAuthenticated()
    {
        session_start();
        return isset($_SESSION['user_id']);
    }
}