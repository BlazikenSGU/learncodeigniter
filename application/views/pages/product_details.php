<section>
	<style>
		.counterW {
			margin: 0 0 0 60px;
		}

		.ratingW {
			position: relative;
			margin: 10px 0 0;
		}

		.ratingW li {
			display: inline-block;
			margin: 0px;
		}

		.ratingW li a {
			display: block;
			position: relative;
			/*margin:0 3px;  width:28px; height:27px;color:#ccc; background:url('../img/ico/icoStarOff.png') no-repeat; background-size:100%;*/
		}

		/*.ratingW li.on a {background:url('../img/ico/icoStarOn.png') no-repeat; background-size:100%;}*/

		.star {
			position: relative;
			display: inline-block;
			width: 0;
			height: 0;
			margin-left: .9em;
			margin-right: .9em;
			margin-bottom: 1.2em;
			border-right: .3em solid transparent;
			border-bottom: .7em solid #ddd;
			border-left: .3em solid transparent;
			/* Controlls the size of the stars. */
			font-size: 24px;
		}

		.star:before,
		.star:after {
			content: '';
			display: block;
			width: 0;
			height: 0;
			position: absolute;
			top: .6em;
			left: -1em;
			border-right: 1em solid transparent;
			border-bottom: .7em solid #ddd;
			border-left: 1em solid transparent;
			-webkit-transform: rotate(-35deg);
			transform: rotate(-35deg);
		}

		.star:after {
			-webkit-transform: rotate(35deg);
			transform: rotate(35deg);
		}


		.ratingW li.on .star {
			position: relative;
			display: inline-block;
			width: 0;
			height: 0;
			margin-left: .9em;
			margin-right: .9em;
			margin-bottom: 1.2em;
			border-right: .3em solid transparent;
			border-bottom: .7em solid #FC0;
			border-left: .3em solid transparent;
			/* Controlls the size of the stars. */
			font-size: 24px;
		}

		.ratingW li.on .star:before,
		.ratingW li.on .star:after {
			content: '';
			display: block;
			width: 0;
			height: 0;
			position: absolute;
			top: .6em;
			left: -1em;
			border-right: 1em solid transparent;
			border-bottom: .7em solid #FC0;
			border-left: 1em solid transparent;
			-webkit-transform: rotate(-35deg);
			transform: rotate(-35deg);
		}

		.ratingW li.on .star:after {
			-webkit-transform: rotate(35deg);
			transform: rotate(35deg);
		}
	</style>

	<div class="container">
		<div class="row">
			<?php $this->load->view('pages/template/sidebar'); ?>

			<div class="col-sm-9 padding-right">

				<?php foreach ($product_details as $key => $pro) { ?>
					<div class="product-details">
						<!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="<?= base_url('uploads/product/' . $pro->image) ?>" alt="<?= $pro->title ?>" />

							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								<!-- <div class="carousel-inner">
                                    <div class="item active">
                                        <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
                                        <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
                                        <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
                                    </div>
                                    <div class="item">
                                        <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
                                        <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
                                        <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
                                    </div>
                                    <div class="item">
                                        <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
                                        <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
                                        <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
                                    </div>

                                </div>

                                <a class="left item-control" href="#similar-product" data-slide="prev">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                                <a class="right item-control" href="#similar-product" data-slide="next">
                                    <i class="fa fa-angle-right"></i>
                                </a> -->
							</div>
						</div>

						<form action="<?= base_url('add-to-cart') ?>" method="POST">
							<div class="col-sm-7">
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
								<div class="product-information">

									<img src="images/product-details/new.jpg" class="newarrival" alt="" />
									<h2><?= $pro->title ?></h2>

									<input type="hidden" value="<?= $pro->id ?>" name="product_id">
									<img src="images/product-details/rating.png" alt="" />
									<span>
										<span><?= number_format($pro->price, 0, ',', '.') ?> vnd</span>
										<br />
										<label>Quantity: <?= $pro->quantity ?></label>
										<input type="number" min="1" value="1" name="quantity" />
										<button type="submit" class="btn btn-fefault cart">
											<i class="fa fa-shopping-cart"></i>
											Add to cart
										</button>
									</span>
									<p><b>Availability:</b> In Stock</p>
									<p><b>Condition:</b> New</p>
									<p><b>Brand:</b> <?= $pro->tenthuonghieu ?></p>
									<p><b>Category:</b> <?= $pro->tendanhmuc ?></p>
									<a href=""><img src="images/product-details/share.png" class="share img-responsive" alt="" /></a>
								</div>
								<!--/product-information-->
							</div>
						</form>
					</div>
					<!--/product-details-->
				<?php } ?>

				<div class="category-tab shop-details-tab">
					<!--category-tab-->
					<div class="col-sm-12">
						<ul class="nav nav-tabs">
							<li><a href="#details" data-toggle="tab">Details</a></li>
							<li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
							<li><a href="#tag" data-toggle="tab">Tag</a></li>
							<li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
						</ul>
					</div>
					<div class="tab-content">
						<div class="tab-pane fade" id="details">
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="images/home/gallery1.jpg" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="images/home/gallery2.jpg" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="images/home/gallery3.jpg" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="images/home/gallery4.jpg" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="tab-pane fade" id="companyprofile">
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="images/home/gallery1.jpg" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="images/home/gallery3.jpg" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="images/home/gallery2.jpg" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="images/home/gallery4.jpg" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="tab-pane fade" id="tag">
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="images/home/gallery1.jpg" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="images/home/gallery2.jpg" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="images/home/gallery3.jpg" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="images/home/gallery4.jpg" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="tab-pane fade active in" id="reviews">
							<div class="col-sm-12">

								<?php foreach ($list_comments as $key => $comment) { ?>
									<ul>
										<li><a href="#"><i class="fa fa-user"></i><?= $comment->name ?></a></li>
										<li><a href="#"><i class="fa fa-clock-o"></i><?= $comment->dated ?></a></li>

									</ul>
									<p> <?= $comment->comment ?></p>
								<?php } ?>
						

								<h6>Rating: </h6>
								<input type="hidden" class="star_rating_value">
								<p class="counterW">score: <span class="star_rating">3</span> out of <span>5</span></p>
								<ul class="ratingW">
									<li class="on"><a href="javascript:void(0);">
											<div class="star"></div>
										</a></li>
									<li class="on"><a href="javascript:void(0);">
											<div class="star"></div>
										</a></li>
									<li class="on"><a href="javascript:void(0);">
											<div class="star"></div>
										</a></li>
									<li><a href="javascript:void(0);">
											<div class="star"></div>
										</a></li>
									<li><a href="javascript:void(0);">
											<div class="star"></div>
										</a></li>
								</ul>
								
								<p><b>Write Your Review</b></p>
								<form action="#">
									<span>
										<input type="hidden" class="product_id_comment" required value="<?= $pro->id ?>" />
										<input type="text" class="name_comment" required placeholder="Name" />
										<input type="email" required class="email_comment" placeholder="Email" />
									</span>
									<textarea name="" required class="comment" placeholder="Noi dung danh gia"></textarea>
									<b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
									<button type="button" class="btn btn-default pull-right write-comment">
										Gui danh gia
									</button>
									<p id="comment_alert"></p>
								</form>
							</div>
						</div>

					</div>
				</div>
				<!--/category-tab-->

				<div class="recommended_items">
					<!--recommended_items-->
					<h2 class="title text-center">San pham khac</h2>

					<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							<?php foreach ($product_related as $key => $pro) { ?>
								<div class="item active">
									<!-- <?= $key === 0 ? 'active' : '' ?> -->
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



								</div>
							<?php } ?>

						</div>
						<a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
				</div>
				<!--/recommended_items-->

			</div>
		</div>
	</div>
</section>
