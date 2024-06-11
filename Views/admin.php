<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Data/admin.css">
    <title>Admin Panel</title>
</head>
<body>
    <section>
        <h1>Admin Panel</h1>
        <h2>The Users list</h2>
        <?php
        require '../Models/Admin.php';
        $admin = new Admin();
        $result = $admin->listUsers('*');
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
    </section>
    <section>
    <h2>Search User:</h2>
        <form action="../Controllers/adminSearch.php" method="post" autocomplete="off">
            <label for="searchUser">Search: </label>
            <input type="text" id="searchUser" name="search" required>
            <button type="submit">Search User</button>
        </form>
    </section>
    <section>
        <h2>Add User:</h2>
        <form action="../Controllers/adminAdd.php" method="post" autocomplete="off">
            <label for="addUsername">Username:</label>
            <input type="text" id="addUsername" name="username" required>
            <label for="addPassword">Password:</label>
            <input type="password" id="addPassword" name="password" required>
            <label for="addEmail">Email:</label>
            <input type="text" id="addEmail" name="email" required>
            <label for="addID">ID:</label>
            <input type="number" id="addID" name="id" required>
            <label for="addRole">Role:</label>
            <input type="text" id="addRole" name="role" required>
            <button type="submit">Add User</button>
        </form>
    </section>
    <section>
        <h2>Remove User:</h2>
        <form action="../Controllers/adminDelete.php" method="post" autocomplete="off">
            <label for="removeUserEmail">User email to Remove:</label>
            <input type="email" id="removeUserId" name="email" required>
            <button type="submit">Remove User</button>
        </form>
    </section>
    <section>
        <h2>Update User:</h2>
        <form action="../Controllers/adminUpdate.php" method="post" autocomplete="off">
            <label for="OldEmail">Old email:</label>
            <input type="text" id="OldEmail" name="oldemail" required>

            <label for="updateUsername">New Username:</label>
            <input type="text" id="updateUsername" name="username" required>

            <label for="updatePassword">New Password:</label>
            <input type="password" id="updatePassword" name="password" required>

            <label for="updateEmail">New Email:</label>
            <input type="text" id="updateEmail" name="email" required>

            <label for="updateId">New ID:</label>
            <input type="number" id="updateId" name="id" required>

            <label for="updateRole">New Role:</label>
            <input type="text" id="updateRole" name="role" required>

            <button type="submit">Update User</button>
        </form>
    </section>

</body>

</html>