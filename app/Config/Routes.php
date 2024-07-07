<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index', ['filter' => 'auth']);

$routes->get('auth', 'Auth::index');
$routes->post('auth/login', 'Auth::login');
$routes->post('auth/register', 'Auth::register');
$routes->get('auth/logout', 'Auth::logout');

$routes->get('physical-activity', 'PhysicalActivityController::index', ['filter' => 'auth']);
$routes->get('physical-activity/create', 'PhysicalActivityController::create', ['filter' => 'auth']);
$routes->post('physical-activity/store', 'PhysicalActivityController::store', ['filter' => 'auth']);
$routes->get('physical-activity/edit', 'PhysicalActivityController::edit', ['filter' => 'auth']);
$routes->post('physical-activity/update', 'PhysicalActivityController::update', ['filter' => 'auth']);
$routes->get('physical-activity/delete', 'PhysicalActivityController::delete', ['filter' => 'auth']);

$routes->get('activity-level', 'ActivityLevelController::index', ['filter' => 'auth']);
$routes->get('activity-level/create', 'ActivityLevelController::create', ['filter' => 'auth']);
$routes->post('activity-level/store', 'ActivityLevelController::store', ['filter' => 'auth']);
$routes->get('activity-level/edit', 'ActivityLevelController::edit', ['filter' => 'auth']);
$routes->post('activity-level/update', 'ActivityLevelController::update', ['filter' => 'auth']);
$routes->get('activity-level/delete', 'ActivityLevelController::delete', ['filter' => 'auth']);

$routes->get('consumption', 'ConsumptionController::index', ['filter' => 'auth']);
$routes->get('consumption/create', 'ConsumptionController::create', ['filter' => 'auth']);
$routes->post('consumption/store', 'ConsumptionController::store', ['filter' => 'auth']);
$routes->get('consumption/edit', 'ConsumptionController::edit', ['filter' => 'auth']);
$routes->post('consumption/update', 'ConsumptionController::update', ['filter' => 'auth']);
$routes->get('consumption/delete', 'ConsumptionController::delete', ['filter' => 'auth']);

$routes->get('bmr', 'BmrController::index', ['filter' => 'auth']);
$routes->post('bmr/store', 'BmrController::store', ['filter' => 'auth']);

$routes->get('physical-activities', 'DisplayActivitiesController::index', ['filter' => 'auth']);


$routes->get('calorie-consumption', 'DailyConsumptionController::index', ['filter' => 'auth']);
$routes->post('calorie-consumption/calculate', 'DailyConsumptionController::calculate', ['filter' => 'auth']);