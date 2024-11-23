<?php include('src/functions.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Non-stop Healthcare : Contact</title>
    <?php include('src/head.php') ?>
</head>

<body>

    <?php include('src/preload.php') ?>
    <!--=========== BEGIN HEADER SECTION ================-->
    <?php include('src/header.php') ?>
    <!--=========== END HEADER SECTION ================-->

    <?php // echo youAreHere("Contact") ?>
    <section id="contact-page">
        <div class="container">
            <div class="row contact-wrap">
                <div class="col-lg-5 col-md-5 col-sm-6">
                    <div class="contact-address">
                        <div class="section-heading">
                            <h1>Contact Information</h1>
                            <div class="line"></div>
                        </div>
                        <h3><p><b>Incase of any queries feel free to contact on the details provided below.</b></p></h3>
                        <address class="contact-info">
                            <p><span class="fa fa-home"></span><b>Non-stop Healthcare Pvt.Ltd
                                sankhamul, Kathmandu, Nepal</b></p>
                            <p><span class="fa fa-phone"></span><b>01-4797145,9861208878</b></p>
                            <p><span class="fa fa-envelope"></span><b>kurumbangjaner@gmail.com</b></p>
                        </address>
                        <h3><b>Social Media</b></h3>
                        <div class="social-share">
                            <ul>
                                <li><a href="https://www.facebook.com/p/Non-Stop-Health-Care-100066564529435/"><span class="fa fa-facebook"></span></a></li>
                                <li><a href="https://twitter.com/"><span class="fa fa-twitter"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Contact Form -->
                <div class="col-lg-7 col-md-7 col-sm-6">
                    <div class="section-heading">
                        <h1><b> Map of Clinic</b> </h1>
                        <div class="line"></div>
                    </div>
                    <div id="googleMap">
                        <img alt="" src="images/map.png" width="130%" height="450" style="border:0">
                    </div>
                </div>
                <!-- End Contact Form -->
            </div>
        </div>
    </section>

    <!--=========== Start Footer SECTION ================-->
    <?php include('src/footer.php') ?>
    <!--=========== End Footer SECTION ================-->

    <?php include('src/incfooter.php') ?>
</body>

</html>
