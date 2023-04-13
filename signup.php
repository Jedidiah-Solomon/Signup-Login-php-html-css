<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	// Open the users.txt file
	$usersFile = fopen("users.txt", "a+");

	// Check if user already exists
	$userExists = false;
	while (!feof($usersFile)) {
		$line = fgets($usersFile);
		$lineParts = explode(",", $line);
		if ($email == $lineParts[1]) {
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
		header("Location: login.html");
		exit();
	} else {
		// User already exists, display error message
		echo "Error: User already exists.";
		fclose($usersFile);
	}
}
?>
