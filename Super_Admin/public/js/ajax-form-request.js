const BUTTON_STATE_NORMAL = "normal";
const BUTTON_STATE_IN_PROGRESS = "in_progress";

/**
 * form_parent_id: Form parent element id
 * event: event argument
 *
 * Hanlde ajax form request
 */
function handleAjaxFormRequest(form_id, event, successCallBack,errorCallBack)
{
	try {
        event.preventDefault(); // Totally stop reloading page
		var form = $("#"+form_id);
		var formData = new FormData();
		var formValues = form.serializeArray();
		var fileInputs = form.find('input[type=file]');
		//appending input form elements
		$.each(formValues,function(key,input_field){
			// console.log(input_field)
			formData.append(input_field.name,input_field.value);
		});
		
		//appending files to form if any
		$.each(fileInputs,function(key,file_element){
			if(file_element.files[0] != undefined){
				formData.append(file_element.name, file_element.files[0]);
			}
		});

		updateSubmitButtonState(form,BUTTON_STATE_IN_PROGRESS);

		//submitting the ajax request

		$.ajax({
			url:  form.attr("action"),
			type: form.attr("method"),
			data: formData,
			cache: false,
			dataType: 'json',
			processData: false, // Don't process the files
			contentType: false, // Set content type to false as jQuery will tell the server its a query string request
			success: function(data, textStatus, jqXHR)
			{
					updateSubmitButtonState(form,BUTTON_STATE_NORMAL);
					removeFormErrorMessages();
					if(successCallBack)
						successCallBack(data);
					else
						ajaxSuccessHandler(form_id, data);
					
					form.find('input[type=submit]').val(form.find('input[type=submit]').val()+" ...");
					form.find('input[type=submit]').attr("disabled","disabled");
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				updateSubmitButtonState(form,BUTTON_STATE_NORMAL);
				removeFormErrorMessages();
				if(errorCallBack)
					errorCallBack(jqXHR.responseJSON);
				else{
					if(jqXHR.responseJSON)
						ajaxErrorHanlder(form_id, jqXHR.responseJSON.responseContent);
					else
						ajaxErrorHanlder(form_id, {message_title:"Error while processing your request."});
				}

			}
		});
    } catch (error) {
        console.error("Error handling AJAX form request:", error);
    }
	
}
/**
 * Ajax request default success callback
 */
function ajaxSuccessHandler(form_id,responseData)
{
	// Toast Notification
  	window.location.reload();
}

/**
 * Ajax request default error handler
 */
function ajaxErrorHanlder(form_id, error_messages)
{
		var form = $("#"+form_id);
		removeFormErrorMessages();
	    //TODO::Toast Notification
	    // message at top of the form
    	var error_title = `<div class="alert alert-danger alert-dismissible fade show error-status-message" role="alert">
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								<strong>Error!&nbsp</strong>`;
		error_title += error_messages.message_tittle;
		error_title += '</div >';
		// console.log(error_messages.message_title);
		form.prepend(error_title);
		//$(".error-status-message").fadeOut(5000);

    $.each(error_messages, function(message_key,message_values){
        var error_block ='';
				if(message_key == 'message_tittle')
				 return;
				$.each(message_values,function(message_index,message_value){
					error_block += '<span class="help-block text-danger d-flex">* '+message_value+'</span>';
				});
				form.find('.'+message_key).parent().append(error_block);
				// console.log(form.find('.'+message_key).parent().parent());
        		form.find('.'+message_key).addClass('border-danger');
    });
}

/**
 * Cleaning old error messages from form
 */
function removeFormErrorMessages()
{
	   $('.has-error').removeClass('has-error');
		//remove field errors
		$('.help-block').remove();
		//remove error message title
		$('.error-status-message').remove();
		//remove all un necessary br
		$("br").remove();
		//remove border color
		$('.border-danger').removeClass('border-danger');
}

/**
 * When form submit change the state of button
 *  disabled and in progress
 *
 * */
function updateSubmitButtonState( form, button_state)
{
	if(form.find('input[type=submit]').val()){
			if(button_state == BUTTON_STATE_IN_PROGRESS){
				form.find('input[type=submit]').val(form.find('input[type=submit]').val()+" ...");
				form.find('input[type=submit]').attr("disabled","disabled");
			}else{
				form.find('input[type=submit]').val( form.find('input[type=submit]').val().replace(' ...','') );
				form.find('input[type=submit]').removeAttr("disabled");

			}
	}
}

//clear bootstrap modal every time modal close
$(document).on("hidden.bs.modal", function (e) {
		$(e.target).removeData("bs.modal").find(".modal-content").empty();
});

