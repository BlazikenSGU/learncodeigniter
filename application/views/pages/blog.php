<div class="container">
	<div class="row">
		<?php $this->load->view('pages/template/sidebar'); ?>
		<div class="col-sm-9">
			<div class="blog-post-area">
				<h2 class="title text-center"> <?= $title?></h2>
				<?php
				foreach ($blog_with_id as $key => $value) {
				?>
					<div class="single-blog-post">
						<h3><?= $value->title ?></h3>
						<div class="post-meta">
							<ul>
								<li><i class="fa fa-user"></i> admin</li>
								<li><i class="fa fa-clock-o"></i> <?= $value->date_created?></li>
					
							</ul>
							
						</div>
						<a href="">
							<img style="max-width: 150px; max-height: 150px" src="<?php echo base_url('uploads/post/' . $value->image) ?>" alt="">
						</a>
						<p> <?= $value->short_content ?></p>
						<a class="btn btn-primary" href="<?= base_url('blog-detail/' . $value->id . '/' . $value->slug) ?>">Read More</a>
					</div>
				<?php } ?>

				<div class="pagination-area">
					<ul class="pagination">
						<li><a href="" class="active">1</a></li>
						<li><a href="">2</a></li>
						<li><a href="">3</a></li>
						<li><a href=""><i class="fa fa-angle-double-right"></i></a></li>
					</ul>
				</div>
			</div>
		</div>

	</div>
</div>
