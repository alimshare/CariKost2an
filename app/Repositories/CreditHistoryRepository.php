<?php 

namespace App\Repositories;

interface CreditHistoryRepository extends CrudRepository
{
    public function checkCredit($userId, $year, $month);
    public function insertHistory($userId, $roomId, $credit);
}