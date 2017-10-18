$(document).ready(function () {

    // enable fileuploader plugin
    $('input[name="portfolio_pictures[]"]').fileuploader({
        changeInput: '<div class="fileuploader-input">' +
                '<div class="fileuploader-input-inner">' +
                '<h3 style="display:block;color:#ec407a;"><span class="fa fa-cloud-upload fa-3x"></span></h3>' +
                '<div class="fileuploader-input-button" style="background-color:#ec407a;"><span>Browse Files</span></div>' +
                '</div>' +
                '</div>',
        theme: 'dragdrop',
        dragDrop: {
            // set drag&drop container {null, String, jQuery Object}
            // example: 'body'
            // example: $('body')
            container: null,

            // Callback fired on entering with dragged files the drop container
            onDragEnter: function (event, listEl, parentEl, newInputEl, inputEl) {
                // callback will go here
            },

            // Callback fired on leaving with dragged files the drop container
            onDragLeave: function (event, listEl, parentEl, newInputEl, inputEl) {
                // callback will go here
            },

            // Callback fired on dropping the dragged files in drop container
            onDrop: function (event, listEl, parentEl, newInputEl, inputEl) {
                // callback will go here
            },

        },
//		upload: {            
//                         
//        },
//		onRemove: function(item) {
//			$.post('./php/ajax_remove_file.php', {
//				file: item.name
//			});
//		},

    });

});