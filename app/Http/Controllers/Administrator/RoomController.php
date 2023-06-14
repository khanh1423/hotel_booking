<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Repositories\Room\RoomRepositoryInterface;
use App\Repositories\Attribute\AttributeRepositoryInterface;
use App\Repositories\RoomType\RoomTypeRepositoryInterface;
use Attribute;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    private $view   = 'administrator.modules.room.';
    private $route = 'admin.room.';
    protected $rooms;
    protected $attrbutes;
    protected $roomtypes;

    public function __construct(RoomRepositoryInterface $roomRepositoryInterface,
                                AttributeRepositoryInterface $attributeRepositoryInterface,
                                RoomTypeRepositoryInterface $roomTypeRepositoryInterface){
        $this->rooms = $roomRepositoryInterface;
        $this->attrbutes    = $attributeRepositoryInterface;
        $this->roomtypes = $roomTypeRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view($this->view . 'index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roomtype  = $this->roomtypes->getAll()->where('id', '!=', 1)->where('parent_id', '!=', 1);
        $attrbutes = $this->attrbutes->getAll()->where('id', '!=', 1);
        return view($this->view . 'create',  compact('roomtype','attrbutes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
