<?php
/**
 * Helper file
 * for common functions
 */ 

namespace BookRecords\Controllers; 

use BookRecords\DB\DBConnection;
use BookRecords\DB\DBSchema;
use BookRecords\Model\Book;
use BookRecords\Utility\SaveXMLBookRecords;

class PageController {

    function __construct()
    {
    }

    /**
     * Opens homepage
     *
     * @return void
     */
    public function homepage()
    {
        require_once(APP_ROOT . '/Views/homepage.php');
    }

    /**
     * Find all the books through author name
     * search
     * @param string $name
     * @return JSON
     */
    public function getBooksByAuthorName($name)
    {

        $dbconn = new DBConnection(DB_DRIVER, DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        
        $book_obj = new Book($dbconn);

        $books = $book_obj->searchBooksbyAuthorName($name);
        
        echo json_encode($books);
    }

}