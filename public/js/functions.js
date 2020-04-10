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

function saveEntity(){
	var form = $("#entity-form").serialize();
	
	ajaxPOST('/admin/saveEntity', form, function(response){
		console.log(response);
		if(response.status == 0){

			Swal.fire({
				title:'Error',
				icon: 'error',
				text: response.message.entity
			})
		}else{
			Swal.fire({
				title:'Success',
				icon: 'success',
				text: response.message
			}).then((response) => {
				// Dito mo append ang values sid kung ayaw mo mag-reload hahahaha
				location.reload(true);
			})
		}
	})
}

function editEntity(id){
	var form = $("#edit-entity-form").serialize();

	ajaxPOST('/admin/editEntity', form, function(response){
		console.log(response);
		Swal.fire({
			title:'Success',
			icon: 'success',
			text: response.message
		}).then((response) => {
			// Dito mo append ang values sid kung ayaw mo mag-reload hahahaha
			location.reload(true);
		})
	})
}

$('#modalEdit').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var entity = button.data('entity')
	var id = button.data('id')
    var status = button.data('status')
	

    var modal = $(this)
    // modal.find('.modal-title').text('New message to ' + recipient)
    modal.find('#entity').val(entity)
	modal.find('#entityID').val(id)
	modal.find('#status').val(status)
	if(status == 1){
		$('.statusbtn').removeClass('btn btn-danger');
		$('.statusbtn').addClass('btn btn-success btn-sm');
		$('.statusbtn').text('Activated');
	}else{
		$('.statusbtn').removeClass('btn btn-success');
		$('.statusbtn').addClass('btn btn-danger btn-sm');
		$('.statusbtn').text('Deactivated');
	}
  })

  $('.statusbtn').click(function(e){
	var form = $("#edit-entity-form").serialize();

	e.preventDefault();
	var text = $('.statusbtn').text();
	var status = '';
	if(text == 'Activated'){
		status = 'deactivate';
	}else{
		status = 'activate';
	}

	Swal.fire({
		title: 'Are you sure you want to ' + status +'?',
		text:'Clicking confirm button will ' + status + ' this entity.',
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, ' + status + '!'
	  }).then((result) => {
		ajaxPOST('/admin/changeStatus', form, function(response){

			console.log(response);
			Swal.fire({
				title:'Success',
				icon: 'success',
				text: response.message
			}).then((response) => {
				// Dito mo append ang values sid kung ayaw mo mag-reload hahahaha
				location.reload(true);
			})

		})
	  })
  });	



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