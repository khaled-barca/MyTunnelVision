@forelse($posts as $post)
    <div class="list-group" style="width: 80%">
        <a href="{{route('posts.show',[$post])}}">{{$post->title}}
        </a>
        <?php $diff = $post->created_at->diffForHumans(Carbon\Carbon::now()); ?>
        <?php $diff = str_replace("before", "ago", $diff); ?>
        <div class="undertext">
            made by
            @if(Auth::user() && $post->user()->first()->id === Auth::user()->id)
                You
            @else
                <a href="{{route("users.show",[$post->user()->get()->first()])}}">
                    {{$post->user()->get()->first()->first_name}}
                </a>
            @endif
              {{$diff}} in
            @foreach($post->tags()->get() as $tag)
                <a href="{{route("tags.show",[$tag])}}"> {{$tag->name}}</a>
                @unless ($post->tags()->get()->last()->id === $tag->id)
                    ,
                    @endif
                    @endforeach
        </div>
        <div class="undertext">
            <b>{{$post->comments()->get()->count()}} Comments &nbsp
                <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true">
                                    {{$post->upVotes()}}
                                </span>
                &nbsp
                 <span class="glyphicon glyphicon-thumbs-down" aria-hidden="true">
                                        {{$post->downVotes()}}
                                    </span>

            </b>
        </div>
        @unless($posts->last()->id === $post->id)
            <hr>
            @endif

    </div>
@empty
    <div style="font-size: 120%">
        <b>No posts found.</b>
    </div>
@endforelse
<br/>
<br/>
<br/>