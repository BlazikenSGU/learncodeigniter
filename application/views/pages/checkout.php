<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Checkout</li>
			</ol>
		</div>
		<div class="table-responsive cart_info">

			<?php
			if ($this->cart->contents()) {
			?>

				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="description">Image</td>
							<td class="image">Item</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php
						$subtotal = 0;
						$total = 0;

						foreach ($this->cart->contents() as $item) {
							$subtotal = $item['qty'] * $item['price'];
							$total += $subtotal;
						?>

							<tr>
								<td class="cart_product" style="margin: 0 0 0 0;">
									<a href=""><img style="max-width: 150px;" src="<?= base_url('uploads/product/' . $item['options']['image']) ?>" alt="<?= $item['name'] ?>"></a>
								</td>
								<td class="cart_description">
									<h5><a href=""><?= $item['name'] ?></a></h5>
									<!-- <p>Web ID: 1089772</p> -->
								</td>
								<td class="cart_price">
									<p><?= number_format($item['price'], 0, ',', '.') ?> vnd</p>
								</td>
								<td class="cart_quantity">
									<form action="<?= base_url('update-cart-item') ?>" method="POST">
										<div class="cart_quantity_button">

											<input type="hidden" value="<?= $item['rowid'] ?>" name="rowid">
											<input class="cart_quantity_input" type="number" name="quantity" value="<?= $item['qty'] ?>" autocomplete="off" size="2">
											<input type="submit" name="capnhat" class="btn btn-warning" value="update"></input>

										</div>
									</form>
								</td>
								<td class="cart_total">
									<p class="cart_total_price" style="font-size: 16px;"><?= number_format($subtotal, 0, ',', '.') ?> vnd</p>
								</td>
								<!-- <td class="cart_delete" style="margin-right: 0">
                                    <a class="cart_quantity_delete" href="<?= base_url('delete-item/' . $item['rowid']) ?>"><i class="fa fa-times"></i></a>
                                </td> -->
							</tr>
						<?php } ?>
						<tr>
							<!-- <td>
                                <a href="<?= base_url('delete-all-cart') ?>" class="btn btn-danger">DELETE ALL</a>
                            </td> -->
							<td>
								<p class="cart_total_price">Total: <?= number_format($total, 0, ',', '.') ?> vnd</p>
							</td>
							<!-- <td>
                                <a href="<?= base_url('checkout') ?>" class="btn btn-success">PAY ORDER</a>
                            </td> -->



						</tr>
					</tbody>

				</table>

			<?php } else {
				echo '<span class="text text-danger">Add more product</span>';
			} ?>
		</div>


		<section>
			<!--form-->
			<div class="container">
				<div class="row">

					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-form">
							<!--login form-->
							<h2>Infomation Receive</h2>
							<form action="" onsubmit="return confirm('Xac nhan dat hang?')" method="POST">
								<input type="text" name="name" placeholder="Name" />
								<input type="text" name="address" placeholder="Address" />
								<input type="text" name="phone" placeholder="Phone" />
								<input type="text" name="email" placeholder="Email" />
								<label for="">Hinh thuc thanh toan: </label>
								<select name="hinhthucthanhtoan">
									<option>COD</option>
									<option>VNPAY</option>
									<option>MOMO</option>
								</select>

								<button type="submit" class="btn btn-default">Confirm Payment</button>
							</form>
						</div>
						<!--/login form-->
					</div>
					</form>
				</div>
			</div>
		</section>
		<!--/form-->
	</div>
</section>
<!--/#cart_items-->
