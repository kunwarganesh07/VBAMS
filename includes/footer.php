<div class="quick-book-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="book-now">
                    <div class="display-table">
                        <div class="display-table-cell">
                            <!-- book now content start -->
                            <div class="book-now-title">
                                <h2>Send Request</h2>
                                <a href="booking-request.php" class="book-now-btn"> <i
                                        class="fa-solid fa-arrow-right-long"></i> BOOK NOW</a>
                            </div>
                            <!-- book now content end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- footer top start -->
<div class="footer-top-area">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-12">
                <!-- single footer start -->
                <div class="single-footer-top">
                    <div class="footer-about-us">
                        <?php
                        $sql = "SELECT * from tblpage where PageType='contactus'";
                        $query = $conn->query($sql);
                        $data = $query->fetch_assoc();
                        ?>
                        <!-- small logo start -->
                        <a href="index.php" class="footer-logo"> <strong
                                style="color:white ;font-weight: bold;">VBAMS</strong> </a>

                        <!-- small logo9 end -->
                        <!-- address start -->
                        <div class="footer-address">
                            <p> <?php echo $data['PageDescription']; ?></p>
                        </div>
                        <!-- address end -->
                        <!-- contact info start -->
                        <div class="footer-contact-info">
                            <p> <span> Telephone:</span> +<?php echo $data['MobileNumber']; ?> </p>
                            <p> <span> Email:</span> <?php echo $data['Email']; ?> </p>

                        </div>
                        <!-- contact info end -->
                    </div>
                </div>
                <!-- single footer end -->
            </div>
            <div class="col-md-5 col-sm-12">
                <!-- single footer start -->
                <div class="single-footer-top">
                    <!-- section title start -->
                    <div class="footer-top-title">
                        <h3>Services</h3>
                    </div>
                    <!-- section title end -->
                    <!-- footer menu start -->
                    <div class="footer-top-menu">
                        <ul>
                            <li class="has-sub"><a href="index.php">Home</a></li>
                            <!-- single menu -->
                            <li><a href="about-us.php">About us</a></li>

                            <!-- single menu -->
                            <li><a href="contact.php">Contact Us</a></li>
                            <li><a href="booking-request.php">Send Request</a></li>
                        </ul>
                    </div>
                    <!-- footer menu end -->
                </div>
                <!-- single footer end -->
            </div>


        </div>
    </div>
</div>
<!-- footer top end -->
<!-- footer area start -->
<div class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4">
                <!-- footer social start -->
                <div class="footer-social">
                    <ul>
                        <li><a href="#"> <i class="fa-brands fa-facebook-f"></i> </a></li>
                        <li><a href="#"> <i class="fa-brands fa-google-plus-g"></i> </a></li>
                        <li><a href="#"> <i class="fa-brands fa-x-twitter"></i> </a></li>
                        <li><a href="#"> <i class="fa-brands fa-instagram"></i> </a></li>
                        <!-- <li><a href="#"> <i class="fa fa-pinterest-p"></i> </a></li> -->
                    </ul>
                </div>
                <!-- footer social end -->
            </div>
            <div class="col-md-6 col-sm-4">
                <!-- copyright text start -->
                <div class="footer-copyright">
                    <p>Vehicle Breakdown Assistance Management System</p>
                </div>
                <!-- copyright text end -->
            </div>

        </div>
    </div>
</div>
<!-- footer area end -->


<!-- ============== All JS ================ -->
<!-- jquery js
        =========================================== -->
<script src="public/frontend/js/vendor/jquery-1.12.0.min.js"></script>

<!-- bootstrap js
        =========================================== -->
<script src="public/frontend/js/bootstrap.min.js"></script>

<!-- meanmenu js
        =========================================== -->
<script src="public/frontend/js/jquery.meanmenu.js"></script>

<!-- scrollUp js
        =========================================== -->
<script src="public/frontend/js/jquery.scrollUp.min.js"></script>

<!-- wow js
        =========================================== -->
<script src="public/frontend/js/wow.min.js"></script>

<!-- owl.carousel js
        =========================================== -->
<script src="public/frontend/js/owl.carousel.min.js"></script>

<!-- change-text js
        =========================================== -->
<script src="public/frontend/js/change-text.js"></script>

<!-- YTPlayer js
        =========================================== -->
<script src="public/frontend/js/jquery.mb.YTPlayer.min.js"></script>

<!-- textillate js
        =========================================== -->
<script src="public/frontend/js/jquery.lettering.js"></script>
<script src="public/frontend/js/jquery.textillate.js"></script>

<!-- nivo.slider js
        =========================================== -->
<script src="public/frontend/lib/js/jquery.nivo.slider.js"></script>
<script src="public/frontend/lib/home.js"></script>

<!-- plugins js
        =========================================== -->
<script src="public/frontend/js/plugins.js"></script>

<!-- main js
        =========================================== -->
<script src="public/frontend/js/main.js"></script>

</body>

</html>