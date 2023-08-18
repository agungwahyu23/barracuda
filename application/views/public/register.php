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
			<form id="register" method="POST" enctype="multipart/form-data">>
				<div class="row">
					<div class="col-lg-6 px-md-0 my-auto">
						<div class="headline">
							Daftar Gratis dan Unggah Musikmu di <span class="cl-light-blue">Tomoko Yuki</span> Sekarang
						</div>
					</div>
					<div class="col-lg-6 mt-5 mt-md-0">
						<div class="card">
							<div class="input-group mb-4">
								<label for="input" class="w-100">
									<span class="input-title">Nama Lengkap</span>
									<input type="text" name="name" class="form-control mt-2 text-white" placeholder="Ex: Dion Bhaskara" required>
								</label>
							</div>
							<div class="input-group mb-4">
								<label for="input" class="w-100">
									<span class="input-title">Email</span>
									<input type="email" name="email" id="email" class="form-control mt-2 text-white" placeholder="Ex: Email@example.org" required>
								</label>
							</div>
							<div class="input-group mb-4">
								<label for="input" class="w-100">
									<span class="input-title">Jenis Kelamin</span><br>
									<div class="row">
										<div class="col col-md-4">
											<input class="form-check-input" type="radio" name="gender" id="gender1"
												value="1" required>
											<label class="form-check-label text-white" for="gender1">
												Laki-laki
											</label>
										</div>
										<div class="col">
											<input class="form-check-input ml-4" type="radio" name="gender" id="gender0"
												value="0">
											<label class="form-check-label text-white" for="gender0">
												Perempuan
											</label>
										</div>
									</div>
								</label>
							</div>
							<div class="input-group mb-4">
								<label for="input" class="w-100">
									<span class="input-title">Telepon</span>
									<input type="text" name="phone" class="form-control mt-2 text-white" placeholder="Ex: 0858xxxxxx" onkeypress="return hanyaAngka(event)" required>
								</label>
							</div>
							<div class="input-group">
								<label for="input" class="w-100">
									<span class="input-title">Alamat</span>
									<input type="text" class="form-control mt-2 text-white" placeholder="Ex: Jl. Mawar No.xx, Surabaya, Kec. Wonocolo" name="address" required>
								</label>
							</div>
							<button type="submit" class="btn btn-card" id="btn_submit">
								Daftar
							</button>
							<div class="text-white mt-2">
								Sudah punya akun? Masuk <a href="<?= base_url('login') ?>"> disini</a>
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
	  <?php include('partials/js.php') ?>
    </body>
  </html>

  <!-- fungsi ajax daftar -->
  <script type="text/javascript">
		$('#register').submit(function(e) {
			const email = $('#email').val();
			const regex = /@gmail\.com$/i;

			var button = document.getElementById("btn_submit");
            button.setAttribute("disabled", true);

			if (regex.test(email)) {				
				var data = $(this).serialize();
				$.ajax({
					beforeSend: function() {
						$(".loading2").show();
						$(".loading2").modal('show');
					},
					url: '<?php echo base_url('Login/proses_register'); ?>',
					type: "post",
					enctype: "multipart/form-data",
					data: new FormData(this),
					processData: false,
					contentType: false,
					cache: false,
				}).done(function(data) {
					button.setAttribute("disabled", false);
					var result = jQuery.parseJSON(data);
					console.log(data);
					if (result.status == 'berhasil') {
						document.getElementById("register").reset();
						Swal.fire({
							title: "Pendaftaran Berhasil!",
							text: "Klik Ok untuk melanjutkan!",
							icon: "success",
							button: "Ok",
						}).then(function() {
							var link = '<?php echo base_url("login/") ?>';
							window.location.replace(link);
						});
					} else {
						$(".loading2").hide();
						$(".loading2").modal('hide');
						gagal();

					}
				})
				
			} else {
				emailValidation();
			}
			e.preventDefault();
		});

		function gagal() {
			swal({
				title: "Gagal!",
				text: "Pastikan data telah diisi dengan benar!",
				type: 'error',
				button: "Ok",
				dangerMode: true,
			});
		}

		function emailValidation() {
			swal({
				title: "Gagal!",
				text: "Email harus menggunakan akun gmail!",
				type: 'error',
				button: "Ok",
				dangerMode: true,
			});
		}
		</script>
