<title>VBMS || Search </title>
<?php
include("../includes/adminheader.php");
include("../includes/adminsidebar.php");


// $query = "SELECT * FROM tbldriver";
// $result = $conn->query($query);


$limit = 10; // Number of records per page

// Get the current page number from the URL (default to page 1)
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$start = ($page - 1) * $limit; // Calculate offset



// Count total records in tbldriver
$totalQuery = "SELECT COUNT(*) AS total FROM tblbook ";
$totalResult = $conn->query($totalQuery);
$totalRow = $totalResult->fetch_assoc();
$totalRecords = $totalRow['total'];

$totalPages = ceil($totalRecords / $limit); // Calculate total pages



if (isset($_POST["search"])) { // Check if form was submitted
    $data = $conn->real_escape_string($_POST['search_data']); // Prevent SQL injection

    // Set default values for pagination (if needed)
    $start = 0;
    $limit = 10; // Change this as per your requirement

    // Search query
    $query = "SELECT * FROM tblbook WHERE Name LIKE '%$data%' OR BookingNumber LIKE '%$data%' LIMIT $start, $limit";
    $result = $conn->query($query);

    // Display search term


    ?>




    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Request</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Search Request</li>
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
                        <a class="navbar-brand" href="#">Searched Request</a>

                    </nav>
                    <?php
                    echo "<p style='margin-left:10px'>Search Results for: <b>$data</b></p>";
                    ?>
                    <div class="container-fluid">
                        <div class="row clearfix">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="body mt-3">
                                        <div class="table-responsive">
                                            <?php
                                            // Check if records found
                                            if ($result->num_rows > 0) {
                                                echo "<table class='table table-bordered'>
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
                                                </tr>";
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<tr>
                                                            <td>{$row['id']}</td>
                                                            <td>{$row['BookingNumber']}</td>
                                                            <td>{$row['Name']}</td>
                                                            <td>{$row['Email']}</td>
                                                            <td>{$row['PhoneNumber']}</td>
                                                            <td>{$row['PickupLoc']}</td>
                                                            <td>{$row['Destination']}</td>
                                                            <td>{$row['PickupDate']}</td>
                                                            <td>{$row['PickupTime']}</td>
                                                            <td>{$row['Status']}</td>
                                                        <td>
                                                        <a href='action.php?id=$row[id]' name='update'><i class='fa fa-eye fa-primary' aria-hidden='true'></i></a> 
                                                        </td>           
                                                    </tr>";
                                                }
                                                echo "
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
                                                </tr>";
                                                echo "</table>";
                                            } else {
                                                echo "<p style='text-align: center; color: red; font-size: 18px;'>
                                                        No results found for '$data'.
                                                      </p>";
                                            }

}
?>
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