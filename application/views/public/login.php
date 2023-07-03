<!DOCTYPE html>
  <html lang="en">
    <head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Tomokoyuki - Agregator Musik Terbaik untuk Distribusi dan Rilis Musik</title>
		<meta content="Agregator Musik,agregator musik di indonesia,aggregator spotify,Music Distribution,Digital Music,Agregator digital,agregator indonesia, tomokoyuki" name="keywords">
		<meta content="Tomokuki adalah agregator musik terbaik di Indonesia. Temukan ribuan lagu dari berbagai genre musik di Indonesia melalui platform kami. Distribusikan musik digital Anda dan jangkau lebih banyak pendengar dengan Tomokuki, agregator Spotify terpercaya." name="description">
		<meta property="og:type" content="website" />
		<meta property = "og: title" content = "Tomokoyuki - Agregator Musik Terbaik untuk Distribusi dan Rilis Musik" />
		<meta property="og:description" content = "Tomokuki adalah agregator musik terbaik di Indonesia. Temukan ribuan lagu dari berbagai genre musik di Indonesia melalui platform kami. Distribusikan musik digital Anda dan jangkau lebih banyak pendengar dengan Tomokuki, agregator Spotify terpercaya." />
		<meta name="google-site-verification" content="ghlXfT2A6dsK0JM0QtD71OzenAWIPGgaVU2yNMdmMVg" />
		<link rel="canonical" href="https://tomokoyuki.com/" />
			<link rel="icon" href="<?= base_url() ?>assets/public/assets/img/logo-removebg-preview.png">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	  <link rel="stylesheet" href="<?= base_url() ?>assets/public/mystyle.css">
	  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/public/vendor/sweetalert/sweetalert.css">
	  <script src="<?= base_url() ?>assets/public/vendor/jquery/jquery.min.js"></script>
    </head>
    <body>
     <section class="abovefold overflow-hidden">

        <div class="container position-relative">
            <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content10/dark/Ornament.png"
                alt="bg-header" class="img-fluid img-header d-none d-md-block">
        </div>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light pt-lg-5">
            <div class="container px-0">
                <a class="navbar-brand me-0" href="#">
					<!-- <div class="logo-area"> -->
                        <a href="#">
                        	<div class="logos">
                            <video src="<?= base_url() ?>assets/public/assets/img/logo.mp4" type="video/mp4" autoplay muted loop></video>
                        	</div>
                        </a>
                    <!-- </div> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto navigation">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?= base_url('') ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?= base_url('') ?>">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?= base_url('') ?>">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?= base_url('') ?>">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container header position-relative">
			<form id="login" method="POST" enctype="multipart/form-data">>
				<div class="row">
					<div class="col-lg-6 px-md-0 my-auto">
						<div class="headline">
						<img class="img-fluid" src="http://api.elements.buildwithangga.com/storage/files/2/assets/Empty%20State/EmptyState3/Empty-3-6.png" alt="Agregator Musik tomokoyuki">
						</div>
					</div>
					<div class="col-lg-6 mt-5 mt-md-0">
						<div class="card">
							<div class="input-group mb-4">
								<label for="input" class="w-100">
									<span class="input-title">Username atau Email</span>
									<input type="email" name="username" class="form-control mt-2 text-white" placeholder="Masukkan Email atau Username Anda">
								</label>
							</div>
							<div class="input-group">
								<label for="input" class="w-100">
									<span class="input-title">Password</span>
									<input type="password" class="form-control mt-2 text-white" placeholder="Masukkan Password Anda" id="password-content-3-6" name="password">
									<div onclick="togglePassword()" class="text-white">
                  	Show Password
                </div>
								</label>
							</div>
							<button type="submit" class="btn btn-card">
								Login
							</button>
							<div class="text-white mt-2">
								Belum punya akun? Daftar <a href="<?= base_url('register') ?>"> disini</a>
							</div>
						</div>
					</div>
				</div>
			</form>
        </div>
    </section> 

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	  <!-- <script src="<?= base_url() ?>assets/admin/vendor/jquery/jquery.min.js"></script> -->
	  <script src="<?= base_url() ?>assets/public/vendor/jquery-easing/jquery.easing.min.js"></script>
	  <script src="<?php echo base_url(); ?>assets/public/js/sweealert.js"></script>
	  <script src="<?php echo base_url(); ?>assets/public/vendor/sweetalert/sweetalert.min.js"></script>
    </body>
  </html>

	<script>
		function togglePassword() {
        var x = document.getElementById("password-content-3-6");
        if (x.type === "password") {
          x.type = "text";
          document
            .getElementById("icon-toggle")
            .setAttribute("fill", "#FFFFFF");
        } else {
          x.type = "password";
          document
            .getElementById("icon-toggle")
            .setAttribute("fill", "#FFFFFF");
        }
      }
	</script>

  <!-- fungsi ajax daftar -->
  <script type="text/javascript">
		$('#login').submit(function(e) {
			var data = $(this).serialize();
			$.ajax({
					beforeSend: function() {
						$(".loading2").show();
						$(".loading2").modal('show');
					},
					url: '<?php echo base_url('Login/cek_login'); ?>',
					type: "post",
					enctype: "multipart/form-data",
					data: new FormData(this),
					processData: false,
					contentType: false,
					cache: false,
				})
				.done(function(data) {
					var result = jQuery.parseJSON(data);
					console.log(data);
					if (result.status == 'berhasil') {
						document.getElementById("login").reset();
						Swal.fire({
							title: "Login Berhasil!",
							text: "Klik Ok untuk melanjutkan!",
							icon: "success",
							button: "Ok",
						}).then(function() {
							var link = '<?php echo base_url("dashboard/") ?>';
							window.location.replace(link);
						});
					} else {
						$(".loading2").hide();
						$(".loading2").modal('hide');
						gagal();

					}
				})
			e.preventDefault();
		});

		function gagal() {
			swal({
				title: "Gagal!",
				text: "Pastikan username/password benar!",
				type: 'error',
				button: "Ok",
				dangerMode: true,
			});
		}
		</script>
