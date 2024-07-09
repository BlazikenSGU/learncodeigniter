<div class="container">
	<div class="card" style="margin-top: 1rem;">
		<h5 class="card-header">Create Brand</h5>
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

			<form action="<?php echo base_url('brand/store') ?>" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="exampleInputEmail1">Title</label>
					<input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
					<?php echo '<span class="text text-danger">' . form_error('title') . '</span>'; ?>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Slug</label>
					<input name="slug" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
					<?php echo '<span class="text text-danger">' . form_error('slug') . '</span>'; ?>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Description</label>
					<input name="description" type="text" class="form-control" id="exampleInputPassword1">
					<?php echo '<span class="text text-danger">' . form_error('description') . '</span>'; ?>
				</div>

				<div class="form-group">
					<label for="exampleInputPassword1">Image</label>
					<input name="image" type="file" class="form-control-file" id="exampleInputPassword1">
					<small><?php if (isset($error)) {
								echo $error;
							} ?></small>

				</div>
				<div class="form-group">
					<label for="exampleFormControlSelect1">Status</label>
					<select name="status" class="form-control" id="exampleFormControlSelect1">
						<option value="1">Active</option>
						<option value="0">Inactive</option>

					</select>
				</div>

				<button type="submit" class="btn btn-primary">Add</button>
			</form>
		</div>
	</div>
</div>
