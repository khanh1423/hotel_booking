<?php
namespace App\Repositories\Room;

use App\Repositories\BaseRepository;
use \App\Models\Room;
use \App\Models\RoomImage;
use \App\Models\RoomAttribute;
use Illuminate\Support\Str;
use Datetime;
use Illuminate\Support\Facades\DB;

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

        DB::beginTransaction();

        try {
            if($request->has('room_image')){
                $room        = $request->room_image;
                $ext         = $request->room_image->extension();
                $room_name = 'room' . '-' . Str::slug($request->room_name, '-') . '-' . time() . '.' . $ext;
                $room->move('upload/rooms', $room_name);
            }
            $data = $this->model->create([
                'name'        => $request->room_name,
                'image'       => $room_name,
                'price'       => $request->room_price,
                'description' => $request->room_note,
                'slug'        => Str::slug($request->room_name, '-'),
                'status'      => $request->room_status,
                'locale'      => config('app.locale'),
                'user_id'     => auth()->user()->id,
                'roomtype_id' => $request->roomtype_id,
                'created_at'  => new Datetime,
                'updated_at'  => new Datetime
            ]);
            
            $RoomAttribute = new RoomAttribute;
    
            if($request->has('attribute_id') && $request->has('attribute_value')){
                for($i = 0; $i < count($request->attribute_id); $i++){
    
                    $RoomAttribute->create([
                        'attribute_id'   => $request->attribute_id[$i], 
                        'room_id'    => $data->id,
                        'value'      => $request->attribute_value[$i],
                        'created_at' => new Datetime,
                        'updated_at' => new Datetime,
                    ]);
                }
            }
    
            $RoomImage = new RoomImage;
    
            if($request->has('images_room')){
                for($i = 0; $i < count($request->images_room); $i++){
                    $room        = $request->images_room[$i];
                    $ext         = $request->images_room[$i]->extension();
                    $room_name   = 'images-room-' . $i . '-' . time() . '.' . $ext;
                    $room->move('upload/rooms', $room_name);
    
                    $RoomImage->create([
                        'image'   => $room_name,
                        'room_id' => $data->id,
                        'created_at' => new Datetime,
                        'updated_at' => new Datetime,
                    ]);
                }
            }
            
            

            DB::commit();
        }catch (Exception $e) {
            DB::rollBack();
        }
        

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
