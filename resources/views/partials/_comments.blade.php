@if($post->comments()->get()->count() == 0)
    <h4>No comments found for this post</h4>
    <hr>
@else

    <h4>{{$post->comments()->get()->count() . " Comments"}}</h4>
    <br/>
    @foreach($post->comments()->get() as $comment)
        <?php $diff = $comment->created_at->diffForHumans(Carbon\Carbon::now()); ?>
        <?php $diff = str_replace("before", "ago", $diff); ?>
        <div class="panel-body">
            {{$comment->body}}
        </div>
        <div class="undertext">
            Commented by
            <a href="{{route("users.show",[$comment->user()->get()->first()])}}">
                {{$comment->user()->get()->first()->first_name}}
            </a>
            {{$diff}} &nbsp
            <a href="{{route('commentsUpVote',[$comment])}}">
                                <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true">
                                    {{$comment->upVotes()}}
                                </span>
            </a>
            &nbsp
            <a href="{{route('commentsDownVote',[$comment])}}">
                                <span class="glyphicon glyphicon-thumbs-down" aria-hidden="true">
                                    {{$comment->downVotes()}}
                                </span>
            </a>
        </div>
        <hr>
    @endforeach

@endif