@foreach($trainer as $row)
    <tr>
        <td>{{ $row->firstName}}</td>
        <td>{{ $row->lastName }}</td>
        <td>{{ $row->gender }}</td>
        <td>{{ $row->email }}</td>
        <td>{{ $row->phone }}</td>
        <td>{{ $row->qualification }}</td>
        <td>{{ $row->specialities }}</td>
        <td>{{ $row->status }}</td>
        <td>
            <a href="{{url('/gym/trainer/edit', $row->id)}}">
                <i class="fa fa-edit"></i>
            </a> &nbsp; | &nbsp;
            <a href="{{url('/gym/trainer/destroy', $row->id)}}"
               onclick="return confirm('Are you sure you want to delete it?')">
                <i class="fa fa-trash"></i>
            </a>
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="9" align="center">
        {!! $trainer->links() !!}
    </td>
</tr>
