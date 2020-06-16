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
	ajaxPOST('/office/select', form, function(response){
		if (response){
			$("#feedback-container").load('/rate', function (){
				$("#loader").hide();
				$("#feedback-container").show();
			});
		} else if (response) {
			$("#feedback-container").load('/office', function (){
				$("#loader").hide();
				$("#feedback-container").show();
			});
		}
	})
}

function submitRate(){
	var form = $("#rate-form").serialize();
	ajaxPOST('/submit', form, function(response){
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
			$("#feedback-container").load('/success', function (){
				$("#loader").hide();
				$("#feedback-container").show();
			});
			setTimeout(function() {
				$("#feedback-container").hide();
				$("#loader").show();
				$("#feedback-container").load('/office', function (){
					$("#loader").hide();
					$("#feedback-container").show();});
			}, 4000)
		}
	})
}

function cancelRate() {
	$("#feedback-container").hide();
	$("#loader").show();
	$("#feedback-container").load('/office', function (){
		$("#loader").hide();
		$("#feedback-container").show();
	});
}

function overallRating() {
	ajaxGET('/admin/dashboard/overall','', function(response){
		$("#office-rating").text(response)
	})
}

function byOfficeRating() {
	ajaxGET('/admin/dashboard/byOffice', '', function(response) {
		$("#by-office").html('');
		$.each(response, function(key,value){
			$("#by-office").append('<div class="card">' + 
                    '<div class="card-body">' +
                        '<h5 class="card-title font-weight-bold">' + value.rate + '</h5>' +
                        '<p class="card-text">' + value.office + '</p>' +
                        '<a href="#" class="btn btn-primary">View Feedbacks</a>' +
                    '</div>' +
                '</div>');
		})
		
	})
}

var entities = [];

function listEntities(){
	ajaxGET('/admin/entity/list', '', function(response) {
		$("#entity-table").html('');
		if(!response[0]) {
			$("#entity-table").append('<tr><td colspan="3">No entity added yet</td></tr>')
		} else {
			$.each(response, function(key, value){
				$("#entity-table").append('<tr id="' + value.entityID + '"><td>' + value.entity + '</td><td hidden>' + value.under + '</td><td hidden>' + value.status + '</td><td><button type="button" id="edit-btn" data-toggle="modal" data-target="#editEntityModal" class="btn btn-warning">Edit</button><button type="button" class="btn btn-danger" id="delete-btn" data-toggle="modal" data-target="#deleteEntityModal">Delete</button></td></tr>');
			})
		}
	});
}

function listMainEntity(){
	ajaxGET('/admin/entity/listMain', '', function(response){
		$("#entity-select").html('');
		$("#entity-select").append('<option value="0">--NONE--</option>');
		$.each(response, function(key, value){
			$("#entity-select").append('<option value="' + value.entityID + '">' + value.entity + '</option>');
		})
	})
}

function addEntity(){
	var form = $("#entity-form").serialize();
	ajaxPOST('/admin/entity/add', form, function(response){
		if(response.status) {
			$("#submit-entity-error").html('');
			$.each(response.error, function(key, value){
				$("#submit-entity-error").append(value + '<br>');
			})
			$("#submit-entity-error").show();
		} else {
			listEntities();
			$("#addEntityModal").modal('hide');
		}
	})
}

function deleteEntity(){
	var form = $("#delete-entity-form").serialize();
	ajaxPOST('/admin/entity/delete', form, function(response){
		if(response.status) {
			$("#delete-entity-error").html('Something went wrong');
			$("#delete-entity-error").show();
		} else {
			listEntities();
			$("#deleteEntityModal").modal('hide');
		}
	});
}

function listMainEntity_edit(table){
	var id = $("#edit-entity-id").val();
	ajaxGET('/admin/entity/listMainEdit', {id: id}, function(response){
		$("#edit-entity-select").html('');
		$("#edit-entity-select").append('<option value="0">--NONE--</option>');
		$.each(response, function(key, value){
			$("#edit-entity-select").append('<option value="' + value.entityID + '">' + value.entity + '</option>');
			if(response.length == $("#edit-entity-select > option").length - 1) {
				$("#edit-entity-select").val($(table).closest('tr').find('td:nth-child(2)').text());
			}
		})
	})
}

function editEntity(){
	var form = $("#edit-entity-form").serialize();
	ajaxPOST('/admin/entity/edit', form, function(response){
		if(response.status) {
			$("#edit-entity-error").html('');
			$.each(response.error, function(key, value){
				$("#edit-entity-error").append(value + '<br>');
			})
			$("#edit-entity-error").show();
		} else {
			listEntities();
			$("#editEntityModal").modal('hide');
		}
	})
}

