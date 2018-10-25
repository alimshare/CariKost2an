<?php 

namespace App\Repositories\impl;

use App\Repositories\CreditHistoryRepository;
use App\Repositories\impl\CRUDRepositoryImpl;

class CreditHistoryRepositoryImpl extends CRUDRepositoryImpl implements CreditHistoryRepository
{
    protected $modelClz = 'App\Model\CreditHistory';
    
    public function checkCredit($userId, $year = null, $month = null) {
        if ($year == null)  $year = date('Y');
        if ($month == null) $month = date('m');

        $object = new $this->modelClz;
        $sum = $object
                ->whereYear('created_at',date('Y'))
                ->whereMonth('created_at',date('m'))
                ->sum('credit'); 
        
        return $sum;
    }

    public function insertHistory($userId, $roomId, $credit = 5) {
        $history = array(
            'user_id' => $userId,
            'room_id' => $roomId,
            'credit'  => $credit
        );
        return $this->insert($history);
    }
}