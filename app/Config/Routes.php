<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Dashboard');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//$routes->get('/', 'Home::index');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

$routes->post('/auth/check', 'Auth::check');
//$routes->get('auth/viewuser/(:num)','Auth::viewUser/$id');


$routes->group('',['filter' => 'AuthCheck'], function($routes){
    $routes->get('/dashboard', 'Dashboard::index');
    $routes->get('/', 'Dashboard::index');
    $routes->get('/auth/logout', 'Auth::logout');
    $routes->get('/user', 'Auth::getUser');
    $routes->get('/user/viewuser/(:num)', 'Auth::viewUserDetails/$1');
    $routes->get('/auth/register', 'Auth::Register');
    $routes->post('/auth/save', 'Auth::save');
    
});

$routes->group('',['filter' => 'AlreadyLoggedIn'], function($routes){
    $routes->get('/auth', 'Auth::index');
});

$routes->group('demo', function ($routes){
    $routes->get('action1', 'Demo::index');
    $routes->get('action2', 'Demo::index2');
    $routes->post('action2', 'Demo::index2_post');
    $routes->get('action3/(:num)', 'Demo::index3/$1');
    $routes->get('action4/(:any)/(:any)', 'Demo::index4/$1/$2');
});

$routes->group("user",function($routes){
    $routes->get('home','UserController::index',['as' => 'user.home']);
});
$routes->group("roles",function($routes){
    $routes->get('','RolesController::index',['as' => 'roles']);
    $routes->post('save','RolesController::SaveRole',['as' => 'roles.save']);
    $routes->get('create','RolesController::createRole',['as' => 'roles.create']);
    $routes->get('edit/(:num)','RolesController::editRole/$1',['as' => 'roles.edit']);
    $routes->post('update','RolesController::updateRole',['as' => 'roles.update']);
    $routes->get('delete/(:num)','RolesController::deleteRole/$1',['as' => 'roles.delete']);
});
