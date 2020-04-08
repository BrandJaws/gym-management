@foreach($training as $row)
    <tr>
        <td>{{ $row->name }}</td>
        <td>{{ $row->trainer->firstName}}</td>
        <td>{{ $row->seats }}</td>
        <td>{{ $row->sessions }}</td>
        <td>{{ $row->price }}</td>
        <td>{{ $row->startDate }}</td>
        <td>{{ $row->endDate }}</td>
        <td>{{ $row->status }}</td>
        <td>
            <a href="{{url('/gym/training/edit', $row->id)}}">
                <i class="fa fa-edit"></i>
            </a> &nbsp; | &nbsp;
            <a href="{{url('/gym/training/destroy', $row->id)}}"
               onclick="return confirm('Are you sure you want to delete it?')">
                <i class="fa fa-trash"></i>
            </a>
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="9" align="center">
        {!! $training->links() !!}
    </td>
</tr>
