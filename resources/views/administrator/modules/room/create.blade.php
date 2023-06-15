@extends('administrator.master')
@section('title', 'Tạo Phòng')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="{{route('admin.room.index')}}" class="text-muted">Phòng/</a></span> Thêm Phòng</h4>
    
    <div class="row">
        <div class="col-x">
            <form action="{{route('admin.room.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="nav-align-top mb-4">
                    <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-home" aria-controls="navs-top-home" aria-selected="true">
                        Thông tin
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-profile" aria-controls="navs-top-profile" aria-selected="false">
                        Thuộc tính
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-messages" aria-controls="navs-top-messages" aria-selected="false">
                        Hình ảnh
                        </button>
                    </li>
                    </ul>
                    <div class="tab-content">
                    <div class="tab-pane fade active show" id="navs-top-home" role="tabpanel">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="{{asset('upload/rooms/room-no.jpg')}}" id="previewImg" alt="room-image" class="d-block rounded" height="100" width="100" >
                            <div class="button-wrapper">
                            <label for="upload_image" id="test_click" class="btn btn-primary me-2 mb-4" tabindex="0">
                                <span class="d-none d-sm-block">Tải ảnh lên</span>
                                <i class="bx bx-upload d-block d-sm-none"></i>
                                <input type="file" id="upload_image" name="room_image" class="account-file-input image-preview" onchange="previewFile(this)" hidden="">
                            </label>
                            <p class="text-muted mb-0">Ảnh phòng JPG, GIF hoặc PNG.</p>
                            </div>
                        </div>
                        @if ($errors->has('room_image'))
                            <small class="text-danger form-text"><Table>{{$errors->first('room_image')}}</Table></small>
                        @endif
                        <br>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Tên Phòng</label>
                            <input type="text" class="form-control" name="room_name" value="{{ old('room_name') }}" id="basic-default-fullname" placeholder="ví dụ: Phòng có ban công chill chill,..." />
                            @if ($errors->has('room_name'))
                            <small class="text-danger form-text"><Table>{{$errors->first('room_name')}}</Table></small>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Giá Phòng</label>
                            <input type="text" class="form-control" name="room_price" value="{{ old('room_price') }}" placeholder="Giá phòng / ngày" />
                        </div>
                        <div class="md-3">
                            <label class="form-label" for="selectTypeOpt">Loại phòng</label>
                            <select id="selectTypeOpt" name="roomtype_id" class="form-select color-dropdown">
                                @foreach($roomtype as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div><br>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-message">Mô tả</label>
                            <textarea
                                id="basic-default-message"
                                class="form-control"
                                name="room_note"
                                value="{{ old('room_note') }}"
                                placeholder="ví dụ: Kiểm kê khách hàng trong tháng..."
                            ></textarea>
                            @if ($errors->has('room_note'))
                            <small class="text-danger form-text"><Table>{{$errors->first('room_note')}}</Table></small>
                            @endif
                        </div>
                        <div class="mb-3 col-md-6">
                            <input class="form-check-input" type="checkbox" name="room_status" checked>
                            <label class="form-check-label">Trạng thái</label>
                        </div>
                    </div>
                    
                    <div class="tab-pane fade" id="navs-top-profile" role="tabpanel">
                        <div class="row gx-3 gy-2 align-items-center" id="attributePlus">
                            <div class="col-md-3">
                            <label class="form-label" for="selectTypeOpt">Thuộc tính</label>
                            <select id="selectTypeOpt" name="attribute_id[]" class="form-select color-dropdown">
                                @foreach($attrbutes as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="col-md-3">
                            <label class="form-label" for="selectPlacement">Giá trị</label>
                            <input type="text" class="form-control" name="attribute_value[]"/>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label" for="showToastPlacement">&nbsp;</label>
                                <div class="card-body">
                                    <i class='bx bx-plus-circle text-primary' id="addAttribute" onclick="AddAttributes()"></i>
                                    <i class='bx bx-x-circle text-danger' id="removeAttribute" onclick="removeAttributes(this)"></i>
                                </div>

                            </div>
                        </div>
                    </div>
                    
                    <div class="tab-pane fade" id="navs-top-messages" role="tabpanel">
                        <div class="row gx-3 gy-2 align-items-center">
                            <div class="col-md-3">
                                <input type="file" name="images_room[]" multiple>
                                {{-- <img src="{{asset('upload/rooms/room-no.jpg')}}" class="d-block rounded" height="100" width="100" >
                                <img src="{{asset('upload/rooms/room-no.jpg')}}" class="d-block rounded" height="100" width="100" >
                                <img src="{{asset('upload/rooms/room-no.jpg')}}" class="d-block rounded" height="100" width="100" >
                                <img src="{{asset('upload/rooms/room-no.jpg')}}" class="d-block rounded" height="100" width="100" > --}}
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Thêm</button>
            </form>  
        </div>        
    </div>
    
    <!-- Basic Layout -->
    {{-- <div class="row">
        <div class="col-x">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Thêm Phòng</h5>
            </div>
            <div class="card-body">
            <form action="{{route('admin.room.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Tên Phòng</label>
                <input type="text" class="form-control" name="room_name" value="{{ old('room_name') }}" id="basic-default-fullname" placeholder="ví dụ: kế toán,..." />
                @if ($errors->has('room_name'))
                <small class="text-danger form-text"><Table>{{$errors->first('room_name')}}</Table></small>
                @endif
                </div>
                <div class="mb-3">
                <label class="form-label" for="basic-default-message">Mô tả</label>
                <textarea
                    id="basic-default-message"
                    class="form-control"
                    name="room_note"
                    value="{{ old('room_note') }}"
                    placeholder="ví dụ: Kiểm kê khách hàng trong tháng..."
                ></textarea>
                @if ($errors->has('room_note'))
                <small class="text-danger form-text"><Table>{{$errors->first('room_note')}}</Table></small>
                @endif
                </div>
                <button type="submit" class="btn btn-primary">Thêm</button>
            </form>
            </div>
        </div>
        </div>
    </div> --}}
</div>
@endsection