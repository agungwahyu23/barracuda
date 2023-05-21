<div class="block-header">
	<h2>
		Add Request Withdraw
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
						<label class="form-label">Input Amount</label>
						<div class="form-line">
							<input type="hidden" class="form-control" name="total_amount" id="total_amount" value="<?= $user->total_income ?>">
							<input type="text" class="form-control" name="amount_copy" id="amount" placeholder="0">
							<input type="hidden" class="form-control" name="amount" id="amount_copy">
						</div>
					</div>
					<button class="btn btn-primary waves-effect" type="submit">Submit</button>
					<a href="<?= site_url('user/withdraw') ?>" class="btn btn-warning waves-effect">Cancel</a>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- #END# Basic Validation -->

<script type="text/javascript">
	var rupiah = document.getElementById('amount');
	var amount_copy = document.getElementById("amount_copy");
	rupiah.addEventListener('keyup', function(e){
		// tambahkan 'Rp.' pada saat form di ketik
		// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
		// rupiah.value = formatRupiah(this.value, 'Rp. ');
		// amount_copy.value = rupiah.value.replace(/\D/g,'');
		rupiah.value = this.value;
		amount_copy.value = rupiah.value.replace(/\D/g,'');
	});

	/* Fungsi formatRupiah */
	function formatRupiah(angka, prefix){
		var number_string = angka.replace(/[^,\d]/g, '').toString(),
		split   		= number_string.split(','),
		sisa     		= split[0].length % 3,
		rupiah     		= split[0].substr(0, sisa),
		ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

		// tambahkan titik jika yang di input sudah menjadi angka ribuan
		if(ribuan){
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}

		rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
		return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
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
	// cek apakah input > total amount
	var amount = $('#amount_copy').val();
	var total = $('#total_amount').val();

	if (total == '') {
		total = 0;
	}

	if (parseFloat(amount) > parseFloat(total)) {
		Swal.fire({
			title: "Failed!",
			text: "the withdrawal amount cannot be greater than the income!",
			icon: "error",
			button: "Ok",
			dangerMode: true,
		});
		return false;
	}

    var data = $(this).serialize();
    // var data = new FormData($(this)[0]);
    $.ajax({
            // method: 'POST',
            beforeSend: function() {
                showLoading();
                $(".loading2").modal('show');
            },
            url: '<?php echo base_url('Withdraw/prosesAdd'); ?>',
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
        title: "Data berhasil disimpan!",
        text: "Klik Ok untuk melanjutkan!",
        icon: "success",
        button: "Ok",
    }).then(function() {
        var link = '<?php echo base_url("withdraw") ?>';
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
