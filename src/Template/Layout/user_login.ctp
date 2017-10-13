
<!DOCTYPE html>
<html lang="en">
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?php echo $this->fetch('title') ?>
        </title>
        <?= $this->fetch('meta') ?>

        <?= $this->element('login_css'); ?>

        <?= $this->fetch('css') ?>

    </head>
    <body>
        <!-- START CONTENT -->
        <?= $this->fetch('content'); ?>
        <div class="login_v2_reserved_text text-xs-center bold-fonts">
            <p>© <?= date('Y') ?>. all right reserved.</p>
        </div>

        <!-- Add default js element -->
        <?= $this->element('login_js'); ?>

        <!-- Personal page css   -->
        <?= $this->fetch('script') ?>
    </body>
</html>