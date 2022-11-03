<?php
/**
 * Create DB Schema
 */
namespace BookRecords\DB;
use BookRecords\DB\DBConnection;

class DBSchema
{

    //database connection
    private $dbconn;

    function __construct($dbconn)
    {
        $this->dbconn = $dbconn;
    }

    /**
     * Create Database schemas
     * for the application
     *
     * @return void
     */
    function createSchema()
    {
        $db_created = $this->createDB();

        if ($db_created) {
            $this->useDB();
            $this->createTables();
        }
        
    }

    //Create DB if exists
    function createDB()
    {
        $create_db = "CREATE DATABASE IF NOT EXISTS ".DB_DATABASE;
        return $this->dbconn->exec($create_db);
    }

    //use the DB
    function useDB()
    {
        $use_db = $sql = "use ".DB_DATABASE;
        return $this->dbconn->exec($use_db);
    }

    //create tables: authors, books
    function createTables()
    {
        $authors_table = "CREATE TABLE `authors` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `name` varchar(255) COLLATE utf8_unicode_520_ci DEFAULT NULL,
            PRIMARY KEY (`id`)
        );";

        $this->dbconn->exec($authors_table);

        $books_table = "CREATE TABLE `books` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `author_id` int(11) NOT NULL,
            `name` varchar(255) COLLATE utf8_unicode_520_ci NOT NULL,
            PRIMARY KEY (`id`),
            FOREIGN KEY (author_id)
                  REFERENCES authors(id)
                  ON DELETE CASCADE
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci";

        $this->dbconn->exec($books_table);
    }
}