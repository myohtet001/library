@extends('layouts.template')
@section('title')
    Admin Dashboard
    @stop
@section('content')
    @include('partials.admin_nav_bar')
    @include('partials.footer')
 <div class="container">
     <div class="row">
         <div class="col-sm-7 col-sm-offset-3">
             <h1 class="text-center text-primary">Welcome to Admin Page</h1>
         </div>
     </div>
 </div>
    @stop