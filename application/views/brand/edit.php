<div class="container">
	<div class="card" style="margin-top: 1rem;">
		<h5 class="card-header">Edit Brand</h5>
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

			<form action="<?php echo base_url('brand/update/' . $brand->id) ?>" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="exampleInputEmail1">Title</label>
					<input name="title" value="<?= $brand->title ?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
					<?php echo '<span class="text text-danger">' . form_error('title') . '</span>'; ?>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Slug</label>
					<input name="slug" value="<?= $brand->slug ?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
					<?php echo '<span class="text text-danger">' . form_error('slug') . '</span>'; ?>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Description</label>
					<input name="description" value="<?= $brand->description ?>" type="text" class="form-control" id="exampleInputPassword1">
					<?php echo '<span class="text text-danger">' . form_error('description') . '</span>'; ?>
				</div>

				<div class="form-group">
					<label for="exampleInputPassword1">Image</label>
					<input name="image" type="file" class="form-control-file" id="exampleInputPassword1">
					<img style="max-width: 150px; max-height: 150px" src="<?php echo base_url('uploads/brand/' . $brand->image) ?>" alt="">
					<small><?php if (isset($error)) {
								echo $error;
							} ?></small>

				</div>
				<div class="form-group">
					<label for="exampleFormControlSelect1">Status</label>
					<select name="status" class="form-control" id="exampleFormControlSelect1">
						<?php
						if ($brand->status == 1) {
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
</div>
