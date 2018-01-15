<?php

/**
 * Routes - all standard Routes are defined here.
 *
 * @author David Carr - dave@daveismyname.com
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 3.0
 *
 */

use Nova\Http\Request;


/** Define static routes. */

Route::pattern('product', '(\w+)');

Route::get('logout', 'Admin@logout');

//pages
Route::get('/', 'Pages@index');
Route::get('/producten', 'Pages@producten');
Route::get('/opleidingen', 'Pages@opleidingen');
Route::get('/contact', 'Pages@contact');
Route::get('/registreren', 'Pages@registreren');
Route::get('/wachtwoordVergeten', 'Pages@wachtwoordVergeten');

// function routes
Route::post('/submitLogin', 'Index@login');
Route::post('/sendRegister', 'Index@register');


// create account
Route::any('/createAccount', 'Index@createAcc');

/** End define static routes */

/** Webshop routes **/
Route::group(['before' => 'auth.user'], function() {
    Route::get('/webshop', 'Webshop@dashboard');
    Route::post('/loadAccountDetails', 'Webshop@loadAccountDetails');
    // Route::post('/loadAccountMessages', 'Webshop@loadAccountMessages');
    Route::post('/loadCompanyDetails', 'Webshop@loadCompanyDetails');
    Route::post('/submitUserDetails', 'Webshop@submitUserDetails');

    // products
    Route::post('/submitSearch', 'Webshop@submitSearch');
    Route::post('/loadProducts', 'Webshop@loadProducts');

    // winkelwagen
    Route::post('/addProductToCart', 'Webshop@addProductToCart');
    Route::post('/deleteProduct', 'Webshop@removeProductFromCart');
    Route::post('/countCartItems', 'Webshop@countCartItems');
    Route::post('/loadCart', 'Webshop@loadCart');
    Route::post('/orderCart', 'Webshop@orderCart');
});

Route::group(['prefix' => 'webshop', 'before' => 'auth.user'], function() {
    Route::get('/account', 'Webshop@account');
    Route::get('/berichtencentrum', 'Webshop@berichtenCentrum');
    Route::get('/gegevens-bijwerken', 'Webshop@gegevensBijwerken');
    Route::get('/producten', 'Webshop@products');
    Route::get('/producten/{product}', 'Webshop@products');
    Route::get('/winkelwagen', 'Webshop@winkelwagen');
});
/** End webshop routes **/

/** Admin routes **/
Route::group(['prefix' => 'admin', 'before' => 'auth.admin'], function() {
    // Pages
    Route::get('/dashboard', 'Admin@dashboard');
    Route::get('/producten', 'Admin@producten');
    Route::get('/bedrijven', 'Admin@bedrijven');
    Route::get('/gebruikers', 'Admin@gebruikers');

    // Functions

        //Dashboard
        Route::post('loadDashboard', 'Admin@loadDashboard');

        //Products
        Route::post('loadProducts', 'Admin@loadProducts');
        Route::post('addProduct', 'Admin@addProduct');
        Route::post('getProduct', 'Admin@getProduct');
        Route::post('updateProduct', 'Admin@updateProduct');
        Route::post('deleteProduct', 'Admin@deleteProduct');

        //Companies
        Route::post('loadCompanies', 'Admin@loadCompanies');
        Route::post('addCompany', 'Admin@addCompany');
        Route::post('getCompany', 'Admin@getCompany');
        Route::post('updateCompany', 'Admin@updateCompany');
        Route::post('deleteCompany', 'Admin@deleteCompany');
        Route::post('companyCreateUser', 'Admin@companyCreateUser');
        Route::post('getCompanyUsers', 'Admin@getCompanyUsers');

        //Accounts
        Route::post('loadAccounts', 'Admin@loadAccounts');
        
});
/** End admin routes **/

// The API Routes
Route::get('api/user', array('before' => 'auth:api', function (Request $request)
{
    return $request->user();
}));


// The Language Changer
Route::get('language/{language}', function (Request $request, $language)
{
    $url = Config::get('app.url');

    $languages = Config::get('languages');

    if (array_key_exists($language, $languages) && Str::startsWith($request->header('referer'), $url)) {
        Session::set('language', $language);

        // Store also the current Language in a Cookie lasting five years.
        Cookie::queue(PREFIX .'language', $language, Cookie::FIVEYEARS);
    }

    return Redirect::back();

})->where('language', '([a-z]{2})');


// Show the PHP information
Route::get('phpinfo', function ()
{
    ob_start();

    phpinfo();

    return Response::make(ob_get_clean(), 200);
});

/** End default Routes */
