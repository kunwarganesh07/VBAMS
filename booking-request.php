<title>VBMS || Booking Request Page</title>
<?php
include('includes/dbconnection.php');



if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $pickuploc = $_POST['pickuploc'];
    $destination = $_POST['destination'];
    $phone = $_POST['phone'];
    $pickupdate = $_POST['pickupdate'];
    $pickuptime = $_POST['pickuptime'];
    $bookingnumber = mt_rand(10000000, 99999999);
    // $sql = "insert into tblbook(BookingNumber,Name,Email,PhoneNumber,PickupLoc,Destination,PickupDate,PickupTime)values('$bookingnumber','$name','$email','$phone','$pickuploc','$destination','$pickupdate','$pickuptime')";
    // $query = $conn->query($sql);


    $check = mail(
        $email,
        "Vehicle Assistance Request Received – " . $bookingnumber,
        "Dear " . $name . ",
    We have received your vehicle assistance request and our team is currently processing it. 
    please wait some time to Process .
    Your Pick Up location : . $pickuploc .
    Your Destination : . $destination .
    Pick Up Date : . $pickupdate .
    Pick Up Time : . $pickuptime .
    Your Booking Number is [" . $bookingnumber . "]",
        "From:kunwarganesh2003@gmail.com"
    );


    // if ($check) {
    //     $error = "<p style='color:green;'>Email Sent Successfully</p>";
    // } else {
    //     $error = "<p style='color:red;'>Email Not Sent Successfully</p>";
    // }

    if ($check) {

        $sql = "insert into tblbook(BookingNumber,Name,Email,PhoneNumber,PickupLoc,Destination,PickupDate,PickupTime)values('$bookingnumber','$name','$email','$phone','$pickuploc','$destination','$pickupdate','$pickuptime')";
        $query = $conn->query($sql);



        echo '<script>
                alert("Email Sent Successfully.");
                window.location.href="booking-request.php"; 
              </script>';
    } else {
        echo '<script>alert(" Email Not Sent Something went wrong. Please try again.");
            window.location.href="booking-request.php";</script>';
    }
}
?>

<?php
include('includes/header.php');
?>
<div class="page-title-area overlay">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- page title start -->
                <div class="page-title">
                    <h2>Send Request</h2>
                </div>
                <!-- page title end -->
                <!-- page title menu start -->
                <div class="page-title-menu">
                    <ul>
                        <li><a href="index.php">Home</a> <span> / </span> </li>
                        <li><a href="booking-request.php">Request Form</a></li>
                    </ul>
                </div>
                <!-- page title menu end -->
            </div>
        </div>
    </div>
</div>
<!-- page title area end -->
<!-- checkout area start -->
<div class="checkout-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- client address start -->
                <div class="client-address">
                    <!-- section title start -->
                    <div class="section-small-title">
                        <h3>Booking Form for Breakdown Assistance</h3>
                    </div>

                    <!-- section title start -->

                    <!-- client address form -->
                    <div class="client-address-form">
                        <form action="" method="post">
                            <label>Name</label>
                            <input class="form-control" type="text" placeholder="Enter your name" name="name"
                                required="true">
                            <label class="form-label">Email</label>
                            <input class="form-control" type="email" placeholder="Enter your email" name="email"
                                required="true">
                            <label class="form-label">Phone</label>
                            <input class="form-control" type="tel" placeholder="Enter your phone number" name="phone"
                                pattern="\d{10,12}" title="Phone number must be between 10 and 12 digits" maxlength="12"
                                required="true" maxlength="10">
                            <label class="form-label">Pickup Location</label>
                            <input class="form-control" type="text" placeholder="Enter Location" name="pickuploc"
                                required="true">
                            <label class="form-label">Destination</label>
                            <input class="form-control" type="text" placeholder="Enter Destination" name="destination"
                                required="true">
                            <label class="form-label">Pickup Date</label>
                            <input class="form-control" type="date" required="true" name="pickupdate" id="datePicker">
                            <label class="form-label">Pickup Time</label>
                            <input class="form-control" type="time" required="true" name="pickuptime" id="timePicker">
                            <div class="form-btn">
                                <div class="shopping-button">
                                    <div class="form-btn">
                                        <button class="submit-btn" name="submit">Book Now</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- client address end -->
            </div>

        </div>
    </div>
</div>
<!-- checkout area end -->
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
<script>
function updateMinTime() {
    const timeInput = document.getElementById("timePicker");
    const now = new Date();

    // Get current time in HH:MM format
    const hours = now.getHours().toString().padStart(2, '0');
    const minutes = now.getMinutes().toString().padStart(2, '0');
    const currentTime = `${hours}:${minutes}`;

    // Set the min attribute to disable past times
    timeInput.setAttribute("min", currentTime);

    // If the selected time is in the past, reset it to the minimum time
    if (timeInput.value && timeInput.value < currentTime) {
        timeInput.value = currentTime;
    }
}

document.addEventListener("DOMContentLoaded", function() {
    updateMinTime(); // Set min time when page loads

    // Update the min time every minute
    setInterval(updateMinTime, 60000);

    // Also update min time when the user interacts with the input
    document.getElementById("timePicker").addEventListener("focus", updateMinTime);
});
</script>
<!-- quick book area end -->
<?php include('includes/footer.php'); ?>