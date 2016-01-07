<table>
    @foreach($tags as $tag)
        <tr>
            <td class="tags">
                <div class="list-group tags">
                    {{$tag->name}}
                </div>
            </td>
                <td>
                    <a href="">
                        <button type="button" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true" style="width: 100px;">
                                    Reject
                                </span>
                        </button>
                    </a>

                </td>

                <td>
                    <a href="">
                        <button type="button" class="btn btn-success" style="width: 120px">
                            <span>
                                Accept
                            </span>
                        </button>
                    </a>

                </td>
        </tr>
    @endforeach
</table>