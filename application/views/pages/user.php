<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('link/images/bg-01.jpg');">
	<h2 class="ltext-105 cl0 txt-center">
		Infomation User
	</h2>
</section>


<!-- Content page -->
<section class="bg0 p-t-104 p-b-116">
	<div class="container">
		<div class="flex-w flex-tr">
			<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
				<form>
					<h4 class="mtext-105 cl2 txt-center p-b-30">
						Thông tin cá nhân
					</h4>
					<?php foreach ($user as $key => $value) {
						if (($_SESSION['LoggedInCustomer']['id']) == $value->id) { ?>

							<div class="bor8 m-b-20 how-pos4-parent">
								<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" value=" <?= $value->id ?>" placeholder="Name " readonly>
							</div>

							<div class="bor8 m-b-20 how-pos4-parent">
								<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" readonly value="<?= $value->email ?>" name="email" placeholder="Email ">
								<!-- <img class="how-pos4 pointer-none" src="link/images/icons/icon-email.png" alt="ICON"> -->
							</div>

							<div class="bor8 m-b-20 how-pos4-parent">
								<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" value=" <?= $value->name ?>" placeholder="Name " readonly>
							</div>

							<div class="bor8 m-b-20 how-pos4-parent">
								<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" value="+84 <?= $value->phone ?>" placeholder="Name " readonly>
							</div>

							<div class="bor8 m-b-20 how-pos4-parent">
								<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" value=" <?= $value->address ?>" placeholder="Name " readonly>
							</div>

							<div class="bor8 m-b-20 how-pos4-parent">
								<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" value=" <?= $value->date_create ?>" placeholder="Name " readonly>
							</div>
					<?php }
					} ?>

				</form>
			</div>

			<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">

				<a href="<?= base_url('user-history') ?>">
					<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer m-b-10">
						Đơn hàng đã đặt
					</button>
				</a>


				<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer m-b-10">
					Thay đổi mật khẩu
				</button>

				<a href="<?= base_url('dang-xuat') ?>">
					<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer m-b-10">
						Đăng xuất
					</button>
				</a>


			</div>
		</div>
	</div>
</section>


<!-- Map -->
<div class="map">
	<div class="size-303" id="google_map" data-map-x="40.691446" data-map-y="-73.886787" data-pin="link/images/icons/pin.png" data-scrollwhell="0" data-draggable="1" data-zoom="11"></div>
</div>
