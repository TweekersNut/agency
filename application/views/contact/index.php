<!-- =========Contact Image Area=========== -->
	<div class="contact-hero-banner">
		<div class="contact-banner-text">
			<h1>Contact US</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In quis aliquet eros. Integer <br> placerat ultricesLorem ipsum dolor sit amet, consectetur adipiscing elit. In quis .</p>
		</div>
	</div>
	<div class="contactus-area">
		<div class="container">
			<div class="single-contact-area">
				<div class="row">
					<!--single contact-->
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
						<div class="single-contact-info">
							<div class="info-icon">
								<i class="far fa-envelope"></i>
							</div>
							<div class="info-content">
								<h6>Mail address</h6>
								<?php $counter = 0; ?>
								<?php foreach($mails as $mail): ?>
									<span><a style='color:black' href="mailto:<?= $mail ?>"><?= $mail ?></a></span>
									<?php if($counter !== (count($mails) - 1)): ?>
										<br />
									<?php endif; ?>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
					<!--single contact-->
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 margin-top-sb-30">
						<div class="single-contact-info">
							<div class="info-icon">
								<i class="fas fa-mobile-alt"></i>
							</div>
							<div class="info-content">
								<h6>Our Phone</h6>
								<?php $counter = 0; ?>
								<?php foreach($phones as $phone): ?>
									<span><a style='color:black' href="tel:<?= $phone ?>"><?= $phone ?></a></span>
									<?php if($counter !== (count($mails) - 1)): ?>
										<br />
									<?php endif; ?>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
					<!--single contact-->
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 margin-top-sb-30">
						<div class="single-contact-info large-mb-d">
							<div class="info-icon">
								<i class="fas fa-map-marker-alt"></i>
							</div>
							<div class="info-content">
								<h6>Our Location</h6>
								<?php $counter = 0; ?>
								<?php foreach($locations as $location): ?>
									<span><?= $location ?></span>
									<?php if($counter !== (count($mails) - 1)): ?>
										<br />
									<?php endif; ?>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--contact form area-->
			<div class="row">
				<div class="col-xl-12">
					<div class="contact-form-area">
						<!--contact left bg-->
						<div class="contact-left-bg">
							<img src="<?= base_url('assets/') ?>img/contact-p-2.png" alt="">
						</div>
						<div class="contact-form-heading">
							<h3>Leave a Message</h3>
						</div>
						<div class="contact-form">
							<form action="#" method="post" id="contact-form">
								<input type="text" name="f_name" placeholder="First Name" required="" minlength="3" maxlength="35">
								<input class="margin-top-lb-30 margin-top-sb-30" name="l_name" type="text" placeholder="Last Name" maxlength="35">
								<input type="email" placeholder="Enter your email" name="email" required="" maxlength="50" minlength="11">
								<textarea placeholder="Write your message" id="contact_message" name="msssage" required="" minlength="10" maxlength="500"></textarea>
								<div class="send-btn">
									<input type="submit" value="send me" id="formsend">
								</div>
							</form>
						</div>
						<!--contact right bg-->
						<div class="contact-right-bg">
							<img src="<?= base_url('assets/') ?>img/contact-p-1.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>