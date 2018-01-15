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

    public function updateInfo($table, $where, $info, $update){
        return DB::table($table)
            ->where($where, $info)
            ->update($update);
    }

    public function getProductByID($id){
        return DB::table('products')
            ->where('p_id', $id)
            ->get();
    }

    public function getProducts($name){
        return DB::select("
            SELECT * 
            FROM products 
            WHERE p_id LIKE '%".$name."%' 
            OR p_brand LIKE '%".$name."%'
            OR p_type LIKE '%".$name."%'
            OR p_title LIKE '%".$name."%'"
        );
    }

    public function placeOrder($c_id, $products){
        return DB::table('orders')
            ->insert(array('c_id' => $c_id, 'o_products' => $products));
    }

}
