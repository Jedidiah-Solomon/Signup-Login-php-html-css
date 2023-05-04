<?php
session_start();
ob_start();

// Check if user has clicked the reset button and if the reset token matches
if (isset($_POST['reset']) && $_POST['reset_token'] == $_SESSION['reset_token']) {
    // Get the new password
    $new_password = $_POST['new_password'];
    
    // Open the file for reading and writing
    $file = fopen("users.txt", "r+");

    // Loop through each line of the file
    while (($line = fgets($file)) !== false) {
        // Split the line into an array
        $user = explode(",", $line);

        // Check if the email matches
        if (trim($user[1]) == trim($_SESSION['reset_email'])) {
            // Update the password in the file
            fseek($file, -$line, SEEK_CUR);
            $user[2] = password_hash($new_password, PASSWORD_DEFAULT);
            fwrite($file, implode(",", $user));
            fflush($file);

            // Set success message and redirect to login page
            $_SESSION['reset_success'] = true;
            header("Location: login.php");
            exit();
        }
    }

    // Close the file
    fclose($file);

    // If the email is not found, redirect to the forgot password page with an error message
    header("Location: forgot-psw.php?error=email_not_found");
    exit();
}

// If the reset token does not match, redirect to the forgot password page with an error message
if ($_GET['token'] != $_SESSION['reset_token']) {
    header("Location: forgot-psw.php?error=invalid_reset_token");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>
    <h1>Reset Password</h1>
    <?php
        // Show error message if applicable
        if (isset($_GET['error'])) {
            echo "<p style='color: red;'>Error: ";
            switch ($_GET['error']) {
                case 'email_not_found':
                    echo "Email not found</p>";
                    break;
                case 'invalid_reset_token':
                    echo "Invalid reset token</p>";
                    break;
                default:
                    echo "Unknown error</p>";
                    break;
            }
        }
    ?>
    <form method="post">
        <label for="new_password">New Password:</label>
        <input type="password" name="new_password" required><br><br>
        <input type="hidden" name="reset_token" value="<?php echo $_GET['token']; ?>">
        <input type="submit" name="reset" value="Reset Password">
    </form>
</body>
</html>
