<?php
/**
 * Welcome controller
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
class Index extends BaseController
{
    public $user;

    public function __construct(){
        $this->user = new User();
    }
   
    /**
     * Create and return a View instance.
     */
    public function index()
    {
        return View::make('Main/Index')
            ->shares('title', 'Homepage');
    }

    public function bier()
    {
        return View::make('User/Index')
            ->shares('title', 'Bier');
    }

    public function logout(){
        Session::flush();
        return Redirect::intended('/');
    }

    public function messageHandling($data, $message){
        return json_encode(array($data => $message));
    }
    
}
