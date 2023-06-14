<?php
namespace App\Repositories\Room;

use App\Repositories\RepositoryInterface;

interface RoomRepositoryInterface extends RepositoryInterface
{
    //lấy model
    public function roomModel();
    public function saveStore($requet);
    public function getAll();
    public function getAllbyUUID($uuid);
    public function saveUpdate($request, $uuid);
    public function deletedbyUUID($uuid);
    public function getchildren();

}