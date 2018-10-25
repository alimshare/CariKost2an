<?php 

namespace App\Repositories\impl;

use App\Repositories\UserRepository;
use App\Repositories\impl\CRUDRepositoryImpl;

class UserRepositoryImpl extends CRUDRepositoryImpl implements UserRepository
{
    protected $modelClz = 'App\Model\User';
    
}