<div class="block-header">
	<h2>
		Add Single
	</h2>
</div>
<div class="alert alert-success">
Upload price per single IDR 50000
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
							<input type="hidden" class="form-control" name="title_copy" id="title_copy">
							<input type="text" class="form-control" name="title" id="title" required>
						</div>
						<span id="title_result" style='color: red; font-size: 14px;'></span>
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
							<!-- <input type="text" class="form-control" name="language" > -->
							<select name="language" id="language" class="form-control show-tick" required>
								<option value="Bahasa Indonesia">Bahasa Indonesia</option>
								<option value="English">English</option>
								<option value="Jawa">Jawa</option>
							</select>
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
							<input type="text" class="form-control" name="yt_link" placeholder="Ex: https://www.youtube.com/channel/UCUZHFZ9jIKrLroW8LcyJEQQ" >
						</div>
					</div>

					<!-- <div class="form-group form-float">
						<label class="form-label">Start Priview Tiktok <sup>(Optional)</sup></label>
						<div class="form-line">
							<input type="text" class="form-control" name="start_preview_tiktok" placeholder="Please fill in the start preview seconds format for tiktok (if not filled in it will be default, tiktok duration is 1 minute)" >
						</div>
					</div> -->

					<div class="form-group form-float">
						<label class="form-label">Whatsapp Number*</label>
						<div class="form-line">
							<input type="text" class="form-control" name="contact_person" placeholder="+62 857xxx" onkeypress="return hanyaAngka(event)" required>
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
						<span>Upload File Music* (The file name must match the title)</span>
                        <!-- <input name="file" id="file" type="file" onchange="return validationSingle(this)" multiple /> -->
						<input type="hidden" name="order_id" id="order_id" class="mb-4"><br>
						<input type="hidden" name="file_name" id="file_name" class="mb-4"><br>

						<div id="list"></div>
						<input type="button" id="pick" value="Upload">
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
					<!-- <a href="<?= site_url('user/single') ?>" class="btn btn-warning waves-effect">Cancel</a> -->
					<a href="#" class="btn btn-warning waves-effect back">Cancel</a>
				</form>
					
			</div>
		</div>
	</div>
</div>
<!-- #END# Basic Validation -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/plupload/3.1.5/plupload.full.min.js"></script>
<script>

$(document).ready(function () {
	let title = $('#title').val();
	if (title == '') {
		document.getElementById("pick").disabled = true;
	}else{
		document.getElementById("pick").disabled = false;
	}
});

// cek title
$('#title').change(function () {
	$.ajax({
		type: "POST",
		url: "<?php echo base_url('Single/checkTitle');?>",
		data: $(this).serialize(),
		success: function (data) {
			var result = jQuery.parseJSON(data);
			console.log(result);
			if (result.status == 'exists') {
				$('#title_result').html('Title is exist, please use other title.');
				document.getElementById("pick").disabled = true;
				$('#title_copy').val('exists');
			}else{
				$('#title_result').hide();
				document.getElementById("pick").disabled = false;
				$('#title_copy').val('notexists');
			}
		}
	});
});

// (C) INITIALIZE UPLOADER
window.onload = () => {
  // (C1) GET HTML FILE LIST
  var list = document.getElementById("list");
 
  // (C2) INIT PLUPLOAD
  var uploader = new plupload.Uploader({
    runtimes: "html5",
    browse_button: "pick",
    url: "<?php echo base_url('Single/test'); ?>",
    chunk_size: "10mb",
    init: {
		BeforeUpload: function(up, file) {
		// filter tipe file yang boleh diupload
		var allowedTypes = ["audio/wav", "audio/x-wav", "audio/wave", "audio/x-pn-wav"];
		var title = $('#title').val();
		var fileName = file.name;
		var newFileName = fileName.split(".")[0];
		if (allowedTypes.indexOf(file.type) === -1) {
			// jika tipe file tidak sesuai, hentikan proses upload
			toastr.error('File format must be .wav only.', 'Warning', {
				timeOut: 5000
			}, toastr.options = {
				"closeButton": true
			});
			return false;
		}

		if (newFileName != title) {
			// jika tipe file tidak sesuai, hentikan proses upload
			toastr.error('File name must be same with title.', 'Warning', {
				timeOut: 5000
			}, toastr.options = {
				"closeButton": true
			});
			return false;
		}

		if (file.size > 10 * 1024 * 1024) {
			toastr.error('Maximum file size 100Mb.', 'Warning', {
				timeOut: 5000
			}, toastr.options = {
				"closeButton": true
			});
			return false;
		}
		// jika tipe file sesuai, lanjutkan proses upload
		return true;
		},
      PostInit: () => list.innerHTML = "<div>Ready</div>",
      FilesAdded: (up, files) => {
		var allowedTypes = ["audio/wav", "audio/x-wav", "audio/wave", "audio/x-pn-wav"];
		var title = $('#title').val();
		plupload.each(files, file => {
			var fileName = file.name;
			var newFileName = fileName.split(".")[0];

			if (!(allowedTypes.indexOf(file.type) === -1) && (file.size < 10 * 1024 * 1024) && (newFileName == title)) {
			  let row = document.createElement("div");
			  row.id = file.id;
			  row.innerHTML = `${file.name} (${plupload.formatSize(file.size)}) <strong></strong>`;
			  list.appendChild(row);
			}
			});
			uploader.start();
      },
      UploadProgress: (up, file) => {
		var allowedTypes = ["audio/wav", "audio/x-wav", "audio/wave", "audio/x-pn-wav"];
		var title = $('#title').val();
		var fileName = file.name;
		var newFileName = fileName.split(".")[0];
		if (!(allowedTypes.indexOf(file.type) === -1) && (file.size < 10 * 1024 * 1024) && (newFileName == title)) {
        document.querySelector(`#${file.id} strong`).innerHTML = `${file.percent}%`;
		}
      },
	  FileUploaded: function(up, file, response) {
		$('#file_name').val(file.name);
		var responseObj = JSON.parse(response.response);
		var order_id = responseObj.order_id;
		// mengisi nilai input dengan response dari server
		document.getElementById("order_id").value = order_id;
	  },
      Error: (up, err) => console.error(err)
    }
  });
  uploader.init();
};
</script>

<script type="text/javascript">
	function hanyaAngka(evt) {
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))

		return false;
		return true;
	}

	function fileValidation() {
		var fileInput = document.getElementById('cover');
		var filePath = fileInput.value;
		var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
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

$('#form_validation').submit(function(e) {
	let title_copy = $('#title_copy').val();
	let file_name = $('#file_name').val();

	if (file_name == '') {
		Swal.fire({
			title: "Failed!",
			text: "You must be upload music file single!",
			icon: "error",
			button: "Ok",
			dangerMode: true,
		});
		return false;
	}

	if (title_copy == 'exists') {
		Swal.fire({
			title: "Failed!",
			text: "The single title has already been used. Use another title!",
			icon: "error",
			button: "Ok",
			dangerMode: true,
		});
		return false;
	}else{
		var data = $(this).serialize();
	
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
	}
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

$(document).on("click", ".back", function() {
    var order_id = $('#order_id').val();
    var file_name = $('#file_name').val();
    Swal.fire({
        title: 'Cancel single uploads?',
        text: "If you cancel a single upload, the changes will not be saved.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                method: "POST",
                url: "<?php echo base_url('Single/cancelUpload'); ?>",
                data: {
					"order_id": order_id,	
					"file_name": file_name
				},
                success: function(data) {
					var link = '<?php echo base_url("single") ?>';
        			window.location.replace(link);
                }
            });
        }
    })
});
</script>
