@extends("masterpage")
@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create a new Post</div>
                    <div class="panel-body">
                        {!! Form::open(['class' => 'form-horizontal', 'method' => 'POST', 'action' =>
                        ['PostController@store']])!!}
                        @include('partials._newPost')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("title")
    Create new post
@endsection