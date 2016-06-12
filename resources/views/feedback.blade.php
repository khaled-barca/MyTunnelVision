@extends("masterpage")
@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Give us your feedback
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['class' => 'form-horizontal', 'method' => 'POST', 'action' =>
                        ['PostController@feedback']])!!}
                        <div class="form-group">
                            <h4>
                                <label for="inputsm" class="col-md-2 control-label"
                                       style="padding-right: 45px;">Subject</label>
                                <br/>
                                <br/>
                                <input name="subject" class="form-control input-sm"
                                       style="width: 50%; margin-left: 45px"/>
                            </h4>
                        </div>
                        <div class="form-group">
                            <h4>
                                <label for="inputsm" class="col-md-2 control-label">Feedback</label>
                                <br/>
                                <textarea name="feedback" class="form-control input-sm posts"></textarea>
                            </h4>
                        </div>
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary newPost" style="margin: 190px 0 0 60px;">Submit
                            </button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('title')
    Feedback
@endsection