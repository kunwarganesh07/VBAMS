
<?php
include('dbconnection.php');
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="mt-3 pb-3 mb-3 text-center">
            <div class="">
                <img src="../public/images/user.png" style="width:40%" alt="User Image">
            </div>
            <?php
            $id = $_SESSION['driverid'];
            $query = "SELECT * FROM tbldriver WHERE driverid='$id'";
            $result = $conn->query($query);
            $data = $result->fetch_assoc(); ?>
            <div class="mt-2 text-center text-light">
                <h4> <?php echo $data['name']; ?></h4>
                <small><?php echo $data['email']; ?></small>
            </div>
        </div>
        <hr>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="dashboard.php" class="nav-link ">
                        <i class="nav-icon fas fa-solid fa-house"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                
            
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Request
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="all-request.php" class="nav-link">
                                <i class="fa-solid fa-arrow-right nav-icon"></i>
                                <p>All Request</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="new-request.php" class="nav-link">
                                <i class="fa-solid fa-arrow-right nav-icon"></i>
                                <p>
                                    New Request
                                    <span class="right badge badge-danger">New</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="complected-request.php" class="nav-link">
                                <i class="fa-solid fa-arrow-right nav-icon"></i>
                                <p>Complected Request</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="cancel-request.php" class="nav-link">
                                <i class="fa-solid fa-arrow-right nav-icon"></i>
                                <p>Cancel Request</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item ">
                    <a href="sidebar-search.php" class="nav-link ">
                    <i class="fa-solid fa-magnifying-glass nav-icon fas"></i>
                        <p>
                            Search
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>