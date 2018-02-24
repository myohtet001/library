@extends('layouts.template')
@section('title')
    Update Book
@stop
@section('content')
    @include('partials.admin_nav_bar')
    @include('partials.footer')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-sm-offset-0">
                <h1 class="text-center text-primary">Update Book</h1>
                <table class="table table-responsive">

                    <tr>
                        <td>Book Name</td>
                        <td>Author Name</td>
                        <td>Edit</td>

                    </tr>

                    @foreach($book as $book)
                        <tr class="btn-success">
                            <td>{{$book->bookName}}</td>
                            <td>{{$book->authorName}}</td>
                            <td><a  class="btn btn-info" href="{{route('update',['updateBook'=>$book->id])}}"><span class="glyphicon glyphicon-edit"></span> </a> </td>


                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@stop