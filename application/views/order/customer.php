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
									<h3>All Customer</h3>
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
											<div class="text-tiny">All Customer</div>
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

									</div>
									<div class="table-responsive">
										<table class="table table-striped table-bordered">
											<thead>
												<tr>
													<th>#</th>
											
													<th style="padding-bottom: .5rem;">Name</th>
													<th >Email</th>
													<th>Phone</th>
													<th>Address</th>
													<th>Date</th>
													<th>Status</th>

												</tr>
											</thead>
											<tbody>
												<?php
												foreach ($customer as $key => $bra) {
												?>
													<tr>
														<td><?= $key ?></td>
														
														<td>
															<?= $bra->name ?>
														</td>
														<td>
															<?= $bra->email ?>
														</td>

														<td>
															+84 <?= $bra->phone ?>
														</td>
														<td>
															<?= $bra->address ?>
														</td>
														<td>
															<?= $bra->date_create ?>
														</td>
														<td>
															<?php
															if ($bra->status == 1) {
																echo 'Active';
															} else {
																echo '<span style="color:red";> Inactive </span>';
															}
															?>
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