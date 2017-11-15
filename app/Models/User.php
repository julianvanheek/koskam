<?php
/**
 * Users - A Users Model.
 *
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 3.0
 */

namespace App\Models;

use Nova\Auth\UserTrait;
use Nova\Auth\UserInterface;
use Nova\Auth\Reminders\RemindableTrait;
use Nova\Auth\Reminders\RemindableInterface;
use Nova\Database\ORM\Model as BaseModel;
use Nova\Foundation\Auth\Access\AuthorizableTrait;

use Shared\Database\ORM\FileField\FileFieldTrait;
use DB;

class User extends BaseModel 
{
    protected $table = 'users';

    public function getUser($username){
        return DB::table('users')
            ->where('username', $username)
            ->first();    
    }

    public function insertUser($data){
        return DB::table('users')
            ->insert($data);
    }

    public function updateUser($id, $data){
        return DB::table('users')
            ->where('id', $id)
            ->update($data);
    }
}
