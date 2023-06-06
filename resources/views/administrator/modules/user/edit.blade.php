@extends('administrator.master')
@section('title', 'Sửa nhân sự')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="{{route('admin.user.index')}}" class="text-muted">Nhân sự/</a></span> Thêm nhân sự</h4>

    <!-- Basic Layout -->
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Sửa nhân sự</h5>
                {{-- <small class="text-muted float-end">Default label</small> --}}
                </div>
                <div class="card-body">
                    <form action="{{route('admin.user.update', $data->uuid)}}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="/upload/users/{{$data->image}}" id="previewImg" alt="user-avatar" class="d-block rounded" height="100" width="100" >
                            <div class="button-wrapper">
                              <label for="upload_image" id="test_click" class="btn btn-primary me-2 mb-4" tabindex="0">
                                <span class="d-none d-sm-block">Tải ảnh lên</span>
                                <i class="bx bx-upload d-block d-sm-none"></i>
                                <input type="file" id="upload_image" name="user_image" class="account-file-input image-preview" onchange="previewFile(this)" hidden="">
                              </label>
                              <p class="text-muted mb-0">Ảnh chân dung JPG, GIF hoặc PNG.</p>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0"><br>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="basic-default-fullname">Tên nhân viên</label>
                            <input type="text" class="form-control" name="user_name" value="{{$data->full_name}}" id="basic-default-fullname" placeholder="Nhập họ tên nhân viên" />
                            @if ($errors->has('user_name'))
                            <small class="text-danger form-text"><Table>{{$errors->first('user_name')}}</Table></small>
                            @endif
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="user_email" value="{{$data->email}}" placeholder="Nhập Email" />
                            @if ($errors->has('user_email'))
                            <small class="text-danger form-text"><Table>{{$errors->first('user_email')}}</Table></small>
                            @endif
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" name="user_phone" value="{{$data->phone}}" placeholder="Nhập số điện thoại" />
                            @if ($errors->has('user_phone'))
                            <small class="text-danger form-text"><Table>{{$errors->first('user_phone')}}</Table></small>
                            @endif
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Mật khẩu Cũ</label>
                            <input type="password" class="form-control" name="user_old_password" />
                            @if(session()->has('error'))
                            <small class="text-danger form-text"><Table>{{ session()->get('error') }}</Table></small>
                            @endif
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Giới tính</label><br>
                            <input name="user_gender" class="form-check-input"  type="radio" value="Nam" {{$data->gender == "Nam" ? "checked" : false}}>
                            <label class="form-check-label"> Nam </label>&ensp;/&ensp;
                            <input name="user_gender" class="form-check-input"  type="radio" value="Nữ" {{$data->gender == "Nữ" ? "checked" : false}}>
                            <label class="form-check-label"> Nữ </label>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Mật khẩu Mới</label>
                            <input type="password" class="form-control" name="user_password" />
                            @if ($errors->has('user_password'))
                            <small class="text-danger form-text"><Table>{{$errors->first('user_password')}}</Table></small>
                            @endif
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" name="user_address" value="{{$data->address}}" placeholder="Nhập địa chỉ" />
                            @if ($errors->has('user_address'))
                            <small class="text-danger form-text"><Table>{{$errors->first('user_address')}}</Table></small>
                            @endif
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Xác thực mật khẩu</label>
                            <input type="password" class="form-control" name="user_confirm_password" />
                            @if ($errors->has('user_confirm_password'))
                            <small class="text-danger form-text"><Table>{{$errors->first('user_confirm_password')}}</Table></small>
                            @endif
                        </div>
                        <div class="mb-3 col-md-6">
                            <input class="form-check-input" type="checkbox" name="user_status" {{$data->status == 'on' ? 'checked' : false}}>
                            <label class="form-check-label">Trạng thái</label>
                        </div>
                        <div class="mb-3 col-md-6">
                        <label for="role" class="form-label">Công việc</label>
                        <select id="role" name="user_role" class="select2 form-select">
                            <option>Chọn công việc</option>
                            @foreach ($roles as $item)
                                <option value="{{$item->id}}" {{$data->role_id == $item->id ? "selected" : false}}>{{$item->name}}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="mb-3 col-md-6">
                        </div>
                        <div class="mb-3 col-md-6">
                            <hr>
                            <label for="role" class="form-label">Quyền quản trị</label>
                            <select id="role" name="user_level" class="select2 form-select">
                                <option value="1" {{$data->level == 1 ? "selected" : false}}>Administrator</option>
                                <option value="2" {{$data->level == 2 ? "selected" : false}}>Quản trị viên</option>
                                <option value="3" {{$data->level == 3 ? "selected" : false}}>Nhân viên</option>
                                <option value="4" {{$data->level == 4 ? "selected" : false}}>Khách hàng</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2">Lưu thông tin</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
