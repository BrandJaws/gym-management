@foreach($treasury as $row)
    <tr>
        <td>{{ $row->name}}</td>
        <td>{{ $row->cashFlow }}</td>
        <td>{{ $row->type }}</td>
        <td>{{ $row->value }}</td>
        <td>{{ $row->date }}</td>
        <td>{{ $row->purpose }}</td>
        <td>{{ $row->note }}</td>
        <td>{{ $row->gym_id }}</td>
        <td>
            <a href="{{url('/gym/treasury/edit', $row->id)}}">
                <i class="fa fa-edit"></i>
            </a> &nbsp; | &nbsp;
            <a href="#"><i class="fa fa-list"></i></a> &nbsp; &nbsp; | &nbsp;
            <a href="{{url('/gym/treasury/destroy', $row->id)}}"
               onclick="return confirm('Are you sure you want to delete it?')">
                <i class="fa fa-trash"></i>
            </a>
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="3" align="center">
        {!! $treasury->links() !!}
    </td>
</tr>
