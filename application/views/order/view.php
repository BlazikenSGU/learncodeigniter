<!-- <div class="container">
    <div class="card" style="margin-top: 1rem;">
        <h5 class="card-header">Details Order</h5>
        <div class="card-body">


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

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Order code</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Subtotal</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
					foreach ($order_details as $key => $ord) {
					?>

                        <tr>
                            <th scope="row"><?= $key ?></th>
                            <td><?= $ord->order_code ?></td>
                            <td><?= $ord->title ?></td>

                            <td>
                                <img style="max-width: 150px; max-height: 150px" src="<?php echo base_url('uploads/product/' . $ord->image) ?>" alt="">
                            </td>
                            <td><?= number_format($ord->price, 0, ',', '.'); ?> vnd</td>
                            <td><?= $ord->qty ?></td>
                            <td><?= number_format($ord->qty * $ord->price, 0, ',', '.');  ?> vnd</td>


                        </tr>
                    <?php } ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <select class="xulidonhang form-control">
                                <?php
								if ($ord->status == 1) {
								?>
                                    <option selected id="<?= $ord->order_code ?>" value="0">--- Xu li don hang ---</option>
                                    <option id="<?= $ord->order_code ?>" value="2">Dang giao hang</option>
                                    <option id="<?= $ord->order_code ?>" value="3">Huy don</option>
                                <?php
								} elseif ($ord->status == 2) {


								?>
                                    <option id="<?= $ord->order_code ?>" value="0">--- Xu li don hang ---</option>
                                    <option selected id="<?= $ord->order_code ?>" value="2">Dang giao hang</option>
                                    <option id="<?= $ord->order_code ?>" value="3">Huy don</option>
                                <?php
								} else {
								?>
                                    <option id="<?= $ord->order_code ?>" value="0">--- Xu li don hang ---</option>
                                    <option id="<?= $ord->order_code ?>" value="2">Dang giao hang</option>
                                    <option selected id="<?= $ord->order_code ?>" value="3">Huy don</option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div> -->


<!-- test  -->
<?php require_once('./application/views/admin_template/header_admin.php') ?>

<style>
	.total_money{
		color: red;
		margin: 1rem 0;
	}
	.total_money span{
		font-size: 20px;
	}
</style>

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
									<h3>Order View</h3>
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
											<div class="text-tiny">All Order</div>
										</li>

										<li>
											<i class="icon-chevron-right"></i>
										</li>
										<li>
											<div class="text-tiny">Order View</div>
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
													<th style="padding-bottom: .5rem;">Order_code</th>
													<th>Product</th>
													<th>Image</th>
													<th>price</th>
													<th>quantity</th>
													<th>subtotal</th>

												</tr>
											</thead>
											<tbody>

												<?php
												$subtotal = 0;
												$total = 0;

												foreach ($order_details as $key => $bra) {
													$subtotal = $bra->qty * $bra->price;
													$total += $subtotal;
												?>

													<tr>
														<td><?= $key ?></td>
														<td>
															<?= $bra->order_code ?>
														</td>
														<td>
															<?= $bra->title ?>
														</td>
														<td>
															<img style="max-width: 100px; max-height: 100px" src="<?php echo base_url('uploads/product/' . $bra->image) ?>" alt="">
														</td>
														<td>
															<?= number_format($bra->price, 0, ',', '.'); ?> d
														</td>

														<td>
															<?= $bra->qty ?>
														</td>

														<td>
															<?= number_format($bra->qty * $bra->price, 0, ',', '.');  ?> d
														</td>

													</tr>
												<?php } ?>

											</tbody>
										</table>

										<div class="total_money">
											<span>Tổng cộng:  <?= number_format($total) ?> vnd </span>
										</div>


										<select class="xulidonhang form-control" style="width: max-content;">
											<?php
											if ($bra->order_status == 0) {
											?>
												<option selected id="<?= $bra->order_code ?>" value="0">--- Xu li don hang ---</option>
												<option id="<?= $bra->order_code ?>" value="2">Dang giao hang</option>
												<option id="<?= $bra->order_code ?>" value="3">Huy don</option>
											<?php
											} elseif ($bra->order_status == 2) {

											?>
												<option id="<?= $bra->order_code ?>" value="0">--- Xu li don hang ---</option>
												<option selected id="<?= $bra->order_code ?>" value="2">Dang giao hang</option>
												<option id="<?= $bra->order_code ?>" value="3">Huy don</option>
											<?php
											} else {
											?>
												<option id="<?= $bra->order_code ?>" value="0">--- Xu li don hang ---</option>
												<option id="<?= $bra->order_code ?>" value="2">Dang giao hang</option>
												<option selected id="<?= $bra->order_code ?>" value="3">Huy don</option>
											<?php } ?>
										</select>
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
