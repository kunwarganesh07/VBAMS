<?php
include('../includes/dbconnection.php');
$id = $_GET['id'];
$query = "DELETE FROM tbldriver WHERE id=$id";
$result = $conn->query($query);
if ($result) {
    echo '<script>
            alert("Driver has been Delete successfully.");
            window.location.href="manage-driver.php"; 
          </script>';
} else {
    echo '<script>alert("Something went wrong. Please try again.");
    window.location.href="manage-driver.php";</script>';
}
?>