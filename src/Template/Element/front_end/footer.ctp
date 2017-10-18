<?php

use Cake\Routing\Router;
?>

<!-- Footer Area Starts -->
		<footer>
			<section class="footer-top-section">
				<div class="container">
					<div class="row">
						<div class="col-md-3 text-center">
							<div class="footer-logo">
								<img src="<?= SITE_IMAGES_URL?>img/logo-white.png" alt="" />
								<p>We are an unlimited graphic design team based in <span class="text-red">Houston, TX.</span></p>
							</div>
						</div>
						<div class="col-md-3">
							<div class="footer-top-wrapper">
								<h2 class="heading-footer">THE ZOO</h2>
								<nav class="footer-nav">
									<ul>
									
										<li><a href="<?= Router::url(['controller' => 'Pages', 'action' => 'aboutus', 'prefix' => NULL], TRUE) ?>">About us</a></li>
										<li><a href="<?= Router::url(['controller' => 'Pages', 'action' => 'portfolio', 'prefix' => NULL], TRUE) ?>">Portfolio</a></li>
										<li><a href="<?= Router::url(['controller' => 'Pages', 'action' => 'pricing', 'prefix' => NULL], TRUE) ?>">Pricing</a></li>
									</ul>
								</nav>
							</div>
						</div>
						<div class="col-md-3">
							<div class="footer-top-wrapper">
								<h2 class="heading-footer">Resources</h2>
								<nav class="footer-nav">
									<ul>
										<li><a href="<?= Router::url(['controller' => 'Pages', 'action' => 'index', 'prefix' => NULL], TRUE) ?>#how-it-works">How it Works</a></li>
										<li><a href="<?= Router::url(['controller' => 'Pages', 'action' => 'blog', 'prefix' => NULL], TRUE) ?>">Blog</a></li>
										<li><a href="<?= Router::url(['controller' => 'Pages', 'action' => 'faq', 'prefix' => NULL], TRUE) ?>">FAQs</a></li>
										<li><a href="<?= Router::url(['controller' => 'Pages', 'action' => 'contactus', 'prefix' => NULL], TRUE) ?>">Contact Us</a></li>
									</ul>
								</nav>
							</div>
						</div>
						<div class="col-md-3">
							<div class="footer-top-wrapper">
								<h2 class="heading-footer">Extras</h2>
								<nav class="footer-nav">
									<ul>
										<li><a href="<?= Router::url(['controller' => 'Pages', 'action' => 'login`', 'prefix' => NULL], TRUE) ?>">Login</a></li>
										<li><a href="<?= Router::url(['controller' => 'Pages', 'action' => 'signup1', 'prefix' => NULL], TRUE) ?>">Sign-up</a></li>
										<li><a href="<?= Router::url(['controller' => 'Pages', 'action' => 'termsAndConditions', 'prefix' => NULL], TRUE) ?>">Terms and Conditions</a></li>
										<li><a href="<?= Router::url(['controller' => 'Pages', 'action' => 'privacyPolicy', 'prefix' => NULL], TRUE) ?>">Privacy Policy</a></li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</section>
			
			<section class="footer-bottom-section">
				<div class="container">
					<div class="row">
						<div class="col-md-3">
							<p>We are available <span class="text-red"> 24/7</span> <br />Contact Us: <span class="text-red">  888-976-2747</span></p>
						</div>
						<div class="col-md-6">
							<div class="footer-right-reserve text-center">
								<p>All Rights Reserved © 2017 Graphics Zoo</p>
								<!--<ul class="social-icons">
									<li><a href="#"><img src="<?= SITE_IMAGES_URL?>img/fb.png" alt="" /></a></li>
									<li><a href="#"><img src="<?= SITE_IMAGES_URL?>img/twitter.png" alt="" /></a></li>
									<li><a href="#"><img src="<?= SITE_IMAGES_URL?>img/insta.png" alt="" /></a></li>
									<li><a href="#"><img src="<?= SITE_IMAGES_URL?>img/linkedin.png" alt="" /></a></li>
								</ul>-->
							</div>
						</div>
					</div>
				</div>
			</section>
		</footer>
		<!-- Footer Area Ends -->

<script>
jQuery(".toggle_menu").click(function(){
    jQuery(".main-nav").toggleClass("mobile_menu");
    jQuery(this).toggleClass("close_ico");
});
jQuery(window).load(function () {
jQuery('.exp_date label').insertBefore('#expiration1Mask');
});
</script>