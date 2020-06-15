<!-- =========Single Portfolio Details=========== -->
	<div class="portfolio-details">
		<div class="container">
			<div class="portfolio-details-box">
				<div class="row">
					<!--single project slider-->
					<div class="col-xl-6 col-lg-6 col-md-12">
						<div class="single-project-slider">
							<?php $screenshots = json_decode($portfolio_item->screenshots,true); ?>
							<?php if(count($screenshots) > 0): ?>
								<?php for($index = 0; $index < count($screenshots);$index++){ ?>
									<div class="portfolio-screenshot">
										<img src="<?= $screenshots[$index] ?>" alt="">
									</div>
								<?php } ?>
							<?php endif; ?>
						
						</div>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-12">
						<!--single project name-->
						<div class="project-name">
							<h3>Project name</h3>
							<p><?= $portfolio_item->project_name ?></p>
						</div>
						<!--single project description-->
						<div class="project-description">
							<h3>Description</h3>
							<?= $portfolio_item->description ?>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<!--single project description-->
				<div class="col-xl-6">
					<div class="project-brief">
						<div class="project-description">
							<h3>Challanges we face</h3>
							<?= $portfolio_item->problem ?>
						</div>
						<div class="project-description margin-top-project">
							<h3>Solution we made</h3>
							<?= $portfolio_item->solution ?>
						</div>
					</div>
				</div>
								<div class="col-xl-6">
				<!--single project technology-->
				<div class="project-technology">
					<h3>Technology we used</h3>
					<ul>
						<?php $tech = json_decode($portfolio_item->tech_used,true); ?>
						<?php if(count($tech) > 0): ?>
							<?php foreach ($tech as $key => $val): ?>
								<li><?= ucfirst($val) ?></li>
							<?php endforeach; ?>
						<?php endif; ?>
					</ul>
				</div>
				<!--single project info-->
					<div class="project-info">
						<h3>Project Info</h3>
						<h4>client: <span><?= $portfolio_item->client ?></span></h4>
						<h4>Budget: <span>$ <?= $portfolio_item->budget ?></span></h4>
						<h4>Category: <span><?= $portfolio_item->catName ?></span></h4>
						<h4>Date: <span><?= date_format(date_create($portfolio_item->date),"d/F/Y")  ?></span></h4>
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
						<a href="#">contact us</a>
					</div>
				</div>
			</div>
		</div>
	</div>