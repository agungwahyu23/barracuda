<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <title>

    </title>
    <!--[if !mso]><!-- -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--<![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/public/vendor/sweetalert/sweetalert.css">
	<script src="<?= base_url() ?>assets/public/vendor/jquery/jquery.min.js"></script>

    <style type="text/css">
        #outlook a {
            padding: 0;
        }

        .ReadMsgBody {
            width: 100%;
        }

        .ExternalClass {
            width: 100%;
        }

        .ExternalClass * {
            line-height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table,
        td {
            border-collapse: collapse;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
            -ms-interpolation-mode: bicubic;
        }

        p {
            display: block;
            margin: 13px 0;
        }
    </style>
    <!--[if !mso]><!-->
    <style type="text/css">
        @media only screen and (max-width:480px) {
            @-ms-viewport {
                width: 320px;
            }
            @viewport {
                width: 320px;
            }
        }
    </style>


    <style type="text/css">
        @media only screen and (min-width:480px) {
            .mj-column-per-100 {
width: 100% !important;
            }
        }
    </style>


    <style type="text/css">
    </style>

</head>

<body style="background-color:#f9f9f9;">


    <div style="background-color:#f9f9f9;">


        <div style="background:#f9f9f9;background-color:#f9f9f9;Margin:0px auto;max-width:600px;">

            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#f9f9f9;background-color:#f9f9f9;width:100%;">
                <tbody>
                    <tr>
                        <td style="border-bottom:#333957 solid 5px;direction:ltr;font-size:0px;padding:20px 0;text-align:center;vertical-align:top;">
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>



        <div style="background:#fff;background-color:#fff;Margin:0px auto;max-width:600px;">
			<form id="form_validation" action="<?= base_url('Album/prosesPayment/' . $user_id . '/' . $order_id) ?>" method="POST" enctype="multipart/form-data">
            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#fff;background-color:#fff;width:100%;">
                <tbody>
                    <tr>
                        <td style="border:#dddddd solid 1px;border-top:0px;direction:ltr;font-size:0px;padding:20px 0;text-align:center;vertical-align:top;">
                            <div class="mj-column-per-100 outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:bottom;width:100%;">
								
									<input type="hidden" value="<?= $user_id ?>" name="user_id">
									<input type="hidden" value="<?= $order_id ?>" name="order_id">
									<table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:bottom;" width="100%">

										<tr>
											<td align="center" style="font-size:0px;padding:10px 25px;word-break:break-word;">

												<table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0px;">
													<tbody>
														<tr>
															<td style="width:64px;">

																<img height="auto" src="https://tomokoyuki.com/assets/public/assets/img/logo-removebg-preview.png" style="border:0;display:block;outline:none;text-decoration:none;width:200px;" width="64" />

															</td>
														</tr>
													</tbody>
												</table>

											</td>
										</tr>

										<tr>
											<td align="center" style="font-size:0px;padding:10px 25px;padding-bottom:40px;word-break:break-word;">

												<div style="font-family:'Helvetica Neue',Arial,sans-serif;font-size:32px;font-weight:bold;line-height:1;text-align:center;color:#555;">
													Payment Form
												</div>

											</td>
										</tr>

										<tr>
											<td align="center" style="font-size:0px;padding:10px 25px;padding-bottom:0;word-break:break-word;">

												<div style="font-family:'Helvetica Neue',Arial,sans-serif;font-size:16px;line-height:22px;text-align:center;color:#555;">
													Please make a transfer of IDR 50,000 to the following bank account: <br>
													BTN <br>
													AN. Robby Widjaja <br>
													6001500209140
												</div>

											</td>
										</tr>

										<tr>
											<td align="center" style="font-size:0px;padding:10px 25px;word-break:break-word;">

												<div style="font-family:'Helvetica Neue',Arial,sans-serif;font-size:16px;line-height:22px;text-align:center;color:#555;">
													<input name="proof_of_payment" id="cover" type="file" multiple style="margin-top:10px!important; margin-bottom:5px!important" onchange="return fileValidation()" required><br>

													<div id="slider">
														<img class="img-thumbnail" width="200px" height="200px"
															src="<?php echo base_url(); ?>/assets/admin/images/tidak-ada.png" alt="your image" />
													</div><br>

													<button class="btn btn-primary waves-effect" type="submit">Submit</button>
												</div>

											</td>
										</tr>

										<tr>
											<td align="center" style="font-size:0px;padding:30px 25px;word-break:break-word;">

												<div style="font-family:'Helvetica Neue',Arial,sans-serif;font-size:16px;font-weight:bold;line-height:1;text-align:center;color:#555;">
													Need help?
												</div>

											</td>
										</tr>

										<tr>
											<td align="center" style="font-size:0px;padding:10px 25px;word-break:break-word;">

												<div style="font-family:'Helvetica Neue',Arial,sans-serif;font-size:14px;line-height:22px;text-align:center;color:#555;">
												Please contact the admin via the following contact<br> email <a href="mailto:admin@tomokoyuki.com" style="color:#2F67F6">admin@tomokoyuki.com</a><br>whatsapp +6285817
												</div>

											</td>
										</tr>

									</table>
								
                            </div>

                        </td>
                    </tr>
                </tbody>
            </table>
			</form>
        </div>

    </div>

	 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	  <!-- <script src="<?= base_url() ?>assets/admin/vendor/jquery/jquery.min.js"></script> -->
	  <script src="<?= base_url() ?>assets/public/vendor/jquery-easing/jquery.easing.min.js"></script>
	  <script src="<?php echo base_url(); ?>assets/public/js/sweealert.js"></script>
	  <script src="<?php echo base_url(); ?>assets/public/vendor/sweetalert/sweetalert.min.js"></script>

	<script type="text/javascript">
	function fileValidation() {
		var fileInput = document.getElementById('cover');
		var filePath = fileInput.value;
		var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
		if (!allowedExtensions.exec(filePath)) {
			toastr.error('File harus format .jpeg/.jpg/.png/.gif only.', 'Warning', {
				timeOut: 5000
			}, toastr.options = {
				"closeButton": true
			});
			fileInput.value = '';
			return false;
		} else {
			//Image preview
			if (fileInput.files && fileInput.files[0].size > 1000240) {
				toastr.error('File harus maksimal 1 MB', 'Warning', {
					timeOut: 5000
				}, toastr.options = {
					"closeButton": true
				});
				fileInput.value = '';
				return false;
			} else if (fileInput.files && fileInput.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					document.getElementById('slider').innerHTML = '<img width="300px" heiht="300px"  src="' + e.target
						.result + '"/>';
				};
				reader.readAsDataURL(fileInput.files[0]);
			}
		}
	}

	function showLoading() {
		var loadingWrapper = document.getElementsByClassName("loading-wrapper");
		loadingWrapper[0].style.display = "block";
	}

	function hideLoading() {
		var loadingWrapper = document.getElementsByClassName("loading-wrapper");
		loadingWrapper[0].style.display = "none";
	}
	</script>

	<script>
		$('#form_validation').submit(function(e) {
			var data = $(this).serialize();
			// var data = new FormData($(this)[0]);
			$.ajax({
					// method: 'POST',
					beforeSend: function() {
                		showLoading();
                		$(".loading2").modal('show');
            		},
					url: '<?php echo base_url('Album/prosesPayment/' . $user_id . '/' . $order_id)  ?>',
					type: "post",
					enctype: "multipart/form-data",
					// data: data,
					data: new FormData(this),
					processData: false,
					contentType: false,
					cache: false,
				})
				.done(function(data) {
					hideLoading();
					var result = jQuery.parseJSON(data);
					console.log(data);
					if (result.status == 'berhasil') {
						document.getElementById("form_validation").reset();
						save_berhasil();
					} else {
						$(".loading2").hide();
						$(".loading2").modal('hide');
						gagal();

					}
				})
				e.preventDefault();
		});
	</script>

	<script>
	function save_berhasil() {
		Swal.fire({
			title: "Data saved successfully!",
			text: "Click Ok to continue!",
			icon: "success",
			button: "Ok",
		}).then(function() {
			var link = '<?php echo site_url("success_payment") ?>';
			window.location.replace(link);
		});
	}

	function gagal() {
		Swal.fire({
			title: "Data failed to save!",
			text: "Click Ok to continue!",
			icon: "danger",
			button: "Ok",
			dangerMode: true,
		});
	}
	</script>
</body>

</html>
