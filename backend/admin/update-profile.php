<title>VBMS || Profile </title>
<?php
include("../includes/adminheader.php");
include("../includes/adminsidebar.php");
?>

<?php
$query_admin = "SELECT * FROM tbladmin ";
$result_admin = $conn->query($query_admin);
$data_admin = $result_admin->fetch_assoc();


if (isset($_POST["submit"])) {
    $adminname = $_POST['adminname'];
    // $username = $_POST['username'];
    $contact = $_POST['contact'];
    // $email = $_POST['email'];
    // $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $query = "UPDATE tbladmin set AdminName='$adminname',MobileNumber='$contact'";
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


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Admin Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Admin Profile</li>
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
                    <a class="navbar-brand" href="#">Admin Profile</a>
                </nav>
                <div class="container-fluid">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="body mt-2">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Admin Name</label>
                                                    <input type="text" name="adminname" class="form-control"
                                                        value="<?php echo $data_admin['AdminName']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">User Name</label>
                                                    <input type="text" name="username" class="form-control"
                                                        value="<?php echo $data_admin['UserName']; ?>" readonly
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Contact Number</label>
                                                    <input type="number" name="contact" id="contact"
                                                        class="form-control"
                                                        value="<?php echo $data_admin['MobileNumber']; ?>"
                                                        pattern="\d{10,12}"
                                                        title="Phone number must be between 10 and 12 digits"
                                                        maxlength="12" minlength="10" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Email</label>
                                                    <input type="text" name="email" id="email" class="form-control"
                                                        value="<?php echo $data_admin['Email']; ?>" readonly required>
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Address</label>
                                            <input type="text" name="address" id="address" class="form-control" value="<?php echo $data_admin['address']; ?>" 
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">password</label>
                                            <input type="password" name="password" id="password" class="form-control" value="<?php echo $data_admin['password']; ?>" 
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
    </section>
</div>