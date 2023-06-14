@foreach ( $attributes as $key => $item )
<tr>
    <td>{{$loop->iteration}}</td>
    
    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$space}}&ensp;{{$item->name}}</strong></td>
    
    <td><span class="badge bg-label-primary me-1">{{$item->status}}</span></td>
    <td>
    <div class="dropdown">
        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
        <i class="bx bx-dots-vertical-rounded"></i>
        </button>
        <div class="dropdown-menu">
        <form method="post" class="delete_form" action="{{ route('admin.attribute.destroy', $item->uuid) }}" id="studentForm_{{$item->id}}">
            {{ method_field('DELETE') }}
            {{  csrf_field() }}
            <a class="dropdown-item" href="{{route('admin.attribute.edit', $item->uuid)}}"><i class="bx bx-edit-alt me-1"></i> Chỉnh sửa</a>
            <button class="dropdown-item" type="submit"><i class="bx bx-trash me-1"></i> Xóa</button>
        </form>
        </div>
    </div>
    </td>
</tr>

{{-- @if ($key > 0)
@php
    $previousCategory = $attributes[$key - 1];
    var_dump($previousCategory->name);
    @endphp
@endif --}}


{{-- @if($parent_id == $item->parent_id) {
    @php
        $space .='--';
    @endphp
}@else{
    @php
        $space ='a';
    @endphp
}@endif --}}
@if($item->children->count() > 0)
@if ($parent_id == $item->parent_id)
    @php
        $space ='--';
    @endphp
@else
    @php
        $space .='--';
    @endphp
@endif
    @include('administrator.modules.attribute.attribute_child', ['attributes' => $item->children, 'parent_id' => $item->parent_id ,'space' => $space]) 
    @php
        $space ='';
    @endphp
@endif
@endforeach 