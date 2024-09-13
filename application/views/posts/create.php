<!-- test -->

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
									<h3>Add Post</h3>
									<ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
										<li>
											<a href="#">
												<div class="text-tiny">Dashboard</div>
											</a>
										</li>
										<li>
											<i class="icon-chevron-right"></i>
										</li>
										<li>
											<a href="#">
												<div class="text-tiny">Post</div>
											</a>
										</li>
										<li>
											<i class="icon-chevron-right"></i>
										</li>
										<li>
											<div class="text-tiny">New Post</div>
										</li>
									</ul>
								</div>
								<!-- new-category -->

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
									<form class="form-new-product form-style-1" action="<?php echo base_url('post/store') ?>" method="POST" enctype="multipart/form-data">
										<fieldset class="name">
											<div class="body-title">Post Name <span class="tf-color-1">*</span></div>
											<input class="flex-grow" type="text" placeholder="Post name" name="title" id="slug" onkeyup="ChangeToSlug();" tabindex="0" value="" aria-required="true" required="">
										</fieldset>

										<fieldset class="name">
											<div class="body-title">Post Slug <span class="tf-color-1">*</span></div>

											<input class="flex-grow" type="text" placeholder="Post Slug" name="slug" id="convert_slug" tabindex="0" value="" aria-required="true" required="">
										</fieldset>

										<fieldset class="name">
											<div class="body-title">Short Description <span class="tf-color-1">*</span></div>

											<input class="flex-grow" type="text" placeholder="short" name="short_content" tabindex="0" value="" aria-required="true" required="">
										</fieldset>

										<fieldset class="description">
											<div class="body-title mb-10">Description <span class="tf-color-1">*</span>
											</div>

											<!-- <textarea placeholder="Post content" class="mb-10" name="content" tabindex="0" aria-required="true" required=""></textarea> -->
											<textarea class="mb-10" id="default" name="content" tabindex="0" aria-required="true" ></textarea>

										</fieldset>

										<fieldset>
											<div class="body-title">Upload images <span class="tf-color-1">*</span>
											</div>
											<input name="image" type="file" class="form-control-file" id="exampleInputPassword1">
											<small>
												<?php if (isset($error)) {
													echo $error;
												} ?>
											</small>
										</fieldset>

										<fieldset class="name">
											<div class="body-title mb-10">Blog</div>
											<div class="select mb-10">
												<select style="width: 150px;" name="blog_id" class="" id="exampleFormControlSelect1">
													<?php
													foreach ($blog2 as $key => $cate) {
													?>
														<option value="<?= $cate->id ?>"><?= $cate->title ?></option>
													<?php
													}
													?>
												</select>
											</div>
										</fieldset>

										<fieldset class="name">
											<div class="body-title mb-10">Status</div>
											<div class="select mb-10">
												<select style="width: 150px;" name="status" class="" id="exampleFormControlSelect1">
													<option value="1">Active</option>
													<option value="0">Inactive</option>

												</select>
											</div>
										</fieldset>

										<div class="bot">
											<div></div>
											<button class="tf-button w208" type="submit">Save</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="bottom-page">
							<div class="body-text">Copyright © 2024 SurfsideMedia</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<?php require_once('./application/views/admin_template/footer_admin.php') ?>
</body>

</html>
