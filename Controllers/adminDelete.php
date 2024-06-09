<?php
require_once '../Models/Admin.php';

function sanitizeInput($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email'])) {
        $email = sanitizeInput($_POST['email']);
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $newAdmin = new Admin();
            $newAdmin->deleteUser($email);
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
