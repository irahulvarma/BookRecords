<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();
$routes->add('homepage', 
    new Route(
        constant('URL_SUBFOLDER').'/', 
        array('controller' => 'PageController', 'method' => 'homepage')
    )
);

$routes->add('searchbookbyauthor', 
    new Route(
        constant('URL_SUBFOLDER').'/getbooksbyauthorname/{name}', 
        array('controller' => 'PageController', 'method' => 'getBooksByAuthorName'),
        array('name' => '[A-Za-z]*')
    )
);