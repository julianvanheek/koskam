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

Route::get('logout', 'Admin@logout');

//pages
Route::get('/', 'Pages@Index');
Route::get('/login', 'Pages@login');
Route::get('/registreren', 'Pages@registreren');
Route::get('/dashboard', ['before' => 'auth.user', 'uses' => 'Pages@dashboard']);


// function routes
Route::post('/submitLogin', 'Index@login');
Route::post('/submitRegister', 'Index@register');

/** End define static routes */

/** Admin routes **/
Route::group(['prefix' => 'admin'], function() {
    Route::get('/dashboard', ['before' => 'auth.admin', 'uses' => 'Admin@dashboard']);

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
