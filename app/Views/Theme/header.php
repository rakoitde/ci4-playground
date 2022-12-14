<header class="header fixed-top">
	<div class="header-inner">
		<div class="container-fluid py-2">
			<div class="header-content">
				<div class="row justify-content-between align-items-center">
					<div class="col-auto">
						<a id="sidebar-toggler" class="sidebar-toggler d-inline-block d-xl-none" href="#">
							<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img">
								<title>Menu</title>
								<path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path>
							</svg>
						</a>
					</div>
					<div class="search-frame-toggler d-sm-none col">
						<i class="search-frame-toggler-icon bi bi-search"></i>
					</div>
					<div class="search-frame col">
						<form class="search-form">
							<input type="text" placeholder="Search..." name="search" class="form-control search-input">
							<button type="submit" class="btn btn-primary search-btn" value="Search"><i class="bi bi-search"></i></button>
						</form>
					</div>
					<?= $this->include($layoutpath . 'toolbar', $this->data) ?>
				</div>
			</div>
		</div>
	</div>
	<?= $this->include($layoutpath . 'sidebar', $this->data) ?>
</header>