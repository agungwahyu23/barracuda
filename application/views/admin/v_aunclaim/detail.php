<div class="block-header">
	<h2>
		Detail Request Unclaim
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
					<div class="form-group form-float">
						<label class="form-label">Email</label>
						<div class="form-line">
							<input type="text" class="form-control" name="email" value="<?= $unclaim->email ?>" readonly>
						</div>
					</div>
					<div class="form-group form-float">
						<label class="form-label">Unclaim Type</label>
						<div class="form-line">
							<input type="text" class="form-control" name="" 
							value="<?php if ($unclaim->album_id != null) {
								echo "Album";
							}elseif ($unclaim->single_id != null) {
								echo "Single";
							} ?>" 
							readonly>
						</div>
					</div>
					<div class="form-group form-float">
						<label class="form-label">Album/Single</label>
						<div class="form-line">
							<input type="text" class="form-control" name="" 
							value="<?php if ($unclaim->album_id != null) {
								echo $unclaim->title_album;
							}elseif ($unclaim->single_id != null) {
								echo $unclaim->title_single;
							} ?>" 
							readonly>
						</div>
					</div>
					<div class="form-group form-float">
						<label class="form-label">Link</label>
						<div class="form-line">
							<input type="text" class="form-control" name="email" value="<?= $unclaim->link ?>" readonly>
						</div>
					</div>
					<a href="<?= site_url('v2/user/unclaim') ?>" class="btn btn-warning waves-effect">Back</a>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- #END# Basic Validation -->
