<?php $i = 1; ?>
@foreach($gymServices as $row)
    <tr>
        <th>{{$i}}</th>
        <td>{{ $row->name}}</td>
        <td>{{ $row->code }}</td>
        <td>{{ $row->fee }}</td>
        <td>
            @if($row->status == "In-Active")
                <span class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill">{{ $row->status }}</span>
            @else
                <span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill">{{ $row->status }}</span>
            @endif
        </td>
        <td>
            <a href="{{url('gym/service/edit', $row->id)}}">
                <i class="fa fa-edit"></i>
            </a> &nbsp; | &nbsp;
            <a href="{{url('gym/service/destroy', $row->id)}}"
               onclick="return confirm('Are you sure you want to delete it?')">
                <i class="fa fa-trash"></i>
            </a>
        </td>
        <?php  $i++; ?>
    </tr>
@endforeach
<tr>
    <td colspan="6" align="center">
        {!! $gymServices->links() !!}
    </td>
</tr>
