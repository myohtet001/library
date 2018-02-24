<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('/')}}">E-library</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">


                <li class="dropdown">

                        @foreach($cat as $cat)
                        <li><a href="{{route('get_by_category',['cat_id'=>$cat->id])}}">{{$cat->category}}</a></li>

                            @endforeach

                </li>
            </ul>
            <form class="navbar-form navbar-left" method="get" action="{{route('search')}}">

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search" name="q" id="q">
                </div>
                <button type="submit" class="btn btn-default">Search</button>
                {{csrf_field()}}
            </form>
            <ul class="nav navbar-nav navbar-right">
                @if(!Auth::User())
                    <li><a href="{{route('login')}}"><span class="glyphicon glyphicon-log-in">Login</span> </a></li>
                    <li><a href="{{route('register')}}"><span class="glyphicon glyphicon-registration-mark">SignUp</span> </a></li>
                @else
                    <li><a href=""><span class="glyphicon glyphicon-user">{{Auth::User()->name}}</span></a>  </li>
                    <li><a href="{{route('logout')}}"><span class="glyphicon glyphicon-log-out">logout</span> </a> </li>

                @endif
                <li class="dropdown">


                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>