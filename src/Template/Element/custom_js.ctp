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