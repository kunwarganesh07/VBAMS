
<?php
include("../includes/dbconnection.php");


$query_admin = "SELECT * FROM tbladmin";
$result_admin = $conn->query($query_admin);
$data_admin = $result_admin->fetch_assoc();

$error = ""; // Initialize error message variable

if (isset($_POST["submit"])) {
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $newpassword = $_POST['newpassword'];
    $confirmpassword = $_POST['confirmpassword'];


    if ($data_admin['Email'] == $email && $data_admin['MobileNumber'] == $phone) {   // Check if data exists
        if ($newpassword === $confirmpassword) {
            // Passwords match
            $changepassword = password_hash($_POST['newpassword'], PASSWORD_BCRYPT);
            $query = "UPDATE tbladmin set Password='$changepassword'";
            $result = $conn->query($query);

            $error = "<h4 style='color:green;'>Password successfully Changed</h4>";
        } else {
            $error = "<h4 style='color:red;'>passwords do not match</h4>";
        }

    } else {
        $error = "<h4 style='color:red;'>Admin account not found</h4>";
    }
}


?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./adminstyle.css">
    <title>VBMS || Forget Password</title>
</head>

<body class=" container bg-secondary">
    <div class="wrapper">
    <h5 style="color:white">Vehicle Assistance Management System</h5>
        <form action=" " method="POST">
            <h3 style="color:white">Reset Your Password!!!</h3>
            <?php
            echo $error;
            ?>
            <div class=" input-field">
                <input type="email" name="email" required>
                <label>Email</label>
            </div>
            <div class="input-field">
                <input type="number" name="phone" pattern="\d{10,12}"
                    title="Phone number must be between 10 and 12 digits" maxlength="12" minlength="10" required>
                <label>Mobile Number</label>
            </div>
            <div class="input-field">
                <input type="password" name="newpassword" required>
                <label>New Password</label>
            </div>
            <div class="input-field">
                <input type="password" name="confirmpassword" required>
                <label>Confirm Password</label>
            </div>

            <button type="submit" id="button" name="submit">Reset Password</button>

            <div class="home">
                <a href="./login.php"><b>Back Login!!</b></a>
            </div>
        </form>

    </div>

    <!-- <script>
    document.getElementById("button").addEventListener("click", function () {
      alert("Registration Successful");
    });

  </script> -->

<!-- 
    <script>
        // Handle modal login button click
        document.getElementById('modal-login-button').addEventListener('click', function () {
            // Submit the login form (you can add AJAX here if you want to avoid a full page reload)
            document.getElementById('login-form').submit();
        });

        // Check password match function
        function checkpass() {
            var newPassword = document.getElementById('newpassword').value;
            var confirmPassword = document.getElementById('confirmpassword').value;

            if (newPassword !== confirmPassword) {
                alert('New Password and Confirm Password fields do not match');
                document.getElementById('confirmpassword').focus();
                return false;
            }
            return true;
        }
    </script> -->
</body>