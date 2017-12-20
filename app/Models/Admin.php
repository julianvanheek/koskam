<?php
/**
 * Admin model
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

class Admin extends BaseModel 
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

    public function getProducts(){
        return DB::table('products')
            ->get();
    }

    public function getProduct($id){
        return DB::table('products')
            ->where('p_id', $id)
            ->first();
    }

    public function addProduct($data){
        return DB::table('products')
            ->insert($data);
    }

    public function editProduct($id, $data){
         return DB::table('products')
            ->where('p_id', $id)
            ->update($data);
    }

    public function deleteProduct($id){
        return DB::table('products')
            ->where('p_id', $id)
            ->delete();
    }
}
