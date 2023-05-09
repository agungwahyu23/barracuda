<div class="block-header">
	<h2>
		Detail Album
	</h2>
</div>
<!-- Basic Validation -->
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>Detail Data Album</h2>
			</div>
			<div class="body">
				<form id="form_validation" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="order_id" value="<?= $album->order_id ?>">
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" class="form-control" name="artist" value="<?= $album->name ?>" disabled>
							<label class="form-label">Nama Artis</label>
						</div>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" class="form-control" name="title" value="<?= $album->title ?>" disabled>
							<label class="form-label">Judul</label>
						</div>
					</div>
					<div class="form-group form-float">
						<label class="form-label">Genre</label>
						<div class="form-line">
							<input type="text" class="form-control" name="title" value="<?= $album->genre ?>" disabled>
						</div>
					</div>
					<div class="form-group form-float">
						<label class="form-label">Cover (300px x 300px)</label><br>
						<?php if (isset($album->cover)) { ?>
							<div id="slider">
								<img class="img-thumbnail" width="200px" height="200px" src="<?php echo base_url('') . $album->cover; ?>" alt="your image" />
							</div>
						<?php }else{ ?>
							<div id="slider">
								<img class="img-thumbnail" width="200px" height="200px" src="<?php echo base_url(); ?>/assets/admin/images/tidak-ada.png" alt="your image" />
							</div>
						<?php } ?>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" class="form-control" name="produser" value="<?= $album->produser ?>" disabled>
							<label class="form-label">Produser</label>
						</div>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" class="form-control" name="composser" value="<?= $album->composser ?>" disabled>
							<label class="form-label">Komposer</label>
						</div>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<textarea name="description" cols="30" rows="5" class="form-control no-resize" disabled><?= $album->description ?></textarea>
							<label class="form-label">Description</label>
						</div>
					</div>
					<div class="form-group form-float">
						<span>Bukti Transfer</span><br>
                        <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
							<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
								<a href="<?= base_url(''). $album->attachment ?>" data-sub-html="<?= $album->attachment ?>">
									<img class="img-responsive thumbnail" src="<?= base_url(''). $album->attachment ?>">
								</a>
							</div>
						</div>
					</div>
					<div class="form-group form-float">
						<label class="form-label">Status</label>
						<div class="form-line">
							<select name="status" class="form-control" id="status">
								<option value="0" <?= $album->status == 0 ? 'selected' : '' ?>>Pending</option>
								<option value="1" <?= $album->status == 1 ? 'selected' : '' ?>>Terima</option>
								<option value="2" <?= $single->status == 2 ? 'selected' : '' ?>>Reject</option>
							</select>
						</div>
					</div>

					<h4>Data Single</h4>
					<hr>
					<!-- list single -->
					<div class="table-responsive">
						<table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>Judul Lagu</th>
									<!-- <th>Komposer</th> -->
									<th>Tanggal Upload</th>
									<th>File</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($single as $key => $value) { ?>
									<tr>
										<td><?= $value->title ?></td>
										<!-- <td><?= $value->first_name_composer ?></td> -->
										<td><?= $value->created_at ?></td>
										<td><a href="<?= base_url($value->file) ?>" class="btn btn-xs btn-success" download>Unduh File</a></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
					<button class="btn btn-primary waves-effect" type="submit">Kirim</button>
					<a href="<?= site_url('user/single') ?>" class="btn btn-warning waves-effect">Kembali</a>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- #END# Basic Validation -->

<script type="text/javascript">
	$('#form_validation').submit(function(e) {
		var data = $(this).serialize();
		// var data = new FormData($(this)[0]);
		$.ajax({
				// method: 'POST',
				beforeSend: function() {
					$(".loading2").show();
					$(".loading2").modal('show');
				},
				url: '<?php echo base_url('Admin_album/prosesUpdate'); ?>',
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
        var link = '<?php echo site_url("v2/user/album") ?>';
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
