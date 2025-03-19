<title>VBMS || Driver Register </title>
<?php
include("../includes/dbconnection.php");

if (isset($_POST["submit"])) {

    $driverid = $_POST['driverid'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);


    $query = "INSERT INTO tbldriver(driverid,name,phone,email,address,password) VALUES ('$driverid','$name','$phone','$email','$address','$password')";
    $result = $conn->query($query);
    header("location:login.php");
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./driverstyle.css">
</head>

<body class=" container bg-secondary">
    <div class="wrapper">
        <form action=" " method="POST">
            <h2>Resistation Form</h2>
            <div class="input-field">
                <input type="text" name="driverid" required>
                <label>Driver ID</label>
            </div>
            <div class="input-field">
                <input type="text" name="name" required>
                <label>Name</label>
            </div>
            <div class="input-field">
                <input type="number" name="phone" pattern="\d{10,12}"
                    title="Phone number must be between 10 and 12 digits" maxlength="12" minlength="10" required>
                <label>Mobile Number</label>
            </div>
            <div class=" input-field">
                <input type="email" name="email" required>
                <label>Email</label>
            </div>
            <div class="input-field">
                <input type="text" name="address" required>
                <label>Address</label>
            </div>
            <div class="input-field">
                <input type="password" name="password" required>
                <label>Password</label>
            </div>


            <button type="submit" id="button" name="submit">Resister</button>

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
</body>