<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function roomList(){
        return view('modules.room.room_list');
    }

    public function roomAdd(){
        return view('modules.room.room_add');
    }

    public function roomEdit(){
        return view('modules.room.room_edit');
    }

    public function roomView(){
        return view('modules.room.room_view');
    }
}
