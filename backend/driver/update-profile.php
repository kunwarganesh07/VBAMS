<title>VBMS || Profile </title>
<?php
include("../includes/driverheader.php");
include("../includes/driversidebar.php");
?>

<?php
$id = $_SESSION['driverid'];
$query_driver = "SELECT * FROM tbldriver WHERE driverid='$id'";
$result_driver = $conn->query($query_driver);
$data_driver = $result_driver->fetch_assoc();


if (isset($_POST["submit"])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    // $email = $_POST['email'];
    // $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $query = "UPDATE tbldriver set name='$name',address='$address',phone='$phone' WHERE driverid='$id'";
    $result = $conn->query($query);
    if ($result) {
        echo '<script>
                alert("Profile has been Update successfully.");
                window.location.href="update-profile.php"; 
              </script>';
    } else {
        echo '<script>alert("Something went wrong. Please try again.");
        window.location.href="update-profile.php";</script>';
    }

}

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Driver Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Driver Profile</li>
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
                    <a class="navbar-brand" href="#">Driver Profile</a>
                </nav>
                <div class="container-fluid">
                    <div class="col-md-12">
                        <div class="card mt-3">
                            <div class="body">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Driver ID</label>
                                                    <input type="text" name="driverid" id="driverid"
                                                        class="form-control"
                                                        value="<?php echo $data_driver['driverid']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Driver Name</label>
                                                    <input type="text" name="name" class="form-control"
                                                        value="<?php echo $data_driver['name']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="phone">Phone Number</label>
                                                    <input type="tel" name="phone" id="phone" class="form-control"
                                                        pattern="\d{10,12}"
                                                        title="Phone number must be between 10 and 12 digits"
                                                        maxlength="12" value="<?php echo $data_driver['phone']; ?>"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Email</label>
                                                    <input type="text" name="email" id="email" class="form-control"
                                                        value="<?php echo $data_driver['email']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Addresse</label>
                                                    <input type="text" name="address" class="form-control"
                                                        value="<?php echo $data_driver['address']; ?>" required>
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Address</label>
                                            <input type="text" name="address" id="address" class="form-control" value="<?php echo $data_driver['address']; ?>" 
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">password</label>
                                            <input type="password" name="password" id="password" class="form-control" value="<?php echo $data_driver['password']; ?>" 
                                                required>
                                        </div>
                                    </div> -->

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
                                        <button type="submit" class="btn btn-primary w-25" name="submit">Update</button>

                                    </div>


                                </form>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
</div>
</section>
</div>