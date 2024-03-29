// Variables
const mainIcon = '<svg class="bi bi-chevron-right" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/></svg>';
const subIcon = '<svg class="bi bi-arrow-return-right" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.146 5.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L12.793 9l-2.647-2.646a.5.5 0 0 1 0-.708z"/><path fill-rule="evenodd" d="M3 2.5a.5.5 0 0 0-.5.5v4A2.5 2.5 0 0 0 5 9.5h8.5a.5.5 0 0 0 0-1H5A1.5 1.5 0 0 1 3.5 7V3a.5.5 0 0 0-.5-.5z"/></svg>';

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
			if (response[0] != null) {
				$("#feedback-container").load('/service', function (){
					$("#service-container").html('');
					$("#office-selected").html(response[0].entity);
					$.each(response, function(key, value) {
						$("#service-container").append('<button onclick="service(\'' + value.service + '\')" type="button" class="btn btn-primary btn-block"><span class="h1">' + value.service + '</span></button>');
					});
					$("#service-container").append('<button onclick="service(\'Other Matters\')" type="button" class="btn btn-primary btn-block"><span class="h1">Other</span></button>');
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

function cancelService() {
	$("#feedback-container").hide();
	$("#loader").show();
	$("#feedback-container").load('/office', function (){
		$("#loader").hide();
		$("#feedback-container").show();
	});
}

function overallRating() {
	ajaxGET('/admin/dashboard/overallRating','', function(response){
		$("#office-rating").text(response);
	})
}

function byOfficeRating() {
	ajaxGET('/admin/dashboard/byFactor','', function(response) {
		$("#responsiveness").text(response.responsiveness);
		$("#reliability").text(response.reliability);
		$("#access").text(response.access);
		$("#communication").text(response.communication);
		$("#cost").text(response.cost);
		$("#integrity").text(response.integrity);
		$("#assurance").text(response.assurance);
		$("#outcome").text(response.outcome);
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
					row += '">' + mainIcon;
				} else {
					row += ' pl-3">' + subIcon;
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

function submitClientRate(){
	loadSubmitButton();
	var form = $("#client-form").serialize();
	ajaxPOST('/submitForm', form, function(response){
		if (response.status) {
			$("#submitFeedback-error").html('');
			// $("#submitFeedback-error").append("Please accomplish the form before submitting");
			please = 0;
			$.each(response.error, function(key, value) {
				if(key == 'client') {
					$("#submitFeedback-error").append("Name / Office / Organization is required<br>");
				} else if (key == 'sex') {
					$("#submitFeedback-error").append("Sex is required<br>");
				} else if (key == 'type') {
					$("#submitFeedback-error").append("Type of Client is required<br>");
				} else if (key == 'institution') {
					$("#submitFeedback-error").append("Type of Institution is required<br>");
				} else if (key == 'transaction') {
					$("#submitFeedback-error").append("Type of Transaction is required<br>");
				} else if (key == 'service') {
					$("#submitFeedback-error").append("Please select the service availed<br>");
				} else {
					if (!please) {
						$("#submitFeedback-error").append("Please rate " + key + ", ");
						please = 1;
					} else {
						$("#submitFeedback-error").append(key + ", ");
					}
				}
				
			})
			$('#submitFeedback-error').show();
			$('html,body').scrollTop(0);
			resetSubmitButton();
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
				$("#feedback-container").load('/form', function (){
					$("#loader").hide();
					$("#feedback-container").show();});
					$('html,body').scrollTop(0);
			}, 4000)
		}
	})
}

function cancelForm() {
	$("#feedback-container").hide();
	$("#loader").show();
	$("#feedback-container").load('/form', function (){
		$("#loader").hide();
		$("#feedback-container").show();
	});
}

function listService() {
	ajaxGET('/admin/report/listService', '', function (response){
		$("#select-service").html('<option value="" selected>...</option>');
		$("#select-service").html('<option value="0" selected>ALL SERVICES</option>');
		$.each(response, function(key, value) {
			$("#select-service").append('<option value=' + value.serviceID + ' selected>' + value.service + '</option>');
		});
		$("#select-service").append('<option value="" selected>...</option>');
	})
}

function listFeedback(service) {
	service = {'service': service};
	clearReportTable();
	ajaxGET('/admin/report/listFeedback', service, function (response) {
		$("#tbl-report").html('');
		if (response.countList) {
			$.each(response.list, function(key, value) {
				$("#tbl-report").append('<tr><th scope="row">'+ (value.client ? value.client : "...") +'</th><td style="text-align: center;">'+value.responsiveness+'</td><td style="text-align: center;">'+value.reliability+'</td><td style="text-align: center;">'+value.access+'</td><td style="text-align: center;">'+value.communication+'</td><td style="text-align: center;">'+value.cost+'</td><td style="text-align: center;">'+value.integrity+'</td><td style="text-align: center;">'+value.assurance+'</td><td style="text-align: center;">'+value.outcome+'</td></tr>');
			});
			$.each(response.mean, function(key, value) {
				$("#tbl-report").append('<tr class="font-weight-bold text-white bg-primary"><th scope="row">MEAN</th><td style="text-align: center;">'+value.responsiveness+'</td><td style="text-align: center;">'+value.reliability+'</td><td style="text-align: center;">'+value.access+'</td><td style="text-align: center;">'+value.communication+'</td><td style="text-align: center;">'+value.cost+'</td><td style="text-align: center;">'+value.integrity+'</td><td style="text-align: center;">'+value.assurance+'</td><td style="text-align: center;">'+value.outcome+'</td></tr>');
			});
			$("#tbl-report").append('<tr class="font-weight-bold text-white bg-info"><th scope="row">MEDIAN</th><td style="text-align: center;">'+response.median.responsiveness+'</td><td style="text-align: center;">'+response.median.reliability+'</td><td style="text-align: center;">'+response.median.access+'</td><td style="text-align: center;">'+response.median.communication+'</td><td style="text-align: center;">'+response.median.cost+'</td><td style="text-align: center;">'+response.median.integrity+'</td><td style="text-align: center;">'+response.median.assurance+'</td><td style="text-align: center;">'+response.median.outcome+'</td></tr>');
			showReportTable();
		} else {
			$("#tbl-report").html('<tr><td colspan=9 class="text-center"><p class="h6 font-italic">No feedbacks on this service</p></td></tr>');
			showReportTable();
		}
	});
}

function listService_form() {
	ajaxGET('/listService', '', function (response){
		$("#select-service-form").html('<option value="" selected>...</option>');
		$.each(response, function(key, value) {
			$("#select-service-form").append('<option value=' + value.serviceID + ' selected>' + value.service + '</option>');
		});
		$("#select-service-form").append('<option value="" selected>...</option>');
	})
}
