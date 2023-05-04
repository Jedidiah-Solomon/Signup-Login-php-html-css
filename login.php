<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="assets/style.css">
</head>
<body>
	<div class="box">
	<h2>Welcome Back - Login</h2>
	<?php if (isset($_GET['error']) && $_GET['error'] == 'invalid_login'): ?>
		<p class="error-1">Invalid email or password. Please try again.</p>
	<?php endif; ?>
    <form action="config-2.php" method="post">
      <div class="input-box">
        <input type="email" id="email" name="email"  autocomplete="off" required>
        <label for="email">Email</label>
      </div>
      <div class="input-box">
        <input type="password" id="password" name="password" autocomplete="off" required>
        <label for="password">Password</label>
      </div>
        <input type="submit" value="Login">
        <span class="follow-up">No account <a href="signup.php">Register?</a></span><br><br>

        <input type="checkbox"  onclick="showMe();" id="remember1" name="remember" value="showme">
        <label for="remember1" class="remember"> Remeber me</label>

        <span class="forgot-psw">Forgot <a href="forgot-psw.php">Password?</a></span><br><br>

    </form>
  </div>


  <script type="text/javascript" src="./scripts/custom.js"></script>
</body>
</html>
