<?php

use Cake\Routing\Router;

$loggedUser = $this->request->session()->read('Auth.User');
?>
<nav class="mobile-nav">
    <i class="icon-close"></i>
    <ul id="menu-main-menu" class="menu">
        <li id="menu-item-442" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home page_item">
            <a href="<?= Router::url(['controller' => 'Pages', 'action' => 'index', 'prefix' => NULL], TRUE) ?>">Home</a>
        </li>
        <li class="menu-item menu-item-type-post_type menu-item-object-page page_item">
            <a href="<?= Router::url(['controller' => 'Pages', 'action' => 'portfolio', 'prefix' => NULL], TRUE) ?>">Portfolio</a>
        </li>
        <li id="menu-item-2256" class="menu-item menu-item-type-post_type menu-item-object-page">
            <a href="<?= Router::url(['controller' => 'Pages', 'action' => 'pricing', 'prefix' => NULL], TRUE) ?>">Pricing</a>
        </li>
        <li id="menu-item-2640" class="menu-item menu-item-type-post_type menu-item-object-page">
            <a href="<?= Router::url(['controller' => 'Pages', 'action' => 'faq', 'prefix' => NULL], TRUE) ?>">FAQ</a>
        </li>
        <li id="menu-item-440" class="menu-item menu-item-type-post_type menu-item-object-page">
            <a href="<?= Router::url(['controller' => 'Pages', 'action' => 'blog', 'prefix' => NULL], TRUE) ?>">Blog</a>
        </li>
        <li id="menu-item-2640" class="menu-item menu-item-type-post_type menu-item-object-page">
            <a href="<?= Router::url(['controller' => 'Pages', 'action' => 'aboutus', 'prefix' => NULL], TRUE) ?>">About Us</a>
        </li>
        <?php if ($loggedUser): ?>
            <li id="menu-item-2258" class="menu-item menu-item-type-custom menu-item-object-custom">
                <a href="<?= Router::url(['controller' => 'Users', 'action' => 'logout', 'prefix' => NULL], TRUE) ?>">Logout</a>
            </li>
        <?php else: ?>
            <li id="menu-item-2258" class="menu-item menu-item-type-custom menu-item-object-custom">
                <a href="<?= Router::url(['controller' => 'Pages', 'action' => 'login', 'prefix' => NULL], TRUE) ?>">Login</a>
            </li>
            <li id="menu-item-2258" class="last menu-item menu-item-type-custom menu-item-object-custom">
                <a href="<?= Router::url(['controller' => 'Pages', 'action' => 'signup', 'prefix' => NULL], TRUE) ?>">Sign Up</a>
            </li>
        <?php endif; ?>
    </ul>	
</nav>
