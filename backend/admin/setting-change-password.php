<title>VBMS || Change Password </title>
<?php
include("../includes/adminheader.php");
include("../includes/adminsidebar.php");
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Change Password</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Change Password</li>
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
                    <a class="navbar-brand" href="#">Change Password</a>
                </nav>
                <div class="container-fluid">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="body  mt-2">
                                <?php
                                $query_admin = "SELECT * FROM tbladmin";
                                $result_admin = $conn->query($query_admin);
                                $data_admin = $result_admin->fetch_assoc();

                                $error = ""; // Initialize error message variable
                                
                                if (isset($_POST["submit"])) {
                                    $currentpassword = $_POST['currentpassword'];
                                    $newpassword = $_POST['newpassword'];
                                    $confirmpassword = $_POST['confirmpassword'];

                                    if ($data_admin && isset($data_admin['Password'])) { // Check if data exists
                                        if (password_verify($currentpassword, $data_admin['Password'])) {
                                            if ($newpassword === $confirmpassword) {
                                                // Passwords match
                                                $changepassword = password_hash($_POST['newpassword'], PASSWORD_BCRYPT);
                                                $query = "UPDATE tbladmin set Password='$changepassword'";
                                                $result = $conn->query($query);

                                                echo '<script>
                                                        alert("Password successfully updated.");
                                                    </script>';
                                            } else {
                                                $error = "<h6 style='color:red;margin-left:10px'>New passwords do not match</h6>";
                                            }
                                        } else {
                                            $error = "<h6 style='color:red;margin-left:10px'>Wrong current password</h6>";
                                        }
                                    }
                                    // else {
                                    //     $error = "<h6 style='color:red;'>Admin account not found</h6>";
                                    // }
                                }
                                ?>

                                <!-- Display the error message -->
                                <?php echo $error; ?>


                                <form action=" " method="POST" enctype="multipart/form-data">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Current Password</label>
                                                    <input type="password" name="currentpassword" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">New Password</label>
                                                    <input type="password" name="newpassword" id="newpassword"
                                                        class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Confirm Password</label>
                                                    <input type="password" name="confirmpassword" cid="confirmpassword"
                                                        class="form-control" required>
                                                </div>
                                            </div>

                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-primary w-25" name="submit"
                                            onclick="checkpass();">Change
                                            Password</button>

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