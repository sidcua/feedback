<div class="row justify-content-center p-3">
    <div class="col-sm-10 col-md-10 text-center">
        <p class="h1">Welcome to CHED Online Feedback System</p>
        <p class="h3">Please select the office that assisted you</p>
    </div>
</div>
<div class="row justify-content-center" style="margin-top: 10px;">
    <div class="col-sm-6 col-md-6">
        <p class="h1 text-center"><span class="badge badge-pill badge-info">Technical Division</span></p>
        <button onclick="office('Office of the Director')" type="button" class="btn btn-info btn-block"><span class="h1">Office of the Director</span></button>
        <button onclick="office('Office of the Chief')" type="button" class="btn btn-info btn-block"><span class="h1">Office of the Chief</span></button>
        <button onclick="office('Office of the Assistant Chief')" type="button" class="btn btn-info btn-block"><span class="h1">Office of the Assistant Chief</span></button>
        <button onclick="office('Education Supervisors')" type="button" class="btn btn-info btn-block"><span class="h1">Education Supervisors</span></button>
        <button onclick="office('MIS/Planning Division')" type="button" class="btn btn-info btn-block"><span class="h1">MIS/Planning Division</span></button>
        <button onclick="office('Scholarship Unit')" type="button" class="btn btn-info btn-block"><span class="h1">Scholarship Unit</span></button>
        <button onclick="office('K to 12 Unit')" type="button" class="btn btn-info btn-block"><span class="h1">K to 12 Unit</span></button>
        <button onclick="office('UniFAST Unit')" type="button" class="btn btn-info btn-block"><span class="h1">UniFAST Unit</span></button>
    </div>
    <div class="col-sm-6 col-md-6">
        <p class="h1 text-center"><span class="badge badge-pill badge-primary">Administrative Division</span></p>
        <button onclick="office('Records\' Office')" type="button" class="btn btn-primary btn-block"><span class="h1">Records' Office</span></button>
        <button onclick="office('Accounting Office')" type="button" class="btn btn-primary btn-block"><span class="h1">Accounting Office</span></button>
        <button onclick="office('Cashier\'s Office')" type="button" class="btn btn-primary btn-block"><span class="h1">Cashier's Office</span></button>
    </div>
</div>
<form id="select-office-form" method="POST">
    {{csrf_field()}}
    <input type="hidden" id="office" name="office" value="">
</form>