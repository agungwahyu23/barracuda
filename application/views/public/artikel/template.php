
<!doctype html>
<html lang="en">

<!-- include css -->
<style>
	.single-blog-area
	{
		background: white;
		color: black;
	}
	.single-blog-area h1{
		color: black;
	}

	/* @media only screen and (min-width: 991px) { */
		.logos {
			width: 190px;
			height: 90px;
			border-radius: 100px;
			background-color: #FFBB13ff;
			overflow: hidden;
		}

		.logo-area{
			margin-top: -15px;
    		margin-bottom: 15px;
		}

		.logos video {
			/* position: absolute;
    	top: 0;
    	left: 0; */
			object-fit: revert;
			width: 190px;
			height: 100%;
			/* transform: scale(1.2); */
		}
	/* } */

	@media (max-width: 991px) {
		.goog-te-combo {
			display: none;
		}
		.goog-te-combo option {
			display: none;
		}
		.goog-te-gadget {
			display: none;
		}

		.logos {
			width: 155px;
			height: 60px;
		}

		.logos video{
			width: 90px;
		}
	}
    

    .apps-img {
        /* width: 400px; */
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

	#text{
		color: white;
		font-size: 40px;
		text-align: left;
		font-family: "Montserrat";
		font-weight: 700;
	}
</style>

  <!-- Head tag -->
  <?php include('head.php') ?>
  <!-- End Head tag -->

  <body>
    <!--header area start-->
    <div class="header-area wow fadeInDown header-absolate" id="nav" data-0="position:fixed;" data-top-top="position:fixed;top:0;" data-edge-strategy="set">
        <div class="container">
            <div class="row">
                <div class="col-4 d-block d-lg-none">
                    <div class="mobile-menu"></div>
                </div>
                <div class="col-6 col-lg-2">
                    <div class="logo-area">
                        <a href="#">
                        	<div class="logos">
                            <video src="<?= base_url() ?>assets/public/assets/img/logo.mp4" type="video/mp4" autoplay muted loop></video>
                        	</div>
                        </a>
                    </div>
                </div>
                <div class="col-1 col-lg-6 d-none d-lg-block">
                    <div class="main-menu text-center">
                        <nav>
                            <ul id="slick-nav">
                                <li><a class="scroll" href="<?= base_url() ?>">Home</a></li>
                                <li><a class="scroll" href="<?= base_url() ?>">Services</a></li>
                                <li><a class="scroll" href="<?= base_url() ?>">About Us</a></li>
                                <li><a class="scroll" href="<?= base_url() ?>">Contact</a></li>
                                <!-- <li><a class="scroll" href="<?= site_url('login') ?>">Login</a></li> -->
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- <div class="col-2 col-lg-2 text-right">
                    <a href="<?= site_url('login') ?>" class="logibtn gradient-btn">login</a>
                </div> -->
                <div class="col-4 col-lg-2 text-right">
					<div id="google_translate_element"></div>
                </div>
                
            </div>
        </div>
    </div>
    <!--header area end-->

    <!--welcome area start-->
    <div class="welcome-area bv wow fadeInUp" style="background: url('../upload/artikel/<?= $content->thumbnail ?>');!important" id="home">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="welcome-header">
                        <h1 class="text-white"><?= $content->title ?></h1>
                        <div class="space-10"></div>
                        <a href="<?= base_url() ?>">home</a> <i class="fa fa-angle-right"></i> <a href="<?= site_url('news') ?>">artikel</a> <i class="fa fa-angle-right"></i><?= $content->title ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--welcome area end-->

    <!--single blog area start-->
        <div class="single-blog-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-9 offset-1">
                        <h1><?= $content->title ?></h1>
                        <div class="space-10"></div>
                        <small>by <?= $content->created_by ?> <span><i class="fa fa-clock-o"></i> <?= date_indo(date('Y-m-d', strtotime($content->created_at))) ?></span></small>
                        <div class="space-20"></div>

                        <?= $content->content; ?>
                    </div>
                </div>
                <!-- <div class="row section-padding">
                    <div class="col-12 col-lg-9 offset-1">
                        <div class="single-blog-social">
                            <ul>
                                <li><a href="#">Stronger</a></li>
                                <li><a href="#">Techno</a></li>
                                <li><a href="#">blog</a></li>
                                <li><a href="#">girls</a></li>
                                <li><a href="#" class="blog-234">234 Shares</a></li>
                                <li><a href="#" class="facebook-b"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" class="camera-b"><i class="fa fa-camera"></i></a></li>
                                <li><a href="#" class="twitter-b"><i class="fa fa-twitter"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="row">
                    <div class="col-12 col-lg-9 offset-1">
                        <div class="blog-comment">
                            <h4>3 comments</h4>
                            <div class="space-30"></div>
                            <div class="single-comment">
                                <div class="comment-img">
                                    <img src="assets/img/carousel-2.jpg" alt="">
                                    <div class="space-10"></div>
                                    <p>Lary Kingston</p>
                                </div>
                                <div class="comment-text-form">
                                    <small>26 jun 2018</small>
                                    <div class="space-10"></div>
                                    <p>Swimming hundreds of feet beneath the ocean’s surface in many parts of the world are prolific architect
                                    larvaceans. These zooplankton are not particularly giant themselves (they resemble tadpoles and are 
                                    of a pinkie finger), but every day, they construct one or more spacious houses.</p>
                                    <div class="space-10"></div>
                                    <form action="#">
                                        <input type="text">
                                        <a href="#" class="gradient-btn">submit</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="space-50"></div>
                        <div class="blog-comment">
                            <div class="single-comment">
                                <div class="comment-img">
                                    <img src="assets/img/carousel-2.jpg" alt="">
                                    <div class="space-10"></div>
                                    <p>Lary Kingston</p>
                                </div>
                                <div class="comment-text-form">
                                    <small>26 jun 2018</small>
                                    <div class="space-10"></div>
                                    <p>Swimming hundreds of feet beneath the ocean’s surface in many parts of the world are prolific architect
                                    larvaceans. These zooplankton are not particularly giant themselves (they resemble tadpoles and are 
                                    of a pinkie finger), but every day, they construct one or more spacious houses.</p>
                                    <div class="space-10"></div>
                                    <form action="#">
                                        <input type="text">
                                        <a href="#" class="gradient-btn">submit</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="space-50"></div>
                        <div class="blog-comment">
                            <div class="single-comment">
                                <div class="comment-img">
                                    <img src="assets/img/carousel-2.jpg" alt="">
                                    <div class="space-10"></div>
                                    <p>Lary Kingston</p>
                                </div>
                                <div class="comment-text-form">
                                    <small>26 jun 2018</small>
                                    <div class="space-10"></div>
                                    <p>Swimming hundreds of feet beneath the ocean’s surface in many parts of the world are prolific architect
                                    larvaceans. These zooplankton are not particularly giant themselves (they resemble tadpoles and are 
                                    of a pinkie finger), but every day, they construct one or more spacious houses.</p>
                                    <div class="space-10"></div>
                                    <form action="#">
                                        <input type="text">
                                        <a href="#" class="gradient-btn">submit</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
        <!--single blog area end-->

    <!--footer area start-->
    <?php include('footer.php') ?>
    <!--footer area end-->

    <?php include('js.php') ?>
  </body>
</html>
