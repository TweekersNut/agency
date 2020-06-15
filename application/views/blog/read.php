<div class="blog-hero-banner" style="background-image : url(<?= $post_data['avatar'] ?>)">
		<div class="blog-hero-banner-text">
			<h1><?= $post_data['title'] ?></h1>
			<p><?= $post_data['blurb'] ?></p>
		</div>
	</div>
	<div class="blog-body">
		<div class="container">
			<div class="row">
				<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
					<!--=============Left Side Bar==============-->
					<div class="left-side">
						<div class="blog-post-heading">
							<h1><?= $post_data['title'] ?>.</h1>
							<span class="publishe-date">published : <?= human_readable_date($post_data['created_at']) ?></span>
						</div>
						<!--single blog content-->
						<div class="blog-body-content">
							<?= $post_data['content'] ?>
							<!--single blog social share-->
							<div class="blog-share">
								<h4>Share It on</h4>
								<ul>
									<li><a class="footer-socials" href="#"><i class="fab fa-facebook"></i></a></li>
									<li><a class="footer-socials" href="#"><i class="fab fa-instagram"></i></a></li>
									<li><a class="footer-socials" href="#"><i class="fab fa-twitter"></i></a></li>
									<li><a class="footer-socials" href="#"><i class="fab fa-youtube"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!--=============Right Side Bar==============-->
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
					<div class="right-side">
						<!--single blog search-->
						<div class="blog-search">
							<form action="#">
								<input type="search" id="blog-search" placeholder="Search blogs">
								<button type="submit" class="blog-search-icon-small"><i class="fas fa-search"></i></button>

							</form>
						</div>
						<!--single blog author-->
						<div class="author-profile">
							<h3>about author</h3>
							<div class="author-content">
                                <?php
                                    $authorData = $this->usersModel->data($post_data['author']);
                                ?>
								<img src="<?= $authorData['avatar'] ?>" alt="<?= $authorData['username'] ?>">
								<h4><?= $authorData['f_name'] ?> <?= $authorData['l_name'] ?></h4>
								<!--span class="designation">Senior software Developer</span-->
								<p><?= $authorData['bio'] ?></p>
							</div>
						</div>
						<!--single blog category-->
						<div class="main-category">
							<h3>Category</h3>
							<div class="category-list">
								<ul>
                                    <?php if(count($blog_categories) > 0): ?>
                                        <?php foreach($blog_categories as $k => $v): ?>
                                            <li><a href="#"><?= ucfirst($v['name']) ?></a></li>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
									
								</ul>
							</div>
						</div>
						<!--single blog tag-->
						<div class="main-tags">
							<h3>Tags</h3>
							<div class="tag-list">
								<ul>
                                    <?php 
                                        $tags = json_decode($post_data['tags'],true);
                                        foreach($tags as $v):
                                    ?>
                                        <li><a href="#"><?= $v ?></a></li>
                                    <?php endforeach; ?>
									
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- single blog comments area-->
			<div class="row">
				<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
					<div class="blog-comments-area">
						<div class="comment-heading">
							<h4>Comments (03)</h4>
						</div>
						<!--single blog coment text-->
						<div class="commnet-text">
							<div class="single-comment">
								<div class="image-box">
									<img src="img/blog/thumb2.jpg" alt="">
								</div>
								<div class="text-box">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus, eaque sequi. Consequuntur accusantium pariatur voluptatem.</p>
									<a href="#" class="replay">reply</a>
									<div class="nesting-reply">
										<div class="image-box">
											<img src="img/blog/thumb1.jpg" alt="">
										</div>
										<div class="text-box">
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
											<a href="#" class="replay">reply</a>
										</div>
									</div>
								</div>
							</div>
							<div class="single-comment">
								<div class="image-box">
									<img src="img/blog/thumb3.jpg" alt="">
								</div>
								<div class="text-box">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus, eaque sequi. Consequuntur accusantium pariatur voluptatem.</p>
									<a href="#" class="replay">reply</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--single blog form-->
			<div class="row">
				<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
					<div class="comment-heading">
						<h4>leave comment</h4>
					</div>
					<div class="comment-field">
						<form action="#">
							<input type="text" placeholder="Name">
							<input type="email" placeholder="Email">
							<textarea cols="30" rows="4" placeholder="Message"></textarea>
							<button type="submit" id="postcomment">post comment</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- =========Blog area=========== -->
	<section>
		<div class="blog-area">
			<div class="container">
				<div class="row">
					<!--section heading-->
					<div class="col-xl-12 col-lg-12 col-md-12">
						<div class="section-heading-3">
							<h4> our related post</h4>
							<h3>related Blogs</h3>
						</div>
					</div>
				</div>
				<div class="row">
					<!-- single blog-->
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
						<div class="home-single-blog">
							<div class="s-blog-image">
								<img src="img/blog/1.jpg" alt="">
								<div class="blog-post-date">
									<span>08 jun</span>
								</div>
							</div>
							<div class="s-blog-content">
								<h4>Marketing Experties</h4>
								<p>Lorem ipsum dolor sit amet adipisicing elit. Sunt enim, quas et libero excepturi!</p>
								<a href="#">Read More</a>
							</div>
						</div>
					</div>
					<!-- single blog-->
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 margin-top-sb-30">
						<div class="home-single-blog">
							<div class="s-blog-image">
								<img src="img/blog/3.png" alt="">
								<div class="blog-post-date">
									<span>09 aug</span>
								</div>
							</div>
							<div class="s-blog-content">
								<h4>design Experties</h4>
								<p>Lorem ipsum dolor sit amet adipisicing elit. Sunt enim, quas et libero excepturi!</p>
								<a href="#">Read More</a>
							</div>
						</div>
					</div>
					<!-- single blog-->
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 margin-top-sb-30 margin-top-lb-30">
						<div class="home-single-blog">
							<div class="s-blog-image">
								<img src="img/blog/2.png" alt="">
								<div class="blog-post-date">
									<span>12 jul</span>
								</div>
							</div>
							<div class="s-blog-content">
								<h4>SEO Experties</h4>
								<p>Lorem ipsum dolor sit amet adipisicing elit. Sunt enim, quas et libero excepturi!</p>
								<a href="#">Read More</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
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
						<a href="#">contact us</a>
					</div>
				</div>
			</div>
		</div>
	</div>