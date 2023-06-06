<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Authentication\Login\CheckLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $view = 'authentication.modules.';

    public function formLogin(){
        return view($this->view . 'login');
    }

    public function checkLogin(CheckLoginRequest $request){
        // $Checklevel = array('level' => '1', 'level' => '2', 'level' => '3');
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 'on'])){
            return redirect()->route('admin.index');
        } else {
            return redirect()->route('auth.formLogin')
            ->with('danger', 'Rất tiếc,')
            ->with('nofitication', 'Tài khoản hoặc mật khẩu chưa chính xác, vui lòng nhập lại !');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('auth.formLogin');
    }
}
