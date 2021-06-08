@extends('layouts.app')
@section('title', 'Feedback')
@section('styles')
    {{-- <link rel='stylesheet' href='https://unpkg.com/emoji.css/dist/emoji.min.css'> --}}
@endsection
@section('content')
    @include('inc.navbar')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="jumbotron">
                    <h1 class="display-4 font-weight-bold" id="office-rating">----</h1>
                    <p class="lead">CHEDRO IX Overall Rating</p>
                    <hr class="my-4">
                    <p></p>
                    <a class="btn btn-primary btn-lg" href="#" role="button">View all feedbacks <span class="badge badge-light" id="total-feedback-badge"></span></a>
                </div>
            </div>
            
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6" id="by-office">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">---</h5>
                        <p class="card-text">----</p>
                        <a href="#" class="btn btn-primary">View Feedbacks</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            overallRating();
            byOfficeRating();
        })
    </script>
@endsection