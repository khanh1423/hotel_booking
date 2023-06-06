@extends('administrator.master')
@section('title', 'Tạo thuộc tính')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="{{route('admin.attribute.index')}}" class="text-muted">Thuộc tính/</a></span> Thêm thuộc tính</h4>

    <!-- Basic Layout -->
    <div class="row">
        <div class="col-x">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Thêm thuộc tính</h5>
            {{-- <small class="text-muted float-end">Default label</small> --}}
            </div>
            <div class="card-body">
            <form action="{{route('admin.attribute.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Tên thuộc tính</label>
                <input type="text" class="form-control" name="attribute_name" value="{{ old('attribute_name') }}" id="basic-default-fullname" placeholder="ví dụ: phòng ngủ, ban công,..." />
                @if ($errors->has('attribute_name'))
                <small class="text-danger form-text"><Table>{{$errors->first('attribute_name')}}</Table></small>
                @endif
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Thuộc tính cha</label>
                    <select id="role" name="user_role" class="select2 form-select">
                        <option>ROOT</option>
                        
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Thêm</button>
            </form>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection