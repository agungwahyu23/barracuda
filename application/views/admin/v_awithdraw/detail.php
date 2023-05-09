<div class="block-header">
	<h2>
		Detail Request Withdrawal
	</h2>
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="info-box">
		<div class="icon bg-green">
			<i class="material-icons">attach_money</i>
		</div>
		<div class="content">
			<div class="text">TOTAL INCOME</div>
			<div class="number count-to" data-from="0" data-to="125" data-speed="1000" data-fresh-interval="20"><?= isset($user->total_income) ? $user->total_income : 0 ?></div>
		</div>
	</div>
</div>

<!-- Basic Validation -->
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>Detail Data</h2>
			</div>
			<div class="body">
				<form id="form_add" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?= $withdraw->id ?>">
				<input type="hidden" name="user_id" value="<?= $withdraw->user_id ?>">
					<div class="form-group form-float">
						<label class="form-label">Request Amount</label>
						<div class="form-line">
							<input type="text" class="form-control" name="amount_copy" id="amount" placeholder="0" value="<?= $withdraw->amount ?>" disabled>
							<input type="hidden" class="form-control" name="amount" id="amount" placeholder="0" value="<?= $withdraw->amount ?>">
						</div>
					</div>

					<div class="form-group form-float">
						<label class="form-label">Attachment</label>
						<input name="attachment" id="attachment" type="file" multiple style="margin-top:10px!important" onchange="return fileValidation()"><br>

						<?php if (isset($withdraw->attachment)) { ?>
							<div id="aniimated-thumbnials" class="list-unstyled row clearfix preview_attachment">
								<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
									<a href="<?= base_url('/upload/proof_attachment/') . $withdraw->attachment ?>" data-sub-html="<?= $withdraw->attachment ?>">
										<img class="img-responsive thumbnail" src="<?= base_url('/upload/proof_attachment/') . $withdraw->attachment; ?>" alt="your image">
									</a>
								</div>
							</div>
						<?php }else{ ?>
							<div id="aniimated-thumbnials" class="preview_attachment">
								<img class="img-thumbnail" width="200px" height="200px" src="<?php echo base_url(); ?>/assets/admin/images/tidak-ada.png" alt="your image" />
							</div>
						<?php } ?>
					</div>

					<div class="form-group form-float">
						<label class="form-label">Status</label>
						<div class="form-line">
							<select name="status" class="form-control" id="status">
								<option value="0" <?= $withdraw->status == 0 ? 'selected' : '' ?>>Pending</option>
								<option value="1" <?= $withdraw->status == 1 ? 'selected' : '' ?>>Terima</option>
								<option value="2" <?= $withdraw->status == 2 ? 'selected' : '' ?>>Reject</option>
							</select>
						</div>
					</div>

					<button class="btn btn-primary waves-effect" type="submit">Submit</button>
					<a href="<?= site_url('v2/user/withdraw') ?>" class="btn btn-warning waves-effect">Back</a>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- #END# Basic Validation -->

<script type="text/javascript">
	function fileValidation() {
		var fileInput = document.getElementById('attachment');
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
					document.getElementById('aniimated-thumbnials').innerHTML = '<img width="300px" heiht="300px"  src="' + e.target
						.result + '"/>';
				};
				reader.readAsDataURL(fileInput.files[0]);
			}
		}
	}

	var rupiah = document.getElementById('amount');
	var amount_copy = document.getElementById("amount_copy");
	rupiah.addEventListener('keyup', function(e){
		// tambahkan 'Rp.' pada saat form di ketik
		// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
		rupiah.value = formatRupiah(this.value, 'Rp. ');
		amount_copy.value = rupiah.value.replace(/\D/g,'');
	});

	/* Fungsi formatRupiah */
	function formatRupiah(angka, prefix){
		var number_string = angka.replace(/[^,\d]/g, '').toString(),
		split   		= number_string.split(','),
		sisa     		= split[0].length % 3,
		rupiah     		= split[0].substr(0, sisa),
		ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

		// tambahkan titik jika yang di input sudah menjadi angka ribuan
		if(ribuan){
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}

		rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
		return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
	}


$('#form_add').submit(function(e) {
	// cek apakah input > total amount
	var amount = $('#amount_copy').val();
	var total = $('#total_amount').val();

	if (parseFloat(amount) > parseFloat(total)) {
		Swal.fire({
			title: "Failed!",
			text: "the withdrawal amount cannot be greater than the income!",
			icon: "error",
			button: "Ok",
			dangerMode: true,
		});
		return false;
	}

    var data = $(this).serialize();
    // var data = new FormData($(this)[0]);
    $.ajax({
            // method: 'POST',
            beforeSend: function() {
                $(".loading2").show();
                $(".loading2").modal('show');
            },
            url: '<?php echo base_url('Admin_withdraw/prosesUpdate'); ?>',
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
                document.getElementById("form_add").reset();
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
        var link = '<?php echo site_url("v2/user/withdraw") ?>';
        window.location.replace(link);
    });
}

function gagal() {
    Swal.fire({
        title: "Data gagal disimpan!",
        text: "Klik Ok untuk melanjutkan!",
        icon: "danger",
        button: "Ok",
        dangerMode: true,
    });
}
</script>
