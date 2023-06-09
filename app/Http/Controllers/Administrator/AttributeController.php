<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administrator\Attribute\StoreRequest;
use App\Http\Requests\Administrator\Attribute\UpdateRequest;
use App\Repositories\Attribute\AttributeRepositoryInterface;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    private $view   = 'administrator.modules.attribute.';
    private $route = 'admin.attribute.';
    protected $attributes;

    public function __construct(AttributeRepositoryInterface $attributeRepositoryInterface){
        $this->attributes = $attributeRepositoryInterface;
        
        // if(!Auth::user()->level == 2 || Auth::user()->level == 3){
        //     re
        // }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->attributes->getchildren();
        
        return view($this->view . 'index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $attribute  = $this->attributes->getAll();
        return view($this->view . 'create', compact('attribute'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $data = $this->attributes->saveStore($request);

        return redirect()->route($this->route . 'index')
        ->with('success','Chúc mừng!')
        ->with('nofitication','Thêm thuộc tính thành công!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $uuid
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = $this->attributes->getAll();

        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $uuid
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        $attribute  = $this->attributes->getAll();
        $data       = $this->attributes->getAllbyUUID($uuid)->first();
        return view($this->view . 'edit', compact('attribute', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $uuid
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $uuid)
    {
        $data = $this->attributes->saveUpdate($request, $uuid);
        return redirect()->route($this->route . 'index')
        ->with('success','Chúc mừng!')
        ->with('nofitication','Sửa thuộc tính thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $uuid
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        $data = $this->attributes->deletedbyUUID($uuid);
        return redirect()->route($this->route . 'index')
        ->with('success','Chúc mừng!')
        ->with('nofitication','Xóa thuộc tính thành công!');
    }
}
