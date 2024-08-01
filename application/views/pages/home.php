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
								<form action="<?= base_url('add-to-cart') ?>" method="POST">
									<div class="single-products">
										<div class="productinfo text-center">
											<input type="hidden" value="<?= $pro->id ?>" name="product_id">
											<input type="hidden" min="1" value="1" name="quantity">
											<img src="<?= base_url('uploads/product/' . $pro->image) ?>" alt="" />
											<h2><?= number_format($pro->price, 0, ',', '.') ?> vnd</h2>
											<p><?= $pro->title ?></p>
											<a href="<?= base_url('san-pham/' . $pro->id . '/' . $pro->slug) ?>" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>Details</a>
											<button type="submit" class="btn btn-fefault cart">
												<i class="fa fa-shopping-cart"></i>
												Add to cart
											</button>
										</div>

									</div>
								</form>
							</div>
						</div>

					<?php } ?>

				</div>
				<!--features_items-->
				<?= $links ?>


			</div>

			<!-- show product theo danh muc -->
			<?php foreach ($item_categories as $key => $items) { ?>
				<div class="col-sm-3"></div>
				<div class="col-sm-9 padding-right">
					<div class="features_items">
						<h2 class="title text-center"><?= $key ?></h2>

						<?php foreach ($items as $pro_cate) { ?>
							<div class="col-sm-4">
								<div class="product-image-wrapper">
									<form action="<?= base_url('add-to-cart') ?>" method="POST">
										<div class="single-products">
											<div class="productinfo text-center">
												<input type="hidden" value="<?= $pro_cate['id'] ?>" name="product_id">
												<input type="hidden" min="1" value="1" name="quantity">
												<img src="<?= base_url('uploads/product/' . $pro_cate['image']) ?>" alt="" />
												<h2><?= number_format($pro_cate['price'], 0, ',', '.') ?> vnd</h2>
												<p><?= $pro_cate['title'] ?></p>
												<a href="<?= base_url('san-pham/' . $pro_cate['id'] . '/' . $pro_cate['slug']) ?>" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>Details</a>
												<button type="submit" class="btn btn-fefault cart">
													<i class="fa fa-shopping-cart"></i>
													Add to cart
												</button>
											</div>

										</div>
									</form>
								</div>
							</div>

						<?php } ?>
					</div>
				</div>
			<?php } ?>

		</div>
	</div>
</section>
