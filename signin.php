<?php
include('src/config.php');
include('src/functions.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Non-Stop Healthcare: Sign In</title>
    <?php include('src/head.php') ?>
</head>

<body>

    <?php include('src/preload.php') ?>
    <!--=========== BEGIN HEADER SECTION ================-->
    <?php include('src/header.php') ?>
    <!--=========== END HEADER SECTION ================-->

    <?php
    $email = $pwd = '';
    if (isset($_POST['ok'])) {
        $email = $_POST['mail'];
        $pwd = $_POST['pwd'];
        $qry1 = mysqli_query($con, "SELECT * FROM client WHERE Email='$email' and Password='$pwd'") or die(mysqli_error($con));
        $qry2 = mysqli_num_rows($qry1);
        if ($qry2) {
            $row = mysqli_fetch_array($qry1);
            $_SESSION['log'] = $row;
            $_SESSION['log1'] = "client";
            echo '
        <script>
          alert("Signed in Successfully");
          window.location.href = "index.php";
        </script>
        ';
        } else {
            $qry3 = mysqli_query($con, "SELECT * FROM admin WHERE Email='$email' and Password='$pwd'");
            $qry4 = mysqli_num_rows($qry3);
            if ($qry4) {
                $row = mysqli_fetch_array($qry3);
                $_SESSION['log'] = $row;
                $_SESSION['log1'] = "admin";
                echo '
            <script>
              alert("Signed in Successfully");
              window.location.href = "index.php";
            </script>
            ';
            } else {
                $qry5 = mysqli_query($con, "SELECT * FROM doctor WHERE Email='$email' and Password='$pwd'");
                $qry6 = mysqli_num_rows($qry5);
                if ($qry6) {
                    $row = mysqli.fetch_array($qry5);
                    $_SESSION['log'] = $row;
                    $_SESSION['log1'] = "doctor";
                    echo '
                <script>
                  alert("Signed in Successfully");
                  window.location.href = "index.php";
                </script>
                ';
                } else {
                    echo '
                <script>
                  alert("Wrong Email ID or Password");
                </script>
                ';
                }
            }
        }
    }
    ?>
    <!--=========== BEGIN SIGNIN SECTION ================-->
    <section id="service">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="service-area">
                        <!-- Start Service Title -->
                        <div class="section-heading">
                            <h2>Sign In</h2>
                            
                        </div>
                        <div class="service-content">
                            <div class="row">
                                <!-- Sign In Form Section -->
                                <div class="col-lg-12 col-md-12">
                                    <div style="border: 1px solid #ddd; padding: 20px; border-radius: 5px; background-color: #e6ffe6;">
                                        <h3 style="text-align: center; font-weight: bold; color: black;">Sign In</h3>
                                        <form class="appointment-form" method="post">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <label class="control-label"><b>Enter your Email</b>
                                                        <span class="required">*</span>
                                                    </label>
                                                    <input type="email" class="wp-form-control wpcf7-text" placeholder=" Enter email address" name="mail" value="<?= $email ?>" required>
                                                </div>
                                                <div class="col-lg-2 col-md-2"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <label class="control-label"><b> Enter your Password </b><span class="required">*</span></label>
                                                    <input type="password" class="wp-form-control wpcf7-text" placeholder=" Enter password" name="pwd" value="<?= $pwd ?>" required>
                                                </div>
                                                <div class="col-lg-2 col-md-2"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <button name="ok" type="submit" style="background-color: #458554; color: #fff; padding: 10px 20px; border: none; border-radius: 5px;">
                                                        <i class=""></i><span>Submit</span>
                                                    </button>
                                                </div>
                                                <div class="col-lg-2 col-md-2"></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=========== END SIGNIN SECTION ================-->

    <!--=========== BEGIN Counter SECTION ================-->
    <?php include('src/counter.php') ?>
    <!--=========== End Counter SECTION ================-->

    <!--=========== Start Footer SECTION ================-->
    <?php include('src/footer.php') ?>
    <!--=========== End Footer SECTION ================-->

    <?php include('src/incfooter.php') ?>
</body>

</html>
