@extends('layouts.template')
@section('title')
    Login
@stop
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-5 col-sm-offset-3">
              @if(Session('error'))<div class="alert alert-danger">{{Session('error')}}</div> @endif
                <h1 class="text-center text-primary">Login</h1>

                    <div class="panel panel-body">
                        <form method="post" action="{{route('login')}}">

                            <div class="form-group @if($errors->has('userName')) has-error @endif">
                                @if($errors->has('userName'))<span class="help-block">{{$errors->first('userName')}}</span> @endif
                                <label for="userName" class="control-label">UserName</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i> </span>
                                        <input type="text" class="form-control" name="userName" id="userName" placeholder="UserName">
                                    </div>
                            </div>

                            <div class="form-group @if($errors->has('password')) has-error @endif">
                                @if($errors->has('password'))<span class="help-block">{{$errors->first('password')}}</span> @endif
                                <label for="password" class="control-label">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i> </span>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                    </div>

                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                            {{csrf_field()}}
                        </form>
                    </div>

            </div>
        </div>
    </div>
@stop