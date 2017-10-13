<?php
	
	use Cake\Routing\Router;
	
	$form_action = Router::url(['controller' => 'Pages', 'action' => 'signup'], TRUE);
?>
<!-- Intro -->
<!-- Pricing Header Section Starts -->
<main>
	<section class="pricing-header-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-xs-12">
					<h2 class="heading-primary-dark-large">PRICING</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-xs-12 text-center">
					<p class="para-primary-white">Sign up now for your Risk Free 14-day Trial and see what Graphics Zoo can do for you.</p>
				</div>
			</div>
		</div>
	</section>
	<!-- Pricing Header Section Ends -->
	
	
	
	<!-- Pricing Options Section Starts  -->
	<section class="pricing-options-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-xs-12 text-center">
					<div class="pricing-options-btn-wrapper">
						<a onclick="flipped('monthly')" class="pricing-options-btn active">Monthly</a>
						<a onclick="flipped('yearly')" class="pricing-options-btn">Annually</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Pricing Options Section Ends  -->
	
	
	
	<!-- Pricing Plan Section Starts -->
	<section class="pricing-plan-section text-center">
		<div class="container">
			<div class="row">
				
				<div class="card">
					<div class="col-sm-6 col-xs-12">
				
					<div class="monthly front">
						<div class="pricing-plan-wrapper">
							<div class="pricing-plan-header">
								<p class="pricing-plan-price"><span>$</span><?= STRIPE_MONTH_SILVER_PLAN_AMOUNT / 100 ?></p>
								<p class="pricing-plan-duration">/month</p>
								<h3 class="heading-pricing-plan">Monthly Silver Plan</h3>
							</div>
							<div class="pricing-plan-body">
								<img src="<?= SITE_IMAGES_URL?>img/3day.png" alt="" />
								<ul class="pricing-plan-feature">
									<li>14-Day 100% Risk-Free  Guarantee</li>
									<li>No Contract</li>
									<li>3 Day Turnaround</li>
									<li>Unlimited Graphic Designs</li>
									<li>Unlimited Revisions</li>
									<li>Quality Designers</li>
									<li>Dedicated Support</li>
								</ul>
								<?= $this->Form->create('', ['url' => $form_action, 'id' => 'form-validation', 'class' => 'plan_form', 'type' => 'put']); ?>
								<?php $this->Form->templates(NOWRAP_TEMPLATE); ?>
								<?= $this->Form->control('selected_subscrion_plan', ['type' => 'hidden', 'class' => 'form-control', 'label' => FALSE, 'value' => STRIPE_MONTH_SILVER_PLAN_ID]) ?>
								<?= $this->Form->control('GET STARTED TODAY', ['type' => 'submit', 'class' => 'pricing-plan-btn cd-select1', 'label' => FALSE]) ?>
								<?= $this->Form->end(); ?>
								
								<!--button class="pricing-plan-btn">GET STARTED TODAY</button-->
								
							</div>
							
						</div>
					</div>
					</div>
					
					<div class="col-sm-6 col-xs-12">
					<div class=" monthly front">
						<div class="pricing-plan-wrapper">
							<div class="pricing-plan-header">
								<p class="pricing-plan-price"><span>$</span><?= STRIPE_MONTH_GOLDEN_PLAN_AMOUNT / 100 ?></p>
								<p class="pricing-plan-duration">/month</p>
								<h3 class="heading-pricing-plan">Monthly Golden Plan</h3>
							</div>
							<div class="pricing-plan-body">
								<img src="<?= SITE_IMAGES_URL?>img/1day.png" alt="" />
								<ul class="pricing-plan-feature">
									<li>14-Day 100% Risk-Free  Guarantee</li>
									<li>No Contract</li>
									<li>1 Day Turnaround</li>
									<li>Unlimited Graphic Designs</li>
									<li>Unlimited Revisions</li>
									<li>Quality Designers</li>
									<li>Dedicated Support</li>
								</ul>
								<?= $this->Form->create('', ['url' => $form_action, 'id' => 'form-validation', 'class' => 'plan_form', 'type' => 'put']); ?>
								<?php $this->Form->templates(NOWRAP_TEMPLATE); ?>
								<?= $this->Form->control('selected_subscrion_plan', ['type' => 'hidden', 'class' => 'form-control', 'label' => FALSE, 'value' => STRIPE_MONTH_GOLDEN_PLAN_ID]) ?>
								<?= $this->Form->control('GET STARTED TODAY', ['type' => 'submit', 'class' => 'pricing-plan-btn cd-select1', 'label' => FALSE]) ?>
								<?= $this->Form->end(); ?>
							</div>
							
						</div>
					</div>
					</div>
					
					</div>	
					
					
					
					
					
					
					
					<!----yearly-------->
					<div class="card1" style="display:none">
					<div class="col-sm-6 col-xs-12">
					<div class="yearly back">
						<div class="pricing-plan-wrapper">
							<div class="pricing-plan-header1">
								<p class="pricing-plan-price"><span>$</span><?= STRIPE_YEAR_SILVER_PLAN_AMOUNT / 100 ?></p>
								<p class="pricing-plan-duration">/year</p>
								<h3 class="heading-pricing-plan">Yearly Silver Plan</h3>
							</div>
							<div class="pricing-plan-body">
								<img src="<?= SITE_IMAGES_URL?>img/3day.png" alt="" />
								<ul class="pricing-plan-feature">
									<li>14-Day Free  Guarantee</li>
									<li>No Contract</li>
									<li>3 Day Turnaround</li>
									<li>Unlimited Graphic Designs</li>
									<li>Unlimited Revisions</li>
									<li>Quality Designers</li>
									<li>Dedicated Support</li>
								</ul>
								<?= $this->Form->create('', ['url' => $form_action, 'id' => 'form-validation', 'class' => 'plan_form', 'type' => 'put']); ?>
								<?php $this->Form->templates(NOWRAP_TEMPLATE); ?>
								<?= $this->Form->control('selected_subscrion_plan', ['type' => 'hidden', 'class' => 'form-control', 'label' => FALSE, 'value' => STRIPE_YEAR_SILVER_PLAN_ID]) ?>
								<?= $this->Form->control('GET STARTED TODAY', ['type' => 'submit', 'class' => 'pricing-plan-btn cd-select1', 'label' => FALSE]) ?>
								<?= $this->Form->end(); ?>
							</div>
							
						</div>
					</div>
					</div>
					
					
				<div class="col-sm-6 col-xs-12">
								
					<div class="yearly back">
						<div class="pricing-plan-wrapper">
							<div class="pricing-plan-header1">
								<p class="pricing-plan-price"><span>$</span><?= STRIPE_YEAR_GOLDEN_PLAN_AMOUNT / 100 ?></p>
								<p class="pricing-plan-duration">/year</p>
								<h3 class="heading-pricing-plan">Yearly Golden Plan</h3>
							</div>
							<div class="pricing-plan-body">
								<img src="<?= SITE_IMAGES_URL?>img/1day.png" alt="" />
								<ul class="pricing-plan-feature">
									<li>14-Day 100% Risk-Free  Guarantee</li>
									<li>No Contract</li>
									<li>1 Day Turnaround</li>
									<li>Unlimited Graphic Designs</li>
									<li>Unlimited Revisions</li>
									<li>Quality Designers</li>
									<li>Dedicated Support</li>
								</ul>
								<?= $this->Form->create('', ['url' => $form_action, 'id' => 'form-validation', 'class' => 'plan_form', 'type' => 'put']); ?>
								<?php $this->Form->templates(NOWRAP_TEMPLATE); ?>
								<?= $this->Form->control('selected_subscrion_plan', ['type' => 'hidden', 'class' => 'form-control', 'label' => FALSE, 'value' => STRIPE_YEAR_GOLDEN_PLAN_ID]) ?>
								<?= $this->Form->control('GET STARTED TODAY', ['type' => 'submit', 'class' => 'pricing-plan-btn cd-select1', 'label' => FALSE]) ?>
								<?= $this->Form->end(); ?>
							</div>
							
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Pricing Plan Section Ends -->
	
	
	
	
	
	<!-- Pricing Bottom Section Starts -->
	<section class="pricing-bottom-section">
		<div class="container">
			<div class="col-md-12 col-xs-12 text-center">
				<span>OR</span>
				<a href="<?= Router::url(['controller' => 'Pages', 'action' => 'signup', 'prefix' => NULL], TRUE) ?>" class="pricing-bottom-btn btn">TRY RISK FREE FOR 14 DAYS</a>
			</div>
		</div>
	</section>
	<!-- Pricing Bottom Section Ends -->
	
</main>
<!-- Main Area Ends -->

<style>
.pricing-options-btn {
    cursor: pointer;
}
</style>

<script>fbq('track', 'Pricing');</script>


<?= $this->start('css'); ?>
<?php // echo $this->Html->css('../assets/pricing-tables-with-switcher/css/reset.css'); ?>
<?= $this->Html->css('../assets/pricing-tables-with-switcher/css/style.css'); ?>


<?= $this->end('css'); ?>

<?= $this->start('script'); ?>
<?= $this->Html->script('../assets/pricing-tables-with-switcher/js/modernizr.js'); ?>
<?= $this->Html->script('../assets/pricing-tables-with-switcher/js/main.js'); ?>

<script>
function flipped(value) {
	if(value=='monthly'){
		//jQuery('.card').toggleClass('flipped');
		jQuery('.card').css("display", "block");
		jQuery('.card1').css("display", "none");
	} else if(value=='yearly'){
		//jQuery('.card1').toggleClass('flipped');
		jQuery('.card').css("display", "none");
		jQuery('.card1').css("display", "block");
	}  
}

jQuery('.pricing-options-btn').click(function(){
	jQuery('.pricing-options-btn').removeClass("active");
	jQuery(this).addClass("active");
});
	
</script>


<?= $this->end('script'); ?>