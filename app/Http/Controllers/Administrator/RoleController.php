<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administrator\Role\StoreRequest;
use App\Http\Requests\Administrator\Role\UpdateRequest;
use App\Repositories\Role\RoleRepositoryInterface;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    private $view = 'administrator.modules.role.';
    private $route = 'admin.role.';
    protected $roles;

    public function __construct(RoleRepositoryInterface $roleRepositoryInterface){
        $this->roles = $roleRepositoryInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->roles->getAll();
        return view($this->view . 'index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->view . 'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $this->roles->saveStore($request);

        return redirect()->route($this->route . 'index')
        ->with('success','Chúc mừng!')
        ->with('nofitication','Thêm công việc thành công!');
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
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        $data = $this->roles->getAllbyUUID($uuid)->first();
        
        return view($this->view . 'edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $uuid)
    {
        $data = $this->roles->saveUpdate($request, $uuid);
        
        return redirect()->route($this->route . 'index')
        ->with('success','Chúc mừng!')
        ->with('nofitication','Sửa công việc thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        $this->roles->deletedbyUUID($uuid);

        return redirect()->route($this->route . 'index')
        ->with('success','Chúc mừng!')
        ->with('nofitication','Xóa công việc thành công!');
    }
}
