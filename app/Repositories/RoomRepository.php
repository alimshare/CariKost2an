<?php 

namespace App\Repositories;

interface RoomRepository extends CrudRepository
{
    public function allRoom();
    public function search(array $parameter);
}