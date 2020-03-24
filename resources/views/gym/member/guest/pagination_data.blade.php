<?php $i = 1; ?>
@foreach($data as $row)
    <tr>
        <th>{{$i}}</th>
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
                @if( $breadcrumbs == "Preview Calls" )
                    <a class="dropdown-item" href="{{url('/gym/member/guest/previewCalls', $row->id)}}"><i
                            class="fa flaticon2-edit"></i>
                        Edit</a>
                @elseif($breadcrumbs == "Transfer Calls")
                    <a class="dropdown-item" href="{{url('/gym/member/guest/transferCalls', $row->id)}}"><i
                            class="fa flaticon2-edit"></i>
                        Edit</a>
                @elseif($breadcrumbs == "Preivew Appointments")
                    <a class="dropdown-item" href="{{url('/gym/member/guest/preivewAppointments', $row->id)}}"><i
                            class="fa flaticon2-edit"></i>
                        Edit</a>
                @endif
                <a class="dropdown-item" href="{{url('/gym/member/pipelineDisable', $row->id)}}"><i
                            class="fa flaticon2-delete"></i> Disabled</a>
            </div>
        </td>
        <?php  $i++; ?>
    </tr>
@endforeach
<tr>
    <td colspan="7" align="center">
        {{ $data->links() }}
    </td>
</tr>
