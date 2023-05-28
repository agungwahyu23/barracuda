<script src="https://cdnjs.cloudflare.com/ajax/libs/plupload/3.1.5/plupload.full.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
	$('.title_single').each(function() {
		var id = $(this).data('index');
		$('#title_single'+id).change(function () {
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('Album/checkTitle');?>",
				data: {'title_single': $('#title_single'+id).val() },
				success: function (data) {
					var result = jQuery.parseJSON(data);
					console.log(result);
					if (result.status == 'exists') {
						$('#title_result'+id).html('Title is exist, please use other title.');
						document.getElementById("browse"+id).setAttribute("disabled", "disabled");
					}else{
						$('#title_result'+id).hide();
						document.getElementById("browse"+id).removeAttribute("disabled");
					}
				}
			});
		});
	});
})

// $(document).ready(function(){
	$('#upload_payment').hide();
	var param_order_id = $('#order_id').val();
	// Initialize uploader for each browse element
		$('.browse').each(function() {
			var id = $(this).data('id');
			var list = document.getElementById("filelist"+id);

			var uploader = new plupload.Uploader({
				browse_button: 'browse' + id,
				url: '<?php echo base_url('Album/test/') ?>',
				multipart_params: {
					order_id: param_order_id
				},
				chunks: true,
				chunk_size: '10mb',
				runtimes: 'html5',
				init: {
					BeforeUpload: function (up, file) {
						// filter tipe file yang boleh diupload
						var allowedTypes = ["audio/wav", "audio/x-wav", "audio/wave", "audio/x-pn-wav"];
						var title = $('#title_single'+id).val();
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
					UploadProgress: (up, file) => {
						var allowedTypes = ["audio/wav", "audio/x-wav", "audio/wave", "audio/x-pn-wav"];
						var title = $('#title_single'+id).val();
						var fileName = file.name;
						var newFileName = fileName.split(".")[0];
						if (!(allowedTypes.indexOf(file.type) === -1) && (file.size < 10 * 1024 * 1024) && (newFileName == title)) {
							document.querySelector(`#${file.id} strong`).innerHTML = `${file.percent}%`;
						}
					},
					FilesAdded: (up, files) => {
						var allowedTypes = ["audio/wav", "audio/x-wav", "audio/wave", "audio/x-pn-wav"];
						var title = $('#title_single'+id).val();
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
					FileUploaded: function (up, file, response) {
						$('#file' + id).val(file.name);
						$('#file_copy' + id).val(file.name);
					},
				}
			});

			uploader.init();
		});
// });

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

$('#first_form').submit(function(e) {
	e.preventDefault();
    var data = $(this).serialize();
    $.ajax({
            beforeSend: function() {
                showLoading();
                $(".loading2").modal('show');
            },
            url: '<?php echo base_url('Album/prosesInnerAdd'); ?>',
            type: "post",
            enctype: "multipart/form-data",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
			success: function(data) {
				hideLoading();
                var result = jQuery.parseJSON(data);
                console.log(data);

				if (result.status == 'berhasil') {
					$('#step').val(result.wizard);
					$('#order_id').val(result.order_id);

					var link = '<?php echo site_url("user/album-add/") ?>' + result.wizard+'/'+result.order_id;
        			window.location.replace(link);

				} else {
					$(".loading2").hide();
					$(".loading2").modal('hide');
					gagal();

				}
			}
        });
});

$('#second_form').submit(function(e) {
	e.preventDefault();
    var data = $(this).serialize();
    $.ajax({
            beforeSend: function() {
                showLoading();
                $(".loading2").modal('show');
            },
            url: '<?php echo base_url('Album/prosesAdd'); ?>',
            type: "post",
            enctype: "multipart/form-data",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
			success: function(data) {
				hideLoading();
                var result = jQuery.parseJSON(data);
                console.log(data);

				if (result.status == 'berhasil') {
					document.getElementById("second_form").reset();
					save_berhasil();
				} else {
					$(".loading2").hide();
					$(".loading2").modal('hide');
					gagal();

				}
			}
        });
});

$(".prev-step").click(function (e) {
	let step = $('#step').val();
	let newStep = parseInt(step) - 1;
	$('#step').val(newStep);

	if (newStep == 1) {
		$('#step2').hide();
		$('#step1').show();
		return false;
	}

	if (newStep == 2) {
		$('#step2').show();
		$('#step1').hide();
		return false;
	}
});

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
    })
	.then(function() {
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
