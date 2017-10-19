<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!-- START CORE JAVASCRIPT -->
<!--   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<?= $this->Html->script('/theme/assets/global/plugins/jquery/dist/jquery.min.js'); ?>
<?= $this->Html->script('/theme/assets/global/plugins/dropify/dist/js/dropify.min.js'); ?>
<?= $this->Html->script('/theme/assets/global/plugins/tether/dist/js/tether.min.js'); ?>


<?= $this->Html->script('/assets/bower_components/popper.js/dist/umd/popper.min.js'); ?>
<?= $this->Html->script('/assets/bower_components/PACE/pace.min.js'); ?>
<?= $this->Html->script('/assets/bower_components/bootstrap/dist/js/bootstrap.js'); ?>
<?= $this->Html->script('/assets/bower_components/perfect-scrollbar/js/perfect-scrollbar.jquery.js'); ?>

  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
  
  <!-- <?= $this->Html->script('/assets/bower_components/bootstrap/dist/js/bootstrap.js'); ?> -->
<?= $this->Html->script('/theme/assets/global/plugins/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js'); ?>
<?= $this->Html->script('/theme/assets/global/plugins/switchery/dist/switchery.min.js'); ?>
<?= $this->Html->script('/theme/assets/global/plugins/screenfull.js/dist/screenfull.min.js'); ?>
<?= $this->Html->script('/theme/assets/global/plugins/classie/classie.js'); ?>
<!-- END CORE JAVASCRIPT -->
<?php echo $this->Html->script('/theme/assets/global/plugins/jquery-form-validator/form-validator/jquery.form-validator.min.js'); ?>


<!-- START GLOBAL JAVASCRIPT -->
<?php echo $this->Html->script('/theme/assets/global/js/site.min.js'); ?>
<?php echo $this->Html->script('/theme/assets/global/js/site-settings.min.js'); ?>
<?php echo $this->Html->script('/theme/assets/global/js/global/form_validation.min.js'); ?>


<?php // $this->Html->script('/assets/pages/global/js/global.min.js'); ?>
<!-- END GLOBAL JAVASCRIPT -->


<!-- <?= $this->Html->script('/theme/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js'); ?>
<?= $this->Html->script('/theme/assets/global/plugins/datatables/media/js/dataTables.bootstrap4.min.js'); ?>
<?= $this->Html->script('/theme/assets/global/plugins/datatables-responsive/js/dataTables.responsive.js'); ?>
<?= $this->Html->script('/theme/assets/global/plugins/datatables-responsive/js/responsive.bootstrap4.js'); ?>
<?= $this->Html->script('/theme/assets/global/plugins/datatables-scroller/js/dataTables.scroller.js'); ?>
<?= $this->Html->script('/theme/assets/global/plugins/editable-table/mindmup-editabletable.js'); ?>
<?= $this->Html->script('/theme/assets/global/plugins/editable-table/numeric-input-example.js'); ?>
 -->
<!-- <?= $this->Html->script('/theme/assets/global/js/global/datatable.js'); ?>
<?= $this->Html->script('/theme/assets/global/plugins/jquery-validation/dist/jquery.validate.min.js'); ?> -->


<?php echo $this->Html->script('socket.io.js'); ?>

<!-- START PAGE JAVASCRIPT -->
<?php // $this->Html->script('/assets/global/js/global/dashboard_v4.js');  ?>
<!-- END PAGE JAVASCRIPT -->

<!-- START THEME LAYOUT JAVASCRIPT -->
<?= $this->Html->script('/theme/assets/layouts/layout-left-menu/js/layout.min.js'); ?>
<!-- END THEME LAYOUT JAVASCRIPT -->



<!-- build:js assets/js/vendor.js -->
<!-- plugins js -->

<!-- endbuild -->

<!-- page plugins js -->
<?= $this->Html->script('/assets/bower_components/bower-jvectormap/jquery-jvectormap-1.2.2.min.js'); ?>
<?= $this->Html->script('/assets/bower_components/d3/d3.min.js'); ?>
<?= $this->Html->script('/assets/bower_components/nvd3/build/nv.d3.min.js'); ?>
<?= $this->Html->script('/assets/bower_components/jquery.sparkline/index.js'); ?>
<?= $this->Html->script('/assets/bower_components/chart.js/dist/Chart.min.js'); ?>
<?= $this->Html->script('/assets/bower_components/masonry/dist/masonry.pkgd.min.js'); ?>
<?= $this->Html->script('/assets/bower_components/imagesloaded/imagesloaded.js'); ?>
<?= $this->Html->script('/assets/bower_components/photoswipe/dist/photoswipe.js'); ?>
<?= $this->Html->script('/assets/bower_components/photoswipe/dist/photoswipe-ui-default.min.js'); ?>

<!-- build:js assets/js/app.min.js -->
<!-- core js -->
<?= $this->Html->script('/assets/assets/js/app.js'); ?>
<!-- endbuild -->

<!-- page js -->
<?= $this->Html->script('/assets/assets/js/dashboard/dashboard.js'); ?>
<?= $this->Html->script('/assets/bower_components/datatables/media/js/jquery.dataTables.js'); ?>
<?= $this->Html->script('/assets/assets/js/table/data-table.js'); ?>
<?= $this->Html->script('/assets/assets/js/extras/gallery.js'); ?>



<?= $this->element('custom_js'); ?>

