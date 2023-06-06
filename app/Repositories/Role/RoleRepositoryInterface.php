<?php
namespace App\Repositories\Role;

use App\Repositories\RepositoryInterface;

interface RoleRepositoryInterface extends RepositoryInterface
{
    //lấy model
    public function roleModel();
    public function saveStore($requet);
    public function getAll();
    public function getAllbyUUID($uuid);
    public function saveUpdate($request, $uuid);
    public function deletedbyUUID($uuid);

}