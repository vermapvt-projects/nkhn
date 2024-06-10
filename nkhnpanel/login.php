<?php
include "../includes/config.php";
if (isset($_POST['submit'])) {
  $email = mysqli_escape_string($conn, $_POST['email']);
  $password =  mysqli_escape_string($conn, $_POST['password']);
  $password = hash("sha256", $password);
  $sql = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password';");
  $session = mysqli_fetch_assoc($sql)['session'];
  if (mysqli_num_rows($sql) > 0) {
    setcookie("session", $session, time() + (30 * 24 * 60 * 60));
    header("Location: index.php");
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <form class="login-form" method="POST">
      <h2><img src="../assets/logo/Frame 270.png" style="width:100%"></h2>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" style="width: 90%;" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" style="width: 90%;"  required>
      </div>
      <button type="submit" name="submit">Login</button>
    </form>
  </div>
</body>
</html>
