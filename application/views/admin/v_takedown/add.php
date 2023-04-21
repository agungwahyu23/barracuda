<div class="block-header">
	<h2>
		Add Request Takedown
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
						<label class="form-label">Email*</label>
						<div class="form-line">
							<input type="text" class="form-control" name="email" required>
						</div>
					</div>
					<div class="form-group form-float">
						<label class="form-label">Choose Your Takedown Type</label>
						<div class="form-line">
							<select name="take_down_type" id="take_down_type" class="form-control select2 show-tick">
								<option value="">--Choose Type--</option>
								<option value="album">Album</option>
								<option value="single">Single</option>
							</select>
						</div>
					</div>
					<div class="form-group form-float">
						<label class="form-label">Choose Album/Single</label>
						<div class="form-line">
							<select name="single" id="single" class="form-control select2 show-tick">
								<option value="">Choose single</option>
							</select>
						</div>
					</div>
					<button class="btn btn-primary waves-effect" type="submit">Kirim</button>
					<a href="<?= site_url('user/takedown') ?>" class="btn btn-primary waves-effect">Batal</a>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- #END# Basic Validation -->

<script type="text/javascript">
	$(document).ready(function(){
		$('#take_down_type').change(function(){ 
			var id=$(this).val();
			$.ajax({
				url : "<?= site_url(); ?>Takedown/get_pilihan/",
				method : "POST",
				data: {
					id: id
				},
				dataType : 'json',
				success: function(data){
					var html = '';
					var i;
					for(i=0; i<data.length; i++){
						html += '<option value='+data[i].id+'>'+data[i].title+'</option>';
					}
					$('#single').html(html);
				}
			});
		});
	});
</script>

<script type="text/javascript">
$('.date-own').datepicker({
	format: "yyyy-m-d",
	autoclose: true //to close picker once year is selected
});

$('#form_add').submit(function(e) {
    var data = $(this).serialize();
    // var data = new FormData($(this)[0]);
    $.ajax({
            // method: 'POST',
            beforeSend: function() {
                $(".loading2").show();
                $(".loading2").modal('show');
            },
            url: '<?php echo base_url('Takedown/prosesAdd'); ?>',
            type: "post",
            enctype: "multipart/form-data",
            // data: data,
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
        })
        .done(function(data) {
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
        title: "Data berhasil disimpan!",
        text: "Klik Ok untuk melanjutkan!",
        icon: "success",
        button: "Ok",
    }).then(function() {
        var link = '<?php echo base_url("takedown") ?>';
        window.location.replace(link);
    });
}

function gagal() {
    Swal.fire({
        title: "Data gagal disimpan!",
        text: "Klik Ok untuk melanjutkan!",
        icon: "danger",
        button: "Ok",
        dangerMode: true,
    });
}
</script>
