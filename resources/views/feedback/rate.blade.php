<div class="row justify-content-center p-3">
    <div class="col-sm-10 col-md-10 text-center">
        <p class="h1">How do you feel regarding our service?</p>
        <p class="h6">Click on the circle under the emoji that corresponds to your feelings.</p>
    </div>
    <div class="col-sm-6 col-md-6 text-center">
        <div id="submitFeedback-error" class="alert alert-danger collapse">
        </div>
    </div>
</div>
<form id="rate-form" method="post" autocomplete="off">
    {{csrf_field()}}
    <div class="row justify-content-center" style="margin-top: 30px;">
        <div class="col-sm-auto text-center">
            <span class="ec ec-grin over"></span>
            <p class="h4 text-success">Very Satisfied</p>
            <input type="radio" class="option-input radio" name="rate" value="5" />
        </div>
        <div class="col-sm-auto text-center">
            <span class="ec ec-slightly-smiling-face over"></span>
            <p class="h4" style="color: limegreen;">Satisfied</p>
            <input type="radio" class="option-input radio" name="rate" value="4" />
        </div>
        <div class="col-sm-auto text-center">
            <span class="ec ec-neutral-face over"></span>
            <p class="h4" style="color: black;">Neutral</p>
            <input type="radio" class="option-input radio" name="rate" value="3" />
        </div>
        <div class="col-sm-auto text-center">
            <span class="ec ec-slightly-frowning-face over"></span>
            <p class="h4" style="color: orange;">Dissatisfied</p>
            <input type="radio" class="option-input radio" name="rate" value="2" />
        </div>
        <div class="col-sm-auto text-center">
            <span class="ec ec-pensive over"></span>
            <p class="h4 text-danger">Very Dissatisfied</p>
            <input type="radio" class="option-input radio" name="rate" value="1" />
        </div>
    </div>
    <div class="row justify-content-center" style="margin-top: 50px;">
        <div class="col-lg-10">
            <div class="form-group">
                <label for="exampleInputEmail1"><span class="h3">Name <i>(optional)</i></span></label>
                <input type="text" name="name" class="form-control" aria-describedby="emailHelp" maxlength="100">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1" class="h3">Other Comments <i>(optional)</i></label>
                <textarea class="form-control" name="comment" rows="3"></textarea>
            </div>
            <button id="submit-feedback-button" type="button" class="btn btn-primary btn-lg float-right mx-1">Submit</button>
            <button id="cancel-feedback-button" type="button" class="btn btn-danger btn-lg float-right mx-1">Cancel</button>
        </div>
    </div>
</form>
<script>
    $("#submit-feedback-button").on('click', function(){
        submitRate();
    })
    $("#cancel-feedback-button").on('click', function(){
        cancelRate();
    })
</script>