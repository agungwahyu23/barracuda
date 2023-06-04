<div class="block-header">
	<h2>
		Edit Single
	</h2>
</div>
<!-- Basic Validation -->
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>Edit Data Single</h2>
			</div>
			<div class="body">
				<form id="form_validation" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="id" id="id" value="<?= $id ?>">
					<input type="hidden" name="order_id" id="order_id" value="<?= $single->order_id ?>">
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" class="form-control" name="title" value="<?= $single->title ?>" required>
							<label class="form-label">Judul*</label>
						</div>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" class="form-control" name="artist" value="<?= $single->artist ?>" required>
							<label class="form-label">Nama Artis*</label>
						</div>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" class="form-control" name="language" value="<?= $single->language ?>">
							<label class="form-label">Bahasa</label>
						</div>
					</div>
					<div class="form-group form-float">
						<label class="form-label">Genre</label>
						<div class="form-line">
							<select name="genre_id" id="genre_id" class="form-control show-tick">
								<?php
								foreach ($genre as $key => $value) {?>
									<option value="<?= $value->id ?>" <?= $single->genre_id == $value->id ? 'selected' : '' ?>><?= $value->genre ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					
					<div class="form-group form-float">
						<div class="form-line">
							<textarea name="description" cols="30" rows="5" class="form-control no-resize"
							><?= $single->description ?></textarea>
							<label class="form-label">Description</label>
						</div>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" class="form-control" name="first_composer" value="<?= $single->first_name_composer ?>" required>
							<label class="form-label">Nama Depan Komposer*</label>
						</div>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" class="form-control" name="last_composer" value="<?= $single->last_name_composer ?>" required>
							<label class="form-label">Nama Belakang Komposer*</label>
						</div>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" class="form-control" name="arranger" value="<?= $single->arranger ?>">
							<label class="form-label">Arranger</label>
						</div>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" class="form-control" name="produser" value="<?= $single->produser ?>">
							<label class="form-label">Produser</label>
						</div>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" class="date-own form-control" name="year_production" value="<?= $single->year_production ?>">
							<label class="form-label">Tahun Produksi</label>
						</div>
					</div>
					<div class="form-group form-float">
						<span>File Musik</span><br>
                        <a href="<?= base_url($single->file) ?>" class="btn btn-xs btn-success" download>Unduh File</a>
					</div>
					<div class="form-group form-float">
						<span>Bukti Transfer</span><br>
                        <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
							<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
								<?php if ($single->attachment == '') { ?>
									<a href="<?= base_url('assets/admin/images/tidak-ada.png') ?>" data-sub-html="<?= base_url('assets/admin/images/tidak-ada.png') ?>">
									<img class="img-responsive thumbnail" src="<?= base_url('assets/admin/images/tidak-ada.png') ?>">
								</a>
								<?php }else{?>
									<a href="<?= base_url(''). $single->attachment ?>" data-sub-html="<?= $single->attachment ?>">
										<img class="img-responsive thumbnail" src="<?= base_url(''). $single->attachment ?>">
									</a>
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="form-group form-float">
						<span>KTP</span><br>
                        <div class="list-unstyled row clearfix animated-thumbnials2">
							<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
								<?php if ($single->ktp == '') { ?>
									<a href="<?= base_url('assets/admin/images/tidak-ada.png') ?>" data-sub-html="<?= base_url('assets/admin/images/tidak-ada.png') ?>">
									<img class="img-responsive thumbnail" src="<?= base_url('assets/admin/images/tidak-ada.png') ?>">
								</a>
								<?php }else{?>
									<a href="<?= base_url(''). $single->ktp ?>" data-sub-html="<?= $single->ktp ?>">
										<img class="img-responsive thumbnail" src="<?= base_url(''). $single->ktp ?>">
									</a>
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="form-group form-float">
						<span>Cover</span><br>
                        <div class="list-unstyled row clearfix animated-thumbnials2">
							<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
								<?php if ($single->cover == '') { ?>
									<a href="<?= base_url('assets/admin/images/tidak-ada.png') ?>" data-sub-html="<?= base_url('assets/admin/images/tidak-ada.png') ?>">
									<img class="img-responsive thumbnail" src="<?= base_url('assets/admin/images/tidak-ada.png') ?>">
								</a>
								<?php }else{?>
									<a href="<?= base_url(''). $single->cover ?>" data-sub-html="<?= $single->cover ?>">
										<img class="img-responsive thumbnail" src="<?= base_url(''). $single->cover ?>">
									</a>
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="form-group form-float">
						<label class="form-label">Status</label>
						<div class="form-line">
							<select name="status" class="form-control" id="status">
								<option value="0" <?= $single->status == 0 ? 'selected' : '' ?>>Pending</option>
								<option value="1" <?= $single->status == 1 ? 'selected' : '' ?>>Terima</option>
								<option value="2" <?= $single->status == 2 ? 'selected' : '' ?>>Reject</option>
							</select>
						</div>
					</div>
					<button class="btn btn-primary waves-effect" type="submit">Kirim</button>
					<a href="<?= site_url('v2/user/single') ?>" class="btn btn-warning waves-effect">Kembali</a>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- #END# Basic Validation -->

<script type="text/javascript">
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
            url: '<?php echo base_url('Admin_single/prosesUpdate'); ?>',
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
        var link = '<?php echo base_url("admin_single") ?>';
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
