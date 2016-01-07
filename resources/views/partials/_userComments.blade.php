@forelse($comments as $comment)
    <div class="list-group" style="width: 80%">
        <?php $post = $comment->post()->get()->first(); ?>
        <?php $tags = $post->tags()->get();?>
        <a href="{{route('posts.show',[$post])}}">{{$post["title"]}}
        </a>
        <?php $diff = Carbon\Carbon::parse($post["created_at"])->diffForHumans(Carbon\Carbon::now()); ?>
        <?php $diff = str_replace("before", "ago", $diff); ?>
        <div class="undertext">
            made by
            @if(Auth::user() && $user->id === Auth::user()->id)
                You
            @else
                <a href="{{route("users.show",[$user])}}">
                    {{$user->first_name}}
                </a>
            @endif
            {{$diff}} in
            @foreach($tags as $tag)
                <a href="{{route("tags.show",[$tag])}}"> {{$tag->name}}</a>
                @unless ($tags->last()->id === $tag->id)
                    ,
                    @endif
                    @endforeach
        </div>
        <div class="undertext">
                <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true">
                                    {{$post->upVotes()}}
                                </span>
            &nbsp
                 <span class="glyphicon glyphicon-thumbs-down" aria-hidden="true">
                                        {{$post->downVotes()}}
                                    </span>

        </div>
        <div class="panel-body">
            {{$comment->body}}
        </div>
        <div class="undertext">
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
        @unless($comments->last()->id === $comment->id)
            <hr>
            @endif

    </div>
@empty
    <h4>No comments found</h4>
@endforelse