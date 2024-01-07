<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

// app/Config/Routes.php
$routes->get('/', 'InvoiceController::index');
$routes->post('/invoice/generateInvoice', 'InvoiceController::generateInvoice');
