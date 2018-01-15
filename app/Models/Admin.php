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

    // global functions

    public function countInfo($table){
        return DB::table($table)
            ->count();
    }

    public function insertData($table, $data){
        return DB::table($table)
            ->insert($data);
    }

    public function getData($table){
        return DB::table($table)
            ->get();
    }

    public function getDataID($table, $where, $id){
        return DB::table($table)
            ->where($where, $id)
            ->get();
    }

    public function updateData($table, $where, $id, $update){
        return DB::table($table)
            ->where($where, $id)
            ->update($update);
    }

    public function deleteData($table, $table_prefix, $id){
        return DB::table($table)
            ->where($table_prefix.'id', $id)
            ->delete();
    }

    // specific functions

    public function getUser($username){
        return DB::table('users')
            ->where('username', $username)
            ->first();    
    }

    public function updateUser($id, $data){
        return DB::table('users')
            ->where('id', $id)
            ->update($data);
    }

    
    public function getProduct($id){
        return DB::table('products')
            ->where('p_id', $id)
            ->first();
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
