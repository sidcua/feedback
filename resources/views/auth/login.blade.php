@extends('layouts.app')
@section('title', 'FMS')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-5 col-md-5">
            <form method="POST" action="{{ route('login') }}" style="margin-top: 100px;">
                {{ csrf_field() }}
                <p class="h2 text-center p-4">Feedback Monitoring System</p>
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input id="email" name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required autofocus>
                    @if ($errors->has('email'))
                        <span class="help-block">   
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input id="password" name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-primary float-right">Login</button>
            </form>
        </div>
    </div>
</div>
@endsection
