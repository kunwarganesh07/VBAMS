<title>VBMS || Update contact-us </title>
<?php
include("../includes/adminheader.php");
include("../includes/adminsidebar.php");
?>

<?php
$sql = "SELECT * from tblpage where PageType='contactus'";
$query = $conn->query($sql);
$data = $query->fetch_assoc();
?>

<?php

if (isset($_POST["submit"])) {
    $PageDescription = $_POST['PageDescription'];
    $Email = $_POST['Email'];
    $MobileNumber = $_POST['MobileNumber'];

    $query1 = "UPDATE tblpage set PageDescription='$PageDescription', Email='$Email', MobileNumber='$MobileNumber' where PageType='contactus'";
    $result1 = $conn->query($query1);
    if ($result1) {
        echo '<script>
                alert("Contact us has been Update successfully.");
                window.location.href="contact-us.php"; 
              </script>';
    } else {
        echo '<script>alert("Something went wrong. Please try again.");</script>';
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
                    <h1 class="m-0">Contact Us</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Contact Us</li>
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
                    <a class="navbar-brand" href="#">Contact us:</a>
                </nav>
                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for=""><b>Page Title:</b></label>
                                                    <input type="text" name="PageTitle" class="form-control"
                                                        value="<?php echo $data['PageTitle']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for=""><b>Email:</b></label>
                                                    <input type="text" name="Email" class="form-control"
                                                        value="<?php echo $data['Email']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for=""><b>Mobile Number:</b></label>
                                                    <input type="text" name="MobileNumber" class="form-control"
                                                        value="<?php echo $data['MobileNumber']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for=""><b>Page Description: (Address)</b></label>
                                                    <textarea name="PageDescription" id="summernote"
                                                        class="form-control"> <?php echo $data['PageDescription']; ?> </textarea>
                                                    <!-- <input type="text" name="name" id="name" class="form-control" required> -->
                                                </div>
                                            </div>
                                            <br>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary"
                                                    name="submit">Update</button>
                                            </div>
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