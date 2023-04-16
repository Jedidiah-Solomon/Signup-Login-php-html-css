<?php
session_start();
if (isset($_SESSION['email'])) {
    header("Location: home.php");
    exit();
}

$filename = "users.txt";

// Check if the file exists and has content
if (file_exists($filename) && filesize($filename) > 0) {
    // Open the file and read its contents
    $usersFile = fopen($filename, "r");
    $userDetails = fread($usersFile, filesize($filename));
    fclose($usersFile);

    // Redirect to login page
    header("Location: login.php");
    exit();
} else {
    // Redirect to signup page
    header("Location: signup.php");
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
                <li><a href="home.php">Home</a></li>
                <li><a href="signup.php">Signup</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>

    <main>
    </main>

    <footer>
        <p>&copy; 2023 Jedidiah Solomon. All rights reserved.</p>
    </footer>
</body>
</html>
