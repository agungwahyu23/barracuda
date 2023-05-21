<div class="block-header">
	<h2>
		Detail Donation
	</h2>
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
				<input type="hidden" class="form-control" name="id" value="<?= $donation->id ?>">
					<div class="form-group form-float">
						<label class="form-label">Nominal</label>
						<div class="form-line">
							<input type="text" class="form-control" name="email" value="<?= $donation->amount ?>" disabled>
						</div>
					</div>

					<div class="form-group form-float">
						<label class="form-label">Proof of payment</label>

						<?php if (isset($donation->attachment)) { ?>
							<div id="aniimated-thumbnials" class="list-unstyled row clearfix preview_attachment">
								<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
									<a href="<?php echo base_url('/upload/donation_attachment/') . $donation->attachment; ?>" data-sub-html="<?= $donation->attachment ?>">
										<img class="img-responsive thumbnail" src="<?php echo base_url('/upload/donation_attachment/') . $donation->attachment; ?>" alt="your image">
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
								<option value="0" <?= $donation->status == 0 ? 'selected' : '' ?>>Pending</option>
								<option value="1" <?= $donation->status == 1 ? 'selected' : '' ?>>Terima</option>
								<option value="2" <?= $donation->status == 2 ? 'selected' : '' ?>>Reject</option>
							</select>
						</div>
					</div>
					
					<button class="btn btn-primary waves-effect" type="submit">Submit</button>
					<a href="<?= site_url('v2/user/donation') ?>" class="btn btn-warning waves-effect">Back</a>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- #END# Basic Validation -->

<script>
	$('#form_add').submit(function(e) {
	// cek apakah input > total amount
	var amount = $('#amount').val();
	var total = $('#total_income').val();

	if (total == '') {
		total = 0;
	}
	console.log(total);
	console.log(amount);

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
            url: '<?php echo base_url('Admin_donation/prosesUpdate'); ?>',
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

function save_berhasil() {
    Swal.fire({
        title: "Data berhasil disimpan!",
        text: "Klik Ok untuk melanjutkan!",
        icon: "success",
        button: "Ok",
    }).then(function() {
        var link = '<?php echo site_url("v2/user/donation") ?>';
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
