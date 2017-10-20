<?php

use Cake\Routing\Router;
?>
<script>
    jQuery(document).ready(function ($) {
        setTimeout(function () {
            $(".alert").fadeOut(500);
        }, 1000);
		
		$('.dropify-wrapper').css('height','100px');
		$('.dropify-wrapper').css('top','17%');
		$('.dropify-message file-icon').css('display','none');
		$('.dropify-message p').css('margin-top','-15px');
		
		$('.site-content-title').append('<a href="https://www.graphicszoo.com/users/logout">\
		<button class="btn btn-default" style="background: #3e3c3c;float: right;border-radius: 7px;margin: 15px;padding-left: 25px;padding-right: 25px;margin-right: 65px;">Log Out</button>\
		</a>');
    });

    function refresh_chat_container(request_id) {
        
        $.ajax({
            url: "<?= Router::url(['controller' => 'RequestDiscussions', 'action' => 'getDiscussionHistory', 'prefix' => FALSE], TRUE) ?>",
            type: 'POST',
            data: {
                request_id: request_id
            },
            success: function (data, textStatus, jqXHR) {
                $('.discussion_container').empty().append(data);
            }
        });
    }

    function refresh_chat_container_for_admin(request_id) {
        $.ajax({
            url: "<?= Router::url(['controller' => 'RequestDiscussions', 'action' => 'getDiscussionHistoryForAdmin', 'prefix' => FALSE], TRUE) ?>",
            type: 'POST',
            data: {
                request_id: request_id
            },
            success: function (data, textStatus, jqXHR) {
                $('.discussion_container').empty().append(data);
            }
        });
    }


    jQuery(document).ready(function ($) {
        $(".change_password_form").validate({
            rules: {
                old_password: {
                    required: true,
                },
                new_password: {
                    required: true,
                },
                confirm_password: {
                    required: true,
                    equalTo: "#new_password",
                }
            },
            messages: {
                old_password: {
                    required: "* required"
                },
                new_password: {
                    required: "* required"
                },
                confirm_password: {
                    required: "* required",
                    equalTo: "password and confirm password not matched."
                }
            }

        });

        $(".numericOnly").keypress(function (e) {
            if (String.fromCharCode(e.keyCode).match(/[^0-9]/g))
                return false;
        });

		$('a[data-toggle="tab"]').on( 'shown.bs.tab', function (e) {
			$.fn.dataTable.tables( {visible: true, api: true} ).columns.adjust();
		} );


    });

	jQuery('table').on("click" , ".openfile", function(){
		var extension = jQuery(this).attr('data-extension');
		var filepath = jQuery(this).attr('data-path');
		var html = "";
		html += '<a style="background: gray;color: white;padding: 11px;" href="'+filepath+'" download>Download</a>';
		if(extension == 'jpg' || extension == 'jpeg' || extension == 'png' || extension == 'JPG'){
			jQuery('.myModalforallbody').html('');
			html += '<img src="'+filepath+'" style="margin-top: 25px;">';
			jQuery('.myModalforallbody').html(html);
			jQuery('#myModalforall').modal('show'); 
		}else if(extension == "pdf"){
			jQuery('.myModalforallbody').html('');
			html += '<iframe src="'+filepath+'" style="height:500px;width:500px;margin-top: 25px;" frameborder="0"></iframe>';
			jQuery('.myModalforallbody').html(html);
			jQuery('#myModalforall').modal('show'); 
		}else{
			jQuery('.myModalforallbody').html('');
			html += '<a href="'+filepath+'" download id="'+filepath+'"></a>';
			jQuery('.myModalforallbody').html(html);
			document.getElementById(filepath).click();
		}
		
		
	});

    jQuery('.main-content').on("click" , ".openApprovedDialog", function(){
        var extension = jQuery(this).attr('data-extension');
        var filepath = jQuery(this).attr('data-path');
        var html = "";
        if(extension == 'jpg' || extension == 'jpeg' || extension == 'png' || extension == 'JPG'){
            jQuery('.approvedDialogBody').html('');
            html += '<div class = "row"><div class = "col-md-4 ml-auto mr-auto"><img src="<?= SITE_IMAGES_URL . 'approved.png' ?>" style="width: 100%;margin-top: 25px;"></div><div class = "col-md-10 ml-auto mr-auto"><p style="font-size:20px;text-align:center;">Design Approved!</p></div><div class = "col-md-10 ml-auto mr-auto"><p style = "font-style:italic;">Click "Download" button to access source files and hi-resolution version of your design.</p></div><div class = "col-md-4 ml-auto mr-auto"><a href = "' + filepath + '" download id = "' + filepath + '"><img src="<?= SITE_IMAGES_URL . 'download.png' ?>" style="width: 100%;"></a></div> <div class = "col-md-10 ml-auto mr-auto"><a href="#" style="text-align:center;font-style:italic; color:green;" class="col-md-12 ml-auto mr-auto close" data-dismiss="modal"><span style="text-align: center;font-size: 15px;font-weight: unset;">Thanks, I will download this later.</span></a></div><div class = "col-md-10 ml-auto mr-auto"><p style = "font-style:italic;text-align:center;font-size:10px;">*Please be notified that all source files will be removed after 14 days.</p></div></div>';
            jQuery('.approvedDialogBody').html(html);
            jQuery('#approvedDialog').modal('show'); 
        }else if(extension == "pdf"){
            jQuery('.approvedDialogBody').html('');
            html += '<iframe src="'+filepath+'" style="height:500px;width:500px;margin-top: 25px;" frameborder="0"></iframe>';
            jQuery('.approvedDialogBody').html(html);
            jQuery('#approvedDialog').modal('show'); 
        }else{
            jQuery('.approvedDialogBody').html('');
            html += '<a href="'+filepath+'" download id="'+filepath+'"></a>';
            jQuery('.approvedDialogBody').html(html);
            document.getElementById(filepath).click();
        }
        
        
    });

    jQuery('.main-content').on("click" , ".openRevisionDialog", function(){
        var extension = jQuery(this).attr('data-extension');
        var filepath = jQuery(this).attr('data-path');
        var html = "";
        var arr = filepath.split("/");
        var path = arr[arr.length-1];

        html += '<div class="col-md-8 ml-auto mr-auto"><div class="col-md-12 ml-auto mr-auto" style="text-align:center;"><h2 style="padding:10px;">'+path+'</h2>';
        if(extension == 'jpg' || extension == 'jpeg' || extension == 'png' || extension == 'JPG'){
            jQuery('.revisionModelBody').html('');
            html += '<img src="'+filepath+'" style="margin-top: 25px;border-radius: 5px;width: 360px;"></div></div>';
            jQuery('.revisionModelBody').html(html);
            jQuery('#revisionModel').modal('show'); 
        }else if(extension == "pdf"){
            jQuery('.revisionModelBody').html('');
            html += '<iframe src="'+filepath+'" style="height:500px;width:500px;margin-top: 25px;" frameborder="0"></iframe></div></div>';
            jQuery('.revisionModelBody').html(html);
            jQuery('#revisionModel').modal('show'); 
        }else{
            jQuery('.revisionModelBody').html('');
            html += '<a href="'+filepath+'" download id="'+filepath+'"></a></div></div>';
            jQuery('.revisionModelBody').html(html);
            document.getElementById(filepath).click();
        }
        
        
    });
    jQuery('table').on("click" , ".openDecisionDialog", function(){
        var extension = jQuery(this).attr('data-extension');
        var filepath = jQuery(this).attr('data-path');
        var html = "", footer = "";
        

        footer = '<div class="row"><button class="btn openApprovedDialog" data-extension = "'+extension+'" data-path = "' + filepath + '" data-dismiss="modal">Approve Design</button><button class="btn openRevisionDialog" data-extension = "'+extension+'" data-path = "' + filepath + '" data-dismiss="modal">Ask For Revision</button></div>';
        //footer += '<div class="row"><p>Approving the design will give you access to it’s source files.</p></div>'
        html += '<div class = "row"><h3 class = "col-md-8 ml-auto mr-auto" style = "text-align:center;">' + "Upload Image" + '</h3></div>';
        if(extension == 'jpg' || extension == 'jpeg' || extension == 'png' || extension == 'JPG'){
            jQuery('.decisionModalBody').html('');
            html += '<img src="'+filepath+'" style="margin-top: 25px;">';
            jQuery('.decisionModalBody').html(html);
            jQuery('#decisionModalFooter').html(footer);            
            jQuery('#decisionModal').modal('show'); 
        }else if(extension == "pdf"){
            jQuery('.decisionModalBody').html('');
            html += '<iframe src="'+filepath+'" style="height:500px;width:500px;margin-top: 25px;" frameborder="0"></iframe>';
            jQuery('.decisionModalBody').html(html);
            jQuery('#decisionModalFooter').html(footer);
            jQuery('#decisionModal').modal('show'); 
        }else{
            jQuery('.decisionModalBody').html('');
            html += '<a href="'+filepath+'" download id="'+filepath+'"></a>';
            jQuery('.decisionModalBody').html(html);
            jQuery('#decisionModalFooter').html(footer);
            document.getElementById(filepath).click();
        }
        
        
    });
		
	jQuery('.addnewimage').click(function(){
		var html = "";
		//html += '<div class="row" style="margin-top:5px;"><div class="col-md-4"><div class="dropify-wrapper" style="height: 214px;"><div class="dropify-message"><span class="file-icon"></span> <p>Drag and drop a file here or click</p><p class="dropify-error">Ooops, something wrong appended.</p></div><div class="dropify-loader"></div><div class="dropify-errors-container"><ul></ul></div><input type="file" name="file[]" class="dropify" data-plugin="dropify" data-height="200" id="file12"><button type="button" class="dropify-clear">Remove</button><div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p><p class="dropify-infos-message">Drag and drop or click to replace</p></div></div></div></div></div></div>';
		html += '<div class="row"><div class="col-md-6"><input type="file" name="file[]" class="dropify" data-plugin="dropify" data-height="200" id="file12"></div></div>';
		jQuery('#addnewimage').append(html);
		
		$('.dropify').dropify();
		//my css
		
		$('.dropify-wrapper').css('height','100px');
		$('.dropify-wrapper').css('top','17%');
		$('.dropify-message file-icon').css('display','none');
		$('.dropify-message p').css('margin-top','-15px');
		$('.dropify-message').html('<span class="file-icon"></span> <img style="width: 85px;float: left;" src="https://www.graphicszoo.com/uploads/requests/image/cloud.png"><p style="margin-top: -15px;">Drag and drop file here or click</p><p class="dropify-error" style="margin-top: -15px;">Ooops, something wrong appended.</p>');
	});

jQuery('.dropify').dropify({
    tpl: {
        message:'<div class="dropify-message"><span class="file-icon" /> <img style="width: 85px;float: left;" src="<?= REQUEST_IMG_URL ?>image/cloud.png"></img><p>Drag and drop file here or click</p></div>'
    }
});

jQuery('.nav-link').click(function(){
	
	$('.nav-item .active').removeClass('active');
	$(this).addClass('active');
});

</script>