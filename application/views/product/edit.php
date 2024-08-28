<!-- <div class="container">
    <div class="card" style="margin-top: 1rem;">
        <h5 class="card-header">Edit Product</h5>
        <div class="card-body">
            <a href="<?php echo base_url('category/create') ?>" class="btn btn-primary">Create Product</a>
            <a href="<?php echo base_url('product/list') ?>" class="btn btn-success">List Product</a>
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

            <form action="<?php echo base_url('product/update/' . $product->id) ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input name="title" value="<?= $product->title ?>" type="text" class="form-control" id="slug" onkeyup="ChangeToSlug();" aria-describedby="emailHelp">
                    <?php echo '<span class="text text-danger">' . form_error('title') . '</span>'; ?>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Quantity</label>
                    <input name="quantity" value="<?= $product->quantity ?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <?php echo '<span class="text text-danger">' . form_error('quantity') . '</span>'; ?>
                </div>
				<div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                    <input name="price" value="<?= $product->price ?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <?php echo '<span class="text text-danger">' . form_error('price') . '</span>'; ?>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Slug</label>
                    <input name="slug" type="text" value="<?= $product->slug ?>" class="form-control" id="convert_slug" aria-describedby="emailHelp">
                    <?php echo '<span class="text text-danger">' . form_error('slug') . '</span>'; ?>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <input name="description" value="<?= $product->description ?>" type="text" class="form-control" id="exampleInputPassword1">
                    <?php echo '<span class="text text-danger">' . form_error('description') . '</span>'; ?>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <input name="image" type="file" class="form-control-file" id="exampleInputPassword1">
                    <img style="max-width: 150px; max-height: 150px" src="<?php echo base_url('uploads/product/' . $product->image) ?>" alt="">
                    <small><?php if (isset($error)) {
								echo $error;
							} ?></small>

                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Category</label>
                    <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                        <?php
						foreach ($category as $key => $cate) {
						?>
                            <option <?php echo $cate->id == $product->category_id ? 'selected' : '' ?> value="<?= $cate->id ?>"><?= $cate->title ?></option>
                        <?php
						}
						?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Brand</label>
                    <select name="brand_id" class="form-control" id="exampleFormControlSelect1">
                        <?php
						foreach ($brand as $key => $bra) {
						?>
                            <option <?php echo $bra->id == $product->category_id ? 'selected' : '' ?> value="<?= $bra->id ?>"><?= $bra->title ?></option>
                        <?php
						}
						?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Status</label>
                    <select name="status" class="form-control" id="exampleFormControlSelect1">
                        <?php
						if ($product->status == 1) {
						?>
                            <option selected value="1">Active</option>
                            <option value="0">Inactive</option>
                        <?php
						} else {
						?>
                            <option value="1">Active</option>
                            <option selected value="0">Inactive</option>
                        <?php } ?>

                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div> -->


<!-- test -->

<!-- test demo -->

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

							</div>
							<div class="header-grid">
							</div>
						</div>
					</div>
					<div class="main-content">

						<!-- main-content-wrap -->
						<div class="main-content-inner">
							<!-- main-content-wrap -->
							<div class="main-content-wrap">
								<div class="flex items-center flex-wrap justify-between gap20 mb-27">
									<h3>Edit Product</h3>
									<ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
										<li>
											<a href="index-2.html">
												<div class="text-tiny">Dashboard</div>
											</a>
										</li>
										<li>
											<i class="icon-chevron-right"></i>
										</li>
										<li>
											<a href="all-product.html">
												<div class="text-tiny">Products</div>
											</a>
										</li>
										<li>
											<i class="icon-chevron-right"></i>
										</li>
										<li>
											<div class="text-tiny">Edit product</div>
										</li>
									</ul>
								</div>
								<!-- form-add-product -->


								<form class="tf-section-2 form-add-product" method="POST" enctype="multipart/form-data" action="<?php echo base_url('product/update/' . $product->id) ?>">
									<input type="hidden" name="_token" value="8LNRTO4LPXHvbK2vgRcXqMeLgqtqNGjzWSNru7Xx" autocomplete="off">

									<div class="wg-box">

										<fieldset class="name">
											<label class="body-title mb-10">Title<span class="tf-color-1">*</span></label>
											<input required class="mb-10" type="text" id="slug" onkeyup="ChangeToSlug();" name="title" tabindex="0" value="<?= $product->title ?>" aria-required="true" placeholder="nhap name">
										</fieldset>

										<fieldset class="name">
											<div class="body-title mb-10">Slug <span class="tf-color-1">*</span></div>
											<input class="mb-10" type="text" id="convert_slug" name="slug" tabindex="0" value="<?= $product->slug ?>" aria-required="true" required="">
										</fieldset>

										<div class="gap22 cols">
											<fieldset class="category">
												<div class="body-title mb-10">Category <span class="tf-color-1">*</span>
												</div>
												<div class="select">
													<select name="category_id" class="" id="exampleFormControlSelect1">
														<?php
														foreach ($category as $key => $cate) {
														?>
															<option <?php echo $cate->id == $product->category_id ? 'selected' : '' ?> value="<?= $cate->id ?>"><?= $cate->title ?></option>
														<?php
														}
														?>
													</select>
												</div>
											</fieldset>
											<fieldset class="brand">
												<div class="body-title mb-10">Brand <span class="tf-color-1">*</span>
												</div>
												<div class="select">
													<select name="brand_id" class="" id="exampleFormControlSelect1">
														<?php
														foreach ($brand as $key => $bra) {
														?>
															<option <?php echo $bra->id == $product->category_id ? 'selected' : '' ?> value="<?= $bra->id ?>"><?= $bra->title ?></option>
														<?php
														}
														?>
													</select>
												</div>
											</fieldset>
										</div>

										<fieldset class="name">
											<div class="body-title mb-10">Price <span class="tf-color-1">*</span></div>

											<input class="mb-10" type="text" name="price" tabindex="0" value="<?= $product->price ?>" aria-required="true" required="">
										</fieldset>

										<fieldset class="name">
											<div class="body-title mb-10">Quantity <span class="tf-color-1">*</span>
											</div>
											<input class="mb-10" type="text" name="quantity" tabindex="0" value="<?= $product->quantity ?>" aria-required="true" required="">
										</fieldset>

										<fieldset class="description">
											<div class="body-title mb-10">Description <span class="tf-color-1">*</span>
											</div>

											<textarea class="mb-10" name="description" tabindex="0" aria-required="true" required=""><?= $product->description ?></textarea>

										</fieldset>
									</div>


									<div class="wg-box">
										<fieldset>
											<div class="body-title mb-10">Upload images <span class="tf-color-1">*</span></div>

											<input name="image" type="file" class="form-control-file" id="exampleInputPassword1">
											<img style="max-width: 150px; max-height: 150px" src="<?php echo base_url('uploads/product/' . $product->image) ?>" alt="">
											<small><?php if (isset($error)) {
														echo $error;
													} ?></small>

											<!-- <div class="upload-image flex-grow">
												<div class="item" id="imgpreview" style="display:none">
													<img src="../../../localhost_8000/images/upload/upload-1.png" class="effect8" alt="">
												</div>
												<div id="upload-file" class="item up-load">
													<label class="uploadfile" for="myFile">
														<span class="icon">
															<i class="icon-upload-cloud"></i>
														</span>
														<span class="body-text">Drop your images here or select <span class="tf-color">click to browse</span></span>
														<input type="file" id="myFile" name="image" accept="image/*">
														
													</label>
												</div>
											</div> -->
										</fieldset>

										<!-- <fieldset>
											<div class="body-title mb-10">Upload Gallery Images</div>
											<div class="upload-image mb-16">

												<div id="galUpload" class="item up-load">
													<label class="uploadfile" for="gFile">
														<span class="icon">
															<i class="icon-upload-cloud"></i>
														</span>
														<span class="text-tiny">Drop your images here or select <span class="tf-color">click to browse</span></span>
														<input type="file" id="gFile" name="images[]" accept="image/*" multiple="">
													</label>
												</div>
											</div>
										</fieldset> -->





										<div class="cols gap22">
											<fieldset class="name">
												<div class="body-title mb-10">Status</div>
												<div class="select mb-10">
													<select name="status" class="" id="exampleFormControlSelect1">
														<?php
														if ($product->status == 1) {
														?>
															<option selected value="1">Active</option>
															<option value="0">Inactive</option>
														<?php
														} else {
														?>
															<option value="1">Active</option>
															<option selected value="0">Inactive</option>
														<?php } ?>
													</select>
												</div>
											</fieldset>

										</div>

										<div class="cols gap10">
											<button class="tf-button w-full" type="submit">Edit product</button>
										</div>
									</div>
								</form>
								<!-- /form-add-product -->
							</div>
							<!-- /main-content-wrap -->
						</div>
						<!-- /main-content-wrap -->

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
