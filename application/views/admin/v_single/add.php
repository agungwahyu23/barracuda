<div class="block-header">
	<h2>
		Tambah Single
	</h2>
</div>
<!-- Basic Validation -->
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>Tambah Data Single</h2>
			</div>
			<div class="body">
				<form id="form_validation" method="POST">
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" class="form-control" name="judul" required>
							<label class="form-label">Judul*</label>
						</div>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" class="form-control" name="artist" required>
							<label class="form-label">Nama Artis*</label>
						</div>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" class="form-control" name="language">
							<label class="form-label">Bahasa</label>
						</div>
					</div>
					<div class="form-group form-float">
						<label class="form-label">Genre</label>
						<div class="form-line">
							<select name="genre_id" id="genre_id" class="form-control show-tick">
								<option value="">Pop</option>
								<option value="">Rock</option>
							</select>
						</div>
					</div>
					
					<div class="form-group form-float">
						<div class="form-line">
							<textarea name="description" cols="30" rows="5" class="form-control no-resize"
								required></textarea>
							<label class="form-label">Description</label>
						</div>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" class="form-control" name="first_composer" required>
							<label class="form-label">Nama Depan Komposer*</label>
						</div>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" class="form-control" name="last_composer" required>
							<label class="form-label">Nama Belakang Komposer*</label>
						</div>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" class="form-control" name="arranger">
							<label class="form-label">Arranger</label>
						</div>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" class="form-control" name="produser">
							<label class="form-label">Produser</label>
						</div>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" class="date-own form-control" name="year_production">
							<label class="form-label">Tahun Produksi</label>
						</div>
					</div>
					<button class="btn btn-primary waves-effect" type="submit">Kirim</button>
					<a href="<?= site_url('user/single') ?>" class="btn btn-primary waves-effect">Batal</a>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- #END# Basic Validation -->

<script type="text/javascript">
$('.date-own').datepicker({
	format: "yyyy",
	viewMode: "years",
	minViewMode: "years",
	autoclose: true //to close picker once year is selected
});

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
                $(".loading2").show();
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
        title: "Data berhasil disimpan!",
        text: "Klik Ok untuk melanjutkan!",
        icon: "success",
        button: "Ok",
    }).then(function() {
        var link = '<?php echo base_url("single") ?>';
        window.location.replace(link);
    });
}

function gagal() {
    Swal.fire({
        title: "Data gagal disimpan!",
        text: "Klik Ok untuk melanjutkan!",
        type: "danger",
        button: "Ok",
        dangerMode: true,
    });
}
</script>
