<?php include('src/config.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Non-Stop Healthcare: Home</title>
    <?php include('src/head.php') ?>
</head>

<body>

    <?php include('src/preload.php') ?>
    <!--=========== BEGIN HEADER SECTION ================-->
    <?php include('src/header.php') ?>
    <!--=========== END HEADER SECTION ================-->

    <!--=========== BEGIN SLIDER SECTION ================-->
    <?php include('src/slider.php') ?>
    <!--=========== END SLIDER SECTION ================-->

    <!--=========== BEGIN Top Feature SECTION ================-->
    <?php
    if (empty($_SESSION['log']) || $_SESSION['log1'] == "client") {
        if (isset($_POST['ok'])) {
            if (empty($_SESSION['log'])) {
                echo '
                <script>
                  alert("Sign in First");
                  window.location.href = "signin.php";
                </script>
                ';
            } else {
                $id = $_SESSION['log']['Id'];
                $type = $_POST['type'] ?? null;

                if ($type === 'test') {
                    $test = $_POST['test'];
                    $appdate = $_POST['appdate1'];
                    $apptime = date('H:i:s', strtotime($_POST['apptime1']));
                    $qry = mysqli_query($con, "INSERT INTO test_appointment (Test_id, Test_time, Test_date, Users_id, Report) VALUES ('$test', '$apptime', '$appdate', '$id', '')");

                    if ($qry) {
                        echo '
                        <script>
                        alert("Appointment set Successfully");
                        window.location.href = "appointments.php";
                        </script>
                        ';
                    } else {
                        echo '
                        <script>
                        alert("Appointment set Unsuccessful, RETRY!");
                        </script>
                        ';
                    }
                } else if ($type === 'doctor') {
                    $name = $_SESSION['log']['Name'];
                    $doc = $_POST['docname'];
                    $appdate = $_POST['appdate'];
                    $apptime = date('H:i:s', strtotime($_POST['apptime']));
                    $qry = mysqli_query($con, "INSERT INTO doctor_app (Doctor_id, App_date, App_time, Users_id, User_name, Report, Status) VALUES ('$doc', '$appdate', '$apptime', '$id', '$name', '', 'Accepted')");

                    if ($qry) {
                        echo '
                        <script>
                        alert("Appointment set Successfully");
                        window.location.href = "appointments.php";
                        </script>
                        ';
                    } else {
                        echo '
                        <script>
                        alert("Appointment set Unsuccessful, RETRY!");
                        </script>
                        ';
                    }
                }
            }
        }
    ?>

        <section class="top-feature-section">
            <!-- Start Single Top Feature - Appointment -->
            <div class="col-lg-4 col-md-4">
                <div class="row">
                    <div class="single-top-feature">
                        <h3>Appointment</h3>
                        <p><b>Book your appointment right away by clicking on the button below.</b></p>
                        <div class="readmore_area">
                            <a data-hover="Book Appointment" data-target="#myModal" data-toggle="modal" href="#">
                                <span>Book Appointment</span>
                            </a>
                            <p><b>Click on the button above.</b></p>
                           
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Top Feature -->

            <!-- Start Single Top Feature - Opening Hours -->
            <div class="col-lg-4 col-md-4">
                <div class="row">
                    <div class="single-top-feature opening-hours">
                        <h3>Opening Hours</h3>
                        <p>Open All seven days of the week.</p>
                        <ul class="opening-table">
                            <li>
                                <span><b>WEEKDAYS:</b></span>
                                <div class="value">6:00 AM - 10:00 PM</div>
                            </li>
                            <li>
                                <span><b>WEEKNDS:</b></span>
                                <div class="value">8:00 AM - 9:00 PM</div>
                            </li>
                            <li>
                                <span><b>Incase of Public Holiday:</b></span>
                                <div class="value"><b>The clinic will stay closed.</b></div>
                                
                            </li>
                            <li>.
    </li>
                                                            
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Single Top Feature -->

            <!-- Start Single Top Feature - More About Us -->
            <div class="col-lg-4 col-md-4">
                <div class="row">
                    <div class="single-top-feature">
                        <h3>More About Us</h3>
                        <p><b>Learn more about our services and facilities and become part of our family.</b></p>
                        
                        <div class="readmore_area">
                        <a   href="aboutUs.php" data-hover="Read more">
                            
                                <span>Read More</span>
                              
                                
                            </a>
                            <p><b>Click on the button above.</b></p>
                            <p><b></b></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Top Feature -->
        </section>

        <div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="myModal" role="dialog" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button aria-hidden="true" class="close" data-dismiss="modal" type="button">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Appointment Details</h4>
                    </div>
                    <div class="modal-body">
                        <div class="appointment-area">
                            <form class="appointment-form" method="post">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <label class="control-label">Appointment Date <span class="required">*</span></label>
                                        <input type="Date" class="wp-form-control wpcf7-text" placeholder="mm/dd/yy" name="appdate1" min="<?= date("Y-m-d"); ?>" max="<?= date("Y-m-d", strtotime("+1 month")); ?>" required>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <label class="control-label">Appointment Time <span class="required">*</span></label>
                                        <input type="time" class="wp-form-control wpcf7-text" placeholder="hh:mm" name="apptime1" required>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <label class="control-label">Select Test <span class="required">*</span></label>
                                        <?php $sql = mysqli_query($con, "SELECT * FROM test") ?>
                                        <select class="wp-form-control wpcf7-select" name="test" required>
                                            <?php while ($row = mysqli_fetch_array($sql)) { ?>
                                                <option value="<?= $row['id']; ?>"><?= $row['test_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" name="type" value="test">
                                <button class="" name="ok" type="submit" style="background-color:green; color:#00000; padding: 10px 20px; border: none; border-radius: 5px;">
                                    <i class=""></i><span>Book Appointment</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    <?php } ?>

    <?php include('src/incfooter.php') ?>
</body>

</html>