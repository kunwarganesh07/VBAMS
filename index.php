<title>VBMS || Home Page</title>
<?php
include('includes/header.php');
?>
<!-- slider area start -->
<div class="slider-area">
    <div class="bend niceties preview-1">
        <!-- slider images start -->
        <div id="nivoslider" class="slides">
            <!-- <img src="img1/slider/towing1.jpeg" alt="slider_1" title="#slider-direction-1"/> -->
            <img src="public/frontend/img1/slider/towing2.jpg" alt="slider_2" title="#slider-direction-2" />
        </div>
        <!-- slider images end -->

        <!-- slider 1 direction -->
        <div id="slider-direction-2" class="t-cn slider-direction">
            <!-- slider progress start -->
            <div class="slider-progress"></div>
            <!-- slider progress end -->
            <!-- slider caption start -->
            <div class="slider-caption">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <!-- layer 1 -->
                            <div class="layer-1-1">
                                <h2 class="title-1">Best Vehicle Breakdown </h2>
                            </div>
                            <!-- layer 2 -->
                            <div class="layer-1-2">
                                <h2 class="title-2"> Assistance Management System </h2>
                            </div>
                            <!-- layer 3 -->
                            <div class="layer-2-3">
                                <p class="title-3">A smart solution for unexpected breakdowns. This web-based system
                                    connects users with roadside assistance effortlessly, ensuring fast support without
                                    the need for registration.
                            </div>
                            <!-- layer 4 -->
                            <div class="layer-2-4">
                                <a href="contact.php" class="title-4">contact us </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- slider caption end -->
        </div>
    </div>

</div>
<!-- slider area end -->
<!-- about us area start -->
<div class="about-us-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- section title start -->
                <div class="section-heading">
                    <h2>About <span>Us</span></h2>
                </div>
                <!-- section title end -->
                <!-- about content start -->
                <div class="about-us-info">
                    <?php
                    $sql = "SELECT * from tblpage where PageType='aboutus'";
                    $query = $conn->query($sql);
                    $data = $query->fetch_assoc(); ?>
                    <p><?php echo $data['PageDescription']; ?></p>


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


<!-- blog area end -->
<!-- quick book area start -->

<!-- quick book area end -->
<?php include('includes/footer.php'); ?>