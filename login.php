<?php
// Get the form data
$email = $_POST['email'];
$password = $_POST['password'];

// Open the file for reading
$file = fopen("users.txt", "r");

// Loop through each line of the file
while (($line = fgets($file)) !== false) {
	// Split the line into an array
	$user = explode(", ", $line);

	// Check if the email and password match
	if ($user[1] == $email && $user[2] == $password) {
		// Close the file
		fclose($file);

		// Redirect to the home page
		header("Location: home.html");
		exit;
	}
}

// Close the file
fclose($file);

// If the email and password don't match, redirect to the signup page
header("Location: signup.html");
exit;
?>
