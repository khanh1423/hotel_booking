<?php
namespace App\Repositories\User;

use App\Repositories\BaseRepository;
use \App\Models\User;
use Illuminate\Support\Str;
use Datetime;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * EloquentUser constructor.
     * @param Users $model
     * @author Trần Luân <luantran04555@gmail.com>
     */
    public function getModel()
    {
        return \App\Models\User::class;
    }

    public function UserModel()
    {
        return $this->model;
    }

    /**
     * Eloquent User Store 
     * @param Users $request
     * @author Trần Luân <luantran04555@gmail.com>
     */
    public function saveStore($request){       
        if($request->has('user_image')){
            $avatar      = $request->user_image;
            $ext         = $request->user_image->extension();
            $avatar_name = 'avatar' . '-' . Str::slug($request->user_name, '-') . '-' . time() . '.' . $ext;
            $avatar->move('upload/users', $avatar_name);
        }else{
            $avatar_name = 'no-avatar.png';
        }
        $data = $this->model->create([
            'image'       => $avatar_name,
            'full_name'   => $request->user_name,
            'email'       => $request->user_email,
            'phone'       => $request->user_phone,
            'password'    => bcrypt($request->user_password),
            'gender'      => $request->user_gender,
            'address'     => $request->user_address,
            'role_id'     => $request->user_role,
            'level'       => 1,
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

    public function checkOldPassword($request, $uuid){ // check old password
        $User = $this->getAllbyUUID($uuid)->first();
        if($request->user_old_password != null){
            if(!Hash::check($request->user_old_password, $User->password)){ 
                return false;
            }else{
                return true;
            }
        }

        return true;
    }

    public function saveUpdate($request, $uuid){
        $User = $this->getAllbyUUID($uuid)->first();
        if($request->has('user_image')){
            $avatar      = $request->user_image;
            $ext         = $request->user_image->extension();
            $avatar_name = 'avatar' . '-' . Str::slug($request->user_name, '-') . '-' . time() . '.' . $ext;
            $avatar->move('upload/users', $avatar_name);
        }else{
            $avatar_name = $User->image;
        }
        $data = $User->update([
            'image'       => $avatar_name,
            'full_name'   => $request->user_name,
            'email'       => $request->user_email,
            'phone'       => $request->user_phone,
            'password'    => $request->user_password != null ? bcrypt($request->user_password) : $User->password,
            'gender'      => $request->user_gender,
            'address'     => $request->user_address,
            'status'      => $request->user_status,
            'role_id'     => $request->user_role,
            'level'       => $request->user_level,
            'updated_at'  => new Datetime
        ]);
        
        return $data;
    }

    public function deletedbyUUID($uuid){
        $User = $this->getAllbyUUID($uuid)->first();

        return $User->delete();
    }
}
