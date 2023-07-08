<!doctype html>
<html lang="en">

<style>
	/* @media only screen and (min-width: 991px) { */
		.logos {
			width: 190px;
			height: 90px;
			border-radius: 100px;
			background-color: #FFBB13ff;
			overflow: hidden;
		}

		.logos video {
			/* position: absolute;
    	top: 0;
    	left: 0; */
			object-fit: revert;
			width: 190px;
			height: 100%;
			transform: scale(1.2);
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
  
<!-- head -->
<?php include('partials/head.php') ?>

  <body>
	<!-- welcome screen -->
	<div id="welcome-screen">
		<style>
			#welcome-screen {
			position: fixed;
			overflow: hidden;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			z-index: 99999;
			background: #fff;
			}

			#welcome-screen-background {
			position: absolute;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			background: #062489;
			}

			#welcome-screen-foreground {
			position: absolute;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			display: flex;
			align-items: center;
			justify-content: center;
			}

			#nav {
			position: absolute;
			width: 100%;
			height: 100%;
			display: flex;
			}

			#welcome-screen-logo {
			position: relative;
			overflow: hidden;
			width: 550px;
			height: 550px;
			flex: 0 0 auto;
			display: flex;
			align-items: center;
			justify-content: center;
			}

			#welcome-screen-logo-image {
			max-width: 100%;
			max-height: 100%;
			}

			#welcome-screen-logo-cover {
			position: absolute;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			background: #062489;
			opacity: 0;
			}

			#welcome-screen.welcome-screen-state-bg-intro>#welcome-screen-foreground {
			display: none;
			}
			
			#welcome-screen.welcome-screen-state-bg-intro>#nav {
			display: none;
			}

			#welcome-screen.welcome-screen-state-outro {
			background: none;
			}

			.welcome-screen-state-logo-intro #welcome-screen-logo {
			animation: welcome-screen-logo-intro-logo 2000ms both ease-in-out;
			}

			@keyframes welcome-screen-logo-intro-logo {
			0% {
				opacity: 0;
				filter: blur(5px);
			}

			100% {
				opacity: 1;
				filter: blur(0px);
			}
			}

			.welcome-screen-state-outro #welcome-screen-logo {
			animation: welcome-screen-outro-logo 300ms 0ms both ease;
			}

			@keyframes welcome-screen-outro-logo {
			0% {
				opacity: 1
			}

			100% {
				opacity: 0
			}
			}

			.welcome-screen-state-bg-intro #welcome-screen-background {
			animation: welcome-screen-bg-intro-background 900ms both cubic-bezier(0.645, 0.045, 0.355, 1);
			}

			@keyframes welcome-screen-bg-intro-background {
			0% {
				transform: scaleX(0);
			}

			100% {
				transform: scaleX(1);
			}
			}

			.welcome-screen-state-outro #welcome-screen-background {
			animation: welcome-screen-outro-background 900ms reverse both cubic-bezier(0.645, 0.045, 0.355, 1);
			}

			@keyframes welcome-screen-outro-background {
			0% {
				transform: scaleX(0);
			}

			100% {
				transform: scaleX(1);
			}
			}

			.welcome-screen-state-loop #welcome-screen-logo-cover {
			animation: welcome-screen-loop-logo-cover 2200ms infinite ease-in-out;
			opacity: 0.85;
			}

			@keyframes welcome-screen-loop-logo-cover {
			0% {
				transform: translateX(-120px)
			}

			50% {
				transform: translateX(120px)
			}

			100% {
				transform: translateX(120px)
			}
			}

		</style>
            <div id="welcome-screen-background"></div>
			<div id="welcome-screen-foreground">
                <div id="welcome-screen-logo">
					<img id="welcome-screen-logo-image" src="<?= base_url() ?>assets/public/assets/img/logo-removebg-preview.png" alt="">
                    <div id="welcome-screen-logo-cover"></div>
                </div>
            </div>
			<script> 
				(function create_js_createController() {
					let closeRequested = false;
					window.requestCloseWelcomeScreen = () => {
						closeRequested = true;
					};
					const phaseStatic = 'static';
					const phaseBackgroundIntro = 'bg-intro';
					const phaseLogoIntro = 'logo-intro';
					const phaseLoop = 'loop';
					const phaseOutro = 'outro';
					const rootNode = document.getElementById('welcome-screen');
					const backgroundNode = document.getElementById('welcome-screen-background');
					const logoNode = document.getElementById('welcome-screen-logo');
					rootNode.addEventListener('touchstart', (event) => event.preventDefault());

					function sleep(ms) {
						return new Promise((done) => setTimeout(done, ms));
					}

					function onAnimationEnd(node) {
						return new Promise((done) => node.addEventListener('animationend', done, {
							once: true
						}));
					}

					function onAnimationIteration(node, breakCondition) {
						return new Promise((done) => {
							const listener = () => {
								if (breakCondition()) {
									node.removeEventListener('animationiteration', listener);
									done();
								}
							};
							node.addEventListener('animationiteration', listener);
						});
					}

					function setPhase(stateName) {
						rootNode.className = `welcome-screen-state-${stateName}`;
					}

					function playStatic() {
						setPhase(phaseStatic);
					}

					function playBackgroundIntro() {
						setPhase(phaseBackgroundIntro);
						return onAnimationEnd(backgroundNode);
					}

					function playLogoIntro() {
						setPhase(phaseLogoIntro);
						return onAnimationEnd(logoNode);
					}

					function playIntro() {
						return playBackgroundIntro().then(playLogoIntro);
					}

					function playOutro() {
						setPhase(phaseOutro);
						return onAnimationEnd(backgroundNode);
					}

					function playLoopUntilCloseRequested() {
						setPhase(phaseLoop);
						return onAnimationIteration(logoNode, () => closeRequested);
					}

					function playIntroAndOutro() {
						return playIntro()
							.then(() => sleep(500))
							.then(() => playOutro())
							.then(() => sleep(1000))
							.then(() => playStatic());
					}

					function play() {
						return playIntro()
							.then(() => sleep(500))
							.then(() => (closeRequested ? null : playLoopUntilCloseRequested()))
							.then(() => playOutro())
							.then(() => rootNode.remove());
					}
					return {
						play,
						playStatic,
						playLogoIntro,
						playIntro,
						playIntroAndOutro,
					};
			})().play(); 
			</script>
	</div>
	<!-- end welcome screen -->
    
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
                                <li><a class="scroll" href="#home">Home</a></li>
                                <li><a class="scroll" href="#Services">Services</a></li>
                                <li><a class="scroll" href="#about">About Us</a></li>
                                <li><a class="scroll" href="#contact">Contact</a></li>
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

    <?php include('banner.php') ?>

    <!--store area start-->
    <div class="about-area wow fadeInUp" id="about">
        <div class="space-30"></div>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="heading">
                        <h5>Store</h5>
                        <p>We Distribute Your Music to the Stores Below</p>
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
                                <img src="<?= base_url() ?>assets/public/assets/img/logo1.png" alt="Agregator Musik Tomokoyuki" height="50">
                            </div>
                        </div>
                        <div class="single-logo-wrapper">
                            <div class="single-item">
                                <img src="<?= base_url() ?>assets/public/assets/img/logo2.png" alt="agregator musik di indonesia tomokoyuki" height="50">
                            </div>
                        </div>
                        <div class="single-logo-wrapper">
                            <div class="single-item">
                                <img src="<?= base_url() ?>assets/public/assets/img/logo3.png" alt="Agregator Musik tomokoyuki" height="50">
                            </div>
                        </div>
                        <div class="single-logo-wrapper">
                            <div class="single-item">
                                <img src="<?= base_url() ?>assets/public/assets/img/logo4.png" alt="Agregator Musik tomokoyuki" height="50">
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
    <!-- <?php include('roadmap.php') ?> -->
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
                            <img src="<?= base_url() ?>assets/public/assets/img/logo-removebg-preview.png" alt="agregator musik indonesia">
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-lg-2 mt-4">
                    <div class="single-footer">
                        <ul>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-lg-2 mt-3">
                    <div class="single-footer">
                        <ul>
                            <li><a href="#">White Services</a></li>
                            <li><a href="#">Team</a></li>
                            <li><a href="#">APP</a></li>
                            <li><a href="#">FAQ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col mt-4">
                    <div class="single-footer">
                        <div class="footer-form">
                        <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.2175469782387!2d112.73005171414916!3d-7.329446574117059!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb423c9f28ff%3A0x30b02913187c105a!2sJl.%20Jemur%20Ngawinan%20I%20No.53%2C%20Jemur%20Wonosari%2C%20Kec.%20Wonocolo%2C%20Kota%20SBY%2C%20Jawa%20Timur%2060237!5e0!3m2!1sid!2sid!4v1680618282973!5m2!1sid!2sid" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
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
