<?php
namespace App\Repositories\Role;

use App\Repositories\BaseRepository;
use \App\Models\Role;
use Datetime;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    /**
     * EloquentUser constructor.
     * @param Roles $model
     * @author Trần Luân <luantran04555@gmail.com>
     */
    public function getModel()
    {
        return \App\Models\Role::class;
    }

    public function roleModel()
    {
        return $this->model;
    }

    /**
     * Eloquent Role Store 
     * @param Roles $request
     * @author Trần Luân <luantran04555@gmail.com>
     */
    public function saveStore($request){
        $data = $this->model->create([
            'name'        => $request->role_name,
            'description' => $request->role_note,
            'locale'      => config('app.locale'),
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
        if($request->has('status')){
            $status = $request->status;
        }else{
            $status = 'off';
        }
        $role = $this->getAllbyUUID($uuid)->first();
        $data = $role->update([
            'name'        => $request->role_name,
            'description' => $request->role_note,
            'locale'      => config('app.locale'),
            'status'      => $status,
            'updated_at'  => new Datetime
        ]);
        
        return $data;
    }

    public function deletedbyUUID($uuid){
        $role = $this->getAllbyUUID($uuid)->first();

        return $role->delete();
    }
}
