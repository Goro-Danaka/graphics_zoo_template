<?php if (!$subscription_plans_id): ?>
<div class="pink-part">
	
</div>
<?php endif ?>

<?php if ($subscription_plans_id == STRIPE_MONTH_SILVER_PLAN_ID): ?>
<div class="pink-part">	
	<div class="pricing-plan-wrapper">
		<div class="pricing-plan-header">
			<h4 class="title-heading">Premium</h4>
			<p class="pricing-plan-price"><span>$</span><?= STRIPE_MONTH_SILVER_PLAN_AMOUNT / 100 ?></p>
			<p class="pricing-plan-duration">/month</p>
			<h3 class="heading-pricing-plan">Monthly Silver Plan</h3>
		</div>
		<div class="pricing-plan-body">
			<h2 class="heading-secondary-red">Pay Today: $0.00</h2>
			<p class="text-red"><i>Plan amount will be charged after free trial</i></p>
			<img src="<?= SITE_IMAGES_URL . 'img/3day.png' ?>">
			<ul class="pricing-plan-feature">
				<li>14-Day 100% Risk-Free  Guarantee</li>
				<li>No Contract</li>
				<li>3 Day Turnaround</li>
			</ul>
		</div>
	</div>
</div>
<?php endif; ?>

<?php if ($subscription_plans_id == STRIPE_MONTH_GOLDEN_PLAN_ID): ?>
<div class="pink-part">
	<div class="pricing-plan-wrapper">
		<div class="pricing-plan-header">
			<h4 class="title-heading">Premium</h4>
			<p class="pricing-plan-price"><span>$</span><?= STRIPE_MONTH_GOLDEN_PLAN_AMOUNT / 100 ?></p>
			<p class="pricing-plan-duration">/month</p>
			<h3 class="heading-pricing-plan">Monthly Golden Plan</h3>
		</div>
		<div class="pricing-plan-body">
			<h2 class="heading-secondary-red">Pay Today: $0.00</h2>
			<p class="text-red"><i>Plan amount will be charged after free trial</i></p>
			<img src="<?= SITE_IMAGES_URL . 'img/1day.png' ?>">
			<ul class="pricing-plan-feature">
				<li>14-Day 100% Risk-Free  Guarantee</li>
				<li>No Contract</li>
				<li>1 Day Turnaround</li>
			</ul>
		</div>
	</div>
</div>

<?php endif; ?>

<?php if ($subscription_plans_id == STRIPE_YEAR_SILVER_PLAN_ID): ?>
<div class="pink-part">
	<div class="pricing-plan-wrapper">
		<div class="pricing-plan-header1">
			<h4 class="title-heading">Premium</h4>
			<p class="pricing-plan-price"><span>$</span><?= STRIPE_YEAR_SILVER_PLAN_AMOUNT / 100 ?></p>
			<p class="pricing-plan-duration">/year</p>
			<h3 class="heading-pricing-plan">Yearly Silver Plan</h3>
		</div>
		<div class="pricing-plan-body">
			<h2 class="heading-secondary-red">Pay Today: $0.00</h2>
			<p class="text-red"><i>Plan amount will be charged after free trial</i></p>
			<img src="<?= SITE_IMAGES_URL . 'img/3day.png' ?>">
			<ul class="pricing-plan-feature">
				<li>14-Day 100% Risk-Free  Guarantee</li>
				<li>No Contract</li>
				<li>3 Day Turnaround</li>
			</ul>
		</div>
	</div>
</div>

<?php endif; ?>

<?php if ($subscription_plans_id == STRIPE_YEAR_GOLDEN_PLAN_ID): ?>
<div class="pink-part">
	<div class="pricing-plan-wrapper">
		<div class="pricing-plan-header1">
			<h4 class="title-heading">Premium</h4>
			<p class="pricing-plan-price"><span>$</span><?= STRIPE_YEAR_GOLDEN_PLAN_AMOUNT / 100 ?></p>
			<p class="pricing-plan-duration">/year</p>
			<h3 class="heading-pricing-plan">Yearly Golden Plan</h3>
		</div>
		<div class="pricing-plan-body">
			<h2 class="heading-secondary-red">Pay Today: $0.00</h2>
			<p class="text-red"><i>Plan amount will be charged after free trial</i></p>
			<img src="<?= SITE_IMAGES_URL . 'img/1day.png' ?>">
			<ul class="pricing-plan-feature">
				<li>14-Day 100% Risk-Free  Guarantee</li>
				<li>No Contract</li>
				<li>1 Day Turnaround</li>
			</ul>
		</div>
	</div>
</div>
	
	<?php endif; ?>
	
		