<?php
namespace App\Controller;



use Cake\Core\Configure;

use Cake\Network\Exception\ForbiddenException;

use Cake\Network\Exception\NotFoundException;

use Cake\View\Exception\MissingTemplateException;

use Cake\Auth\DefaultPasswordHasher;

use Cake\Routing\Router;

use Cake\Mailer\Email;
?>
<?php if ($discussion_history){ ?>
    <?php foreach ($discussion_history as $discussion){ ?>
		<?php  if($currentuser->role == "admin"){ 
			if (in_array($discussion->sender->role, [USER_DESIGNER, USER_ADMIN])){ ?>
		
            <div class="col-md-12">
                <div class="chat-receiver">
                    <div class="row">
                        <div class="col-xl-11 col-md-10 col-xs-9 col-sm-10 right-side">
                            <div class="chat-detail chat-arrow float-xs-right">
                                <h6><?= $discussion->sender->first_name . ' ' . $discussion->sender->last_name ?></h6>
                                <p><?= $discussion->message ?></p>
                                <span class="chat-time"><?= $discussion->created->format('Y-m-d H:i:s') ?></span>
								<?php if($discussion->verified_by_admin == 0 && $currentuser->role == "admin"){ ?>
								
									<!-- <button class="btn btn-primary approveadmin approvedisapprove<?= $discussion->id ?>" data-id="<?= $discussion->id ?>" style="background:#63ac6a;" >Approve</button> -->
								
							<!-- 	<button class="btn btn-danger disapproveadmin approvedisapprove<?= $discussion->id ?>" data-id="<?= $discussion->id ?>" onclick="javascript:void(0);">Dispprove</button> -->
								<?php //echo $currentuser->id; ?>
								<?php } ?>
                            </div>
                        </div>
                        <div class="col-xl-1 col-md-2 col-xs-3 col-sm-2 left-side">
                            <div class="chat-image float-xs-right">      
                                <?php
                                $img_path = '';
                                $img_path = @$discussion->sender->profile_picture_url;
                                if ($img_path){
                                    echo $this->Html->image($img_path, ['class' => 'active-user', 'alt' => 'Profile image']);
								}
                                ?> 
                            </div>
                        </div>                               
                    </div>
                </div>
            </div>
        <?php  } else { ?>
		
            <div class="col-md-12">
                <div class="chat-sender">
                    <div class="row">
                        <div class="col-xl-1 col-md-2 col-xs-3 col-sm-2 left-side">
                            <div class="chat-image">
                                <?php
                                $img_path = '';
                                $img_path = @$discussion->sender->profile_picture_url;
                                if ($img_path){
                                    echo $this->Html->image($img_path, ['class' => 'active-user', 'alt' => 'Profile image']);
								}
                                ?>    
                            </div>
                        </div>
                        <div class="col-xl-10 col-md-10 col-xs-9 col-sm-10 right-side">
                            <div class="chat-detail chat-arrow float-xs-left">
                                <h6 class="active-user-title"><?= $discussion->sender->first_name . ' ' . $discussion->sender->last_name ?></h6>
                                <p><?= $discussion->message ?></p>
                                <span class="chat-time"><?= $discussion->created->format('Y-m-d H:i:s') ?></span>
								<?php if($discussion->verified_by_admin == 0 && $currentuser->id == 8){ ?>
								
									<button class="btn btn-primary approveadmin approvedisapprove<?= $discussion->id ?>" data-id="<?= $discussion->id ?>" style="background:#63ac6a;" >Approve</button>
								
								<button class="btn btn-danger disapproveadmin approvedisapprove<?= $discussion->id ?>" data-id="<?= $discussion->id ?>" onclick="javascript:void(0);">Dispprove</button>
								<?php //echo $currentuser->id; ?>
								<?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
	
	<?php } 
		}else{
	?>
       
		<?php if($discussion->sender_id == $currentuser->id){ ?>
		
            <div class="col-md-12">
                <div class="chat-receiver">
                    <div class="row">
                        <div class="col-xl-11 col-md-10 col-xs-9 col-sm-10 right-side">
                            <div class="chat-detail chat-arrow float-xs-right">
                                <h6><?= $discussion->sender->first_name . ' ' . $discussion->sender->last_name ?></h6>
                                <p><?= $discussion->message ?></p>
                                <span class="chat-time"><?= $discussion->created->format('Y-m-d H:i:s') ?></span>
								<?php if($discussion->verified_by_admin == 0 && $currentuser->role == "admin"){ ?>
								
									<button class="btn btn-primary approveadmin approvedisapprove<?= $discussion->id ?>" data-id="<?= $discussion->id ?>" style="background:#63ac6a;" >Approve</button>
								
								<button class="btn btn-danger disapproveadmin approvedisapprove<?= $discussion->id ?>" data-id="<?= $discussion->id ?>" onclick="javascript:void(0);">Dispprove</button>
								<?php //echo $currentuser->id; ?>
								<?php } ?>
                            </div>
                        </div>
                        <div class="col-xl-1 col-md-2 col-xs-3 col-sm-2 left-side">
                            <div class="chat-image float-xs-right">      
                                <?php
                                $img_path = '';
                                $img_path = @$discussion->sender->profile_picture_url;
                                if ($img_path){
                                    echo $this->Html->image($img_path, ['class' => 'active-user', 'alt' => 'Profile image']);
								}
                                ?> 
                            </div>
                        </div>                               
                    </div>
                </div>
            </div>
        <?php  } else {   ?>
		<?php  if($discussion->reciever_id == $currentuser->id && $discussion->verified_by_admin == "1"){ ?>
            <div class="col-md-12">
                <div class="chat-sender">
                    <div class="row">
                        <div class="col-xl-1 col-md-2 col-xs-3 col-sm-2 left-side">
                            <div class="chat-image">
                                <?php
                                $img_path = '';
                                $img_path = @$discussion->sender->profile_picture_url;
                                if ($img_path){
                                    echo $this->Html->image($img_path, ['class' => 'active-user', 'alt' => 'Profile image']);
								}
                                ?>    
                            </div>
                        </div>
                        <div class="col-xl-10 col-md-10 col-xs-9 col-sm-10 right-side">
                            <div class="chat-detail chat-arrow float-xs-left">
                                <h6 class="active-user-title"><?= $discussion->sender->first_name . ' ' . $discussion->sender->last_name ?></h6>
                                <p><?= $discussion->message ?></p>
                                <span class="chat-time"><?= $discussion->created->format('Y-m-d H:i:s') ?></span>
								<?php if($discussion->verified_by_admin == 0 && $currentuser->id == 8){ ?>
								
									<button class="btn btn-primary approveadmin approvedisapprove<?= $discussion->id ?>" data-id="<?= $discussion->id ?>" style="background:#63ac6a;" >Approve</button>
								
								<button class="btn btn-danger disapproveadmin approvedisapprove<?= $discussion->id ?>" data-id="<?= $discussion->id ?>" onclick="javascript:void(0);">Dispprove</button>
								<?php //echo $currentuser->id; ?>
								<?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
	<?php } ?>
	<?php } ?>
	<?php } ?>
	<?php } ?>
<?php } ?>
<script>
$('.approveadmin').on('click', function () {
			var id=$(this).attr('data-id');
			 $.ajax({
                url: "<?= Router::url(['controller' => 'RequestDiscussions', 'action' => 'approveDiscussionData', 'prefix' => FALSE], TRUE) ?>",
                type: 'POST',
                dataType: 'JSON',
                data: {
                    id: id
                },
                success: function (data, textStatus, jqXHR) {
                   //console.log(data);
				   if(data.status == "1"){
					   //console.log(data);
					   $('.approvedisapprove'+id).css("display","none");
				   }
                }
            });
		});
		
$('.disapproveadmin').on('click', function () {
			var id=$(this).attr('data-id');
			 $.ajax({
                url: "<?= Router::url(['controller' => 'RequestDiscussions', 'action' => 'disapproveDiscussionData', 'prefix' => FALSE], TRUE) ?>",
                type: 'POST',
                dataType: 'JSON',
                data: {
                    id: id
                },
                success: function (data, textStatus, jqXHR) {
                   //console.log(data);
				   if(data.status == "1"){
					   //console.log(data);
					   $('.approvedisapprove'+id).css("display","none");
				   }
                }
            });
		});
</script>	