<?php

namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * Test helper
 */
class CustomHelper extends Helper {

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function getPortfolioFeaturedImageUrlUsingObj($portfolio) {
        $featured_image_url = '';
        if ($portfolio->portfolio_images):
            foreach ($portfolio->portfolio_images as $k => $portfolio_image):
                if ($portfolio_image->image_type == PORTFOLIO_FEATURED_IMAGE):
                    $featured_image_url = PORTFOLIO_IMAGE_URL . $portfolio->id . DS . $portfolio_image->image;
                    return $featured_image_url;
                endif;
            endforeach;
        endif;

        return $featured_image_url;
    }

    public function getPostFeaturedImageUrlUsingObj($post) {
        $featured_image_url = '';
        if ($post->image):
            $featured_image_url = POST_IMAGE_URL . $post->id . DS . $post->image;
        endif;
        return $featured_image_url;
    }

    public function checkActivePageFrontEnd($current_controller, $current_action, $controller_to_check, $action_to_check) {
        $active_item_class = '';
        if (strtolower($current_controller) == strtolower($controller_to_check)):
            if (strtolower($current_action) == strtolower($action_to_check)):
                $active_item_class = 'current-menu-item current_page_item';
            endif;
        endif;

        return $active_item_class;
    }

}
