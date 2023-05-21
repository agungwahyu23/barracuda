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
							<label class="form-label">Name of Artist</label>
						</div>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" class="form-control" name="title" value="<?= $album->title ?>" disabled>
							<label class="form-label">Title of Album</label>
						</div>
					</div>
					<div class="form-group form-float">
						<label class="form-label">Genre</label>
						<div class="form-line">
							<input type="text" class="form-control" name="title" value="<?= $album->genre ?>" disabled>
						</div>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" class="form-control" name="title" value="<?= $album->release_date ?>" disabled>
							<label class="form-label">Release Date</label>
						</div>
					</div>
					<div class="form-group form-float">
						<label class="form-label">Youtube Channel Link</label>
						<div class="form-line">
							<input type="text" class="form-control" name="yt_link" placeholder="Ex: https://www.youtube.com/channel/UCUZHFZ9jIKrLroW8LcyJEQQ" value="<?= $album->yt_link ?>" disabled>
						</div>
					</div>

                    <div class="form-group form-float">
						<label class="form-label">Link Artist Spotify</label>
						<div class="form-line">
							<input type="text" class="form-control" name="spotify_link" placeholder="Ex: https://open.spotify.com/artist/34gJOUTurjXaj8z3E9fDaV" value="<?= $album->spotify_link ?>" disabled>
						</div>
					</div>

					<div class="form-group form-float">
						<label class="form-label">Link Artist ITunes</label>
						<div class="form-line">
							<input type="text" class="form-control" name="itunes_link" value="<?= $album->itunes_link ?>" disabled>
						</div>
					</div>

                    <div class="form-group form-float">
						<label class="form-label">Whatsapp Number</label>
						<div class="form-line">
							<input type="text" class="form-control" name="contact_person" placeholder="08567xxxx" onkeypress="return hanyaAngka(event)" value="<?= $album->contact_person ?>" disabled >
						</div>
					</div>

                    <div class="form-group form-float">
                        <label class="form-label">Producer</label>
						<div class="form-line">
							<input type="text" class="form-control" name="produser" value="<?= $album->produser ?>" disabled >
						</div>
					</div>

                    <div class="form-group form-float">
                        <label class="form-label">Composser</label>
						<div class="form-line">
							<input type="text" class="form-control" name="composser" value="<?= $album->composser ?>" disabled >
						</div>
					</div>

                    <div class="form-group form-float">
						<label class="form-label">Year of Production</label>
						<div class="form-line">
							<input type="text" class="date-own form-control" name="year_production"  value="<?= $album->year_production ?>" disabled>
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
							<label class="form-label">Producer</label>
						</div>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" class="form-control" name="composser" value="<?= $album->composser ?>" disabled>
							<label class="form-label">Composser</label>
						</div>
					</div>
					<div class="form-group form-float">
						<label class="form-label">Proof of payment</label>
						<?php if (isset($album->attachment)) { ?>
							<div id="preview_proof_payment">
								<img class="img-thumbnail" width="200px" height="200px" src="<?php echo base_url('/') . $album->attachment; ?>" alt="your image" />
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
									<th>Song Title</th>
									<th>Date Upload</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($single as $key => $value) { ?>
									<tr>
										<td><?= $value->title ?></td>
										<td><?= $value->created_at ?></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
					
					<a href="<?= site_url('user/album') ?>" class="btn btn-warning waves-effect">Back</a>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- #END# Basic Validation -->
