<div class="block-header">
	<h2>
		Album List
	</h2>
</div>

<!-- Basic Examples -->
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>
					Data Album
				</h2>
			</div>
			<div class="body">
				<div class="table-responsive">
					<table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Nama Album</th>
								<!-- <th>Cover</th> -->
								<th>Tanggal Dibuat</th>
								<th>Genre</th>
								<th>Status</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- #END# Basic Examples -->

<script type="text/javascript">
//untuk load data table ajax	
var table;

$(document).ready(function() {

    //datatables
    table = $('#dataTable').DataTable({

        "processing": true, //Feature control the processing indicator.
        "order": [], //Initial no order.
        oLanguage: {
            sProcessing: "<img src='<?php base_url(); ?>assets/admin/img/loading.gif' width='30px'>",
            "sEmptyTable": "The data is not on the server",
            "oPaginate": {
                "sPrevious": "Prev"
            }
        },

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Admin_album/ajax_list') ?>",
            "type": "POST"

        },

        //Set column definition initialisation properties.
        "columnDefs": [{
            "targets": [-1], //last column
            "orderable": false, //set not orderable
        }, ],

    });
});


function reload_table() {
    table.ajax.reload(null, false); //reload datatable ajax 
}

$(document).on("click", ".delete-album", function() {
    var id = $(this).attr("data-id");
    Swal.fire({
        title: 'Hapus data?',
        text: "Data yang telah dihapus tidak dapat dikembalikan. Anda Yakin?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Delete'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                method: "POST",
                url: "<?php echo base_url('Album/delete'); ?>",
                data: "id=" + id,
                success: function(data) {
                    $("tr[data-id='" + id + "']").fadeOut("fast",
                        function() {
                            $(this).remove();
                        });
                    hapus_berhasil();
                    reload_table();
                }
            });
        }
    })
});

function hapus_berhasil() {
    Swal.fire({
        title: "Data berhasil dihapus!",
        text: "Klik Ok untuk melanjutkan!",
        icon: "success",
        button: "Ok",
    })
}
</script>

