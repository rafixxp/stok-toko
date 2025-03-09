<?php

session_start();
require './koneksi.php';

if (isset($_POST['login'])){
  $user = mysqli_real_escape_string($con, $_POST['user']);
  $pass = mysqli_real_escape_string($con, $_POST['pass']);

  $attempt = $con->query("SELECT * FROM users WHERE username = '$user'");
  $attempt = mysqli_fetch_array($attempt);

  if($user == $attempt['username'] && password_verify($pass, $attempt['password'])){
    $_SESSION['user'] = $attempt;
    header('Location: ./index.php?view=home');
    exit;
  }
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Stok Toko</title>
  <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap-icons.css">
  <script type="text/javascript" src="./assets/js/popper.min.js"></script>
  <script type="text/javascript" src="./assets/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="./assets/js/jquery.min.js"></script>
  <style>
    /* Menjaga card berada di tengah-tengah layar */
    .login-container {
      height: 90vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
  </style>
</head>
<body>

  <div class="login-container">
    <div class="card" style="width: 100%; max-width: 400px;">
      <div class="card-body">
        <h5 class="card-title text-center mb-4">Login</h5>
        <form method="POST" action="./login.php">
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" name="user" id="email" placeholder="Masukkan email" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="pass" id="password" placeholder="Masukkan password" required>
          </div>
          <button type="submit" class="btn btn-primary w-100" name="login">Login</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>

