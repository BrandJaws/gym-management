<?php $i = 1; ?>
@foreach($member as $row)
    <tr>
        <th>{{$i}}</th>
        <td>{{ $row->salutation }} {{ $row->name}}</td>
        <td>{{ $row->phone }}</td>
        <td>{{ $row->source }}</td>
        <td>{{ $row->rating }}</td>
        <td>{{ $row->status }}</td>
        <td>{{ $row->memberType }}</td>
        <td>
            <a href="{{url('/gym/employee/edit', $row->id)}}" class="dropdown-toggle" id="dropdownMenuButton"
               data-toggle="dropdown">
                <i class="fa fa-edit"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                 style="transform: translate3d(912px, 221px, 0px)!important;">
                <a class="dropdown-item" href="{{url('/gym/member/archive/callScheduled', $row->id)}}"> <i
                        class="fa fa-phone-alt"></i> Call Scheduled</a>
                <a class="dropdown-item" href="{{url('/gym/member/edit', $row->id)}}"><i class="fa flaticon2-edit"></i>
                    Edit</a>
                <a class="dropdown-item" href="{{url('/gym/member/disabled', $row->id)}}"><i
                        class="fa flaticon2-delete"></i> Disabled</a>
            </div>
        </td>
        <?php  $i++; ?>
    </tr>
@endforeach
<tr>
    <td colspan="8" align="center">
        {{ $member->links() }}
    </td>
</tr>
