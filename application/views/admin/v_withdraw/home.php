<div class="block-header">
	<h2>
		Withdrawal List
	</h2>
</div>

<!-- Basic Examples -->
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>
					<a href="<?= site_url('user/withdraw-add') ?>" class="btn btn-primary waves-effect">+ Add Data</a>
				</h2>
			</div>
			<div class="body">
				<div class="table-responsive">
					<table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Amount</th>
								<th>Status</th>
								<th>Attachment</th>
								<th>Action</th>
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
            "url": "<?php echo site_url('Withdraw/ajax_list') ?>",
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
</script>

