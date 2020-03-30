@foreach($treasury as $row)
    <tr>
        <td>{{ $row->employee->name}}</td>
        <td>{{ $row->cashFlow }}</td>
        <td>{{ $row->type }}</td>
        <td>{{ $row->value }}</td>
        <td>{{ $row->date }}</td>
        <td>{{ $row->purpose }}</td>
        <td>{{ $row->note }}</td>
        <td>
            <a href="{{url('/gym/treasury/edit', $row->id)}}">
                <i class="fa fa-edit"></i>
            </a> &nbsp; | &nbsp;
            <a href="{{url('/gym/treasury/destroy', $row->id)}}"
               onclick="return confirm('Are you sure you want to delete it?')">
                <i class="fa fa-trash"></i>
            </a>
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="8" align="center">
        {!! $treasury->links() !!}
    </td>
</tr>
