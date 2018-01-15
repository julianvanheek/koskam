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
class Webshop extends BaseController
{

    protected $layout = 'Webshop';

    public $user;
    public $company;

    public function __construct(){
        $this->user = new User();
        $this->company = new Company();
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

    public function gegevensBijwerken(){
        return View::make('Webshop/Gegevens')
            ->shares('title', 'Gegevens bijwerken');
    }

    public function products(){
        return View::make('Webshop/Producten')
            ->shares('title', 'Producten');
    }

    public function winkelwagen(){
        return View::make('Webshop/Winkelwagen')
            ->shares('title', 'Winkelwagen');
    }

    public function loadAccountDetails(){
        
        $user = Session::get('userLoggedIn');
        $user = $this->user->getUser($user[0]->u_email);
        $company = $this->company->getCompanyByID($user->c_id);
        $manager = $this->user->companyManager($user->c_id);
        if(!$user)
            return $this->messageHandling('error', 'Er is een probleem opgetreden!');

        $data = array(
            'debiteurNummer' => $company->c_kvk, 
            'bedrijf' => $company->c_name, 
            'straat' => $company->c_deliver_address,
            'postcode' => $company->c_zipcode,
            'plaats' => $company->c_city,
            'telefoon' => $company->c_phone,
            'email' => $company->c_email,
            'm_name' => $manager->u_firstname . ' ' . $manager->u_lastname,
            'm_email' => $manager->u_email,
        );

        return json_encode($data);
    }

    // public function loadAccountMessages(){
    //     $user = Session::get('userLoggedIn');
    //     $user = $this->user->getUser($user[0]->user_email);
        
    //     if(!$user)
    //         return $this->messageHandling('error', 'Er is een probleem opgetreden!');
    // }

    public function loadCompanyDetails(){
        $user = Session::get('userLoggedIn');
        $userInfo = $this->user->getUser($user[0]->u_email);
        $company = $this->company->getCompanyByID($userInfo->c_id);
        $data = array(
            'kvk' => $company->c_kvk,
            'bedrijf' => $company->c_name,
            'eigenaar' => $company->c_owner,
            'adres' => $company->c_deliver_address,
            'postcode' => $company->c_zipcode,
            'plaats' => $company->c_city,
            'iban' => $company->c_iban
        );

        return json_encode($data);
    }

    public function submitUserDetails(){
        if(!isset($_POST['kvknummer'], $_POST['bedrijfsnaam'], $_POST['naameigenaar'], $_POST['adres'], $_POST['postcode'], $_POST['plaats'], $_POST['ibannummer']))
            return $this->messageHandling('error', 'Er is een probleem opgetreden');

        if(empty($_POST['kvknummer']) || empty($_POST['bedrijfsnaam']) || empty($_POST['naameigenaar']) || empty($_POST['adres']) || 
            empty($_POST['postcode']) || empty($_POST['plaats']) || empty($_POST['ibannummer']))
            return $this->messageHandling('error', 'Vul alle verplichte velden in!');

        $kvk = htmlentities($_POST['kvknummer']);
        $bnaam = htmlentities($_POST['bedrijfsnaam']);
        $eigenaar = htmlentities($_POST['naameigenaar']);
        $adres = htmlentities($_POST['adres']);
        $postcode = htmlentities($_POST['postcode']);
        $plaats = htmlentities($_POST['plaats']);
        $iban = htmlentities($_POST['ibannummer']);

        $company = $this->company->getCompanyByKvK($kvk);

        if($kvk != $company->c_kvk)
            return $this->messageHandling('error', 'Er is een probleem opgetreden');

        if($bnaam != $company->c_name){
            $companyCheck = $this->company->getCompany($bnaam);

            if($companyCheck)
                return $this->messageHandling('error', 'Bedrijfsnaam is al in gebruik!');
        }

        if($iban != $company->c_iban){
            $ibanCheck = $this->company->getInfo('companies', 'c_iban', $iban);

            if($ibanCheck)
                return $this->messageHandling('error', 'IBAN al in gebruik');
        }

        $data = array('c_name' => $bnaam, 'c_iban' => $iban, 'c_owner' => $eigenaar, 'c_deliver_address' => $adres, 'c_zipcode' => $postcode, 'c_city' => $plaats);

        $this->company->updateCompany($kvk, $data);

        return $this->messageHandling('success', 'Gegevens gewijzigd!');

    }

    public function submitSearch(){
        if(!isset($_POST['search']))
            return $this->messageHandling('error', 'Er is een probleem opgetreden');

        if(empty($_POST['search']))
            return $this->messageHandling('error', 'Vul een trefwoord in');

        $search = htmlentities($_POST['search']);

        return json_encode(array('redirect' => '/webshop/producten/'.$search));
    }

    public function loadProducts(){
        if(!isset($_POST['product']) || empty($_POST['product']))
            return json_encode(array('redirect' => '/webshop'));

        $product = htmlentities($_POST['product']);

        $products = $this->user->getProducts($product);

        $table = View::fetch('Webshop/Templates/Producten', ['records' => $products]);
        return json_encode($table); 
    }

    // Webshop Cart Functions

    public function addProductToCart(){
        if(!isset($_POST['id']))
            return $this->messageHandling('error', 'Er is een probleem opgetreden!');

        $id = htmlentities($_POST['id']);

        $data = array('Products' => Session::get('Cart'));

        Session::push('Cart', array($id));
        
        return $this->messageHandling('success', 'Product toegevoegd aan winkelwagen');
    }

    public function countCartItems(){
        $counter = 0;

        if(Session::get('Cart') === NULL)
            return json_encode(array('items' => 0));

        foreach (Session::get('Cart') as $key) {
            $counter++;
        }

        return json_encode(array('items' => $counter));
    }

    public function removeProductFromCart(){
        if(!isset($_POST['id']))
            return $this->messageHandling('error', 'Er is een probleem opgetreden');

        $id = htmlentities($_POST['id']);

        $cart = Session::get('Cart');

        foreach ($cart as $key => $value) {
            if($id == $value[0]){
                unset($key[0]);
            }
        }

        return $this->messageHandling('success', 'Product verwijderd uit winkelwagen');
    }

    public function loadCart(){

        if(Session::get('Cart') === NULL){
            $emptyCart = "Nog geen producten in uw winkelwagen";
            $table = View::fetch('Webshop/Templates/Winkelwagen', ['records' => $emptyCart]); 
            return json_encode($table); 
        }

        $cart = Session::get('Cart');
        
        $productArray = array(); 

        foreach($cart as $cartItem){
            $id = $cartItem[0];
            $productData = $this->user->getProductByID($id);
            $productArray[] = $productData;
        }

        $table = View::fetch('Webshop/Templates/Winkelwagen', ['records' => $productArray]);
        
        return json_encode($table); 
    }

    public function orderCart(){
        $cart = Session::get('Cart');
        $cartItems = serialize($cart);
        $user = Session::get('userLoggedIn');
        $this->user->placeOrder($user[0]->c_id, $cartItems);
        Session::forget('Cart');
        return $this->messageHandling('success', 'Producten besteld!');
    }

    public function logout(){
        Session::flush();
        return Redirect::intended('/');
    }

    public function messageHandling($data, $message){
        if(!isset($message))
            $message = 'Er is een probleem opgetreden';
        return json_encode(array($data => $message));
    }

    
}
