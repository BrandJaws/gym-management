@if($breadcrumbs == "Failed Calls")
    <?php $i = 1; ?>
    @foreach($member as $row)
        <tr>
            <th>{{$i}}</th>
            <td>{{ $row->EmployeeName}}</td>
            <td>{{ $row->Member }}</td>
            <td>{{ $row->stage }}</td>
            <td>{{ $row->scheduleDate }}</td>
            <td>{{ $row->status }}</td>
            <td>{{ $row->transferStage }}</td>
            <td>@if($row->transferEmployee != NULL) {{ $row->transferEmployee->name }} @else --- @endif</td>
            <td>@if($row->reScheduleDate != NULL) {{ $row->reScheduleDate }} @else --- @endif</td>
            <td>{{ $row->reStatus }}</td>
            <td>
                <a href="{{url('/gym/member/edit', $row->id)}}" class="dropdown-toggle" id="dropdownMenuButton"
                   data-toggle="dropdown">
                    <i class="fa fa-braille"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                     style="transform: translate3d(912px, 221px, 0px)!important;">
                    <a class="dropdown-item" href="{{url('/gym/member/archive/callScheduled', $row->id)}}"> <i
                            class="fa fa-phone-alt"></i> Call Scheduled</a>
                    <a class="dropdown-item" href="{{url('/gym/member/archive/appointmentScheduled', $row->id)}}"><i
                            class="fa fa-file-signature"></i> Appointment Scheduled</a>
                    <a class="dropdown-item" href="{{url('/gym/member/archive/presentationScheduled', $row->id)}}"><i
                            class="fa fa-book-open"></i>Presentation Scheduled</a>
                    <a class="dropdown-item" href="{{url('/gym/member/archive/contractSent', $row->id)}}"><i
                            class="fa fa-file-contract"></i>Contract Sent</a>
                    <a class="dropdown-item" href="{{url('/gym/member/archive/qualifiedToBuy', $row->id)}}"><i
                            class="fa fa-user-check"></i>Qualified To Buy</a>
                    <a class="dropdown-item" href="{{url('/gym/member/archive/closedWon', $row->id)}}"><i
                            class="fa fa-check"></i>Closed Won</a>
                    <a class="dropdown-item" href="{{url('/gym/member/archive/closedLost', $row->id)}}"><i
                            class="fa fa-user-times"></i>Closed Lost</a>
                    <a class="dropdown-item" href="{{url('/gym/member/archive/transferStage', $row->id)}}"><i
                            class="fa fa-user-times"></i>Re-Scheduled Stage</a>
                </div>
                |
                <a href="{{url('/gym/member/edit', $row->id)}}"><i class="fa fa-edit"></i></a> |
                <a href="{{url('/gym/member/disabled', $row->id)}}"><i class="fa flaticon2-delete"></i> </a>
            </td>
        </tr>
        <?php  $i++; ?>
    @endforeach
    <tr>
        <td colspan="11" align="center">
            {{ $member->links() }}
        </td>
    </tr>
@else
    <?php $i = 1; ?>
    @foreach($member as $row)
        <tr>
            <th>{{$i}}</th>
            <td>{{ $row->salutation }} {{ $row->name}}</td>
            <td>{{ $row->phone }}</td>
            <td>{{ $row->source }}</td>
            <td>{{ $row->rating }}</td>
            <td>{{ $row->type }}</td>
            <td>@if($row->status != NULL) {{ $row->status }} @else --- @endif</td>
            <td>
                <a href="{{url('/gym/member/edit', $row->id)}}" class="dropdown-toggle" id="dropdownMenuButton"
                   data-toggle="dropdown">
                    <i class="fa fa-braille"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                     style="transform: translate3d(912px, 221px, 0px)!important;">
                    <a class="dropdown-item" href="{{url('/gym/member/archive/callScheduled', $row->id)}}"> <i
                            class="fa fa-phone-alt"></i> Call Scheduled</a>
                    <a class="dropdown-item" href="{{url('/gym/member/archive/appointmentScheduled', $row->id)}}"><i
                            class="fa fa-file-signature"></i> Appointment Scheduled</a>
                    <a class="dropdown-item" href="{{url('/gym/member/archive/presentationScheduled', $row->id)}}"><i
                            class="fa fa-book-open"></i>Presentation Scheduled</a>
                    <a class="dropdown-item" href="{{url('/gym/member/archive/contractSent', $row->id)}}"><i
                            class="fa fa-file-contract"></i>Contract Sent</a>
                    <a class="dropdown-item" href="{{url('/gym/member/archive/qualifiedToBuy', $row->id)}}"><i
                            class="fa fa-user-check"></i>Qualified To Buy</a>
                    <a class="dropdown-item" href="{{url('/gym/member/archive/closedWon', $row->id)}}"><i
                            class="fa fa-check"></i>Closed Won</a>
                    <a class="dropdown-item" href="{{url('/gym/member/archive/closedLost', $row->id)}}"><i
                            class="fa fa-user-times"></i>Closed Lost</a>
                    <a class="dropdown-item" href="{{url('/gym/member/archive/reScheduledStage', $row->id)}}"><i
                            class="fa fa-user-times"></i>Re-Scheduled Stage</a>
                </div>
                |
                <a href="{{url('/gym/member/edit', $row->id)}}"><i class="fa fa-edit"></i></a> |
                <a href="{{url('/gym/member/disabled', $row->id)}}"><i class="fa flaticon2-delete"></i> </a>
            </td>
        </tr>
        <?php  $i++; ?>
    @endforeach
    <tr>
        <td colspan="8" align="center">
            {{ $member->links() }}
        </td>
    </tr>
@endif
