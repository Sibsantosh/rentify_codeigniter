<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
 
$routes->get('/', 'Home::index');
$routes->match(['GET','POST'],'/register', 'AuthenticationController::registrationPage');
$routes->match(['GET','POST'],'/login', 'AuthenticationController::loginPage');
$routes->match(['GET','POST'],'/dashboard','UserDashboard::index');
$routes->match(['GET','POST'],'/property/(:any)','UserDashboard::checkProperty/$1');
$routes->match(['GET','POST'],'/bookProperty','BookPropertyController::index');
$routes->match(['GET','POST'],'/confirmBookProperty','BookPropertyController::index');
$routes->match(['GET','POST'],'/cff','BookPropertyController::confirmBookPropery');
$routes->match(['GET','POST'],'/checkAvailability/(:any)','BookPropertyController::checkAvailabilityForSpecificProperty/$1');
//$routes->match(['GET','POST'],'/checkAvailability/(:any)','BookPropertyController::checkAvailabilityForSpecificProperty/$1');

