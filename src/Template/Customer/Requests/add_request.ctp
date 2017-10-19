<?php

use Cake\Routing\Router;

?>
<?php ?>
<?= $this->Flash->render(); ?>
<?= $this->Form->create($request, ['type' => 'file']); ?>
<?php $this->Form->templates(NOWRAP_TEMPLATE); ?>

<style type="text/css">
    .page-title {
        padding: 0 37px;
    }
    .card .fa {
        padding-left: 50px;
    }
    .image-upload > input{
        display: none;
    }

    .image-upload img {
        width: 40px;
    }

    .file-input {
        border-radius: 7px;
        border: solid red 2px;
        padding: 7px 19px;
        cursor: pointer;
    }

    .image-upload span {
        color: red;
        font-size: 15px;
        margin-left: 20px;
    }
</style>
<div class="main-content">
    <div class="container-fluid">
        <div class="page-title">
            <h4>Add Requests</h4>
        </div>
        <div class="row">
            <div class="col-md-12" style="padding: 0 45px;">
                <div class="card">
                    <div class="card-block">
                        <div class="mrg-top-10">
                            <div class="row">
                                <div class="col-md-12 ml-auto mr-auto" style="padding: 0px 25px;">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Project Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <?= $this->Form->control('title', ['class' => 'form-control', 'label' => FALSE,'style'=>'border-radius: 2px;','required']) ?>
                                            </div>
                                        </div>
                                    </div>                                   
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Design Type</label>
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <?= $this->Form->control('work_type', ['options' => [''=>'Select Design Type','print' => 'Print', 'web' => 'Web','Flyer' => 'Flyer','Brochure' => 'Brochure','Webpage' => 'Webpage','App Design' => 'App Design','Business Card' => 'Business Card','Logo' => 'Logo',' T-shirt' => ' T-shirt','Infographic' => 'Infographic','Web Banner' => 'Web Banner','Facebook Cover' => 'Facebook Cover','Other' => 'Other',], 'class' => 'form-control select2', 'label' => FALSE,'style'=>'border-radius: 2px;','required']) ?>
                                            </div>
                                        </div>
                                    </div>      
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Design Dimension(if known)</label>
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group">                                                
                                                <?= $this->Form->control('design_dimension', ['class' => 'form-control', 'label' => FALSE,'style'=>'border-radius: 2px;']) ?>
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Project Description</label>
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group">                                                
                                                <?= $this->Form->control('description', ['type' => 'textarea', 'class' => 'form-control', 'label' => FALSE,'style'=>'border-radius: 2px;','required']) ?>
                                            </div>
                                        </div>
                                    </div>      
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>What business indutstry is this design for?</label>
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group">                                                
                                                <?= $this->Form->control('description', ['type' => 'textarea', 'class' => 'form-control', 'label' => FALSE,'style'=>'border-radius: 2px;','required']) ?>
                                            </div>
                                        </div>
                                    </div>      
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>What colors do you want for this design?</label>
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group">                                                
                                                <?= $this->Form->control('description', ['type' => 'textarea', 'class' => 'form-control', 'label' => FALSE,'style'=>'border-radius: 2px;','required']) ?>
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Do you have some style suggestions?</label>
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group">                                                
                                                <?= $this->Form->control('description', ['type' => 'textarea', 'class' => 'form-control', 'label' => FALSE,'style'=>'border-radius: 2px;','required']) ?>
                                            </div>
                                        </div>
                                    </div>      
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Do you have a logotype of brand identity?<br/>(please attach also)</label>                                                
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group">                                                
                                                <?= $this->Form->control('description', ['type' => 'textarea', 'class' => 'form-control', 'label' => FALSE,'style'=>'border-radius: 2px;','required']) ?>
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Is there any other info you would like to provide the designer?</label>                                                
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group">                                                
                                                <?= $this->Form->control('description', ['type' => 'textarea', 'class' => 'form-control', 'label' => FALSE,'style'=>'border-radius: 2px;','required']) ?>
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Attach Helpful Images</label>
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group">                                                
                                                <div class="form-group" id="addnewimage" style="position:relative;">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            
                                                            <div class="image-upload">
                                                                <label class="file-input">
                                                                    <image src="<?= REQUEST_IMG_URL ?>image/cloud.png" />
                                                                    <span>Drag and drop a file here or click  </span>
                                                                </label>
                                                                <?= $this->Form->control('file[]', ['type' => 'file', 'id' => 'upload_file', 'label' => FALSE]) ?>
                                                            </div>
                                                           <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th width="50%">Document Name</th>
                                                                        <th width="10%">Size</th>
                                                                        <th width="40%" class="text-right">Action</th>                                                        
                                                                    </tr>
                                                                </thead>
                                                                <tbody>              

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="form-group" style = "text-align: center;">
                                                <?= $this->Form->button('+ Add Request', ['type' => 'submit', 'class' => 'btn btn-success flat-buttons waves-effect waves-button','style'=>'border: #f83a5b;background: RGB(13,48,68);height: 50px;border-radius: 10px;']) ?>                                          
                                                <a href="<?= \Cake\Routing\Router::url(['controller' => 'Requests', 'action' => 'allRequests'], TRUE)?>">
                                                    <?= $this->Form->button('Cancel', ['type' => 'button', 'class' => 'btn btn-success flat-buttons waves-effect waves-button','style'=>'border-radius: 10px;border: #f83a5b;height: 50px;background: transparent;width: 127px;color: red;font-size: 17px;font-weight: bold;']) ?>
                                                </a>
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
<div id="myModalforall" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body myModalforallbody">
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        <?= $this->Form->hidden('request_status', ['value' => $request->status]) ?>
        <?= $this->Form->hidden('request_id', ['value' => $request->id]) ?>
        <?= $this->Form->end(); ?>
    </div>
</div>  
<?= $this->Form->end(); ?>
<?= $this->start('script'); ?>
<script type="text/javascript">
    var input = document.getElementById("upload_file");
    var formdata = false;
    if (window.FormData) {
        formdata = new FormData();
    }
    input.addEventListener("change", function (evt) {
        var i = 0, len = this.files.length, img, reader, file, size;

        for ( ; i < len; i++ ) {
            file = this.files[i];
            size = this.files[i].size;

            if (!!file.type.match(/image.*/)) {
                if ( window.FileReader ) {
                    reader = new FileReader();
                    reader.onloadend = function (e) {
                        //showUploadedItem(e.target.result, file.fileName);
                    };
                    reader.readAsDataURL(file);
                }

                if (formdata) {
                    formdata.append("file", file);
                    formdata.append("request_id", -1);
                }

                if (formdata) {
                    jQuery('div#response').html('<br /><img src="ajax-loader.gif"/>');

                    jQuery.ajax({
                        url: "<?= Router::url(['controller' => 'RequestFiles', 'action' => 'uploadFileTemp', 'prefix' => FALSE], TRUE) ?>",
                        type: "POST",
                        data: formdata,
                        dataType: "JSON",
                        processData: false,
                        contentType: "application/json; charset=utf-8",
                        success: function (res) {
                            
                            var url = window.location.href;
                            
                            var arr = url.split("/");
                            console.log(res);
                            console.log(JSON.stringify(res));
                            console.log(res[0]);
                            console.log(res['id']);
                            var attachment_path = arr[0] + "//" + arr[1] + arr[2] + "/uploads/requests/-1/" + res;
                            var extension = attachment_path.split(".")[attachment_path.split(".").length-1];
                            var html = "<tr><th>" + res + "</th><th>" + size + "KB</th><th style='text-align: right;'><a href='#' class='openfile' data-path='" + attachment_path + "' data-extension= '" + extension + "'><i class='fa fa-eye' aria-hidden='true'></i>&nbsp;&nbsp;&nbsp;View</a><a href=" + attachment_path + " download = ''><i class='fa fa-download' aria-hidden='true'></i>&nbsp;&nbsp;&nbsp;Download</a><a href='#' class='deletefile' ><i class='fa fa-times' aria-hidden='true'></i></a></th></tr>";
                            $('table tbody').append(html);

                        }
                    });
                }
            }
            else
            {
                alert('Not a vaild image!');
            }
        }

    }, false);

    jQuery(document).ready(function ($) {
        $('table').on('click', '.deletefile', function () {
            alert('a');
            $(this).parent().parent().remove();
        });

        $('.file-input').click(function(){
            $('.image-upload #upload_file').trigger('click');
        });

    });

</script>
<?= $this->end('script'); ?>
<style>
.dropify-wrapper{
	border-radius: 2px;
}
body{
	background:aliceblue;
}
</style>