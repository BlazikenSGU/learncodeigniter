<div class="container">

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="#">Admin CMS <span class="sr-only">(current)</span></a>
				</li>

				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
						Brand
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="<?php echo base_url('brand/create'); ?>">Create</a>
						<a class="dropdown-item" href="<?php echo base_url('brand/list'); ?>">List</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
						Category
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="<?php echo base_url('category/create'); ?>">Create</a>
						<a class="dropdown-item" href="<?php echo base_url('category/list'); ?>">List</a>
					</div>
				</li>

				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
						Product
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="<?php echo base_url('product/create'); ?>">Create</a>
						<a class="dropdown-item" href="<?php echo base_url('product/list'); ?>">List</a>
					</div>
				</li>

				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
						Orders
					</a>
					<div class="dropdown-menu">

						<a class="dropdown-item" href="<?php echo base_url('order/list'); ?>">List</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
						Slider
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="<?php echo base_url('slider/create'); ?>">Create</a>
						<a class="dropdown-item" href="<?php echo base_url('slider/list'); ?>">List</a>
					</div>
				</li>

				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
						Blog
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="<?php echo base_url('blog/create'); ?>">Create</a>
						<a class="dropdown-item" href="<?php echo base_url('blog/list'); ?>">List</a>
					</div>
				</li>

				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
						<?php echo $this->session->userdata('LoggedIn')['username'] ?>
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="<?php echo base_url('logout'); ?>">Logout</a>

					</div>
				</li>

			</ul>

		</div>
	</nav>
</div>
