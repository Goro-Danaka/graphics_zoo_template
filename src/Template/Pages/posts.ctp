<section class="intro bg-grey intro-plain ">
    <div class="inner pad-top-80 pad-bot-40">
        <div class="intro-copy inner-700 center">
            <h1><?= $post->title ?></h1>
            <p>
                <span><?= $post->created->format(DATE_FORMAT_POST_CREATED); ?><span></span></span></p>
        </div>
    </div>
</section>

<section class="content blog">
    <div class="inner">
        <div class="article-wrapper clearfix">
            <div class="post-copy content">
                <div class="post-content clearfix">
                    
                    <p>
                        <?php
                        $featured_image_url = '';
                        $featured_image_url = $this->Custom->getPostFeaturedImageUrlUsingObj($post);
                        if ($featured_image_url):
                            echo $this->Html->image($featured_image_url, ['class' => 'aligncenter size-full', 'width' => '500', 'height' => '534']);
                        endif;
                        ?>
                    </p>
					<p><?= $post->body ?></p>
                </div>                           
            </div>           
        </div>       
    </div>  
</section>


<section class="layer bg-grey section-header bg-black dark footer">
    <div class="inner pad-top-60">
        <div class="section-head center ">
            <h2>CONTACT</h2>
            <p>We are a unlimited graphic design team based in Houston, TX.</p>
        </div>
    </div>
</section>

<script>fbq('track', 'Post');</script>