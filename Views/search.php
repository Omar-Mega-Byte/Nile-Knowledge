<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Data/search.css">
    <title>Admin Panel</title>
</head>

<body>
    <?php
    session_start();
    require_once '../Models/Admin.php';
    $result = $_SESSION['result'];
    $admin = new Admin();
    if (is_array($result) && count($result) > 0) {
        echo "<table>";
        echo "<tr><th>Username</th><th>Email</th><th>Password</th><th>Role</th><th>ID</th>";
        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['password'] . "</td>";
            echo "<td>" . $row['role'] . "</td>";
            echo "<td>" . $row['id'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>
</body>

</html>