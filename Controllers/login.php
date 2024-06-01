<?php
session_start();
require_once '../Models/User.php';

function sanitizeInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = sanitizeInput($_POST['email']);
        $password = sanitizeInput($_POST['password']);
        
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $newUser = new User();
            $newUser->login($email, $password);
        } else {
            echo "Invalid email format.";
            exit();
        }
    } else {
        echo "All fields are required.";
        exit();
    }
} else {
    include('../Views/error.html');
    exit();
}
