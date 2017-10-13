<!DOCTYPE html>
<html>
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

        <?= $this->element('front_end/default_css'); ?>
        <?= $this->fetch('css'); ?>
        <?= $this->element('default_js'); ?>
        <?= $this->element('front_end/analytic'); ?>
    </head>

    <?php
    $bodyClass = '';
    if (isset($body_class)):
        $bodyClass = $body_class;
    endif;
    ?>

    <body class="<?= $bodyClass ?>">
        <?= $this->element('front_end/mobile_menu'); ?>
        <div class="wrap">          
            <?= $this->element('front_end/header'); ?>
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content'); ?>
            <?= $this->element('front_end/footer'); ?>
            <?= $this->element('front_end/default_js_bottom'); ?>
        </div>
        <?= $this->fetch('script') ?>
        <script>
            jQuery(document).ready(function ($) {
                setTimeout(function () {
                    $(".alert").fadeOut(1000);
                }, 1000);
            });
        </script>
    </body>

</html>


