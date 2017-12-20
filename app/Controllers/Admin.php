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
    public function dashboard(){
        return View::make('Admin/Dashboard')
            ->shares('title', 'Dashboard');
    }

    public function producten(){
        return View::make('Admin/Producten')
            ->shares('title', 'Producten');
    }

    public function logout(){
        Session::flush();
        return Redirect::intended('/');
    }

    public function loadProducts(){
        $products = $this->admin->getProducts();
        $table = View::fetch('Admin/Templates/Products', ['records' => $products]);
        return json_encode($table); 
    }

    public function addProduct(){
        if(!isset($_POST['titel'], $_POST['beschrijving'], $_POST['prijs'])){
            return $this->messageHandling('error', 'Er is een probleem opgetreden');
        }

        if(empty($_POST['titel']) || empty($_POST['beschrijving']) || empty($_POST['prijs'])){
            return $this->messageHandling('error', 'Vul alle velden in!');
        }

        $titel          = htmlentities($_POST['titel']);
        $beschrijving   = htmlentities($_POST['beschrijving']);
        $prijs          = htmlentities($_POST['prijs']);

        if($prijs < 0)
            return $this->messageHandling('error', 'Minimale prijs is €1,-');
        
        $data = array('p_title' => $titel, 'p_description' => $beschrijving, 'p_price' => $prijs);

        $this->admin->addProduct($data);

        return $this->messageHandling('success', 'Product toegevoegd!');
    }

    public function getProduct(){
        $id = $_POST['data-id'];
        $data = $this->admin->getProduct($id);
        return json_encode(array('id' => $data->p_id, 'titel' => $data->p_title, 'beschrijving' => $data->p_description, 'prijs' => $data->p_price));
    }

    public function updateProduct(){
        if(!isset($_POST['id'], $_POST['titel'], $_POST['beschrijving'], $_POST['prijs'])){
            return $this->messageHandling('error', 'Er is een probleem opgetreden');
        }

        if(empty($_POST['id']) ||empty($_POST['titel']) || empty($_POST['beschrijving']) || empty($_POST['prijs'])){
            return $this->messageHandling('error', 'Vul alle velden in!');
        }

        $id             = htmlentities($_POST['id']);
        $titel          = htmlentities($_POST['titel']);
        $beschrijving   = htmlentities($_POST['beschrijving']);
        $prijs          = htmlentities($_POST['prijs']);

        if($prijs < 0)
            return $this->messageHandling('error', 'Minimale prijs is €1,-');
        
        $data = array('p_title' => $titel, 'p_description' => $beschrijving, 'p_price' => $prijs);

        $this->admin->editProduct($id, $data);

        return $this->messageHandling('success', 'Product gewijzigd!');

    }

    public function deleteProduct(){
        $id = $_POST['data-id'];
        $this->admin->deleteProduct($id);
        return $this->messageHandling('success', 'Product verwijderd!');
    }

    public function messageHandling($data, $message){
        return json_encode(array($data => $message));
    }
    
}
