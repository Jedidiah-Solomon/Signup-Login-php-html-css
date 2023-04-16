<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Open the users.txt file
    $usersFile = fopen("users.txt", "a+");

    // Check if user already exists
    $userExists = false;
    while (($line = fgets($usersFile)) !== false) {
        $lineParts = explode(",", $line);
        if (trim($email) == trim($lineParts[1])) {
            $userExists = true;
            break;
        }
    }

    if (!$userExists) {
        // Add user to the users.txt file
        $userData = $name . "," . $email . "," . $password . "\n";
        fwrite($usersFile, $userData);
        fclose($usersFile);

        // Redirect to login page
        header("Location: login.php");
        exit();
    } else {
        fclose($usersFile);

        // Redirect to signup page with error message
        header("Location: signup.php?error=user_exists");
        exit();
    }
}
?>
