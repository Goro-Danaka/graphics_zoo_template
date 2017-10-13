<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<!--<div class="message success" onclick="this.classList.add('hidden')"><?php // $message      ?></div>-->

<!--<div class="alert alert-success alert-icon-left" role="alert">
    <i class="fa fa-check"></i>
    <div class="float-xs-left">
        <strong>Success</strong> <?php // $message    ?>
    </div>
</div>-->

<!--<div class="alert alert-success" role="alert">
    <strong>Success !</strong>  <?php // echo $message   ?>
</div>-->

<div class="alert-dark-background">
    <div class="alert alert-success alert-dismissible fade in" role="alert">       
        <i class="fa fa-pencil"></i><strong>Success</strong> <?= $message ?>
    </div>
</div>



