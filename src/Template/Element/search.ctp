<?php

use Cake\Routing\Router;
?>
<div class="search-overlay">
    <div class="float-default search">
        <div class="search_bg"></div>
        <div class="right-icon search_box">

            <div class="search-div">
                <input type="text" class="search_input">
                <label class="search-input-label">
                    <span class="input-label-title">Search</span>
                </label>
            </div>
            <div class="divider50"></div>
            <div class="search-result">
                <div class="search-item">
                    <div class="search-image float-xs-left">
                        <img src="<?= Router::url(THEME_IMAGES . 'img_640x450.png'); ?>" alt="search-image">
                    </div>
                    <div class="search-info float-xs-right">
                        <h3 class="title">Search here</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse faucibus diam quis arcu
                            lobortis sagittis. Etiam eu ornare mi. Interdum et malesuada fames ac ante ipsum primis in
                            faucibus.</p>
                    </div>
                </div>
                <div class="divider15"></div>
                <div class="search-item">
                    <div class="search-info search-full float-xs-right">
                        <h3 class="title">Admin templates</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse faucibus diam quis arcu
                            lobortis sagittis. Etiam eu ornare mi. Interdum et malesuada fames ac ante ipsum primis in
                            faucibus.</p>
                    </div>
                </div>
                <div class="divider15"></div>
                <div class="search-item">
                    <div class="search-image float-xs-left">
                        <img src="<?= Router::url(THEME_IMAGES . 'img_640x450.png'); ?>" alt="search-image">
                    </div>
                    <div class="search-info float-xs-right">
                        <h3 class="title">Books</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse faucibus diam quis arcu
                            lobortis sagittis. Etiam eu ornare mi. Interdum et malesuada fames ac ante ipsum primis in
                            faucibus.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="search_close icon_close"></div>
    </div>
</div>
<!-- END HEADER -->