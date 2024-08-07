<div class="container">
	<div class="card" style="margin-top: 1rem;">
		<h5 class="card-header">List Blog</h5>

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

			<a href="<?php echo base_url('blog/create') ?>" class="btn btn-primary">Create Blog</a>
			<table class="table table-striped">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Title</th>
						<th scope="col">Slug</th>
						<th scope="col">Description</th>
						<th scope="col">Image</th>
						<th scope="col">Status</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($blog as $key => $bl) {
					?>
						<tr>
							<th scope="row"><?= $key ?></th>
							<td><?= $bl->title ?></td>
							<td><?= $bl->slug ?></td>
							<td><?= $bl->description ?></td>
							<td>
								<img style="max-width: 150px; max-height: 150px" src="<?php echo base_url('uploads/blog/' . $bl->image) ?>" alt="">
							</td>
							<td><?php
								if ($bl->status == 1) {
									echo 'Active';
								} else {
									echo 'Inactive';
								}
								?></td>
							<td>
								<a href="<?php echo base_url('blog/edit/' . $bl->id) ?>" class="btn btn-warning">Edit</a>
								<a onclick="return confirm('Are you sure?')" href="<?php echo base_url('blog/delete/' . $bl ->id) ?>" class="btn btn-danger">Delete</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
