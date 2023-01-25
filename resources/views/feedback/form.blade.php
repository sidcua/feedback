<div class="row justify-content-center p-3">
    <div class="col-sm-10 col-md-10 text-center">
        <p class="h1">How do you feel about our service?</p>
        <p class="h6">CHED Regional Office IX Client Satisfactory Survey</p>
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
                <label for="exampleInputEmail1"><span class="h3">Name <span class="h5">[ First, M.I., Last ]</span> <span class="font-italic h6">(optional)<span></span></label>
                <input type="text" name="client" class="form-control" aria-describedby="emailHelp" maxlength="100" placeholder="ex. Juan Dela Cruz">
            </div>
        </div>
        <div class="col-lg-10">
            <div class="form-group thing2" style="margin-bottom: 30px;">
                <label for="exampleInputEmail1"><span class="h3">Name of Office / Orgranization <span class="font-italic h6">(optional)<span></span></label>
                <input type="text" name="office" class="form-control" aria-describedby="emailHelp" maxlength="100" placeholder="ex. Commission on Higher Education Regional Office IX">
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
                        <option value="Female">Prefer not to say</option>
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
                <div class="d-flex justify-content-center">
                    <select name="service" id="select-service-form" class="form-select form-select-lg mb-3 selectwidth" aria-label=".form-select-lg example">
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-center mt-3">
        <div class="col-md-10">
            <p class="h3 text-center">Please rate our service under each specific dimension in a scale of 1 to 5</p>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-md-4">
            <div class="d-flex justify-content-between">
                <p class="p-2 h5"><span>5 = Very Satisfied</span></p><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-emoji-laughing text-success" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M12.331 9.5a1 1 0 0 1 0 1A4.998 4.998 0 0 1 8 13a4.998 4.998 0 0 1-4.33-2.5A1 1 0 0 1 4.535 9h6.93a1 1 0 0 1 .866.5zM7 6.5c0 .828-.448 0-1 0s-1 .828-1 0S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 0-1 0s-1 .828-1 0S9.448 5 10 5s1 .672 1 1.5z"/>
                </svg>
            </div>
            <div class="d-flex justify-content-between">
                <p class="p-2 h5"><span>4 = Satisfied</span></p><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-emoji-smile text-info" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"/>
                </svg>
            </div>
            <div class="d-flex justify-content-between">
                <p class="p-2 h5"><span>3 = Neutral</span></p><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-emoji-neutral text-primary" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M4 10.5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7a.5.5 0 0 0-.5.5zm3-4C7 5.672 6.552 5 6 5s-1 .672-1 1.5S5.448 8 6 8s1-.672 1-1.5zm4 0c0-.828-.448-1.5-1-1.5s-1 .672-1 1.5S9.448 8 10 8s1-.672 1-1.5z"/>
                </svg>
            </div>
            <div class="d-flex justify-content-between">
                <p class="p-2 h5"><span>2 = Dissatisfied</span></p><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-emoji-frown text-secondary" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M4.285 12.433a.5.5 0 0 0 .683-.183A3.498 3.498 0 0 1 8 10.5c1.295 0 2.426.703 3.032 1.75a.5.5 0 0 0 .866-.5A4.498 4.498 0 0 0 8 9.5a4.5 4.5 0 0 0-3.898 2.25.5.5 0 0 0 .183.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"/>
                </svg>
            </div>
            <div class="d-flex justify-content-between">
                <p class="p-2 h5"><span>1 = Very Dissatisfied</span></p><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-emoji-angry text-danger" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M4.285 12.433a.5.5 0 0 0 .683-.183A3.498 3.498 0 0 1 8 10.5c1.295 0 2.426.703 3.032 1.75a.5.5 0 0 0 .866-.5A4.498 4.498 0 0 0 8 9.5a4.5 4.5 0 0 0-3.898 2.25.5.5 0 0 0 .183.683zm6.991-8.38a.5.5 0 1 1 .448.894l-1.009.504c.176.27.285.64.285 1.049 0 .828-.448 1.5-1 1.5s-1-.672-1-1.5c0-.247.04-.48.11-.686a.502.502 0 0 1 .166-.761l2-1zm-6.552 0a.5.5 0 0 0-.448.894l1.009.504A1.94 1.94 0 0 0 5 6.5C5 7.328 5.448 8 6 8s1-.672 1-1.5c0-.247-.04-.48-.11-.686a.502.502 0 0 0-.166-.761l-2-1z"/>
                </svg>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-5">
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
    $(document).ready(function () {
        listService_form();
    })
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