<div class="container-fluid">
    <div class="row">
        <div class="col-md-9 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    @include('partials._avatar',["post" => $comment])
                    <br/>
                    <div class="col-md-0 posts">
                        {{$comment->body}}
                        <br/>
                        <br/>
                        <div class="votes">
                            <a href="{{route('commentsUpVote',[$comment])}}">
                                <button type="button" class="btn btn-default btn-lg">
                                <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true">
                                    {{$comment->upVotes()}}
                                </span>
                                </button>
                            </a>
                            <a href="{{route('commentsDownVote',[$comment])}}">
                                <button type="button" class="btn btn-default btn-lg">
                                    <span class="glyphicon glyphicon-thumbs-down" aria-hidden="true">
                                        {{$comment->downVotes()}}
                                    </span>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>