@extends('authentication.master')
@section('content')
<h4 class="mb-2">Chào mừng bạn đăng nhập! 👋</h4>
<p class="mb-4">Vui lòng đăng nhập tài khoản của bạn để tiếp tục!</p>
@if(session()->has('nofitication'))
<div class="alert alert-danger alert-nofitication">
    <strong>{{ session()->get('danger') }}</strong> {{ session()->get('nofitication') }}
</div>
@endif
<form id="formAuthentication" class="mb-3" action="{{route('auth.checkLogin')}}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input
        type="text"
        class="form-control"
        id="email"
        name="email"
        placeholder="Vui lòng nhập e-mail"
        autofocus
        />
        @if ($errors->has('email'))
        <small class="text-danger form-text"><Table>{{$errors->first('email')}}</Table></small>
        @endif
    </div>
    
    <div class="mb-3 form-password-toggle">
        <div class="d-flex justify-content-between">
        <label class="form-label" for="password">Mật khẩu</label>
        <a href="#">
            <small>Quên mật khẩu?</small>
        </a>
        </div>
        <div class="input-group input-group-merge">
        <input
            type="password"
            id="password"
            class="form-control"
            name="password"
            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
            aria-describedby="password"
        />
        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
        </div>
        @if ($errors->has('password'))
        <small class="text-danger form-text"><Table>{{$errors->first('password')}}</Table></small>
        @endif
    </div>
    <div class="mb-3">
        <div class="form-check">
        <input class="form-check-input" type="checkbox" id="remember-me" />
        <label class="form-check-label" for="remember-me"> Nhớ mật khẩu </label>
        </div>
    </div>
    <div class="mb-3">
        <button class="btn btn-primary d-grid w-100" type="submit">Đăng nhập</button>
    </div>
</form>

<p class="text-center">
<span>Bạn chưa có tài khoản?</span>
<a href="#">
    <span>Tạo tại khoản mới</span>
</a>
</p>
@endsection