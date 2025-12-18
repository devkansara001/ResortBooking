<?php

namespace App\Controllers;

use App\Models\User;

class HomeController
{
    public function index()
    {
        // Load the home view
        include '../src/views/header.php';
        include '../src/views/navbar.php';
        include '../src/views/home.php'; // Assuming home.php is the view for the home page
        include '../src/views/footer.php';
    }
}