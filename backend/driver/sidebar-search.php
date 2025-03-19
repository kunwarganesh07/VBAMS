<?php
include("../includes/driverheader.php");
include("../includes/driversidebar.php");

$limit = 10; // Records per page
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Count total records
$totalQuery = "SELECT COUNT(*) AS total FROM tblbook";
$totalResult = $conn->query($totalQuery);
$totalRow = $totalResult->fetch_assoc();
$totalRecords = $totalRow['total'];
$totalPages = ceil($totalRecords / $limit);

// Default query
$query = "SELECT * FROM tblbook LIMIT $start, $limit";
if (isset($_POST["search"])) {
    $data = $_POST['search_data'];
    $query = "SELECT * FROM tblbook WHERE Name LIKE '%$data%' OR BookingNumber LIKE '%$data%' LIMIT $start, $limit";
}

$result = $conn->query($query);
?>

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
    <section class="content">
        <div class="container-fluid">
            <form action="" method="POST" style="margin-left: 20px;">
                <input type="text" class="form-group" name="search_data" placeholder="Search">
                <button type="submit" name="search" class="btn btn-primary">Search</button>
            </form>

            <?php if (isset($_POST["search"])): ?>
                <p style="margin-left:10px">Search Results for: <b><?php echo $data; ?></b></p>
            <?php endif; ?>

            <div class="card">
                <div class="body mt-3">
                    <div class="table-responsive">
                        <?php if ($result->num_rows > 0): ?>
                            <table class="table table-bordered">
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
                                <?php while ($row = $result->fetch_assoc()): ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['BookingNumber']; ?></td>
                                        <td><?php echo $row['Name']; ?></td>
                                        <td><?php echo $row['Email']; ?></td>
                                        <td><?php echo $row['PhoneNumber']; ?></td>
                                        <td><?php echo $row['PickupLoc']; ?></td>
                                        <td><?php echo $row['Destination']; ?></td>
                                        <td><?php echo $row['PickupDate']; ?></td>
                                        <td><?php echo $row['PickupTime']; ?></td>
                                        <td><?php echo $row['Status']; ?></td>
                                        <td>
                                            <a href='action.php?id=<?php echo $row['id']; ?>' name='update'>
                                                <i class='fa fa-eye fa-primary' aria-hidden='true'></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </table>
                        <?php else: ?>
                            <p style="text-align: center; color: red; font-size: 18px;">No results found.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <?php if (!isset($_POST["search"])): ?>
                <nav>
                    <ul class="pagination justify-content-center">
                        <?php if ($page > 1): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?php echo $page - 1; ?>">Previous</a>
                            </li>
                        <?php endif; ?>
                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
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
            <?php endif; ?>
        </div>
    </section>
</div>