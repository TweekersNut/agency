<!-- =========Blog Image Area=========== -->
<div class="blog-home-page">
		<div class="blog-hero-home">
			<div class="blog-home-text">
				<h1>read our stories</h1>
				<p> </p>
			</div>
		</div>
		<div class="container">
			<div class="main-blog-list">
			<div class="row">
				<div class="col-xl-12">
					<div class="section-heading-3">
						<h4> read blogs</h4>
						<h3>blog list page</h3>
					</div>
				</div>
			</div>
				<div class="row">
					<!-- single blog-->
                    <?php if(count($blog_posts) > 0): ?>
                        <?php foreach($blog_posts as $k => $v): ?>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                <div class="home-single-blog">
                                    <div class="s-blog-image">
                                        <img src="<?= $v['thumbnail'] ?>" alt="<?= $v['title'] ?>">
                                        <div class="blog-post-date">
                                            <span><?= blog_post_date($v['created_at']) ?></span>
                                        </div>
                                    </div>
                                    <div class="s-blog-content">
                                        <h4><?= $v['title'] ?></h4>
                                        <p><?= $v['blurb'] ?></p>
                                        <a href="<?= base_url('blog/read/'. $v['id']) ?>">Read More</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <h4>No Posts Found. Come back later.</h4>
                    <?php endif; ?>
				</div>
				<!-- Pagination -->
				<div class="col-xl-12">
					<div class="next-previous-page">
						<nav aria-label="...">
							<?= $links; ?>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- =========Call to Action=========== -->
<div class="callto-action">
		<div class="container">
			<div class="row">
				<div class="col-xl-8 col-lg-8 col-md-8 col-sm-7">
					<div class="callto-action-text">
						<h5>Like what you see? <span>Let’s work</span> </h5>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-5">
					<div class="callto-action-btn">
						<a href="<?= base_url('contact') ?>">contact us</a>
					</div>
				</div>
			</div>
		</div>
	</div>