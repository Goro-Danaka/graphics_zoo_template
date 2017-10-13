<?= $this->Flash->render() ?>

<!-- Main Area Starts -->
<main>
	
	<!-- Log In Page Section Starts -->
	<section class="log-in-section">
		<div class="container">
			<div class="row">
				<div class="col-sm-offset-4 col-sm-4">
					<img src="<?= SITE_IMAGES_URL . 'img/logo-big.png' ?>">					
					<p>Sign In</p>
					
					<?= $this->Form->create('', ['id' => 'form-validation']); ?>
					<input name="email" type="text" placeholder="email@example.com">
          <input name="password" type="password" placeholder="password">
					<a href="#">Forgot password?</a>
					<div class="clearfix"></div>
					<input type="submit" class="login-btn" value="login">
					<?= $this->Form->end(); ?>
					
				</div>
			</div>
		</div>
	</section>
	<!-- Log In Page Section Ends -->
	
</main>
<!-- Main Area Ends -->		

<script>fbq('track', 'Login');</script>