<?php

/**
 * ADD ALL THE CONFIGURATION PARAMETERS HERE
 */

define('DB_DRIVER', 'mysql');
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_DATABASE', 'book_records');
define('DIRECTORY_XML_FOLDER', dirname(__DIR__, 1).DIRECTORY_SEPARATOR.'books');
define('APP_ROOT', dirname(__DIR__, 1).DIRECTORY_SEPARATOR.'src');
define('URL_SUBFOLDER', 'BookRecords');