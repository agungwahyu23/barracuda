<aside id="leftsidebar" class="sidebar">
	<!-- User Info -->
	<div class="user-info">
		<div class="image">
			<img src="<?= base_url() ?>assets/admin/images/user.png" width="48" height="48" alt="User" />
		</div>
		<div class="info-container">
			<div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">John Doe</div>
			<div class="email">john.doe@example.com</div>
			<div class="btn-group user-helper-dropdown">
				<i class="material-icons" data-toggle="dropdown" aria-haspopup="true"
					aria-expanded="true">keyboard_arrow_down</i>
				<ul class="dropdown-menu pull-right">
					<li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
					<li role="seperator" class="divider"></li>
					<li><a href="<?= base_url('Login/logout') ?>"><i class="material-icons">input</i>Sign Out</a></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- #User Info -->
	<!-- Menu -->
	<div class="menu">
		<ul class="list">
			<li class="header">MAIN NAVIGATION</li>
			<li class="active">
				<a href="<?= site_url('') ?>">
					<i class="material-icons">home</i>
					<span>Home</span>
				</a>
			</li>
			<li>
				<a href="<?= site_url('user/single') ?>">
					<i class="material-icons">music_note</i>
					<span>Single</span>
				</a>
			</li>
			<li>
				<a href="<?= site_url('user/album') ?>">
					<i class="material-icons">library_music</i>
					<span>Album</span>
				</a>
			</li>
			<li>
				<a href="https://id.postermywall.com/index.php/sizes/album-cover-maker" target="_blank">
					<i class="material-icons">broken_image</i>
					<span>Buat Cover</span>
				</a>
			</li>
			<li>
				<a href="javascript:void(0);" class="menu-toggle">
					<i class="material-icons">assignment</i>
					<span>Request</span>
				</a>
				<ul class="ml-menu">
					<li>
						<a href="<?= site_url('user/takedown') ?>">Request Takedown</a>
					</li>
					<li>
						<a href="<?= site_url('user/report') ?>">Request Report</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#">
					<i class="material-icons">headset_mic</i>
					<span>Chat Admin</span>
				</a>
			</li>
		</ul>
	</div>
	<!-- #Menu -->
	<!-- Footer -->
	<div class="legal">
		<div class="copyright">
			<a href="javascript:void(0);">Tomo Yuki</a>.
		</div>
	</div>
	<!-- #Footer -->
</aside>
