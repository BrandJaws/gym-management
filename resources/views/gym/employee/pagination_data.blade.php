@foreach($employee as $row)
    <tr>
        <td>{{ $row->name}}</td>
        <td>{{ $row->email }}</td>
        <td>{{ $row->gender }}</td>
        <td>{{ $row->phone }}</td>
        <td>{{ $row->timeIn }} | {{ $row->timeOut }}</td>
        <td>
            <a href="{{url('/gym/employee/edit', $row->id)}}">
                <i class="fa fa-edit"></i>
            </a> &nbsp; | &nbsp;
            <a href="{{url('/gym/employee/destroy', $row->id)}}"
               onclick="return confirm('Are you sure you want to delete it?')">
                <i class="fa fa-trash"></i>
            </a>
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="6" align="center">
        {{ $employee->links() }}
    </td>
</tr>
