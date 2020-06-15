<!-- =========Team Image Area=========== -->
	<div class="team-hero-banner">
		<div class="team-banner-text">
			<h1>our talented colleagues</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a viverra leo. </p>
		</div>
	</div>
	<div class="team-area">
		<div class="container">
			<div class="row">
				<!--section heading-->
				<div class="col-xl-12 col-lg-12 col-md-12">
					<div class="section-heading-3">
						<h4> meet the leaders</h4>
						<h3>the best team</h3>
					</div>
				</div>
			</div>
			<div class="row">
				<!--single team-->
				<?php if(count($team_members) > 0): ?>
					<?php foreach ($team_members as $member): ?>
						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
							<div class="single-team">
								<div class="team-image">
									<img src="<?= $member->avatar ?>" width="420px" height="480px" alt="<?= $member->name ?>">
									<div class="team-content">
										<div class="team-social">
											<?php $socialLinks = json_decode($member->social,true); ?>
											<ul>
												<li><a target="_blank" href="https://www.facebook.com/<?= $socialLinks['fb'] ?>"><i class="fab fa-facebook"></i></a></li>
												<li><a target="_blank" href="https://www.instagram.com/<?= $socialLinks['insta'] ?>"><i class="fab fa-instagram"></i></a></li>
												<li><a target="_blank" href="https://www.twitter.com/<?= $socialLinks['twitter'] ?>"><i class="fab fa-twitter"></i></a></li>
												<li><a target="_blank" href="https://www.youtube.com/<?= $socialLinks['youtube'] ?>"><i class="fab fa-youtube"></i></a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="person-name">
									<h4><?= $member->name ?></h4>
									<p><?= $member->position ?></p>
								</div>
							</div>
						</div>		
					<?php endforeach; ?>	
				<?php endif; ?>
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