<div class="container">
	<div class="card" style="margin-top: 1rem;">
		<h5 class="card-header">LIST BRAND</h5>

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

<<<<<<< HEAD
			<a href="<?php echo base_url('brand/create') ?>" class="btn btn-primary">Create Brand</a>
=======
			<a href="<?php echo base_url('brand/create') ?>" class="btn btn-primary">Add Brand</a>
>>>>>>> 924b8ba5f842e096118a93a21ae441970bb5dd72
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
					foreach ($brand as $key => $bra) {
					?>
						<tr>
							<th scope="row"><?= $key ?></th>
							<td><?= $bra->title ?></td>
							<td><?= $bra->slug ?></td>
							<td><?= $bra->description ?></td>
							<td>
								<img style="max-width: 150px; max-height: 150px" src="<?php echo base_url('uploads/brand/' . $bra->image) ?>" alt="">
							</td>
							<td><?php
								if ($bra->status == 1) {
									echo 'Active';
								} else {
									echo 'Inactive';
								}
								?></td>
							<td>
								<a href="<?php echo base_url('brand/edit/' . $bra->id) ?>" class="btn btn-warning">Edit</a>
								<a onclick="return confirm('Are you sure?')" href="<?php echo base_url('brand/delete/' . $bra->id) ?>" class="btn btn-danger">Delete</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
