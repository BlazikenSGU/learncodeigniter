<div class="container">
	<div class="card" style="margin-top: 1rem;">
		<h5 class="card-header">Edit Post</h5>
		<div class="card-body">
			<a href="<?php echo base_url('post/create') ?>" class="btn btn-primary">Create Post</a>
			<a href="<?php echo base_url('post/list') ?>" class="btn btn-success">List Post</a>
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

			<form action="<?php echo base_url('post/update/' . $post->id) ?>" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="exampleInputEmail1">Title</label>
					<input name="title" type="text" value="<?= $post->title ?>" class="form-control" id="slug" onkeyup="ChangeToSlug();" aria-describedby="emailHelp">
					<?php echo '<span class="text text-danger">' . form_error('title') . '</span>'; ?>
				</div>

				<div class="form-group">
					<label for="exampleInputEmail1">Slug</label>
					<input name="slug" type="text" value="<?= $post->slug ?>" class="form-control" id="convert_slug" aria-describedby="emailHelp">
					<?php echo '<span class="text text-danger">' . form_error('slug') . '</span>'; ?>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Short Content</label>
					<input name="short_content" value="<?= $post->short_content ?>" type="text" class="form-control" id="exampleInputPassword1">
					<?php echo '<span class="text text-danger">' . form_error('short_content') . '</span>'; ?>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Content</label>
					<textarea rows="5" name="content" class="form-control" id="exampleInputPassword1"> <?= $post->content ?></textarea>
					<?php echo '<span class="text text-danger">' . form_error('content') . '</span>'; ?>
				</div>

				<div class="form-group">
					<label for="exampleInputPassword1">Image</label>
					<input name="image" type="file" class="form-control-file" id="exampleInputPassword1">
					<img style="max-width: 150px; max-height: 150px" src="<?php echo base_url('uploads/post/' . $post->image) ?>" alt="">
					<small><?php if (isset($error)) {
								echo $error;
							} ?></small>

				</div>

				<div class="form-group">
					<label for="exampleFormControlSelect1">Blog</label>
					<select name="blog_id" class="form-control" id="exampleFormControlSelect1">
						<?php
						foreach ($blog2 as $key => $cate) {
						?>
							<option <?php echo $cate->id == $post->blog_id ? 'selected' : '' ?> value="<?= $cate->id ?>"><?= $cate->title ?></option>
						<?php
						}
						?>
					</select>
				</div>


				<div class="form-group">
					<label for="exampleFormControlSelect1">Status</label>
					<select name="status" class="form-control" id="exampleFormControlSelect1">
						<?php
						if ($post->status == 1) {
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
