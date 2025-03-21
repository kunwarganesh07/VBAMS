<title>VBMS || Manage Driver </title>
<?php
include("../includes/adminheader.php");
include("../includes/adminsidebar.php");


// $query = "SELECT * FROM tbldriver";
// $result = $conn->query($query);


$limit = 10; // Number of records per page

// Get the current page number from the URL (default to page 1)
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$start = ($page - 1) * $limit; // Calculate offset

// Fetch 10 records from tbldriver
$query = "SELECT * FROM tbldriver LIMIT $start, $limit";
$result = $conn->query($query);

// Count total records in tbldriver
$totalQuery = "SELECT COUNT(*) AS total FROM tbldriver";
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
                    <h1 class="m-0">Manage Driver</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Manage Driver</li>
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
                    <a class="navbar-brand" href="#">Manage Driver</a>
                </nav>
                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="body mt-2">
                                    <div class="row">
                                        <form action="search-driver.php" method="POST" style="margin-left: 20px;">
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
                                                    <th>Driver ID</th>
                                                    <th>Name</th>
                                                    <th>MobileNumber</th>
                                                    <th>Email</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                while ($data = $result->fetch_assoc()) {

                                                    echo "
                                        <tr>
                                            <td>$data[id]</td>
                                            <td>$data[driverid]</td>
                                            <td>$data[name]</td>
                                            <td>$data[phone]</td>
                                            <td>$data[email]</td>
                                            <td>
                                                <a href='update-driver.php?id=$data[id]' name='update'><i class='fa fa-edit' aria-hidden='true'></i></a>
                                                ||
                                                <a href='delete-driver.php?id=$data[id]' name='delete'><i class='fa fa-trash fa-delete' onclick='return confirmDelete();'></i></a>
                                                
                                            </td>
                                           
                                        </tr>";
                                                }
                                                ?>
                                            </tbody>
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Driver ID</th>
                                                    <th>Name</th>
                                                    <th>MobileNumber</th>
                                                    <th>Email</th>
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

<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete the Driver?");
    }
</script>