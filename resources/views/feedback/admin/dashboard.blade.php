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
                        <p id="office-rating" class="card-text h2">---</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card text-center text-white bg-primary mb-3">
                    <div class="card-header">Responsiveness</div>
                    <div class="card-body">
                    <h5 id="responsiveness" class="card-title">---</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card text-center text-white bg-primary mb-3">
                    <div class="card-header">Reliability (Quality)</div>
                    <div class="card-body">
                    <h5 id="reliability" class="card-title">---</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card text-center text-white bg-primary mb-3">
                    <div class="card-header">Access and Facilities</div>
                    <div class="card-body">
                    <h5 id="access" class="card-title">---</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card text-center text-white bg-primary mb-3">
                    <div class="card-header">Communication</div>
                    <div class="card-body">
                    <h5 id="communication" class="card-title">---</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card text-center text-white bg-primary mb-3">
                    <div class="card-header">Costs</div>
                    <div class="card-body">
                    <h5 id="cost" class="card-title">---</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card text-center text-white bg-primary mb-3">
                    <div class="card-header">Integrity</div>
                    <div class="card-body">
                    <h5 id="integrity" class="card-title">---</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card text-center text-white bg-primary mb-3">
                    <div class="card-header">Assurance</div>
                    <div class="card-body">
                    <h5 id="assurance" class="card-title">---</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card text-center text-white bg-primary mb-3">
                    <div class="card-header">Outcome</div>
                    <div class="card-body">
                    <h5 id="outcome" class="card-title">---</h5>
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