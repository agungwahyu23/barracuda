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
								<img class="img-thumbnail" width="200px" height="200px" src="<?php echo base_url('/upload/album/') . $album->cover; ?>" alt="your image" />
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
						<label class="form-label">Bukti Bayar</label>
						<?php if (isset($album->attachment)) { ?>
							<div id="preview_proof_payment">
								<img class="img-thumbnail" width="200px" height="200px" src="<?php echo base_url('/upload/proof_attachment/') . $album->attachment; ?>" alt="your image" />
							</div>
						<?php }else{ ?>
							<div id="preview_proof_payment">
								<img class="img-thumbnail" width="200px" height="200px" src="<?php echo base_url(); ?>/assets/admin/images/tidak-ada.png" alt="your image" />
							</div>
						<?php } ?>
					</div>

					<h4>Data Single</h4>
					<hr>
					<!-- list single -->
					<div class="table-responsive">
						<table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>Judul Lagu</th>
									<th>Komposer</th>
									<th>Tanggal Upload</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($single as $key => $value) { ?>
									<tr>
										<td><?= $value->title ?></td>
										<td><?= $value->first_name_composer ?></td>
										<td><?= $value->created_at ?></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
					
					<a href="<?= site_url('user/single') ?>" class="btn btn-warning waves-effect">Kembali</a>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- #END# Basic Validation -->
