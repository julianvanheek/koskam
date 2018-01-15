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
use App\Models\Company as Company;

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

    public $user, $admin, $company;

    public function __construct(){
        $this->user = new User();
        $this->admin = new Administrator();
        $this->company = new Company();
    }
   
    /**
     * Create Admin View instances.
     */
    public function dashboard(){
        return View::make('Admin/Dashboard')
            ->shares('title', 'Dashboard');
    }

    public function producten(){
        return View::make('Admin/Producten')
            ->shares('title', 'Producten');
    }

    public function bedrijven(){
        return View::make('Admin/Bedrijven')
            ->shares('title', 'Bedrijven');
    }

    public function gebruikers(){
        return View::make('Admin/Gebruikers')
            ->shares('title', 'Gebruikers');
    }

    public function loadDashboard(){
        $products = $this->admin->countInfo('products');
        $companies = $this->admin->countInfo('companies');
        $data = array('producten' => $products, 'bedrijven' => $companies);
        return json_encode($data);
    }

    public function loadProducts(){
        $products = $this->admin->getData('products');
        $table = View::fetch('Admin/Templates/Products', ['records' => $products]);
        return json_encode($table); 
    }

    public function addProduct(){
        if(!isset($_POST['titel'], $_POST['brand'], $_POST['type'], $_POST['beschrijving'], $_POST['prijs'])){
            return $this->messageHandling('error', 'Er is een probleem opgetreden');
        }

        if(empty($_POST['titel']) || empty($_POST['brand']) || empty($_POST['type']) || empty($_POST['beschrijving']) || empty($_POST['prijs'])){
            return $this->messageHandling('error', 'Vul alle velden in!');
        }

        $titel          = htmlentities($_POST['titel']);
        $brand          = htmlentities($_POST['brand']);
        $type           = htmlentities($_POST['type']);
        $beschrijving   = htmlentities($_POST['beschrijving']);
        $prijs          = htmlentities($_POST['prijs']);

        if($prijs < 0)
            return $this->messageHandling('error', 'Minimale prijs is €1,-');
        
        $data = array('p_title' => $titel, 'p_brand' => $brand, 'p_type' => $type, 'p_description' => $beschrijving, 'p_price' => $prijs);

        $this->admin->insertData('products', $data);

        return $this->messageHandling('success', 'Product toegevoegd!');
    }

    public function getProduct(){
        $id = $_POST['data-id'];
        $data = $this->admin->getProduct($id);
        return json_encode(array('id' => $data->p_id, 'brand' => $data->p_brand, 'type' => $data->p_type, 'titel' => $data->p_title, 'beschrijving' => $data->p_description, 'prijs' => $data->p_price));
    }

    public function updateProduct(){
        if(!isset($_POST['titel'], $_POST['brand'], $_POST['type'], $_POST['beschrijving'], $_POST['prijs']))
            return $this->messageHandling('error', 'Er is een probleem opgetreden');

        if(empty($_POST['titel']) || empty($_POST['brand']) || empty($_POST['type']) || empty($_POST['beschrijving']) || empty($_POST['prijs']))
            return $this->messageHandling('error', 'Vul alle velden in!');
        

        $id             = htmlentities($_POST['id']);
        $brand          = htmlentities($_POST['brand']);
        $type           = htmlentities($_POST['type']);
        $titel          = htmlentities($_POST['titel']);
        $beschrijving   = htmlentities($_POST['beschrijving']);
        $prijs          = htmlentities($_POST['prijs']);

        if($prijs < 0)
            return $this->messageHandling('error', 'Minimale prijs is €1,-');
        
        $data = array('p_title' => $titel, 'p_brand' => $brand, 'p_type' => $type, 'p_description' => $beschrijving, 'p_price' => $prijs);

        $this->admin->editProduct($id, $data);

        return $this->messageHandling('success', 'Product gewijzigd!');

    }

    public function deleteProduct(){
        $id = $_POST['data-id'];
        $this->admin->deleteData('products', 'p_', $id);
        return $this->messageHandling('success', 'Product verwijderd!');
    }
    
    public function loadCompanies(){
        $companies = $this->admin->getData('companies');
        $table = View::fetch('Admin/Templates/Companies', ['records' => $companies]);
        return json_encode($table); 
    }

    public function addCompany(){
        if(!isset($_POST['naam'], $_POST['kvk'], $_POST['eigenaar'], $_POST['adres'], $_POST['postcode'], $_POST['plaats'], $_POST['telefoon'], $_POST['mobiel'], $_POST['email']))
            return $this->messageHandling('error', 'Er is een probleem opgetreden');

        if(empty($_POST['naam']) || empty($_POST['kvk']) || empty($_POST['eigenaar']) || empty($_POST['adres']) || empty($_POST['postcode']) || empty($_POST['plaats']) || empty($_POST['telefoon']) || empty($_POST['mobiel']) || empty($_POST['email']))
            return $this->messageHandling('error', 'Vul alle velden in!');
        

        $naam = htmlentities($_POST['naam']);
        $kvk = htmlentities($_POST['kvk']);
        $eigenaar = htmlentities($_POST['eigenaar']);
        $adres = htmlentities($_POST['adres']);
        $postcode = htmlentities($_POST['postcode']);
        $plaats = htmlentities($_POST['plaats']);
        $telefoon = htmlentities($_POST['telefoon']);
        $mobiel = htmlentities($_POST['mobiel']);
        $email = htmlentities($_POST['email']);

        if(strlen($kvk) != 8 || !is_numeric($kvk))
            return $this->messageHandling('error', 'KvK niet juist!');
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            return $this->messageHandling('error', 'Email is niet juist!'); 

        $bedrijfsnaamCheck = $this->company->getCompany($naam);
        $userCheck = $this->company->getCompanyMail($email);
        $kvkCheck = $this->company->getCompanyByKvK($kvk);

        if($bedrijfsnaamCheck)
            return $this->messageHandling('error', 'Bedrijf staat al ingeschreven!');
        if($userCheck)
            return $this->messageHandling('error', 'Emailadres word al gebruikt!');
        if($kvkCheck)
            return $this->messageHandling('error', 'KvK staat al ingeschreven!');

        $data = array(
            'c_name' => $naam, 'c_kvk' => $kvk, 'c_owner' => $eigenaar, 
            'c_deliver_address' => $adres, 'c_zipcode' => $postcode, 
            'c_city' => $plaats, 'c_phone' => $telefoon,
            'c_phone_m' => $mobiel, 'c_email' => $email
        );

        $this->admin->insertData('companies', $data);

        return $this->messageHandling('success', 'Bedrijf toegevoegd!');
    }

    public function getCompany(){
        $id = $_POST['data-id'];
        $data = $this->admin->getDataID('companies', 'c_id', $id);
        return json_encode(array(
            'id' => $data[0]->c_id, 'naam' => $data[0]->c_name, 
            'kvk' => $data[0]->c_kvk, 'eigenaar' => $data[0]->c_owner, 
            'adres' => $data[0]->c_deliver_address, 'postcode' => $data[0]->c_zipcode,
            'plaats' => $data[0]->c_city, 'telefoon' => $data[0]->c_phone,
            'mobiel' => $data[0]->c_phone_m, 'email' => $data[0]->c_email
        ));
    }

    public function updateCompany(){
        if(!isset($_POST['naam'], $_POST['kvk'], $_POST['eigenaar'], $_POST['adres'], $_POST['postcode'], $_POST['plaats'], $_POST['telefoon'], $_POST['mobiel'], $_POST['email']))
            return $this->messageHandling('error', 'Er is een probleem opgetreden');

        if(empty($_POST['naam']) || empty($_POST['kvk']) || empty($_POST['eigenaar']) || empty($_POST['adres']) || empty($_POST['postcode']) || empty($_POST['plaats']) || empty($_POST['telefoon']) || empty($_POST['mobiel']) || empty($_POST['email']))
            return $this->messageHandling('error', 'Vul alle velden in!');
        

        $id             = htmlentities($_POST['id']);
        $naam           = htmlentities($_POST['naam']);
        $kvk            = htmlentities($_POST['kvk']);
        $eigenaar       = htmlentities($_POST['eigenaar']);
        $adres          = htmlentities($_POST['adres']);
        $postcode       = htmlentities($_POST['postcode']);
        $plaats         = htmlentities($_POST['plaats']);
        $telefoon       = htmlentities($_POST['telefoon']);
        $mobiel         = htmlentities($_POST['mobiel']);
        $email          = htmlentities($_POST['email']);

        if(strlen($kvk) != 8 || !is_numeric($kvk))
            return $this->messageHandling('error', 'KvK niet juist!');
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            return $this->messageHandling('error', 'Email is niet juist!'); 

        $data = array(
            'c_name' => $naam, 'c_kvk' => $kvk, 'c_owner' => $eigenaar, 
            'c_deliver_address' => $adres, 'c_zipcode' => $postcode, 
            'c_city' => $plaats, 'c_phone' => $telefoon,
            'c_phone_m' => $mobiel, 'c_email' => $email
        );

        $this->admin->updateData('companies', 'c_id', $id, $data);

        return $this->messageHandling('success', 'Bedrijf gewijzigd!');
    }

    public function deleteCompany(){
        $id = $_POST['data-id'];
        $this->admin->deleteData('companies', 'c_', $id);
        // disable all users
        $this->admin->updateData('users', 'c_id', $id, array('u_user_level' => '0'));
        return $this->messageHandling('success', 'Bedrijf verwijderd!');
    }

    public function companyCreateUser(){
        if(!isset($_POST['id'], $_POST['voornaam'], $_POST['achternaam'], $_POST['email']))
            return $this->messageHandling('error', 'Er is een fout opgetreden!');

        if(empty($_POST['voornaam']) || empty($_POST['achternaam']) || empty($_POST['email']))
            return $this->messageHandling('error', 'Vul alle velden in!');

        $id = htmlentities($_POST['id']);
        $voornaam = htmlentities($_POST['voornaam']);
        $achternaam = htmlentities($_POST['achternaam']);
        $email = htmlentities($_POST['email']);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            return $this->messageHandling('error', 'Email is niet juist!'); 

        $data = array('c_id' => $id, 'u_firstname' => $voornaam, 'u_lastname' => $achternaam, 'u_email' => $email, 'u_active' => 0);

        $this->admin->insertData('users', $data);

        return $this->messageHandling('success', 'Gebruiker toegevoegd!');
    }

    public function getCompanyUsers(){
        if(!isset($_POST['data-id']) || empty($_POST['data-id']))
            return $this->messageHandling('error', 'Er is een probleem opgetreden');
        $c_id = htmlentities($_POST['data-id']);
        $data = $this->admin->getDataID('users', 'c_id', $c_id);
        $table = View::fetch('Admin/Templates/companyUsers', ['records' => $data]);
        return json_encode($table); 
    }

    public function loadAccounts(){
        $accounts = $this->admin->getData('users');
        $table = View::fetch('Admin/Templates/Accounts', ['records' => $accounts]);
        return json_encode($table); 
    }

    public function messageHandling($data, $message){
        return json_encode(array($data => $message));
    }

    public function logout(){
        Session::flush();
        return Redirect::intended('/');
    }
}
