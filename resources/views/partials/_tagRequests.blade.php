<table>
    @forelse($tags as $tag)
        {!! Form::open(['class' => 'form-horizontal', 'method' => 'POST', 'action' =>
        ['TagController@store']])!!}
        <input type="hidden" name="requested_tag" value={{$tag->id}}>
        <tr>
            <td class="tags">
                <div class="list-group tags">
                    {{$tag->tag}}
                </div>
            </td>
            <td>
                <input type="submit" class="btn btn-danger" style="width: 120px" value="Reject" name="submit"/>

            </td>

            <td>
                    <input type="submit" class="btn btn-success" style="width: 120px" value="Accept" name="submit"/>

            </td>
        </tr>
        {!! Form::close() !!}

        @empty
        <h4> No requests Found</h4>
    @endforelse
</table>