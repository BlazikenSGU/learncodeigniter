<section>
	<div class="container">
		<div class="row">
			<?php $this->load->view('pages/template/sidebar'); ?>

			<div class="col-sm-9 padding-right">
				<div class="features_items">
					<!--features_items-->
					<h2 class="title text-center"><?= $title ?></h2>

					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label for="exampleFormControlSelect1">Kiểu Lọc</label>

								<select class="form-control select-filter" id="select-filter">
									<option value="0">-- Loc theo --</option>
									<option value="?kytu=asc">Ky tu A-Z</option>
									<option value="?kytu=desc">Ky tu Z-A</option>
									<option value="?gia=asc">Gia tang dan</option>
									<option value="?gia=desc">Gia giam dan</option>

								</select>
							</div>
						</div>

						<!-- <div class="col-md-7">

						</div> -->
						<div class="col-md-7">
							<form method="GET">
							<p>
								<label for="amount">Khoảng giá:</label>
								<input type="text" id="amount" readonly="" style="border:0; color:#f6931f; font-weight:bold;">
							</p>

							<div id="slider-range"></div>
							<input type="hidden" class="price_from" name="from">
							<input type="hidden" class="price_to" name="to">
							<input type="submit" value="Loc gia" class="btn btn-primary filter-price">
							</form>
						</div>
						
					</div>

					<?php foreach ($allproductbycate_pagination as $key => $pro) { ?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<form action="<?= base_url('add-to-cart') ?>" method="POST">
										<div class="productinfo text-center">
											<input type="hidden" value="<?= $pro->id ?>" name="product_id">
											<input type="hidden" value="1" name="quantity">
											<img src="<?= base_url('uploads/product/' . $pro->image) ?>" alt="<?= $pro->title ?>" />
											<h2><?= number_format($pro->price, 0, ',', '.') ?> vnd</h2>
											<p><?= $pro->title ?></p>
											<a href="<?= base_url('san-pham/' . $pro->id . '/' . $pro->slug) ?>" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>Details</a>
											<button type="submit" class="btn btn-fefault cart">
												<i class="fa fa-shopping-cart"></i>
												Add to cart
											</button>
										</div>
									</form>
								</div>
								<div class="choose">

								</div>
							</div>
						</div>

					<?php } ?>

				</div>
				<!--features_items-->
				<?= $links ?>


			</div>
		</div>
	</div>
</section>