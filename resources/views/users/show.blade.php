@extends("masterpage")
@section("content")
    <nav class="navbar navbar-default col-md-offset-3" style="width: 520px;">
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

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                <ul class="nav navbar-nav">
                    <li><a href="#" id="infoLink">Info</a></li>
                    <li><a href="#" id="postsLink">Posts</a></li>
                    <li><a href="#" id="commentsLink">Comments</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid" id="info">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">

                        <div class="info-group">
                            <label class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                <label class="col-md-4 control-label">{{ucfirst($user->first_name)}}</label>
                            </div>
                        </div>

                        <div class="info-group">
                            <label class="col-md-4 control-label">Last Name</label>

                            <div class="col-md-6">
                                <label class="col-md-4 control-label">{{ucfirst($user->last_name)}}</label>
                            </div>
                        </div>

                        <div class="info-group">
                            <label class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <label class="col-md-4 control-label">{{$user->email}}</label>
                            </div>
                        </div>

                        <div class="info-group">
                            <label class="col-md-4 control-label">Age</label>

                            <div class="col-md-6">
                                <label class="col-md-4 control-label">
                                    {{Carbon\Carbon::now()->diffInYears($user->date_of_birth)}}
                                </label>
                            </div>
                        </div>

                        <div class="info-group">
                            <label class="col-md-4 control-label">Sex</label>

                            <div class="col-md-6">
                                <label class="col-md-4 control-label">
                                    @if($user->sex==0)
                                        Male
                                    @else
                                        Female
                                    @endif
                                </label>
                            </div>
                        </div>

                        <div class="info-group">
                            <label class="col-md-4 control-label">Type</label>

                            <div class="col-md-6">
                                <label class="col-md-4 control-label">
                                    @if($user->isAdmin())
                                        Admin
                                    @else
                                        User
                                    @endif
                                </label>
                            </div>
                        </div>
                        @if( Auth::user() && $user->id === Auth::user()->id)
                        <div class="col-md-6 col-md-offset-4">
                            <a href="{{url('/users/' . Auth::user()->id . '/edit')}}" class="btn btn-primary linkbutton"
                               role="button">
                                Edit
                            </a>
                        </div>
                            @endif

                        @if(Auth::user() && Auth::user()->isAdmin() && !$user->isAdmin())
                            <div class="col-md-6 col-md-offset-4">
                                <a href="" class="btn btn-primary"
                                   role="button">
                                    Promote to Admin
                                </a>
                            </div>
                            @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" id="posts">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @include('partials._posts')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" id="comments">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @include('partials._userComments')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("title")
    {{ucfirst($user->first_name) .' ' . ucfirst($user->last_name)}}
@endsection