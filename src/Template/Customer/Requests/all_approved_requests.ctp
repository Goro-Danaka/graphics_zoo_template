<?php

use Cake\Routing\Router;
?>
<style>
body{
	background-color: aliceblue;
}
</style>
<section id="content-wrapper">
    <div class="site-content-title" style="background-color: aliceblue;">
        <h2 class="float-xs-left content-title-main">All Running Requests</h2>
		<button class="btn btn-primary" onclick="window.location.href='<?= Router::url(['controller' => 'Requests', 'action' => 'addRequest', 'prefix' => 'customer']); ?>'" style="float:right;margin:1% 2% 0% 0%;color: #fff !important;font-weight: 500;background: #ec1c41;border: 0px;border-radius: 20px;">+ Add New Request</button>
		
        <ol class="breadcrumb float-xs-right">
            <li class="breadcrumb-item">
                <span class="fs1" aria-hidden="true" data-icon=""></span>
                <a href="#">Main Menu</a>
            </li>
            <li class="breadcrumb-item active">View Users</li>
        </ol>
    </div>
	
	 
	<div class="container" style="margin-top: 10px;">
	
	  <ul class="nav nav-tabs" style="background-color:aliceblue" style="background-color: aliceblue;">
		<li style="display:inline-block;padding:5px;margin-right: -11px;background-color: rgb(221, 221, 221); border-radius: 21px 21px 0px 0px;" onMouseOver="$(this).css('background-color','#ddd');$(this).css('border-radius','21px 21px 0px 0px');" onMouseOut="$(this).css('background-color','#e9e9e9');$(this).css('border-radius','21px 21px 0px 0px');"><a  onMouseOver="$(this).css('background-color','#ddd');$(this).css('border-radius','21px 21px 0px 0px');" onMouseOut="$(this).css('background-color','#e9e9e9');$(this).css('border-radius','21px 21px 0px 0px');" class ="myactiveclass" style="color:#fff;background: rgb(221, 221, 221);padding: 10px;border-radius: 21px 21px 0px 0px;font-weight: 600;font-size: 16px;" href="#">Pending</a></li>
		
		<li class="active" style="display:inline-block;display: inline-block;color: rgb(85, 85, 85);cursor: default;background-color: rgb(255, 255, 255);border-width: 1px;border-style: solid;border-color: rgb(221, 221, 221) transparent;border-image: initial;margin-right: 2px;line-height: 1.42857;border-width: 1px;border-style: solid;border-radius:21px 21px 0px 0px;;padding: 8px;border: 1px solid rgb(221, 221, 221);">
			<a style="color: rgb(85, 85, 85);cursor: default;background-color: rgb(255, 255, 255);border-width: 1px;border-image: initial;border-radius:21px 21px 0px 0px;padding: 9px;font-weight: 600;font-size: 14px;" class="myactiveclass" href="#">Approved</a>
		</li>
		
	  </ul>
	   <div class="tab-content">
		<div id="home" class="tab-pane fade in active">
	
   <div class="content content-datatable datatable-width" style="margin:0px;">
	
        <div class="row">
            <div class="col-md-12">

                <table data-plugin="datatable" data-responsive="true" class="custom-table table table-striped table-hover dt-responsive">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Description</th>                           
                            <th>Action</th>  
							<th>Messages(<?= $total_unread_message ?>)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($requests as $request): ?>
                            <tr>
                                <td><?= $i++; ?></td>                                
                                <td><?= $request->title ?></td>
                                <td><?= $request->description ?></td>                               
                                <td>
									<a href="<?= Router::url(['controller' => 'Requests', 'action' => 'viewApprovedRequest', $request->id]); ?>">
                                    <!-- <span class="fa fa-eye fa-2x text-primary"></span> --->
									 <button class="btn btn-primary" style="border-radius:20px;background:#3e3c3c;border: none;"><img style="width:20px;" src="<?= REQUEST_IMG_URL ?>image/view.png">View</button> 
                                    </a>
                                </td>
								<td>
									 <?php if($admin_unread_message_count_array[$request->id] != 0){ ?>
									 <button class="btn btn-primary" style="border-radius:20px;background:orange;border:none;">
										<?= $admin_unread_message_count_array[$request->id] ?> Messages</button> 
									<?php } ?>
								</td>
                            </tr>        
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
	</div>
	</div>
	</div>
</section>


<?= $this->start('css'); ?>

<?= $this->Html->css('/theme/assets/global/plugins/datatables/media/css/dataTables.bootstrap4.min.css'); ?>
<?= $this->Html->css('/theme/assets/global/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>
<?= $this->Html->css('/theme/assets/global/plugins/datatables-scroller/css/scroller.bootstrap4.min.css'); ?>

<?= $this->end('css'); ?>

<?= $this->start('script'); ?>

<?= $this->Html->script('/theme/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js'); ?>
<?= $this->Html->script('/theme/assets/global/plugins/datatables/media/js/dataTables.bootstrap4.min.js'); ?>
<?= $this->Html->script('/theme/assets/global/plugins/datatables-responsive/js/dataTables.responsive.js'); ?>
<?= $this->Html->script('/theme/assets/global/plugins/datatables-responsive/js/responsive.bootstrap4.js'); ?>
<?= $this->Html->script('/theme/assets/global/plugins/datatables-scroller/js/dataTables.scroller.js'); ?>
<?= $this->Html->script('/theme/assets/global/plugins/editable-table/mindmup-editabletable.js'); ?>
<?= $this->Html->script('/theme/assets/global/plugins/editable-table/numeric-input-example.js'); ?>

<?= $this->Html->script('/theme/assets/global/js/global/datatable.js'); ?>

<?= $this->end('script'); ?>
