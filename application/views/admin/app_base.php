<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Tomo Yuki - Dashboard</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?= base_url() ?>assets/admin/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
	<style>
		.form-label{
			font-weight: normal!important;
		}
	</style>

	<!-- Custom styles for this template-->
    <link href="<?= base_url() ?>assets/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?= base_url() ?>assets/admin/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?= base_url() ?>assets/admin/plugins/animate-css/animate.css" rel="stylesheet" />

	<!-- Light Gallery Plugin Css -->
    <link href="<?= base_url() ?>assets/admin/plugins/light-gallery/css/lightgallery.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="<?= base_url() ?>assets/admin/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?= base_url() ?>assets/admin/css/themes/all-themes.css" rel="stylesheet" />

	<!-- Jquery Core Js -->
	<script src="<?= base_url() ?>assets/admin/plugins/jquery/jquery.min.js"></script>

	<link href="<?= base_url() ?>assets/admin/css/datepicker.css" rel="stylesheet">

	<script src="<?= base_url() ?>assets/admin/js/bootstrap-datepicker.min.js"></script>

	<script src="<?= base_url() ?>assets/admin/js/sweetalert2.all.min.js"></script>
	<link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/sweetalert2.min.css">

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/toastr/toastr.css">
    <script src="<?php echo base_url(); ?>assets/admin/toastr/toastr.js"></script>
    
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/wizard.css">

	<style>
		.swal2-popup {
			font-size: 1.6rem !important;
		}
	</style>

</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>

    <div class="loading">
        <div class="loading-wrapper">
            <div class="loader">
                <img src="<?= base_url('assets/admin/images/loading.gif') ?>" alt="">
            </div>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    
    <!-- Top Bar -->
    <?php include('partials/navbar.php') ?>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <?php include('partials/sidebar.php') ?>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red" class="active">
                            <div class="red"></div>
                            <span>Red</span>
                        </li>
                        <li data-theme="pink">
                            <div class="pink"></div>
                            <span>Pink</span>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div>
                            <span>Deep Purple</span>
                        </li>
                        <li data-theme="indigo">
                            <div class="indigo"></div>
                            <span>Indigo</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="light-blue">
                            <div class="light-blue"></div>
                            <span>Light Blue</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="teal">
                            <div class="teal"></div>
                            <span>Teal</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="light-green">
                            <div class="light-green"></div>
                            <span>Light Green</span>
                        </li>
                        <li data-theme="lime">
                            <div class="lime"></div>
                            <span>Lime</span>
                        </li>
                        <li data-theme="yellow">
                            <div class="yellow"></div>
                            <span>Yellow</span>
                        </li>
                        <li data-theme="amber">
                            <div class="amber"></div>
                            <span>Amber</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="deep-orange">
                            <div class="deep-orange"></div>
                            <span>Deep Orange</span>
                        </li>
                        <li data-theme="brown">
                            <div class="brown"></div>
                            <span>Brown</span>
                        </li>
                        <li data-theme="grey">
                            <div class="grey"></div>
                            <span>Grey</span>
                        </li>
                        <li data-theme="blue-grey">
                            <div class="blue-grey"></div>
                            <span>Blue Grey</span>
                        </li>
                        <li data-theme="black">
                            <div class="black"></div>
                            <span>Black</span>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">

			<?php $this->load->view($content); ?>
            
        </div>
    </section>

    <?php include('partials/script.php') ?>
</body>

</html>
