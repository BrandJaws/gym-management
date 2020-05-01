<?php $i = 1; ?>
@foreach($member as $row)
    <tr>
        <th>{{$i}}</th>
        <td>{{ $row->EmployeeName }}</td>
        <td>{{ $row->Member }}</td>
        <td>{{ $row->stage }}</td>
        <td>{{ $row->scheduleDate }}</td>
        <td>{{ $row->transferStage }}</td>
        <td>@if($row->transferEmployee != NULL) {{ $row->transferEmployee->name }} @else --- @endif</td>
        <td>@if($row->reScheduleDate != NULL) {{ $row->reScheduleDate }} @else --- @endif</td>
        <td>
            <a href="{{url('/gym/member/edit', $row->id)}}" class="dropdown-toggle" id="dropdownMenuButton"
               data-toggle="dropdown">
                <i class="fa flaticon2-graph"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                 style="transform: translate3d(912px, 221px, 0px)!important;">
                <a class="dropdown-item" href="{{url('/gym/member/guests', $row->id)}}"><i
                        class="fa flaticon2-edit"></i>Edit</a>
                <a class="dropdown-item" href="{{url('/gym/member/pipelineDisable', $row->id)}}"><i
                        class="fa flaticon2-delete"></i> Disabled</a>
            </div>
        </td>
        <?php  $i++; ?>
    </tr>
@endforeach
<tr>
    <td colspan="9" align="center">
        {{ $member->links() }}
    </td>
</tr>
