@extends('layouts.app')
@section('title', 'Client Satsifacory')
@section('styles')
    {{-- <link rel='stylesheet' href='https://unpkg.com/emoji.css/dist/emoji.min.css'> --}}
    <!-- Font Awesome -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
    />
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.5.0/mdb.min.css"
    rel="stylesheet"
    />
    <style>
        input[type='radio'] {
            transform: scale(2);
        }
        .thing {
            padding: 1rem;
            /* width: 420px; */
            box-shadow: 0 15px 30px 0 rgba(0,0,0,0.11),
                0 5px 15px 0 rgba(0,0,0,0.08);
            background-color: #ffffff;
            border-radius: 0.5rem;
            
            border-left: 0 solid #0a8af2;
            transition: border-left 300ms ease-in-out, padding-left 300ms ease-in-out;
        }

        .thing:hover {
            padding-left: 0.5rem;
            border-left: 0.5rem solid #0a8af2;
        }

        .thing > :first-child {
            margin-top: 0;
        }

        .thing > :last-child {
            margin-bottom: 0;
        }

        .thing2 {
            padding: 1rem;
            /* width: 420px; */
            box-shadow: 0 15px 30px 0 rgba(0,0,0,0.11),
                0 5px 15px 0 rgba(0,0,0,0.08);
            background-color: #ffffff;
            border-radius: 0.5rem;
            
            border-left: 0 solid #f22727;
            transition: border-left 300ms ease-in-out, padding-left 300ms ease-in-out;
        }

        .thing2:hover {
            padding-left: 0.5rem;
            border-left: 0.5rem solid #f22727;
        }

        .thing2 > :first-child {
            margin-top: 0;
        }

        .thing2 > :last-child {
            margin-bottom: 0;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <!-- 741 x 197 -->
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-10 text-center">
                <img src="{{ asset('storage/bannersurvey.png') }}" class="rounded img-fluid" style="margin-top: 10px; width: 65%; height: auto;">
                <!-- <div class="justify-content-center p-3">
                    <p class="h5 text-center">Commission on Higher Education</p>
                    <p class="h6 text-center">Region IX, Zamboanga Peninsula</p>
                </div> -->

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
    <div class="container text-center" style="margin-top: 100px; margin-bottom: 150px;">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h2>Ooops...</h1>
                <h3>It seems you are lost</h1>
                <script>
                    document.write('<a href="javascript:history.back()" class="link-primary h4">Go Back</a>');
                </script>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <footer class="page-footer font-small blue pt-4">

    <!--Copyright-->
    <div class="footer-copyright">
    <div class="footer-copyright text-center py-3">© 2023 Copyright:
    <a href="feedback.chedro9.com"> feedback.chedro9.com</a>
    </div>
    </div>
    <!--/.Copyright-->

    </footer>
@endsection