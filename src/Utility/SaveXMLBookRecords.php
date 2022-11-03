<?php

namespace BookRecords\Utility;

use BookRecords\DB\DBConnection;
use BookRecords\Model\Author;
use BookRecords\Model\Book;
use BookRecords\Utility\FileTypeIterator;
use BookRecords\Utility\XMLparser;

/**
 * Find folders and save Book records from XML files
 */
class SaveXMLBookRecords
{
    private $filepaths;
    private $booksinfo = [];
    private $directory;

    /**
     * pass the directory where xml files to be searched
     *
     * @param string $directory
     */
    public function __construct($directory)
    {
        $this->directory = $directory;
    }

    /**
     * 1. find xml paths
     * 2. find book records from xml
     * 3. save it to tables
     * @return void
     */
    public function run() 
    {
        $this->getXMLFilePaths();
        $this->getBookRecordsFromXMLFilepaths();
        $this->saveBookRecords();

    }

    //find xml paths
    public function getXMLFilePaths(): void
    {        
        $ft = new FileTypeIterator($this->directory, 'xml');
        $this->filepaths = $ft->getfilepaths();
    }

    //find book records
    public function getBookRecordsFromXMLFilepaths(): void
    {
        $xml_parser = new XMLparser();

        foreach ($this->filepaths as $path) {
            $data = $xml_parser->deriveRecords($path);
            $this->booksinfo = array_merge($this->booksinfo, $data);
        }

    }

    //save book and author
    public function saveBookRecords(): void
    {
        $dbconn = new DBConnection(DB_DRIVER, DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        foreach ($this->booksinfo as $res) {
            
            $author = new Author($dbconn, $res->author);
            $author_id = $author->store();

            $book = new Book($dbconn, $author_id, $res->name);
            $book_id = $book->store();
        }
    }
}