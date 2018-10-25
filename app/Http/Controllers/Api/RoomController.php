<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\RoomRepository;
use App\Repositories\CreditHistoryRepository;
use App\Repositories\UserRepository;

use App\Http\Requests\CreateRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Http\Requests\SearchRoomRequest;
use App\Http\Requests\CheckRoomRequest;

class RoomController extends Controller
{
    private $roomRepo;
    private $creditHistRepo;
    private $userRepo;

    function __construct(RoomRepository $c, CreditHistoryRepository $h, UserRepository $u){
        $this->roomRepo = $c;
        $this->creditHistRepo = $h;
        $this->userRepo = $u;
    }

    public function all() {
        $list = $this->roomRepo->allRoom();
        return response()->json($list);
    }
    
    public function get($id) {
        $object = $this->roomRepo->get($id);
        return response()->json($object);
    }
    
    public function add(CreateRoomRequest $request) {
        $data = $request->all();
        $data['available']  = true;
        $data['owner_id']   = Auth::user()->id;

        $room = $this->roomRepo->insert($data, true);
        return response()->json($room);
    }
    
    public function edit(UpdateRoomRequest $request, $id) {
        $object = $this->roomRepo->get($id);
        if ($object == null) {
            throw new \App\Exceptions\DataNotFoundRestException('Room not found');
        } 

        $belongTo = $object->owner()->id;
        if ($belongTo != Auth::user()->id) {
            throw new \App\Exceptions\GeneralRestException('WRONG_ROOM','You are not the owner of this room', 403); // forbiden
        }

        $room = $this->roomRepo->update($id, $request->all());
        return response()->json($room);
    }

    public function delete($id) {
        $object = $this->roomRepo->get($id);
        if ($object == null) {
            throw new \App\Exceptions\DataNotFoundRestException('Room not found');
        } 

        $belongTo = $object->owner()->id;
        if ($belongTo != Auth::user()->id) {
            throw new \App\Exceptions\GeneralRestException('WRONG_ROOM','You are not the owner of this room', 403); // forbiden
        }

        $status = $this->roomRepo->delete($id);
        if ($status) {
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'fail']);
        }
    }
    
    public function search(SearchRoomRequest $request) {
        $rooms = $this->roomRepo->search($request->all());
        return response()->json($rooms);
    }
    
    public function check($id) {
        $object = $this->roomRepo->get($id);
        if ($object == null) {
            throw new \App\Exceptions\DataNotFoundRestException('Room not found');
        } 

        $user = Auth::user();

        // check credit limit
        $currentCredit = $this->creditHistRepo->checkCredit($user->id);
        if ($currentCredit >= 40 && $user->type == 'PREMIUM') {
            throw new \App\Exceptions\CreditLimitRestException('Your account has been reached the monthly credit limit');
        } else if ($currentCredit >= 20 && $user->type == 'REGULER') {
            throw new \App\Exceptions\CreditLimitRestException('Your account has been reached the monthly credit limit, upgrade to PREMIUM account to get more limit.');
        }  else {
            $creditHist = $this->creditHistRepo->insertHistory($user->id, $object->id); // add new history
        }

        return response()->json(['available' => $object->available]);
    }

    public function detail($id) {
        $room = $this->roomRepo->get($id);
        if ($room == null) {
            throw new \App\Exceptions\DataNotFoundRestException('Room not found');
        }

        $owner = $room->owner();
        $room['owner'] = array(
            'id'    => $room->owner_id,
            'name'  => $owner->name,
            'phone' => $owner->phone,
            'email' => $owner->email
        );

        unset($room['available']); // remove field available from detail
        unset($room['owner_id']);  // move owner id to object owner

        return response()->json($room);
    }
}
