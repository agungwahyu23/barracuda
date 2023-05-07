<div class="block-header">
	<h2>
		Add Single
	</h2>
</div>
<!-- Basic Validation -->
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>Add Data Single</h2>
			</div>
			<div class="body">
				<form id="form_validation" method="POST" enctype="multipart/form-data">
					<div class="form-group form-float">
						<label class="form-label">Title*</label>
						<div class="form-line">
							<input type="text" class="form-control" name="title" required>
						</div>
					</div>
					<div class="form-group form-float">
						<label class="form-label">Name of Artis*</label>
						<div class="form-line">
							<input type="text" class="form-control" name="artist" required>
						</div>
					</div>
					<div class="form-group form-float">
						<label class="form-label">Featuring Artist <sup>Optional (If None just leave blank)</sup></label>
						<div class="form-line">
							<input type="text" class="form-control" name="featuring_artist">
						</div>
					</div>
					<div class="form-group form-float">
						<label class="form-label">Language*</label>
						<div class="form-line">
							<input type="text" class="form-control" name="language" required>
						</div>
					</div>
					<div class="form-group form-float">
						<label class="form-label">Genre*</label>
						<div class="form-line">
							<select name="genre_id" id="genre_id" class="form-control show-tick" required>
								<?php
								foreach ($genre as $key => $value) {?>
									<option value="<?= $value->id ?>"><?= $value->genre ?></option>
								<?php } ?>
							</select>
						</div>
					</div>

					<div class="form-group form-float">
						<label class="form-label">Sub Genre</label>
						<div class="form-line">
							<input type="text" class="form-control" name="sub_genre">
						</div>
					</div>

					<div class="form-group form-float">
						<label class="form-label">Release Date*</label>
						<div class="form-line">
							<input type="text" class="date-full form-control" name="release_date" required>
						</div>
					</div>

					<div class="form-group form-float">
						<label class="form-label">Lyrics*</label>
						<div class="form-line">
							<textarea name="lyrics" cols="30" rows="5" class="form-control no-resize"></textarea required>
						</div>
					</div>

					<div class="form-group form-float">
						<label class="form-label">Spotify Link <sup>(Optional)</sup></label>
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
						<label class="form-label">Youtube Channel Link <sup>(Optional)</sup></label>
						<div class="form-line">
							<input type="text" class="form-control" name="yt_link" placeholder="Ex: https://www.youtube.com/watch?v=PeMvMNpvB5M&pp=ygUJYmFycmFjdWRh" >
						</div>
					</div>

					<div class="form-group form-float">
						<label class="form-label">Start Priview Tiktok <sup>(Optional)</sup></label>
						<div class="form-line">
							<input type="text" class="form-control" name="start_preview_tiktok" placeholder="Please fill in the start preview seconds format for tiktok (if not filled in it will be default, tiktok duration is 1 minute)" >
						</div>
					</div>

					<div class="form-group form-float">
						<label class="form-label">Contact Person*</label>
						<div class="form-line">
							<input type="text" class="form-control" name="contact_person" placeholder="" >
						</div>
					</div>

					<div class="form-group form-float">
						<label class="form-label">Instagram Account</label>
						<div class="form-line">
							<input type="text" class="form-control" name="ig" >
						</div>
					</div>

					<div class="form-group form-float">
						<label class="form-label">First Name Composser*</label>
						<div class="form-line">
							<input type="text" class="form-control" name="first_composer" required>
						</div>
					</div>

					<div class="form-group form-float">
						<label class="form-label">Last Name Composser*</label>
						<div class="form-line">
							<input type="text" class="form-control" name="last_composer" required>
						</div>
					</div>

					<div class="form-group form-float">
						<label class="form-label">Arranger*</label>
						<div class="form-line">
							<input type="text" class="form-control" name="arranger" required>
						</div>
					</div>

					<div class="form-group form-float">
						<label class="form-label">Producer*</label>
						<div class="form-line">
							<input type="text" class="form-control" name="produser" required>
						</div>
					</div>

					<div class="form-group form-float">
						<label class="form-label">Year of Production*</label>
						<div class="form-line">
							<input type="text" class="date-own form-control" name="year_production" required>
						</div>
					</div>

					<div class="form-group form-float">
						<span>Upload Cover (3000px x 3000px)*</span>
                        <input name="cover" id="cover" type="file" multiple style="margin-top:10px!important" onchange="return fileValidation()" required><br>

						<div id="slider">
							<img class="img-thumbnail" width="200px" height="200px" src="<?php echo base_url(); ?>/assets/admin/images/tidak-ada.png" alt="your image" />
						</div>
					</div>

					<div class="form-group form-float">
						<span>Upload File Music*</span>
                        <input name="file" id="file" type="file" onchange="return validationSingle(this)" multiple required/>
					</div>

					<div class="form-group form-float">
						<span>Upload identity card/KTP*</span>
                        <input name="ktp" id="ktp" type="file" multiple style="margin-top:10px!important" onchange="return fileValidationKtp()" required><br>

						<div id="sliderKtp">
							<img class="img-thumbnail" width="200px" height="200px" src="<?php echo base_url(); ?>/assets/admin/images/tidak-ada.png" alt="your image" />
						</div>
					</div>
					
					<!-- <div class="form-group form-float">
						<div class="form-line">
							<textarea name="description" cols="30" rows="5" class="form-control no-resize"></textarea>
							<label class="form-label">Description</label>
						</div>
					</div> -->
					
					<button class="btn btn-primary waves-effect" type="submit">Submit</button>
					<a href="<?= site_url('user/single') ?>" class="btn btn-warning waves-effect">Cancel</a>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- #END# Basic Validation -->

<script type="text/javascript">
	function fileValidation() {
		var fileInput = document.getElementById('cover');
		var filePath = fileInput.value;
		var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
		if (!allowedExtensions.exec(filePath)) {
			toastr.error('File harus format .jpeg/.jpg/.png/.gif only.', 'Warning', {
				timeOut: 5000
			}, toastr.options = {
				"closeButton": true
			});
			fileInput.value = '';
			return false;
		} else {
			//Image preview
			if (fileInput.files && fileInput.files[0].size > 1000240) {
				toastr.error('File harus maksimal 1 MB', 'Warning', {
					timeOut: 5000
				}, toastr.options = {
					"closeButton": true
				});
				fileInput.value = '';
				return false;
			} else if (fileInput.files && fileInput.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					document.getElementById('slider').innerHTML = '<img width="300px" heiht="300px"  src="' + e.target
						.result + '"/>';
				};
				reader.readAsDataURL(fileInput.files[0]);
			}
		}
	}
	function fileValidationKtp() {
		var fileInput = document.getElementById('ktp');
		var filePath = fileInput.value;
		var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
		if (!allowedExtensions.exec(filePath)) {
			toastr.error('File harus format .jpeg/.jpg/.png/.gif only.', 'Warning', {
				timeOut: 5000
			}, toastr.options = {
				"closeButton": true
			});
			fileInput.value = '';
			return false;
		} else {
			//Image preview
			if (fileInput.files && fileInput.files[0].size > 1000240) {
				toastr.error('File harus maksimal 1 MB', 'Warning', {
					timeOut: 5000
				}, toastr.options = {
					"closeButton": true
				});
				fileInput.value = '';
				return false;
			} else if (fileInput.files && fileInput.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					document.getElementById('sliderKtp').innerHTML = '<img width="300px" heiht="300px"  src="' + e.target
						.result + '"/>';
				};
				reader.readAsDataURL(fileInput.files[0]);
			}
		}
	}

function showLoading() {
	var loadingWrapper = document.getElementsByClassName("loading-wrapper");
	loadingWrapper[0].style.display = "block";
}

function hideLoading() {
	var loadingWrapper = document.getElementsByClassName("loading-wrapper");
	loadingWrapper[0].style.display = "none";
}

$('.date-own').datepicker({
	format: "yyyy",
	viewMode: "years",
	minViewMode: "years",
	autoclose: true //to close picker once year is selected
});

$('.date-full').datepicker({
  format: "yyyy-mm-dd",
  autoclose: true
});

function validationSingle(fileInput) {
    var fileInputVal = document.getElementById('file');
    // var filePath = fileInput.value;
    var allowedExtensions = /(\.wav)$/i;

	var fileName = fileInput.value;
	var fileExtension = fileName.split('.').pop().toLowerCase();

    if (fileExtension != 'wav') {
        toastr.error('The file format must be .wav.', 'Warning', {
            timeOut: 5000
        }, toastr.options = {
            "closeButton": true
        });
        fileInput.value = '';
        return false;
    } else {
        //Image preview
        if (fileInput.files && fileInput.files[0].size > 100000000) {
            toastr.error('Maximum file size is 100 MB', 'Warning', {
                timeOut: 5000
            }, toastr.options = {
                "closeButton": true
            });
            fileInput.value = '';
            return false;
        }else{
			return false;
		}
    }
}

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
                showLoading();
                $(".loading2").modal('show');
				
            },
            url: '<?php echo base_url('Single/prosesAdd'); ?>',
            type: "post",
            enctype: "multipart/form-data",
            // data: data,
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
        })
        .done(function(data) {
			hideLoading();
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
        title: "Data saved successfully!",
        text: "Click Ok to continue!",
        icon: "success",
        button: "Ok",
    }).then(function() {
        var link = '<?php echo base_url("single") ?>';
        window.location.replace(link);
    });
}

function gagal() {
    Swal.fire({
        title: "Data failed to save!",
        text: "Click Ok to continue!",
        icon: "danger",
        button: "Ok",
        dangerMode: true,
    });
}
</script>
