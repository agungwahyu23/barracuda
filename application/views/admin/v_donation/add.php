<div class="block-header">
	<h2>
		Add Donation
	</h2>
</div>
<!-- Basic Validation -->
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>Add Data</h2>
			</div>
			<div class="body">
				<form id="form_add" method="POST" enctype="multipart/form-data">
					<div class="form-group form-float">
						<label class="form-label">Choose Nominal</label>
						<div class="form-row">

						<input type="text" class="btn btn-outline-primary btn-lg btn-check" id="opt1" autocomplete="off" value="100000" readonly>

						<input type="text" class="btn btn-outline-primary btn-lg btn-check" id="opt2" autocomplete="off" value="200000" readonly>

						<input type="text" class="btn btn-outline-primary btn-lg btn-check" id="opt3" autocomplete="off" value="500000" readonly>

						<input type="text" class="btn btn-outline-primary btn-lg btn-check" id="opt4" autocomplete="off" value="1000000" readonly>

						<input type="text" class="btn btn-outline-primary btn-lg btn-check" id="opt5" autocomplete="off" value="Other" readonly>
						</div>
						
					</div>
					<div class="form-group form-float" id="other">
						<label class="form-label">Nominal</label>
						<div class="form-line">
							<input type="text" class="form-control" name="nominal" id="nominal">
							<input type="hidden" class="form-control" name="amount" id="amount">
						</div>
					</div>
					<div class="form-group form-float">
						<span>Upload Proof of Payment</span>
                        <input name="attachment" id="attachment" type="file" multiple style="margin-top:10px!important" onchange="return fileValidation()" required><br>

						<div id="slider">
							<img class="img-thumbnail" width="200px" height="200px" src="<?php echo base_url(); ?>/assets/admin/images/tidak-ada.png" alt="your image" />
						</div>
					</div>
					<button class="btn btn-primary waves-effect" type="submit">Submit</button>
					<a href="<?= site_url('user/donation') ?>" class="btn btn-warning waves-effect">Cancel</a>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- #END# Basic Validation -->

<script type="text/javascript">
	$(document).ready(function(){
		var selectedOption = null;
		var nominal = document.getElementById('nominal');

		$('#other').hide();

		$('#opt1').click(function() {
			$('#other').hide();
		});
		$('#opt2').click(function() {
			$('#other').hide();
		});
		$('#opt3').click(function() {
			$('#other').hide();
		});
		$('#opt4').click(function() {
			$('#other').hide();
		});

		$('#opt5').click(function() {
			$('#other').show();
		});
  
		$('.btn-check').click(function() {			
			if (!$(this).hasClass('btn-primary')) {
			$('.btn-check').removeClass('btn-primary');
			$(this).addClass('btn-primary');
			selectedOption = $(this).val();
			} else {
			$(this).removeClass('btn-primary');
			selectedOption = null;
			}
			
			$('.btn-check').attr('aria-pressed', false);
			$('.btn-check.btn-primary').attr('aria-pressed', true);

			if (selectedOption != null && selectedOption != 'Other') {
				$('#nominal').val(selectedOption);
				amount.value = selectedOption;
			}else if(selectedOption == 'Other'){
				$('#nominal').val(0);
				amount.value = 0;
				nominal.addEventListener('keyup', function(e){
					nominal.value = this.value;
					amount.value = nominal.value.replace(/\D/g,'');
				});
			}
		});
	});
</script>

<script type="text/javascript">
function fileValidation() {
	var fileInput = document.getElementById('attachment');
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
			toastr.error('Maximum file size 1 MB', 'Warning', {
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
function showLoading() {
	var loadingWrapper = document.getElementsByClassName("loading-wrapper");
	loadingWrapper[0].style.display = "block";
}

function hideLoading() {
	var loadingWrapper = document.getElementsByClassName("loading-wrapper");
	loadingWrapper[0].style.display = "none";
}

$('#form_add').submit(function(e) {
    var data = $(this).serialize();
    // var data = new FormData($(this)[0]);
    $.ajax({
            // method: 'POST',
            beforeSend: function() {
                showLoading();
                $(".loading2").modal('show');
            },
            url: '<?php echo base_url('Donation/prosesAdd'); ?>',
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
                document.getElementById("form_add").reset();
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
        var link = '<?php echo base_url("donation") ?>';
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
