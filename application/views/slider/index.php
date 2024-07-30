<div class="container">
	<div class="card" style="margin-top: 1rem;">
		<h5 class="card-header">LIST Slider</h5>

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

			<a href="<?php echo base_url('slider/create') ?>" class="btn btn-primary">Create Slider</a>
			<table class="table table-striped">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Title</th>
						<th scope="col">Description</th>
						<th scope="col">Image</th>
						<th scope="col">Status</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($slider as $key => $sli) {
					?>
						<tr>
							<th scope="row"><?= $key ?></th>
							<td><?= $sli->title ?></td>

							<td><?= $sli->description ?></td>
							<td>
								<img style="max-width: 150px; max-height: 150px" src="<?php echo base_url('uploads/slider/' . $sli->image) ?>" alt="">
							</td>
							<td><?php
								if ($sli->status == 1) {
									echo 'Active';
								} else {
									echo 'Inactive';
								}
								?></td>
							<td>
								<a href="<?php echo base_url('slider/edit/' . $sli->id) ?>" class="btn btn-warning">Edit</a>
								<a onclick="return confirm('Are you sure?')" href="<?php echo base_url('slider/delete/' . $sli->id) ?>" class="btn btn-danger">Delete</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
