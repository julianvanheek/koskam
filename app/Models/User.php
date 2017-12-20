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
    protected $table = 'Users';

    public function getUser($username){
        return DB::table('Users')
            ->where('u_email', $username)
            ->first();
    }

    public function insertUser($data){
    	return DB::table('Users')
    		->insert($data);
    }

    public function companyManager($c_id){
        return DB::table('Users')
            ->where('c_id', $c_id)
            ->where('u_user_level', 2)
            ->first();
    }


}
