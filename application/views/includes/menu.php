<!--=========== Main Header area ===============-->
	<header id="home">
		<div class="main-navigation">
			<div class="container">
				<div class="row">
					<!-- logo-area-->
					<div class="col-xl-2 col-lg-3 col-md-3">
						<div class="logo-area">
							<a href="<?= base_url('home') ?>"><img src="<?= base_url('assets/') ?>img/logo.png" alt="<?= $this->settings->get('app_name') ?>"></a>
						</div>
					</div>
					<!-- mainmenu-area-->
					<div class="col-xl-10 col-lg-9 col-md-9">
						<div class="main-menu f-right">
							<nav id="mobile-menu">
								<ul>
									<li>
										<a class="" href="<?= base_url('home'); ?>">home</a>
									</li>
									<li>
										<a href="<?= base_url('about') ?>">about</a>
									</li>
									<li>
										<a href="<?= base_url('team') ?>">team</a>
									</li>
									<li>
										<a href="<?= base_url('portfolio') ?>">portfolio</a>
									</li>
									<li>
										<a href="<?= base_url('blog') ?>">blog</a>
									</li>
									<!-- dropdown menu-area>
									<li>
										<a href="#" onclick="return false">pages <i class="fas fa-angle-down"></i>
										</a>
										<ul class="dropdown">
											<li><a href="about-us.html">about us</a></li>
											<li><a href="portfolio.html">portfolio</a></li>
											<li><a href="portfolio2.html">portfolio two</a></li>
											<li><a href="single-portfolio.html">single portfolio</a></li>
											<li><a href="blog.html">blog page</a></li>
											<li><a href="single-blog.html">single blog</a></li>
											<li><a href="single-blog2.html">single blog two</a></li>
											<li><a href="team.html">our team</a></li>
											<li><a href="contact.html">contact us</a></li>
											<li><a href="404.html">404 Page</a></li>
										</ul>
									</li-->
									<li>
										<a href="<?= base_url('contact'); ?>">contact</a>
									</li>
								</ul>
							</nav>
						</div>
						<!-- mobile menu-->
						<div class="mobile-menu"></div>
						<!--Search-->
						<div class="search-box-area">
							<div id="search" class="fade">
								<a href="#" class="close-btn" id="close-search">
									<em class="fa fa-times"></em>
								</a>
								<input placeholder="what are you looking for?" id="searchbox" type="search" />
							</div>
							<div class="search-icon-area">
								<a href='#search'>
									<i class="fa fa-search"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- =========Header Content Area=========== -->