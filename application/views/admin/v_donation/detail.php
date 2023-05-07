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
					<div class="form-group form-float">
						<label class="form-label">Nominal</label>
						<div class="form-line">
							<input type="text" class="form-control" name="email" value="<?= $donation->amount ?>" disabled>
						</div>
					</div>

					<div class="form-group form-float">
						<label class="form-label">Proof of payment</label>
						<?php if (isset($donation->attachment)) { ?>
							<div id="preview_proof_payment">
								<img class="img-thumbnail" width="200px" height="200px" src="<?php echo base_url('/upload/donation_attachment/') . $donation->attachment; ?>" alt="your image" />
							</div>
						<?php }else{ ?>
							<div id="preview_proof_payment">
								<img class="img-thumbnail" width="200px" height="200px" src="<?php echo base_url(); ?>/assets/admin/images/tidak-ada.png" alt="your image" />
							</div>
						<?php } ?>
					</div>
					
					<a href="<?= site_url('user/donation') ?>" class="btn btn-warning waves-effect">Back</a>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- #END# Basic Validation -->
