<div class="container">
	<div class="card" style="margin-top: 1rem;">
		<h5 class="card-header">List Post</h5>
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
			<a href="<?php echo base_url('post/create') ?>" class="btn btn-primary">Create Post</a>
			<table class="table table-striped">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Title</th>
						<th scope="col">Blog</th>
						<th scope="col">Slug</th>
						<th scope="col">Short Content</th>
						<th scope="col">Content</th>
						<th scope="col">Image</th>
						<th scope="col">Status</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($post as $key => $prod) {
					?>
						<tr>
							<th scope="row"><?= $key ?></th>
							<td><?= $prod->title ?></td>
							<td><?= $prod->tendanhmuc ?></td>
							<td><?= $prod->slug ?></td>
							<td><?= $prod->short_content ?></td>
							<td><?= $prod->content ?></td>
							<td>
								<img style="max-width: 150px; max-height: 150px" src="<?php echo base_url('uploads/post/' . $prod->image) ?>" alt="">
							</td>
							<td><?php
								if ($prod->status == 1) {
									echo 'Active';
								} else {
									echo 'Inactive';
								}
								?></td>
							<td>
								<a href="<?php echo base_url('post/edit/' . $prod->id) ?>" class="btn btn-warning">Edit</a>
								<a onclick="return confirm('Are you sure?')" href="<?php echo base_url('post/delete/' . $prod->id) ?>" class="btn btn-danger">Delete</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
