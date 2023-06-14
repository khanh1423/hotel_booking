@if (!empty($dataa))

@foreach ( $dataa as $item)
    <tr>
        <td>{{$loop->iteration}}</td>
        
        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$item->name}}</strong></td>
        
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
                <a class="dropdown-item" href="{{route('admin.attribute.edit', $item->uuid)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                <button class="dropdown-item" type="submit"><i class="bx bx-trash me-1"></i> Delete</button>
            </form>
            </div>
        </div>
        </td>
    </tr>
@endforeach
@endif
