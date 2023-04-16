<?php
session_start();
ob_start(); 

// Get the form data
$email = $_POST['email'];
$password = $_POST['password'];

// Open the file for reading
$file = fopen("users.txt", "r");

// Loop through each line of the file
while (($line = fgets($file)) !== false) {
    // Split the line into an array
    $user = explode(",", $line);

    // Check if the email and password match
    if (trim($user[1]) == trim($email) && trim($user[2]) == trim($password)) {
        // Close the file
        fclose($file);

        // Store the email in session
        $_SESSION['email'] = $email;
        

        // Set login success message
        $_SESSION['login_success'] = true;

        // Redirect to the home page
        header("Location: home.php");
        exit();
    }
}

// Close the file
fclose($file);

// If the email and password don't match, redirect to the login page with an error message
header("Location: login.php?error=invalid_login");
exit();
?>
