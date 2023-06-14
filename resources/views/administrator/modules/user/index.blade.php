@extends('administrator.master')
@section('title', 'Nhân sự')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Nhân sự</h4>
    @if(session()->has('nofitication'))
    <div class="alert alert-success alert-nofitication">
        <strong>{{ session()->get('success') }}</strong> {{ session()->get('nofitication') }}
    </div>
    @endif
    <!-- Basic Layout -->
    <div class="row">
        <div class="col-x">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Trang Nhân sự</h5>
            <small class="text-muted float-end"><a href="{{route('admin.user.create')}}">Thêm</a></small>
            </div>
            <div class="card">
                <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Hình ảnh</th>
                        <th>Họ và tên</th>
                        <th>Số điện thoại</th>
                        <th>Công việc</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($data as $item)
                        <tr>
                            <td>
                                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="" data-bs-original-title="Lilian Fuller">
                                    <img src="/upload/users/{{$item->image}}" alt="Avatar" class="rounded-circle">
                                    </li>
                                </ul>
                                </td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$item->full_name}}</strong></td>
                            <td>{{$item->phone}}</td>
                            <td>{{$item->roles->name}}</td>
                            
                            <td><span class="badge bg-label-primary me-1">{{$item->status}}</span></td>
                            <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <form method="post" class="delete_form" action="{{ route('admin.user.destroy', $item->uuid) }}" id="studentForm_{{$item->id}}">
                                        {{ method_field('DELETE') }}
                                        {{  csrf_field() }}
                                        <a class="dropdown-item" href="{{route('admin.user.edit', $item->uuid)}}"><i class="bx bx-edit-alt me-1"></i> Chỉnh sửa</a>
                                        <button class="dropdown-item" type="submit"><i class="bx bx-trash me-1"></i> Xóa</button>
                                    </form>
                                </div>
                            </div>
                            </td>
                        </tr>    
                        @endforeach
                    
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection