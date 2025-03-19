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
    <title>Admin | Login</title>
</head>

<body>
    <div class="wrapper">
        <form action="" method="POST">
            <div>
                <label for="">Username</label>
                <input type="text" name="username" id="">

                <label for="">password</label>
                <input type="password" name="password" id="">
                <button type="submit" name="submit" class="btn btn-primary w-25">Add</button>
            </div>
        </form>

    </div>
</body>

</html>
<?php
if (isset($_POST["submit"])) {
  $username = $_POST['username'];
  $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
  $user_query = "INSERT INTO tbladmin(AdminName,UserName,MobileNumber,Email,Password) VALUES('','$username','','','$password')";
  $user_result = $conn->query($user_query);
  header('Location: login.php');
  exit;

}
?>
<!-- 