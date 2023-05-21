<div class="block-header">
	<h2>
		Add Album
	</h2>
</div>
<div class="alert alert-success">
Upload price per album IDR 250000
</div>
<!-- Basic Validation -->
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>Add Data Album</h2>
			</div>
			<div class="body">
				<form id="form_validation" method="POST" enctype="multipart/form-data">
					<input type="text" name="order_id" id="order_id" value="noorder">
                    <div class="form-group form-float">
                        <label class="form-label">Title Album*</label>
						<div class="form-line">
							<input type="text" class="form-control" name="title" >
						</div>
					</div>

					<div class="form-group form-float">
                        <label class="form-label">Name of Artist*</label>
						<div class="form-line">
							<input type="text" class="form-control" name="artist" >
						</div>
					</div>
					
					<div class="form-group form-float">
						<label class="form-label">Genre</label>
						<div class="form-line">
							<select name="genre_id" id="genre_id" class="form-control show-tick">
								<?php
								foreach ($genre as $key => $value) {?>
									<option value="<?= $value->id ?>"><?= $value->genre ?></option>
								<?php } ?>
							</select>
						</div>
					</div>

                    <div class="form-group form-float">
						<label class="form-label">Release Date*</label>
						<div class="form-line">
							<input type="text" class="date-full form-control" name="release_date" >
						</div>
					</div>

                    <div class="form-group form-float">
						<label class="form-label">Youtube Channel Link <sup>(Optional)</sup></label>
						<div class="form-line">
							<input type="text" class="form-control" name="yt_link" placeholder="Ex: https://www.youtube.com/channel/UCUZHFZ9jIKrLroW8LcyJEQQ" >
						</div>
					</div>

                    <div class="form-group form-float">
						<label class="form-label">Link Artist Spotify <sup>(Optional)</sup></label>
						<div class="form-line">
							<input type="text" class="form-control" name="spotify_link" placeholder="Ex: https://open.spotify.com/artist/34gJOUTurjXaj8z3E9fDaV" >
						</div>
					</div>

					<div class="form-group form-float">
						<label class="form-label">Link Artist ITunes <sup>(Optional)</sup></label>
						<div class="form-line">
							<input type="text" class="form-control" name="itunes_link" >
						</div>
					</div>

                    <div class="form-group form-float">
						<label class="form-label">Whatsapp Number*</label>
						<div class="form-line">
							<input type="text" class="form-control" name="contact_person" placeholder="08567xxxx" onkeypress="return hanyaAngka(event)" >
						</div>
					</div>

                    <div class="form-group form-float">
                        <label class="form-label">Producer*</label>
						<div class="form-line">
							<input type="text" class="form-control" name="produser" >
						</div>
					</div>

                    <div class="form-group form-float">
                        <label class="form-label">Composser*</label>
						<div class="form-line">
							<input type="text" class="form-control" name="composser" >
						</div>
					</div>

                    <div class="form-group form-float">
						<label class="form-label">Year of Production*</label>
						<div class="form-line">
							<input type="text" class="date-own form-control" name="year_production" >
						</div>
					</div>

					<div class="form-group form-float">
						<span>Upload Cover (3000px x 3000px)*</span>
                        <input name="cover" id="cover" type="file" multiple style="margin-top:10px!important" onchange="return fileValidation()" ><br>

						<div id="slider">
							<img class="img-thumbnail" width="200px" height="200px" src="<?php echo base_url(); ?>/assets/admin/images/tidak-ada.png" alt="your image" />
						</div>
					</div>

					<?php for ($i=1; $i < 11; $i++) { ?> 
						<div class="form-group form-float">
							<input type="text" name="file[]" id="file<?=$i?>" class="mb-4"><br>

							<span><b>Upload Single <?=$i?> (The file name must match the title)*</b></span>
							<br>
							<label class="form-label">Title Song <?=$i?>*</label>
							<div class="form-line">
								<input type="text" class="form-control" name="title_single<?=$i?>" id="title_single<?=$i?>">
							</div><br>
							<label class="form-label">Composer Song <?=$i?>*</label>
							<div class="form-line">
								<input type="text" class="form-control" name="last_name_composer[]">
							</div>

							<br>
							<div id="filelist<?=$i?>"></div>
							<a id="browse<?=$i?>" class="browse" href="javascript:;" data-title="title_single<?=$i?>" data-id="<?=$i?>" > Upload</a>
						</div>
					<?php } ?>
					<button class="btn btn-primary waves-effect" type="submit">Submit</button>
					<a href="<?= site_url('user/album') ?>" class="btn btn-warning waves-effect">Cancel</a>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- #END# Basic Validation -->

<?php include('add_js.php') ?>
