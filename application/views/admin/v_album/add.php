<div class="block-header">
	<h2>
		Add Album
	</h2>
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
						<div class="form-line">
							<input type="text" class="form-control" name="artist" required>
							<label class="form-label">Name of Artist*</label>
						</div>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" class="form-control" name="title" required>
							<label class="form-label">Title of Album*</label>
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
						<span>Upload Cover (300px x 300px)</span>
                        <input name="cover" id="cover" type="file" multiple style="margin-top:10px!important" onchange="return fileValidation()"><br>

						<div id="slider">
							<img class="img-thumbnail" width="200px" height="200px" src="<?php echo base_url(); ?>/assets/admin/images/tidak-ada.png" alt="your image" />
						</div>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" class="form-control" name="produser">
							<label class="form-label">Producer</label>
						</div>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" class="form-control" name="composser">
							<label class="form-label">Composser</label>
						</div>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<textarea name="description" cols="30" rows="5" class="form-control no-resize"></textarea>
							<label class="form-label">Description</label>
						</div>
					</div>
					<div class="form-group form-float">
						<span>Upload Single 1</span>
                        <input name="file[]" class="file_single" id="file_single1" type="file" multiple style="margin-top:10px!important" onchange="return validationSingle(this)"/>
					</div>
					<div class="form-group form-float">
						<span>Upload Single 2</span>
                        <input name="file[]" class="file_single" id="file_single2" type="file" multiple style="margin-top:10px!important" onchange="return validationSingle(this)"/>
					</div>
					<div class="form-group form-float">
						<span>Upload Single 3</span>
                        <input name="file[]" class="file_single" id="file_single3" type="file" multiple style="margin-top:10px!important" onchange="return validationSingle(this)"/>
					</div>
					<div class="form-group form-float">
						<span>Upload Single 4</span>
                        <input name="file[]" class="file_single" id="file_single4" type="file" multiple style="margin-top:10px!important" onchange="return validationSingle(this)"/>
					</div>
					<div class="form-group form-float">
						<span>Upload Single 5</span>
                        <input name="file[]" class="file_single" id="file_single5" type="file" multiple style="margin-top:10px!important" onchange="return validationSingle(this)"/>
					</div>
					<div class="form-group form-float">
						<span>Upload Proof of Payment</span>
                        <input name="proof_payment" id="proof_payment" type="file" multiple style="margin-top:10px!important" onchange="return fileValidationPayment()"><br>

						<div id="preview_proof_payment">
							<img class="img-thumbnail" width="200px" height="200px" src="<?php echo base_url(); ?>/assets/admin/images/tidak-ada.png" alt="your image" />
						</div>
					</div>
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
