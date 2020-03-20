@foreach($member as $row)
    <tr>
        <td>{{ $row->name}}</td>
        <td>{{ $row->phone }}</td>
        <td>{{ $row->source }}</td>
        <td>{{ $row->address }}</td>
        <td>{{ $row->remarks }}</td>
        <td>
            <a href="{{url('/gym/employee/edit', $row->id)}}" class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown">
                <i class="fa fa-edit"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="transform: translate3d(912px, 221px, 0px)!important;">
                <a class="dropdown-item" href="#"> <i class="fa flaticon2-phone"></i> For Call</a>
                <a class="dropdown-item" href="#"><i class="fa flaticon2-graphic-design"></i> For Demo</a>
                <a class="dropdown-item" href="{{url('/gym/member/edit', $row->id)}}"><i class="fa flaticon2-edit"></i> Edit</a>
                <a class="dropdown-item" href="#"><i class="fa flaticon2-edit"></i> Detail</a>
                <a class="dropdown-item" href="{{url('/gym/member/disabled', $row->id)}}"><i class="fa flaticon2-delete"></i> Disabled</a>
            </div>
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="3" align="center">
        {{ $member->links() }}
    </td>
</tr>
