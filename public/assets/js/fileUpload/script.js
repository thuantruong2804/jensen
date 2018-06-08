$(function() {
	var max_file_size = 5000000; // 5MB
    var uploadedFiles = $('#uploaded-files');
    var type_upload = 0; // 0: Single file, 1: multiple files
    var data_action1 = "";
    var data_action2 = "";
    var data_comfirm = "";
    $('#main').on('click', '.btn-upload', function() {
    	// Set format file
    	// Value: image or file
    	$("#format_upl").val($(this).data('format'));
    	
        // Simulate a click on the file input button
        // to show the file browser dialog
        if ($(this).data('multiple') == 1) {
        	$("#upload").find('input').attr('multiple', 'multiple');
        	type_upload = 1;
        } else {
        	$("#upload").find('input').removeAttr('multiple');
        	type_upload = 0;
        }
        data_action1 = typeof $(this).data('action1') != 'undefined' ? $(this).data('action1') : "<i class='fa fa-times'></i> " + 'Cancel';
        data_action2 = typeof $(this).data('action2') != 'undefined' ? $(this).data('action2') : "<i class='fa fa-check'></i> " + 'Ok';
        data_confirm = typeof $(this).data('confirm') != 'undefined' ? $(this).data('confirm') : "Are you sure you want to delete?";
        $("#upload").find('input').click();
    	
    });
    
    $('.main-content').on('click', '.btn-upload', function() {
    	// Set format file
    	// Value: image or file
    	$("#format_upl").val($(this).data('format'));
    	
        // Simulate a click on the file input button
        // to show the file browser dialog
        if ($(this).data('multiple') == 1) {
        	$("#upload").find('input').attr('multiple', 'multiple');
        	type_upload = 1;
        } else {
        	$("#upload").find('input').removeAttr('multiple');
        	type_upload = 0;
        }
        data_action1 = typeof $(this).data('action1') != 'undefined' ? $(this).data('action1') : "<i class='fa fa-times'></i> " + 'Cancel';
        data_action2 = typeof $(this).data('action2') != 'undefined' ? $(this).data('action2') : "<i class='fa fa-check'></i> " + 'Ok';
        data_confirm = typeof $(this).data('confirm') != 'undefined' ? $(this).data('confirm') : "Are you sure you want to delete?";
        $("#upload").find('input').click();
    	
    });
    
    // Initialize the jQuery File Upload plugin
    $('#upload').fileupload({

        // This element will accept file drag/drop uploading
        dropZone: $('#drop'),

        // This function is called when a file is added to the queue;
        // either via the browse button, or via drag/drop:
        add: function (e, data) {
        	if (data.files[0].size > max_file_size) {
        		$('.error-message-upload').remove();
        		var error_message = "<div class='text-danger error-message-upload'>" + maxFileSizeUploadMessage + "</div>";
        		uploadedFiles.after(error_message);
        	} else {

	            var tpl = $('<div class="working item-upload">' +
	            				"<div class='item-image'>" +
		            				'<input class="progress" type="text" value="0" data-width="48" data-height="48"'+
		            					' data-fgColor="#0788a5" data-readOnly="1" data-bgColor="#3e4043" />' +
		        					"<div class='tools tools-bottom'>" + 
			        					'<a class="cancel-item-upload" href="javascript:void(0)" data-href="" data-action1="' + data_action1
			        						+ '" data-action2="' + data_action2 + '" data-confirm="' + data_confirm + '"><i class="fa fa-times text-danger"></i></a>' +
		        					"</div>" +
	        					"</div>" +
	        					'<span class="name-item-upload"></span>' +
	        				'</div>');
	            
	            // Append the file name and file size
	            tpl.find('.name-item-upload').html(data.files[0].name).attr('title', data.files[0].name);
	
	            // Add the HTML to the UL element
	            if (type_upload == 1) {
	            	data.context = tpl.appendTo(uploadedFiles);	
	            } else {
	            	uploadedFiles.html('');
	            	data.context = tpl.appendTo(uploadedFiles);
	            }
	            
	
	            // Initialize the knob plugin
	            tpl.find('input').knob();
	
	            // Listen for clicks on the cancel icon
	            tpl.find('.cancel-item-upload').click(function() {
	            	if(tpl.hasClass('working')) {
	                    jqXHR.abort();
	                }
	            });
	
	            // Automatically upload the file once it is added to the queue
	            //var jqXHR = data.submit();
	            var jqXHR = data.submit().success(function(result, textStatus, jqXHR) {
	            	var status = result.status;
	            	$('.error-message-upload').remove();
	            	
	            	if(status == 'error') {
	            		var error_message = "<div class='text-danger error-message-upload'>" + result.message + "</div>";
	            		uploadedFiles.after(error_message);
	            		data.context.fadeOut();
	            	} else {
	            		var input_hidden = "<input type='hidden' name='file' value='" + result.media.id + "'/>";
	        			if (type_upload == 1) {
	        				input_hidden = "<input type='hidden' name='files[]' value='" + result.media.id + "'/>";
	        			}
	        			tpl.find('.name-item-upload').after(input_hidden);
	        			tpl.find('.cancel-item-upload').attr('data-href', result.media.deleteUrl);
	        			
	        			if (result.media.is_image == 1) {
	        				var img_html = "<a class='thumb thumbnail-admin' href='" + result.media.original + "' title='" + result.media.caption + "' style='background: url(&#39;" + result.media.thumb + "&#39;) no-repeat; background-size: cover; background-position: 70% 100%;'></a>";
	            			tpl.find('.tools').before(img_html);
	            			
	        				tpl.find('img').attr('src', result.media.thumb);
	            			var edit_caption = "<a class='edit-caption-item' href='javascript:void(0)' id='item-image-" + result.media.id + "' data-id='" + result.media.id + "'>" +
		        							"<i class='fa fa-pencil'></i>" +
		        						"</a>" + 
		        						"<input type='hidden' class='caption-value' value='' />";
	            			
	            			tpl.find('.cancel-item-upload').before('');
	            		} else {
	            			var img_html = "<img src='/assets/images/file.png' class='thumb' alt=''/>";
	            			tpl.find('.tools').before(img_html);
	            		}
	            	};
	            	
	            });
        	}
        },

        progress: function(e, data) {

            // Calculate the completion percentage of the upload
            var progress = parseInt(data.loaded / data.total * 100, 10);

            // Update the hidden input field and trigger a change
            // so that the jQuery knob plugin knows to update the dial
            data.context.find('.progress').val(progress).change();

            if(progress == 100){
                data.context.removeClass('working');
                data.context.find('.progress').parents('div').eq(0).remove();
            }
        },

        fail:function(e, data){
            // Something has gone wrong!
            data.context.addClass('error');
        }

    });


    // Prevent the default action when a file is dropped on the window
    $(document).on('drop dragover', function (e) {
        e.preventDefault();
    });

    // Helper function that formats the file sizes
    function formatFileSize(bytes) {
        if (typeof bytes !== 'number') {
            return '';
        }

        if (bytes >= 1000000000) {
            return (bytes / 1000000000).toFixed(2) + ' GB';
        }

        if (bytes >= 1000000) {
            return (bytes / 1000000).toFixed(2) + ' MB';
        }

        return (bytes / 1000).toFixed(2) + ' KB';
    }
    
});