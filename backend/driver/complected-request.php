<title>VBMS || Completed request </title>
<?php
include("../includes/driverheader.php");
include("../includes/driversidebar.php");


// $query = "SELECT * FROM tbldriver";
// $result = $conn->query($query);


$limit = 10; // Number of records per page

// Get the current page number from the URL (default to page 1)
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$start = ($page - 1) * $limit; // Calculate offset

// Fetch 10 records from tbldriver
$id = $_SESSION['driverid'];
$query = "SELECT * FROM tblbook Where Status='Completed' and accepted_by='$id' LIMIT $start, $limit";
$result = $conn->query($query);

// Count total records in tbldriver
$totalQuery = "SELECT COUNT(*) AS total FROM tblbook ";
$totalResult = $conn->query($totalQuery);
$totalRow = $totalResult->fetch_assoc();
$totalRecords = $totalRow['total'];

$totalPages = ceil($totalRecords / $limit); // Calculate total pages
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Completed Request</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Completed Request</li>
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
                    <a class="navbar-brand" href="#">Completed Booking Request</a>
                </nav>
                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="body mt-3">
                                    <div class="row">
                                        <form action="search.php" method="POST" style="margin-left: 20px;">
                                            <input type="text" class="form-group" name="search_data"
                                                placeholder="Search">
                                            <button type="submit" name="search" class="btn btn-primary">Search</button>
                                        </form>
                                    </div>
                                    <div class="table-responsive">
                                        <table
                                            class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>BookingNumber</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone Number</th>
                                                    <th>Pick Up Location</th>
                                                    <th>Destination</th>
                                                    <th>Pick Up Date</th>
                                                    <th>Pick Up Time</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                while ($data = $result->fetch_assoc()) {
                                                    $msg = "'Are You sure you want to delete'";
                                                    $delete = 'onclick=' . '"' . 'return confirm("$msg")';
                                                    echo "
                                        <tr>
                                            <td>$data[id]</td>
                                            <td>$data[BookingNumber]</td>
                                            <td>$data[Name]</td>
                                            <td>$data[Email]</td>
                                            <td>$data[PhoneNumber]</td>
                                            <td>$data[PickupLoc]</td>
                                            <td>$data[Destination]</td>
                                            <td>$data[PickupDate]</td>
                                            <td>$data[PickupTime]</td>
                                            <td>$data[Status]</td>
                                            <td>
                                                <a href='action.php?id=$data[id]' name='update'><i class='fa fa-eye fa-primary' aria-hidden='true'></i></a> 
                                            </td>
                                        </tr>";
                                                }
                                                ?>
                                            </tbody>
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>BookingNumber</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone Number</th>
                                                    <th>Pick Up Location</th>
                                                    <th>Destination</th>
                                                    <th>Pick Up Date</th>
                                                    <th>Pick Up Time</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>

                                <nav>
                                    <ul class="pagination justify-content-center">
                                        <?php if ($page > 1): ?>
                                            <li class="page-item">
                                                <a class="page-link" href="?page=<?php echo $page - 1; ?>">Previous</a>
                                            </li>
                                        <?php endif; ?>

                                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                            <li class="page-item <?php if ($i == $page)
                                                echo 'active'; ?>">
                                                <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                            </li>
                                        <?php endfor; ?>

                                        <?php if ($page < $totalPages): ?>
                                            <li class="page-item">
                                                <a class="page-link" href="?page=<?php echo $page + 1; ?>">Next</a>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
</div>