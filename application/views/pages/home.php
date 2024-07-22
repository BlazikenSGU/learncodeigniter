<section>
	<div class="container">
		<div class="row">

			<?php $this->load->view('pages/template/sidebar'); ?>

			<div class="col-sm-9 padding-right">
				<div class="features_items">
					<!--features_items-->
					<h2 class="title text-center">Features Items</h2>

					<?php foreach ($allproduct_pagination as $key => $pro) { ?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">

									<form action="<?= base_url('add-to-cart') ?>" method="POST">

										<div class="productinfo text-center">
											<input type="hidden" value="<?= $pro->id ?>" name="product_id">
											<input type="hidden" value="1" name="quantity">
											<img src="<?= base_url('uploads/product/' . $pro->image) ?>" alt="" />
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
									<!-- <ul class="nav nav-pills nav-justified">
									<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
									<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
								</ul> -->
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
