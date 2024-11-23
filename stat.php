<?php
include('src/config.php');
include('src/functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Non-stop Healthcare : Stats</title>
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
    <!--=========== BEGIN HEADER SECTION ================-->
    <?php include('src/header.php') ?>
    <!--=========== END HEADER SECTION ================-->
    <?php include('src/session_check.php'); ?>
    <section id="service">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="service-area">
                        <h2>Test Appointments</h2>
                        <div class="service-content">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <h4 class="appointments-heading">Count of Tests </h4>
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Test</th>
                                                <th>Count</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = mysqli_query($con, "SELECT * FROM test");
                                            while ($row = mysqli_fetch_array($sql)) {
                                                $test = $row['id'];
                                                $count = mysqli_query($con, "SELECT COUNT(Test_id) FROM test_appointment WHERE Test_id='$test' ");
                                                $row2 = mysqli_fetch_array($count);
                                            ?>
                                                <tr>
                                                    <th scope="row"><?= $row['test_name']; ?></th>
                                                    <td><?= $row2[0] ?></td>
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
    <!--=========== Start Footer SECTION ================-->
    <!--=========== End Footer SECTION ================-->
    <?php include('src/incfooter.php') ?>
</body>
</html>
