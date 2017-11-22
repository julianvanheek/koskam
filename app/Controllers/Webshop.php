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

use View;
use Config;
use Session;
use Redirect;
use SendGrid;
use Hash;

/**
 * Sample controller showing 2 methods and their typical usage.
 */
class Webshop extends BaseController
{

    protected $layout = 'Webshop';

    public $user;

    public function __construct(){
        $this->user = new User();
    }

    public function dashboard(){
        return View::make('User/Dashboard')
            ->shares('title', 'Dashboard');
    }

    public function logout(){
        Session::flush();
        return Redirect::intended('/');
    }

    public function messageHandling($data, $message){
        return json_encode(array($data => $message));
    }
    
}
