<?php
require_once '../Models/Admin.php';

function sanitizeInput($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['role']) && isset($_POST['id'])) {
        $username = sanitizeInput($_POST['username']);
        $email = sanitizeInput($_POST['email']);
        $_SESSION['email'] = $email;
        $password = sanitizeInput($_POST['password']);
        $role = sanitizeInput($_POST['role']);
        $id = sanitizeInput($_POST['id']);
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $newAdmin = new Admin();
            $newAdmin->addUser($username, $email, $password, $role,$id);
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
