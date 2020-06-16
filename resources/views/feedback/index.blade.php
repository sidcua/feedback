@extends('layouts.app')
@section('title', 'Feedback')
@section('styles')
    {{-- <link rel='stylesheet' href='https://unpkg.com/emoji.css/dist/emoji.min.css'> --}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-12">
                <img src="{{ asset('storage/chedlogo.png') }}" class="rounded float-left" style="height: 70px; width: 70px; margin-top: 10px;">
                <div class="justify-content-center p-3">
                    <p class="h5 text-center">Commission on Higher Education</p>
                    <p class="h6 text-center">Region IX, Zamboanga Peninsula</p>
                </div>
            </div>
        </div>
    </div> 
    <div class="container collapse" id="loader" style="margin-top: 100px;">
        <div class="row justify-content-center text-center">
            <div class="col-sm-12 col-md-12">
                <img src="{{ asset('storage/loading.gif') }}">
            </div>
        </div>
    </div>
    <div class="container-fluid" id="feedback-container">
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $("#feedback-container").hide();
            $("#loader").show();
            $("#feedback-container").load('/office', function(){
                $("#loader").hide();
                $("#feedback-container").show();
            });
        })
        function office(office){
            $("#office").val(office);
            selectOffice();
        }
    </script>
@endsection