<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Router\RouteCollection;

$routes = Services::routes();

$routes->get('/', 'HomeController::index');  

$routes->get('/login', 'AuthController::login');         
$routes->post('/authenticate', 'AuthController::authenticate'); 
$routes->get('/logout', 'AuthController::logout');       

$routes->get('/register', 'RegisterController::index');  
$routes->post('/register/store', 'RegisterController::store');
$routes->get('/create-password', 'CreatePasswordController::index');   
$routes->post('/create-password/store', 'CreatePasswordController::store');

$routes->get('/index', 'HomeController::index'); 

$routes->get('/checkout', 'CheckoutController::index' );
$routes->post('checkout/submit', 'CheckoutController::submit');
$routes->get('/myflights', 'MyFlightsController::index');
$routes->post('myflights/confirmAction', 'MyFlightsController::confirmAction');
$routes->get('/myprofile', 'MyProfileController::index');

$routes->get('admin/users', 'AdminController::getAllUsers'); 
$routes->get('admin/payments', 'AdminController::getAllPayments'); 
$routes->get('admin/bookings', 'AdminController::getAllBookings'); 
$routes->get('admin/flights', 'AdminController::getAllFlights');
$routes->post('admin/addFlight', 'AdminController::addFlight');
$routes->post('myprofile/update', 'MyProfileController::update');
$routes->post('admin/updateFlight', 'AdminController::updateFlight');
$routes->post('admin/deleteFlights/(:num)', 'AdminController::deleteFlight/$1');
$routes->post('admin/update-user/(:num)', 'AdminController::updateUser/$1');
$routes->post('admin/delete-user/(:num)', 'AdminController::deleteUser/$1');
$routes->put('/admin/updateInquiryStatus/(:num)/(:num)', 'AdminController::updateInquiryStatus/$1/$2');
$routes->delete('/admin/deleteInquiry/(:num)', 'AdminController::deleteInquiry/$1');
$routes->delete('/admin/deleteBooking/(:num)', 'AdminController::deleteBooking/$1');


$routes->get('/admin/payments', 'AdminController::payments'); 
$routes->get('/admin/bookings', 'AdminController::bookings'); 
$routes->get('/admin/flights', 'AdminController::flights'); 

$routes->get('about-us', 'AboutUsController::index');  
$routes->get('contact', 'ContactController::index');  
