<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Repositories\RoomType\RoomTypeRepositoryInterface;
use App\Http\Requests\Administrator\RoomType\StoreRequest;
use App\Http\Requests\Administrator\RoomType\UpdateRequest;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    private $view   = 'administrator.modules.roomtype.';
    private $route = 'admin.roomtype.';
    protected $roomtypes;

    public function __construct(RoomTypeRepositoryInterface $roomTypeRepositoryInterface){
        $this->roomtypes = $roomTypeRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->roomtypes->getchildren();
        return view($this->view . 'index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roomtype   = $this->roomtypes->getAll()->where('id', '!=', 1)->where('parent_id', 1);
        return view($this->view . 'create', compact('roomtype'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $this->roomtypes->saveStore($request);

        return redirect()->route($this->route . 'index')
        ->with('success','Chúc mừng!')
        ->with('nofitication','Thêm loại phòng thành công!');
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
        $data = $this->roomtypes->getAllbyUUID($uuid)->first();
        $roomtype   = $this->roomtypes->getAll()->where('id', '!=', 1)->where('parent_id', 1);

        return view($this->view . 'edit', compact('data', 'roomtype'));
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
        $data = $this->roomtypes->saveUpdate($request, $uuid);
        
        return redirect()->route($this->route . 'index')
        ->with('success','Chúc mừng!')
        ->with('nofitication','Sửa loại phòng thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        $this->roomtypes->deletedbyUUID($uuid);

        return redirect()->route($this->route . 'index')
        ->with('success','Chúc mừng!')
        ->with('nofitication','Xóa loại phòng thành công!');
    }
}
