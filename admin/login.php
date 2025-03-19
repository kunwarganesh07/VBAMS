<?php
session_start();
$server = "localhost";
$username = "root";
$password = "";
$database = "vbams";
$conn = mysqli_connect($server, $username, $password, $database);

$error = "";

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VBMS || Admin Login Page</title>
    <link rel="stylesheet" href="./adminstyle.css">
</head>

<body>
    <?php
  $error = '';
  ?>
    <div class="wrapper">
        <h4 style="color:white">Vehicle Assistance Management System</h4>

        <?php
    if (isset($_POST["submit"])) {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $getuser = "SELECT * FROM tbladmin WHERE UserName='$username'";
      $result = $conn->query($getuser);  // Removed unnecessary quotes
      $data = $result->fetch_assoc();

      if ($data && $data['UserName'] != null) {  // Fixed condition
        if (password_verify($password, $data['Password'])) {  // Removed incorrect assignment
          session_start();
          $_SESSION['username'] = $data['UserName'];

          header('location:../backend/admin/dashboard.php');
          exit();
        } else {
          $error = "<h5 style='color:red;'>Password doesn't match</h5>"; // Fixed variable name
        }
      } else {
        $error = "<h5 style='color:red;'>You are not registered with username: $username</h5>";
      }
    }
    ?>
        <form action="" method="POST">
            <h2>Login</h2>
            <?php
      echo $error;
      ?>
            <div class="input-field">
                <input type="text" name="username" required>
                <label>Username</label>
            </div>
            <div class="input-field">
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <div class="forget">
                <label for="remember">
                    <input type="checkbox" id="remember" name="remember">
                    <p>Remember me</p>
                </label>
                <a href="forget-password.php">Forgot password?</a>
            </div>
            <button type="submit" name="submit">Log In</button>
            <div class="home">
                <a href="../index.php"><b>Back Home!!</b></a>
            </div>
        </form>
    </div>
</body>

</html>