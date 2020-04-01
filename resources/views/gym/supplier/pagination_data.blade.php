@foreach($supplier as $row)
    <tr>
        <td>{{ $row->name}}</td>
        <td>{{ $row->email }}</td>
        <td>{{ $row->phone }}</td>
        <td>{{ $row->status }}</td>
        <td>
            <a href="{{url('/gym/supplier/edit', $row->id)}}">
                <i class="fa fa-edit"></i>
            </a> &nbsp; | &nbsp;
            <a href="{{url('/gym/supplier/destroy', $row->id)}}"
               onclick="return confirm('Are you sure you want to delete it?')">
                <i class="fa fa-trash"></i>
            </a>
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="6" align="center">
        {!! $supplier->links() !!}
    </td>
</tr>
