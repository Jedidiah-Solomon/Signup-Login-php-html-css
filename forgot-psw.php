<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password</title>
	<link rel="stylesheet" href="assets/style.css">
</head>
<body>
	<div class="box">
		<h2>Forgot Password</h2>
		<?php if (isset($_GET['error']) && $_GET['error'] == 'email_not_found'): ?>
			<p class="error-1">Email address not found. Please try again.</p>
		<?php endif; ?>
		<?php if (isset($_SESSION['reset_success'])): ?>
			<p class="success">An email has been sent to your address with instructions to reset your password.</p>
			<?php unset($_SESSION['reset_success']); ?>
		<?php else: ?>
	    	<form action="config-3.php" method="post">
	      		<div class="input-box">
	        		<input type="email" id="email" name="email"  autocomplete="off" required>
	        		<label for="email">Email</label>
	      		</div>
	        	<input type="submit" value="Submit">
	    	</form>
	    <?php endif; ?>
	    <br><span class="follow-up">Remembered password <a href="login.php">Login?</a></span><br><br>
  	</div>
</body>
</html>
