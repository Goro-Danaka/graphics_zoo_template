<?php

use Cake\Routing\Router;
?>

<style type="text/css">
	.nav-tabs .nav-item.open .nav-link, .nav-tabs .nav-item.open .nav-link:focus, .nav-tabs .nav-item.open .nav-link:hover, .nav-tabs .nav-link.active, .nav-tabs .nav-link.active:focus, .nav-tabs .nav-link.active:hover {
		border-bottom: 3px solid RGB(226,33,68)!important;
	}
</style>
<div class="main-content">
    <div class="container-fluid">
        <div class="page-title">
            <h4>Designer Dashboard</h4>
        </div>
        <div class="card">
            <div class="padding-20">
            </div>
            <div class="tab-primary">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="#tab-primary-1" class="nav-link active" role="tab" data-toggle="tab">Revision and in Progress Requests</a>
                    </li>
                    <li class="nav-item">
                        <a href="#tab-primary-2" class="nav-link" role="tab" data-toggle="tab">In Queue Requests</a>
                    </li>
                    <li class="nav-item">
                        <a href="#tab-primary-3" class="nav-link" role="tab" data-toggle="tab">Pending for Approve</a>
                    </li>
                    <li class="nav-item">
                        <a href="#tab-primary-4" class="nav-link" role="tab" data-toggle="tab">Approved Requests</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="tab-primary-1">
                        <div class="pdd-horizon-15 pdd-vertical-20">
                            <div class="row">
	                            <div class="col-md-12">
	                                <div class="card">
	                                    <div class="card-block">
	                                        <div class="table-overflow">
	                                            <table  class="table table-lg table-hover dt-opt">
	                                                <thead>
	                                                    <tr>
	                                                    	<th style="padding-right: 0px;">Id</th>
								                            <th style="padding-right: 0px;">Title</th>
								                            <th style="padding-right: 0px;">Description</th>  
															<th style="padding-right: 0px;">Customer Name</th>
															<th style="padding-right: 0px;">Requested<br/><span style="font-size:10px;">(MM/DD/YYYY)</span></th>
															<th style="padding-right: 0px;">In Progress<br/><span style="font-size:10px;">(MM/DD/YYYY)</span></th>
															<th style="padding-right: 0px;">Due Date<br/><span style="font-size:10px;">(MM/DD/YYYY)</span></th>
															<th style="padding-right: 0px;">Status</th>
															<th style="padding-right: 0px;">No. of New Messages(<?= $total_unread_message ?>)</th>
								                            <th>Action</th>                            
	                                                    </tr>
	                                                </thead>
	                                                <tbody>
	                                                	<?php $i = 1; ?>
								                        <?php foreach ($requests as $request): ?>
														<?php 
															$due_date = "";
															if($request->status_designer == "pending") 
															{ $status = "Pending"; $bgcolor=""; $textcolor=""; $view = "View"; $button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;"; } 
															elseif($request->status_designer == "running") 
															{ $status = "In Queue"; $bgcolor=""; $textcolor=""; $view = "View"; $button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;";}
															elseif($request->status_designer == "active")
															{
																$status = "In Progress";
																$bgcolor="orange";
																$textcolor="#000";
																 $view = "View"; 
																  $button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;background: orange;";
																
															}elseif($request->status_designer == "pendingforapprove")
															{
																$status = "Waiting for Approval";
																$bgcolor="lightgreen";
																$textcolor="#000";
																 $view = "Review"; 
																 $button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;background: lightgreen;";
															}elseif($request->status_designer == "checkforapprove"){
																$status = "Waiting for Approval";
																$bgcolor="lightgreen";
																$textcolor="#000";
																$view = "Review"; 
																 $button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;background: lightgreen;";
															}elseif($request->status_designer == "disapprove"){
																$status = "Revision";
																$bgcolor="coral";
																$textcolor="#000";
																$view = "D"; 
																 $button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;background: coral;";
															}elseif($request->status_designer == "assign"){
																$status = "In Queue";
																$bgcolor="lightgray";
																$textcolor="#000";
																$view = "D"; 
																$button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;background: lightgray;";
															}else{
																$status = "";
																$bgcolor="";
																$textcolor="";
																$view = "View"; 
															}
														?>
								                            <tr>
								                                <td style="color:<?= $textcolor ?>"><?= $i++; ?></td>                                
								                                <td style="color:<?= $textcolor ?>"><?= $request->title ?></td>
								                                <td style="color:<?= $textcolor ?>"><?= $request->description ?></td>   
																<td style="color:<?php echo $txtcolor; ?>;"><?= ($request->customer) ? $request->customer->first_name . ' ' . $request->customer->last_name : '' ?></td> 
																<td  style="color:<?php echo $txtcolor; ?>;"><?= ($request->created) ? date('m/d/Y',strtotime($request->created)) : ''; ?><br/><?= ($request->created) ? date('g:i a',strtotime($request->created)) : ''; ?></td>  
																<td  style="color:<?php echo $txtcolor; ?>;"><?= ($request->dateinprogress) ? date('m/d/Y',strtotime($request->dateinprogress)) : ''; ?><br/><?= ($request->dateinprogress) ? date('g:i a',strtotime($request->dateinprogress)) : ''; ?></td>  
																<td  style="color:<?php echo $txtcolor; ?>;"><?php echo $due_date; ?></td>  
																<td style="color:<?= $textcolor ?>"><button class="btn btn-deafult" style="<?= $button ?>"><?= $status ?></button></td>
																<td style="color:<?php echo $txtcolor; ?>;"><?php if($admin_unread_message_count_array[$request->id]!=0) { ?>
																 <button class="btn btn-primary" style="border-radius:20px;background:orange;border:none;">
																		<?= $admin_unread_message_count_array[$request->id] ?> Messages</button> 
																<?php	} ?></td>
								                                <td>
								                                    <a href="<?= Router::url(['controller' => 'Requests', 'action' => 'viewPendingRequest', $request->id]); ?>">
								                                        <button class="btn btn-primary" style="border-radius:20px;background:#3e3c3c;border: none;"><img style="width:20px;" src="<?= REQUEST_IMG_URL ?>image/view.png">View</button> 
								                                    </a>
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
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab-primary-2">
                        <div class="pdd-horizon-15 pdd-vertical-20">
                            <div class="row">
	                            <div class="col-md-12">
	                                <div class="card">
	                                    <div class="card-block">
	                                        <div class="table-overflow">
	                                            <table class="table table-lg table-hover  dt-opt">
					                                <thead>
								                        <tr>
								                            <th>Id</th>
								                            <th>Title</th>
								                            <th>Description</th>  
															<th>Customer Name</th>
															<th>Date Requested</th>
															<th>Date In Progress</th>
															<th>Due Date</th>
															<th>Status</th>
															<th>No. of New Messages(<?= $total_assign_message ?>)</th>
								                            <th>Action</th>         
								                        </tr>
								                    </thead>
								                    <tbody>
								                        <?php $i = 1; ?>
								                        <?php foreach ($inprogressrequest as $request): ?>
														<?php 
															if($request->status_designer == "pending") 
															{ $status = "Pending"; $bgcolor=""; $textcolor=""; $view = "View"; $button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;"; } 
															elseif($request->status_designer == "running") 
															{ $status = "In Queue"; $bgcolor=""; $textcolor=""; $view = "View"; $button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;";}
															elseif($request->status_designer == "active")
															{
																$status = "In Progress";
																$bgcolor="orange";
																$textcolor="#000";
																 $view = "View"; 
																  $button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;background: orange;";
															}elseif($request->status_designer == "pendingforapprove")
															{
																$status = "Waiting for Approval";
																$bgcolor="lightgreen";
																$textcolor="#000";
																 $view = "Review"; 
																 $button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;background: lightgreen;";
															}elseif($request->status_designer == "checkforapprove"){
																$status = "Waiting for Approval";
																$bgcolor="lightgreen";
																$textcolor="#000";
																$view = "Review"; 
																 $button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;background: lightgreen;";
															}elseif($request->status_designer == "disapprove"){
																$status = "Revision";
																$bgcolor="coral";
																$textcolor="#000";
																$view = "D"; 
																 $button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;background: coral;";
															}elseif($request->status_designer == "assign"){
																$status = "In Queue";
																$bgcolor="lightgray";
																$textcolor="#000";
																$view = "D"; 
																$button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;background: lightgray;";
															}else{
																$status = "";
																$bgcolor="";
																$textcolor="";
																$view = "View"; 
															}
														?>
								                            <tr>
								                                <td style="color:<?= $textcolor ?>"><?= $i++; ?></td>                                
								                                <td style="color:<?= $textcolor ?>"><?= $request->title ?></td>
								                                <td style="color:<?= $textcolor ?>"><?= $request->description ?></td>   
																<td style="color:<?php echo $txtcolor; ?>;"><?= ($request->customer) ? $request->customer->first_name . ' ' . $request->customer->last_name : '' ?></td> 
																<td  style="color:<?php echo $txtcolor; ?>;"><?= ($request->created) ? $request->created->format(DATE_FORMAT_WITH_TIME) : ''; ?></td>  
																<td  style="color:<?php echo $txtcolor; ?>;"><?= ($request->dateinprogress) ? $request->dateinprogress->format(DATE_FORMAT_WITH_TIME) : ''; ?></td>  
																<td  style="color:<?php echo $txtcolor; ?>;"></td>  
																<td style="color:<?= $textcolor ?>"><button class="btn btn-deafult" style="<?= $button ?>"><?= $status ?></button></td>
																<td style="color:<?php echo $txtcolor; ?>;"><?php if($admin_unread_message_count_array[$request->id]!=0) { ?>
																 <button class="btn btn-primary" style="border-radius:20px;background:orange;border:none;">
																		<?= $admin_unread_message_count_array[$request->id] ?> Messages</button> 
																<?php	} ?></td>
								                                <td>
								                                    <a href="<?= Router::url(['controller' => 'Requests', 'action' => 'viewPendingRequest', $request->id]); ?>">
								                                        <button class="btn btn-primary" style="border-radius:20px;background:#3e3c3c;border: none;"><img style="width:20px;" src="<?= REQUEST_IMG_URL ?>image/view.png">View</button> 
								                                    </a>
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
                    </div>	

                    <div role="tabpanel" class="tab-pane fade" id="tab-primary-3">
                        <div class="pdd-horizon-15 pdd-vertical-20">
                            <div class="row">
	                            <div class="col-md-12">
	                                <div class="card">
	                                    <div class="card-block">
	                                        <div class="table-overflow">
	                                            <table class="table table-lg table-hover dt-opt">
					                                <thead>
								                        <tr>
								                            <th>Id</th>
								                            <th>Title</th>
								                            <th>Description</th>  
															<th>Customer Name</th>
															<th>Date Requested</th>
															<th>Date In Progress</th>
															<th>Due Date</th>
															<th>Status</th>
															<th>No. of New Messages(<?= $total_checkforapprove_message ?>)</th>
								                            <th>Action</th>       
								                        </tr>
								                    </thead>
								                    <tbody>
								                        <?php $i = 1; ?>
								                        <?php foreach ($checkforapproverequests as $request): ?>
														<?php 
															if($request->status_designer == "pending") 
															{ $status = "Pending"; $bgcolor=""; $textcolor=""; $view = "View"; $button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;"; } 
															elseif($request->status_designer == "running") 
															{ $status = "In Queue"; $bgcolor=""; $textcolor=""; $view = "View"; $button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;";}
															elseif($request->status_designer == "active")
															{
																$status = "In Progress";
																$bgcolor="orange";
																$textcolor="#000";
																 $view = "View"; 
																  $button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;background: orange;";
															}elseif($request->status_designer == "pendingforapprove")
															{
																$status = "Waiting for Approval";
																$bgcolor="lightgreen";
																$textcolor="#000";
																 $view = "Review"; 
																 $button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;background: lightgreen;";
															}elseif($request->status_designer == "checkforapprove"){
																$status = "Waiting for Approval";
																$bgcolor="lightgreen";
																$textcolor="#000";
																$view = "Review"; 
																 $button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;background: lightgreen;";
															}elseif($request->status_designer == "disapprove"){
																$status = "Revision";
																$bgcolor="coral";
																$textcolor="#000";
																$view = "D"; 
																 $button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;background: coral;";
															}elseif($request->status_designer == "assign"){
																$status = "In Queue";
																$bgcolor="lightgray";
																$textcolor="#000";
																$view = "D"; 
																$button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;background: lightgray;";
															}else{
																$status = "";
																$bgcolor="";
																$textcolor="";
																$view = "View"; 
															}
														?>
								                            <tr>
								                                <td style="color:<?= $textcolor ?>"><?= $i++; ?></td>                                
								                                <td style="color:<?= $textcolor ?>"><?= $request->title ?></td>
								                                <td style="color:<?= $textcolor ?>"><?= $request->description ?></td>   
																<td style="color:<?php echo $txtcolor; ?>;"><?= ($request->customer) ? $request->customer->first_name . ' ' . $request->customer->last_name : '' ?></td> 
																<td  style="color:<?php echo $txtcolor; ?>;"><?= ($request->created) ? $request->created->format(DATE_FORMAT_WITH_TIME) : ''; ?></td>  
																<td  style="color:<?php echo $txtcolor; ?>;"><?= ($request->dateinprogress) ? $request->dateinprogress->format(DATE_FORMAT_WITH_TIME) : ''; ?></td>  
																<td  style="color:<?php echo $txtcolor; ?>;"></td>  
																<td style="color:<?= $textcolor ?>"><button class="btn btn-deafult" style="<?= $button ?>"><?= $status ?></button></td>
																<td style="color:<?php echo $txtcolor; ?>;"><?php if($admin_unread_message_count_array[$request->id]!=0) { ?>
																 <button class="btn btn-primary" style="border-radius:20px;background:orange;border:none;">
																		<?= $admin_unread_message_count_array[$request->id] ?> Messages</button> 
																<?php	} ?></td>
								                                <td>
								                                    <a href="<?= Router::url(['controller' => 'Requests', 'action' => 'viewPendingRequest', $request->id]); ?>">
								                                        <button class="btn btn-primary" style="border-radius:20px;background:#3e3c3c;border: none;"><img style="width:20px;" src="<?= REQUEST_IMG_URL ?>image/view.png">View</button> 
								                                    </a>
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
                    </div>	

                    <div role="tabpanel" class="tab-pane fade" id="tab-primary-4">
                        <div class="pdd-horizon-15 pdd-vertical-20">
                            <div class="row">
	                            <div class="col-md-12">
	                                <div class="card">
	                                    <div class="card-block">
	                                        <div class="table-overflow">
	                                            <table class="table table-lg table-hover dt-opt">
					                                <thead>
								                        <tr>
								                            <th>Id</th>
								                            <th>Title</th>
								                            <th>Description</th>  
															<th>Customer Name</th>
															<th>Date Requested</th>
															<th>No. of New Messages(<?= $total_approved_message ?>)</th>
								                            <th>Action</th>        
								                        </tr>
								                    </thead>
								                    <tbody>
								                        <?php $i = 1; ?>
								                        <?php foreach ($approvedrequest as $request): ?>
														<?php 
															if($request->status_designer == "pending") 
															{ $status = "Pending"; $bgcolor=""; $textcolor=""; $view = "View"; $button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;"; } 
															elseif($request->status_designer == "running") 
															{ $status = "In Queue"; $bgcolor=""; $textcolor=""; $view = "View"; $button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;";}
															elseif($request->status_designer == "active")
															{
																$status = "In Progress";
																$bgcolor="orange";
																$textcolor="#000";
																 $view = "View"; 
																  $button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;background: orange;";
															}elseif($request->status_designer == "pendingforapprove")
															{
																$status = "Waiting for Approval";
																$bgcolor="lightgreen";
																$textcolor="#000";
																 $view = "Review"; 
																 $button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;background: lightgreen;";
															}elseif($request->status_designer == "checkforapprove"){
																$status = "Waiting for Approval";
																$bgcolor="lightgreen";
																$textcolor="#000";
																$view = "Review"; 
																 $button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;background: lightgreen;";
															}elseif($request->status_designer == "disapprove"){
																$status = "Revision";
																$bgcolor="coral";
																$textcolor="#000";
																$view = "D"; 
																 $button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;background: coral;";
															}elseif($request->status_designer == "assign"){
																$status = "In Queue";
																$bgcolor="lightgray";
																$textcolor="#000";
																$view = "D"; 
																$button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;background: lightgray;";
															}else{
																$status = "";
																$bgcolor="";
																$textcolor="";
																$view = "View"; 
															}
														?>
								                            <tr>
								                                <td style="color:<?= $textcolor ?>"><?= $i++; ?></td>                                
								                                <td style="color:<?= $textcolor ?>"><?= $request->title ?></td>
								                                <td style="color:<?= $textcolor ?>"><?= $request->description ?></td>   
																<td style="color:<?php echo $txtcolor; ?>;"><?= ($request->customer) ? $request->customer->first_name . ' ' . $request->customer->last_name : '' ?></td>  
																<td  style="color:<?php echo $txtcolor; ?>;"><?= ($request->created) ? $request->created->format(DATE_FORMAT_WITH_TIME) : ''; ?></td>  
																<td style="color:<?php echo $txtcolor; ?>;"><?php if($admin_unread_message_count_array[$request->id]!=0) { ?>
																 <button class="btn btn-primary" style="border-radius:20px;background:orange;border:none;">
																		<?= $admin_unread_message_count_array[$request->id] ?> Messages</button> 
																<?php	} ?></td>
								                                <td>
								                                    <a href="<?= Router::url(['controller' => 'Requests', 'action' => 'viewApprovedRequest', $request->id]); ?>">
								                                        <button class="btn btn-primary" style="border-radius:20px;background:#3e3c3c;border: none;"><img style="width:20px;" src="<?= REQUEST_IMG_URL ?>image/view.png">View</button> 
								                                    </a>
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
                    </div>	                          
                </div>
            </div>
        </div>                        
    </div>
</div>


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
