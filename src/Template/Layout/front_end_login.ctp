<!DOCTYPE html>
<html class="background loginPage">
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?php
            if (isset($page_title)):
                echo $page_title;
            else:
                echo $this->fetch('title');
            endif;
            ?>            
        </title>
        <?= $this->fetch('meta') ?>
        <?= $this->Html->meta('icon'); ?>

        <?= $this->element('front_end/login_default_css'); ?>
        <?= $this->element('front_end/login_default_js'); ?>
        <?= $this->element('front_end/analytic'); ?>
    </head>

    <?php
    $bodyClass = '';
    if (isset($body_class)):
        $bodyClass = $body_class;
    endif;
    ?>

    <body class="<?= $bodyClass ?>">
        <?php // echo $this->element('front_end/login_mobile_menu'); ?>
        <?= $this->element('front_end/header'); ?>
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content'); ?>
        <?= $this->element('front_end/footer'); ?>
            <?= $this->element('front_end/default_js_bottom'); ?>
        <?php // echo $this->element('front_end/login_default_js_bottom'); ?>
        <?= $this->fetch('script') ?>
    </body>
    <script>
        jQuery(document).ready(function ($) {
            setTimeout(function () {
                $(".alert").fadeOut(1000);
            }, 1000);
        });
    </script>

</html>


