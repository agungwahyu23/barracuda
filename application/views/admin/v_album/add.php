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
                    <div class="form-group form-float">
                        <label class="form-label">Title Album*</label>
						<div class="form-line">
							<input type="text" class="form-control" name="title" required>
						</div>
					</div>

					<div class="form-group form-float">
                        <label class="form-label">Name of Artist*</label>
						<div class="form-line">
							<input type="text" class="form-control" name="artist" required>
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
							<input type="text" class="date-full form-control" name="release_date" required>
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
							<input type="text" class="form-control" name="contact_person" placeholder="08567xxxx" onkeypress="return hanyaAngka(event)" required>
						</div>
					</div>

                    <div class="form-group form-float">
                        <label class="form-label">Producer*</label>
						<div class="form-line">
							<input type="text" class="form-control" name="produser" required>
						</div>
					</div>

                    <div class="form-group form-float">
                        <label class="form-label">Composser*</label>
						<div class="form-line">
							<input type="text" class="form-control" name="composser" required>
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
					
					<!-- <div class="form-group form-float">
						<div class="form-line">
							<textarea name="description" cols="30" rows="5" class="form-control no-resize"></textarea>
							<label class="form-label">Description</label>
						</div>
					</div> -->

					<div class="form-group form-float">
						<span><b>Upload Song 1 (The file name must match the title)*</b></span>
                        <input name="file[]" class="file_single" id="file_single1" type="file" multiple style="margin-top:10px!important" onchange="return validationSingle(this)" required/>
                        <br>
                        <label class="form-label">Title Song 1*</label>
						<div class="form-line">
							<input type="text" class="form-control" name="title_single1">
						</div><br>
                        <label class="form-label">Composer Song 1*</label>
						<div class="form-line">
							<input type="text" class="form-control" name="last_name_composer[]">
						</div>
					</div>

					<div class="form-group form-float">
						<span><b>Upload Song 2 (The file name must match the title)*</b></span>
                        <input name="file[]" class="file_single" id="file_single2" type="file" multiple style="margin-top:10px!important" onchange="return validationSingle(this)" required/>
                        <br>
                        <label class="form-label">Title Song 2*</label>
						<div class="form-line">
							<input type="text" class="form-control" name="title_single2">
						</div><br>
                        <label class="form-label">Composer Song 2*</label>
						<div class="form-line">
							<input type="text" class="form-control" name="last_name_composer[]">
						</div>
					</div>

					<div class="form-group form-float">
						<span><b>Upload Single 3 (The file name must match the title)*</b></span>
                        <input name="file[]" class="file_single" id="file_single3" type="file" multiple style="margin-top:10px!important" onchange="return validationSingle(this)" required/>
                        <br>
                        <label class="form-label">Title Song 3*</label>
						<div class="form-line">
							<input type="text" class="form-control" name="title_single3">
						</div><br>
                        <label class="form-label">Composer Song 3*</label>
						<div class="form-line">
							<input type="text" class="form-control" name="last_name_composer[]">
						</div>
					</div>

					<div class="form-group form-float">
						<span><b>Upload Single 4 (The file name must match the title)*</b></span>
                        <input name="file[]" class="file_single" id="file_single4" type="file" multiple style="margin-top:10px!important" onchange="return validationSingle(this)" required/>
                        <br>
                        <label class="form-label">Title Song 4*</label>
						<div class="form-line">
							<input type="text" class="form-control" name="title_single4">
						</div><br>
                        <label class="form-label">Composer Song 4*</label>
						<div class="form-line">
							<input type="text" class="form-control" name="last_name_composer[]">
						</div>
					</div>

					<div class="form-group form-float">
						<span><b>Upload Single 5 (The file name must match the title)*</b></span>
                        <input name="file[]" class="file_single" id="file_single5" type="file" multiple style="margin-top:10px!important" onchange="return validationSingle(this)" required/>
                        <br>
                        <label class="form-label">Title Song 5*</label>
						<div class="form-line">
							<input type="text" class="form-control" name="title_single5">
						</div><br>
                        <label class="form-label">Composer Song 5*</label>
						<div class="form-line">
							<input type="text" class="form-control" name="last_name_composer[]">
						</div>
					</div>

                    <div class="form-group form-float">
						<span><b>Upload Single 6 (The file name must match the title)*</b></span>
                        <input name="file[]" class="file_single" id="file_single6" type="file" multiple style="margin-top:10px!important" onchange="return validationSingle(this)" required/>
                        <br>
                        <label class="form-label">Title Song 6*</label>
						<div class="form-line">
							<input type="text" class="form-control" name="title_single6">
						</div><br>
                        <label class="form-label">Composer Song 6*</label>
						<div class="form-line">
							<input type="text" class="form-control" name="last_name_composer[]">
						</div>
					</div>

                    <div class="form-group form-float">
						<span><b>Upload Single 7 (The file name must match the title)*</b></span>
                        <input name="file[]" class="file_single" id="file_single7" type="file" multiple style="margin-top:10px!important" onchange="return validationSingle(this)" required/>
                        <br>
                        <label class="form-label">Title Song 7*</label>
						<div class="form-line">
							<input type="text" class="form-control" name="title_single7">
						</div><br>
                        <label class="form-label">Composer Song 7*</label>
						<div class="form-line">
							<input type="text" class="form-control" name="last_name_composer[]">
						</div>
					</div>

                    <div class="form-group form-float">
						<span><b>Upload Single 8 (The file name must match the title)*</b></span>
                        <input name="file[]" class="file_single" id="file_single8" type="file" multiple style="margin-top:10px!important" onchange="return validationSingle(this)" required/>
                        <br>
                        <label class="form-label">Title Song 8*</label>
						<div class="form-line">
							<input type="text" class="form-control" name="title_single8">
						</div><br>
                        <label class="form-label">Composer Song 8*</label>
						<div class="form-line">
							<input type="text" class="form-control" name="last_name_composer[]">
						</div>
					</div>

                    <div class="form-group form-float">
						<span><b>Upload Single 9 (The file name must match the title)*</b></span>
                        <input name="file[]" class="file_single" id="file_single9" type="file" multiple style="margin-top:10px!important" onchange="return validationSingle(this)" required/>
                        <br>
                        <label class="form-label">Title Song 9*</label>
						<div class="form-line">
							<input type="text" class="form-control" name="title_single9">
						</div><br>
                        <label class="form-label">Composer Song 9*</label>
						<div class="form-line">
							<input type="text" class="form-control" name="last_name_composer[]">
						</div>
					</div>

                    <div class="form-group form-float">
						<span><b>Upload Single 10 (The file name must match the title)*</b></span>
                        <input name="file[]" class="file_single" id="file_single10" type="file" multiple style="margin-top:10px!important" onchange="return validationSingle(this)" required/>
                        <br>
                        <label class="form-label">Title Song 10*</label>
						<div class="form-line">
							<input type="text" class="form-control" name="title_single10">
						</div><br>
                        <label class="form-label">Composer Song 10*</label>
						<div class="form-line">
							<input type="text" class="form-control" name="last_name_composer[]">
						</div>
					</div>

					<!-- <div class="form-group form-float" id="upload_payment">
						<span>Upload Proof of Payment</span>
                        <input name="proof_payment" id="proof_payment" type="file" multiple style="margin-top:10px!important" onchange="return fileValidationPayment()"><br>

						<div id="preview_proof_payment">
							<img class="img-thumbnail" width="200px" height="200px" src="<?php echo base_url(); ?>/assets/admin/images/tidak-ada.png" alt="your image" />
						</div>
					</div> -->
					<button class="btn btn-primary waves-effect" type="submit">Submit</button>
					<a href="<?= site_url('user/album') ?>" class="btn btn-warning waves-effect">Cancel</a>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- #END# Basic Validation -->

<script type="text/javascript">
    $(document).ready(function(){
        $('#upload_payment').hide();
    });

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

function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))

    return false;
    return true;
}
    
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

function fileValidationPayment() {
    var fileInput = document.getElementById('proof_payment');
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
                document.getElementById('preview_proof_payment').innerHTML = '<img width="300px" heiht="300px"  src="' + e.target
                    .result + '"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}

function validationSingle(fileInput) {
    var fileInputVal = document.getElementsByClassName('file_single');
    // var filePath = fileInput.value;
    var allowedExtensions = /(\.wav)$/i;

	var fileName = fileInput.value;
	var fileExtension = fileName.split('.').pop().toLowerCase();
	console.log(fileInputVal);

    if (fileExtension != 'wav') {
        toastr.error('File harus format .wav only.', 'Warning', {
            timeOut: 5000
        }, toastr.options = {
            "closeButton": true
        });
        fileInput.value = '';
        return false;
    } else {
        //Image preview
        if (fileInput.files && fileInput.files[0].size > 100000000) {
            toastr.error('File harus maksimal 100 MB', 'Warning', {
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

function showLoading() {
	var loadingWrapper = document.getElementsByClassName("loading-wrapper");
	loadingWrapper[0].style.display = "block";
}

function hideLoading() {
	var loadingWrapper = document.getElementsByClassName("loading-wrapper");
	loadingWrapper[0].style.display = "none";
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
            url: '<?php echo base_url('Album/prosesAdd'); ?>',
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
        var link = '<?php echo base_url("album") ?>';
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
