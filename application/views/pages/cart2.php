<!-- breadcrumb -->
<div class="container">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a href="<?= base_url('') ?>" class="stext-109 cl8 hov-cl1 trans-04">
			Home
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<span class="stext-109 cl4">
			Shoping Cart
		</span>
	</div>
</div>


<!-- Shoping Cart -->
<section class="bg0 p-t-75 p-b-85">
	<div class="container">
		<div class="row">
			<?php
			$subtotal = 0;
			$total = 0;
			?>
			<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
				<div class="m-l-2 m-lr-0-xl">
					<div class="wrap-table-shopping-cart">

						<?php
						if ($this->cart->contents()) {
						?>
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-3">Price</th>
									<th class="column-4" style="text-align: left;">Quantity</th>
									<th class="column-5">Total</th>
									<th class="column-6"></th>
								</tr>

								<?php

								foreach ($this->cart->contents() as $item) {
									$subtotal = $item['qty'] * $item['price'];
									$total += $subtotal;
								?>
									<tr class="table_row">
										<td class="column-1" style="padding-left: 20px">
											<div class="how-itemcart1">
												<img src="<?= base_url('uploads/product/' . $item['options']['image']) ?>" alt="IMG">
											</div>
										</td>
										<td class="column-2"><?= $item['name'] ?></td>
										<td class="column-3"><?= number_format($item['price'], 0, ',', '.') ?> vnd</td>
										<td class="column-4">
											<form action="<?= base_url('update-cart-item') ?>" method="POST">

												<div class="wrap-num-product flex-w m-l-auto m-r-0" style="border: none;">

													<input type="hidden" value="<?= $item['rowid'] ?>" name="rowid">

													<?php if ($item['qty'] > $item['options']['stock']) { ?>
														<input class="cart_quantity_input mtext-104 cl3 txt-center num-product" type="number" name="quantity" value="<?= $item['options']['stock'] ?>" autocomplete="off" size="2">
													<?php } else { ?>
														<input class="cart_quantity_input mtext-104 cl3 txt-center num-product" type="number" name="quantity" value="<?= $item['qty'] ?>" autocomplete="off" size="2">
													<?php } ?>

													<input type="submit" name="capnhat" class="btn btn-warning" value="update"></input>
												</div>

											</form>
										</td>
										<td class="column-5" style="padding-right: 20px"><?= number_format($subtotal, 0, ',', '.') ?> vnd</td>
										<td class="column-6" style="padding: 0 1rem 1rem;">
											<a style="color: black;" class="cart_quantity_delete" href="<?= base_url('delete-item/' . $item['rowid']) ?>"><i class="fa fa-trash"></i></a>

										</td>
									</tr>
								<?php } ?>
							</table>
						<?php } else { ?>
							<div style="border-top: 1px solid #e6e6e6;;">
								<tr>
									<span>gio hang trong</span>
								</tr>
							</div>

						<?php } ?>
					</div>

					<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
						<div class="flex-w flex-m m-r-20 m-tb-5">
						</div>

						<a href="<?= base_url('delete-all-cart') ?>">
							<div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
								Clear Cart
							</div>
						</a>
					</div>
				</div>
			</div>

			<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
				<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
					<h4 class="mtext-109 cl2 p-b-30">
						Information Checkout
					</h4>

					<div class="flex-w flex-t bor12 p-b-13">
						<div class="size-208">
							<span class="stext-110 cl2">
								Subtotal:
							</span>
						</div>

						<div class="size-209">
							<span style="color: red" class="mtext-110 cl2">
								<?= number_format($total, 0, ',', '.') ?> vnd
							</span>
						</div>
					</div>
					<form action="<?= base_url('confirmCheckout') ?>" onsubmit="return confirm('Xac nhan dat hang?')" method="POST" enctype="multipart/form-data">
						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Shipping:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">


								<div class="">
									<?php foreach ($user as $key => $value) {
										if (($_SESSION['LoggedInCustomer']['id']) == $value->id) { ?>
											<div class="bor8 bg0 m-b-12">
												<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" value="<?= $value->name?>" name="name" placeholder="Name" required>
											</div>

											<div class="bor8 bg0 m-b-12">
												<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="number" value="0<?= $value->phone?>" name="phone" placeholder="Phone" required>
											</div>

											<div class="bor8 bg0 m-b-12">
												<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" value="<?= $value->address?>" name="address" placeholder="Address" required>
											</div>

											<div class="bor8 bg0 m-b-12">
												<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" value="<?= $value->email?>" name="email" placeholder="Email" required>
											</div>

									<?php }
									} ?>
									<!-- <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
									<select class="js-select2" name="time">
										<option>Select a country...</option>
										<option>USA</option>
										<option>UK</option>
									</select>
									<div class="dropDownSelect2"></div>
								</div> -->


									<!-- 
								<div class="flex-w">
									<div class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
										Update Totals
									</div>
								</div> -->

								</div>
							</div>

							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Fee Ship:
								</span>
							</div>
							<div class="bor8 bg0 m-b-12">
								<?php $fee_ship = floatval(20000); ?>
								<input style="color: red;" readonly class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="Email" value="<?= number_format($fee_ship, 0, ',', '.') ?> vnd">
							</div>
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<?php
								$total_end = $total + $fee_ship ?>
								<span style="color: red" class="mtext-110 cl2">
									<?= number_format($total_end, 0, ',', '.') ?> vnd
								</span>
							</div>
						</div>


						<select name="shipMethod">
							<option value="cod">

								<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
									Thanh Toán COD
								</button>
							</option>
							<option value="cod">

								<button class="flex-c-m stext-101 cl0 size-116 bor14 hov-btn3 p-lr-15 trans-04 pointer m-t-10" style="background-color: #ab2038; color:white">
									MOMO
								</button>
							</option>


							<option value="cod">

								<button class="flex-c-m stext-101 cl0 size-116 bor14 hov-btn3 p-lr-15 trans-04 pointer m-t-10" style="background-color: #1fa53c; color:white">
									BANKING
								</button>
							</option>


						</select>

						<button type="submit">
							Check
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Footer -->
