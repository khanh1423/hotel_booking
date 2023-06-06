<?php
namespace App\Repositories\Attribute;

use App\Repositories\RepositoryInterface;

interface AttributeRepositoryInterface extends RepositoryInterface
{
    //lấy model
    public function attributeModel();
    public function saveStore($requet);
    public function getAll();
    public function getAllbyUUID($uuid);
    public function saveUpdate($request, $uuid);
    public function deletedbyUUID($uuid);

}