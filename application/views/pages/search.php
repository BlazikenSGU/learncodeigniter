<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="left-sidebar">
					<h2>Search</h2>
					<div class="panel-group category-products" id="accordian">
						<!--category-productsr-->
						<?php
						foreach ($category as $key => $cate) {
						?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="<?= base_url('danh-muc/' . $cate->id . '/' . $cate->slug) ?>"><?= $cate->title ?></a></h4>
								</div>
							</div>
						<?php } ?>
					</div>
					<!--/category-products-->

					<div class="brands_products">
						<!--brands_products-->
						<h2>Brands</h2>
						<div class="brands-name">
							<ul class="nav nav-pills nav-stacked">

								<?php
								foreach ($brand as $key => $bra) {
								?>
									<li><a href="<?= base_url('thuong-hieu/' . $bra->id . '/' . $bra->slug) ?>"><?= $bra->title ?></a></li>
								<?php } ?>
							</ul>
						</div>
					</div>
					<!--/brands_products-->

					<div class="price-range">
						<!--price-range-->
						<h2>Price Range</h2>
						<div class="well text-center">
							<input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2"><br />
							<b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
						</div>
					</div>
					<!--/price-range-->

					<div class="shipping text-center">
						<!--shipping-->
						<img src="images/home/shipping.jpg" alt="" />
					</div>
					<!--/shipping-->

				</div>
			</div>

			<div class="col-sm-9 padding-right">

				<div class="features_items">
					<!--features_items-->
					<h2 class="title text-center">Keyword: <?= $title ?> </h2>

					<?php
					if (!$product) {
						echo '<span class="text text-danger">Khong tim thay san pham !</span>';
					} else {

						foreach ($product as $key => $pro) { ?>
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

					<?php }
					} ?>

				</div>
				<!--features_items-->



			</div>
		</div>
	</div>
</section>