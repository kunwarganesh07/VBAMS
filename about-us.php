<title>VBMS || About Page</title>
<?php
include('includes/header.php');
?>
<!-- page title area start -->
<div class="page-title-area overlay">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- page title start -->
                <div class="page-title">
                    <h2>about us</h2>
                </div>
                <!-- page title end -->
                <!-- page title menu start -->
                <div class="page-title-menu">
                    <ul>
                        <li><a href="index.php">Home</a> <span> / </span> </li>
                        <li><a href="about-us.php">About us</a></li>
                    </ul>
                </div>
                <!-- page title menu end -->
            </div>
        </div>
    </div>
</div>
<!-- page title area end -->
<!-- about us area start -->
<div class="about-us-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- section title start -->
                <div class="section-heading">
                    <h2>About <span> Us</span></h2>
                </div>
                <!-- section title end -->
                <!-- about content start -->
                <?php

                $sql = "SELECT * from tblpage where PageType='aboutus'";
                $query = $conn->query($sql);
                $data = $query->fetch_assoc(); ?>
                <div class="about-us-info">
                    <p><?php echo $data['PageDescription'];  ?></p>
                    <!-- about social start -->
                    <div class="about-social">
                        <ul>
                            <li><a href="#"> <i class="fa-brands fa-facebook-f"></i> </a></li>
                            <li><a href="#"> <i class="fa-brands fa-google-plus-g"></i> </a></li>
                            <li><a href="#"> <i class="fa-brands fa-x-twitter"></i> </a></li>
                            <li><a href="#"> <i class="fa-brands fa-instagram"></i> </a></li>
                            <!-- <li><a href="#"> <i class="fa fa-pinterest-p"></i> </a></li> -->
                        </ul>
                    </div>
                    <!-- about social end -->
                </div>
                <!-- about content end -->
            </div>
            <div class="col-md-5 hidden-xs">
                <!-- about us img start -->
                <div class="about-us-img">
                    <img src="public/frontend/img1/about/tow-truck-federal-way-2.jpg" alt="">
                </div>
                <!-- about us img end -->
            </div>
        </div>
    </div>
</div>
<!-- about us area end -->


<?php
include('includes/footer.php');
?>