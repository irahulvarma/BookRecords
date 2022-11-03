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

$routes->add('run_script',
    new Route(
        constant('URL_SUBFOLDER').'/run_script',
        array('controller' => 'PageController', 'method' => 'run_script')
    )
);