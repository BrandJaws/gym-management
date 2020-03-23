@foreach($data as $row)
    <tr>
        <td>{{ $row->employee->name }}</td>
        <td>{{ $row->member->name }}</td>
        <td>{{ $row->scheduleDate }}</td>
        <td>{{ $row->transferStatus }}</td>
        <td>@if($row->transferEmployee != NULL) {{ $row->transferEmployee->name }} @else --- @endif</td>
        <td>@if($row->reScheduleDate != NULL) {{ $row->reScheduleDate }} @else --- @endif</td>
        <td>
            <a href="{{url('/gym/member/edit', $row->id)}}" class="dropdown-toggle" id="dropdownMenuButton"
               data-toggle="dropdown">
                <i class="fa flaticon2-graph"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                 style="transform: translate3d(912px, 221px, 0px)!important;">
                <a class="dropdown-item" href="{{url('/gym/member/edit', $row->id)}}"><i class="fa flaticon2-edit"></i>
                    Edit</a>
                <a class="dropdown-item" href="{{url('/gym/member/disabled', $row->id)}}"><i
                        class="fa flaticon2-delete"></i> Disabled</a>
            </div>
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="7" align="center">
        {{ $data->links() }}
    </td>
</tr>
