<div class="block-header">
	<h2>
		Add Album
	</h2>
</div>
<div class="alert alert-success">
Upload price per album IDR 250000
<!-- <?php var_dump($param);?> -->
</div>
<!-- Basic Validation -->
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>Add Data Album</h2>
			</div>
			<div class="body">
				<section>
					<div class="wizard">
						<div class="wizard-inner">
							<div class="connecting-line"></div>
							<ul class="nav nav-tabs" role="tablist">

								<li role="presentation" class="<?= ($wizard == '' || $wizard == 1) ? 'active' : '' ?>">
									<a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
										<span class="round-tab">
											<i class="glyphicon glyphicon-pencil"></i>
										</span>
									</a>
								</li>

								<li role="presentation" class="<?= ($wizard == 2) ? 'active' : 'disabled' ?>">
									<a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
										<span class="round-tab">
											<i class="glyphicon glyphicon-folder-open"></i>
										</span>
									</a>
								</li>
							</ul>
						</div>

						<!-- <form role="form" id="outer_form"> -->
							<div class="tab-content">
								<input type="hidden" name="step" id="step" value="<?= $wizard ?? '' ?>">
								
									<?php if($wizard == '' || $wizard == 1){ ?>
									<form id="first_form" method="POST" enctype="multipart/form-data">
									<input type="hidden" name="order_id1" id="order_id1" value="<?= $order_id ? $order_id : '' ?>">
									<div class="tab-pane active" role="tabpanel" id="step1">
										<div class="step1">
											<div class="form-group form-float">
												<label class="form-label">Title Album*</label>
												<div class="form-line">
													<input type="text" class="form-control" name="title" value="<?= $data_album ? $data_album->title : '' ?>" required>
												</div>
											</div>

											<div class="form-group form-float">
												<label class="form-label">Name of Artist*</label>
												<div class="form-line">
													<input type="text" class="form-control" name="artist" value="<?= $data_album ? $data_album->artist : '' ?>" required>
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
													<input type="text" class="date-full form-control" name="release_date" value="<?= $data_album ? $data_album->release_date : '' ?>" required>
												</div>
											</div>

											<div class="form-group form-float">
												<label class="form-label">Youtube Channel Link <sup>(Optional)</sup></label>
												<div class="form-line">
													<input type="text" class="form-control" name="yt_link"
														placeholder="Ex: https://www.youtube.com/channel/UCUZHFZ9jIKrLroW8LcyJEQQ" value="<?= $data_album ? $data_album->yt_link : '' ?>">
												</div>
											</div>

											<div class="form-group form-float">
												<label class="form-label">Link Artist Spotify <sup>(Optional)</sup></label>
												<div class="form-line">
													<input type="text" class="form-control" name="spotify_link"
														placeholder="Ex: https://open.spotify.com/artist/34gJOUTurjXaj8z3E9fDaV" value="<?= $data_album ? $data_album->spotify_link : '' ?>">
												</div>
											</div>

											<div class="form-group form-float">
												<label class="form-label">Link Artist ITunes <sup>(Optional)</sup></label>
												<div class="form-line">
													<input type="text" class="form-control" name="itunes_link" value="<?= $data_album ? $data_album->itunes_link : '' ?>">
												</div>
											</div>

											<div class="form-group form-float">
												<label class="form-label">Whatsapp Number*</label>
												<div class="form-line">
													<input type="text" class="form-control" name="contact_person" placeholder="08567xxxx"
														onkeypress="return hanyaAngka(event)" value="<?= $data_album ? $data_album->contact_person : '' ?>">
												</div>
											</div>

											<div class="form-group form-float">
												<label class="form-label">Producer*</label>
												<div class="form-line">
													<input type="text" class="form-control" name="produser" value="<?= $data_album ? $data_album->produser : '' ?>" required>
												</div>
											</div>

											<div class="form-group form-float">
												<label class="form-label">Composser*</label>
												<div class="form-line">
													<input type="text" class="form-control" name="composser" value="<?= $data_album ? $data_album->composser : '' ?>" required>
												</div>
											</div>

											<div class="form-group form-float">
												<label class="form-label">Year of Production*</label>
												<div class="form-line">
													<input type="text" class="date-own form-control" name="year_production" value="<?= $data_album ? $data_album->year_production : '' ?>" required>
												</div>
											</div>

											<div class="form-group form-float">
												<span>Upload Cover (3000px x 3000px)*</span>
												<input name="cover" id="cover" type="file" multiple style="margin-top:10px!important"
													onchange="return fileValidation()" required><br>
											
												<?php if (isset($data_album->cover)) { ?>
													<div id="slider">
													<img class="img-thumbnail" width="200px" height="200px"
														src="<?php echo base_url('/').$data_album->cover ?>" alt="your image" />
													</div>
												<?php }else{ ?>
													<div id="slider">
														<img class="img-thumbnail" width="200px" height="200px"
															src="<?php echo base_url(); ?>/assets/admin/images/tidak-ada.png" alt="your image" />
													</div>
												<?php } ?>
											</div>
										</div>
										<hr>
											<div class="col-md-6 col-sm-6 col-lg-6 text-right"></div>
											<div class="col-md-6 col-sm-6 col-lg-6 text-right">
												<a href="#" class="btn btn-warning cancel">Cancel</a>

												<button type="submit" class="btn btn-primary">Save and continue</button>
											</div>
									</div>
									</form>

									<?php }elseif ($wizard != '' || $wizard != '1') { ?>
									<form id="second_form" method="POST" enctype="multipart/form-data">
									<div class="tab-pane" role="tabpanel" id="step2">
										<div class="step2">
											<input type="hidden" name="order_id" id="order_id" value="<?= $order_id ?? '' ?>">

											<?php for ($i=1; $i < 11; $i++) { ?>
												<div class="form-group form-float">
													<input type="hidden" name="file[]" id="file<?=$i?>" class="mb-4"><br>
													<input type="hidden" name="file_copy<?=$i?>" id="file_copy<?=$i?>" class="mb-4"><br>

													<span><b>Upload Single <?=$i?> (The file name must match the title)*</b></span>
													<br>
													<label class="form-label">Title Song <?=$i?>*</label>
													<div class="form-line">
														<input type="text" class="form-control title_single" name="title_single<?=$i?>" id="title_single<?=$i?>" data-index="<?=$i?>" required>
													</div>
													<span id="title_result<?=$i?>" style='color: red; font-size: 14px;'></span><br>
													<label class="form-label">Composer Song <?=$i?></label>
													<div class="form-line">
														<input type="text" class="form-control" name="last_name_composer<?=$i?>">
													</div>

													<br>
													<div id="filelist<?=$i?>"></div>
													<a id="browse<?=$i?>" class="browse btn btn-primary btn-xs" href="javascript:;" data-title="title_single<?=$i?>"
														data-id="<?=$i?>"> Upload</a>
												</div>
											<?php } ?>
										</div>
										<hr>
											<div class="col-md-6 col-sm-6 col-lg-6 text-right"></div>
											<div class="col-md-6 col-sm-6 col-lg-6 text-right">
												<a href="<?= site_url('user/album-add/') . 1 . '/' . $order_id ?>" class="btn btn-default">Previous</a>
												<button type="submit" class="btn btn-primary">Save and continue</button>
											</div>
									</div>
									</form>
									<?php } ?>
								
								<div class="tab-pane" role="tabpanel" id="complete">
									<div class="step44">
										<h5>Completed</h5>


									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						<!-- </form> -->
					</div>
				</section>
			</div>
		</div>
	</div>
</div>
<!-- #END# Basic Validation -->

<?php include('add_js.php') ?>
