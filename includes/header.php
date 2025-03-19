<?php
include("dbconnection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="John Doe">
    
    <!-- ============== All CSS ================ -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
 
    <!-- normalize css
        ============================================ -->
    <link rel="stylesheet" href="public/frontend/css1/normalize.css">

    <!-- animate css
        ============================================ -->
    <link rel="stylesheet" href="public/frontend/css1/animate.css">

    <!-- bootstrap css
        ============================================ -->
    <link rel="stylesheet" href="public/frontend/css1/bootstrap.min.css">

    <!-- meanmenu css
        ============================================ -->
    <link rel="stylesheet" href="public/frontend/css1/meanmenu.min.css">

    <!-- font-awesome css
        ============================================ -->
    <link rel="stylesheet" href="public/frontend/css1/font-awesome.min.css">

    <!-- icofont css
        ============================================ -->
    <link rel="stylesheet" href="public/frontend/css1/icofont.css">

    <!-- change-text css
        ============================================ -->
    <link rel="stylesheet" href="public/frontend/css1/change-text.css">

    <!-- YTPlayer css
        ============================================ -->
    <link rel="stylesheet" href="public/frontend/css1/jquery.mb.YTPlayer.min.css">

    <!-- main css
        ============================================ -->
    <link rel="stylesheet" href="public/frontend/css1/main.css">

    <!-- owl.carousel css
        ============================================ -->
    <link rel="stylesheet" href="public/frontend/css1/owl.carousel.css">
    <link rel="stylesheet" href="public/frontend/css1/owl.theme.css">
    <link rel="stylesheet" href="public/frontend/css1/owl.transitions.css">

    <!-- nivo-slider css
        ============================================ -->
    <link rel="stylesheet" href="public/frontend/lib/css/nivo-slider.css">
    <link rel="stylesheet" href="public/frontend/lib/css/preview.css">

    <!-- style css
        ============================================ -->
    <link rel="stylesheet" href="style1.css">

    <!-- responsive css
        ============================================ -->
    <link rel="stylesheet" href="public/frontend/css1/responsive.css">

    <!-- modernizr js
        ============================================ -->
    <script src="public/frontend/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>


    <!-- header area start -->
    <header id="sticker">
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <!-- welcome message start -->
                        <div class="welcome-msg">
                            <ul>
                                <?php
                                $sql = "SELECT * from tblpage where PageType='contactus'";
                                $query = $conn->query($sql);
                                $data = $query->fetch_assoc();
                                ?>
                                <li>
                                    <p> <span> Contact: </span><?php echo $data['MobileNumber']; ?></p>
                                </li>
                                <li>
                                    <p> <span> Email: </span><?php echo $data['Email'];
                                    ; ?></p>
                                </li>
                            </ul>
                        </div>
                        <!-- welcome message end -->
                    </div>
                    <div class="col-md-5">
                        <div class="header-top-menu">
                            <!-- top social start -->
                            <div class="top-social">
                                <ul>
                                    <li><a href="#"> <i class="fa-brands fa-facebook-f"></i> </a></li>
                                    <li><a href="#"> <i class="fa-brands fa-google-plus-g"></i> </a></li>
                                    <li><a href="#"> <i class="fa-brands fa-x-twitter"></i></a></li>
                                    <li><a href="#"> <i class="fa-brands fa-instagram"></i></a></li>
                                    <!-- <li><a href="#"> <i class="fa fa-pinterest-p"></i> </a></li> -->
                                    <li><a href="admin/login.php">Admin</a></li>
                                    <li><a href="driver/login.php">Driver</a></li>
                                </ul>
                            </div>
                            <!-- top social end -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- mainmenu area start -->
        <div class="main-menu-area hidden-xs">
            <div class="container">
                <div class="menu-position">
                    <div class="row">
                        <div class="col-md-3 col-sm-2">
                            <!-- logo start -->
                            <div class="logo">
                                <a href="index.php">
                                    <h2>VBAMS</h2>
                                    <!-- vehical breakdown assistence management system -->
                                </a>
                            </div>
                            <!-- logo end -->
                        </div>
                        <div class="col-md-9 col-sm-10 static">
                            <!-- main-menu start -->
                            <div class="main-menu">
                                <nav>
                                    <ul>
                                        <!-- single menu -->
                                        <li class="has-sub"><a href="index.php">Home</a></li>
                                        <!-- single menu -->
                                        <li><a href="about-us.php">About us</a></li>

                                        <!-- single menu -->
                                        <li><a href="contact.php">Contact Us</a></li>
                                        <li><a href="booking-request.php">Send Request</a></li>


                                        <!-- single menu -->

                                    </ul>
                                </nav>
                            </div>
                            <!-- main-menu start -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- mainmenu area end -->
        <!-- mobile menu area start -->
        <div class="mobile-menu-area hidden-lg hidden-md hidden-sm">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="logo">
                            <a href="index.php">
                                <img src="img1/logo-light.png" alt="">
                            </a>
                        </div>
                        <div class="mobile-menu">
                            <nav>
                                <ul>
                                    <li class="has-sub"><a href="index.php">Home</a></li>
                                    <!-- single menu -->
                                    <li><a href="about-us.php">About us</a></li>

                                    <!-- single menu -->
                                    <li><a href="contact.php">Contact Us</a></li>
                                    <li><a href="booking-request.php">Send Request</a></li>
                                </ul>
                                </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- mobile menu area end -->
    </header>
    <!-- header area end -->