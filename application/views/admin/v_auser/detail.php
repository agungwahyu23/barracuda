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
							<input type="text" class="form-control" name="name" value="<?= $user->name ?>" disabled>
							<label class="form-label">Nama</label>
						</div>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" class="form-control" name="email" value="<?= $user->email ?>" disabled>
							<label class="form-label">Email</label>
						</div>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" class="form-control" name="phone" value="<?= $user->phone ?>" disabled>
							<label class="form-label">Nomor Telepon</label>
						</div>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" class="form-control" name="gender" value="<?php if ($user->gender == 0) {echo "Perempuan";
							}elseif ($user->gender == 1) {echo "Laki-laki";
							} else{echo "-";
							}
							?>" disabled>
							<label class="form-label">Gender</label>
						</div>
					</div>
					
					<div class="form-group form-float">
						<div class="form-line">
							<textarea name="address" cols="30" rows="5" class="form-control no-resize" disabled
							><?= $user->address ?></textarea>
							<label class="form-label">Alamat</label>
						</div>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" class="form-control" name="total_income" value="<?= $user->total_income ?>" disabled>
							<label class="form-label">Total Pendapatan</label>
						</div>
					</div>
					<div class="form-group form-float">
						<span>Foto Profil</span>

						<?php if (isset($user->photo)) { ?>
							<div id="preview_proof_payment">
								<img class="img-thumbnail" width="200px" height="200px" src="<?php echo base_url('/upload/profile/') . $user->photo; ?>" alt="your image" />
							</div>
						<?php }else{ ?>
							<div id="preview_proof_payment">
								<img class="img-thumbnail" width="200px" height="200px" src="<?php echo base_url(); ?>/assets/admin/images/tidak-ada.png" alt="your image" />
							</div>
						<?php } ?>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" class="form-control" name="username" value="<?= $user->username ?>" disabled>
							<label class="form-label">Username</label>
						</div>
					</div>
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
            url: '<?php echo base_url('Single/prosesUpdate'); ?>',
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
        var link = '<?php echo base_url("single") ?>';
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
