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
        return View::make('Webshop/Dashboard')
            ->shares('title', 'Start');
    }

    public function account(){
        return View::make('Webshop/Account')
            ->shares('title', 'Account');
    }

    public function berichtenCentrum(){
        return View::make('Webshop/BerichtenCentrum')
            ->shares('title', 'Berichten centrum');
    }

    public function loadAccountDetails(){
        
        $user = Session::get('userLoggedIn');
        $user = $this->user->getUser($user[0]->user_email);

        if(!$user)
            return $this->messageHandling('error', 'Er is een probleem opgetreden!');

        $data = array(
            'debiteurNummer' => $user->user_kvk, 
            'bedrijf' => $user->user_company_name, 
            'straat' => $user->user_delivery_adress,
            'postcode' => $user->user_zipcode,
            'telefoon' => $user->user_phone
        );

        return json_encode($data);
    }

    // public function loadAccountMessages(){
    //     $user = Session::get('userLoggedIn');
    //     $user = $this->user->getUser($user[0]->user_email);
        
    //     if(!$user)
    //         return $this->messageHandling('error', 'Er is een probleem opgetreden!');
    // }

    public function logout(){
        Session::flush();
        return Redirect::intended('/');
    }

    public function messageHandling($data, $message){
        return json_encode(array($data => $message));
    }
    
}
