<?php
include('src/config.php');
include('src/functions.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Non-stop Healthcare: Edit Profile</title>
    <?php include('src/head.php') ?>
</head>

<body>

    <?php include('src/preload.php') ?>
    <!--=========== BEGIN HEADER SECTION ================-->
    <?php include('src/header.php') ?>
    <!--=========== END HEADER SECTION ================-->

    <?php
    include('src/session_check.php');
    if (isset($_POST['ok'])) {
        $id = $_SESSION['log']['Id'];
        $email = $_POST['mail'];
        $phno = $_POST['phno'];
        if ($_SESSION['log1'] == "client") {
            $name = $_POST['name'];
            $addr = $_POST['addr'];
            $dob = $_POST['dob'];
            $gender = $_POST['gender'];

            $res = mysqli_query($con, "UPDATE client SET Name = '$name', Email = '$email', Address = '$addr', Phone = '$phno', Dob='$dob', Gender='$gender' WHERE Id = '$id' ");
            $qry1 = mysqli_query($con, "SELECT * FROM client WHERE Email='$email'");
            $qry2 = mysqli_num_rows($qry1);
            $row = mysqli_fetch_array($qry1);
            $_SESSION['log'] = $row;
        } else if ($_SESSION['log1'] == "admin") {
            $res = mysqli_query($con, "UPDATE admin SET Email = '$email', Phone = '$phno' WHERE Id = '$id' ");
            $qry3 = mysqli_query($con, "SELECT * FROM admin WHERE Email='$email'");
            $qry4 = mysqli_num_rows($qry3);
            $row = mysqli_fetch_array($qry3);
            $_SESSION['log'] = $row;
        }
        if ($res == 1) {
            echo '
            <script>
              alert("Details Updated");
            </script>
            ';
        } else {
            echo '
            <script>
              alert("Details not Updated");
            </script>
            ';
        }
    }
    if (isset($_POST['okpass'])) {
        $pwd = $_POST['pwd'];
        $repwd = $_POST['repwd'];
        if ($pwd == $repwd) {
            if ($_SESSION['log1'] == "client") {
                $res = mysqli_query($con, "UPDATE client SET Password='$pwd' WHERE Id='$id' ");
            } else if ($_SESSION['log1'] == "admin") {
                $res = mysqli_query($con, "UPDATE admin SET Password='$pwd' WHERE Id='$id' ");
            } 
            if ($res == 1) {
                echo '
                <script>
                  alert("Password Updated Successfully!");
                </script>
                ';
            } else {
                echo '
                <script>
                  alert("Password not Updated");
                </script>
                ';
            }
        } else {
            echo '
            <script>
              alert("Passwords Don\'t match.");
            </script>
            ';
        }
    }
    ?>

    <!--=========== BEGAIN Doctors SECTION ================-->
    <?php if ($_SESSION['log1'] == "client" || $_SESSION['log1'] == "doctor") { ?>
        <section id="service">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="service-area">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
    
    <section id="service">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="service-area">
                        <!-- Start Service Title -->
                        <div class="section-heading">
                            <h2>Update Profile</h2>
                           
                        </div>
                        <div class="service-content">
                            <div class="row">
                                <div class="col-lg-12 col-md-12" >
                                    <form class="appointment-form" method="post">
                                        <?php if ($_SESSION['log1'] == "client") { ?>
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <label class="control-label">Name <span class="required">*</span></label>
                                                    <input type="text" class="wp-form-control wpcf7-text" value="<?php echo $_SESSION['log']['Name'] ?>" name="name" required>
                                                </div>
                                                <div class="col-lg-2 col-md-2"></div>
                                            </div>

                                            <div class="row">
    <div class="col-lg-2 col-md-2"></div>
    <div class="col-lg-8 col-md-8 col-sm-6">
        <label class="control-label">Date of Birth <span class="required">*</span></label><br>
        <input type="date" class="wp-form-control wpcf7-text" value="<?php echo $_SESSION['log']['Dob'] ?>" name="dob" required>
    </div>
    <div class="col-lg-2 col-md-2"></div>
</div>

<div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <label class="control-label">Gender <span class="required">*</span></label><br>
                                                    <select class="wp-form-control wpcf7-select" name="gender" required>
                                                        <option value="">Select Gender</option>
                                                        <option value="Male" <?php if($_SESSION['log']['Gender'] == "Male") echo "selected"; ?>>Male</option>
                                                        <option value="Female" <?php if($_SESSION['log']['Gender'] == "Female") echo "selected"; ?>>Female</option>
                                                    </select>
                                                </div>
    <div class="col-lg-2 col-md-2"></div>
</div>

                                            <div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <label class="control-label">Email <span class="required">*</span></label>
                                                    <input type="email" class="wp-form-control wpcf7-email" value="<?php echo $_SESSION['log']['Email'] ?>" name="mail" required>
                                                </div>
                                                <div class="col-lg-2 col-md-2"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <label class="control-label">Address <span class="required">*</span></label>
                                                    <input type="text" class="wp-form-control wpcf7-email" value="<?php echo $_SESSION['log']['Address'] ?>" name="addr" required>
                                                </div>
                                                <div class="col-lg-2 col-md-2"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <label class="control-label">Phone <span class="required">*</span></label>
                                                    <input type="number" class="wp-form-control wpcf7-text" value="<?php echo $_SESSION['log']['Phone'] ?>" name="phno" required>
                                                </div>
                                                <div class="col-lg-2 col-md-2"></div>
                                            </div>
                                        <?php } else if ($_SESSION['log1'] == "admin") { ?>
                                            <div class="section-heading">
                                            <h2>Update Your Profile</h2>
                                            <div class="row">
                                            
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <label class="control-label">Email <span class="required">*</span></label>
                                                    <input type="email" class="wp-form-control wpcf7-email" value="<?php echo $_SESSION['log']['Email'] ?>" name="mail" required>
                                                </div>
                                                <div class="col-lg-2 col-md-2"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <label class="control-label">Phone <span class="required">*</span></label>
                                                    <input type="number" class="wp-form-control wpcf7-text" value="<?php echo $_SESSION['log']['Phone'] ?>" name="phno" required>
                                                </div>
                                                <div class="col-lg-2 col-md-2"></div>
                                            </div>
                                        <?php } else if ($_SESSION['log1'] == "doctor") { ?>
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <label class="control-label">Email <span class="required">*</span></label>
                                                    <input type="email" class="wp-form-control wpcf7-email" value="<?php echo $_SESSION['log']['Email'] ?>" name="mail" required>
                                                </div>
                                                <div class="col-lg-2 col-md-2"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <label class="control-label">Address <span class="required">*</span></label>
                                                    <input type="text" class="wp-form-control wpcf7-email" value="<?php echo $_SESSION['log']['Address'] ?>" name="addr" required>
                                                </div>
                                                <div class="col-lg-2 col-md-2"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <label class="control-label">Phone <span class="required">*</span></label>
                                                    <input type="number" class="wp-form-control wpcf7-text" value="<?php echo $_SESSION['log']['Phone'] ?>" name="phno" required>
                                                </div>
                                                <div class="col-lg-2 col-md-2"></div>
                                            </div>
                                        <?php } ?>
                                        <div class="row">
                                            <div class="col-lg-2 col-md-2"></div>
                                            <div class="col-lg-8 col-md-8 col-sm-6 text-center">
                                                <button name="ok" type="submit" style="background-color: #458554; color: #fff; padding: 10px 20px; border: none; border-radius: 5px;">
                                                    <i class=""></i><span>Update</span>
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
      
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="service-area">
                        
                        </div>
                        <div class="service-content">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <form class="appointment-form" method="post">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-2"></div>
                                            <div class="col-lg-8 col-md-8 col-sm-6">
                                                <label class="control-label">OldPassword <span class="required">*</span></label>
                                                <input type="password" class="wp-form-control wpcf7-text" placeholder="Password" name="pwd" required>
                                            </div>
                                            <div class="col-lg-2 col-md-2"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-2 col-md-2"></div>
                                            <div class="col-lg-8 col-md-8 col-sm-6">
                                                <label class="control-label">New Password <span class="required">*</span></label>
                                                <input type="password" class="wp-form-control wpcf7-text" placeholder="Confirm Password" name="repwd" required>
                                            </div>
                                           
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-lg-2 col-md-2"></div>
                                            <div class="col-lg-8 col-md-8 col-sm-6 text-center" >
                                                <button name="okpass" type="submit"  style="background-color: #458554; color: #fff; padding: 10px 20px; border: none; border-radius: 5px;">
                                                    <i class=""></i><span>Submit</span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=========== BEGAIN Counter SECTION ================-->
    <!--=========== End Counter SECTION ================-->

    <!--=========== Start Footer SECTION ================-->
    <!--=========== End Footer SECTION ================-->

    <?php include('src/incfooter.php') ?>
</body>

</html>
