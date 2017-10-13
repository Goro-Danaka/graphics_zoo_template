<?php

use Cake\Routing\Router;
?>

<div class="main-content">
    <div class="container-fluid">

        <div class="content content-datatable datatable-width" style="margin-left: 13%;margin-right: 13%;border-radius: 20px;margin-top: 5%;">
            <div class="col-md-12 profile-contain">

                <div class="dashboard-header">
                 	
                    <div class="dashboard-action">
                 
                    </div>
                </div>
    			<div>
    				<div class="col-xl-2" style="text-align:center;">
    				</div>
    				<div class="col-xl-8" style="text-align:center;">
    					<h3 style="font-size: 34px;color: #ec1c41;font-weight: 800;margin-top: 20px;">Hello, <?= $designer->first_name ?>!</h3>
    					<div style="display: inline-flex;margin-top: 80px;">
    					
    					
    					<a href="<?= Router::url(['controller' => 'Requests', 'action' => 'allPendingRequest', 'prefix' => 'designer']); ?>">
    						<div style="width:171px;height:148px;background:#ec1c41;border-radius: 16px;position: relative;top: 0;bottom: 0;left: 0;right: 0;margin: auto;text-align:center;margin-right:20px;">
    							<img src="<?= REQUEST_IMG_URL ?>image/pencil_scale.png" style="width: 45%;margin-top: 17%;"></img>
    							<h2 style="color: #fff;font-size: 15px;bottom: 0px;left: 2%;letter-spacing: -0.5px;font-weight: 600;">Pending Request</h2>
    						</div>
    					</a>
    					
    					<a href="<?= Router::url(['controller' => 'Requests', 'action' => 'allApprovedRequest', 'prefix' => 'designer']); ?>">
    						<div style="width:171px;height:148px;background:#3e3c3c;;border-radius: 16px;position: relative;top: 0;bottom: 0;left: 0;right: 0;margin: auto;text-align:center;">
    							<img src="<?= REQUEST_IMG_URL ?>image/view.png" style="width: 45%;margin-top: 17%;"></img>
    							<h2 style="color: #fff;font-size: 15px;bottom: 0px;left: 2%;font-weight: 500;letter-spacing: -0.5px;">Approved Request</h2>
    						</div>
    					</a> 
    				
    					</div>

    				</div>
    			</div>
            </div>
        </div>
    </div>
</div>