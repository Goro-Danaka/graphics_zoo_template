<?php
	
	use Cake\Routing\Router;
?>

<header>
	<section class="header-top-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="header-top-items">
						<div class="header-top-single-item">
							We are available <span class="text-red">24/7</span>
						</div>
						<div class="header-top-single-item">
							Contact Us: <span class="text-red">123 456 7890</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section class="header-bottom-section with-shadow">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="header-logo">
						<a id="logo" href="<?= Router::url(['controller' => 'Pages', 'action' => 'index', 'prefix' => NULL], TRUE) ?>">
							<img src="<?= SITE_IMAGES_URL . 'img/logo.png' ?>">
						</a>
					</div>
					
					<nav class="main-nav">
						<ul>
							<li>
								<a href="<?= Router::url(['controller' => 'Pages', 'action' => 'index', 'prefix' => NULL], TRUE) ?>">Home</a>
							</li>
							<li>
								<a href="<?= Router::url(['controller' => 'Pages', 'action' => 'portfolio', 'prefix' => NULL], TRUE) ?>">Portfolio</a>
							</li>
							<li>
								<a href="<?= Router::url(['controller' => 'Pages', 'action' => 'pricing', 'prefix' => NULL], TRUE) ?>">Pricing</a>
							</li>
							<li>
								<a href="<?= Router::url(['controller' => 'Pages', 'action' => 'faq', 'prefix' => NULL], TRUE) ?>">FAQ</a>
							</li>
							<li>
								<a href="<?= Router::url(['controller' => 'Pages', 'action' => 'blog', 'prefix' => NULL], TRUE) ?>">Blog</a>
							</li>
							<li>
								<a href="<?= Router::url(['controller' => 'Pages', 'action' => 'aboutus', 'prefix' => NULL], TRUE) ?>">About Us</a>
							</li>
							<li class="active">
								<a href="<?= Router::url(['controller' => 'Pages', 'action' => 'login', 'prefix' => NULL], TRUE) ?>">Login</a>
							</li>
							<li>
								<a href="<?= Router::url(['controller' => 'Pages', 'action' => 'signup', 'prefix' => NULL], TRUE) ?>">Sign Up</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</section>
</header>
