<?php
session_start();
require_once '../Models/EducationalUser.php';

function sanitizeInput($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['role'])) {
        $username = sanitizeInput($_POST['username']);
        $email = sanitizeInput($_POST['email']);
        $password = sanitizeInput($_POST['password']);
        $role = sanitizeInput($_POST['role']);
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $newUser = new EducationalUser();
            $newUser->register($username, $email, $password, $role);
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
