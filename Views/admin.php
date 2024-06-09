<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>
<style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #e0f7fa;
            margin: 0;
            padding: 0;
        }

        section {
            background: #ffffff;
            margin: 20px auto;
            padding: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            max-width: 800px;
            border-radius: 8px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        section:hover {
            transform: scale(1.02);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
        }

        h1, h2 {
            color: #00796b;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
            transition: background-color 0.3s ease;
        }

        th {
            background-color: #004d40;
            color: #ffffff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover td {
            background-color: #b2dfdb;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin: 10px 0 5px;
            color: #00796b;
        }

        input {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        input:focus {
            border-color: #00796b;
            box-shadow: 0 0 8px rgba(0, 121, 107, 0.3);
            outline: none;
        }

        button {
            padding: 10px;
            background-color: #00796b;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        button:hover {
            background-color: #004d40;
            transform: scale(1.05);
        }

        .container {
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
    </style>

<body>
    <section>
        <h1>Admin Panel</h1>
        <h2>The Users list</h2>
        <?php
        require '../Models/Admin.php';
        $admin = new Admin();
        $result = $admin->listUsers();
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