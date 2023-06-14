@extends('administrator.master')
@section('title', 'Sửa thuộc tính')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="{{route('admin.attribute.index')}}" class="text-muted">Thuộc tính/</a></span> Thêm thuộc tính</h4>

    <!-- Basic Layout -->
    <div class="row">
        <div class="col-x">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Sửa thuộc tính</h5>
            {{-- <small class="text-muted float-end">Default label</small> --}}
            </div>
            <div class="card-body">
            <form action="{{route('admin.attribute.update', $data->uuid)}}" method="POST">
                @csrf @method('PUT')
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Tên thuộc tính</label>
                <input type="text" class="form-control" name="attribute_name" value="{{ $data->name }}" id="basic-default-fullname" placeholder="ví dụ: phòng ngủ, ban công,..." />
                @if ($errors->has('attribute_name'))
                <small class="text-danger form-text"><Table>{{$errors->first('attribute_name')}}</Table></small>
                @endif
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Thuộc tính cha</label>
                    <select id="role" name="parent_id" class="select2 form-select">
                        {{-- <option>ROOT</option> --}}
                        @foreach ($attribute as $item)
                            <option value="{{$item->id}}" {{$data->parent_id == $item->id ? 'selected' : false}}>{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
            </form>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection