<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('link/images/bg-02.jpg');">
	<h2 class="ltext-105 cl0 txt-center">
		Blog
	</h2>
</section>


<!-- Content page -->
<section class="bg0 p-t-62 p-b-60">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-lg-9 p-b-80">
				<div class="p-r-45 p-r-0-lg">
					<!-- item blog -->
					<?php foreach ($post as $key => $value) { ?>
						<div class="p-b-63">
							<a href="<?= base_url('blog-detail/' . $value->id . '/' . $value->slug) ?>" class="hov-img0 how-pos5-parent">
								<img style="width: 300px;" src="<?= base_url('uploads/post/' . $value->image) ?>" alt="IMG-BLOG">
							</a>

							<div class="p-t-32">
								<h4 class="p-b-15">
									<a style="font-family: Poppins-Medium;" href="<?= base_url('blog-detail/' . $value->id . '/' . $value->slug) ?>" class="ltext-108 cl2 hov-cl1 trans-04">
										<?= $value->title ?>
									</a>
								</h4>

								<p class="stext-117 cl6">
									<?= $value->short_content ?>

								<div class="flex-w flex-sb-m p-t-18">
									<span class="flex-w flex-m stext-111 cl2 p-r-30 m-tb-10">
										<span>
											<span class="cl4">By</span> Admin
											<span class="cl12 m-l-4 m-r-6">|</span>
										</span>

										<span>
											<?= $value->date_created ?>
											<span class="cl12 m-l-4 m-r-6">|</span>
										</span>

										<span>
											<?php foreach ($blog as $key => $value2) {
												if ($value->blog_id == $value2->id) {
													echo $value2->title;
												}
											} ?>
											<span class="cl12 m-l-4 m-r-6">|</span>
										</span>
									</span>

									<a style="color: red" href="<?= base_url('blog-detail/' . $value->id . '/' . $value->slug) ?>" class="stext-101 cl2 hov-cl1 trans-04 m-tb-10">
										Xem chi tiết

										<i class="fa fa-long-arrow-right m-l-9"></i>
									</a>
								</div>
							</div>
						</div>
					<?php } ?>
					<!-- item blog -->


					<!-- Pagination -->
					<div class="flex-l-m flex-w w-full p-t-10 m-lr--7">
						<a href="#" class="flex-c-m how-pagination1 trans-04 m-all-7 active-pagination1">
							1
						</a>

						<a href="#" class="flex-c-m how-pagination1 trans-04 m-all-7">
							2
						</a>
					</div>
				</div>
			</div>

			<div class="col-md-4 col-lg-3 p-b-80">
				<div class="side-menu">
					<div class="bor17 of-hidden pos-relative">
						<input class="stext-103 cl2 plh4 size-116 p-l-28 p-r-55" type="text" name="search" placeholder="Search">

						<button class="flex-c-m size-122 ab-t-r fs-18 cl4 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>
					</div>

					<div class="p-t-55">
						<h4 class="mtext-112 cl2 p-b-33">
							Blogs
						</h4>

						<ul>
							<?php foreach ($blog as $key => $value) { ?>
								<li class="bor18">
									<a href="#" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
										<?= $value->title ?>
									</a>
								</li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>



<!-- Footer -->
