<?php
include('src/config.php');
include('src/functions.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>HMS : Update</title>
    <?php include('src/head.php') ?>
    <style>
        .table thead th {
            background-color: #d4edda;
            border-bottom: 2px solid #28a745;
        }
        .table-bordered {
            border: 1px solid #d4edda;
        }
        .table-bordered td,
        .table-bordered th {
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
        .heading {
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
                            <h2>Test</h2>
                                                  </div>
                        <div class="service-content">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <h4 class="heading"><b>Tests Information</b></h4>
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Test</th>
                                                <th>Fees</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = mysqli_query($con, "SELECT * FROM test");
                                            while ($row = mysqli_fetch_array($sql)) {
                                                ?>
                                                <tr>
                                                    <th scope="row"><?= $row['test_name'] ?></th>
                                                    <td><?= $row['test_cost'] ?></td>
                                                    <td><a href="edit.php?data=test&id=<?= $row['id']; ?>">Edit</a></td>
                                                    <td><a href="delete.php?data=test&id=<?= $row['id']; ?>">Delete</a></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 text-center">
                                    <a data-hover="Add New" style="background-color: #458554; color: #fff; padding: 10px 20px; border: none; border-radius: 5px;" href="insert.php?data=test"><span>Add New</span></a>
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
