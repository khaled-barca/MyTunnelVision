@extends("masterpage")
@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Request a new Tag</div>
                    <div class="panel-body">
                        {!! Form::open(['class' => 'form-horizontal', 'method' => 'POST', 'action' =>
                        ['TagController@request_tag']])!!}
                        <div class="form-group">
                            <h4>
                                <label for="inputsm" class="col-md-2 control-label" style="padding-right: 45px;">Tag Name</label>
                                <br/>
                                <br/>
                                <input name="requested_tag" class="form-control input-sm" style="width: 30%; margin-left: 45px"/>
                            </h4>
                        </div>

                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary newPost" style="margin-left: 40px;">Submit
                            </button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("title")
    Request new Tag
@endsection