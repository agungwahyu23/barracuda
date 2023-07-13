<div class="community-area wow fadeInUp section-padding">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<div class="head_title">
					<div class="space-10"></div>
					<h1>Artikel </h1>
				</div>
				<div class="space-60"></div>
			</div>
		</div>
		<div class="row">
			<?php  
			foreach ($artikels as $key => $artikel) {
			?>

			<div class="col-12 col-lg-4">
				<div class="single-blog wow fadeInUp">
					<?php if ($artikel->thumbnail == '') { ?>
						<div class="single-blog-image" style="background: url('assets/admin/images/tidak-ada.png');">
					<?php }else{ ?>
						<div class="single-blog-image" style="background: url('upload/artikel/<?=$artikel->thumbnail?>');">
					<?php } ?>
					</div>
					<div class="single-blog-text">
						<a href="<?= site_url('article/'.$artikel->slug) ?>"><?= $artikel->title ?></a>
						<div class="space-10"></div>
						<small> <i class="fa fa-clock-o"></i> <?= date_indo(date('Y-m-d', strtotime($artikel->created_at))) ?></small>
					</div>
				</div>
			</div>

			<?php } ?>
		</div>
		<?php if ($countArtikel > 3) {?>
			<div class="space-50"></div>
			<div class="blog-blog-btn text-center">
				<a href="#" class="gradient-btn">learn more</a>
			</div>
		<?php } ?>
	</div>
</div>
</div>
