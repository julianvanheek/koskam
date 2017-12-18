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
use App\Models\Company;

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
    public $company;

    public function __construct(){
        $this->user = new User();
        $this->company = new Company();
    }
   
    /**
     * Create and return a View instance.
     */
    public function login(){
        if(!isset($_POST['email']) || !isset($_POST['password']))
            return $this->messageHandling('error', 'Er is een probleem opgetreden!');
        
        if(empty($_POST['email']) || empty('password'))
            return $this->messageHandling('error', 'Vul alle gegevens in!');
        
        $username = htmlentities($_POST['email']);
        $password = htmlentities($_POST['password']);

        $user = $this->user->getUser($username);

        if(!$user)
            return $this->messageHandling('error', 'Gebruiker niet gevonden!');
        
        if(!Hash::check($password, $user->user_password))
            return $this->messageHandling('error', 'Incorrecte gegevens!');
        
        if($user->user_level == 3){
            Session::push('loggedIn', $user);
            return json_encode(array('redirect' => 'admin/dashboard'));
        }

        if($user->user_level < 1)
            return $this->messageHandling('error', 'Account is uitgeschakeld!');
        
        
        Session::push('userLoggedIn', $user);
        return json_encode(array('redirect' => 'webshop'));
    }

    public function register(){
        if(!isset($_POST['bedrijfsnaam'], $_POST['naameigenaar'], $_POST['afleveradres'], $_POST['postcode'], $_POST['woonplaats'], $_POST['telefoonvast'], $_POST['emailadres'], $_POST['telefoonmobiel'], $_POST['kvk'])){
            return $this->messageHandling('error', 'Er is een probleem opgetreden!');
        }

        if(empty($_POST['bedrijfsnaam']) || empty($_POST['naameigenaar']) || empty($_POST['afleveradres']) || 
            empty($_POST['postcode']) || empty($_POST['woonplaats']) || empty($_POST['telefoonvast']) ||
            empty($_POST['emailadres']) || empty($_POST['telefoonmobiel']) || empty($_POST['kvk'])){
            return $this->messageHandling('error', 'Vul alle gegevens in!');
        }

        $bedrijfsnaam = htmlentities($_POST['bedrijfsnaam']);
        $naameigenaar = htmlentities($_POST['naameigenaar']);
        $afleveradres = htmlentities($_POST['afleveradres']);
        $postcode = htmlentities($_POST['postcode']);
        $woonplaats = htmlentities($_POST['woonplaats']);
        $telefoonvast = htmlentities($_POST['telefoonvast']);
        $emailadres = htmlentities($_POST['emailadres']);
        $telefoonmobiel = htmlentities($_POST['telefoonmobiel']);
        $kvk = htmlentities($_POST['kvk']);

        if(strlen($kvk) != 8 || !is_numeric($kvk))
            return $this->messageHandling('error', 'KvK niet juist!');
        if (!filter_var($emailadres, FILTER_VALIDATE_EMAIL))
            return $this->messageHandling('error', 'Email is niet juist!');   

        $bedrijfsnaamCheck = $this->company->getCompany($bedrijfsnaam);
        $userCheck = $this->company->getCompanyMail($emailadres);
        $kvkCheck = $this->company->getCompanyByKvK($kvk);

        if($bedrijfsnaamCheck)
            return $this->messageHandling('error', 'Bedrijf staat al ingeschreven!');
        if($userCheck)
            return $this->messageHandling('error', 'Emailadres word al gebruikt!');
        if($kvkCheck)
            return $this->messageHandling('error', 'KvK staat al ingeschreven!');
         

        // $this->company->insertCompany($data);

        return json_encode(array('redirect' => 'geregistreerd'));
    }

    public function logout(){
        Session::flush();
        return Redirect::intended('/');
    }

    public function messageHandling($data, $message){
        return json_encode(array($data => $message));
    }
    
}
