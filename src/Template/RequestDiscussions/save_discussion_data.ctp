<?php if ($discussion_history): ?>
    <?php foreach ($discussion_history as $discussion): ?>
        <?php if ($discussion->sender->id == $current_user->id): ?>
            <div class="col-md-12">
                <div class="chat-receiver">
                    <div class="row">
                        <div class="col-xl-11 col-md-10 col-xs-9 col-sm-10 right-side">
                            <div class="chat-detail chat-arrow float-xs-right">
                                <h6><?= $discussion->sender->first_name . ' ' . $discussion->sender->last_name ?></h6>
                                <p><?= $discussion->message ?></p>
                                <span class="chat-time"><?= $discussion->created->format('Y-m-d H:i:s') ?></span>
                            </div>
                        </div>
                        <div class="col-xl-1 col-md-2 col-xs-3 col-sm-2 left-side">
                            <div class="chat-image float-xs-right">                               
                                <?php
                                $img_path = '';
                                $img_path = @$discussion->sender->profile_picture_url;
                                if ($img_path):
                                    echo $this->Html->image($img_path, ['class' => 'active-user', 'alt' => 'Profile image']);
                                endif;
                                ?>    
                            </div>
                        </div>                               
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="col-md-12">
                <div class="chat-sender">
                    <div class="row">
                        <div class="col-xl-1 col-md-2 col-xs-3 col-sm-2 left-side">
                            <div class="chat-image">
                                <?php
                                $img_path = '';
                                $img_path = @$discussion->sender->profile_picture_url;
                                if ($img_path):
                                    echo $this->Html->image($img_path, ['class' => 'active-user', 'alt' => 'Profile image']);
                                endif;
                                ?>    
                            </div>
                        </div>
                        <div class="col-xl-10 col-md-10 col-xs-9 col-sm-10 right-side">
                            <div class="chat-detail chat-arrow float-xs-left">
                                <h6 class="active-user-title"><?= $discussion->sender->first_name . ' ' . $discussion->sender->last_name ?></h6>
                                <p><?= $discussion->message ?></p>
                                <span class="chat-time"><?= $discussion->created->format('Y-m-d H:i:s') ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>
    <?php endforeach; ?>
<?php endif; ?>