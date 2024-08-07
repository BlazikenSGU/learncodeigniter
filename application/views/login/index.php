<div class="container">

	<h1>Đăng nhập Admin</h1>

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

	<form action="<?php echo base_url('login-user') ?>" method="POST">

		<div class="form-group">
			<label for="exampleInputEmail1">Email address</label>
			<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
			<?php echo '<span class="text text-danger">' . form_error('email') . '</span>'; ?>
		</div>

		<div class="form-group">
			<label for="exampleInputPassword1">Password</label>
			<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
			<?php echo '<span class="text text-danger">' . form_error('password') . '</span>'; ?>
		</div>

		<button type="submit" class="btn btn-primary">Login</button>
		<a href="<?php echo base_url('register-admin') ?>" class="btn btn-success">Register Admin</a>
	</form>
</div>
