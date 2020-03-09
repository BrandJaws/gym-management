@foreach($employee as $row)
    <tr>
        <td>{{ $row->code}}</td>
        <td>{{ $row->name }}</td>
        <td>{{ $row->gender }}</td>
        <td>{{ $row->email }}</td>
        <td>{{ $row->cnic }}</td>
        <td>{{ $row->phone }}</td>
        <td>
            <a href="#" ><i class="fa fa-edit"></i></a> &nbsp; | &nbsp;
            <a href="#" ><i class="fa fa-list"></i></a> &nbsp; | &nbsp;
            <a href="#" ><i class="fa fa-trash"></i></a>
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="3" align="center">
        {!! $employee->links() !!}
    </td>
</tr>
