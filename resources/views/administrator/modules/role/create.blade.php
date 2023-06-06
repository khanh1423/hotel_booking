@extends('administrator.master')
@section('title', 'Tạo công việc')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="{{route('admin.role.index')}}" class="text-muted">Công việc/</a></span> Thêm công việc</h4>

    <!-- Basic Layout -->
    <div class="row">
        <div class="col-x">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Thêm công việc</h5>
            {{-- <small class="text-muted float-end">Default label</small> --}}
            </div>
            <div class="card-body">
            <form action="{{route('admin.role.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Tên công việc</label>
                <input type="text" class="form-control" name="role_name" value="{{ old('role_name') }}" id="basic-default-fullname" placeholder="ví dụ: kế toán,..." />
                @if ($errors->has('role_name'))
                <small class="text-danger form-text"><Table>{{$errors->first('role_name')}}</Table></small>
                @endif
                </div>
                <div class="mb-3">
                <label class="form-label" for="basic-default-message">Mô tả</label>
                <textarea
                    id="basic-default-message"
                    class="form-control"
                    name="role_note"
                    value="{{ old('role_note') }}"
                    placeholder="ví dụ: Kiểm kê khách hàng trong tháng..."
                ></textarea>
                @if ($errors->has('role_note'))
                <small class="text-danger form-text"><Table>{{$errors->first('role_note')}}</Table></small>
                @endif
                </div>
                <button type="submit" class="btn btn-primary">Thêm</button>
            </form>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection