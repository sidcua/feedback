<div class="row justify-content-center p-3">
    <div class="col-sm-10 col-md-10 text-center">
        <p class="h1">How do you feel regarding our service?</p>
        <p class="h6">CHED Regiona IX Client Satisfactory Survey</p>
    </div>
    <div class="col-sm-6 col-md-6 text-center">
        <div id="submitFeedback-error" class="alert alert-danger collapse">
        </div>
    </div>
</div>

<form id="client-form" method="post" autocomplete="off">
    {{csrf_field()}}
    <div class="row justify-content-center" style="margin-top: 50px;">
        <div class="col-lg-10">
            <div class="form-group thing2" style="margin-bottom: 30px;">
                <label for="exampleInputEmail1"><span class="h3">Name / Office / Organization <i></i></span></label>
                <input type="text" name="client" class="form-control" aria-describedby="emailHelp" maxlength="100" placeholder="ex. Juan Dela Cruz">
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="form-group thing2" style="margin-bottom: 30px;">
                <label for="exampleInputEmail1"><span class="h3">Sex <i></i></span></label>
                <div class="d-flex justify-content-center">
                    <select name="sex" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" placeholder="ex. Male">
                        <option value="" selected>...</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group thing2" style="margin-bottom: 30px;">
                <label for="exampleInputEmail1"><span class="h3">Type of Client <i></i></span></label>
                <div class="d-flex justify-content-center">
                    <select name="type" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        <option value="" selected>...</option>
                        <option value="Student">Student</option>
                        <option value="Faculty">Faculty</option>
                        <option value="Individual/Institution">Individual/Institution</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="form-group thing2" style="margin-bottom: 30px;">
                <label for="exampleInputEmail1"><span class="h3">Type of Institution <i></i></span></label>
                <div class="d-flex justify-content-center">
                    <select name="institution" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        <option value="" selected>...</option>
                        <option value="Private">Private</option>
                        <option value="Public">Public</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group thing2" style="margin-bottom: 30px;">
                <label for="exampleInputEmail1"><span class="h3">Type of Transaction <i></i></span></label>
                <div class="d-flex justify-content-center">
                    <select name="transaction" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        <option value="" selected>...</option>
                        <option value="G2C">Government to Citizen (G2C)</option>
                        <option value="G2B">Government to Business (G2B)</option>
                        <option value="G2B">Government to Government (G2B)</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="form-group thing2" style="margin-bottom: 30px;">
                <label for="exampleInputEmail1"><span class="h3">Please select the service availed of<i></i></span></label>
                <!-- <div class="" style="margin-top: 30px;">
                    <div class="col-sm-10 col-md-10 col-lg-10 d-flex justify-content-between">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input mr-3" type="radio" name="service" id="service1" value="Application for Certification, Authentication and Verification (C.A.V.) of Academic Records"/>
                            <label class="form-check-label h6" for="service1">Application for Certification, Authentication and Verification (C.A.V.) of Academic Records</label>
                        </div>
                    </div><br>
                    <div class="col-sm-10 col-md-10 col-lg-10 d-flex justify-content-between">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input mr-3" type="radio" name="service" id="service1" value="Application for Certification of Student Records and Other Relevant Doicuments"/>
                            <label class="form-check-label h6" for="service1">Application for Certification of Student Records and Other Relevant Doicuments</label>
                        </div>
                    </div><br>
                    <div class="col-sm-10 col-md-10 col-lg-10 d-flex justify-content-between">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input mr-3" type="radio" name="service" id="service1" value="Application for Increase in Tuition and Other School Fees (TOSF)"/>
                            <label class="form-check-label h6" for="service1">Application for Increase in Tuition and Other School Fees (TOSF)</label>
                        </div>
                    </div><br>
                </div> -->
                <div class="d-flex justify-content-center">
                    <select name="service" class="form-select form-select-lg mb-3 selectwidth" aria-label=".form-select-lg example">
                        <option value="" selected>...</option>
                        <option value="Application for Certification, Authentication and Verification (C.A.V.) of Academic Records">Application for Certification, Authentication and Verification (C.A.V.) of Academic Records</option>
                        <option value="Application for Certification of Student Records and Other Relevant Doicuments">Application for Certification of Student Records and Other Relevant Doicuments</option>
                        <option value="Application for Increase in Tuition and Other School Fees (TOSF)">Application for Increase in Tuition and Other School Fees (TOSF)</option>
                        <option value="Application for Initial Permit (GP); Government Recognition (GR); Certificate of Program Compliance (COPC)">Application for Initial Permit (GP); Government Recognition (GR); Certificate of Program Compliance (COPC)</option>
                        <option value="Application for Issuance of Special Orders (SOs)">Application for Issuance of Special Orders (SOs)</option>
                        <option value="Application for National Service Training Program (NSTP) Serial Numbers">Application for National Service Training Program (NSTP) Serial Numbers</option>
                        <option value="Application for Permit/Recognition/COPC = Phase 1">Application for Permit/Recognition/COPC = Phase 1</option>
                        <option value="Application for Renewal Permit">Application for Renewal Permit</option>
                        <option value="Application for Student Financial Assistance Programs (StuFAPS)">Application for Student Financial Assistance Programs (StuFAPS)</option>
                        <option value="Filing of Complaints, Appeals or Motions for Reconsideration">Filing of Complaints, Appeals or Motions for Reconsideration</option>
                        <option value="Request for Endorsement of Articles of Incorporation and By-Laws of New Private">Higher Education Institutions (PHEis) to SEC</option>
                        <option value="Request for Payment of Financial Benefits for STUFAPs Grantees">Request for Payment of Financial Benefits for STUFAPs Grantees</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center" style="margin-top: 50px;">
        <div class="mb-3">
            <p class="h5 text-center text-danger">Please rate our service under each specific dimensions in scale of 1 to 5</p>
            <p class="h5 text-center text-danger">5 = Very Sartisfied | 4 = Satisfied | 3 = Neither Satisfied/Dissatisfied | 2 = Dissatisfied | 1 = Very Dissatisfied</p><br>
        </div>
        <div class="col-lg-10">
            <div class="form-group thing" style="margin-bottom: 30px;">
                <label for="exampleInputEmail1"><span class="h4"><span class="text-primary">Responsiveness:</span> How satisfied are you with the assistance and speed in which the service was delivered? (in person, by telephone, and/or via email) <i></i></span></label>
                <div class="d-flex justify-content-center" style="margin-top: 30px;">
                    <div class="col-sm-8 col-md-8 col-lg-8 d-flex justify-content-between">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input mr-3" type="radio" name="responsiveness" id="responsiveness1" value="1"/>
                            <label class="form-check-label h5" for="responsiveness1">1</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input mr-3" type="radio" name="responsiveness" id="responsiveness2" value="2"/>
                            <label class="form-check-label h5" for="responsiveness1">2</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input mr-3" type="radio" name="responsiveness" id="responsiveness3" value="3"/>
                            <label class="form-check-label h5" for="responsiveness1">3</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input mr-3" type="radio" name="responsiveness" id="responsiveness4" value="4"/>
                            <label class="form-check-label h5" for="responsiveness1">4</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input mr-3" type="radio" name="responsiveness" id="responsiveness5" value="5"/>
                            <label class="form-check-label h5" for="responsiveness1">5</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group thing" style="margin-bottom: 30px;">
                <label for="exampleInputEmail1"><span class="h4"><span class="text-primary">Reliability (Quality):</span> How satisfied are you with the quality of advice, guidance, and accuracy of information/documents provided by our staff?<i></i></span></label>
                <div class="d-flex justify-content-center" style="margin-top: 30px;">
                    <div class="col-sm-8 col-md-8 col-lg-8 d-flex justify-content-between">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input mr-3" type="radio" name="reliability" id="reliability1" value="1"/>
                            <label class="form-check-label h5" for="reliability1">1</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input mr-3" type="radio" name="reliability" id="reliability2" value="2"/>
                            <label class="form-check-label h5" for="reliability1">2</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input mr-3" type="radio" name="reliability" id="reliability3" value="3"/>
                            <label class="form-check-label h5" for="reliability1">3</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input mr-3" type="radio" name="reliability" id="reliability4" value="4"/>
                            <label class="form-check-label h5" for="reliability1">4</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input mr-3" type="radio" name="reliability" id="reliability5" value="5"/>
                            <label class="form-check-label h5" for="reliability1">5</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group thing" style="margin-bottom: 30px;">
                <label for="exampleInputEmail1"><span class="h4"><span class="text-primary">Access and Facilities:</span> How satisfied are you with the provision of facilities in terms of cleanliness and comfort? (e.g. holding area, offices, etc.)<i></i></span></label>
                <div class="d-flex justify-content-center" style="margin-top: 30px;">
                    <div class="col-sm-8 col-md-8 col-lg-8 d-flex justify-content-between">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input mr-3" type="radio" name="access" id="access1" value="1"/>
                            <label class="form-check-label h5" for="access1">1</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input mr-3" type="radio" name="access" id="access2" value="2"/>
                            <label class="form-check-label h5" for="access1">2</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input mr-3" type="radio" name="access" id="access3" value="3"/>
                            <label class="form-check-label h5" for="access1">3</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input mr-3" type="radio" name="access" id="access4" value="4"/>
                            <label class="form-check-label h5" for="access1">4</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input mr-3" type="radio" name="access" id="access5" value="5"/>
                            <label class="form-check-label h5" for="access1">5</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group thing" style="margin-bottom: 30px;">
                <label for="exampleInputEmail1"><span class="h4"><span class="text-primary">Communication:</span> How satisfied are you with the communication of our staff? Was it clear, concise, and in an understandable language?<i></i></span></label>
                <div class="d-flex justify-content-center" style="margin-top: 30px;">
                    <div class="col-sm-8 col-md-8 col-lg-8 d-flex justify-content-between">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input mr-3" type="radio" name="communication" id="communication1" value="1"/>
                            <label class="form-check-label h5" for="communication1">1</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input mr-3" type="radio" name="communication" id="communication2" value="2"/>
                            <label class="form-check-label h5" for="communication1">2</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input mr-3" type="radio" name="communication" id="communication3" value="3"/>
                            <label class="form-check-label h5" for="communication1">3</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input mr-3" type="radio" name="communication" id="communication4" value="4"/>
                            <label class="form-check-label h5" for="communication1">4</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input mr-3" type="radio" name="communication" id="communication5" value="5"/>
                            <label class="form-check-label h5" for="communication1">5</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group thing" style="margin-bottom: 30px;">
                <label for="exampleInputEmail1"><span class="h4"><span class="text-primary">Costs:</span> How satisfied are you with the  amount of your fees and cost given the quality of services provided?<i></i></span></label>
                <div class="d-flex justify-content-center" style="margin-top: 30px;">
                    <div class="col-sm-8 col-md-8 col-lg-8 d-flex justify-content-between">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input mr-3" type="radio" name="cost" id="cost1" value="1"/>
                            <label class="form-check-label h5" for="cost1">1</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input mr-3" type="radio" name="cost" id="cost2" value="2"/>
                            <label class="form-check-label h5" for="cost1">2</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input mr-3" type="radio" name="cost" id="cost3" value="3"/>
                            <label class="form-check-label h5" for="cost1">3</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input mr-3" type="radio" name="cost" id="cost4" value="4"/>
                            <label class="form-check-label h5" for="cost1">4</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input mr-3" type="radio" name="cost" id="cost5" value="5"/>
                            <label class="form-check-label h5" for="cost1">5</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group thing" style="margin-bottom: 30px;">
                <label for="exampleInputEmail1"><span class="h4"><span class="text-primary">Integrity:</span> How satisfied are you with the professionalism of our staff handling the services you have requested?<i></i></span></label>
                <div class="d-flex justify-content-center" style="margin-top: 30px;">
                    <div class="col-sm-8 col-md-8 col-lg-8 d-flex justify-content-between">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input mr-3" type="radio" name="integrity" id="integrity1" value="1"/>
                            <label class="form-check-label h5" for="integrity1">1</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input mr-3" type="radio" name="integrity" id="integrity2" value="2"/>
                            <label class="form-check-label h5" for="integrity1">2</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input mr-3" type="radio" name="integrity" id="integrity3" value="3"/>
                            <label class="form-check-label h5" for="integrity1">3</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input mr-3" type="radio" name="integrity" id="integrity4" value="4"/>
                            <label class="form-check-label h5" for="integrity1">4</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input mr-3" type="radio" name="integrity" id="integrity5" value="5"/>
                            <label class="form-check-label h5" for="integrity1">5</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group thing" style="margin-bottom: 30px;">
                <label for="exampleInputEmail1"><span class="h4"><span class="text-primary">Assurance:</span> How satisfied are you with the ability of our staff to meet your service needs?<i></i></span></label>
                <div class="d-flex justify-content-center" style="margin-top: 30px;">
                    <div class="col-sm-8 col-md-8 col-lg-8 d-flex justify-content-between">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input mr-3" type="radio" name="assurance" id="assurance1" value="1"/>
                            <label class="form-check-label h5" for="assurance1">1</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input mr-3" type="radio" name="assurance" id="assurance2" value="2"/>
                            <label class="form-check-label h5" for="assurance1">2</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input mr-3" type="radio" name="assurance" id="assurance3" value="3"/>
                            <label class="form-check-label h5" for="assurance1">3</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input mr-3" type="radio" name="assurance" id="assurance4" value="4"/>
                            <label class="form-check-label h5" for="assurance1">4</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input mr-3" type="radio" name="assurance" id="assurance5" value="5"/>
                            <label class="form-check-label h5" for="assurance1">5</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group thing" style="margin-bottom: 30px;">
                <label for="exampleInputEmail1"><span class="h4"><span class="text-primary">Outcome:</span> How satisfied are you with the overall quality of services you received?<i></i></span></label>
                <div class="d-flex justify-content-center" style="margin-top: 30px;">
                    <div class="col-sm-8 col-md-8 col-lg-8 d-flex justify-content-between">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input mr-3" type="radio" name="outcome" id="outcome1" value="1"/>
                            <label class="form-check-label h5" for="outcome1">1</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input mr-3" type="radio" name="outcome" id="outcome2" value="2"/>
                            <label class="form-check-label h5" for="outcome1">2</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input mr-3" type="radio" name="outcome" id="outcome3" value="3"/>
                            <label class="form-check-label h5" for="outcome1">3</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input mr-3" type="radio" name="outcome" id="outcome4" value="4"/>
                            <label class="form-check-label h5" for="outcome1">4</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input mr-3" type="radio" name="outcome" id="outcome5" value="5"/>
                            <label class="form-check-label h5" for="outcome1">5</label>
                        </div>
                    </div>
                </div>
            </div>
            <button id="submit-feedback-button" type="button" class="btn btn-primary btn-lg float-right mx-1" aria-disabled="true">Submit</button>
            <button id="cancel-feedback-button" type="button" class="btn btn-danger btn-lg float-right mx-1">Cancel</button>
        </div>
    </div>
</form>
<script>
    $("#submit-feedback-button").on('click', function(){
        submitClientRate();
    })
    $("#cancel-feedback-button").on('click', function(){
        cancelForm();
    })
    function loadSubmitButton() {
        var btn = $("#submit-feedback-button");
        btn.attr('disabled', true);
        btn.html('Submitting...');

    }
    function resetSubmitButton() {
        var btn = $("#submit-feedback-button");
        btn.attr('disabled', false);
        btn.html('Submit');

    }
</script>