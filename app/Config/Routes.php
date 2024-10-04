<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->match(['GET','POST'],'/register', 'AuthenticationController::registrationPage');
$routes->match(['GET','POST'],'/login', 'AuthenticationController::loginPage');
$routes->match(['GET','POST'],'/dashboard','UserDashboard::index');
$routes->match(['GET','POST'],'/registered','RegistrationSuccessful::index');
$routes->match(['GET','POST'],'/delete/(:any)','RegistrationSuccessful::deleteUser/$1');
$routes->match(['GET','POST'],'/edit/(:any)','RegistrationSuccessful::editUser/$1');
$routes->match(['GET','POST'],'/property/(:any)','UserDashboard::checkProperty/$1');
$routes->match(['GET','POST'],'/bookProperty','BookPropertyController::index');
$routes->match(['GET','POST'],'/confirmBookProperty','BookPropertyController::index');
$routes->match(['GET','POST'],'/checkAvailability/(:any)','BookPropertyController::checkAvailabilityForSpecificProperty/$1');

