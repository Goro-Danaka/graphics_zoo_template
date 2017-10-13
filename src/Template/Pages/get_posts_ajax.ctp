<?php

use Cake\Routing\Router;
?>
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
