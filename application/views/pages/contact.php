<div class="container">
	<div class="row">
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
		<h2>Xin vui long lien he voi chung toi bang cach dien day du thong tin va noi dung ben duoi.</h2>

		<form action="<?= base_url('send_contact') ?>" method="POST">
			<div class="form-group">
				<label for="exampleInputEmail1">Email</label>
				<input type="email" class="form-control" required name="email" id="email" placeholder="...">

			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Ho va ten</label>
				<input type="text" class="form-control" id="name" name="name" placeholder="...">

			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Sdt</label>
				<input type="text" class="form-control" required name="phone" id="phone" placeholder="...">

			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Noi dung</label>
				<textarea rows="7" resize="none" required name="note" id="note"></textarea>
			</div>

			<button type="submit" class="btn btn-primary">Gui</button>
		</form>
	</div>
</div>
