<?php
namespace App\Repositories\RoomType;

use App\Repositories\RepositoryInterface;

interface RoomTypeRepositoryInterface extends RepositoryInterface
{
    //lấy model
    public function roomTypeModel();
    public function saveStore($requet);
    public function getAll();
    public function getAllbyUUID($uuid);
    public function saveUpdate($request, $uuid);
    public function deletedbyUUID($uuid);
    public function getchildren();

}