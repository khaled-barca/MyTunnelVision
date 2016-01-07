@extends('masterpage')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Tags</div>
                    <div class="panel-body">
                        @include('partials._tags')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("title")
    Tags
@endsection