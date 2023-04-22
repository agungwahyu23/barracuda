<div class="block-header">
	<h2>DASHBOARD</h2>
</div>

<!-- Widgets -->
<div class="row clearfix">
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
		<div class="info-box bg-pink hover-expand-effect">
			<div class="icon">
				<i class="material-icons">music_note</i>
			</div>
			<div class="content">
				<div class="text">TOTAL SINGLE</div>
				<div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?= $single->result ?></div>
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
		<div class="info-box bg-cyan hover-expand-effect">
			<div class="icon">
				<i class="material-icons">library_music</i>
			</div>
			<div class="content">
				<div class="text">TOTAL ALBUM</div>
				<div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"><?= $single->result ?></div>
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
		<div class="info-box bg-light-green hover-expand-effect">
			<div class="icon">
				<i class="material-icons">attach_money</i>
			</div>
			<div class="content">
				<div class="text">TOTAL INCOME</div>
				<div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"><?= format_rupiah($income->result) ?></div>
			</div>
		</div>
	</div>
</div>
<!-- #END# Widgets -->
