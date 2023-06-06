<?php
namespace App\Repositories\Attribute;

use App\Repositories\BaseRepository;
use \App\Models\Attribute;
use Datetime;

class AttributeRepository extends BaseRepository implements AttributeRepositoryInterface
{
    /**
     * EloquentUser constructor.
     * @param Attributes $model
     * @author Trần Luân <luantran04555@gmail.com>
     */
    public function getModel()
    {
        return \App\Models\Attribute::class;
    }

    public function AttributeModel()
    {
        return $this->model;
    }

    /**
     * Eloquent Attribute Store 
     * @param Attributes $request
     * @author Trần Luân <luantran04555@gmail.com>
     */
    public function saveStore($request){
        $data = $this->model->create([
            'name' => $request->attribute_name,
            'locale'  => config('app.locale'),
            'user_id' => auth()->user()->id,
            'created_at' => new Datetime,
            'updated_at' => new Datetime
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
        if($request->has('status')){
            $status = $request->status;
        }else{
            $status = 'off';
        }
        $Attribute = $this->getAllbyUUID($uuid)->first();
        $data = $Attribute->update([
           
        ]);
        
        return $data;
    }

    public function deletedbyUUID($uuid){
        $Attribute = $this->getAllbyUUID($uuid)->first();

        return $Attribute->delete();
    }
}
