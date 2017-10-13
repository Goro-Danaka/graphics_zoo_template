<?php

use Cake\Routing\Router;

$loggedUser = $this->request->session()->read('Auth.User');

$current_controller = $this->request->params['controller'];
$current_action = $this->request->params['action'];

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
									Contact Us: <span class="text-red">888-976-2747</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="header-bottom-section <?if($current_action=='login'||$current_action=='signup'){ echo 'with-shadow'; }?>">
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-xs-12">
							<div class="header-logo">
								<a class="main-logo" href="<?= Router::url(['controller' => 'Pages', 'action' => 'index', 'prefix' => NULL], TRUE) ?>"><img src="<?= SITE_IMAGES_URL . 'img/logo.png' ?>" alt="" /></a>
							</div>
				<span class="toggle_menu"><i class="fa fa-bars" aria-hidden="true"></i><i class="fa fa-times-circle-o" aria-hidden="true"></i>
</span>
<div class="navigation_menu">
		<nav class="main-nav">
		<ul>
		<li class=" page_item <?if($current_action=='index'){ echo 'active'; }?> <?= $this->Custom->checkActivePageFrontEnd($current_controller, $current_controller, 'Pages', 'index'); ?>">
		<a href="<?= Router::url(['controller' => 'Pages', 'action' => 'index', 'prefix' => NULL], TRUE) ?>">Home</a>
		</li>
		<li class=" <?if($current_action=='portfolio'){ echo 'active'; }?> ">
		<a href="<?= Router::url(['controller' => 'Pages', 'action' => 'portfolio', 'prefix' => NULL], TRUE) ?>">Portfolio</a>
		</li>
		<li class=" <?if($current_action=='pricing'){ echo 'active'; }?> ">
		<a href="<?= Router::url(['controller' => 'Pages', 'action' => 'pricing', 'prefix' => NULL], TRUE) ?>">Pricing</a>
		</li>
		<li class=" <?if($current_action=='faq'){ echo 'active'; }?> ">
		<a href="<?= Router::url(['controller' => 'Pages', 'action' => 'faq', 'prefix' => NULL], TRUE) ?>">FAQ</a>
		</li>
		<li class=" <?if($current_action=='blog'){ echo 'active'; }?> ">
		<a href="<?= Router::url(['controller' => 'Pages', 'action' => 'blog', 'prefix' => NULL], TRUE) ?>">Blog</a>
		</li>
		<li class=" <?if($current_action=='aboutus'){ echo 'active'; }?> ">
		<a href="<?= Router::url(['controller' => 'Pages', 'action' => 'aboutus', 'prefix' => NULL], TRUE) ?>">About Us</a>
		</li>
		<?php if ($loggedUser): ?>
		<li class=" <?if($current_action=='logout'){ echo 'active'; }?> ">
		<a href="<?= Router::url(['controller' => 'Users', 'action' => 'logout', 'prefix' => NULL], TRUE) ?>">Logout</a>
		</li>
		<li class=" <?if($current_action=='login'){ echo 'active'; }?> ">
		<a href="<?= Router::url(['controller' => 'Pages', 'action' => 'login', 'prefix' => NULL], TRUE) ?>">Dashboard</a>
		</li>
		<?php else: ?>
		<li class=" <?if($current_action=='login'){ echo 'active'; }?> ">
		<a href="<?= Router::url(['controller' => 'Pages', 'action' => 'login', 'prefix' => NULL], TRUE) ?>">Login</a>
		</li>
		<li class=" <?if($current_action=='signup'){ echo 'active'; }?> signlink">
		<a  href="<?= Router::url(['controller' => 'Pages', 'action' => 'signup', 'prefix' => NULL], TRUE) ?>">Sign Up</a>
		</li>
		<?php endif; ?>
		</ul>
		</nav></div>
						</div>
					</div>
				</div>
			</section>
			</header>
