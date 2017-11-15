<?php
/**
 * Pages controller
 *
 * @author David Carr - dave@novaframework.com
 * @version 3.0
 */

namespace App\Controllers;

use App\Controllers\BaseController;

use View;
use Config;
use Session;
use Redirect;
use SendGrid;
use Hash;

/**
 * Sample controller showing 2 methods and their typical usage.
 */
class Pages extends BaseController
{

    /**
     * Create User View instances.
     */
    public function index(){
        return View::make('Main/Index')
            ->shares('title', 'Homepage');
    }

    public function login(){
    	return View::make('Main/Login')
    		->shares('title', 'Login');
    }


    
}
