<div class="block-header">
	<h2>
		Withdraw List
	</h2>
</div>

<!-- Basic Examples -->
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="body">
				<div class="table-responsive">
					<table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>User</th>
								<th>Amount</th>
								<th>Date Requested</th>
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

<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="defaultModalLabel">Preview Attachment</h4>
			</div>
			<div class="modal-body">
				<img class="img-thumbnail" src="" alt="" id="imageholder" />
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
			</div>
		</div>
	</div>
</div>

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
            "url": "<?php echo site_url('Admin_withdraw/ajax_list') ?>",
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

<script>
	$('#defaultModal').on('show.bs.modal', function(event) {
		var domainWithProtocol = window.location.origin;
		let image = $(event.relatedTarget).data('image');
		
		var pathImage = domainWithProtocol + '/barracuda/upload/withdraw_attachment/' + image
		console.log(pathImage);

		 // image holder
		 var imageholder = document.getElementById('imageholder')
            imageholder.style.width = '100%';
            imageholder.src = pathImage;
            imageholder.alt = "Image";
	});
</script>

