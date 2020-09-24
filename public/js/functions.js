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
function listOffice() {
	$("#feedback-container").hide();
	$("#loader").show();
	ajaxGET('/office/list', '', function (response) {
		$("#feedback-container").load('/office', function(){
			$("#office-container").html('');
			$.each(response, function(key, value) {
				$("#office-container").append('<div class="col-sm-6 col-md-6 p-1"><button onclick="office(' + value.entityID + ')" type="button" class="btn btn-primary btn-block"><span class="h1">' + value.entity + '</span></button></div>');
			})
			$("#loader").hide();
			$("#feedback-container").show();
		});
	})
}

function selectOffice(){
	$("#feedback-container").hide();
	$("#loader").show();
	var form = $("#select-office-form").serialize();
	ajaxPOST('/office/select', form, function(response){
		console.log(response)
		if (response){
			if (response[0] != null) {
				$("#feedback-container").load('/service', function (){
					$("#service-container").html('');
					$("#office-selected").html(response[0].entity);
					$.each(response, function(key, value) {
						$("#service-container").append('<button onclick="service(' + value.serviceID + ')" type="button" class="btn btn-primary btn-block"><span class="h1">' + value.service + '</span></button>');
					});
					$("#service-container").append('<button onclick="service(0)" type="button" class="btn btn-primary btn-block"><span class="h1">Other Matters</span></button>');
					$("#loader").hide();
					$("#feedback-container").show();
				});
			} else {
				$("#feedback-container").load('/rate', function (){
					$("#loader").hide();
					$("#feedback-container").show();
				});
			}
		} else if (response) {
			$("#feedback-container").load('/office', function (){
				$("#loader").hide();
				$("#feedback-container").show();
			});
		}
	})
}

function selectService() {
	$("#feedback-container").hide();
	$("#loader").show();
	var form = $("#select-service-form").serialize();
	ajaxPOST('/service/select', form, function(response){
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
					listOffice() });
			}, 4000)
		}
	})
}

function cancelRate() {
	listOffice();
}

function cancelService() {
	listOffice();
}

function overallRating() {
	ajaxGET('/admin/dashboard/overall','', function(response){
		$("#office-rating").text(response.rate);
		$("#total-feedback-badge").text(response.count);
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
                        '<a href="#" class="btn btn-primary">View Feedbacks <span class="badge badge-light">' + value.count + '</span></a>' +
                    '</div>' +
                '</div>');
		})
		
	})
}

var entities = [];

function listEntities(){
	ajaxGET('/admin/entity/list', '', function(response) {
		$("#entity-table").html('');
		var row;
		if(!response[0]) {
			$("#entity-table").append('<tr><td colspan="3">No entity added yet</td></tr>')
		} else {
			$.each(response, function(key, value){
				row = '<tr id="' + value.entityID + '"><td><p class="text-left';
				if (!value.status) {
					row += ' text-danger';
				}
				if (!value.under) {
					row += '">';
				} else {
					row += ' pl-5">';
				}
				row += value.entity + '</p></td><td hidden>' + value.under + '</td><td hidden>' + value.status + '</td><td><button type="button" id="edit-btn" data-toggle="modal" data-target="#editEntityModal" class="btn btn-warning">Edit</button><button type="button" class="btn btn-danger" id="delete-btn" data-toggle="modal" data-target="#deleteEntityModal">Delete</button></td></tr>';
				$("#entity-table").append(row);
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

function listServices() {
	ajaxGET('/admin/service/list', '', function (response) {
		$("#service-table").html('');
		if(!response[0]) {
			$("#service-table").append('<tr><td colspan="3">No service added yet</td></tr>')
		} else {
			$.each(response, function(key, value){
				$("#service-table").append('<tr id="' + value.serviceID + '"><td><p class="text-left">' + value.entity + '</p><td><p class="">' + value.service + '</p></td><td hidden>' + value.entityID + '</td><td><button type="button" id="edit-btn" data-toggle="modal" data-target="#editServiceModal" class="btn btn-warning">Edit</button><button type="button" class="btn btn-danger" id="delete-btn" data-toggle="modal" data-target="#deleteServiceModal">Delete</button></td></tr>');
			})
		}
	})
}

function listEntities_Service() {
	ajaxGET('/admin/service/listEntity', '', function (response) {
		$("#entity-select").html();
		$.each(response, function (key, value) {
			$("#entity-select").append('<option value="' + value.entityID + '">' + value.entity + '</option>')
		})
	})
}

function addService() {
	var form = $("#add-service-form").serialize();
	ajaxPOST('/admin/service/add', form, function (response) {
		$("#service-table").html('');
		if (response.status) {
			$("#submit-service-error").html('');
			$.each(response.error, function(key, value){
				$("#submit-service-error").append(value + '<br>');
			})
			$("#submit-service-error").show();
		} else {
			listServices();
			$("#addServiceModal").modal('hide')
		}
	})
}

function deleteService() {
	var form = $("#delete-service-form").serialize();
	ajaxPOST('/admin/service/delete', form, function (response) {
	if(response.status) {
		$("#delete-entity-error").html('Something went wrong');
		$("#delete-entity-error").show();
	} else {
		listServices();
		$("#deleteServiceModal").modal('hide');
	}
	})
}

function editService() {
	var form = $("#edit-service-form").serialize();
	ajaxPOST('/admin/service/edit', form, function (response) {
		if(response.status) {
			$("#edit-service-error").html('');
			$.each(response.error, function(key, value){
				$("#edit-service-error").append(value + '<br>');
			})
			$("#edit-service-error").show();
		} else {
			listServices();
			$("#editServiceModal").modal('hide');
		}
	})
}

function listFeedback_Admin() {
	ajaxGET('/admin/feedback/list', '', function (response) {
		$("#feedback-table").html();
		console.log(response)
		$.each(response, function (key, value) {
			$("#feedback-table").append('<tr id="' + value.data.feedbackID + '"><td>' + value.entity + '</td><td>' + value.service + '</td><td>' + value.name + '</td><td>' + value.rate + '</td><td>' + value.comment + '</td><td>' + value.created_at + '</td></tr>');
		})
	})
}

function listEntities_Service_edit(table) {
	ajaxGET('/admin/service/listEntity', '', function (response) {
		$("#edit-service-select").html('');
		$.each(response, function (key, value) {
			$("#edit-service-select").append('<option value="' + value.entityID + '">' + value.entity + '</option>');
			if(response.length == $("#edit-service-select > option").length) {
				$("#edit-service-select").val($(table).closest('tr').find('td:nth-child(3)').text());
			}
		})
	})
}