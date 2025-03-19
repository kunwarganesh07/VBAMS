<title>VBMS || Take Action </title>
<?php
include("../includes/driverheader.php");
include("../includes/driversidebar.php");

?>
<?php
$id = $_GET['id'];
$query = "SELECT * FROM tblbook WHERE id=$id";
$result = $conn->query($query);
$data = $result->fetch_assoc();


$driver = $_SESSION['driverid'];

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
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
                    <a class="navbar-brand" href="#">View Booking Request</a>
                </nav>
                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="card">
                                <?php
                                if (isset($_POST["submit"])) {
                                    $id = intval($_GET['id']);
                                    $remark = $conn->real_escape_string($_POST['remark']);
                                    $status = $conn->real_escape_string($_POST['Status']);
                                    $accepted_by = $driver;

                                    $getuser = "UPDATE tblbook SET remark='$remark', Status='$status', accepted_by='$accepted_by' WHERE id=$id";

                                    $result_update = $conn->query($getuser);


                                    
                                    $sql = "SELECT * FROM tbldriver WHERE driverid='$driver'";
                                    $result_sql = $conn->query($sql);
                                    $data_sql = $result_sql->fetch_assoc();
                                     //send Email to the user
                                
                                     $check = mail(
                                        $data['Email'],
                                        "Vehicle Assistance Request Received – " . $data['BookingNumber'],
                                        "Dear " . $data['Name'] . ",\n\n" .
                                        "**The Status of Your Request is: " . $status . "**\n\n" .  // Newline added after this statement
                                        "Driver Name: " . $data_sql['name'] . "\n" .
                                        "Driver Contact: " . $data_sql['phone'] . "\n\n" .
                                        "Now, you can contact to driver.\n" .
                                        "Your Booking Number is [" . $data['BookingNumber'] . "]\n\n" .  // Newline added here
                                        "**********Thank you**********",
                                        "From: ganeshkunwar2003@gmail.com"
                                    );



                                    if ($result_update) {
                                        // Redirect to the same page to reflect updated data
                                        header("location: action.php?id=$id");
                                        exit();
                                    }
                                }



                                if ($data['Status'] == 'Not Updated Yet') {
                                    echo "
                            <div class='card-body'>
                                <div class='table-responsive'>
                                    <table
                                        class='table table-bordered table-striped table-hover js-basic-example dataTable'>
                                        <tr class='text-danger'>
                                            <th>Booking Number</th>
                                            <td colspan='3'> $data[BookingNumber] </td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td> $data[Email] </td>
                                            <th>Name</th>
                                            <td> $data[Name] </td>
                                        </tr>
                                        <tr>
                                            <th>Destination</th>
                                            <td> $data[Destination] </td>
                                            <th>Pickup Location</th>
                                            <td> $data[PickupLoc] </td>
                                        </tr>
                                        <tr>
                                            <th>Pickup Time</th>
                                            <td> $data[PickupTime] </td>
                                            <th>Pickup Date</th>
                                            <td> $data[PickupDate] </td>
                                        </tr>
                                        
                                    </table>
                                    <!-- Button trigger modal -->
                                    <button type='button' class='btn btn-primary' data-bs-toggle='modal'
                                        data-bs-target='#staticBackdrop'>
                                        Take Action
                                    </button>

                                    <!-- Modal -->
                                    <div class='modal fade' id='staticBackdrop' data-bs-backdrop='static'
                                        data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel'
                                        aria-hidden='true'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <h5 class='modal-title fs-5' id='staticBackdropLabel'>Take Action</h5>
                                                </div>
                                                <form action='' method='post'>
                                                <div class='modal-body'>
                                                        <div class='row'>
                                                            <div class='col-md-12'>
                                                                <div class='form-group'>
                                                                    <label for=''><b>Remarks:</b></label>
                                                                   <input type='text' class='form-control' name='remark' required>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class='col-md-12'>
                                                                <div class='form-group'>
                                                                    <label for=''><b>Status:</b></label>
                                                                    <select name='Status' class='form-control' id=''>
                                                                        <option value='	Not Updated Yet' selected disabled>Not Updated Yet</option>
                                                                        <option value='On The Way'>On The Way</option>
                                                                        <option value='Completed'>Completed</option>
                                                                        <option value='Rejected'>Rejected</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    
                                                </div>
                                                <div class='modal-footer'>
                                                    <button type='button' class='btn btn-secondary'
                                                        data-bs-dismiss='modal'>Close</button>
                                                    <button type='submit'name='submit' class='btn btn-primary'>Update</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>";


                                }



                                if ($data['Status'] == 'On The Way') {
                                    echo "
                                <div class='card-body'>
                                    <div class='table-responsive'>
                                        <table
                                            class='table table-bordered table-striped table-hover js-basic-example dataTable'>
                                            <tr class='text-danger'>
                                                <th>Booking Number</th>
                                                <td colspan='3'> $data[BookingNumber] </td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td> $data[Email] </td>
                                                <th>Name</th>
                                                <td> $data[Name] </td>
                                            </tr>
                                            <tr>
                                                <th>Destination</th>
                                                <td> $data[Destination] </td>
                                                <th>Pickup Location</th>
                                                <td> $data[PickupLoc] </td>
                                            </tr>
                                            <tr>
                                                <th>Pickup Time</th>
                                                <td> $data[PickupTime] </td>
                                                <th>Pickup Date</th>
                                                <td> $data[PickupDate] </td>
                                            </tr>

                                        </table>
                                        <!-- Button trigger modal -->
                                        <button type='button' class='btn btn-primary' data-bs-toggle='modal'
                                            data-bs-target='#staticBackdrop'>
                                            Take Action
                                        </button>


                                        <div class='table-responsive mt-3'>
                                            <table
                                                class='table table-bordered table-striped table-hover js-basic-example dataTable'>
                                                <tr class='text-danger'>
                                                    <th colspan='4'><h5 class='text text-primary text-center'>Tracking History</h5></th>
                                                </tr>
                                                <tr>
                                                    <th>Remark</th>
                                                    <th>Status</th>
                                                    <th>Time</th>
                                                </tr>
                                                <tr>
                                                    <td> $data[remark] </td>
                                                    <th>$data[Status]</th>
                                                    <td> $data[time] </td>
                                                </tr>
                                                
                                            </table>
                                        </div>
                                        <!-- Modal -->
                                        <div class='modal fade' id='staticBackdrop' data-bs-backdrop='static'
                                            data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel'
                                            aria-hidden='true'>
                                            <div class='modal-dialog'>
                                                <div class='modal-content'>
                                                    <div class='modal-header'>
                                                        <h5 class='modal-title fs-5' id='staticBackdropLabel'>Take
                                                            Action</h5>
                                                    </div>
                                                    <form action='' method='post'>
                                                        <div class='modal-body'>
                                                            <div class='row'>
                                                                <div class='col-md-12'>
                                                                    <div class='form-group'>
                                                                        <label for=''><b>Remarks:</b></label>
                                                                        <input type='text' class='form-control'
                                                                            name='remark' required>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class='col-md-12'>
                                                                    <div class='form-group'>
                                                                        <label for=''><b>Status:</b></label>
                                                                        <select name='Status' class='form-control'
                                                                            id=''>
                                                                            <option value='	Not Updated Yet' selected
                                                                                disabled>Not Updated Yet</option>
                                                                            <option value='On The Way' disabled>On The Way
                                                                            </option>
                                                                            <option value='Completed'>Completed</option>
                                                                            <option value='Rejected'>Rejected</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class='modal-footer'>
                                                            <button type='button' class='btn btn-secondary'
                                                                data-bs-dismiss='modal'>Close</button>
                                                            <button type='submit' name='submit'
                                                                class='btn btn-primary'>Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>";


                                }

                                if ($data['Status'] == 'Rejected') {
                                    echo "
                                <div class='card-body'>
                                    <div class='table-responsive'>
                                        <table
                                            class='table table-bordered table-striped table-hover js-basic-example dataTable'>
                                            <tr class='text-danger'>
                                                <th>Booking Number</th>
                                                <td colspan='3'> $data[BookingNumber] </td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td> $data[Email] </td>
                                                <th>Name</th>
                                                <td> $data[Name] </td>
                                            </tr>
                                            <tr>
                                                <th>Destination</th>
                                                <td> $data[Destination] </td>
                                                <th>Pickup Location</th>
                                                <td> $data[PickupLoc] </td>
                                            </tr>
                                            <tr>
                                                <th>Pickup Time</th>
                                                <td> $data[PickupTime] </td>
                                                <th>Pickup Date</th>
                                                <td> $data[PickupDate] </td>
                                            </tr>

                                        </table>
                                        <!-- Button trigger modal -->
                                        <button type='button' class='btn btn-primary' data-bs-toggle='modal'
                                            data-bs-target='#staticBackdrop'>
                                            Take Action
                                        </button>


                                        <div class='table-responsive mt-3'>
                                            <table
                                                class='table table-bordered table-striped table-hover js-basic-example dataTable'>
                                                <tr class='text-danger'>
                                                    <th colspan='4'><h5 class='text text-primary text-center'>Tracking History</h5></th>
                                                </tr>
                                                <tr>
                                                    <th>Remark</th>
                                                    <th>Status</th>
                                                    <th>Time</th>
                                                </tr>
                                                <tr>
                                                    <td> $data[remark] </td>
                                                    <th>$data[Status]</th>
                                                    <td> $data[time] </td>
                                                </tr>
                                                
                                            </table>
                                        </div>
                                        <!-- Modal -->
                                        <div class='modal fade' id='staticBackdrop' data-bs-backdrop='static'
                                            data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel'
                                            aria-hidden='true'>
                                            <div class='modal-dialog'>
                                                <div class='modal-content'>
                                                    <div class='modal-header'>
                                                        <h5 class='modal-title fs-5' id='staticBackdropLabel'>Take
                                                            Action</h5>
                                                    </div>
                                                    <form action='' method='post'>
                                                        <div class='modal-body'>
                                                            <div class='row'>
                                                                <div class='col-md-12'>
                                                                    <div class='form-group'>
                                                                        <label for=''><b>Remarks:</b></label>
                                                                        <input type='text' class='form-control'
                                                                            name='remark' required>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class='col-md-12'>
                                                                    <div class='form-group'>
                                                                        <label for=''><b>Status:</b></label>
                                                                        <select name='Status' class='form-control'
                                                                            id=''>
                                                                            <option value='	Not Updated Yet'
                                                                                disabled>Not Updated Yet</option>
                                                                            <option value='On The Way' >On The Way
                                                                            </option>
                                                                            <option value='Completed'>Completed</option>
                                                                            <option value='Rejected' selected disabled>Rejected</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class='modal-footer'>
                                                            <button type='button' class='btn btn-secondary'
                                                                data-bs-dismiss='modal'>Close</button>
                                                            <button type='submit' name='submit'
                                                                class='btn btn-primary'>Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>";


                                }
                                ?>

                                <?php
                                if ($data['Status'] == 'Completed') {
                                    echo "
                            <div class='card-body'>
                                <div class='table-responsive'>
                                    <table
                                        class='table table-bordered table-striped table-hover js-basic-example dataTable'>
                                        <tr class='text-danger'>
                                            <th>Booking Number</th>
                                            <td colspan='3'> $data[BookingNumber] </td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td> $data[Email] </td>
                                            <th>Name</th>
                                            <td> $data[Name] </td>
                                        </tr>
                                        <tr>
                                            <th>Destination</th>
                                            <td> $data[Destination] </td>
                                            <th>Pickup Location</th>
                                            <td> $data[PickupLoc] </td>
                                        </tr>
                                        <tr>
                                            <th>Pickup Time</th>
                                            <td> $data[PickupTime] </td>
                                            <th>Pickup Date</th>
                                            <td> $data[PickupDate] </td>
                                        </tr>
                                        
                                    </table>
                                </div>
                                <div class='table-responsive'>
                                    <table
                                        class='table table-bordered table-striped table-hover js-basic-example dataTable'>
                                        <tr class='text-danger'>
                                            <th colspan='4'><h5 class='text text-primary text-center'>Tracking History</h5></th>
                                        </tr>
                                        <tr>
                                            <th>Remark</th>
                                            <th>Status</th>
                                            <th>Time</th>
                                        </tr>
                                        <tr>
                                            <td> $data[remark] </td>
                                            <th>$data[Status]</th>
                                            <td> $data[time] </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>";
                                }
                                ?>

                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
</div>