<?php

require_once "vendor/autoload.php";
require_once("config/parameters.php");

use BookRecords\Commands\ExecuteBooksXMLCommand;
use Symfony\Component\Console\Application;

$app = new Application();

$app->add(new ExecuteBooksXMLCommand());

$app->run();