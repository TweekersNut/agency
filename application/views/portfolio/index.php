<!-- =========Portfolio Image Area=========== -->
	<div class="portfolio-hero-banner">
		<div class="portfolio-hero-text">
			<h1>Highlights our works</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a viverra leo. </p>
		</div>
	</div>
	<div class="portfolio-main-area">
		<div class="container">
			<div class="row">
				<!-- portfolio filtering button -->
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
					<div class="portfolio-filter">
						<ul>
							<li class="active"><a href="#" data-filter="*"> All</a></li>
							<?php if(count($portfolio_cat_items) > 0): ?>
								<?php foreach ($portfolio_cat_items as $cat): ?>
									<li class=""><a href="#" data-filter=".cat_<?= $cat->id ?>"><?= $cat->name ?></a></li>
								<?php endforeach; ?>
							<?php endif; ?>
							
						</ul>
					</div>
				</div>
			</div>
			<div class="row grid">
				<?php //if(count($portfolio_items) > 0): ?>
					<?php foreach ($portfolio_items as $item): ?>
						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 cat_<?= $item->catID ?> default-margin-mt portfolio-headmove">
							<div class="single-portfolio">
								<div class="portfolio-image">
									<?php 
										$randomAvatar = json_decode($item->screenshots,true);
									?>
									<img src="<?= $randomAvatar[rand(0,(count($randomAvatar)-1))] ?>" alt="project_<?= $item->project_name ?>_image">
									<div class="portfolio-content">
										<p><?= substr($item->description,0,220) ?></p>
										<a href="<?= base_url('portfolio/read/'.($item->id).'/'. urlencode($item->project_name)) ?>">view details</a>
									</div>
								</div>
							</div>
							<div class="portfolio-titile">
								<h4><a href="<?= base_url('portfolio/read/'.($item->id).'/'. urlencode($item->project_name)) ?>" style="color:black"><?= $item->project_name ?>.</a></h4>
							</div>
						</div>		
					<?php endforeach; ?>
				<?php //endif; ?>
				<!-- single portfolio -->
				
				
			</div>
		</div>
		<!-- Pagination -->
		<div class="col-xl-12">
			<div class="next-previous-page">
				<nav aria-label="...">
					<ul class="pagination">
					<?= $links; ?>
						<!--li class="page-item disabled">
							<a class="page-link" href="#" tabindex="-1"> &#60; </a></li>
						<li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
						<li class="page-item">
							<a class="page-link" href="#">2</a>
						</li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item">
							<a class="page-link" href="#">&#62;</a>
						</li-->
					</ul>
				</nav>
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