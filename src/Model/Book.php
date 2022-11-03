<?php
/**
 * Class Book
 * Stores Book record, and get book record
 */

namespace BookRecords\Model; 

class Book {

    //author id of the book
    private $author_id;

    //name of the book
    private $name;

    //Database connection
    private $dbconn;

    //name of the table where book records are stored
    private $table_name = 'books';

    //name of the author table
    private $author_table_name = 'authors';

    function __construct($dbconn, $author_id = null, $name = null)
    {
        $this->author_id = $author_id;
        $this->name = $name;
        $this->dbconn = $dbconn;
    }

    //store book record
    function store() 
    {
        $id = $this->getId($this->author_id, $this->name);

        if (!$id) {
            $stmt = "INSERT INTO $this->table_name (author_id, name) VALUES (:author_id, :name)";
            $id = $this->dbconn->insertTable($stmt, ['author_id' => $this->author_id, 'name' => $this->name]);
            
        }

        return $id;
    }

    //get book record by author id and name
    function getId($author_id, $name)
    {
        $query = "SELECT id FROM $this->table_name WHERE name = :name AND author_id = :author_id";
        $results = $this->dbconn->query($query, ['author_id' => $author_id, 'name' => $name], 'assoc');

        if (count($results) > 0) {

            return $results[0]['id'];
        }

        return false;
    }

    //search books by authorname
    function searchBooksbyAuthorName($name)
    {
        $name = "%$name%";
        
        $stmt = "SELECT ".
                "A.name, ".
                "B.name AS book_name ".
                "FROM $this->author_table_name AS A ".
                "JOIN $this->table_name AS B ON A.id = B.author_id ".
                "WHERE A.name LIKE :name ";

        $books = $this->dbconn->query($stmt, ['name' => $name], 'assoc');

        return $books;

    }
}