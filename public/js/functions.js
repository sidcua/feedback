function ajaxPOST(url, data, response_callback, failed_callback){

	// if(typeof data === 'object'){
	// 	data._token = token;
	// }else{
	// 	data += '&_token='+token;
	// }

	$.ajax({
	    url: url,
		type: "POST",
		data: data,
		dataType: "json",
	    success: function(data){
			if(response_callback){
				response_callback(data);
			}
		},
		error: function(data){
            if(failed_callback != null) {
                failed_callback(data);
            }
        }
	});
}

function ajaxGET(url, data, response_callback, failed_callback){

	// if(typeof data === 'object'){
	// 	data._token = token;
	// }else{
	// 	data += '&_token='+token;
	// }

	$.ajax({
	    url: url,
		type: "GET",
		data: data,
		dataType: "json",
	    success: function(data){
			if(response_callback){
				response_callback(data);
			}
		},
		error: function(data){
            if(failed_callback != null) {
                failed_callback(data);
            }
        }
	});
}

function selectOffice(){
	$("#feedback-container").hide();
	$("#loader").show();
	var form = $("#select-office-form").serialize();
	ajaxPOST('/feedback/office/select', form, function(response){
		if (response){
			$("#feedback-container").load('/feedback/rate', function (){
				$("#loader").hide();
				$("#feedback-container").show();
			});
		} else if (response) {
			$("#feedback-container").load('/feedback/office', function (){
				$("#loader").hide();
				$("#feedback-container").show();
			});
		}
	})
}

function submitRate(){
	var form = $("#rate-form").serialize();
	ajaxPOST('/feedback/submit', form, function(response){
		if (response.status) {
			$('#submitFeedback-error').html('');
			$.each(response.error, function(key, value){
				if (key == "rate") {
					$("#submitFeedback-error").append("Please select your satisfaction rate" + "<br>");
				} else {
					$("#submitFeedback-error").append(value + "<br>");
				}
			});
			$('#submitFeedback-error').show();
		} else {
			$("#feedback-container").hide();
			$("#loader").show();
			$("#feedback-container").load('/feedback/success', function (){
				$("#loader").hide();
				$("#feedback-container").show();
			});
			setTimeout(function() {
				$("#feedback-container").hide();
				$("#loader").show();
				$("#feedback-container").load('/feedback/office', function (){
					$("#loader").hide();
					$("#feedback-container").show();});
			}, 4000)
		}
	})
}

function cancelRate() {
	$("#feedback-container").hide();
	$("#loader").show();
	$("#feedback-container").load('/feedback/office', function (){
		$("#loader").hide();
		$("#feedback-container").show();
	});
}