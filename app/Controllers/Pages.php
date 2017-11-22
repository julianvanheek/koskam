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
            ->shares('title', 'Home');
    }

    public function producten(){
        return View::make('Main/Producten')
            ->shares('title', 'Producten');
    }

    public function opleidingen(){
        return View::make('Main/Opleidingen')
            ->shares('title', 'Opleidingen');
    }

    public function contact(){
        return View::make('Main/Contact')
            ->shares('title', 'Contact');
    }

    public function login(){
    	return View::make('Main/Login')
    		->shares('title', 'Login');
    }

    public function registreren(){
        return View::make('Main/Registreren')
            ->shares('title', 'Registreren');
    }

    public function wachtwoordVergeten(){
        return View::make('Main/WachtwoordVergeten')
            ->shares('title', 'Wachtwoord vergeten');
    }
}
