@extends('layouts.template')
@section('title')
    Update Book
    @stop
@section('content')
    @include('partials.admin_nav_bar')
    @include('partials.footer')
    <div class="container">
        <div class="row">
            <div class="col-sm-5 col-sm-offset-3">
              <h1 class="text-primary text-center">Update Book</h1>
                <form method="post" action="{{route('updateBookName')}}">
                    <input type="hidden" name="user_id" id="user_id" value="{{($book)? $book['id']:''}}">
                    <div class="form-group">
                        <label for="bookName" class="control-label">Book Name</label>
                        <input type="text" class="form-control" value="{{($book)? $book['bookName']:''}}" name="bookName">
                    </div>
                    <div class="form-group">
                        <label for="authorName" class="control-label">Author Name</label>
                        <input type="text" class="form-control" value="{{($book)? $book['authorName']:''}}" name="authorName">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success text-center" style="width: 300px">Update</button>
                    </div>
                    {{csrf_field()}}
                </form>
            </div>
        </div>
    </div>
    @endsection