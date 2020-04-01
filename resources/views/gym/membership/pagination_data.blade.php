@foreach($membership as $row)
    <tr>
        <td>{{ $row->name}}</td>
        <td>{{ $row->duration }} Days</td>
        <td>{{ $row->amount }}</td>
        <td>{{ $row->monthlyFee }}</td>
        <td>{{ $row->detail }}</td>
        <td>
            <a href="{{url('gym/membership/edit', $row->id)}}">
                <i class="fa fa-edit"></i>
            </a> &nbsp; | &nbsp;
            <a href="{{url('gym/membership/destroy', $row->id)}}"
               onclick="return confirm('Are you sure you want to delete it?')">
                <i class="fa fa-trash"></i>
            </a>
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="7" align="center">
        {!! $membership->links() !!}
    </td>
</tr>
