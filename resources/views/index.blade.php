@extends('layouts.template')
@section('title')
    E-Library
    @stop
@section('content')
    @include('partials.nav_bar')
    @include('partials.footer')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col col-sm-offset-1">
                @foreach($books as $book)
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="{{route('image',['file_name'=>$book->book_cover])}}" class="img-rounded"  style="height: 100px">
                            <div class="caption">
                                <p>Book Name: {{$book->bookName}}</p>
                                <p>Author Name: {{$book->authorName}}</p>
                                <p><a href="{{route('image_file',['image_file'=>$book->book_file])}}" class="btn btn-primary btn-block" role="button">Download</a> </p>

                            </div>
                        </div>
                    </div>

                    @endforeach

            </div>

        </div>

    </div>
    <div class="text-center" style="margin-bottom: 200px">        {{$books->links()}}</div>

    @stop