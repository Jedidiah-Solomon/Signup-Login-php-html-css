<?php
session_start();
ob_start();

// Get the form data
$email = $_POST['email'];

// Open the file for reading
$file = fopen("users.txt", "r");

// Loop through each line of the file
while (($line = fgets($file)) !== false) {
    // Split the line into an array
    $user = explode(",", $line);

    // Check if the email matches
    if (trim($user[1]) == trim($email)) {
        // Generate a random password reset token
        $token = bin2hex(random_bytes(32));

        // Store the token and email in session
        $_SESSION['reset_token'] = $token;
        $_SESSION['reset_email'] = $email;

        // Send password reset email
        $to = $email;
        $subject = "Password reset request";
        $message = "Hello,\n\nYou have requested to reset your password. Please click on the following link to reset your password:\n\nhttps://jedidiah-solomon.github.io/JedybrownFolio/reset-password.php?token=$token\n\nIf you did not make this request, please ignore this email.\n\nThanks,\nThe Front-end Expert @Jedybrown Ventures.";
        $headers = "From: onwubikojedidiah@gmail.com\r\n";
        mail($to, $subject, $message, $headers);

        // Set success message and redirect to home page
        $_SESSION['reset_success'] = true;
        header("Location: home.php");
        exit();
    }
}

// Close the file
fclose($file);

// If the email is not found, redirect to the forgot password page with an error message
header("Location: forgot-psw.php?error=email_not_found");
exit();
?>
