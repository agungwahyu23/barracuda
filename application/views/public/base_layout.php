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
                            <!-- <img src="<?= base_url() ?>assets/public/assets/img/logo-top.png" alt=""> -->
                            <!-- <video src="<?= base_url() ?>assets/public/assets/img/logo.mp4" type="video/mp4" autoplay muted loop width="210" height="60" style="border-radius:90px;"></video> -->
                        </a>
                    </div>
                </div>
                <div class="col-4 col-lg-8 d-none d-lg-block">
                    <div class="main-menu text-center">
                        <nav>
                            <ul id="slick-nav">
                                <li><a class="scroll" href="#home">Home</a></li>
                                <li><a class="scroll" href="#about">About Us</a></li>
                                <li><a class="scroll" href="#Paper">Services</a></li>
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

    <!--welcome area start-->
    <div class="welcome-area wow fadeInUp" id="home">
        <div id="particles-js"></div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 align-self-center">
                    <div class="welcome-right">
                        <div class="welcome-text">
                             <h1>Publish Musik Anda ke Seluruh Dunia </h1>
                            <h4>Rilis musik & lagu ke Spotify, Apple Music, Deezer, Amazon Music dan Digital Music Platform Worldwide Lainnya</h4>
                        </div>
                        <div class="welcome-btn">
                            <a href="#" class="gradient-btn v2 mr-20">Daftar Sekarang</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="welcome-img">
                        <img src="<?= base_url() ?>assets/public/assets/img/music1.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--welcome area end-->

    <!--about area start-->
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
            <div class="space-90"></div>
            <div class="row">
                <div class="col-12 text-center">
                    <div class="heading">
                        <h1>Our Services</h1>
                        <p>Layanan Yang Di Sediakan oleh Tomoko Yuki</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <a href="#" class="single-about">
                        <div class="single-about-img">
                            <img src="<?= base_url() ?>assets/public/assets/img/about-icon-1.png" alt="">
                        </div>
                        <div class="single-about-text">
                            <h4>Distribusi</h4>
                            <p>Sebagai Aggregator kami mendistribusikan karya lagu kalian ke seluruh toko musik digital seluruh dunia seperti iTunes, Spotify, Joox, Deezer, dll</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="#" class="single-about">
                        <div class="single-about-img">
                            <img src="<?= base_url() ?>assets/public/assets/img/about-icon-2.png" alt="">
                        </div>
                        <div class="single-about-text">
                            <h4>Publishing</h4>
                            <p>Kami mengumpulkan royalti dari artis yang meng-cover lagu kalian, youtube, facebook, tv, radio, hotel, cafe, restoran bahkan dari film atau iklan yang memakai lagu kalian</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="#" class="single-about">
                        <div class="single-about-img">
                            <img src="<?= base_url() ?>assets/public/assets/img/about-icon-3.png" alt="">
                        </div>
                        <div class="single-about-text">
                            <h4>Mixing Mastering Online</h4>
                            <p>Bagi yang ingin memiliki kualitas audio yang standart international, kami memiliki servis untuk produksi Mixing Mastering secara online. Kalian bisa nurut menyaksikan proses Mixing Mastering secara online via Zoom/Google Meet.</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row pt-4">
                <div class="col-lg-4">
                    <a href="#" class="single-about">
                        <div class="single-about-img">
                            <img src="<?= base_url() ?>assets/public/assets/img/about-icon-1.png" alt="">
                        </div>
                        <div class="single-about-text">
                            <h4>Copyrights Service</h4>
                            <p>Kami Memonetisasi lagu kalian yang beredar diseluruh content di YOUTUBE, INSTAGRAM, FACEBOOK, dan TIKTOK. Kalian juga bisa mengecualikan claim hak cipta di channel sendiri</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="#" class="single-about">
                        <div class="single-about-img">
                            <img src="<?= base_url() ?>assets/public/assets/img/about-icon-2.png" alt="">
                        </div>
                        <div class="single-about-text">
                            <h4>Promosi</h4>
                            <p>Bagi yang ingin memiliki kualitas audio yang standart international, kami memiliki servis untuk produksi Mixing Mastering secara online. Kalian bisa nurut menyaksikan proses Mixing Mastering secara online via Zoom/Google Meet.</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="#" class="single-about">
                        <div class="single-about-img">
                            <img src="<?= base_url() ?>assets/public/assets/img/about-icon-3.png" alt="">
                        </div>
                        <div class="single-about-text">
                            <h4>Production Tools</h4>
                            <p>Kami mempunyai tim yang akan membantu kalian dalam : Membuat Video Klip/Video Lirik, Cetak CD, Merchandise, Press Release, Manage Content Social Media, pembuatan website, dan album digital (Android & IoS)</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="space-90"></div>
    </div>
    <!--about area end-->

    <!--single about area start-->
    <div class="single-about-area wow fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <a href="#" class="single-about">
                        <div class="single-about-img">
                            <img src="<?= base_url() ?>assets/public/assets/img/about-icon-1.png" alt="">
                        </div>
                        <div class="single-about-text">
                            <h4>Exciting Opportunity</h4>
                            <p>The recording starts with the patter of a summer squall. Later, a drifting tone like that of a not quite tuned in radio station rises and for a while drowns</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="#" class="single-about">
                        <div class="single-about-img">
                            <img src="<?= base_url() ?>assets/public/assets/img/about-icon-2.png" alt="">
                        </div>
                        <div class="single-about-text">
                            <h4>Vetted ICO Marketplace</h4>
                            <p>The recording starts with the patter of a summer squall. Later, a drifting tone like that of a not quite tuned in radio station rises and for a while drowns</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="#" class="single-about">
                        <div class="single-about-img">
                            <img src="<?= base_url() ?>assets/public/assets/img/about-icon-3.png" alt="">
                        </div>
                        <div class="single-about-text">
                            <h4>Diverse Profit Ways</h4>
                            <p>The recording starts with the patter of a summer squall. Later, a drifting tone like that of a not quite tuned in radio station rises and for a while drowns</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="space-90"></div>
    </div>
    <!--single about area end-->

    <!--ico area start-->
    <div class="section-padding wow fadeInUp ico-area">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="ico-heading">
                        <h1><a href= "#">ICO</a> Live Now</h1>
                    </div>
                </div>
            </div>
            <div class="space-60"></div>
            <div class="row">
                <div class="col-6 col-lg-3">
                    <div class="single-ico">
                        <h5>Token Sold: 126,419,796</h5>
                        <h5>1 ETH = 235 ICoin</h5>
                        <a href="#">10 % Bonus</a>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="single-ico">
                        <h5><a href="#">ETH</a>collected 90252</h5>
                        <h5><a href="#">BTC</a> collected 90152</h5>
                        <h5><a href="#">LTH</a>collected 5052</h5>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="single-ico">
                        <h5>Sale Ends in :</h5>
                       <div class="row">
                           <div class="col">
                               <span id="days"></span>
                               <h5>days</h5>
                           </div>
                           <div class="col">
                               <span id="hours"></span>
                               <h5>hours</h5>
                           </div>
                           <div class="col">
                               <span id="minutes"></span>
                                <h5>minutes</h5>
                           </div>
                           <div class="col">
                               <span id="seconds"></span>
                               <h5>seconds</h5>
                           </div>
                       </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="custom-progressBar">
                        <div class="progress">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80"
                            aria-valuemin="0" aria-valuemax="100" style="width:80%">
                                <div class="progress-details">
                                    <p>$ 38 M</p>
                                    <div class="progress-d-top"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="single-cup">
                                <p>Soft Cap</p>
                            </div>
                        </div>
                        <div class="col-6 text-right">
                            <div class="single-cup right">
                                <p>max Cap</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <a href="#" class="gradient-btn v2">Buy Tokens</a>
                </div>
            </div>
        </div>
    </div>
    <!--ico area end-->

    <!--Documentation area start-->
    <div class="section-padding documentation-area wow fadeInUp" id="Paper">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="heading">
                        <h5>Whitepaper</h5>
                        <div class="space-10"></div>
                        <h1>Download Documentation</h1>
                    </div>
                    <div class="space-60"></div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-6 col-lg">
                    <div class="single-document">
                        <div class="document-flag">
                            <img src="<?= base_url() ?>assets/public/assets/img/flag-1.png" alt="">
                        </div>
                        <button class="single-document-text">
                            <span>English</span>
                        </button>
                    </div>
                </div>
                <div class="col-6 col-lg">
                    <div class="single-document">
                        <div class="document-flag">
                            <img src="<?= base_url() ?>assets/public/assets/img/flag-2.png" alt="">
                        </div>
                        <button class="single-document-text">
                            <span>Spanish</span>
                        </button>
                    </div>
                </div>
                <div class="col-6 col-lg">
                    <div class="single-document">
                        <div class="document-flag">
                            <img src="<?= base_url() ?>assets/public/assets/img/flag-3.png" alt="">
                        </div>
                        <button class="single-document-text">
                            <span>Russian</span>
                        </button>
                    </div>
                </div>
                <div class="col-6 col-lg">
                    <div class="single-document">
                        <div class="document-flag">
                            <img src="<?= base_url() ?>assets/public/assets/img/flag-4.png" alt="">
                        </div>
                        <button class="single-document-text">
                            <span>Arabic</span>
                        </button>
                    </div>
                </div>
                <div class="col-6 col-lg">
                    <div class="single-document">
                        <div class="document-flag">
                            <img src="<?= base_url() ?>assets/public/assets/img/flag-5.png" alt="">
                        </div>
                        <button class="single-document-text">
                            <span>Portuguese</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Documentation area end-->
    
    <!--distibution-bg start-->
    <div class="distibution-bg">
        <!---distibution area start-->
        <div class="distibution wow fadeInUp" id="token">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                    <div class="heading">
                        <h5>Token Distribution</h5>
                        <div class="space-10"></div>
                        <h1>initial distibution</h1>
                    </div>
                    <div class="space-60"></div>
                </div>
                </div>
                <div class="row">
                    
                    <div class="col-6 text-right">
                        <div class="distibution-svg distibution-svg-1">
                            <img src="<?= base_url() ?>assets/public/assets/img/token-top.png" alt="">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="distibution-d item-1">
                            <ul>
                                <li class="distibution-list-1"><span>15% </span>Build Up Team</li>
                                <li class="distibution-list-2"><span>50% </span>ICO Investors</li>
                                <li class="distibution-list-3"><span>25% </span>Branding & Marketing</li>
                                <li class="distibution-list-4"><span>10% </span>Bounty </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="space-90"></div>
                <div class="row">
                    <div class="col-12 text-center">
                    <div class="heading">
                        <h5>Sale breakdown</h5>
                        <div class="space-10"></div>
                        <h1>Token Sales Contribution</h1>
                    </div>
                    <div class="space-90"></div>
                </div>
                </div>
                <div class="row">
                    <div class="col-2 text-right">
                        <div class="distibution-d distibution-d-2">
                            <ul>
                                <li class="distibution-list-5"><span>40% </span>HR & Development</li>
                                <li class="distibution-list-6"><span>30% </span>Branding & Markting</li>
                                <li class="distibution-list-7"><span>20% </span>Posiblle Buyout</li>
                                <li class="distibution-list-8"><span>10% </span>Legal Advisory </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-10">
                        <div class="distibution-svg distibution-svg-2">
                            <img src="<?= base_url() ?>assets/public/assets/img/token-bottom.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="space-90"></div>
        </div>
        <!---distibution area end-->
    </div>
    <!--distibution-bg end-->

    <!--roadmap area start-->
    <div class="roadmap-area section-padding wow fadeInUp" id="roadmap">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="heading">
                        <h5>history Timeline</h5>
                        <div class="space-10"></div>
                        <h1>Development Roadmap</h1>
                    </div>
                    <div class="space-60 d-none d-sm-block"></div>
                </div>
            </div>
            
        </div>
        <div class="container">
            <div class="roadmap-carousel owl-carousel">
                <div class="roadmap-item">
                    <div class="single-roadmap text-center road-left">
                        <div class="single-roadmap-img">
                            <img src="<?= base_url() ?>assets/public/assets/img/roadmap-1.png" alt="">
                        </div>
                        <div class="space-30"></div>
                        <div class="roadmap-text">
                            <p>01.03.2017</p>
                            <div class="space-10"></div>
                            <h5>Concept and whitepaper</h5>
                            <p>The recording starts with the patter of a summer squall. Later, a drifting tone like that of a in token.</p>
                        </div>
                    </div>
                </div>
                <div class="roadmap-item align-self-center">
                    <div class="single-roadmap road-right">
                        <div class="row">
                            <div class="col-5 align-self-center">
                                <div class="single-roadmap-img">
                                    <img src="<?= base_url() ?>assets/public/assets/img/roadmap-2.png" alt="">
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="roadmap-text">
                                    <p>21.06 .2017</p>
                                    <h5>Recruitment of Our team</h5>
                                    <p>The recording starts with the patter of a summer squall. Later, a drifting tone like that of a in token.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="roadmap-item">
                    <div class="single-roadmap text-center road-left">
                        <div class="single-roadmap-img">
                            <img src="<?= base_url() ?>assets/public/assets/img/roadmap-4.png" alt="">
                        </div>
                        <div class="space-30"></div>
                        <div class="roadmap-text">
                            <p>31.08.2017</p>
                            <div class="space-10"></div>
                            <h5>Core Development</h5>
                            <p>The recording starts with the patter of a summer squall. Later, a drifting tone like that of a in token.</p>
                        </div>
                    </div>
                </div>
                <div class="roadmap-item align-self-center">
                    <div class="single-roadmap road-right">
                        <div class="row">
                            <div class="col-5 align-self-center">
                                <div class="single-roadmap-img">
                                    <img src="<?= base_url() ?>assets/public/assets/img/roadmap-5.png" alt="">
                                </div>
                        
                            </div>
                            <div class="col-7">
                                <div class="roadmap-text">
                                    <p>31.11.2017</p>
                                    <h5>Main Development</h5>
                                    <p>The recording starts with the patter of a summer squall. Later, a drifting tone like that of a in token.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="roadmap-item">
                    <div class="single-roadmap text-center road-left">
                        <div class="single-roadmap-img">
                            <img src="<?= base_url() ?>assets/public/assets/img/roadmap-4.png" alt="">
                        </div>
                        <div class="space-30"></div>
                        <div class="roadmap-text">
                            <p>31.08.2017</p>
                            <div class="space-10"></div>
                            <h5>Core Development</h5>
                            <p>The recording starts with the patter of a summer squall. Later, a drifting tone like that of a in token.</p>
                        </div>
                    </div>
                </div>
                <div class="roadmap-item align-self-center">
                    <div class="single-roadmap road-right">
                        <div class="row">
                            <div class="col-5 align-self-center">
                                <div class="single-roadmap-img">
                                    <img src="<?= base_url() ?>assets/public/assets/img/roadmap-5.png" alt="">
                                </div>
                        
                            </div>
                            <div class="col-7">
                                <div class="roadmap-text">
                                    <p>31.11.2017</p>
                                    <h5>Main Development</h5>
                                    <p>The recording starts with the patter of a summer squall. Later, a drifting tone like that of a in token.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--roadmap area end-->

    <!--team-bg-->
    <div class="team-bg">
        <!--team area start-->
        <div class="team-area wow fadeInUp section-padding" id="team">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="heading">
                            <h5>core team</h5>
                            <div class="space-10"></div>
                            <h1>Our Superman</h1>
                        </div>
                        <div class="space-60"></div>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="single-team">
                            <div class="single-team-img">
                                <img src="<?= base_url() ?>assets/public/assets/img/superman-1.jpg" alt="">
                            </div>
                            <div class="space-30"></div>
                            <div class="single-team-content">
                                <h3>William Delisle</h3>
                                <div class="space-10"></div>
                                <h6>FOUNDER & CEO</h6>
                            </div>
                            <div class="space-10"></div>
                            <div class="single-team-social">
                                <ul>
                                    <li><a class="ico-1" href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a class="ico-2" href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a class="ico-3" href="#"><i class="fa fa-twitter "></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="single-team">
                            <div class="single-team-img">
                                <img src="<?= base_url() ?>assets/public/assets/img/superman-2.jpg" alt="">
                            </div>
                            <div class="space-30"></div>
                            <div class="single-team-content">
                                <h3>Julius Book</h3>
                                <div class="space-10"></div>
                                <h6>SOFTWARE ENGINEER</h6>
                            </div>
                            <div class="space-10"></div>
                            <div class="single-team-social">
                                <ul>
                                    <li><a class="ico-1" href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a class="ico-2" href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a class="ico-3" href="#"><i class="fa fa-twitter "></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="single-team">
                            <div class="single-team-img">
                                <img src="<?= base_url() ?>assets/public/assets/img/superman-6.jpg" alt="">
                            </div>
                            <div class="space-30"></div>
                            <div class="single-team-content">
                                <h3>Jessica Blair</h3>
                                <div class="space-10"></div>
                                <h6>MARKETING ANALYST</h6>
                            </div>
                            <div class="space-10"></div>
                            <div class="single-team-social">
                                <ul>
                                    <li><a class="ico-1" href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a class="ico-2" href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a class="ico-3" href="#"><i class="fa fa-twitter "></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="single-team">
                            <div class="single-team-img">
                                <img src="<?= base_url() ?>assets/public/assets/img/superman-7.jpg" alt="">
                            </div>
                            <div class="space-30"></div>
                            <div class="single-team-content">
                                <h3>Nancy Burns</h3>
                                <div class="space-10"></div>
                                <h6>Head of Design</h6>
                            </div>
                            <div class="space-10"></div>
                            <div class="single-team-social">
                                <ul>
                                    <li><a class="ico-1" href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a class="ico-2" href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a class="ico-3" href="#"><i class="fa fa-twitter "></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="team-area team wow fadeInDown">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="heading">
                            <h5>Advisory  team</h5>
                            <div class="space-10"></div>
                            <h1>Advisory Board</h1>
                        </div>
                        <div class="space-60"></div>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="single-team">
                            <div class="single-team-img">
                                <img src="<?= base_url() ?>assets/public/assets/img/superman-4.jpg" alt="">
                            </div>
                            <div class="space-30"></div>
                            <div class="single-team-content">
                                <h3>Tricia Morgan</h3>
                                <div class="space-10"></div>
                                <h6>ADVISOR</h6>
                            </div>
                            <div class="space-10"></div>
                            <div class="single-team-social">
                                <ul>
                                    <li><a class="ico-1" href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a class="ico-2" href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a class="ico-3" href="#"><i class="fa fa-twitter "></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="single-team">
                            <div class="single-team-img">
                                <img src="<?= base_url() ?>assets/public/assets/img/superman-5.jpg" alt="">
                            </div>
                            <div class="space-30"></div>
                            <div class="single-team-content">
                                <h3>Kent Ransom</h3>
                                <div class="space-10"></div>
                                <h6>ADVISOR</h6>
                            </div>
                            <div class="space-10"></div>
                            <div class="single-team-social">
                                <ul>
                                    <li><a class="ico-1" href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a class="ico-2" href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a class="ico-3" href="#"><i class="fa fa-twitter "></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="single-team">
                            <div class="single-team-img">
                                <img src="<?= base_url() ?>assets/public/assets/img/superman-6.jpg" alt="">
                            </div>
                            <div class="space-30"></div>
                            <div class="single-team-content">
                                <h3>Edward Schultz</h3>
                                <div class="space-10"></div>
                                <h6>ADVISOR</h6>
                            </div>
                            <div class="space-10"></div>
                            <div class="single-team-social">
                                <ul>
                                    <li><a class="ico-1" href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a class="ico-2" href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a class="ico-3" href="#"><i class="fa fa-twitter "></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="single-team">
                            <div class="single-team-img">
                                <img src="<?= base_url() ?>assets/public/assets/img/superman-7.jpg" alt="">
                            </div>
                            <div class="space-30"></div>
                            <div class="single-team-content">
                                <h3>Betty Cyr</h3>
                                <div class="space-10"></div>
                                <h6>ADVISOR</h6>
                            </div>
                            <div class="space-10"></div>
                            <div class="single-team-social">
                                <ul>
                                    <li><a class="ico-1" href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a class="ico-2" href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a class="ico-3" href="#"><i class="fa fa-twitter "></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="space-30"></div>
        </div>
        <!--team area end-->

        <!--apps area start-->
        <div class="apps-area wow fadeInUp section-padding" id="apps">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-5 offset-1 align-self-center">
                        <div class="heading">
                            <h5>MOBILE APP</h5>
                            <div class="space-10"></div>
                            <h1>Track from Anywhere</h1>
                            <div class="space-20"></div>
                            <p>Swimming hundreds of feet beneath the ocean’s surface in many parts of the world are prolific architects called giant larvaceans. These zooplankton are not particularly giant themselves  but every day, they construct one or more spacious houses that can exceed . </p>
                            <p>The recording starts with the patter of a summer squall. Later, a drifting tone like that of a not-quite-tuned-in radio station rises and for a while drowns out the patter.</p>
                        </div>
                        <div class="space-30"></div>
                        <a href="#" class="gradient-btn apps-btn"> <i class="zmdi zmdi-google-play"></i>Google Playstore</a>

                        <a href="#" class="gradient-btn apps-btn apps-btn-2"> <i class="zmdi zmdi-apple"></i>Apple Appstore</a>
                    </div>
                    <div class="col-12 col-lg-5 offset-1">
                        <div class="apps-img">
                            <img src="<?= base_url() ?>assets/public/assets/img/Mobile.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--apps area end-->

        <!--faq area start-->
        <div class="faq-area wow fadeInUp" id="faq">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                    <div class="heading">
                        <h5>faq</h5>
                        <div class="space-10"></div>
                        <h1>Frequently Asked Questions </h1>
                    </div>
                    <div class="space-60"></div>
                </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="faq-list">
                            <ul class="nav nav-pills" id="pills-tab">
                                <li><a class="active" data-toggle="pill" href="#one">General Questions</a></li>
                                <li><a data-toggle="pill" href="#two">ico</a></li>
                                <li><a data-toggle="pill" href="#three">token</a></li>
                                <li><a data-toggle="pill" href="#four">Cryptocurrency</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="space-50"></div>
            </div>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="one">
                        <div class="container-fluid">
                            <div class="faq-carousel owl-carousel">
                                <div class="single-faq">
                                    <h4>Why I should invest in ICO ?</h4>
                                    <div class="space-20"></div>
                                    <p>Swimming hundreds of feet beneath the ocean’s surface in many parts of the world are prolific architects called giant larvaceans. These zooplankton are not particularly giant themselves (they resemble tadpoles and are about the size of a pinkie finger), but every day.</p>
                                    <div class="space-20"></div>
                                    <a href="#" class="readmore-btn"><i class="fa fa-angle-right"></i>readmore</a>
                                </div>
                                <div class="single-faq">
                                    <h4>The Risks of Investing in ICO ?</h4>
                                    <div class="space-20"></div>
                                    <p>Swimming hundreds of feet beneath the ocean’s surface in many parts of the world are prolific architects called giant larvaceans. These zooplankton are not particularly giant themselves (they resemble tadpoles and are about the size of a pinkie finger), but every day.</p>
                                    <div class="space-20"></div>
                                    <a href="#" class="readmore-btn"><i class="fa fa-angle-right"></i>readmore</a>
                                </div>
                                <div class="single-faq">
                                    <h4>How to Trade Cryptocurrencies ?</h4>
                                    <div class="space-20"></div>
                                    <p>Swimming hundreds of feet beneath the ocean’s surface in many parts of the world are prolific architects called giant larvaceans. These zooplankton are not particularly giant themselves (they resemble tadpoles and are about the size of a pinkie finger), but every day</p>
                                    <div class="space-20"></div>
                                    <a href="#" class="readmore-btn"><i class="fa fa-angle-right"></i>readmore</a>
                                </div>
                                <div class="single-faq">
                                    <h4>How to Trade Cryptocurrencies ?</h4>
                                    <div class="space-20"></div>
                                    <p>Swimming hundreds of feet beneath the ocean’s surface in many parts of the world are prolific architects called giant larvaceans. These zooplankton are not particularly giant themselves (they resemble tadpoles and are about the size of a pinkie finger), but every day</p>
                                    <div class="space-20"></div>
                                    <a href="#" class="readmore-btn"><i class="fa fa-angle-right"></i>readmore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="two">
                        <div class="container-fluid">
                            <div class="faq-carousel owl-carousel">
                                <div class="single-faq">
                                    <h4>Why I should invest in ICO ?</h4>
                                    <div class="space-20"></div>
                                    <p>Swimming hundreds of feet beneath the ocean’s surface in many parts of the world are prolific architects called giant larvaceans. These zooplankton are not particularly giant themselves (they resemble tadpoles and are about the size of a pinkie finger), but every day.</p>
                                    <div class="space-20"></div>
                                    <a href="#" class="readmore-btn"><i class="fa fa-angle-right"></i>readmore</a>
                                </div>
                                <div class="single-faq">
                                    <h4>The Risks of Investing in ICO ?</h4>
                                    <div class="space-20"></div>
                                    <p>Swimming hundreds of feet beneath the ocean’s surface in many parts of the world are prolific architects called giant larvaceans. These zooplankton are not particularly giant themselves (they resemble tadpoles and are about the size of a pinkie finger), but every day.</p>
                                    <div class="space-20"></div>
                                    <a href="#" class="readmore-btn"><i class="fa fa-angle-right"></i>readmore</a>
                                </div>
                                <div class="single-faq">
                                    <h4>How to Trade Cryptocurrencies ?</h4>
                                    <div class="space-20"></div>
                                    <p>Swimming hundreds of feet beneath the ocean’s surface in many parts of the world are prolific architects called giant larvaceans. These zooplankton are not particularly giant themselves (they resemble tadpoles and are about the size of a pinkie finger), but every day</p>
                                    <div class="space-20"></div>
                                    <a href="#" class="readmore-btn"><i class="fa fa-angle-right"></i>readmore</a>
                                </div>
                                <div class="single-faq">
                                    <h4>How to Trade Cryptocurrencies ?</h4>
                                    <div class="space-20"></div>
                                    <p>Swimming hundreds of feet beneath the ocean’s surface in many parts of the world are prolific architects called giant larvaceans. These zooplankton are not particularly giant themselves (they resemble tadpoles and are about the size of a pinkie finger), but every day</p>
                                    <div class="space-20"></div>
                                    <a href="#" class="readmore-btn"><i class="fa fa-angle-right"></i>readmore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="three">
                        <div class="container-fluid">
                            <div class="faq-carousel owl-carousel">
                                <div class="single-faq">
                                    <h4>Why I should invest in ICO ?</h4>
                                    <div class="space-20"></div>
                                    <p>Swimming hundreds of feet beneath the ocean’s surface in many parts of the world are prolific architects called giant larvaceans. These zooplankton are not particularly giant themselves (they resemble tadpoles and are about the size of a pinkie finger), but every day.</p>
                                    <div class="space-20"></div>
                                    <a href="#" class="readmore-btn"><i class="fa fa-angle-right"></i>readmore</a>
                                </div>
                                <div class="single-faq">
                                    <h4>The Risks of Investing in ICO ?</h4>
                                    <div class="space-20"></div>
                                    <p>Swimming hundreds of feet beneath the ocean’s surface in many parts of the world are prolific architects called giant larvaceans. These zooplankton are not particularly giant themselves (they resemble tadpoles and are about the size of a pinkie finger), but every day.</p>
                                    <div class="space-20"></div>
                                    <a href="#" class="readmore-btn"><i class="fa fa-angle-right"></i>readmore</a>
                                </div>
                                <div class="single-faq">
                                    <h4>How to Trade Cryptocurrencies ?</h4>
                                    <div class="space-20"></div>
                                    <p>Swimming hundreds of feet beneath the ocean’s surface in many parts of the world are prolific architects called giant larvaceans. These zooplankton are not particularly giant themselves (they resemble tadpoles and are about the size of a pinkie finger), but every day</p>
                                    <div class="space-20"></div>
                                    <a href="#" class="readmore-btn"><i class="fa fa-angle-right"></i>readmore</a>
                                </div>
                                <div class="single-faq">
                                    <h4>How to Trade Cryptocurrencies ?</h4>
                                    <div class="space-20"></div>
                                    <p>Swimming hundreds of feet beneath the ocean’s surface in many parts of the world are prolific architects called giant larvaceans. These zooplankton are not particularly giant themselves (they resemble tadpoles and are about the size of a pinkie finger), but every day</p>
                                    <div class="space-20"></div>
                                    <a href="#" class="readmore-btn"><i class="fa fa-angle-right"></i>readmore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="four">
                        <div class="container-fluid">
                            <div class="faq-carousel owl-carousel">
                                <div class="single-faq">
                                    <h4>Why I should invest in ICO ?</h4>
                                    <div class="space-20"></div>
                                    <p>Swimming hundreds of feet beneath the ocean’s surface in many parts of the world are prolific architects called giant larvaceans. These zooplankton are not particularly giant themselves (they resemble tadpoles and are about the size of a pinkie finger), but every day.</p>
                                    <div class="space-20"></div>
                                    <a href="#" class="readmore-btn"><i class="fa fa-angle-right"></i>readmore</a>
                                </div>
                                <div class="single-faq">
                                    <h4>The Risks of Investing in ICO ?</h4>
                                    <div class="space-20"></div>
                                    <p>Swimming hundreds of feet beneath the ocean’s surface in many parts of the world are prolific architects called giant larvaceans. These zooplankton are not particularly giant themselves (they resemble tadpoles and are about the size of a pinkie finger), but every day.</p>
                                    <div class="space-20"></div>
                                    <a href="#" class="readmore-btn"><i class="fa fa-angle-right"></i>readmore</a>
                                </div>
                                <div class="single-faq">
                                    <h4>How to Trade Cryptocurrencies ?</h4>
                                    <div class="space-20"></div>
                                    <p>Swimming hundreds of feet beneath the ocean’s surface in many parts of the world are prolific architects called giant larvaceans. These zooplankton are not particularly giant themselves (they resemble tadpoles and are about the size of a pinkie finger), but every day</p>
                                    <div class="space-20"></div>
                                    <a href="#" class="readmore-btn"><i class="fa fa-angle-right"></i>readmore</a>
                                </div>
                                <div class="single-faq">
                                    <h4>How to Trade Cryptocurrencies ?</h4>
                                    <div class="space-20"></div>
                                    <p>Swimming hundreds of feet beneath the ocean’s surface in many parts of the world are prolific architects called giant larvaceans. These zooplankton are not particularly giant themselves (they resemble tadpoles and are about the size of a pinkie finger), but every day</p>
                                    <div class="space-20"></div>
                                    <a href="#" class="readmore-btn"><i class="fa fa-angle-right"></i>readmore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="space-90"></div>
        </div>
        <!--faq area end-->
    </div>
    <!--team bg area end-->

    <!--community area start-->
    <div class="community-area wow fadeInUp section-padding" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="heading">
                        <h5>GReat Community</h5>
                        <div class="space-10"></div>
                        <h1>Our Community </h1>
                    </div>
                <div class="space-60"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-lg">
                    <div class="single-community big-social">
                        <a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a>
                    </div>
                </div>
                <div class="col-6 col-lg">
                    <div class="single-community mid-social">
                        <a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                    </div>
                    <div class="single-community">
                        <a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a>
                    </div>
                </div>
                <div class="col-6 col-lg">
                    <div class="single-community">
                        <a class="github" href="#"><i class="fa fa-github"></i></a>
                    </div>
                    <div class="single-community mid-social">
                        <a class="behance" href="#"><i class="fa fa-behance"></i></a>
                    </div>
                </div>
                <div class="col-6 col-lg">
                    <div class="single-community big-social">
                        <a class="youtube" href="#"><i class="fa fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-6 col-lg">
                    <div class="single-community mid-social">
                        <a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="single-community">
                        <a class="flickr" href="#"><i class="fa fa-flickr"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--community area end-->

    <!--footer area start-->
    <div class="footera-area section-padding wow fadeInDown">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-footer">
                        <div class="logo-area footer">
                            <a href="#"><img src="<?= base_url() ?>assets/public/assets/img/logo-top.png" alt=""></a>
                        </div>
                        <div class="space-20"></div>
                        <p>Swimming hundreds of feet beneath the ocean’s surface in many parts of the world are prolific architects called giant larvaceans. </p>
                        <div class="space-10"></div>
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-2">
                    <div class="single-footer">
                        <ul>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Token Sale</a></li>
                            <li><a href="#">Roadmap</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-6 col-lg-2">
                    <div class="single-footer">
                        <ul>
                            <li><a href="#">White Paper</a></li>
                            <li><a href="#">Team</a></li>
                            <li><a href="#">APP</a></li>
                            <li><a href="#">FAQ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-footer">
                        <p>Subscribe to our Newsletter</p>
                        <div class="space-20"></div>
                        <div class="footer-form">
                            <form action="#">
                                <input type="email" placeholder="Email Address">
                                <a href="" class="gradient-btn subscribe">GO</a>
                            </form>
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