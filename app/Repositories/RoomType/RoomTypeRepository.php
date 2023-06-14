<?php
namespace App\Repositories\RoomType;

use App\Repositories\BaseRepository;
use \App\Models\RoomType;
use Illuminate\Support\Str;
use Datetime;

class RoomTypeRepository extends BaseRepository implements RoomTypeRepositoryInterface
{
    /**
     * EloquentUser constructor.
     * @param RoomTypes $model
     * @author Trần Luân <luantran04555@gmail.com>
     */
    public function getModel()
    {
        return \App\Models\RoomType::class;
    }

    public function RoomTypeModel()
    {
        return $this->model;
    }

    /**
     * Eloquent RoomType Store 
     * @param RoomTypes $request
     * @author Trần Luân <luantran04555@gmail.com>
     */
    public function saveStore($request){
        $data = $this->model->create([
            'name'        => $request->roomtype_name,
            'description' => $request->roomtype_note,
            'parent_id'   => $request->roomtype_parent_id,
            'slug'        => Str::slug($request->roomtype_name, '-'),
            'locale'      => config('app.locale'),
            'user_id'     => auth()->user()->id,
            'created_at'  => new Datetime,
            'updated_at'  => new Datetime
        ]);

        return $data;
    }

    public function getAll(){
        $data = $this->model->orderby('id', 'ASC')->get();

        return $data;
    }

    public function getAllbyUUID($uuid){
        $data = $this->model->where('uuid', $uuid);

        return $data;
    }

    public function saveUpdate($request, $uuid){
        $RoomType = $this->getAllbyUUID($uuid)->first();
        $data = $RoomType->update([
            'name'        => $request->roomtype_name,
            'description' => $request->roomtype_note,
            'parent_id'   => $request->roomtype_parent_id,
            'slug'        => Str::slug($request->roomtype_name, '-'),
            'locale'      => config('app.locale'),
            'user_id'     => auth()->user()->id,
            'updated_at'  => new Datetime
        ]);
        
        return $data;
    }

    public function deletedbyUUID($uuid){
        $RoomType = $this->getAllbyUUID($uuid)->first();

        return $RoomType->delete();
    }

    public function getchildren(){
        $data = $this->model->with('children')->whereNull('parent_id')->get();

        return $data;
    }
}
