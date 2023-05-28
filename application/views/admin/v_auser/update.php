<div class="block-header">
	<h2>
		<?= $page ?>
	</h2>
</div>
<!-- Basic Validation -->
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>Edit Data User</h2>
			</div>
			<div class="body">
				<form id="form_validation" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="id" id="id" value="<?= $user->id ?>">
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" class="form-control" name="name" value="<?= $user->name ?>" required>
							<label class="form-label">Nama*</label>
						</div>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" class="form-control" name="email" value="<?= $user->email ?>" required>
							<label class="form-label">Email*</label>
						</div>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" class="form-control" name="phone" value="<?= $user->phone ?>">
							<label class="form-label">Nomor Telepon</label>
						</div>
					</div>
					<div class="form-group form-float">
						<label class="form-label">Gender</label>
						<div class="form-line">
							<select name="gender" id="gender" class="form-control show-tick">
								<option value="0">Perempuan</option>
								<option value="1">Laki-laki</option>
							</select>
						</div>
					</div>
					
					<div class="form-group form-float">
						<div class="form-line">
							<textarea name="address" cols="30" rows="5" class="form-control no-resize"
							><?= $user->address ?></textarea>
							<label class="form-label">Alamat</label>
						</div>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" class="form-control" name="total_income" value="<?= $user->total_income ?>">
							<label class="form-label">Total Pendapatan</label>
						</div>
					</div>
					<!-- <div class="form-group form-float">
						<span>Foto Profil (Kosongi jika tidak diganti)</span>
                        <input name="photo" id="photo" type="file" multiple style="margin-top:10px!important" onchange="return fileValidation()"><br>

						<?php if (isset($user->photo)) { ?>
							<div id="preview_proof_payment">
								<img class="img-thumbnail" width="200px" height="200px" src="<?php echo base_url('/upload/profile/') . $user->photo; ?>" alt="your image" />
							</div>
						<?php }else{ ?>
							<div id="preview_proof_payment">
								<img class="img-thumbnail" width="200px" height="200px" src="<?php echo base_url(); ?>/assets/admin/images/tidak-ada.png" alt="your image" />
							</div>
						<?php } ?>
					</div> -->
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" class="form-control" name="username" value="<?= $user->username ?>" required>
							<label class="form-label">Username*</label>
						</div>
					</div>
					<div class="form-group form-float">
						<span>Bukti Bayar</span>

						<?php if ($user->proof_of_payment != '') { ?>
							<div id="aniimated-thumbnials" class="list-unstyled row clearfix">
								<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
									<a href="<?= base_url('upload/profile/'). $user->proof_of_payment ?>" data-sub-html="<?= $user->proof_of_payment ?>">
										<img class="img-responsive thumbnail" src="<?= base_url('upload/profile/'). $user->proof_of_payment ?>">
									</a>
								</div>
							</div>
						<?php }else{ ?>
							<!-- <div id="preview_proof_payment">
								<img class="img-thumbnail" width="200px" height="200px" src="<?php echo base_url(); ?>/assets/admin/images/tidak-ada.png" alt="your image" />
							</div> -->

							<div id="aniimated-thumbnials" class="list-unstyled row clearfix">
								<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
									<a href="<?php echo base_url(); ?>/assets/admin/images/tidak-ada.png" data-sub-html="<?php echo base_url(); ?>/assets/admin/images/tidak-ada.png">
										<img class="img-responsive thumbnail" src="<?php echo base_url(); ?>/assets/admin/images/tidak-ada.png">
									</a>
								</div>
							</div>
						<?php } ?>
					</div>
					<div class="form-group form-float">
						<label class="form-label">Status</label>
						<div class="form-line">
							<select name="is_active" class="form-control" id="is_active">
								<option value="1" <?= $user->is_active == 1 ? 'selected' : '' ?>>Aktif</option>
								<option value="0" <?= $user->is_active == 0 ? 'selected' : '' ?>>Nonaktif</option>
							</select>
						</div>
					</div>
					<div class="form-group form-float">
						<label class="form-label">Level</label>
						<div class="form-line">
							<select name="level" class="form-control" id="level">
								<option value="1" <?= $user->level == 1 ? 'selected' : '' ?>>Admin</option>
								<option value="2" <?= $user->level == 2 ? 'selected' : '' ?>>User</option>
							</select>
						</div>
					</div>
					<button class="btn btn-primary waves-effect" type="submit">Kirim</button>
					<a href="<?= site_url('v2/user') ?>" class="btn btn-warning waves-effect">Kembali</a>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- #END# Basic Validation -->

<script type="text/javascript">

function fileValidation() {
    var fileInput = document.getElementById('photo');
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

$('.date-own').datepicker({
	format: "yyyy",
	viewMode: "years",
	minViewMode: "years",
	autoclose: true //to close picker once year is selected
});

function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

$('#form_validation').submit(function(e) {
    var data = $(this).serialize();
    // var data = new FormData($(this)[0]);
    $.ajax({
            // method: 'POST',
            beforeSend: function() {
                $(".loading2").show();
                $(".loading2").modal('show');
            },
            url: '<?php echo base_url('Admin_user/prosesUpdate'); ?>',
            type: "post",
            enctype: "multipart/form-data",
            // data: data,
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
        })
        .done(function(data) {
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
        title: "Data berhasil disimpan!",
        text: "Klik Ok untuk melanjutkan!",
        icon: "success",
        button: "Ok",
    }).then(function() {
        var link = '<?php echo base_url("Admin_user") ?>';
        window.location.replace(link);
    });
}

function gagal() {
    Swal.fire({
        title: "Data gagal disimpan!",
        text: "Klik Ok untuk melanjutkan!",
        icon: "warning",
        button: "Ok",
        dangerMode: true,
    });
}
</script>
