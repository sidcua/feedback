@extends('layouts.app')
@section('title', 'Dashboard')
@section('styles')
    {{-- <link rel='stylesheet' href='https://unpkg.com/emoji.css/dist/emoji.min.css'> --}}
@endsection
@section('content')
    @include('inc.navbar')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <h1 class="display-3">Feedbacks</h1>
            </div>
        </div>
        <div class="row d-flex justify-content-center mt-4">
            <div class="col-sm-12 col-md-12 table-responsiv-sm table-responsive-md" style="overflow: auto; height: 500px;">
                <table class="table table-bordered table-hover">
                    <thead class="text-center">
                      <tr>
                        <th scope="col">Office</th>
                        <th>Service</th>
                        <th>Name</th>
                        <th>Rate</th>
                        <th>Comment</th>
                        <th>Created At</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="text-center" id="feedback-table">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            // listFeedback_Admin()
        })
    </script>
@endsection