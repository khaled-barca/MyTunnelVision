<div class="container-fluid">
    <div class="row">
        <div class="col-md-9 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$post->title}}</div>
                <div class="panel-body">
                    @include('partials._avatar')
                    <br/>
                    <div class="col-md-0 posts">
                        {{$post->body}}
                        <br/>
                        <br/>
                        <div class="votes">
                            <a href="{{route('postUpVote',[$post])}}">
                                <button type="button" class="btn btn-default btn-lg">
                                <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true">
                                    {{$post->upVotes()}}
                                </span>
                                </button>
                            </a>
                            <a href="{{route('postDownVote',[$post])}}">
                                <button type="button" class="btn btn-default btn-lg">
                                    <span class="glyphicon glyphicon-thumbs-down" aria-hidden="true">
                                        {{$post->downVotes()}}
                                    </span>
                                </button>
                            </a>
                        </div>
                        <strong>Related Tags:</strong>
                        <br/>
                        <br/>

                        <div class="list-group tags">
                            @foreach($post->tags()->get() as $tag)
                                <a href="{{route('tags.show',[$tag])}}" class="list-group-item">{{$tag->name}}</a>
                            @endforeach
                        </div>

                        @include('partials._comments')
                        <label for="inputsm" class="col-md-2 control-label"><b>New Comment</b></label>
                        <br/>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/comments') }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type = "hidden" name="post_id" value="{{$post->id}}">
                            <textarea name="body" class="form-control input-sm posts"></textarea>
                                <div class="col-md-offset-3">
                                    <button type="submit" class="btn btn-primary">Comment</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>