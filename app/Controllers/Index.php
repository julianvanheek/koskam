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
class Index extends BaseController
{
    public $user;

    public function __construct(){
        $this->user = new User();
    }
   
    /**
     * Create and return a View instance.
     */
    public function login(){
        if(!isset($_POST['email']) || !isset($_POST['password'])){
            return $this->messageHandling('error', 'Er is een probleem opgetreden!');
        }

        if(empty($_POST['email']) || empty('password')){
            return $this->messageHandling('error', 'Vul alle gegevens in!');
        }

        $username = htmlentities($_POST['email']);
        $password = htmlentities($_POST['password']);

        $user = $this->user->getUser($username);

        if(!$user){
            return $this->messageHandling('error', 'Gebruiker niet gevonden!');
        }

        if(!Hash::check($password, $user->user_password)){
            return $this->messageHandling('error', 'Incorrecte gegevens!');
        }

        if($user->user_level == 3){
            Session::push('loggedIn', $user);
            return json_encode(array('redirect' => 'admin/dashboard'));
        }

        if($user->user_level < 1){
            return $this->messageHandling('error', 'Account is uitgeschakeld!');
        }

        Session::push('userLoggedIn', $user);
        return json_encode(array('redirect' => 'dashboard'));
    }

    public function register(){
        if(!isset($_POST['email'], $_POST['password'], $_POST['password2'], $_POST['kvk'], $_POST['naam'])){
            return $this->messageHandling('error', 'Er is een probleem opgetreden!');
        }

        if(empty($_POST['email']) || empty($_POST['password']) || empty($_POST['password2']) || 
            empty($_POST['kvk']) || empty($_POST['naam'])){
            return $this->messageHandling('error', 'Vul alle gegevens in!');
        }

        $username = htmlentities($_POST['email']);
        $password = htmlentities($_POST['password']);
        $password2 = htmlentities($_POST['password2']);
        $kvk = htmlentities($_POST['kvk']);
        $naam = htmlentities($_POST['naam']);

        $user = $this->user->getUser($username);
        $kvkCheck = $this->user->getUserByKvK($kvk);

        if($user){
            return $this->messageHandling('error', 'Email staat al ingeschreven!');
        }
        if($kvkCheck){
            return $this->messageHandling('error', 'KvK staat al ingeschreven!');
        }
        if(strlen($kvk) != 8){
            return $this->messageHandling('error', 'KvK niet juist!');
        }        
        if($password != $password2){
            return $this->messageHandling('error', 'Wachtwoorden komen niet overeen!');
        }   
        if(strlen($password) < 6){
            return $this->messageHandling('error', 'Wachtwoord te kort!');
        }
        $password = Hash::make($password);

        $data = array('user_email' => $username, 'user_password' => $password, 'user_kvk' => $kvk, 'user_name' => $naam);

        $this->user->insertUser($data);

        return json_encode(array('redirect' => 'login'));
    }

    public function logout(){
        Session::flush();
        return Redirect::intended('/');
    }

    public function messageHandling($data, $message){
        return json_encode(array($data => $message));
    }
    
}
