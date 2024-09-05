<!-- <div class="container">
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
</div> -->




<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('link/images/bg-01.jpg');">
	<h2 class="ltext-105 cl0 txt-center">
		Contact
	</h2>
</section>


<!-- Content page -->
<section class="bg0 p-t-104 p-b-116">
	<div class="container">
		<div class="flex-w flex-tr">
			<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
				<form>
					<h4 class="mtext-105 cl2 txt-center p-b-30">
						Liên hệ cho chúng tôi
					</h4>

					<div class="bor8 m-b-20 how-pos4-parent">
						<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="Email ">
						<img class="how-pos4 pointer-none" src="link/images/icons/icon-email.png" alt="ICON">
					</div>

					<div class="bor8 m-b-30">
						<textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="msg" placeholder="Messenger"></textarea>
					</div>

					<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
						Gửi
					</button>
				</form>
			</div>

			<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
				<div class="flex-w w-full p-b-42">
					<span class="fs-18 cl5 txt-center size-211">
						<span class="lnr lnr-map-marker"></span>
					</span>

					<div class="size-212 p-t-2">
						<span class="mtext-110 cl2">
							Address
						</span>

						<p class="stext-115 cl6 size-213 p-t-18">
							 45B Ung Văn Khiêm, P25, Quận Bình Thạnh.
						</p>
					</div>
				</div>

				<div class="flex-w w-full p-b-42">
					<span class="fs-18 cl5 txt-center size-211">
						<span class="lnr lnr-phone-handset"></span>
					</span>

					<div class="size-212 p-t-2">
						<span class="mtext-110 cl2">
							Phone
						</span>

						<p class="stext-115 cl1 size-213 p-t-18">
							+84 777722438
						</p>
					</div>
				</div>

				<div class="flex-w w-full">
					<span class="fs-18 cl5 txt-center size-211">
						<span class="lnr lnr-envelope"></span>
					</span>

					<div class="size-212 p-t-2">
						<span class="mtext-110 cl2">
							Support
						</span>

						<p class="stext-115 cl1 size-213 p-t-18">
							truongnhat.nguyen.41@gmail.com
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- Map -->
<div class="map">
	<div class="size-303" id="google_map" data-map-x="40.691446" data-map-y="-73.886787" data-pin="link/images/icons/pin.png" data-scrollwhell="0" data-draggable="1" data-zoom="11"></div>
</div>
