<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- card untuk tambah data -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
					<div class="row">
						<div class="col-md-6"></div>
						<div class="col-md-6 text-right">
							<a href="javascript:history.go(-1)" class="btn btn-danger justify-content-end" type="submit" name="submit"><i
											class="fas fa-chevron-left"></i> Back
									</a>
						</div>
					</div>
                    <form id="form-detail" method="POST" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" name="id" id="id" value="<?= $item->id ?>">
						<div class="form-group">
                            <label for="code">Code</label>
                            <input type="text" class="form-control" name="code" id="code" value="<?= $item->code ?>" autocomplete="off" readonly
                                placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" autocomplete="off"
                                placeholder="Enter Item Name" value="<?= $item->name ?>" readonly>
                        </div>
                        <div class=" form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" name="price" id="price" autocomplete="off"
                                placeholder="Enter Item Price" value="<?= $item->price ?>" readonly>
                        </div>
                        <div class=" form-group">
                            <label for="stock">Stock</label>
                            <input type="text" class="form-control" name="stock" id="stock" autocomplete="off"
                                placeholder="Enter Item Stock" value="<?= $item->stock ?>" readonly>
                        </div>
                        <div class=" form-group">
                            <label for="unit">Unit</label>
                            <input type="text" class="form-control" name="unit" id="unit" autocomplete="off"
                                placeholder="Enter Unit Item" value="<?= $item->unit ?>" readonly>
                        </div>
                        <div class=" form-group">
                            <label for="warehouse_id">Warehouse</label>
                            <input type="text" class="form-control" name="warehouse_id" id="warehouse_id" autocomplete="off"
                                placeholder="Enter warehouse" value="<?= $item->warehouse_id ?>" readonly>
                        </div>
                    </form>
					<div class="row mt-4">
						<div class="col-md-12">
						<h4>Detail Material For Item <?= $item->name ?></h4>
						<hr>
						<div class="table-responsive">
							<table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No</th>
										<th>Code</th>
										<th>Name</th>
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
        </div>
    </div>
    <!-- akhir card -->
</div>
<!-- /.container-fluid -->

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
            "url": "<?php echo base_url('list-item-material/').$id ?>",
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

// untuk simpan data
$('#form-add').submit(function(e) {
    var data = $(this).serialize();
    $.ajax({
            beforeSend: function() {
                $(".loading2").show();
                $(".loading2").modal('show');
            },
            url: '<?php echo base_url('Item/prosesAddMaterial'); ?>',
            type: "post",
            enctype: "multipart/form-data",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
        })
        .done(function(data) {
            var result = jQuery.parseJSON(data);
            console.log(result);
            if (result.status == 'berhasil') {
                document.getElementById("form-add").reset();
                Swal.fire({
					title: "Data saved successfully!",
					text: "Click the Ok button to continue!",
					icon: "success",
					button: "Ok",
				}).then(function() {
					reload_table();
				});
            } else {
                $(".loading2").hide();
                $(".loading2").modal('hide');
                gagal();

            }
        })
    e.preventDefault();
});

$(document).on("click", ".hapus-detail", function() {
    var id = $(this).attr("data-id");
    Swal.fire({
        title: 'Delete data?',
        text: "Sure you will delete the data?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Delete'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                method: "POST",
                url: "<?php echo base_url('Item/delete_detail'); ?>",
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
        title: "Deleted data successfully!",
        text: "Click the Ok button to continue!",
        icon: "success",
        button: "Ok",
    })
}
</script>
