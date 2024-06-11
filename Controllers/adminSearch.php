<?php
session_start();
require_once '../Models/Admin.php';

function sanitizeInput($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['search'])) {
        $search = sanitizeInput($_POST['search']);
        $newAdmin = new Admin();
        $result = $newAdmin->searchUser($search);
        $_SESSION['result'] = $result;
        $newAdmin->redirect('../Views/search.php');
    } else {
        echo "All fields are required.";
        exit();
    }
} else {
    include('../Views/error.html');
    exit();
}
