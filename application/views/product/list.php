<!-- test  -->
<?php require_once('./application/views/admin_template/header_admin.php') ?>

<body class="body">
	<div id="wrapper">
		<div id="page" class="">
			<div class="layout-wrap">

				<?php require_once('./application/views/admin_template/navbar_admin.php') ?>

				<div class="section-content-right">

					<div class="header-dashboard">
						<div class="wrap">
							<div class="header-left">
								<a href="index-2.html">
									<img class="" id="logo_header_mobile" alt="" src="images/logo/logo.png" data-light="images/logo/logo.png" data-dark="images/logo/logo.png" data-width="154px" data-height="52px" data-retina="images/logo/logo.png">
								</a>
								<div class="button-show-hide">
									<i class="icon-menu-left"></i>
								</div>


								<form class="form-search flex-grow">
									<fieldset class="name">
										<input type="text" placeholder="Search here..." class="show-search" name="name" tabindex="2" value="" aria-required="true" required="">
									</fieldset>
									<div class="button-submit">
										<button class="" type="submit"><i class="icon-search"></i></button>
									</div>
									<!-- <div class="box-content-search" id="box-content-search">
										<ul class="mb-24">
											<li class="mb-14">
												<div class="body-title">Top selling product</div>
											</li>
											<li class="mb-14">
												<div class="divider"></div>
											</li>
											<li>
												<ul>
													<li class="product-item gap14 mb-10">
														<div class="image no-bg">
															<img src="images/products/17.png" alt="">
														</div>
														<div class="flex items-center justify-between gap20 flex-grow">
															<div class="name">
																<a href="product-list.html" class="body-text">Dog Food
																	Rachael Ray Nutrish®</a>
															</div>
														</div>
													</li>
													<li class="mb-10">
														<div class="divider"></div>
													</li>
													<li class="product-item gap14 mb-10">
														<div class="image no-bg">
															<img src="images/products/18.png" alt="">
														</div>
														<div class="flex items-center justify-between gap20 flex-grow">
															<div class="name">
																<a href="product-list.html" class="body-text">Natural
																	Dog Food Healthy Dog Food</a>
															</div>
														</div>
													</li>
													<li class="mb-10">
														<div class="divider"></div>
													</li>
													<li class="product-item gap14">
														<div class="image no-bg">
															<img src="images/products/19.png" alt="">
														</div>
														<div class="flex items-center justify-between gap20 flex-grow">
															<div class="name">
																<a href="product-list.html" class="body-text">Freshpet
																	Healthy Dog Food and Cat</a>
															</div>
														</div>
													</li>
												</ul>
											</li>
										</ul>
										<ul class="">
											<li class="mb-14">
												<div class="body-title">Order product</div>
											</li>
											<li class="mb-14">
												<div class="divider"></div>
											</li>
											<li>
												<ul>
													<li class="product-item gap14 mb-10">
														<div class="image no-bg">
															<img src="images/products/20.png" alt="">
														</div>
														<div class="flex items-center justify-between gap20 flex-grow">
															<div class="name">
																<a href="product-list.html" class="body-text">Sojos
																	Crunchy Natural Grain Free...</a>
															</div>
														</div>
													</li>
													<li class="mb-10">
														<div class="divider"></div>
													</li>
													<li class="product-item gap14 mb-10">
														<div class="image no-bg">
															<img src="images/products/21.png" alt="">
														</div>
														<div class="flex items-center justify-between gap20 flex-grow">
															<div class="name">
																<a href="product-list.html" class="body-text">Kristin
																	Watson</a>
															</div>
														</div>
													</li>
													<li class="mb-10">
														<div class="divider"></div>
													</li>
													<li class="product-item gap14 mb-10">
														<div class="image no-bg">
															<img src="images/products/22.png" alt="">
														</div>
														<div class="flex items-center justify-between gap20 flex-grow">
															<div class="name">
																<a href="product-list.html" class="body-text">Mega
																	Pumpkin Bone</a>
															</div>
														</div>
													</li>
													<li class="mb-10">
														<div class="divider"></div>
													</li>
													<li class="product-item gap14">
														<div class="image no-bg">
															<img src="images/products/23.png" alt="">
														</div>
														<div class="flex items-center justify-between gap20 flex-grow">
															<div class="name">
																<a href="product-list.html" class="body-text">Mega
																	Pumpkin Bone</a>
															</div>
														</div>
													</li>
												</ul>
											</li>
										</ul>
									</div> -->
								</form>

							</div>
							<div class="header-grid">

							</div>
						</div>
					</div>
					<div class="main-content">

						<div class="main-content-inner">
							<div class="main-content-wrap">
								<div class="flex items-center flex-wrap justify-between gap20 mb-27">
									<h3>All Products</h3>
									<ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
										<li>
											<a href="index.html">
												<div class="text-tiny">Dashboard</div>
											</a>
										</li>
										<li>
											<i class="icon-chevron-right"></i>
										</li>
										<li>
											<div class="text-tiny">All Products</div>
										</li>
									</ul>
								</div>

								<?php
								if ($this->session->flashdata('success')) {
								?>
									<div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
								<?php
								} elseif ($this->session->flashdata('error')) {
								?>
									<div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
								<?php
								}
								?>

								<div class="wg-box">
									<div class="flex items-center justify-between gap10 flex-wrap">
										<div class="wg-filter flex-grow">
											<form class="form-search">
												<fieldset class="name">
													<input type="text" placeholder="Search here..." class="" name="name" tabindex="2" value="" aria-required="true" required="">
												</fieldset>
												<div class="button-submit">
													<button class="" type="submit"><i class="icon-search"></i></button>
												</div>
											</form>
										</div>
										<a class="tf-button style-1 w208" href="<?php echo base_url('product/create') ?>"><i class="icon-plus"></i>Add new</a>
									</div>
									<div class="table-responsive">
										<table class="table table-striped table-bordered">
											<thead>
												<tr>
													<th>#</th>
													<th style="padding-bottom: .5rem;">Title</th>
													<th>Image</th>
													<th>Quantity</th>
													<th>Price</th>
													<th>Category</th>
													<th>Brand</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
												foreach ($product as $key => $prod) {
												?>
													<tr>
														<td><?= $key ?></td>
														<td>
															<?= $prod->title ?>
														</td>
														<td>
															<img style="max-width: 100px; max-height: 100px" src="<?php echo base_url('uploads/product/' . $prod->image) ?>" alt="">
														</td>
														<td><?= $prod->quantity ?></td>
														<td><?= number_format($prod->price, 0, ',', '.') ?>đ</td>

														<td><?= $prod->tendanhmuc ?></td>
														<td><?= $prod->tenthuonghieu ?></td>
														<td>
															<?php
															if ($prod->status == 1) {
																echo 'Active';
															} else {
																echo '<span style="color:red";> Inactive </span>';
															}
															?>
														</td>
														<td>
															<div class="list-icon-function">
																<a href="<?php echo base_url('product/edit/' . $prod->id) ?>">
																	<div class="item edit">
																		<i class="icon-edit-3"></i>
																	</div>
																</a>
																<a onclick="return confirm('Are you sure?')" href="<?php echo base_url('product/delete/' . $prod->id) ?>">
																	<div class="item text-danger delete">
																		<i class="icon-trash-2"></i>
																	</div>
																</a>
															</div>

														</td>
													</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>

									<div class="divider"></div>
									<div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">

									</div>
								</div>
							</div>
						</div>

						<div class="bottom-page">
							<div class="body-text">Copyright © 2024 BlazikenSGU</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<?php require_once('./application/views/admin_template/footer_admin.php') ?>

</body>

</html>
