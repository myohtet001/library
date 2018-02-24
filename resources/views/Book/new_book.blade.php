@extends('layouts.template')
@section('title')
    New Category
@stop
@section('content')
    @include('partials.admin_nav_bar')
    @include('partials.footer')
    <div class="container " style="margin-bottom: 60px">
        <div class="row">
            <div class="col-sm-5 col-sm-offset-3">
                @if(Session('book'))<div class="alert alert-success">{{Session('book')}}</div> @endif
                <h1 class="text-center text-primary">New Book</h1>
                <div class="panel panel-body">
                    <form method="post" action="{{route('new_book')}}" enctype="multipart/form-data">
                        <div class="form-group @if($errors->has('bookName')) has-error @endif">
                            @if($errors->has('bookName'))<span class="help-block">{{$errors->first('bookName')}}</span> @endif
                            <label for="bookName" class="control-label">Book Name</label>
                            <input type="text" class="form-control" id="bookName" name="bookName" placeholder="BookName" value="{{old('bookName')}}">
                        </div>
                        <div class="form-group @if($errors->has('authorName')) has-error @endif">
                            @if($errors->has('authorName'))<span class="help-block">{{$errors->first('authorName')}}</span> @endif
                            <label for="authorName" class="control-label">Author Name</label>
                            <input type="text" class="form-control" name="authorName" id="authorName" placeholder="Author Name" value="{{old('authorName')}}">
                        </div>
                        <div class="form-group @if($errors->has('category')) has-error @endif">
                            @if($errors->has('category'))<span class="help-block">{{$errors->first('category')}}</span> @endif
                            <label for="category" class="control-label">Categories</label>
                            <select name="category" id="category" class="form-control">
                                <option value="">select category</option>
                                @foreach($cat as $cat)
                                    <option value="{{$cat->id}}">{{$cat->category}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group @if($errors->has('book_cover')) has-error @endif">
                            @if($errors->has('book_cover'))<span class="help-block">{{$errors->first('book_cover')}}</span> @endif
                            <label for="book_cover" class="control-label">Book Cover</label>
                            <input type="file"  style="height: auto" class="form-control" name="book_cover" id="book_cover" value="{{old('book_cover')}}" placeholder="Book Cover">
                        </div>
                        <div class="form-group @if($errors->has('book_file')) has-error @endif">
                            @if($errors->has('book_file'))<span class="help-block">{{$errors->first('book_file')}}</span> @endif
                            <label for="book_file" class="control-label">Book file</label>
                            <input type="file" class="form-control" name="book_file" id="book_file" style="height: auto" placeholder="Book file" value="{{old('book_file')}}">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn  btn-info btn-block">Save</button>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop