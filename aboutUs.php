<!DOCTYPE html>
<html lang="en">

<head>
    <title>Non-Stop healthcare : About Us</title>
    <?php include('src/head.php') ?>
    <style>
        .about-us-box {
            background-color: #e6f7e6; /* Subtle green color */
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .about-us-box h1 {
            font-size: 2em; /* Increase the font size of the heading */
        }

        .about-us-box p {
            font-size: 1.2em; /* Increase the font size of the paragraph */
        }
    </style>
</head>

<body>

    <?php include('src/preload.php') ?>
    <!--=========== BEGIN HEADER SECTION ================-->
    <?php include('src/header.php') ?>
    <!--=========== END HEADER SECTION ================-->

    <!--=========== BEGAIN Doctors SECTION ================-->
    <?php include('src/meet_our_doc.php') ?>
    <!--=========== End Doctors SECTION ================-->

    <div class="about-us-box">
        <h1><b>More About Us</b></h1>
      
        <p><b>Non-Stop Health Clinic, nestled in the heart of Sankhamul, Kathmandu, stands as a beacon of wellness and care for the community. Renowned for its comprehensive range of health tests and services, the clinic offers a haven for individuals seeking proactive healthcare solutions. With a dedicated team of proficient doctors and health assistants, Non-Stop Health Clinic ensures personalized attention and expert guidance throughout every step of the patient journey. Whether it's routine check-ups or specialized diagnostics, patients can trust in the clinic's commitment to excellence and professionalism. Here, wellness isn't just a destination; it's a journey guided by compassionate expertise and unwavering support.</b></p>
    </div>

    <section id="contact-page" style="margin-top: 50px;">
        <div class="container">
            <div class="row contact-wrap">
                <div class="col-lg-5 col-md-5 col-sm-6">
                    <div class="contact-address">
                        <div class="section-heading">
                            <h1><b>Contact Information</b></h1>
                            <div class="line"></div>
                        </div>
                        <h3><p><b>In case of any queries feel free to contact on the details provided below.</b></p></h3>
                        <address class="contact-info">
                            <p><span class="fa fa-home"></span><b>Non-stop Healthcare Pvt.Ltd
                                    Sankhamul, Kathmandu, Nepal</b></p>
                            <p><span class="fa fa-phone"></span><b>01-4797145,9861208878</b></p>
                            <p><span class="fa fa-envelope"></span><b>kurumbangjaner@gmail.com</b></p>
                        </address>
                        <h3>Social Media</h3>
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

    <!--=========== BEGAIN Counter SECTION ================-->
    <?php include('src/counter.php') ?>
    <!--=========== End Counter SECTION ================-->

    <!--=========== Start Footer SECTION ================-->
    <?php include('src/footer.php') ?>
    <!--=========== End Footer SECTION ================-->

    <?php include('src/incfooter.php') ?>
</body>

</html>
