<?php
include('src/functions.php');
include('src/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Non-stop Healthcare : Appointments</title>
    <?php include('src/head.php') ?>
    <style>
        .appointments-table {
            background-color: #e9f7ef;
            border-collapse: collapse;
            width: 100%;
        }

        .appointments-table th,
        .appointments-table td {
            border: 1px solid #000;
            padding: 8px;
        }

        .appointments-table th {
            background-color: #c5e7cd;
        }

        .section-heading {
            padding: 20px;
            margin-bottom: 20px;
            margin-top: 20px; /* Added margin-top */
        }
    </style>
</head>

<body>

    <?php include('src/preload.php') ?>
    <!--=========== BEGIN HEADER SECTION ================-->
    <?php include('src/header.php') ?>
    <!--=========== END HEADER SECTION ================-->

    <?php
    include('src/session_check.php');
    ?>
    <section id="service">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="service-area">
                        <!-- Start Service Title -->
                        <div class="section-heading">
                            <h2><strong>My Appointments</strong></h2>
                        </div>
                        <!-- End Service Title -->

                        <!-- Start Table -->
                        <table class="table table-hover appointments-table">
                            <thead>
                                <tr>
                                    <th>Test</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Delete</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($_SESSION['log1'] == "client") {
                                    $id = $_SESSION['log']['Id'];
                                    $sql = mysqli_query($con, "SELECT * FROM test_appointment WHERE Users_id='$id' ");
                                    while ($row = mysqli_fetch_array($sql)) {
                                        $test = $row['Test_id'];
                                        $sql2 = mysqli_query($con, "SELECT * FROM test WHERE id='$test' ");
                                        $row2 = mysqli_fetch_array($sql2);
                                ?>
                                        <tr>
                                            <td><?= $row2['test_name'] ?></td>
                                            <td><?= $row['Test_date'] ?></td>
                                            <td><?= $row['Test_time'] ?></td>
                                            <td><a href="deleteapp.php?data=test&action=delete&id=<?= $row['Id']; ?>">Delete Appointment</a></td>
                                            <td><?= $row['status'] ?></td>
                                        </tr>
                                    <?php
                                    }
                                } elseif ($_SESSION['log1'] == "doctor") {
                                    $id = $_SESSION['log']['Id'];
                                    $status = "Rejected";
                                    $sql = mysqli_query($con, "SELECT * FROM doctor_app WHERE Doctor_id='$id' and Status!='$status' ");
                                    while ($row = mysqli_fetch_array($sql)) {
                                        $sts = $row['Status'];
                                        $user = $row['Users_id'];
                                        $sql2 = mysqli_query($con, "SELECT * FROM client WHERE Id='$user' ");
                                        $row2 = mysqli_fetch_array($sql2);
                                    ?>
                                        <tr>
                                            <td><?= $row2['Name'] ?></td>
                                            <td><?= $row['App_date'] ?></td>
                                            <td><?= $row['App_time'] ?></td>
                                            <td><a href="deleteapp.php?data=doctor&action=reject&id=<?= $row['Id']; ?>">Decline</a></td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                        <!-- End Table -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=========== Start Footer SECTION ================-->
    <?php include('src/footer.php') ?>
    <!--=========== End Footer SECTION ================-->

    <?php include('src/incfooter.php') ?>
</body>

</html>
