<?php
session_start();
if (isset($_SESSION['email'])) {
    header("Location: home.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Website</title>
    <link rel="stylesheet" type="text/css" href="assets/style2.css">
</head>
<body>
    <header>
        <h1>Welcome to My Website</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="signup.php">Signup</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <p>Welcome to My Website! Please sign up or log in to access the features.</p>
    </main>

    <footer>
        <p>&copy; 2023 Jedidiah Solomon. All rights reserved.</p>
    </footer>
</body>
</html>
