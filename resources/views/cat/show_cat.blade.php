@extends('layouts.template')
@section('title')
    Show Category
    @stop
@section('content')
    @include('partials.admin_nav_bar')
    @include('partials.footer')
    <div class="container">
        <div class="row">
            <div class="col-sm-7 col-sm-offset-3">
                <h1 class="text-center text-primary">Show Category</h1>
               <div class="panel panel-primary">
                   <div class="panel panel-body">
                       <table class="table ">
                           <th class="text-center">Category Name</th>
                           @foreach($cat as $cat)
                               <tr class="text-center btn-success">
                                   <td>{{$cat->category}}</td>
                               </tr>
                           @endforeach
                       </table>
                   </div>
               </div>
            </div>
        </div>
    </div>
    @stop