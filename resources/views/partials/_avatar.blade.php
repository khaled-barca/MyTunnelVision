<?php $diff = $post->created_at->diffForHumans(Carbon\Carbon::now()); ?>
<?php $diff = str_replace("before", "ago", $diff); ?>
<div class="row">
<div class="col-md-3">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-md-5">
                <div class="col-lg-offset-12">
                    <i class="fa fa-user fa-5x"></i>
                </div>
                </div>
        </div>
        <div style="margin-left: 40px">
            <a href="{{route("users.show",[$post->user()->get()->first()])}}">
                {{$post->user()->get()->first()->fullName()}}
            </a>
            <p>
                posted {{$diff}}
            </p>
        </div>
    </div>

</div>
</div>
