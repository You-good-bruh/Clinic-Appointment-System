<?php
include('src/config.php');
include('src/functions.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Non-stop Healthcare : Appointments</title>
    <?php include('src/head.php') ?>
</head>

<body>

    <?php include('src/preload.php') ?>
    <!--=========== BEGIN HEADER SECTION ================-->
    <?php include('src/header.php') ?>
    <!--=========== END HEADER SECTION ================-->

    <?php
    include('src/session_check.php');
    echo youAreHere("Appointments");
    ?>

    <section id="service">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="service-area">
                        <!-- Start Service Title -->
                        <div class="section-heading">
                            <h2>Test Appointment</h2>
                            <div class="line"></div>
                        </div>
                        <div class="service-content">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                               
                                                <th>Test</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                
                                                <th>Name</th>
                                                <th>approve/delete</th>
                                                <th>Status</th>


                                            </tr>
                                        </thead>
                                        <tbody>
    <?php
    $sql = mysqli_query($con, "SELECT * FROM test_appointment,client WHERE test_appointment.users_id=client.id");

    while ($row = mysqli_fetch_array($sql)) {
        $test = $row['Test_id'];
        $sql2 = mysqli_query($con, "SELECT * FROM test WHERE id='$test'");
        $row2 = mysqli_fetch_array($sql2);
    ?>
        <tr>
            <th scope="row"><?= $row2['test_name'] ?></th>
            <td><?= $row['Test_date'] ?></td>
            <td><?= $row['Test_time'] ?></td>

           
            <td>
                <a href="approve.php?id=<?= $row['Test_time'] ?>" class="btn btn-success">Approve</a>
                <a href="delete1.php?id=<?= $row['Test_time'] ?>" class="btn btn-danger">Reject</a>
            </td>
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

    <section id="service">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="service-area">
                        <!-- Start Service Title -->
                        
                                            
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
    <?php include('src/footer.php') ?>
    <!--=========== End Footer SECTION ================-->

    <?php include('src/incfooter.php') ?>
</body>

</html>
