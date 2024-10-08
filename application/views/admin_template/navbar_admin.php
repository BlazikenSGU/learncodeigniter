<div class="section-menu-left">
	<div class="box-logo">
		<a href="#" id="site-logo-inner">
			<img class="" id="logo_header" alt="" src="<?= base_url()?>link/images/icons/logo-01.png" data-light="frontend/admin/images/logo/logo.png" data-dark="frontend/admin/images/logo/logo.png">
		</a>
		<div class="button-show-hide">
			<i class="icon-menu-left"></i>
		</div>
	</div>

	<div class="center">
		<div class="center-item">
			<div class="center-heading">Main Home</div>
			<ul class="menu-list">
				<li class="menu-item">
					<a href="<?php echo base_url('dashboard'); ?>" class="">
						<div class="icon"><i class="icon-grid"></i></div>
						<div class="text">Dashboard</div>
					</a>
				</li>
			</ul>
		</div>
		<div class="center-item">
			<ul class="menu-list">
				<li class="menu-item has-children">
					<a href="javascript:void(0);" class="menu-item-button">
						<div class="icon"><i class="icon-shopping-cart"></i></div>
						<div class="text">Products</div>
					</a>
					<ul class="sub-menu">
						<li class="sub-menu-item">
							<a href="<?php echo base_url('product/create'); ?>" class="">
								<div class="text">Add Product</div>
							</a>
						</li>
						<li class="sub-menu-item">
							<a href="<?php echo base_url('product/list'); ?>" class="">
								<div class="text">Products</div>
							</a>
						</li>
					</ul>
				</li>
				<li class="menu-item has-children">
					<a href="javascript:void(0);" class="menu-item-button">
						<div class="icon"><i class="icon-layers"></i></div>
						<div class="text">Brand</div>
					</a>
					<ul class="sub-menu">
						<li class="sub-menu-item">
							<a href="<?php echo base_url('brand/create'); ?>" class="">
								<div class="text">New Brand</div>
							</a>
						</li>
						<li class="sub-menu-item">
							<a href="<?php echo base_url('brand/list'); ?>" class="">
								<div class="text">Brands</div>
							</a>
						</li>
					</ul>
				</li>
				<li class="menu-item has-children">
					<a href="javascript:void(0);" class="menu-item-button">
						<div class="icon"><i class="icon-layers"></i></div>
						<div class="text">Category</div>
					</a>
					<ul class="sub-menu">
						<li class="sub-menu-item">
							<a href="<?php echo base_url('category/create'); ?>" class="">
								<div class="text">New Category</div>
							</a>
						</li>
						<li class="sub-menu-item">
							<a href="<?php echo base_url('category/list'); ?>" class="">
								<div class="text">Categories</div>
							</a>
						</li>
					</ul>
				</li>

				<!-- <li class="menu-item has-children">
					<a href="javascript:void(0);" class="menu-item-button">
						<div class="icon"><i class="icon-file-plus"></i></div>
						<div class="text">Order</div>
					</a>
					<ul class="sub-menu">
						<li class="sub-menu-item">
							<a href="#" class="">
								<div class="text">Orders</div>
							</a>
						</li>
						<li class="sub-menu-item">
							<a href="#" class="">
								<div class="text">Order tracking</div>
							</a>
						</li>
					</ul>
				</li> -->
				<li class="menu-item has-children">
					<a href="javascript:void(0);" class="menu-item-button">
						<div class="icon"><i class="icon-image"></i></div>
						<div class="text">Slider</div>
					</a>
					<ul class="sub-menu">
						<li class="sub-menu-item">
							<a href="<?php echo base_url('slider/create'); ?>" class="">
								<div class="text">New Slider</div>
							</a>
						</li>
						<li class="sub-menu-item">
							<a href="<?php echo base_url('slider/list'); ?>" class="">
								<div class="text">Slider</div>
							</a>
						</li>
					</ul>
				</li>
				<li class="menu-item has-children">
					<a href="javascript:void(0);" class="menu-item-button">
						<div class="icon"><i class="icon-layers"></i></div>
						<div class="text">Blog</div>
					</a>
					<ul class="sub-menu">
						<li class="sub-menu-item">
							<a href="<?php echo base_url('blog/create'); ?>" class="">
								<div class="text">New Blog</div>
							</a>
						</li>
						<li class="sub-menu-item">
							<a href="<?php echo base_url('blog/list'); ?>" class="">
								<div class="text">Blog</div>
							</a>
						</li>
					</ul>
				</li>
				<li class="menu-item has-children">
					<a href="javascript:void(0);" class="menu-item-button">
						<div class="icon"><i class="icon-layers"></i></div>
						<div class="text">Post</div>
					</a>
					<ul class="sub-menu">
						<li class="sub-menu-item">
							<a href="<?php echo base_url('post/create'); ?>" class="">
								<div class="text">New Post</div>
							</a>
						</li>
						<li class="sub-menu-item">
							<a href="<?php echo base_url('post/list'); ?>" class="">
								<div class="text">Post</div>
							</a>
						</li>
					</ul>
				</li>


				<li class="menu-item">
					<a href="<?php echo base_url('order/list'); ?>" class="">
						<div class="icon"><i class="icon-file-plus"></i></div>
						<div class="text">Order</div>
					</a>
				</li>



				<li class="menu-item has-children">
					<a href="javascript:void(0);" class="menu-item-button">
						<div class="icon"><i class="icon-user"></i></div>
						<div class="text">User</div>
					</a>
					<ul class="sub-menu">
						<li class="sub-menu-item">
							<a href="<?php echo base_url('user/admin'); ?>" class="">
								<div class="text">Admin</div>
							</a>
						</li>
						<li class="sub-menu-item">
							<a href="<?php echo base_url('user/customer'); ?>" class="">
								<div class="text">User order</div>
							</a>
						</li>
					</ul>
				</li>

				<li class="menu-item">
					<a href="<?php echo base_url('logout'); ?>" class="">
						<div class="icon"><i class="icon-settings"></i></div>
						<div class="text">(<?php echo $this->session->userdata('LoggedIn')['username'] ?>) - Log out</div>
					</a>
				</li>

			</ul>

		</div>
	</div>



</div>
