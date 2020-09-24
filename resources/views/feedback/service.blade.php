<div class="row justify-content-center p-3">
    <div class="col-sm-10 col-md-10 text-center">
        <p class="h3">Please select the service rendered</p>
    </div>
</div>
<div class="row justify-content-center">
    <p class="h1 text-center"><span class="badge badge-pill badge-dark" id="office-selected"></span></p>
</div>
<div class="row justify-content-center" style="margin-top: 10px;">
    <div class="col-sm-6 col-md-6" id="service-container">
    </div>
</div>
<div class="col-lg-10 mt-5">
    <button id="cancel-feedback-button" type="button" class="btn btn-danger btn-lg float-right mx-1">Cancel</button>
</div>
<form id="select-service-form" method="POST">
    {{csrf_field()}}
    <input type="hidden" id="service" name="service" value="">
</form>
<script>
    $("#cancel-feedback-button").on('click', function(){
        cancelService();
    })
</script>