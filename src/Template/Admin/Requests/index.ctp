<?php

use Cake\Routing\Router;
?>
<div class="main-content">
    <div class="container-fluid">

	    <div class="content">
	        <div class="row">
	            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">                
	                <div class="nav-tab-pills-image">
	                    <ul class="nav nav-tabs" role="tablist">                      
	                        <li class="nav-item">
	                            <a class="nav-link active" data-toggle="tab" href="#designs_request_tab" role="tab">
	                                <i class="icon icon_cog"></i>In Progress And Revision Requests
	                            </a>
	                        </li>
	                        <li class="nav-item">
	                            <a class="nav-link" data-toggle="tab" href="#inprogressrequest" role="tab">
	                                <i class="icon icon_cog"></i>In Queue Requests
	                            </a>
	                        </li>
							 <li class="nav-item">
	                            <a class="nav-link" data-toggle="tab" href="#pendingforapproverequest" role="tab">
	                                <i class="icon icon_cog"></i>Pending Approval Requests
	                            </a>
	                        </li>
							 <li class="nav-item">
	                            <a class="nav-link" data-toggle="tab" href="#approved_designs_tab" role="tab">
	                                <i class="icon icon_cog"></i>Approved Requests
	                            </a>
	                        </li>
	                    </ul>
	                    <div class="divider15"></div>
	                    <div class="tab-content">
	                        <div class="tab-pane active content-datatable datatable-width" id="designs_request_tab" role="tabpanel">
	                            <div class="row">
	                                <div class="col-md-12">
	                                    <table data-responsive="true" class="custom-table table table-striped table-hover dt-responsive dt-opt">
	                                        <thead>
	                                            <tr>
	                                                <th>Id</th>
	                                                <th>Title</th>
	                                                <th>Description</th>                           	                                       
	                                                <th>Customer Name</th>                           
	                                                <th>Designer Assigned</th>                           
	                                                <th>Design Status</th>
	                                                <th>Date Requested(MM/DD/YYYY)</th>
													<th>Date In Progress(MM/DD/YYYY)</th>
													<th>No. of New Messages(<?= $total_unread_message ?>)</th>
													<th>Due Date</th>
	                                                <th>Action</th>                            
	                                            </tr>
	                                        </thead>
	                                        <tbody>
	                                            <?php 
												$i=1;
												foreach ($requested_designs as $k => $request): ?>
												<?php
												
												?>
												
												
												
												
													<?php
													$duedate="";
													$bgcolor = "";
													$txtcolor = "";
													$status="";
													$button = "";
													if($request->status_admin == "active"){
														$duedate = "";
														$status = "In Progress";
														$bgcolor="orange";
														$txtcolor = "#000";
														 $button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;background: orange;";
														 
													}elseif($request->status_admin == "pending"){
														$duedate = "--";
														$bgcolor = "";
														$txtcolor = "";
														$status = "Pending";
														$button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;"; 
													}elseif($request->status_admin == "running"){
														$duedate = "--";
														$bgcolor = "";
														$txtcolor = "";
														$status = "In Queue";
														$button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;";
													}elseif($request->status_admin == "disapprove"){
														$duedate = "--";
														$status = "Revision ";
														$bgcolor = "coral";
														$txtcolor = "#000";
														$button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;background: coral;";
													}elseif($request->status_admin == "pendingforapprove"){
														$duedate = "--";
														$status = "Waiting for Approval";
														$bgcolor="lightgreen";
														$txtcolor = "#000";
														$button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;background: lightgreen;";
													}elseif($request->status_admin == "checkforapprove"){
														$duedate = "--";
														$status = "Check for Approval";
														$bgcolor="lightyellow";
														$txtcolor = "#000 !important";
														 $button="color: #000 !important;    margin: auto;    border-radius: 20px;background: lightyellow;";
													}elseif($request->status_admin == "assign"){
														$duedate = "--";
														$status = "In Queue";
														$bgcolor="lightgray";
														$txtcolor = "#000";
														$button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;background: lightgray;";
													}else{
														$duedate = "";
														$status = "";
														$bgcolor="";
														$txtcolor = "";
														$button="";
													}
													
													?>
	                                                <tr>
	                                                    <td style="color:<?php echo $txtcolor; ?>;"><?= $i ?></td>
	                                                    <td style="color:<?php echo $txtcolor; ?>;"><?= $request->title ?></td>
	                                                    <td style="color:<?php echo $txtcolor; ?>;"><?= substr($request->description,0,100) ?></td>  	                                             
	                                                    <td style="color:<?php echo $txtcolor; ?>;"><?= ($request->customer) ? $request->customer->first_name . ' ' . $request->customer->last_name : '' ?></td>  
	                                                    <td style="color:<?php echo $txtcolor; ?>;"><?= ($request->designer) ? $request->designer->first_name . ' ' . $request->designer->last_name : '' ?></td>  	                                          
	                                                    <td style="color:<?php echo $txtcolor; ?>;">
														<?php if($button){ ?>
															<button class="btn btn-deafult" style="<?= $button ?>"><?= $status ?></button>
														<?php } ?>
														</td>
	                                                    <td  style="color:<?php echo $txtcolor; ?>;"><?= ($request->created) ? date("m/d/Y g:i a",strtotime($request->created)) : ''; ?></td>
														<td  style="color:<?php echo $txtcolor; ?>;"><?= ($request->dateinprogress) ? date("m/d/Y g:i a",strtotime($request->dateinprogress)) : ''; ?></td>
														<td style="color:<?php echo $txtcolor; ?>;"><?php if($admin_unread_message_count_array[$request->id]!=0) { ?>
														<button class="btn btn-primary" style="border-radius:20px;background:orange;border:none;">
														<?= $admin_unread_message_count_array[$request->id] ?> Messages</button> 
														<?php } ?></td>
														<td style="color:<?php echo $txtcolor; ?>;">
														<?php
															if($request->dateinprogress != ""){
																if(!empty($turn_around_days_array[$k]))

																	$duedate = strtotime($request->dateinprogress) + 60*60*24*$turn_around_days_array[$k];										
																	// $weekday_s = date('N', $timestamp);
																	// $weekday_t = date('N', $timestamp);
																	// $plus_s = 7 - $weekday_s + 1;
																	// if($plus_s > 2) $plus_s = 0;
																	// $plus_t = 7 - $weekday_t + 1;
																	// if()

																	// if($weekday < 6)
																	// 	$plus = 1;
																	// if($weekday == 7)
																	// 	$plus
																	echo  date('Y-m-d H:i:s', $duedate);
															}
														?>
														</td> 
	                                                    <td style="display: inline-flex;color:<?php echo $txtcolor; ?>;">
	                                                        <a href="<?= Router::url(['controller' => 'Requests', 'action' => 'view', $request->id]); ?>">	                                                          
																<button class="btn btn-primary" style="border-radius:20px;background:#3e3c3c;border: none;"><img style="width:20px;" src="<?= REQUEST_IMG_URL ?>image/view.png"></img>View</button> 
	                                                        </a>

	                                                        <?php
															echo $this->Form->postLink('<button class="btn btn-danger" style="border-radius:20px;background: #ec1c41;"><i class="fa fa-times" style="margin-right: 5px;font-size: 15px;"></i>Cancel</button>', Router::url(['controller' => 'Requests', 'action' => 'cancleRequest', $request->id], TRUE), ['escape' => FALSE, 'confirm' => 'Are you sure want to delete?']);
	                                                        ?>


	                                                    </td>

	                                                </tr>        
	                                            <?php $i++; endforeach; ?>
	                                        </tbody>
	                                    </table>
	                                </div>
	                            </div>
	                        </div>
							
							<div class="tab-pane content-datatable datatable-width" id="inprogressrequest" role="tabpanel">
	                            <div class="row">
	                                <div class="col-md-12">
	                                    <table data-responsive="true" class="custom-table table table-striped table-hover dt-responsive dt-opt">
	                                        <thead>
	                                            <tr>
	                                                <th>Id</th>
	                                                <th>Title</th>
	                                                <th>Description</th>                           
	                                                <th>Customer Name</th>                           
	                                                <th>Designer Assigned</th>                           
	                                                <th>Design Status</th>
	                                                <th>Date Requested(MM/DD/YYYY)</th>
													<th>No. of New Messages(<?= $total_assign_message ?>)</th>
	                                                <th>Action</th>                            
	                                            </tr>
	                                        </thead>
	                                        <tbody>
	                                            <?php 
												$i=1;
												foreach ($inprogressrequest as $request): ?>
													<?php
													$duedate="";
													$bgcolor = "";
													$txtcolor = "";
													$status="";
													$button = "";
													if($request->status_admin == "active"){
														$duedate = "";
														$status = "In Progress";
														$bgcolor="orange";
														$txtcolor = "#000";
														 $button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;background: orange;";
													}elseif($request->status_admin == "pending"){
														$duedate = "--";
														$bgcolor = "";
														$txtcolor = "";
														$status = "Pending";
														$button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;"; 
													}elseif($request->status_admin == "running"){
														$duedate = "--";
														$bgcolor = "";
														$txtcolor = "";
														$status = "In Queue";
														$button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;";
													}elseif($request->status_admin == "disapprove"){
														$duedate = "--";
														$status = "Revision ";
														$bgcolor = "coral";
														$txtcolor = "#000";
														$button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;background: coral;";
													}elseif($request->status_admin == "pendingforapprove"){
														$duedate = "--";
														$status = "Waiting for Approval";
														$bgcolor="lightgreen";
														$txtcolor = "#000";
														$button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;background: lightgreen;";
													}elseif($request->status_admin == "checkforapprove"){
														$duedate = "--";
														$status = "Check for Approval";
														$bgcolor="lightyellow";
														$txtcolor = "#000 !important";
														 $button="color: #000 !important;    margin: auto;    border-radius: 20px;background: lightyellow;";
													}elseif($request->status_admin == "assign"){
														$duedate = "--";
														$status = "In Queue";
														$bgcolor="lightgray";
														$txtcolor = "#000";
														$button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;background: lightgray;";
													}else{
														$duedate = "";
														$status = "";
														$bgcolor="";
														$txtcolor = "";
														$button="";
													}
												
													?>
	                                                <tr>
	                                                    <td style="color:<?php echo $txtcolor; ?>;"><?= $i ?></td>
	                                                    <td style="color:<?php echo $txtcolor; ?>;"><?= $request->title ?></td>
	                                                    <td style="color:<?php echo $txtcolor; ?>;"><?= substr($request->description,0,100) ?></td>  
	                                                    <td style="color:<?php echo $txtcolor; ?>;"><?= ($request->customer) ? $request->customer->first_name . ' ' . $request->customer->last_name : '' ?></td>  
	                                                    <td style="color:<?php echo $txtcolor; ?>;"><?= ($request->designer) ? $request->designer->first_name . ' ' . $request->designer->last_name : '' ?></td>  	                                          
	                                                    <td style="color:<?php echo $txtcolor; ?>;">
														<?php if($button){ ?>
															<button class="btn btn-deafult" style="<?= $button ?>"><?= $status ?></button>
														<?php } ?>
														</td>
	                                                    <td  style="color:<?php echo $txtcolor; ?>;"><?= ($request->created) ? date("m/d/Y g:i a",strtotime($request->created)) : ''; ?></td>
														<td style="color:<?php echo $txtcolor; ?>;"><?php if($admin_unread_message_count_array[$request->id]!=0) { ?>
														<button class="btn btn-primary" style="border-radius:20px;background:orange;border:none;">
														<?= $admin_unread_message_count_array[$request->id] ?> Messages</button> 
														<?php } ?></td>
	                                                    <td style="display: inline-flex;color:<?php echo $txtcolor; ?>;">
	                                                        <a href="<?= Router::url(['controller' => 'Requests', 'action' => 'view', $request->id]); ?>">	                                                            
																<button class="btn btn-primary" style="border-radius:20px;background:#3e3c3c;border: none;"><img style="width:20px;" src="<?= REQUEST_IMG_URL ?>image/view.png"></img>View</button> 
	                                                        </a>

	                                                        <?php
															echo $this->Form->postLink('<button class="btn btn-danger" style="border-radius:20px;background: #ec1c41;"><i class="fa fa-times" style="margin-right: 5px;font-size: 15px;"></i>Cancel</button>', Router::url(['controller' => 'Requests', 'action' => 'cancleRequest', $request->id], TRUE), ['escape' => FALSE, 'confirm' => 'Are you sure want to delete?']);
	                                                        ?>


	                                                    </td>

	                                                </tr>        
	                                            <?php $i++; endforeach; ?>
	                                        </tbody>
	                                    </table>
	                                </div>
	                            </div>
	                        </div>
							
							<div class="tab-pane content-datatable datatable-width" id="pendingforapproverequest" role="tabpanel">
	                            <div class="row">
	                                <div class="col-md-12">
	                                    <table data-responsive="true" class="custom-table table table-striped table-hover dt-responsive dt-opt">
	                                        <thead>
	                                            <tr>
	                                                <th>Id</th>
	                                                <th>Title</th>
	                                                <th>Description</th>                           	                                      
	                                                <th>Customer Name</th>                           
	                                                <th>Designer Assigned</th>                           	                                           
	                                                <th>Design Status</th>
	                                                <th>Date Requested(MM/DD/YYYY)</th>
													<th>Date In Progress(MM/DD/YYYY)</th>
													<th>No. of New Messages(<?= $total_checkforapprove_message ?>)</th>
													<th>Due Date</th>  
	                                                <th>Action</th>                            
	                                            </tr>
	                                        </thead>
	                                        <tbody>
	                                            <?php 
												$i=1;
												foreach ($checkforapproverequests as $request): ?>
													<?php
													$duedate="";
													$bgcolor = "";
													$txtcolor = "";
													$status="";
													$button = "";
													if($request->status_admin == "active"){
														$duedate = "";
														$status = "In Progress";
														$bgcolor="orange";
														$txtcolor = "#000";
														 $button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;background: orange;";
													}elseif($request->status_admin == "pending"){
														$duedate = "--";
														$bgcolor = "";
														$txtcolor = "";
														$status = "Pending";
														$button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;"; 
													}elseif($request->status_admin == "running"){
														$duedate = "--";
														$bgcolor = "";
														$txtcolor = "";
														$status = "In Queue";
														$button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;";
													}elseif($request->status_admin == "disapprove"){
														$duedate = "--";
														$status = "Revision ";
														$bgcolor = "coral";
														$txtcolor = "#000";
														$button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;background: coral;";
													}elseif($request->status_admin == "pendingforapprove"){
														$duedate = "--";
														$status = "Waiting for Approval";
														$bgcolor="lightgreen";
														$txtcolor = "#000";
														$button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;background: lightgreen;";
													}elseif($request->status_admin == "checkforapprove"){
														$duedate = "--";
														$status = "Check for Approval";
														$bgcolor="lightyellow";
														$txtcolor = "#000 !important";
														 $button="color: #000 !important;    margin: auto;    border-radius: 20px;background: lightyellow;";
													}elseif($request->status_admin == "assign"){
														$duedate = "--";
														$status = "In Queue";
														$bgcolor="lightgray";
														$txtcolor = "#000";
														$button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;background: lightgray;";
													}else{
														$duedate = "";
														$status = "";
														$bgcolor="";
														$txtcolor = "";
														$button="";
													}
												
													?>
	                                                <tr>
	                                                    <td style="color:<?php echo $txtcolor; ?>;"><?= $i ?></td>
	                                                    <td style="color:<?php echo $txtcolor; ?>;"><?= $request->title ?></td>
	                                                    <td style="color:<?php echo $txtcolor; ?>;"><?= substr($request->description,0,100) ?></td>  	                                              
	                                                    <td style="color:<?php echo $txtcolor; ?>;"><?= ($request->customer) ? $request->customer->first_name . ' ' . $request->customer->last_name : '' ?></td>  
	                                                    <td style="color:<?php echo $txtcolor; ?>;"><?= ($request->designer) ? $request->designer->first_name . ' ' . $request->designer->last_name : '' ?></td>  	                                          
	                                                    <td style="color:<?php echo $txtcolor; ?>;">
														<?php if($button){ ?>
															<button class="btn btn-deafult" style="<?= $button ?>"><?= $status ?></button>
														<?php } ?>
														</td>
	                                                    <td  style="color:<?php echo $txtcolor; ?>;"><?= ($request->created) ? date("m/d/Y g:i a",strtotime($request->created)) : ''; ?></td>
														<td  style="color:<?php echo $txtcolor; ?>;"><?= ($request->dateinprogress) ? date("m/d/Y g:i a",strtotime($request->dateinprogress)) : ''; ?></td>
														<td style="color:<?php echo $txtcolor; ?>;"><?php if($admin_unread_message_count_array[$request->id]!=0) { ?>
														<button class="btn btn-primary" style="border-radius:20px;background:orange;border:none;">
														<?= $admin_unread_message_count_array[$request->id] ?> Messages</button> 
														<?php } ?></td>
														<td style="color:<?php echo $txtcolor; ?>;">
														<?php
															echo $duedate;
														?>
														</td> 
	                                                    <td style="display: inline-flex;color:<?php echo $txtcolor; ?>;">
	                                                        <a href="<?= Router::url(['controller' => 'Requests', 'action' => 'view', $request->id]); ?>">
																<button class="btn btn-primary" style="border-radius:20px;background:#3e3c3c;border: none;"><img style="width:20px;" src="<?= REQUEST_IMG_URL ?>image/view.png"></img>View</button> 
	                                                        </a>

	                                                        <?php
															echo $this->Form->postLink('<button class="btn btn-danger" style="border-radius:20px;background: #ec1c41;"><i class="fa fa-times" style="margin-right: 5px;font-size: 15px;"></i>Cancel</button>', Router::url(['controller' => 'Requests', 'action' => 'cancleRequest', $request->id], TRUE), ['escape' => FALSE, 'confirm' => 'Are you sure want to delete?']);
	                                                        ?>


	                                                    </td>

	                                                </tr>        
	                                            <?php $i++; endforeach; ?>
	                                        </tbody>
	                                    </table>
	                                </div>
	                            </div>
	                        </div>
							
							

	                        <div class="tab-pane content-datatable datatable-width" id="approved_designs_tab" role="tabpanel">
	                            <div class="row">
	                                <div class="col-md-12">
	                                    <table data-responsive="true" class="custom-table table table-striped table-hover dt-responsive dt-opt">
	                                        <thead>
	                                            <tr>
	                                                <th>Id</th>
	                                                <th>Title</th>
	                                                <th>Description</th>                           	                                      
	                                                <th>Customer Name</th>                           
	                                                <th>Designer Assigned</th>                           	                                       
	                                                <th>Date Requested(MM/DD/YYYY)</th>
													<th>No. of New Messages(<?= $total_unread_message2 ?>)</th>
	                                                <th>Action</th>                            
	                                            </tr>
	                                        </thead>
	                                        <tbody>
	                                            <?php $i=1;
												foreach ($approved_designs as $request): ?>
												
	                                                <tr>
	                                                    <td><?= $i ?></td>
	                                                    <td><?= $request->title ?></td>
	                                                    <td><?= substr($request->description,0,100) ?></td>  	                                               
	                                                    <td><?= ($request->customer) ? $request->customer->first_name . ' ' . $request->customer->last_name : '' ?></td>  
	                                                    <td><?= ($request->designer) ? $request->designer->first_name . ' ' . $request->designer->last_name : '' ?></td>  	                                           
	                                                    <td  style="color:<?php echo $txtcolor; ?>;"><?= ($request->created) ? date("m/d/Y g:i a",strtotime($request->created)) : ''; ?></td> 
														<td><?php if($admin_unread_message_count_array2[$request->id]!=0) { ?> 
														<button class="btn btn-primary" style="border-radius:20px;background:orange;border:none;">
														<?= $admin_unread_message_count_array2[$request->id] ?> Messages</button> 
														<?php } ?></td>
	                                                    <td style="display: inline-flex;">
	                                                        <a href="<?= Router::url(['controller' => 'Requests', 'action' => 'view', $request->id]); ?>">	                                                           
																<button class="btn btn-primary" style="border-radius:20px;background:#3e3c3c;border: none;"><img style="width:20px;" src="<?= REQUEST_IMG_URL ?>image/view.png"></img>View</button>
	                                                        </a>

	                                                        <?php
														   echo $this->Form->postLink('<button class="btn btn-danger" style="border-radius:20px;background: #ec1c41;"><i class="fa fa-times" style="margin-right: 5px;font-size: 15px;"></i>Cancel</button>', '#', ['escape' => FALSE, 'confirm' => 'Are you sure want to delete?']);
	                                                        ?>


	                                                    </td>

	                                                </tr>        
	                                            <?php $i++; endforeach; ?>
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