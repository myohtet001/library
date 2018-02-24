@extends('layouts.template')
@section('title')
    Sign Up
    @stop
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <h1 class="text-center text-primary">User Sign Up</h1>


                    <div class="panel panel-body">
                        <form method="post" action="{{route('register')}}">
                            <div class="form-group @if($errors->has('userName')) has-error @endif">
                                @if($errors->has('userName'))<span class="help-block">{{$errors->first('userName')}}</span> @endif
                                <label for="userName" class="control-label">UserName</label>
                                <input type="text" class="form-control" name="userName" id="userName" placeholder="UserName">
                            </div>
                            <div class="form-group @if($errors->has('email')) has-error @endif">
                                @if($errors->has('email'))<span class="help-block">{{$errors->first('email')}}</span> @endif
                                <label for="email" class="control-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group @if($errors->has('password')) has-error @endif">
                                @if($errors->has('password'))<span class="help-block">{{$errors->first('password')}}</span> @endif
                                <label for="password" class="control-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group @if($errors->has('confirmPassword')) has-error @endif">
                                @if($errors->has('confirmPassword'))<span class="help-block">{{$errors->first('confirmPassword')}}</span> @endif
                                <label for="confirmPassword" class="control-label">Confirm Password</label>
                                <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" placeholder="Confirm Password">
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-info">Sign Up</button>
                            </div>
                            {{csrf_field()}}
                        </form>
                    </div>

            </div>
        </div>
    </div>
    @stop