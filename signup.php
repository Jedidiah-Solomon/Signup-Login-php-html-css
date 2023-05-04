<?php
$errorMessage = '';
if (isset($_GET['error']) && $_GET['error'] == 'user_exists') {
    $errorMessage = 'User exist, please use a different email address';
    
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="./assets/style.css">
</head>
<body>
    <div class="box">
    <h2>Register With Us</h2>
    <?php if (!empty($errorMessage)): ?>
        <p class="error-1"><?php echo $errorMessage; ?></p>
    <?php endif; ?>
    <form action="config-1.php" method="post">
      <div class="input-box">
        <input type="text" id="name" name="name" autocomplete="off" required>
        <label for="name">Username</label>
      </div>
      <div class="input-box">
        <input type="email" id="email" name="email"  autocomplete="off" required>
        <label for="email">Email</label>
      </div>
      <div class="input-box">
        <input type="password" id="password" name="password" autocomplete="off" required>
        <label for="password">Password</label>
      </div>
        <input type="submit" value="Sign Up">
        <span class="follow-up">Returning user <a href="login.php">Login?</a></span><br><br>

        <input type="checkbox"  onclick="showMe();" id="remember1" name="remember" value="showme">
        <label for="remember1" class="remember"> Remeber me</label><br>
    </form>
  </div>
  
  <script type="text/javascript" src="./scripts/custom.js"></script>

</body>
</html>
