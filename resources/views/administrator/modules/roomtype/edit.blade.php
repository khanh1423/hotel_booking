@extends('administrator.master')
@section('title', 'Sửa loại phòng')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="{{route('admin.roomtype.index')}}" class="text-muted">Loại phòng/</a></span> Thêm loại phòng</h4>

    <!-- Basic Layout -->
    <div class="row">
        <div class="col-x">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Sửa loại phòng</h5>
            {{-- <small class="text-muted float-end">Default label</small> --}}
            </div>
            <div class="card-body">
            <form action="{{route('admin.roomtype.update', $data->uuid)}}" method="POST">
                @csrf @method('PUT')
                {{-- <div class="row"> --}}
                    <div class="mb-3 col-md-6">
                    <label class="form-label" for="basic-default-fullname">Tên loại phòng</label>
                    <input type="text" class="form-control" name="roomtype_name" value="{{ $data->name }}" id="basic-default-fullname" placeholder="ví dụ: phòng tổng thống,..." />
                    @if ($errors->has('roomtype_name'))
                    <small class="text-danger form-text"><Table>{{$errors->first('roomtype_name')}}</Table></small>
                    @endif
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="basic-default-fullname">Thuộc loại phòng</label>
                        <select id="role" name="roomtype_parent_id" class="select2 form-select">
                            <option value="1">ROOT</option>
                            @foreach ($roomtype as $item)
                                <option value="{{$item->id}}" {{$data->parent_id == $item->id ? 'selected' : false}}>{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 col-md-6">
                    <label class="form-label" for="basic-default-message">Mô tả</label>
                    <textarea
                        id="basic-default-message"
                        class="form-control"
                        name="roomtype_note"
                        value="{{ old('roomtype_note') }}"
                        placeholder="ví dụ: Chất lượng đạt chuẩn quốc gia..."
                    >{{$data->description}}</textarea>
                    @if ($errors->has('roomtype_note'))
                    <small class="text-danger form-text"><Table>{{$errors->first('roomtype_note')}}</Table></small>
                    @endif
                    </div>
                {{-- </div> --}}
                <button type="submit" class="btn btn-primary">Sửa</button>
            </form>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection