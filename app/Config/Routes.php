<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('lang/(:segment)', 'Language::switch/$1');

$routes->get('registro', 'Auth::registro');
$routes->post('registro', 'Auth::procesarRegistro');
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::procesarLogin');
$routes->get('logout', 'Auth::logout');
$routes->get('forgot-password', 'Auth::forgotPassword');
$routes->post('forgot-password', 'Auth::procesarForgotPassword');

$routes->group('perfil', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Perfil::index');
    $routes->get('confirmar-password', 'Perfil::confirmarPassword');
    $routes->post('confirmar-password', 'Perfil::procesarConfirmacionPassword');
    $routes->get('editar', 'Perfil::editar');
    $routes->post('actualizar', 'Perfil::actualizar');
    $routes->get('cambiar-password', 'Perfil::cambiarPassword');
    $routes->post('actualizar-password', 'Perfil::actualizarPassword');
    $routes->get('cambiar-imagen', 'Perfil::cambiarImagen');
    $routes->post('actualizar-imagen', 'Perfil::actualizarImagen');
    $routes->get('eliminar-imagen', 'Perfil::confirmarEliminarImagen');
    $routes->post('eliminar-imagen', 'Perfil::eliminarImagen');
});

$routes->group('usuarios', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Usuarios::index');
    $routes->get('nuevo', 'Usuarios::nuevo');
    $routes->post('guardar', 'Usuarios::guardar');
    $routes->get('(:num)', 'Usuarios::detalle/$1');
    $routes->get('editar/(:num)', 'Usuarios::editar/$1');
    $routes->post('actualizar/(:num)', 'Usuarios::actualizar/$1');
    $routes->get('eliminar/(:num)', 'Usuarios::eliminar/$1');
});
