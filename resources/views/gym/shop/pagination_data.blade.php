<?php $i = 1; ?>
@foreach($shopProduct as $row)
    <tr>
        <th>{{$i}}</th>
        <td>{{ $row->category->name }}</td>
        <td>{{ $row->name }}</td>
        <td>{{ $row->description }}</td>
        <td>{{ $row->price }}</td>
        <td>{{ $row->in_stock }}</td>
        <td>{{ $row->visible }}</td>
        <td>
            <a href="{{url('/gym/shop/edit', $row->id)}}">
                <i class="fa fa-edit"></i>
            </a> &nbsp; | &nbsp;
            <a href="{{url('/gym/shop/destroy', $row->id)}}"
               onclick="return confirm('Are you sure you want to delete it?')">
                <i class="fa fa-trash"></i>
            </a>
        </td>
    </tr>
    <?php  $i++; ?>
@endforeach
<tr>
    <td colspan="8" align="center">
        {!! $shopProduct->links() !!}
    </td>
</tr>
