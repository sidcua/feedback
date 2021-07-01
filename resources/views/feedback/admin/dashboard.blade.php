@extends('layouts.app')
@section('title', 'Dashboard')
@section('styles')
    {{-- <link rel='stylesheet' href='https://unpkg.com/emoji.css/dist/emoji.min.css'> --}}
@endsection
@section('content')
    @include('inc.navbar')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="card text-center text-white bg-success mb-3">
                    <div class="card-header">
                        Client Satisfactory Dashboard
                    </div>
                    <div class="card-body">
                        <h1 class="card-title">Overall Rating</h1>
                        <p class="card-text h2">99.9</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card text-center text-white bg-primary mb-3">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                    <h5 class="card-title">Primary card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card text-center text-white bg-secondary mb-3">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                    <h5 class="card-title">Primary card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card text-center text-white bg-warning mb-3">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                    <h5 class="card-title">Primary card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card text-center text-white bg-info mb-3">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                    <h5 class="card-title">Primary card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
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