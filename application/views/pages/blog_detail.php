<div class="container">
	<div class="row">
		<?php $this->load->view('pages/template/sidebar'); ?>
		<div class="col-sm-9">
			<div class="blog-post-area">
				<h2 class="title text-center"><?= $title ?></h2>
				<div class="single-blog-post">
					<h3><?= $post->title ?></h3>
					<div class="post-meta">
						<ul>
							<li><i class="fa fa-user"></i> admin</li>
							<li><i class="fa fa-clock-o"></i> <?= $post->date_created ?></li>

						</ul>

					</div>
					<?= $post->short_content ?>
					<a href="">
						<img style="max-width: 150px; max-height: 150px" src="<?php echo base_url('uploads/post/' . $post->image) ?>" alt="">
					</a>
					<p>
					<?= $post->content ?>
					</p>
					<div class="pager-area">
						<ul class="pager pull-right">
							<li><a href="#">Pre</a></li>
							<li><a href="#">Next</a></li>
						</ul>
					</div>
				</div>
			</div>
			<!--/blog-post-area-->

			<div class="rating-area">
				<!-- <ul class="ratings">
					<li class="rate-this">Rate this item:</li>
					<li>
						<i class="fa fa-star color"></i>
						<i class="fa fa-star color"></i>
						<i class="fa fa-star color"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
					</li>
					<li class="color">(6 votes)</li>
				</ul> -->
				<ul class="tag">
					<li>TAG:</li>
					<li><a class="color" href="">Pink <span>/</span></a></li>
					<li><a class="color" href="">T-Shirt <span>/</span></a></li>
					<li><a class="color" href="">Girls</a></li>
				</ul>
			</div>
			<!--/rating-area-->

			<div class="socials-share">
				<a href=""><img src="images/blog/socials.png" alt=""></a>
			</div>
			<!--/socials-share-->

			<div class="media commnets">
				<a class="pull-left" href="#">
					<img class="media-object" src="images/blog/man-one.jpg" alt="">
				</a>
				<div class="media-body">
					<h4 class="media-heading">Annie Davis</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					<div class="blog-socials">
						<ul>
							<li><a href=""><i class="fa fa-facebook"></i></a></li>
							<li><a href=""><i class="fa fa-twitter"></i></a></li>
							<li><a href=""><i class="fa fa-dribbble"></i></a></li>
							<li><a href=""><i class="fa fa-google-plus"></i></a></li>
						</ul>
						<a class="btn btn-primary" href="">Other Posts</a>
					</div>
				</div>
			</div>
			<!--Comments-->
			<div class="response-area">
				<h2>3 RESPONSES</h2>
				<ul class="media-list">
					<li class="media">

						<a class="pull-left" href="#">
							<img class="media-object" src="images/blog/man-two.jpg" alt="">
						</a>
						<div class="media-body">
							<ul class="sinlge-post-meta">
								<li><i class="fa fa-user"></i>Janis Gallagher</li>
								<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
								<li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
							</ul>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
							<a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
						</div>
					</li>
					<li class="media second-media">
						<a class="pull-left" href="#">
							<img class="media-object" src="images/blog/man-three.jpg" alt="">
						</a>
						<div class="media-body">
							<ul class="sinlge-post-meta">
								<li><i class="fa fa-user"></i>Janis Gallagher</li>
								<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
								<li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
							</ul>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
							<a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
						</div>
					</li>
					<li class="media">
						<a class="pull-left" href="#">
							<img class="media-object" src="images/blog/man-four.jpg" alt="">
						</a>
						<div class="media-body">
							<ul class="sinlge-post-meta">
								<li><i class="fa fa-user"></i>Janis Gallagher</li>
								<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
								<li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
							</ul>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
							<a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
						</div>
					</li>
				</ul>
			</div>
			<!--/Response-area-->
			<div class="replay-box">
				<div class="row">
					<div class="col-sm-4">
						<h2>Leave a replay</h2>
						<form>
							<div class="blank-arrow">
								<label>Your Name</label>
							</div>
							<span>*</span>
							<input type="text" placeholder="write your name...">
							<div class="blank-arrow">
								<label>Email Address</label>
							</div>
							<span>*</span>
							<input type="email" placeholder="your email address...">
							<div class="blank-arrow">
								<label>Web Site</label>
							</div>
							<input type="email" placeholder="current city...">
						</form>
					</div>
					<div class="col-sm-8">
						<div class="text-area">
							<div class="blank-arrow">
								<label>Your Name</label>
							</div>
							<span>*</span>
							<textarea name="message" rows="11"></textarea>
							<a class="btn btn-primary" href="">post comment</a>
						</div>
					</div>
				</div>
			</div>
			<!--/Repaly Box-->
		</div>
	</div>
</div>
