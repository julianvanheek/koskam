<?php
/**
 * Index controller
 *
 * @author David Carr - dave@novaframework.com
 * @version 3.0
 */

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use App\Models\Admin as Administrator;

use View;
use Config;
use Session;
use Redirect;
use SendGrid;
use Hash;

/**
 * Sample controller showing 2 methods and their typical usage.
 */
class Admin extends BaseController
{
    protected $layout = 'Backend';

    public $user, $admin;

    public function __construct(){
        $this->user = new User();
        $this->admin = new Administrator();
    }
   
    /**
     * Create Admin View instances.
     */
    public function adminLogin(){
        return View::make('Admin/Login')
            ->shares('title', 'Homepage');
    }

    public function dashboard(){
        return View::make('Admin/Dashboard')
            ->shares('title', 'Dashboard');
    }

    public function index()
    {
        return View::make('Main/Index')
            ->shares('title', 'Homepage');
    }

    public function logout(){
        Session::flush();
        return Redirect::intended('/');
    }

    public function messageHandling($data, $message){
        return json_encode(array($data => $message));
    }
    
}
