<title>VBMS || Add Driver </title>
<?php
include("../includes/adminheader.php");
include("../includes/adminsidebar.php");
?>


<?php

if (isset($_POST["submit"])) {
    $driverid = $_POST['driverid'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $query = "INSERT INTO tbldriver(driverid,name,phone,email,address,password) VALUES('$driverid','$name','$phone','$email','$address','$password')";
    $result = $conn->query($query);
    if ($result) {
        echo '<script>
                alert("Driver has been added successfully.");
                window.location.href="manage-driver.php"; 
              </script>';
    } else {
        echo '<script>alert("Something went wrong. Please try again.");
        window.location.href="manage-driver.php";</script>';
    }
}

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Driver</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Driver</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="page">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="#">Add Driver</a>
                </nav>
                <div class="container-fluid">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="body  mt-2">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Driver ID</label>
                                                    <input type="text" name="driverid" id="driverid"
                                                        class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="phone">Name</label>
                                                    <input type="text" name="name" id="name" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="phone">Mobile Number</label>
                                                    <input type="text" name="phone" id="phone" class="form-control"
                                                        pattern="\d{10,12}"
                                                        title="Phone number must be between 10 and 12 digits"
                                                        maxlength="12" minlength="10" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="phone">Email</label>
                                                    <input type="text" name="email" id="email" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Address</label>
                                                    <input type="text" name="address" id="address" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">password</label>
                                                    <input type="password" name="password" id="address"
                                                        class="form-control" required>
                                                </div>
                                            </div>

                                            <!-- <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="password">Statue</label>
                                                <select name="password" id="password" class="form-control" required>
                                                    <option value="select" selected disabled>select</option>
                                                    <option value="active">Active</option>
                                                    <option value="inactive">In-Active</option>
                                                </select>
                                            </div>
                                        </div> -->
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-primary w-25" name="submit">Add</button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>