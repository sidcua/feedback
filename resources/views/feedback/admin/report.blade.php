@extends('layouts.app')
@section('title', 'Report')
@section('styles')
    {{-- <link rel='stylesheet' href='https://unpkg.com/emoji.css/dist/emoji.min.css'> --}}
@endsection
@section('content')
    @include('inc.navbar')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <p class="h5">CHED Regional Office IX</p>
                <div class="form-group thing2" style="margin-bottom: 30px;">
                    <label for="exampleInputEmail1"><span class="h5">Service: <i></i></span></label>
                    <select name="service" id="select-service" class="form-select form-select-lg mb-3 " aria-label=".form-select-lg example" onchange="listFeedback(this.value);">
                    </select>
                </div>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Client #</th>
                            <th scope="col">Responsiveness</th>
                            <th scope="col">Reliability (Quality)</th>
                            <th scope="col">Access & Facilities</th>
                            <th scope="col">Communication</th>
                            <th scope="col">Costs</th>
                            <th scope="col">Integrity</th>
                            <th scope="col">Assurance</th>
                            <th scope="col">Outcome</th>
                        </tr>
                    </thead>
                    <tbody id="tbl-report">
                    </tbody>
                </table>
                <div class="container collapse mt-1" id="loader">
                    <div class="row justify-content-center text-center">
                        <div class="col-sm-12 col-md-12">
                            <img src="{{ asset('storage/loading.gif') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-4 h6">
                Prepared by:
                <br><br>
                <u>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</u>
                <br>
                Technical Staff
            </div>
            <div class="col-md-4 h6">
                Reviewed by:
                <br><br>
                <u>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</u>
                <br>
                Chief
            </div>
            <div class="col-md-4 h6">
                Approved by:
                <br><br>
                <u>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</u>
                <br>
                Office Director
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            listService();
        });
        function clearReportTable() {
            $("#tbl-report").hide();
            $("#loader").show();
        }
        function showReportTable() {
            $("#loader").hide();
            $("#tbl-report").show();
        }
    </script>
@endsection