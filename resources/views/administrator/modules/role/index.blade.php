@extends('administrator.master')
@section('title', 'Công việc')
@section('content') 
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Công việc</h4>
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
            <h5 class="mb-0">Trang công việc</h5>
            <small class="text-muted float-end"><a href="{{route('admin.role.create')}}">Thêm</a></small>
            </div>
            <!-- Basic Bootstrap Table -->
            <div class="card">
                <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Thứ tự</th>
                        <th>Tên công việc</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    
                        @foreach ($data as $item)
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
                                <form method="post" class="delete_form" action="{{ route('admin.role.destroy', $item->uuid) }}" id="studentForm_{{$item->id}}">
                                    {{ method_field('DELETE') }}
                                    {{  csrf_field() }}
                                    <a class="dropdown-item" href="{{route('admin.role.edit', $item->uuid)}}"><i class="bx bx-edit-alt me-1"></i> Chỉnh sửa</a>
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
            <!--/ Basic Bootstrap Table -->
        </div>
        </div>
    </div>
</div>
@endsection