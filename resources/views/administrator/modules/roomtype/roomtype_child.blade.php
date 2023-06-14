@foreach ($data as $item)
<tr>
    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$space}} {{$item->name}}</strong></td>
    <td> {{$space}} {{ !empty($item->parent_id) ? $item->parent->name:'' }}</td>
    <td><span class="badge bg-label-primary me-1">{{$item->status}}</span></td>
    <td>
    <div class="dropdown">
        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
        <i class="bx bx-dots-vertical-rounded"></i>
        </button>
        <div class="dropdown-menu">
            <form method="post" class="delete_form" action="{{ route('admin.roomtype.destroy', $item->uuid) }}" id="studentForm_{{$item->id}}">
                {{ method_field('DELETE') }}
                {{  csrf_field() }}
                <a class="dropdown-item" href="{{route('admin.roomtype.edit', $item->uuid)}}"><i class="bx bx-edit-alt me-1"></i> Chỉnh sửa</a>
                <button class="dropdown-item" type="submit"><i class="bx bx-trash me-1"></i> Xóa</button>
            </form>
        </div>
    </div>
    </td>
</tr>    

@if($item->children->count() > 0)
    @include('administrator.modules.roomtype.roomtype_child', ['data' => $item->children ,'space' => '-- ']) 
@endif
@endforeach 