<?php

use Cake\Routing\Router;
?>

<!-- <section id="content-wrapper">
    <div class="site-content-title" style="background-color: white;">
        <h2 class="float-xs-left content-title-main">All Running Requests</h2>
		<button class="btn btn-primary" onclick="window.location.href='<?= Router::url(['controller' => 'Requests', 'action' => 'addRequest', 'prefix' => 'customer']); ?>'" style="float:right;margin:1% 2% 0% 0%;color: #fff !important;font-weight: 500;background: #ec1c41;border: 0px;border-radius: 20px;margin-top: 15px;">+ Add New Request</button>
		
        <ol class="breadcrumb float-xs-right">
            <li class="breadcrumb-item">
                <span class="fs1" aria-hidden="true" data-icon=""></span>
                <a href="#">Main Menu</a>
            </li>
            <li class="breadcrumb-item active">View Users</li>
        </ol>
    </div>
		
</section> -->

<style type="text/css">
	th, tr {
		text-align: center;
	}
	.btn-default {
		color: #515365!important;
	}
</style>
<div class="main-content">
    <div class="container-fluid">
        <div class="page-title">
            <h4>Customer Dashboard</h4>
        </div>
        <div class="card">
            <div class="padding-20">
                <button class="btn btn-primary" onclick="window.location.href='<?= Router::url(['controller' => 'Requests', 'action' => 'addRequest', 'prefix' => 'customer']); ?>'" style="float:right;margin:1% 2% 0% 0%;color: #fff !important;font-weight: 500;background: #ec1c41;border: 0px;border-radius: 20px;margin-top: 15px;">+ Add New Request</button>
            </div>
            <div class="tab-primary">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="#tab-primary-1" class="nav-link active" role="tab" data-toggle="tab">Pending</a>
                    </li>
                    <li class="nav-item">
                        <a href="#tab-primary-2" class="nav-link" role="tab" data-toggle="tab">Approve</a>
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
	                                            <table class="table table-lg table-hover dt-opt">
	                                                <thead>
	                                                   <!--  <tr>
	                                                    	<th style="padding-right: 0px;">Id</th>
															<th style="padding-right: 0px;">Status</th>
								                            <th style="padding-right: 0px;">Title</th>
								                            <th style="padding-right: 0px;">Description</th>
															<th style="padding-right: 0px;">Requested<br/><span style="font-size:10px;">(MM/DD/YYYY)</span></th>
															<th style="padding-right: 0px;">In Progress<br/><span style="font-size:10px;">(MM/DD/YYYY)</span></th>
															<th style="padding-right: 0px;">Due Date<br/><span style="font-size:10px;">(MM/DD/YYYY)</span></th> 
															<th style="padding-right: 0px;">Messages(<?= $total_unread_message ?>)</th>		
															<th style="padding-right: 0px;">Action</th>     
	                                                    </tr> -->
	                                                </thead>
	                                                <tbody>
	                                                	<?php $i = 1; ?>
								                        <?php  foreach ($requests as $k => $request): ?>
														<?php 
														
															$due_date="";
															if($request->dateinprogress != "" && !empty($turn_around_days_array[$k])){
																$due_date = strtotime($request->dateinprogress) + 60*60*24*$turn_around_days_array[$k];										
															}
															if($request->status == "pending") 
															{ $status = "Pending"; $bgcolor=""; $textcolor=""; $view = "View"; $button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;";} 
															elseif($request->status == "running") 
															{ $status = "In Queue"; $bgcolor=""; $textcolor=""; $view = "View"; $button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;";}
															elseif($request->status == "active")
															{
																$status = "In Progress";
																$button="btn-warning";
																$view = "View"; 
															}elseif($request->status == "disapprove")
															{
																$status = "Revision";
																$button="btn-info";
																$view = "Review"; 
															}elseif($request->status == "pendingforapprove")
															{
																$status = "Waiting for Approval";
																$button="btn-success";
																$view = "Review"; 
															}elseif($request->status == "checkforapprove"){
																$status = "Waiting for Approval";
																$button="btn-success";
																$view = "View"; 
															}elseif($request->status == "assign"){
																$status = "In Queue";																
																$button="btn-default";
																$view = "View"; 
															}else{
																$status = "";
																$bgcolor="";
																$textcolor="";
																$view = ""; 
																$button="";
															}
															//echo $request->status;
														?>

								                                <div class="col-md-4">
								                                    <div class="card">
								                                    	<div class="card-block" style="background: #F6F6F6;">
								                                    		<h4 class="card-title"><?= $request->title?></h4>
								                                    	</div>
								                                        <div class="card-block">								                                            
								                                            <div class="mrg-top-20">
								                                            	<div class = "form-group row">
									                                            	<div class="col-md-3">
									                                            		<b>Title:</b>
									                                            	</div>
									                                                <div class="col-md-9">
									                                                	<?= $request->title?>
									                                            	</div>								                                                
									                                            </div>
								                                            </div>
								                                            <div class="mrg-top-20">
								                                            	<div class = "form-group row">
									                                            	<div class="col-md-3">
									                                            		<b>Description:</b>
									                                            	</div>
									                                                <div class="col-md-9">
									                                                	<?= $request->description?>
									                                            	</div>								                                                
									                                            </div>
								                                            </div>
								                                            <div class="mrg-top-20">
								                                            	<div class = "form-group row">
									                                            	<div class="col-md-3">
									                                            		<b>State:</b>
									                                            	</div>
									                                                <div class="col-md-9">
									                                                	<a href="#" class="btn <?= $button?>"><?= $status?></a>
									                                            	</div>								                                                
									                                            </div>
								                                            </div>
								                                            <div class="mrg-top-20">
								                                            	<div class = "form-group row">
									                                            	<div class="col-md-3">
									                                            		<b>Date In Progress:</b>
									                                            	</div>
									                                                <div class="col-md-9">
									                                                	<?= ($request->dateinprogress) ? date('m/d/Y',strtotime($request->dateinprogress)) : ''; ?><br/><?= ($request->dateinprogress) ? date('g:i a',strtotime($request->dateinprogress)) : ''; ?>
									                                            	</div>								                                                
									                                            </div>
								                                            </div>
								                                            <div class="mrg-top-20">
								                                            	<div class = "form-group row">
									                                            	<div class="col-md-3">
									                                            		<b>Due Date:</b>
									                                            	</div>
									                                                <div class="col-md-9">
									                                                	<?php echo $due_date; ?>
									                                            	</div>								                                                
									                                            </div>
								                                            </div>
								                                            <div class="mrg-top-20">
								                                            	<div class = "form-group row">
									                                            	<div class="col-md-3">
									                                            		<b>Messages:</b>
									                                            	</div>
									                                                <div class="col-md-9">
									                                                	<?php echo $due_date; ?>
									                                            	</div>								                                                
									                                            </div>
								                                            </div>
								                                            <div class="mrg-top-20">
								                                            	<div class = "form-group row">
								                                            		<div class="col-md-3">
									                                            	</div>
									                                                <div class="col-md-9">
									                                                	<a href="<?= Router::url(['controller' => 'Requests', 'action' => 'viewRunningRequest', $request->id]); ?>">                    
																						 	<button class="btn btn-primary" style="border-radius:20px;background:#3e3c3c;border: none;"><img style="width:20px;" src="<?= REQUEST_IMG_URL ?>image/view.png"></img><?= $view ?></button> 
													                                    </a>
									                                                	<!-- <button type="submit" class="btn btn-primary">View</button>
                                                                						<button class="btn btn-default" style="color:#515365!important;">Cancel</button>									                                                	 -->
                                                                						<?= $this->Form->postLink('<button class="btn btn-danger" style="border-radius:20px;background: #ec1c41;"><i class="fa fa-times" style="margin-right: 5px;font-size: 15px;"></i>Cancel</button>', Router::url(['controller' => 'Requests', 'action' => 'cancleRequest', $request->id], TRUE), ['confirm' => 'Are you sure you want to cancle this request?', 'escape' => FALSE]); ?>
									                                            	</div>										                                            		
								                                            	</div>
								                                            </div>
								                                        </div>
								                                    </div>
								                                </div>
<!-- 
								                            <tr <?= $request->status ?>>
								                                <td>
								                                	<div class="mrg-top-15">
	                                                                	<span><b><?= $i++; ?></b></span>
	                                                            	</div>
	                                                            </td>    
																<td>
																	<div class="mrg-top-15">
																		<button class="btn btn-deafult" style="<?= $button ?>"><?php echo $status; ?></button>
	                                                            	</div>
	                                                            	
	                                                            </td>								
								                                <td>
								                                	<div class="mrg-top-15">
	                                                                	<span><b><?= $request->title?></b></span>
	                                                            	</div>
	                                                            </td>
								                                <td>
								                                	<div class="mrg-top-15">												                                		<span><b><?= $request->description ?></b></span>
	                                                            	</div>												                                	
								                                </td>
																<td>
																	<div class="mrg-top-15">												                                		<span><b><?= ($request->created) ? date('m/d/Y',strtotime($request->created)) : ''; ?><br/><?= ($request->created) ? date('g:i a',strtotime($request->created)) : ''; ?></b></span>
	                                                            	</div>	
																</td>  
																<td>
																	<div class="mrg-top-15">												                                		<span><b><?= ($request->dateinprogress) ? date('m/d/Y',strtotime($request->dateinprogress)) : ''; ?><br/><?= ($request->dateinprogress) ? date('g:i a',strtotime($request->dateinprogress)) : ''; ?></b></span>
	                                                            	</div>	
	                                                            </td>  
																<td>
																	<div class="mrg-top-15">												                                		<span><b><?php echo $due_date; ?></b></span>
	                                                            	</div>						                                                            
	                                                            </td>  
													
								                                <td>
								                                	<?php if($admin_unread_message_count_array[$request->id] != 0){ ?>
																	 <button class="btn btn-primary" style="border-radius:20px;background:orange;border:none;">
																		<?= $admin_unread_message_count_array[$request->id] ?> Messages</button> 
																	<?php } ?>												                                    
								                                </td>
																<td>
																	<a href="<?= Router::url(['controller' => 'Requests', 'action' => 'viewRunningRequest', $request->id]); ?>">                    
																	 <button class="btn btn-primary" style="border-radius:20px;background:#3e3c3c;border: none;"><img style="width:20px;" src="<?= REQUEST_IMG_URL ?>image/view.png"></img><?= $view ?></button> 
								                                    </a>
								                                    <?= $this->Form->postLink('<button class="btn btn-danger" style="border-radius:20px;background: #ec1c41;"><i class="fa fa-times" style="margin-right: 5px;font-size: 15px;"></i>Cancel</button>', Router::url(['controller' => 'Requests', 'action' => 'cancleRequest', $request->id], TRUE), ['confirm' => 'Are you sure you want to cancle this request?', 'escape' => FALSE]); ?>
																</td>
								                            </tr>        --> 
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
	                                            <table class="table table-lg table-hover dt-opt">
					                                <thead>
<!-- 								                        <tr>
								                            <th>Id</th>
								                            <th>Title</th>
								                            <th>Description</th>                           
															<th>Messages(<?= $total_approved_unread_message ?>)</th>
															<th>Action</th>  
								                        </tr> -->
								                    </thead>
								                    <tbody>
								                        <?php $i = 1; ?>
								                        <?php foreach ($requests_approved as $request): ?>
								                        	<div class="col-md-4">
								                                <div class="card">
								                                    <div class="card-block" style="background: #F6F6F6;">
								                                        <h4 class="card-title"><?= $request->title?></h4>
								                                    </div>
								                                    <div class="card-block">                                                                            
								                                        <div class="mrg-top-20">
								                                            <div class = "form-group row">
								                                                <div class="col-md-3">
								                                                    <b>Title:</b>
								                                                </div>
								                                                <div class="col-md-9">
								                                                    <?= $request->title?>
								                                                </div>                                                                              
								                                            </div>
								                                        </div>
								                                        <div class="mrg-top-20">
								                                            <div class = "form-group row">
								                                                <div class="col-md-3">
								                                                    <b>Description:</b>
								                                                </div>
								                                                <div class="col-md-9">
								                                                    <?= $request->description?>
								                                                </div>                                                                              
								                                            </div>
								                                        </div>
								                                        <div class="mrg-top-20">
								                                            <div class = "form-group row">
								                                                <div class="col-md-3">
								                                                </div>
								                                                <div class="col-md-9">
								                                                    <a href="<?= Router::url(['controller' => 'Requests', 'action' => 'viewApprovedRequest', $request->id]); ?>">
								                                                     <button class="btn btn-primary" style="border-radius:20px;background:#3e3c3c;border: none;"><img style="width:20px;" src="<?= REQUEST_IMG_URL ?>image/view.png">View</button> 
								                                                    </a>
								                                                </div>                                                                              
								                                            </div>
								                                        </div>                                      
								                                    </div>
								                                </div>
								                            </div>
								                           <!--  <tr>
								                                <td>
								                                	<div class="mrg-top-15">
		                                                                <span><?= $i++; ?></span>
		                                                            </div>
		                                                        </td>                                
								                                <td>												                                	
								                                	<div class="mrg-top-15">
		                                                                <span><?= $request->title ?></span>
		                                                            </div>
								                                </td>
								                                <td>
								                                	<div class="mrg-top-15">
		                                                                <span><?= $request->description ?></span>
		                                                            </div>
		                                                        </td>
		                                                        <td>
																	 <?php if($admin_approved_unread_message_count_array[$request->id] != 0){ ?>
																	 <button class="btn btn-primary" style="border-radius:20px;background:orange;border:none;">
																		<?= $admin_approved_unread_message_count_array[$request->id] ?> Messages</button> 
																	<?php } ?>
																</td>                               
								                                <td>
																	<a href="<?= Router::url(['controller' => 'Requests', 'action' => 'viewApprovedRequest', $request->id]); ?>">

																	 <button class="btn btn-primary" style="border-radius:20px;background:#3e3c3c;border: none;"><img style="width:20px;" src="<?= REQUEST_IMG_URL ?>image/view.png">View</button> 
								                                    </a>
								                                </td>																				
								                            </tr>         -->
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
