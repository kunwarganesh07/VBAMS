<title>VBMS || Contact Page</title>
<?php
include('includes/header.php');
?>
<div class="page-title-area overlay">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- page title start -->
                <div class="page-title">
                    <h2>contact us</h2>
                </div>
                <!-- page title end -->
                <!-- page title menu start -->
                <div class="page-title-menu">
                    <ul>
                        <li><a href="index.php">Home</a> <span> / </span> </li>
                        <li><a href="contact.php">contact us</a></li>
                    </ul>
                </div>
                <!-- page title menu end -->
            </div>
        </div>
    </div>
</div>
<!-- page title area end -->
<div class="container ">
    <div class="row ">
        <div class="col-md-8 col-md-offset-4 col-xs-12 ">
            <!-- contact box start -->

            <div class="card bg-info" style="width: 18rem; border: 2px solid white; margin-top:10px;margin-bottom:10px">
                <div class="card-body" style="margin-left:10px">
                    <div class="contact-info">
                        <?php
                        $sql = "SELECT * from tblpage where PageType='contactus'";
                        $query = $conn->query($sql);
                        $data = $query->fetch_assoc(); ?>
                        <!-- title -->
                        <h3 class="contact-title">contact address</h3>
                        <!-- single address start -->
                        <div class="single-address">
                            <div class="icon locationicon"><i class="fa-solid fa-location-dot mt-2"
                                    style="margin-top:5px"></i></div>
                            <div class="icon-text" style="margin-top:15px">
                                <p><?php echo $data['PageDescription'];  ?></p>
                            </div>
                        </div>
                        <!-- single address end -->
                        <!-- single address start -->
                        <div class="single-address">
                            <div class="icon phoneicon"><i class="fa-solid fa-phone" style="margin-top:5px"></i></div>
                            <div class="icon-text">
                                <p style="margin-top:15px;">Phone : (+91) <?php echo $data['MobileNumber']; ?>
                                </p>
                            </div>
                        </div>
                        <!-- single address end -->
                        <!-- single address start -->
                        <div class="single-address">
                            <div class="icon emailicon"><i class="fa-regular fa-envelope" style="margin-top:5px"></i>
                            </div>
                            <div class="icon-text">
                                <p style="margin-top:15px;margin-bottom:20px"><?php echo $data['Email'];  ?>
                                </p>
                            </div>
                        </div>
                        <!-- single address end -->
                    </div>
                </div>
            </div>
            <!-- contact box end -->
            <div style="margin-top:5px">

            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const dateInput = document.getElementById("datePicker");

    // Get today's date in YYYY-MM-DD format
    const today = new Date().toISOString().split('T')[0];

    // Set the minimum date to today (disables past dates)
    dateInput.setAttribute("min", today);

    // Load the previous date from localStorage
    const savedDate = localStorage.getItem("selectedDate");

    // If a saved date exists but is in the past, do NOT select it
    if (savedDate && savedDate >= today) {
        dateInput.value = savedDate;
    } else {
        // Clear invalid past date from localStorage
        localStorage.removeItem("selectedDate");
    }

    // Save the selected date to localStorage
    dateInput.addEventListener("change", function() {
        localStorage.setItem("selectedDate", dateInput.value);
    });
});
</script>
<!-- quick book area end -->
<?php include('includes/footer.php'); ?>