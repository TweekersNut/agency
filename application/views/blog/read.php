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
									<li><a target="_blank" class="footer-socials" href="https://www.facebook.com/sharer/sharer.php?u=<?= current_url() ?>"><i class="fab fa-facebook"></i></a></li>
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
										<li><a href="<?= base_url('blog/category/'.$v['id'].'/'.urlencode($v['name'])) ?>" <?php if($v['id'] == $post_data['category']):?> style='color:#20c997' <?php endif; ?> href="#"><?= ucfirst($v['name']) ?></a></li>
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
							<h4>Comments (<?= count($blog_post_comments) ?>)</h4>
						</div>
						<!--single blog coment text-->
						<div class="commnet-text">
							<?php foreach($blog_post_comments as $comment): ?>
								<?php $commentUserData = $this->usersModel->data($comment['user_id']); ?>

								<div class="single-comment">
									<div class="image-box">
										<img src="<?= ($commentUserData['avatar']) ? $commentUserData['avatar'] : base_url('assets/img/avatar/default.png') ?>" alt="<?= ($commentUserData['username']) ? $commentUserData['username'] : $comment['name'] ?>">
									</div>
									<div class="text-box">
										<h5><?= ($commentUserData['username']) ? $commentUserData['username'] : $comment['name'] . "({$comment['email']})"  ?></h5>
										<p><?= $comment['comment'] ?></p>
									</div>
								</div>

							<?php endforeach; ?>
						
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
						<?php if(($this->settings->get('blog_allow_guest_comment') == 1)): ?>
						<form method="post" action="" id='blog_post_comment'>
							<input type="text" name="name" placeholder="Name" required="true">
							<input type="email" name="email" placeholder="Email" required="true">
							<textarea cols="30" name="comment" rows="4" placeholder="Message" required="true"></textarea>
							<input type="hidden" name="post_id" value="<?= $this->uri->segment(3) ?>" />
							<input type="hidden" name="user_id" value="0" />
							<button type="submit" id="postcomment">post comment</button>
						</form>
						<?php elseif($this->session->has_userdata('isLoggedIn')): ?>
							<form method="post" action="" id='blog_post_comment'>
								<input type="text" name="name" placeholder="Name">
								<input type="email" name="email" placeholder="Email">
								<textarea cols="30" name="comment" rows="4" placeholder="Message"></textarea>
								<input type="hidden" name="post_id" value="<?= $this->uri->segment(3) ?>" />
								<input type="hidden" name="user_id" value="<?= $this->session->U_ID ?>" />
								<button type="submit" id="postcomment">post comment</button>
							</form>
						<?php else: ?>
							<h5>Comment's are disabled</h5>
						<?php endif; ?>
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
				<?php 
					$relatedPosts = $this->blogModel->relatedPosts($post_data['category']);
				?>
				<?php foreach($relatedPosts as $post): ?>
					<!-- single blog-->
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
						<div class="home-single-blog">
							<div class="s-blog-image">
								<img src="<?= $post['thumbnail'] ?>" alt="<?= $post['title'] ?>">
								<div class="blog-post-date">
									<span><?= blog_post_date($post['created_at']) ?></span>
								</div>
							</div>
							<div class="s-blog-content">
								<h4><?= $post['title'] ?></h4>
								<p>Lorem ipsum dolor sit amet adipisicing elit. Sunt enim, quas et libero excepturi!</p>
								<a href="#">Read More</a>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
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
						<a href="<?= base_url('contact') ?>">contact us</a>
					</div>
				</div>
			</div>
		</div>
	</div>