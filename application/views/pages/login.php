<section id="form">
	<!--form-->
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-1">
				<div class="login-form">
					<!--login form-->
					<h2>Login to your account</h2>
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
					<form action="<?= base_url('login-customer') ?>" method="POST">
						<input type="email" name="email" placeholder="Email" />
						<?= form_error('email'); ?>
						<input type="password" name="password" placeholder="password" />
						<?= form_error('password') ?>
						<button type="submit" class="btn btn-default">Login</button>
					</form>
				</div>
				<!--/login form-->
			</div>

			<div class="col-sm-1">
				<h2 class="or">OR</h2>
			</div>
			<div class="col-sm-4">
				<div class="signup-form">
					<!--sign up form-->
					<h2>New User Signup!</h2>
					<form action="<?= base_url('dang-ky')?>" method="POST">
						<input type="text" name="name" placeholder="Name" />
						<input type="email" name="email" placeholder="Email" />
						<input type="phone" name="phone" placeholder="Phone" />
						<input type="address" name="address" placeholder="Address" />
						<input type="password" name="password" placeholder="Password" />
						<button type="submit" class="btn btn-default">Signup</button>
					</form>
				</div>
				<!--/sign up form-->
			</div>
		</div>
	</div>
</section>
<!--/form-->
