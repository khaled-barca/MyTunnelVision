<div class="form-group">
    <h4>
        <label for="inputsm" class="col-md-2 control-label" style="padding-right: 45px;">Post Title</label>
        <br/>
        <br/>
        <input name="title" class="form-control input-sm" style="width: 50%; margin-left: 45px"/>
    </h4>
</div>
<div class="form-group">
    <h4>
        <label for="inputsm" class="col-md-2 control-label">Post Content</label>
        <br/>
        <textarea name="body" class="form-control input-sm posts"></textarea>
    </h4>
</div>

<div class="form-group">
    <h4>
        <label for="inputsm" class="col-md-3 control-label">Post as anonymous ?</label>
        <br/>
        <label><input type="radio" name="anonymity" class="radio-inline" value="1">Yes</label>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label><input type="radio" name="anonymity" class="radio-inline" value="0">No</label>
    </h4>
</div>


<div class="form-group">
    <h4>
        <label for="inputsm" class="col-md-2 control-label">Post privacy</label>
        <br/>

        <div class="col-md-offset-3">
            <label><input type="radio" name="privacy" class="radio-inline" value="0">Public</label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label><input type="radio" name="privacy" class="radio-inline" value="1">Private</label>
        </div>
    </h4>
</div>

<div class="form-group">
    <h4>
        <label for="inputsm" class="col-md-1 control-label"
               style="margin-left: 10px;">Tags</label>
        <br/>
        <br/>

        <div class="tags">
            {!! Form::select('tags[]',$tags, null, ['id' => 'tag_list', 'class' =>
            'form-control input-sm', 'multiple']) !!}
        </div>

    </h4>
</div>
<div class="col-md-6 col-md-offset-4">
    <button type="submit" class="btn btn-primary newPost" style="margin: 190px 0 0 60px;">Post
    </button>
</div>

<input type="hidden" name="isPrivate" value="">
<input type="hidden" name="isAnonymous" value="">