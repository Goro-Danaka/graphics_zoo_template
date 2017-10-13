<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<!--<div class="message error" onclick="this.classList.add('hidden');"><?php // $message        ?></div>-->

<!--<div class="alert alert-danger alert-icon-left" onclick="this.classList.add('hidden');" role="alert">
    <i class="fa fa-check"></i>
    <div class="float-xs-left">
        <strong>Error</strong> <?php // $message  ?>
    </div>
</div>-->

<!--<div class="alert alert-danger" role="alert">
    <strong>Error !</strong> <?php // echo $message  ?>
</div>-->
<div class="alert-dark-background">
    <div class="alert alert-danger alert-dismissible fade in" role="alert">        
        <i class="fa fa-pencil"></i><strong>Error</strong> <?= $message ?>
    </div>
</div>