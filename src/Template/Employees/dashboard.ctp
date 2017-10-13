<section id="content-wrapper">

    <div class="site-content-title" style="display: none">
        <h2 class="float-xs-left content-title-main">Dashboard</h2>

        <ol class="breadcrumb float-xs-right">
            <li class="breadcrumb-item">
                <span class="fs1" aria-hidden="true" data-icon=""></span>
                <a href="#">Dashboard</a>
            </li>
            <!--            <li class="breadcrumb-item"><a href="#">Layout</a></li>-->
            <!--<li class="breadcrumb-item active">Dashboard</li>-->
        </ol>
    </div>
    <?= $this->Flash->render(); ?>
</section>


<?= $this->start('script'); ?>

<!-- START PAGE PLUGINS -->
<?= $this->Html->script('/theme/assets/global/js/global/invoice.js'); ?>
<!-- END PAGE PLUGINS -->

<?= $this->end('script'); ?>