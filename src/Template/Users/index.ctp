<?= $this->start('css'); ?>

<?= $this->Html->css('/assets/global/plugins/datatables/media/css/dataTables.bootstrap4.min.css'); ?>
<?= $this->Html->css('/assets/global/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>
<?= $this->Html->css('/assets/global/plugins/datatables-scroller/css/scroller.bootstrap4.min.css'); ?>

<?= $this->end('css'); ?>

<section id="content-wrapper">

    <div class="site-content-title">
        <h2 class="float-xs-left content-title-main">View Users</h2>

        <ol class="breadcrumb float-xs-right">
            <li class="breadcrumb-item">
                <span class="fs1" aria-hidden="true" data-icon=""></span>
                <a href="#">Main Menu</a>
            </li>
            <!--<li class="breadcrumb-item"><a href="#">Layout</a></li>-->
            <li class="breadcrumb-item active">View Users</li>
        </ol>
    </div>
    <div class="content content-datatable datatable-width">
        <!--<h4 class="page-content-title">Basic</h4>-->
        <!--<p>To display <strong>basic datatable</strong>, use <code>data-plugin="datatable"</code> in html tag.</p>-->
        <div class="row">
            <div class="col-md-12">
                <table data-plugin="datatable" data-responsive="true" class="custom-table table table-striped table-hover dt-responsive">
                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Register Date</th>
                            <th>Action</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $user->first_name ?></td>
                                <td><?= $user->last_name ?></td>
                                <td><?= $user->email ?></td>
                                <td><?= $user->phone ?></td>
                                <td><?= $user->created ?></td>
                                <td>Action</td>
                            </tr>        
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>


<!--<script>
    $("#multi-table").DataTable();
</script>-->

<!-- START PAGE PLUGINS -->
<?= $this->start('script'); ?>

<?= $this->Html->script('/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js'); ?>
<?= $this->Html->script('/assets/global/plugins/datatables/media/js/dataTables.bootstrap4.min.js'); ?>
<?= $this->Html->script('/assets/global/plugins/datatables-responsive/js/dataTables.responsive.js'); ?>
<?= $this->Html->script('/assets/global/plugins/datatables-responsive/js/responsive.bootstrap4.js'); ?>
<?= $this->Html->script('/assets/global/plugins/datatables-scroller/js/dataTables.scroller.js'); ?>
<?= $this->Html->script('/assets/global/plugins/editable-table/mindmup-editabletable.js'); ?>
<?= $this->Html->script('/assets/global/plugins/editable-table/numeric-input-example.js'); ?>

<?= $this->Html->script('/assets/global/js/global/datatable.js'); ?>
<!-- END PAGE PLUGINS -->

<?= $this->end('script'); ?>