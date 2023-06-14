<?php
namespace App\Repositories\Room;

use App\Repositories\BaseRepository;
use \App\Models\Room;
use Illuminate\Support\Str;
use Datetime;

class RoomRepository extends BaseRepository implements RoomRepositoryInterface
{
    /**
     * EloquentUser constructor.
     * @param Rooms $model
     * @author Trần Luân <luantran04555@gmail.com>
     */
    public function getModel()
    {
        return \App\Models\Room::class;
    }

    public function roomModel()
    {
        return $this->model;
    }

    /**
     * Eloquent Room Store 
     * @param Rooms $request
     * @author Trần Luân <luantran04555@gmail.com>
     */
    public function saveStore($request){
        $data = $this->model->create([
            'name'        => $request->Room_name,
            'description' => $request->Room_note,
            'parent_id'   => $request->Room_parent_id,
            'slug'        => Str::slug($request->Room_name, '-'),
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
        $Room = $this->getAllbyUUID($uuid)->first();
        $data = $Room->update([
            'name'        => $request->Room_name,
            'description' => $request->Room_note,
            'parent_id'   => $request->Room_parent_id,
            'slug'        => Str::slug($request->Room_name, '-'),
            'locale'      => config('app.locale'),
            'user_id'     => auth()->user()->id,
            'updated_at'  => new Datetime
        ]);
        
        return $data;
    }

    public function deletedbyUUID($uuid){
        $Room = $this->getAllbyUUID($uuid)->first();

        return $Room->delete();
    }

    public function getchildren(){
        $data = $this->model->with('children')->whereNull('parent_id')->get();

        return $data;
    }
}
