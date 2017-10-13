<main>
	
	<!-- Portfolio Header Section Starts -->
	<section class="portfolio-header-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="heading-primary-red-large">PORTFOLIO</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 text-center">
					<p class="para-primary-white">Showcase of Our Awesome Works.</p>
				</div>
			</div>
		</div>
	</section>
	<!-- Portfolio Header Section Ends -->
	
	<!-- Portfolio Page Section Starts  -->
	<section class="portfolio-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-xs-12 text-center">
					<div class="portfolio-options-btn-wrapper" >
						
						<!--<a href="#" class="portfolio-options-btn notJump active filter" data-filter="*">Show All</a>
						<?php //if ($portfolio_categories): ?>
						<?php //foreach ($portfolio_categories as $k => $portfolio_category): ?>
						<a href="#" data-filter=".pf-<?= $portfolio_category->id ?>" class="portfolio-options-btn notJump filter"><?= $portfolio_category->name ?></a>-->
						<?php //endforeach; ?>
						<?php //endif; ?>
			
					</div>
				</div>
			</div>
			
			
			<?php if ($portfolios): ?>
			<div class="row">
				<div class="portfolio-item-wrapper">
					<?php foreach ($portfolios as $k => $portfolio): ?>                  
					<?php
						$filter_class = '';
						if (isset($portfolio->portfolio_category)):
						$filter_class = 'pf-' . $portfolio->portfolio_category->id;
						endif;
					?>
					<div class="mix <?= $filter_class ?>">

						<a class="uduf_vip" href="<?php echo $this->Custom->getPortfolioFeaturedImageUrlUsingObj($portfolio); ?>">
							<?php
								$featured_image_url = '';
								$featured_image_url = $this->Custom->getPortfolioFeaturedImageUrlUsingObj($portfolio);
								if ($featured_image_url):
								echo $this->Html->image($featured_image_url, ['alt' => $portfolio->title]);
								endif;
							?>
</a>
						
					</div>
					<?php endforeach; ?>
					
				</div>
			</div>
			<?php endif; ?>
			
			
			
		</div>
	</section>
	<!-- Portfolio Page Section Ends  -->
	
	
	
	<!-- Try Graphics Section Starts -->
	<section class="try-graphics-light-section text-center">
		<h2 class="heading-primary-red">TRY GRAPHICS  ZOO NOW!</h2>
		<button class="try-graphics-btn">GET STARTED TODAY</button>
	</section>
	<!-- Try Graphics Section Ends -->
	
</main>

<?= $this->start('css'); ?>
<?= $this->Html->css('../front_end/css/viewbox.css'); ?>
<?= $this->end('css'); ?>


<?= $this->start('script'); ?>
<?= $this->Html->script('../front_end/canvas/js/functions.js'); ?>
<?= $this->Html->script('../front_end/canvas/js/plugins.js'); ?>
<?= $this->Html->script('../front_end/js/jquery.viewbox.min.js'); ?>
<?= $this->end('script'); ?>

<script>fbq('track', 'Portfolio');</script>
<script>
jQuery(function(){
	jQuery('.uduf_vip').viewbox();
});
</script>
