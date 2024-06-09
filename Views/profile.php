<!DOCTYPE html>
<html lang="en">
<link rel="icon" href="../Data/Untitled (1).png">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="Data/OIG.jpg">
    <style>
        body {
            background-image: url(Data/2339301.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            font-family: 'Arial', sans-serif;
            color: #ffffff;
        }

        .user-profile {
            margin-top: 40px;
            background-color: rgba(0, 0, 0, 0.7);
            /* Semi-transparent background */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            /* Add shadow for depth */
        }

        .user-profile h1 {
            font-size: 3.5rem;
            /* Larger font size */
            margin-top: 0;
            font-weight: bold;
            text-align: center;
        }

        .user-profile p {
            margin: 10px 0;
            font-size: 1.2rem;
            text-align: center;
        }

        .user-profile strong {
            font-weight: bold;
            margin-right: 10px;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .user-profile h1 {
                font-size: 2.5rem;
            }

            .user-profile p {
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="user-profile">
            <h1>User Profile</h2>
                <?php
                session_start();
                require '../Models/Student.php';
                $student = new Student();
                $useremail = $_SESSION['email'];
                $userInfo = $student->getUserInfoByEmail($useremail);
                ?>
                <p><strong>ID:</strong> <?php echo $userInfo['id']; ?></p>
                <p><strong>Email:</strong> <?php echo $userInfo['email']; ?></p>
                <p><strong>Username:</strong> <?php echo $userInfo['username']; ?></p>
                <p><strong>Password:</strong> <?php echo $userInfo['password']; ?></p>
        </div>
    </div>
</body>

</html>