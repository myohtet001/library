@extends('layouts.template')
@section('title')
    New Category
    @stop
@section('content')
    @include('partials.admin_nav_bar')
    @include('partials.footer')
    <div class="container">
        <div class="row">
            <div class="col-sm-5 col-sm-offset-3">
                @if(Session('info'))<div class="alert alert-success">{{Session('info')}}</div> @endif
                <h1 class="text-center text-primary">New Category</h1>
                <div class="panel panel-body">
                    <form method="post" action="{{route('category')}}">
                        <div class="form-group @if($errors->has('new_cat')) has-error @endif">
                            @if($errors->has('new_cat'))<span class="help-block">{{$errors->first('new_cat')}}</span> @endif
                            <label for="new_cat" class="control-label">New Category</label>
                            <input type="text" class="form-control" id="new_cat" name="new_cat" placeholder="New Categroy" value="{{old('new_cat')}}">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn  btn-info">Save</button>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>
    </div>
    @stop