<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield("title")</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet"/>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fancybox/jquery.fancybox-v=2.1.5.css')}}" media="screen">

    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div id = "logo">
            <a href="{{url('/')}}">
            <img src="{{asset("/images/logo.jpg")}}"/>
            </a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="padding-top: 10px;">
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/') }}">MyTunnelVision</a></li>
                <li style="padding-left: 50px;"><a href="{{ url('about') }}">About</a></li>
                <li style="padding-left: 50px;"><a href="{{ url('feedback') }}">Feedback</a></li>
                @if (Auth::user())
                    <li style="padding-left: 50px;"><a href="{{ route('tags.index') }}">Tags</a></li>
                @endif

            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{ url('/auth/login') }}">Login</a></li>
                    <li><a href="{{ url('/auth/register') }}">Register</a></li>
                @else
                    <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>

@include('partials._message')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body" style="padding: 50px 100px 30% 100px">
                    @yield('content')
                </div>
                @if(Auth::user())
                    <div class="col-sm-2"
                         style="top: 2%; display: block; float: left; height: 450px; position: absolute; ">
                        <div class="panel panel-default">
                            <div class="panel-body menu-bar">
                                <a href="{{ route('users.show',[Auth::user()]) }}">{{ ucfirst(Auth::user()->first_name) . " " . ucfirst(Auth::user()->last_name)}}</a>
                                <br/>
                                <br/>
                                <a href="{{ route('posts.create') }}">New Post</a>
                                <br/>
                                <br/>
                                @if (Auth::user()->isAdmin())
                                    <a href="{{ route('requests') }}">Tag&nbsp;Requests</a>
                                @endif
                                <hr>
                                @if(Auth::user()->tags()->get()->count() == 0)
                                    <b>You've no Subscriptions</b>
                                @else
                                    <b>Subscriptions</b>
                                    <br/>
                                    <br/>

                                    <div>
                                        @foreach(Auth::user()->tags()->get() as $tag)
                                            <div>
                                                <a href="{{route("tags.show",[$tag])}}">{{$tag->name}}</a>
                                                <br/>
                                                <br/>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- Scripts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="{{ asset('/js/script.js') }}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

</body>
</html>