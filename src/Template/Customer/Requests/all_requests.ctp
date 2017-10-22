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


<div class="main-content">
    <div class="container-fluid">
        <div class="page-title">
            <h4>All Running Requests</h4>
        </div>
        <div class="card" style="background-color: transparent;border: none;">
            <div class="padding-10">

                <div class="table-overflow">	                                            

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
							$button="RGB(250,187,111)";
							$view = "View"; 
						}elseif($request->status == "disapprove")
						{
							$status = "Revision";
							$button="RGB(229,33,69)";
							$view = "Review"; 
						}elseif($request->status == "pendingforapprove")
						{
							$status = "Waiting for Approval";
							$button="RGB(120,214,101)";
							$view = "Review"; 
						}elseif($request->status == "checkforapprove"){
							$status = "Waiting for Approval";
							$button="RGB(120,214,101)";
							$view = "View"; 
						}elseif($request->status == "assign"){
							$status = "In Queue";																
							$button="RGB(229,33,69)";
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

                            <div class="col-lg-4 col-md-6 col-xs-12 all-requests-item">
                                <div class="card" style="font-size: 19px;border: 1px solid #e6ecf5;">
                                	<div class="card-block card-item-header" >
                                		<h6 class="card-title"><?= $request->title?></h6>
                                		<p class="card-status" style="color: <?=$button?>;"><?= $status?></p>
                                		<p class="card-des"><?= $request->description?></p>
                                	</div>
                                    <div class="card-block card-date">								                                            
                                        <div class="mrg-top-15">
                                        	<div class = "row">
                                            	<div class="col-md-7">
                                            		Due Requested:
                                            	</div>
                                                <div class="col-md-5 text-right">
                                                	<?php echo $due_date; ?>
                                            	</div>								                                                
                                            </div>
                                        </div>
                                        <div class="mrg-top-15">
                                        	<div class = "row">
                                            	<div class="col-md-7">
                                            		Date In Progress:
                                            	</div>
                                                <div class="col-md-5 text-right">
                                                	<?= ($request->dateinprogress) ? date('m/d/Y',strtotime($request->dateinprogress)) : ''; ?>
                                                	<!-- <?= ($request->dateinprogress) ? date('g:i a',strtotime($request->dateinprogress)) : ''; ?> -->
                                            	</div>								                                                
                                            </div>
                                        </div>
                                        <div class="mrg-top-15">
                                        	<div class = "row">
                                            	<div class="col-md-7">
                                            		Due Date:
                                            	</div>
                                                <div class="col-md-5 text-right">
                                                	<?php echo $due_date; ?>
                                            	</div>								                                                
                                            </div>
                                        </div>								                                            
                                        <div class="mrg-top-15">
                                        	<div class = "row">
                                            	<div class="col-md-7">
                                            		Messages:
                                            	</div>
                                                <div class="col-md-5 text-right">
                                                	<?php echo $due_date; ?>
                                            	</div>								                                                
                                            </div>
                                        </div>								                                            
                                    </div>
                                    <div class="card-footer border top mrg-top-25" style="text-align: center;">
                                        <div class="col-md-6 text-right">
                                            <button class="btn btn-primary" onclick="window.location.href='<?= Router::url(['controller' => 'Requests', 'action' => 'viewRunningRequest', $request->id]); ?>'" style="font-weight: bold;font-size: 13px;border-radius:3px;background:  RGB(53,63,83);border: none;"><?= REVIEW_ICON ?><span style="vertical-align: middle;margin-left: 5px;"><?= $view ?></span></button> 
                                            <!-- <a href="<?= Router::url(['controller' => 'Requests', 'action' => 'viewRunningRequest', $request->id]); ?>">                    											 	
		                                    </a> -->
		                                </div>
		                                <div class="col-md-6 text-left">
                                            <button class="btn btn-primary" onclick="window.location.href='<?= Router::url(['controller' => 'Requests', 'action' => 'cancleRequest', $request->id], TRUE); ?>'" style="font-weight: bold;font-size: 13px;border: none;border-radius:3px;background: #fff; color:red;"><?=CLOSE_ICON?><span style="vertical-align: middle;margin-left: 5px;">Cancel</span></button> 
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

        		</div>
            </div>
        </div>                        
    </div>
</div>
