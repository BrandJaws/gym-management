@foreach($employee as $row)
    <tr>
        <td>{{ $row->name}}</td>
        <td>{{ $row->email }}</td>
        <td>{{ $row->code }}</td>
        <td>{{ $row->time_in }}</td>
        <td>{{ $row->time_out }}</td>
        <td>{{ $row->salary }}</td>
        <td>{{ $row->gender }}</td>
        <td>{{ $row->cnic }}</td>
        <td>{{ $row->phone }}</td>
        <td>{{ $row->address }}</td>
        <td>{{ $row->gym_id }}</td>
        <td>
            <a href="{{url('gym/employee/edit', $row->id)}}">
                <i class="fa fa-edit"></i>
            </a> &nbsp; | &nbsp;
            <a href="#"><i class="fa fa-list"></i></a> &nbsp; &nbsp; | &nbsp;
            <a href="{{url('gym/employee/destroy', $row->id)}}"
               onclick="return confirm('Are you sure you want to delete it?')">
                <i class="fa fa-trash"></i>
            </a>
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="3" align="center">
        {{ $employee->links() }}
    </td>
</tr>
