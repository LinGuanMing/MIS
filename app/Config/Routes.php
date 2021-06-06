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
$routes->setDefaultController('Login');
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
// $routes->get('/', 'Home::index');

// CRUD RESTful Routes
$routes->get('Emp', 'Emp::index');
$routes->get('addEmp', 'Emp::create');
$routes->post('submit-EmpForm', 'Emp::store');
$routes->get('editEmp/(:num)', 'Emp::singleEmp/$1');
$routes->post('updateEmp', 'Emp::update');
$routes->get('deleteEmp/(:num)', 'Emp::delete/$1');

$routes->get('Org', 'Org::index');
$routes->get('addOrg', 'Org::create');
$routes->post('submit-OrgForm', 'Org::store');
$routes->get('editOrg/(:num)', 'Org::singleOrg/$1');
$routes->post('updateOrg', 'Org::update');
$routes->get('deleteOrg/(:num)', 'Org::delete/$1');

$routes->get('Rule', 'Rule::index');
$routes->get('addRule', 'Rule::create');
$routes->post('submit-RuleForm', 'Rule::store');
$routes->get('editRule/(:any)', 'Rule::singleRule/$1');
$routes->post('updateRule', 'Rule::update');
$routes->get('deleteRule/(:any)', 'Rule::delete/$1');

$routes->post('Login/attend', 'Login::attend');

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
