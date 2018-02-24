@extends('layouts.template')
@section('title')
    Show Book
    @stop
@section('content')
    @include('partials.admin_nav_bar')
    @include('partials.footer')
    <div class="container">
        <div class="row">
            <div class="col-sm-11 col-sm-offset-0">
                <h1 class="text-center text-primary">Show Book</h1>
                <table class="table table-responsive">

                        <tr>
                            <td>Book Name</td>
                            <td>Author Name</td>


                        </tr>

                    @foreach($book as $book)
                        <tr class="btn-success">
                            <td>{{$book->bookName}}</td>
                            <td>{{$book->authorName}}</td>

                            <td>
                            </td>

                        </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
    @stop