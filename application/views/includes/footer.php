<!-- =========Footer Area=========== -->
	<section id="footer-fixed">
		<div class="big-footer">
			<div class="container">
				<div class="row">
					<!--footer logo-->
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
						<div class="footer-logo">
							<a href="#">
								<img src="<?= base_url('assets/') ?>img/footer-logo.png" alt="">
							</a>
							<p> We have both premium and free website templates. Build your professional website with us.</p>
						</div>
						<!--footer social-->
						<div class="social">
							<ul>
								<li><a class="footer-socials" href="#"><i class="fab fa-facebook"></i></a></li>
								<li><a class="footer-socials" href="#"><i class="fab fa-instagram"></i></a></li>
								<li><a class="footer-socials" href="#"><i class="fab fa-twitter"></i></a></li>
								<li><a class="footer-socials" href="#"><i class="fab fa-youtube"></i></a></li>
							</ul>
						</div>
					</div>
					<!--footer quick links-->
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
						<div class="footer-heading">
							<h3>quick links</h3>
						</div>
						<div class="footer-content">
							<ul>
								<li><a href="">about</a></li>
								<li><a href="">contact</a></li>
								<li><a href="">privacy</a></li>
								<li><a href="">our blog</a></li>
								<li><a href="">forum</a></li>
							</ul>
						</div>
					</div>
					<!--footer latest work-->
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
						<div class="footer-heading">
							<h3>Latest works</h3>
						</div>
						<div class="footer-content">
							<ul>
								<li><a href="">sparkel</a></li>
								<li><a href="">getparts</a></li>
								<li><a href="">youtuber</a></li>
								<li><a href="">smartco</a></li>
								<li><a href="">petcare</a></li>
							</ul>
						</div>
					</div>
					<!--footer subscribe-->
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
						<div class="footer-heading">
							<h3>Get Updates</h3>
						</div>
						<div class="footer-content footer-cont-mar-40">
							<form action="#">
								<input id="leadgenaration" type="email" placeholder="Enter your email">
								<input id="subscribe" type="submit" value="Subscribe">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--copyright-->
		<footer>
			<p><?= $copyrights . ' '. date('Y') ?></p>
		</footer>
	</section>
	<script>
		var BASE_URL = "<?= base_url() ?>"
	</script>
	<!-- Jquery JS -->
	<script src="<?= base_url('assets/') ?>js/vendor/jquery-2.2.4.min.js"></script>
	<!-- Proper JS -->
	<script src="<?= base_url('assets/') ?>js/popper.min.js"></script>
	<!-- Bootstrap Js -->
	<script src="<?= base_url('assets/') ?>js/bootstrap.min.js"></script>
	<!-- Video popup Js -->
	<script src="<?= base_url('assets/') ?>js/magnific-popup.min.js"></script>
	<!-- Waypoint Up Js -->
	<script src="<?= base_url('assets/') ?>js/waypoints.min.js"></script>
	<!-- Counter Up Js -->
	<script src="<?= base_url('assets/') ?>js/counterup.min.js"></script>
	<!-- Meanmenu Js -->
	<script src="<?= base_url('assets/') ?>js/meanmenu.min.js"></script>
	<!-- Animation Js -->
	<script src="<?= base_url('assets/') ?>js/aos.min.js"></script>
	<!-- Filtering Js -->
	<script src="<?= base_url('assets/') ?>js/isotope.min.js"></script>
	<!-- Background Move Js -->
	<script src="<?= base_url('assets/') ?>js/jquery.backgroundMove.js"></script>
	<!-- Slick Carousel Js -->
	<script src="<?= base_url('assets/') ?>js/slick.min.js"></script>
	<!-- ScrollUp Js -->
	<script src="<?= base_url('assets/') ?>js/scrollUp.js"></script>
	<!-- Main Js -->
	<script src="<?= base_url('assets/') ?>js/main.js"></script>
	<!-- Notify.js -->
	<script src="<?= base_url('assets/') ?>js/notify.js"></script>
	<!-- Pages Js -->
	<script src="<?= base_url('assets/') ?>js/pages/contact.js"></script>

</body>

</html>