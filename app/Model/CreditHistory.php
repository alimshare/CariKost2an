<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CreditHistory extends Model
{
    public function user(){
        return $this->belongsTo('App\Model\User')->first();
    }
    
    public function room(){
        return $this->belongsTo('App\Model\Room')->first();
    }
}
