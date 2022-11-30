<?php

// websave routing
$routes->group('route', ['namespace' => 'Examples\Routes\Controllers'], function ($routes) {

	$routes->get( '/',             'RoutesController::index');
	$routes->get( 'new',           'RoutesController::new');
	$routes->post('create',        'RoutesController::create');
	$routes->get( '(:num)',        'RoutesController::show/$1');
	$routes->get( 'edit/(:num)',   'RoutesController::edit/$1');
	$routes->post('update/(:num)', 'RoutesController::update/$1');
	$routes->match(['get','post'], 'delete/(:num)', 'RoutesController::delete/$1');

});

// api version 0.1
$routes->group('api/0.1/route', ['namespace' => 'Examples\Routes\Controllers'], function ($routes) {

		// Method      Route                     Description
		// =========================================================

		// GET         /api/0.1/routes           Get all entities
		$routes->get(   '/',           'RoutesApiController::index');

		// GET         /api/0.1/routes/:id       Get a single entity
		$routes->get(   '(:num)',      'RoutesApiController::show/$1');

		// GET         /api/0.1/routes/:id/edit  Get a an editable single entity
		$routes->get(   '(:num)/edit', 'RoutesApiController::edit/$1');

		// GET         /api/0.1/routes/new       Get a new single entity with defaults
		$routes->get(   'new',         'RoutesApiController::new');

		// POST        /api/0.1/routes           Create a entity
		$routes->post(  '/',           'RoutesApiController::create');

		// PUT         /api/0.1/routes/:id       Update or Insert all attributes
		$routes->put(   '(:num)',      'RoutesApiController::upsert/$1');

		// PATCH       /api/0.1/routes/:id       Update only changed attributes
		$routes->patch( '(:num)',      'RoutesApiController::update/$1');

		// DELETE      /api/0.1/routes/:id       Delete a entity
		$routes->delete('(:num)',      'RoutesApiController::delete/$1');

	}
);