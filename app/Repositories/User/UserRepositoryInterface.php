<?php
namespace App\Repositories\User;

use App\Repositories\RepositoryInterface;

interface UserRepositoryInterface extends RepositoryInterface
{
    //lấy model
    public function userModel();
    public function saveStore($requet);
    public function getAll();
    public function getAllbyUUID($uuid);
    public function checkOldPassword($request, $uuid);
    public function saveUpdate($request, $uuid);
    public function deletedbyUUID($uuid);

}