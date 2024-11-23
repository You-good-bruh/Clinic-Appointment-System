<?php
include('src/config.php');
include('src/functions.php');

// Check if an appointment is approved or rejected
if(isset($_GET['id'])) {
    $appointment_id = $_GET['id'];
    // Assuming you have a 'status' column in your database table
    $status = $_GET['status'];

    if($status == 'approved') {
        $query = "INSERT INTO approved_appointments (appointment_id) VALUES ('$appointment_id')";
    } elseif($status == 'rejected') {
        $query = "INSERT INTO rejected_appointments (appointment_id) VALUES ('$appointment_id')";
    }

    $result = mysqli_query($con, $query);

    if($result) {
        header('Location: upload.php');
        exit();
    } else {
        echo "Error: Unable to save the appointment.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Non-stop Healthcare : Upload</title>
    <?php include('src/head.php') ?>
    <style>
        .table thead th {
            background-color: #d4edda;
            border-bottom: 2px solid #28a745;
        }
        .table-bordered {
            border: 1px solid #d4edda;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #d4edda;
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .appointments-heading {
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <?php include('src/preload.php') ?>
    <?php include('src/header.php') ?>
    <?php include('src/session_check.php'); ?>

    <section id="service">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="service-area">
                        <div class="section-heading">
                            <h2>Test Appointments</h2>
                        </div>
                        <div class="service-content">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <h4 class="appointments-heading">Approved Appointments</h4>
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Test</th>
                                                <th>Name</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = mysqli_query($con, "SELECT * FROM test_appointment JOIN client ON test_appointment.users_id=client.id WHERE status = 'approved' ORDER BY Test_date, Test_time");

                                            while ($row = mysqli_fetch_array($sql)) {
                                                $test = $row['Test_id'];
                                                $sql2 = mysqli_query($con, "SELECT * FROM test WHERE id='$test'");
                                                $row2 = mysqli_fetch_array($sql2);
                                            ?>
                                            <tr>
                                                <td><?= $row2['test_name'] ?></td>
                                                <td><?= $row['Name'] ?></td>
                                                <td><?= $row['Test_date'] ?></td>
                                                <td><?= $row['Test_time'] ?></td>
                                                <td><?= $row['status'] ?></td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                    <h4 class="appointments-heading">Rejected Appointments</h4>
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Test</th>
                                                <th>Name</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = mysqli_query($con, "SELECT * FROM test_appointment JOIN client ON test_appointment.users_id=client.id WHERE status = 'rejected' ORDER BY Test_date, Test_time");

                                            while ($row = mysqli_fetch_array($sql)) {
                                                $test = $row['Test_id'];
                                                $sql2 = mysqli_query($con, "SELECT * FROM test WHERE id='$test'");
                                                $row2 = mysqli_fetch_array($sql2);
                                            ?>
                                            <tr>
                                                <td><?= $row2['test_name'] ?></td>
                                                <td><?= $row['Name'] ?></td>
                                                <td><?= $row['Test_date'] ?></td>
                                                <td><?= $row['Test_time'] ?></td>
                                                <td><?= $row['status'] ?></td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include('src/footer.php') ?>
    <?php include('src/incfooter.php') ?>
</body>
</html>
