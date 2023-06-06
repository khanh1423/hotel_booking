<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administrator\User\UpdateRequest;
use App\Http\Requests\Administrator\User\StoreRequest;
use App\Repositories\Role\RoleRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private $view = 'administrator.modules.user.';
    private $route = 'admin.user.';
    protected $users;
    protected $roles;

    public function __construct(UserRepositoryInterface $userRep,
                                RoleRepositoryInterface $roleRep){
        $this->users = $userRep;
        $this->roles = $roleRep;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $data = $this->users->getAll();
        return view($this->view . 'index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->roles->getAll();
        return view($this->view . 'create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $data = $this->users->saveStore($request);

        return redirect()->route($this->route . 'index')
        ->with('success','Chúc mừng!')
        ->with('nofitication','Thêm nhân sự thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        $roles = $this->roles->getAll();
        $data = $this->users->getAllbyUUID($uuid)->first();

        return view($this->view . 'edit', compact('roles', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $uuid)
    {
        $checkPassword = $this->users->checkOldPassword($request, $uuid);
        
        if($checkPassword == false) {
            return redirect()->back()->with('error', 'Mật khẩu cũ không trùng khớp!');
        }else{
            $data = $this->users->saveUpdate($request, $uuid);
        }
        return redirect()->route($this->route . 'index')
        ->with('success','Chúc mừng!')
        ->with('nofitication','Sửa nhân sự thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        $data = $this->users->deletedbyUUID($uuid);
        return redirect()->route($this->route . 'index')
        ->with('success','Chúc mừng!')
        ->with('nofitication','Xóa nhân sự thành công!');
    }
}
