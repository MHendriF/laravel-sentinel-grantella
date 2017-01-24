@extends('layouts.auth')

@section('title')
    Gentellela Alela! | Forgot Password
@endsection

@section('main_content')
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/forgot-password') }}">
                    {{ csrf_field() }}
                    
                    <h1>Forgot Password</h1>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        @if ($errors->has('email'))
                            <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" value="Send Code" class="btn btn-default btn-block">
                                Send Password Reset Link
                            </button>
                        </div>
                    </div>
                    <div class="separator">
                        <p class="change_link">You have a password ?
                            <a href="{{ url('/login') }}" class="to_register"> Log in </a>
                        </p>
                        
                        <div class="clearfix"></div>
                        <br />
                        
                        <div>
                            <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                            <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                        </div>
                    </div>
                </form>
@endsection
