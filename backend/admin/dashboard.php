<?php
session_start();
if (isset($_SESSION['username'])) {

} else {
    header('location:../../admin/login.php');
    exit;
}
?>
<title>VBMS || Dashboard </title>
<?php
include("../includes/adminheader.php");
include("../includes/adminsidebar.php");

$totalrequest = "SELECT COUNT(*) AS totalrequest FROM tblbook";
$total_result = $conn->query($totalrequest);
$total_row = $total_result->fetch_assoc();


$cancelrequest = "SELECT COUNT(*) AS cancelrequest FROM tblbook Where status='Rejected' ";
$cancel_result = $conn->query($cancelrequest);
$cancel_row = $cancel_result->fetch_assoc();


$newrequest = "SELECT COUNT(*) AS newrequest FROM tblbook Where status='Not Updated Yet' ";
$new_result = $conn->query($newrequest);
$new_row = $new_result->fetch_assoc();

$ontheway = "SELECT COUNT(*) AS ontheway FROM tblbook Where status='On The Way' ";
$ontheway_result = $conn->query($ontheway);
$ontheway_row = $ontheway_result->fetch_assoc();

$complected = "SELECT COUNT(*) AS complected FROM tblbook Where status='On The Way' ";
$complected_result = $conn->query($complected);
$complected_row = $complected_result->fetch_assoc();

$approved = "SELECT COUNT(*) AS approved FROM tblbook Where status!='Not Updated Yet' ";
$approved_result = $conn->query($approved);
$approved_row = $approved_result->fetch_assoc();

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php
                            echo $total_row['totalrequest'];
                            ?></h3>

                            <p>All Request</p>
                        </div>
                        <div class="icon">
                            <!-- <i class="ion ion-bag"></i> -->
                        </div>
                        <a href="all-request.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?php
                            echo $new_row['newrequest'];
                            ?></h3>

                            <p>New Request</p>
                        </div>
                        <div class="icon">
                            <!-- <i class="ion ion-pie-graph"></i> -->
                        </div>
                        <a href="new-request.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?php
                            echo $complected_row['complected'];
                            ?></h3>

                            <p>Complected Request</p>
                        </div>
                        <div class="icon">
                            <!-- <i class="ion ion-stats-bars"></i> -->
                        </div>
                        <a href="complected-request.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?php
                            echo $cancel_row['cancelrequest'];
                            ?></h3>

                            <p>Rejected Request</p>
                        </div>
                        <div class="icon">
                            <!-- <i class="ion ion-person-add"></i> -->
                        </div>
                        <a href="cancel-request.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>