   <tr>
                                                      <?php 
                                                       if($extension == "pdf"){
                                                            $attachment_path2 = REQUEST_IMG_URL . "pdf.jpg";
                                                            $im     = new Imagick($attachment_path); // 0-first page, 1-second page
                                                            $im->setImageType (imagick::IMGTYPE_TRUECOLOR);
                                                            $im->setImageColorspace(255); // prevent image colors from inverting
                                                            $im->setimageformat("jpeg");
                                                            $im->thumbnailimage(160, 120); // width and height
                                                            $thumbnail = $im->getImageBlob();
                                                            //echo '<img src="data:image/jpg;base64,' .  base64_encode($thumbnail)  . '"  style="width:150px;"/>';
                                                           $admin_files[$i]['file_name']."&nbsp;".VIEW_ICON;
                                                                    }elseif($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "JPG"){  ?>
                                                            <!-- <?=$request_files[$i]['file_name']."&nbsp;".VIEW_ICON;?> -->
                                                            <td><?=$admin_files[$i]['file_name']."&nbsp;"?></td>
                                                            <td><?=$admin_name?></td>
                                                            <td><?=filesize($attachment_path)?></td>
                                                    <?php }else{ 
                                                        $attachment_path2 = REQUEST_IMG_URL . "file.jpg";
                                                        ?> <!--<img src="<?/*= $attachment_path2 */?>" style="width:150px;"> -->
                                                        <!-- <?=$request_files[$i]['file_name']."&nbsp;".DOWNLOAD_ICON;?> -->
                                                            <td><?=$admin_files[$i]['file_name']."&nbsp;"?></td>
                                                            <td><?=$admin_name?></td>
                                                            <td><?php echo filesize($attachment_path);?></td>
                                                            <td>Doe</td>
                                                    <?php } ?>
                                                    
                                                            <?php if($request->status == "checkforapprove"){ ?>
                                                                <?= $this->Form->create($request, ['url' => Router::url(['controller' => 'RequestFiles', 'action' => 'approve', 'prefix' => FALSE], TRUE), 'type' => 'file']); ?>
                                                                    <?php $this->Form->templates(NOWRAP_TEMPLATE); ?>
                                                                    <td style="text-align: center;"><?= $this->Form->control('Approve', ['type' => 'button', 'id' => 'approve_modal', 'class' => 'btn btn-success flat-buttons waves-effect waves-button', 'label' => FALSE,'data-toggle'=>'modal', 'data-target'=>'#myModalforall']) ?></td>
                                                                    <?= $this->Form->hidden('image', ['id' => 'image', 'value' => $attachment_path]) ?>
                                                                    <?= $this->Form->hidden('approvefile', ['id' => 'file_id', 'value' => $admin_files[$i]['id']]) ?>
                                                                    <td style="text-align: center;"><?= $this->Form->control('Disapprove', ['type' => 'button', 'id' => 'request_file_uploader_btn', 'class' => 'btn btn-success flat-buttons waves-effect waves-button', 'label' => FALSE ,'data-toggle'=>'modal', 'data-target'=>'#myModal3']) ?></td>
                                                                    <?= $this->Form->end(); ?>                                                                                
                                                            <?php } ?>
                                                    </tr>

                                                </a>



                                                <tr>
                                                      <?php 
                                                       if($extension == "pdf"){
                                                            $attachment_path2 = REQUEST_IMG_URL . "pdf.jpg";
                                                            $im     = new Imagick($attachment_path); // 0-first page, 1-second page
                                                            $im->setImageType (imagick::IMGTYPE_TRUECOLOR);
                                                            $im->setImageColorspace(255); // prevent image colors from inverting
                                                            $im->setimageformat("jpeg");
                                                            $im->thumbnailimage(160, 120); // width and height
                                                            $thumbnail = $im->getImageBlob();
                                                            //echo '<img src="data:image/jpg;base64,' .  base64_encode($thumbnail)  . '"  style="width:150px;"/>';
                                                           $designer_files[$i]['file_name']."&nbsp;".VIEW_ICON;
                                                                    }elseif($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "JPG"){  ?>
                                                            <!-- <?=$request_files[$i]['file_name']."&nbsp;".VIEW_ICON;?> -->
                                                            <td><?=$designer_files[$i]['file_name']."&nbsp;"?></td>
                                                            <td><?=$designer_name?></td>
                                                            <td><?=filesize($attachment_path)?></td>
                                                    <?php }else{ 
                                                        $attachment_path2 = REQUEST_IMG_URL . "file.jpg";
                                                        ?> <!--<img src="<?/*= $attachment_path2 */?>" style="width:150px;"> -->
                                                        <!-- <?=$request_files[$i]['file_name']."&nbsp;".DOWNLOAD_ICON;?> -->
                                                            <td><?=$designer_files[$i]['file_name']."&nbsp;"?></td>
                                                            <td><?=$designer_name?></td>
                                                            <td><?php echo filesize($attachment_path);?></td>
                                                            <td>Doe</td>
                                                    <?php } ?>
                                                            <?php if($request->status == "checkforapprove"){ ?>
                                                                <?= $this->Form->create($request, ['url' => Router::url(['controller' => 'RequestFiles', 'action' => 'approve', 'prefix' => FALSE], TRUE), 'type' => 'file']); ?>
                                                                    <?php $this->Form->templates(NOWRAP_TEMPLATE); ?>
                                                                    <td style="text-align: center;"><?= $this->Form->control('Approve', ['type' => 'button', 'id' => 'approve_modal', 'class' => 'btn btn-success flat-buttons waves-effect waves-button', 'label' => FALSE,'data-toggle'=>'modal', 'data-target'=>'#myModalforall']) ?></td>
                                                                    <?= $this->Form->hidden('image', ['id' => 'image', 'value' => $attachment_path]) ?>
                                                                    <?= $this->Form->hidden('approvefile', ['id' => 'file_id', 'value' => $designer_files[$i]]) ?>
                                                                    <td style="text-align: center;"><?= $this->Form->control('Disapprove', ['type' => 'button', 'id' => 'request_file_uploader_btn', 'class' => 'btn btn-success flat-buttons waves-effect waves-button', 'label' => FALSE ,'data-toggle'=>'modal', 'data-target'=>'#myModal3']) ?></td>
                                                                    <?= $this->Form->end(); ?>                                                                                
                                                            <?php } ?>
                                                        </tr>