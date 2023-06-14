@extends('administrator.master')
@section('title', 'Trang loại phòng')
@section('content') 
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Trang loại phòng</h4>
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
            <h5 class="mb-0">Trang loại phòng</h5>
            <small class="text-muted float-end"><a href="{{route('admin.roomtype.create')}}">Thêm</a></small>
            </div>
            <!-- Basic Bootstrap Table -->
            <div class="card">
                
                <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Tên loại phòng</th>
                        <th>Thuộc loại phòng</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                    </thead>
                    <tbody id = propertiesPage class="table-border-bottom-0">
                        @foreach ($data as $item)
                            @if($item->children->count() > 0)
                                @include('administrator.modules.roomtype.roomtype_child', ['data' => $item->children, 'space' => ''])  
                            @endif
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