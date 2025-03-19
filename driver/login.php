<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "vbams";
$conn = mysqli_connect($server, $username, $password, $database);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>VBMS || Driver Login </title>
  <link rel="stylesheet" href="./driverstyle.css">
</head>

<body>
  <?php
  $error = '';
  ?>
  <div class="wrapper">
    <h4 style="color:white">Vehicle Assistance Management System</h4>

    <?php
    if (isset($_POST["submit"])) {
      $driverid = $_POST['driverid'];
      $password = $_POST['password'];

      $getuser = "SELECT * FROM tbldriver WHERE driverid='$driverid'";
      $result = $conn->query($getuser);
      $data = $result->fetch_assoc();

      if ($data && $data['driverid'] != null) {
        if (password_verify($password, $data['password'])) {
          session_start();
          $_SESSION['driverid'] = $data['driverid'];

          header('location:../backend/driver/dashboard.php');
          exit();
        } else {
          $error = "<h4 style='color:red;'>Password doesn't match</h4>";
        }
      } else {
        $error = "<h4 style='color:red;'>You are not registered with ID: $driverid</h4>";
      }
    }
    ?>

    <form action="" method="POST">
      <h2>Login</h2>
      <?php echo $error; ?>
      <div class="input-field">
        <input type="text" name="driverid" required>
        <label>Driver ID</label>
      </div>
      <div class="input-field">
        <input type="password" name="password" required>
        <label>Password</label>
      </div>
      <div class="forget">
        <label for="remember">
          <input type="checkbox" id="remember">
          <p>Remember me</p>
        </label>
        <a href="forget-password.php">Forgot password?</a>
      </div>
      <button type="submit" name="submit">Log In</button>
      <div class="register">
        <p>Don't have an account? &nbsp <a href="driver_register.php">Register</a></p>
      </div>
      <div class="home">
        <a href="../index.php"><b>Back Home!!</b></a>
      </div>
    </form>

  </div>
</body>

</html>