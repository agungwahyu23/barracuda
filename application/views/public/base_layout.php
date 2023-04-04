<!doctype html>
<html lang="en">

<style>
    .logos {
    	width: 180px;
    	height: 80px;
        border-radius: 100px;
    	background-color: #FFBB13ff;
    	overflow: hidden;
    }

    .logos video {
    	/* position: absolute;
    	top: 0;
    	left: 0; */
        object-fit: revert;
    	width: 185px;
    	height: 100%;
    	transform: scale(1.2);
    }

    .apps-img {
        width: 400px;
    	height: 450px;
        border-radius: 100px;
    	background-color: #FFBB13ff;
    	overflow: hidden;
    }

    .apps-img video {
    	object-fit: revert;
        width: 90%;
        height: 100%;
        transform: scale(1.2);
        padding-left: 35px;
    }
</style>
  
<!-- head -->
<?php include('partials/head.php') ?>

  <body>
    <!--header area start-->
    <div class="header-area wow fadeInDown header-absolate" id="nav" data-0="position:fixed;" data-top-top="position:fixed;top:0;" data-edge-strategy="set">
        <div class="container">
            <div class="row">
                <div class="col-4 d-block d-lg-none">
                    <div class="mobile-menu"></div>
                </div>
                <div class="col-4 col-lg-2">
                    <div class="logo-area">
                        <a href="#">
                        	<div class="logos">
                            <video src="<?= base_url() ?>assets/public/assets/img/logo.mp4" type="video/mp4" autoplay muted loop></video>
                        	</div>
                        </a>
                    </div>
                </div>
                <div class="col-4 col-lg-8 d-none d-lg-block">
                    <div class="main-menu text-center">
                        <nav>
                            <ul id="slick-nav">
                                <li><a class="scroll" href="#home">Home</a></li>
                                <li><a class="scroll" href="#Services">Services</a></li>
                                <li><a class="scroll" href="#about">About Us</a></li>
                                <li><a class="scroll" href="#contact">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-4 col-lg-2 text-right">
                    <a href="#" class="logibtn gradient-btn">login</a>
                </div>
                
            </div>
        </div>
    </div>
    <!--header area end-->

    <?php include('banner.php') ?>

    <!--store area start-->
    <div class="about-area wow fadeInUp" id="about">
        <div class="space-30"></div>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="heading">
                        <h5>Store</h5>
                        <p>Kami Mendistribusikan Musik Anda ke Store-Store Di Bawah ini</p>
                    </div>
                    <div class="space-30"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="logo-carousel owl-carousel text-center">
                        <div class="single-logo-wrapper">
                            <div class="single-item">
                                <i class="fa fa-spotify" aria-hidden="true" style="font-size:34px"></i><span style="font-size:32px; font-weight:700; padding-left:10px">Spotify</span>
                            </div>
                        </div>
                        <div class="single-logo-wrapper">
                            <div class="single-item">
                                <img src="<?= base_url() ?>assets/public/assets/img/logo1.png" alt="" height="50">
                            </div>
                        </div>
                        <div class="single-logo-wrapper">
                            <div class="single-item">
                                <img src="<?= base_url() ?>assets/public/assets/img/logo2.png" alt="" height="50">
                            </div>
                        </div>
                        <div class="single-logo-wrapper">
                            <div class="single-item">
                                <img src="<?= base_url() ?>assets/public/assets/img/logo3.png" alt="" height="50">
                            </div>
                        </div>
                        <div class="single-logo-wrapper">
                            <div class="single-item">
                                <img src="<?= base_url() ?>assets/public/assets/img/logo4.png" alt="" height="50">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="space-90"></div>
    </div>
    <!--store area end-->

    <?php include('services.php') ?>

    <?php include('strength.php') ?>
    
    <!--about-bg start-->
    <?php include('about.php') ?>
    <!--about-bg end-->

    <!--roadmap area start-->
    <?php include('roadmap.php') ?>
    <!--roadmap area end-->

    <!--team-bg-->
    <?php include('testimoni.php') ?>
    <!--team bg area end-->

    <!--artikel area start-->
    <?php include('artikel.php') ?>
    <!--artikel area end-->

    <div class="distibution-bg">
    	<!---distibution area start-->
    	<div class="distibution wow fadeInUp mt-5" id="contact">
    		<div class="container">
    			<div class="single-blog-contact">
    				<div class="row">
    					<div class="col-12 text-center">
    						<div class="heading">
    							<div class="space-10"></div>
    							<h1>Contact Us </h1>
    						</div>
    						<div class="space-60"></div>
    					</div>
    				</div>
                    <div class="row">
                        <div class="col">
                            <form action="#">
                                <input type="text" placeholder="your name">
                                <input type="email" placeholder="email">
                                <div class="space-30"></div>
                                <textarea name="" id="" cols="30" rows="10" placeholder="say something"></textarea>
                            </form>
                            <div class="space-30"></div>
                            <a href="#" class="gradient-btn">Submit</a>
                        </div>
                    </div>
    			</div>

    		</div>
    		<div class="space-90"></div>
    	</div>
    	<!---distibution area end-->
    </div>

    <!--footer area start-->
    <div class="footera-area section-padding wow fadeInDown">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-footer">
                        <div class="logo-area footer">
                            <a href="#"><img src="<?= base_url() ?>assets/public/assets/img/logo-removebg-preview.png" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-2">
                    <div class="single-footer">
                        <ul>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-6 col-lg-2">
                    <div class="single-footer">
                        <ul>
                            <li><a href="#">White Services</a></li>
                            <li><a href="#">Team</a></li>
                            <li><a href="#">APP</a></li>
                            <li><a href="#">FAQ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-footer">
                        <div class="footer-form">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.2175469782387!2d112.73005171414916!3d-7.329446574117059!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb423c9f28ff%3A0x30b02913187c105a!2sJl.%20Jemur%20Ngawinan%20I%20No.53%2C%20Jemur%20Wonosari%2C%20Kec.%20Wonocolo%2C%20Kota%20SBY%2C%20Jawa%20Timur%2060237!5e0!3m2!1sid!2sid!4v1680618282973!5m2!1sid!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--footer area end-->

    <!-- javascript -->
    <?php include('partials/js.php') ?>
  </body>
</html>