@foreach($gym as $row)
    <tr>
        <td>{{ $row->name}}</td>
        <td>{{ $row->city }}</td>
        <td>{{ $row->state_id }}</td>
        <td>{{ $row->address }}</td>
        <td>{{ $row->status }}</td>
        <td>
            <a href="#" ><i class="fa fa-edit"></i></a> &nbsp; | &nbsp;
            <a href="#" ><i class="fa fa-list"></i></a> &nbsp; | &nbsp;
            <a href="#" ><i class="fa fa-trash"></i></a>
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="3" align="center">
        {!! $gym->links() !!}
    </td>
</tr>
