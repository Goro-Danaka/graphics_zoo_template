<?php
	use Cake\Routing\Router;
?>

<!-- Main Area Starts -->
<main>		
	<!-- Sign Up Page Section Starts -->
	<section class="sign-up-section sign-up-2">
		<div class="container">
			<div class="row">
				<div class="col-sm-5">
					<div class="left-part">
						<div class="pink-part"></div>
						<div class="gray-part">
							<img src="<?= SITE_IMAGES_URL . 'img/logo-big.png' ?>">
						</div>
					</div>
					
				</div>
				
				
				<div class="col-sm-7">
					<div class="right-part">
					<div class="sign-up-form-wrapper">
						<?= $this->Form->create('', ['id' => '', 'class' => '']); ?>
            <?php $this->Form->templates(NOWRAP_TEMPLATE); ?>
						<div class="subscription-plan">
							<h2 class="sign-up-form-heading">Subscription Plan</h2>
							<?= $this->Form->control('subscription_plans_id', ['type' => 'select', 'options' => $subscription_plan_list, 'empty' => ['' => 'Please select a subscription plan'], 'class' => 'selectpicker', 'id' => 'subscription_plans_id', 'label' => FALSE, 'placeholder' => 'Email', 'value' => $selected_plan, 'required']) ?>
						</div>


						<div class="account-info">
							<h2 class="sign-up-form-heading">Account Info</h2>
							<div class="account-info-inputs-wrapper">
								<div class="account-info-input">
									<label>First name</label>
									<?= $this->Form->control('first_name', ['type' => 'text', 'class' => 'textInput box_round4 transition', 'label' => FALSE, 'required']) ?>
								</div>
								<div class="account-info-input">
									<label>Last name</label>
									<?= $this->Form->control('last_name', ['type' => 'text', 'class' => 'textInput box_round4 transition', 'label' => FALSE, 'required']) ?>
								</div>
							</div>
							<div class="account-info-inputs-wrapper">
								<div class="account-info-input">
									<label>Email Address</label>
									<?= $this->Form->control('email', ['type' => 'email', 'class' => 'textInput box_round4 transition', 'label' => FALSE, 'required']) ?>
								</div>
								<div class="account-info-input">
									<label>Password</label>
									<?= $this->Form->control('password', ['type' => 'password', 'class' => 'textInput box_round4 transition', 'label' => FALSE, 'required']) ?>
								</div>
							</div>
						</div>
						<div class="payment-method">
							<h2 class="sign-up-form-heading">Payment Method</h2>
							<div class="payment-method-inputs-wrapper">
								<div class="payment-method-input">
									<label>Card Number</label>
									<?= $this->Form->control('credit_card_number', ['type' => 'tel', 'id' => 'cc', 'class' => 'textInput box_round4 transition masked', 'label' => FALSE, 'placeholder' => 'XXXX XXXX XXXX XXXX', /*'pattern' => '\d{4} \d{4} \d{4} \d{4}',*/ 'required', 'maxlength'=>'16', 'minlength'=>'15']) ?>
									
								</div>
								<div class="payment-method-input exp_date">
									<label>Exp Date</label>
									<?= $this->Form->control('credit_card_expiry', ['type' => 'tel', 'id' => 'expiration1', 'class' => 'textInput box_round4 transition masked', 'label' => FALSE, 'placeholder' => 'MM/YYYY', 'pattern' => '(1[0-2]|0[1-9])\/\d\d\d\d', 'data-valid-example' => '11/2010', 'required']) ?>
								</div>
								<div class="payment-method-input">
									<label>Card CVC</label>
									<?= $this->Form->control('credit_card_cvc', ['type' => 'tel', 'id' => 'tel', 'class' => 'textInput box_round4 transition masked', 'label' => FALSE, 'placeholder' => 'XXXX', 'pattern' => '\\d{4}\\', 'required', 'maxlength'=>'4', 'minlength'=>'3']) ?>
								</div>
							</div> 
						</div>
						<div class="sign-up-form-bottom">
							<div class="sign-up-form-sumbit">
								<button>Sign Up Now</button>
							</div>
							<div class="sign-up-form-bottom-image">
								<?= $this->Html->image('img/payment-methods.png'); ?> 
							</div>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Sign Up Page Section Ends -->
</main>





<style>
.subscription-plan select {
    color: #EC3D56;
    width: 100%;
    padding: 5px 15px;
    border-radius: 24px;
    outline: none;
border:1px solid #1A3147;
}
input{
outline:none;
}
.subscription-plan select option {
    color: #000;
}
.pricing-plan-header1 {
    width: 100%;
    background-image: url(front_end/css/img/dark-bg.png);
    background-color: #1A3147;
    padding: 30px 0px 20px;
    background-position: 100% 143%;
    color: #ffffff;
}
p.pricing-plan-price, .pricing-plan-duration {
    color: #fff;
}
</style>




<script>fbq('track', 'Signup');</script>




<?= $this->start('script') ?>
<?= $this->Html->script('../assets/input-masking/js/masking-input.js', ['data-autoinit' => 'true']); ?>

<script>
	jQuery(document).ready(function ($) {
		
		$(document).on('change', '#subscription_plans_id', function () {
			var subscription_plans_id = $(this).val();
			if(subscription_plans_id){
				$('.gray-part').css("display", "none");
			}	else {
				$('.gray-part').css("display", "block");
			}
			$.ajax({
				url: "<?= Router::url(['controller' => 'Pages', 'action' => 'getPlanDetails'], TRUE) ?>",
				type: 'POST',
				data: {
					subscription_plans_id: subscription_plans_id
				},
				success: function (data, textStatus, jqXHR) {
					$('.left-part .pink-part').replaceWith(data);
				}
			});
		});
		
		$('#subscription_plans_id').trigger('change');
	});
</script>
<?= $this->end('script') ?>