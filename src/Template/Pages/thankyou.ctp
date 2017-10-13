<?php

use Cake\Routing\Router;
?>
<section class="intro bg-grey   pad-top-60 pad-bot-60">
    <div class="thankyou-box">
        <center>
            <?= $this->Html->image('check.png', ['class' => 'img-responsive success-img']); ?>
            <h2 class="thank-u-message"><b>Thank You!</b></h2>
            <p>Your Order has been Successfully Confirm </p>
            <?= $this->Html->link('Take me to Dashboard', Router::url(['controller' => 'Pages', 'action' => 'login'], TRUE), ['class' => 'button white']) ?>
        </center>
    </div>
</section>
<?php if (@$plan_amount): ?>
    <script>
        fbq('track', 'Purchase', {
            value: '<?= $plan_amount ?>',
            currency: 'USD'
        });
    </script>
<?php endif; ?>

<?= $this->start('css'); ?>
<style>
    .success-img {
        height: 80px;
        margin-bottom: 20px;
    }
    .thank-u-message {
        /*font-size: 30px;*/
        margin-bottom: 20px;
    }  
    .thankyou-box{
        padding: 100px 0px;
    }
</style>
<?= $this->end('css'); ?>