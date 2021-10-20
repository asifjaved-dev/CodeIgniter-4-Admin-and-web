<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Users');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('admin', 'Users::index',['filter' => 'noauth']);
$routes->get('logout', 'Users::logout');

$routes->get('blog', 'Blog::index');
$routes->get('/', 'Home::index');
$routes->get('blog/create', 'blog::create');
$routes->post('blog/store', 'blog::store');
$routes->get('blog/(:any)', 'blog::post/$1');
$routes->match(['get','post'],'editblog/(:num)', 'Blog::editblog/$1');
$routes->match(['get','post'],'Blog/(:any)', 'Blog::editblog/$1');

$routes->get('blogtable', 'Blog::blogtable',['filter' => 'auth']);
$routes->get('blogtable/delete/(:num)', 'Blog::delete/$1',['filter' => 'auth']);
$routes->get('blogtable/published/(:num)', 'Blog::published_post/$1');
$routes->get('blogtable/unpublished/(:num)', 'Blog::unpublished_post/$1');

$routes->match(['get','post'],'contactus', 'Contacts::contactus');
$routes->match(['get','post'],'register', 'Users::register',['filter' => 'noauth']);
$routes->match(['get','post'],'profile_info', 'Users::profile_info');
$routes->get('profile', 'Users::profile',['filter' => 'auth']);

$routes->get('dashboard', 'dashboard::index',['filter' => 'auth']);
$routes->get('contact_us', 'Contacts::index',['filter' => 'auth']);
$routes->get('contact_us/delete/(:num)', 'Contacts::delete/$1',['filter' => 'auth']);
$routes->get('employee', 'Users::employee',['filter' => 'auth']);

$routes->get('products', 'Products::index');
$routes->get('products', 'Products::post');
$routes->get('products/add', 'Products::add');
$routes->post('products/store', 'Products::store');
$routes->get('products/(:num)', 'Products::detail/$1');
$routes->get('product_table', 'Products::product_table',['filter' => 'auth']);
$routes->get('product_table/delete/(:num)', 'Products::delete/$1',['filter' => 'auth']);
$routes->get('product_table/published/(:num)', 'Products::published_post/$1');
$routes->get('product_table/unpublished/(:num)', 'Products::unpublished_post/$1');
$routes->match(['get','post'],'product_edit/(:num)', 'Products::product_edit/$1');
$routes->match(['get','post'],'Products/(:any)', 'Products::editblog/$1');

$routes->match(['get','post'],'checkout', 'Products::checkout');

$routes->get('cart', 'Products::cart');
$routes->get("paymentform/(:num)", "Products::stripe/$1");
// $routes->get("paymentform", "StripeController::stripe");
$routes->post("payment/(:num)", "StripeController::payment/$1");
$routes->get("paymentsuccess/(:num)", "StripeController::success/$1");
// $routes->get('/', 'Stripe::index');

// $routes->get('customer/login', 'Customers::login');
$routes->match(['get','post'],'customer/login', 'Customers::login');
$routes->match(['get','post'],'signup', 'Customers::signup');


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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
