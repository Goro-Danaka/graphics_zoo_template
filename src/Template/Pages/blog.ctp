<?php

use Cake\Routing\Router;
?>
<section class="pricing-header-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<h2 class="heading-primary-red-large">BLOG</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 col-xs-12 text-center">
				<p class="para-primary-white">Stay up to date with our latest blog posts.</p>
			</div>
		</div>
	</div>
</section>


<main class="articles">

<?php if ($posts): ?>
<?php foreach ($posts as $k => $post): 
//print_R($post);
$class = ($k%2 == 0)? 'odd': 'even';	
?>

<section class="blog-<?=$class;?>-section text-center">
	<div class="container">
		<div class="row">
			<?php if($class=='odd'){ ?>
			<div class="col-md-6 col-xs-12">
				<div class="blog-post-image">					
					<a class="thumbnail" href="<?= Router::url(['controller' => 'Pages', 'action' => 'posts', $post->id, 'prefix' => FALSE], TRUE); ?>">
							<?php
							$featured_image_url = '';
							$featured_image_url = $this->Custom->getPostFeaturedImageUrlUsingObj($post);
							if ($featured_image_url):
									echo $this->Html->image($featured_image_url, ['width' => '600', 'height' => '401', 'class' => 'attachment-medium size-medium']);
							endif;
							?>
					</a>
				</div>
			</div>
			<div class="col-md-6 col-xs-12">
				<div class="blog-post">
					<h3 class="heading-secondary-red">
							<a href="<?= Router::url(['controller' => 'Pages', 'action' => 'posts', $post->id, 'prefix' => FALSE], TRUE); ?>"><?= $post->title ?></a>
					</h3>	
					<?php //echo substr($post->body,0,100); 
					$mybody = substr($post->body,0,100);	
							$your_string_without_tags = strip_tags($post->body); 
							$your_200_char_string = substr($your_string_without_tags, 0, 100); 
							?>					
					<span><?= $your_200_char_string ?></span></br>			
					<a class="blog-btn" href="<?= Router::url(['controller' => 'Pages', 'action' => 'posts', $post->id, 'prefix' => FALSE], TRUE); ?>">Read More</a>
					
				</div>
			</div>
			<?php } else if($class=='even'){ ?>
			<div class="col-md-6 col-xs-12">
				<div class="blog-post">
					<h3 class="heading-secondary-red">
						<a href="<?= Router::url(['controller' => 'Pages', 'action' => 'posts', $post->id, 'prefix' => FALSE], TRUE); ?>"><?= $post->title ?></a>
					</h3>					 
					<?php //echo substr($post->body,0,100);
							$mybody = substr($post->body,0,100);	
							$your_string_without_tags = strip_tags($post->body); 
							$your_200_char_string = substr($your_string_without_tags, 0, 100); 
							//$mybody = htmlentities($mybody); ?>
					<span><?= $your_200_char_string ?></span></br>				
					<a class="blog-btn" href="<?= Router::url(['controller' => 'Pages', 'action' => 'posts', $post->id, 'prefix' => FALSE], TRUE); ?>">Read More</a>
					
				</div>
			</div>
			<div class="col-md-6 col-xs-12">
				<div class="blog-post-image">					
					<a class="thumbnail" href="<?= Router::url(['controller' => 'Pages', 'action' => 'posts', $post->id, 'prefix' => FALSE], TRUE); ?>">
							<?php
							$featured_image_url = '';
							$featured_image_url = $this->Custom->getPostFeaturedImageUrlUsingObj($post);
							if ($featured_image_url):
									echo $this->Html->image($featured_image_url, ['width' => '600', 'height' => '401', 'class' => 'attachment-medium size-medium']);
							endif;
							?>
					</a>
				</div>
			</div>
			
			<?php } ?>
			
		</div>
	</div>
</section>
<?php endforeach; ?>
<?php endif; ?>			
			
</main>			
			
<div class="load-more-wrapper clearfix">
		<?= $this->Form->hidden('page_no', ['id' => 'page_no', 'value' => 2]) ?>
		<a href="javascript:void(0)" data-page="1" data-ppp="10" class="button load-more-posts">Load more</a>
</div>




<script>fbq('track', 'Blog');</script>

<?= $this->start('script'); ?>
<script>
    jQuery(document).ready(function ($) {
        $(document).on('click', '.load-more-posts', function () {
            var is_disabled = $(this).attr('disabled');
            if (is_disabled != 'disabled') {
                var page_no = $('#page_no').val();
                $.ajax({
                    url: "<?= Router::url(['controller' => 'Pages', 'action' => 'getPostsAjax', 'prefix' => FALSE]) ?>",
                    type: 'POST',
                    data: {
                        page_no: page_no
                    },
                    success: function (data, textStatus, jqXHR) {
						console.log(data);
                        if (data!="") {

                            var num_posts = $(data).filter('.category-blog').length;
//                            console.log(num_posts);
                            $('#page_no').val(parseInt(page_no) + 1);
                            if (num_posts < 8) {
//                            $('.load-more-posts').hide();
                                $('.load-more-posts').attr('disabled', 'disabled');
                                $('.load-more-posts').text('No more posts.');
                            }
                            $('.articles').append(data);
                        } else {
                            $('.load-more-posts').attr('disabled', 'disabled');
                            $('.load-more-posts').text('No more posts2.');
                        }

                    }
                });
            }
        });
    });
</script>
<?= $this->end('script'); ?>