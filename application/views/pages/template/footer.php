<footer id="footer">
	<!--Footer-->
	<div class="footer-top">
		<div class="container">
			<div class="row">
				<div class="col-sm-2">
					<div class="companyinfo">
						<h2><span>e</span>-shopper</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
					</div>
				</div>
				<div class="col-sm-7">
					<div class="col-sm-3">
						<div class="video-gallery text-center">
							<a href="#">
								<div class="iframe-img">
									<img src="images/home/iframe1.png" alt="" />
								</div>
								<div class="overlay-icon">
									<i class="fa fa-play-circle-o"></i>
								</div>
							</a>
							<p>Circle of Hands</p>
							<h2>24 DEC 2014</h2>
						</div>
					</div>

					<div class="col-sm-3">
						<div class="video-gallery text-center">
							<a href="#">
								<div class="iframe-img">
									<img src="images/home/iframe2.png" alt="" />
								</div>
								<div class="overlay-icon">
									<i class="fa fa-play-circle-o"></i>
								</div>
							</a>
							<p>Circle of Hands</p>
							<h2>24 DEC 2014</h2>
						</div>
					</div>

					<div class="col-sm-3">
						<div class="video-gallery text-center">
							<a href="#">
								<div class="iframe-img">
									<img src="images/home/iframe3.png" alt="" />
								</div>
								<div class="overlay-icon">
									<i class="fa fa-play-circle-o"></i>
								</div>
							</a>
							<p>Circle of Hands</p>
							<h2>24 DEC 2014</h2>
						</div>
					</div>

					<div class="col-sm-3">
						<div class="video-gallery text-center">
							<a href="#">
								<div class="iframe-img">
									<img src="images/home/iframe4.png" alt="" />
								</div>
								<div class="overlay-icon">
									<i class="fa fa-play-circle-o"></i>
								</div>
							</a>
							<p>Circle of Hands</p>
							<h2>24 DEC 2014</h2>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="address">
						<img src="images/home/map.png" alt="" />
						<p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="footer-widget">
		<div class="container">
			<div class="row">
				<div class="col-sm-2">
					<div class="single-widget">
						<h2>Service</h2>
						<ul class="nav nav-pills nav-stacked">
							<li><a href="#">Online Help</a></li>
							<li><a href="#">Contact Us</a></li>
							<li><a href="#">Order Status</a></li>
							<li><a href="#">Change Location</a></li>
							<li><a href="#">FAQ’s</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-2">
					<div class="single-widget">
						<h2>Quock Shop</h2>
						<ul class="nav nav-pills nav-stacked">
							<li><a href="#">T-Shirt</a></li>
							<li><a href="#">Mens</a></li>
							<li><a href="#">Womens</a></li>
							<li><a href="#">Gift Cards</a></li>
							<li><a href="#">Shoes</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-2">
					<div class="single-widget">
						<h2>Policies</h2>
						<ul class="nav nav-pills nav-stacked">
							<li><a href="#">Terms of Use</a></li>
							<li><a href="#">Privecy Policy</a></li>
							<li><a href="#">Refund Policy</a></li>
							<li><a href="#">Billing System</a></li>
							<li><a href="#">Ticket System</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-2">
					<div class="single-widget">
						<h2>About Shopper</h2>
						<ul class="nav nav-pills nav-stacked">
							<li><a href="#">Company Information</a></li>
							<li><a href="#">Careers</a></li>
							<li><a href="#">Store Location</a></li>
							<li><a href="#">Affillate Program</a></li>
							<li><a href="#">Copyright</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-3 col-sm-offset-1">
					<div class="single-widget">
						<h2>About Shopper</h2>
						<form action="#" class="searchform">
							<input type="text" placeholder="Your email address" />
							<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
							<p>Get the most recent updates from <br />our site and be updated your self...</p>
						</form>
					</div>
				</div>

			</div>
		</div>
	</div>

	<div class="footer-bottom">
		<div class="container">
			<div class="row">
				<p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
				<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
			</div>
		</div>
	</div>

</footer>
<!--/Footer-->


<script src="<?= base_url('frontend/js/jquery.js') ?>"></script>

<!-- loc san pham -->
<script>
	$(document).ready(function() {
		var active = location.search; //?kytu=asc
		$('#select-filter option[value="' + active + '"]').attr('selected', 'selected');
	})

	$('.select-filter').change(function() {

		var value = $(this).find(':selected').val();

		// alert(value);
		if (value != 0) {
			var url = value;
			// alert(url);
			window.location.replace(url);
		} else {
			alert('Hãy lọc sản phẩm');
		}

	})
</script>


<!-- loc gia theo khoang -->
<script>
	$('.price_to').val(<?= $max_price ?>)
	$('.price_from').val(<?= $min_price ?>)
	$(function() {
		$("#slider-range").slider({
			range: true,
			min: <?= $min_price ?>,
			max: <?= $max_price ?>,
			values: [<?= $min_price ?>, <?= $max_price ?>],
			slide: function(event, ui) {
				$("#amount").val(addPlus(ui.values[0]) + "đ - " + addPlus(ui.values[1]) + "đ");
				$('.price_from').val(ui.values[0]);
				$('.price_to').val(ui.values[1]);
			}

		});
		$("#amount").val(addPlus($("#slider-range").slider("values", 0)) +
			"đ - " + addPlus($("#slider-range").slider("values", 1)) + "đ");
	});

	function addPlus(nStr) {
		nStr += '';
		x = nStr.split('.');
		x1 = x[0];
		x2 = x.length > 1 ? '.' + x[1] : '';
		var rgx = /(\d+)(\d{3})/;
		while (rgx.test(x1)) {
			x1 = x1.replace(rgx, '$1' + '.' + '$2');
		}
		return x1 + x2;
	}
</script>

<!-- comment -->
<script>
	$('.write-comment').click(function() {
		var name_comment = $('.name_comment').val();
		var email_comment = $('.email_comment').val();
		var comment = $('.comment').val();
		var product_id = $('.product_id_comment').val();
		var star = $('.star_rating_value').val();

		// alert(name_comment,email_comment,comment);
		// alert(email_comment);
		// alert(comment);

		if (name_comment == '' || email_comment == '' || comment == '') {
			alert('Vui long dien day thu thong tin truoc khi gui')
		} else {
			$.ajax({
				method: 'POST',
				url: '/comment/send',
				data: {
					name_comment: name_comment,
					email_comment: email_comment,
					comment: comment,
					product_id: product_id,
					star: star
				},
				success: function() {
					$('#comment_alert').html('<span class="text text-success">Danh gia da duoc gui</span>');
					$('.name_comment').val('');
					$('.email_comment').val('');
					$('.comment').val(' ')
				}
			})
		}
	});
</script>

<!-- rating star -->
<script>
	function ratingStar(star) {
		star.click(function() {
			var stars = $('.ratingW').find('li')
			stars.removeClass('on');
			var thisIndex = $(this).parents('li').index();
			for (var i = 0; i <= thisIndex; i++) {
				stars.eq(i).addClass('on');
			}
			putScoreNow(thisIndex + 1);
			$('.star_rating_value').val(i);
		});
	}

	function putScoreNow(i) {
		$('.star_rating').html(i);

	}


	$(function() {
		if ($('.ratingW').length > 0) {
			ratingStar($('.ratingW li a'));
			$('.star_rating_value').val(3);
		}
	});
</script>

<script src="<?= base_url('frontend/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('frontend/js/jquery.scrollUp.min.js') ?>"></script>
<script src="<?= base_url('frontend/js/price-range.js') ?>"></script>
<script src="<?= base_url('frontend/js/jquery.prettyPhoto.js') ?>"></script>
<script src="<?= base_url('frontend/js/main.js') ?>"></script>
<script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
</body>

</html>
