<div class="block-header">
	<h2>
		Detail Request Takedown
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
							<input type="text" class="form-control" name="email" value="<?= $takedown->email ?>" disabled>
						</div>
					</div>
					<div class="form-group form-float">
						<label class="form-label">Takedown Type</label>
						<div class="form-line">
							<input type="text" class="form-control" name="" 
							value="<?php if ($takedown->album_id != null) {
								echo "Album";
							}elseif ($takedown->single_id != null) {
								echo "Single";
							} ?>" 
							disabled>
						</div>
					</div>
					<div class="form-group form-float">
						<label class="form-label">Choose Album/Single</label>
						<div class="form-line">
							<input type="text" class="form-control" name="" 
							value="<?php if ($takedown->album_id != null) {
								echo $takedown->title;
							}elseif ($takedown->single_id != null) {
								echo $takedown->title;
							} ?>" 
							disabled>
						</div>
					</div>
					<a href="<?= site_url('user/takedown') ?>" class="btn btn-primary waves-effect">Back</a>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- #END# Basic Validation -->
