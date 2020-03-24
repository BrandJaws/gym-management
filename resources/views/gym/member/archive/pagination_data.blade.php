@if($breadcrumbs == "Failed Calls")
    <?php $i = 1; ?>
    @foreach($member as $row)
        <tr>
            <th>{{$i}}</th>
            <td>{{ $row->employee->name}}</td>
            <td>{{ $row->member->name }}</td>
            <td>{{ $row->scheduleDate }}</td>
            <td>{{ $row->transferStatus }}</td>
            <td>@if($row->transferEmployee != NULL) {{ $row->transferEmployee->name }} @else --- @endif</td>
            <td>@if($row->reScheduleDate != NULL) {{ $row->reScheduleDate }} @else --- @endif</td>
            <td>@if($row->remakrs != NULL) {{ $row->reScheduleDate }} @else --- @endif</td>
            <td>
                <a href="{{url('/gym/member/edit', $row->id)}}" class="dropdown-toggle" id="dropdownMenuButton"
                   data-toggle="dropdown">
                    <i class="fa flaticon2-graph"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                     style="transform: translate3d(912px, 221px, 0px)!important;">
                    <a class="dropdown-item" href="{{url('/gym/member/archive/forCall', $row->id)}}"> <i
                            class="fa flaticon2-phone"></i> For Call</a>
                    <a class="dropdown-item" href="{{url('/gym/member/archive/forDemo', $row->id)}}"><i
                            class="fa flaticon2-graphic-design"></i> For Demo</a>
                    <a class="dropdown-item" href="{{url('/gym/member/archive/transferLead', $row->id)}}"><i
                            class="fa flaticon2-delivery-truck"></i>Transfer Lead</a>
                    <a class="dropdown-item" href="#"><i
                            class="fa flaticon2-protection"></i>Purchase Product</a>
                    <a class="dropdown-item" href="{{url('/gym/member/guest/failedCalls', $row->id)}}"><i
                            class="fa flaticon2-edit"></i>
                        Edit</a>
                    <a class="dropdown-item" href="{{url('/gym/member/pipelineDisable', $row->id)}}"><i
                            class="fa flaticon2-delete"></i> Disabled</a>
                </div>
            </td>
        </tr>
        <?php  $i++; ?>
    @endforeach
    <tr>
        <td colspan="9" align="center">
            {{ $member->links() }}
        </td>
    </tr>
@else
    <?php $i = 1; ?>
    @foreach($member as $row)
        <tr>
            <th>{{$i}}</th>
            <td>{{ $row->name}}</td>
            <td>{{ $row->phone }}</td>
            <td>{{ $row->source }}</td>
            <td>{{ $row->address }}</td>
            <td>{{ $row->remarks }}</td>
            <td>
                <a href="{{url('/gym/member/edit', $row->id)}}" class="dropdown-toggle" id="dropdownMenuButton"
                   data-toggle="dropdown">
                    <i class="fa flaticon2-graph"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                     style="transform: translate3d(912px, 221px, 0px)!important;">
                    <a class="dropdown-item" href="{{url('/gym/member/archive/forCall', $row->id)}}"> <i
                            class="fa flaticon2-phone"></i> For Call</a>
                    <a class="dropdown-item" href="{{url('/gym/member/archive/forDemo', $row->id)}}"><i
                            class="fa flaticon2-graphic-design"></i> For Demo</a>
                    <a class="dropdown-item" href="{{url('/gym/member/archive/transferLead', $row->id)}}"><i
                            class="fa flaticon2-delivery-truck"></i>Transfer Lead</a>
                    <a class="dropdown-item" href="#"><i
                            class="fa flaticon2-protection"></i>Purchase Product</a>
                    <a class="dropdown-item" href="{{url('/gym/member/edit', $row->id)}}"><i
                            class="fa flaticon2-edit"></i>
                        Edit</a>
                    <a class="dropdown-item" href="{{url('/gym/member/disabled', $row->id)}}"><i
                            class="fa flaticon2-delete"></i> Disabled</a>
                </div>
            </td>
        </tr>
        <?php  $i++; ?>
    @endforeach
    <tr>
        <td colspan="7" align="center">
            {{ $member->links() }}
        </td>
    </tr>
@endif
