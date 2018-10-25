<?php 

namespace App\Repositories\impl;

use App\Repositories\RoomRepository;
use App\Repositories\impl\CRUDRepositoryImpl;

class RoomRepositoryImpl extends CRUDRepositoryImpl implements RoomRepository
{
    protected $modelClz = 'App\Model\Room';

    public function allRoom(){
        $room = new $this->modelClz;
        return $room->get(['id', 'name', 'price', 'city']);
    }

    public function search(array $parameter){
        $room = new $this->modelClz;
        $room = $this->addSearchFilter($room, $parameter);
        $room = $this->addSort($room, $parameter);        

        return $room->get(['id', 'name', 'price', 'city']);
    }

    private function addSearchFilter($query, $parameter){ 
        if (array_key_exists('search', $parameter)) {
            $search = $parameter['search'];
        
            if (array_key_exists('name', $search)) {
                $query = $query->Like('name', $search['name']);
            }
            
            if (array_key_exists('city', $search)) {
                $query = $query->Like('city', $search['city']);
            }

            if (array_key_exists('price', $search)) {
                $min = 0;
                if (array_key_exists('min', $search['price'])) {
                    $min = $search['price']['min'];
                }

                $max = 99999999;
                if (array_key_exists('max', $search['price'])) {
                    $max = $search['price']['max'];
                }

                $query = $query->price($min, $max);
            }
        }
        return $query;
    }

    private function addSort($query, $parameter) {
        if (array_key_exists('sort', $parameter)) {
            $sort = $parameter['sort'];

            $by = "id";
            if (array_key_exists('by', $sort)) $by = $sort['by'];

            $direction = "asc";
            if (array_key_exists('direction', $sort)) $direction = $sort['direction'];

            $query = $query->orderBy($by, $direction);
        }
        return $query;
    }
}