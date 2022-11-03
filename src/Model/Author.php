<?php
/**
 * Model : Class Author 
 * Saves author data, fetch author record
 */

namespace BookRecords\Model; 

class Author 
{
    //name of the author
    private $name;

    //name of the table where author records exist
    private $table_name = 'authors';

    //Database connection
    private $dbconn;

    function __construct($dbconn, $name)
    {
        $this->name = $name;
        $this->dbconn = $dbconn;
    }

    //save author record
    function store() 
    {
        $id = $this->getId($this->name);

        if (!$id) {
            $stmt = "INSERT INTO $this->table_name (name) VALUES (:name)";
            $id = $this->dbconn->insertTable($stmt, ['name' => $this->name]);
            
        }

        return $id;
    }

    //get author record by name
    function getId($name)
    {
        $query = "SELECT id FROM $this->table_name WHERE name = :name";
        $results = $this->dbconn->query($query, ['name' => $name], 'assoc');

        if (count($results) > 0) {

            return $results[0]['id'];
        }

        return false;
    }
}