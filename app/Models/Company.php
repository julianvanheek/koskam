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

class Company extends BaseModel 
{
    protected $table = 'companies';

     public function getInfo($table, $where, $info){
        return DB::table($table)
            ->where($where, $info)
            ->first();
    }

    public function getCompanyByID($id){
        return DB::table('companies')
            ->where('c_id', $id)
            ->first();
    }

    public function getCompanyMail($email){
        return DB::table('companies')
            ->where('c_email', $email)
            ->first();
    }

    public function getCompany($name){
        return DB::table('companies')
            ->where('c_name', $name)
            ->first();
    }

    public function getCompanyByKvK($kvk){
    	return DB::table('companies')
    		->where('c_kvk', $kvk)
    		->first();
    }

    public function insertCompany($data){
    	return DB::table('companies')
    		->insert($data);
    }

    public function updateCompany($kvk, $data){
        return DB::table('companies')
            ->where('c_kvk', $kvk)
            ->update($data);
    }


}
