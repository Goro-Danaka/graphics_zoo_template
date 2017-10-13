<?php
$class = 'message';
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<!--<div class="<?php // h($class)        ?>" onclick="this.classList.add('hidden');"><?php $message ?></div>-->

<!--<div class="<?php // h($class)     ?>" onclick="this.classList.add('hidden');" role="alert">
    <i class="fa fa-check"></i>
    <div class="float-xs-left">
        <strong>Warning</strong> <?php // $message    ?>
    </div>
</div>-->
<!--<div class="<?php // echo h($class)   ?>" onclick="this.classList.add('hidden');" role="alert">
    <strong>Warning!</strong> <?php // echo $message   ?>
</div>-->

<div class="<?= h($class) ?>">
    <div class="alert alert-info alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <i class="fa fa-pencil"></i><strong>Default</strong> <?= $message ?>
    </div>
</div>