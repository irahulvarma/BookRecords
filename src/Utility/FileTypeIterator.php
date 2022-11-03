<?php
/**
 * Iterates all the sub folders into root folder
 * and finds the mentioned extension name
 */

namespace BookRecords\Utility;

class FileTypeIterator {

    private  $root_directory;

    private $extention;

    function __construct($root_directory = null, $extention = null)
    {
        $this->root_directory = $root_directory;
        $this->extention = $extention;
    }

    /**
     * Recursively get filepaths of mentioned
     * extensions inside available directories
     * @return array
     */
    function getfilepaths( ) 
    {

        $data = [];
        
        if ($this->extention && $this->root_directory) {
            
            $dir = new \RecursiveDirectoryIterator($this->root_directory);
           
            foreach (new \RecursiveIteratorIterator($dir) as $filename => $file) {
                
                if (strpos($file->getFileName(), '.'.$this->extention)) {
                    $data[] = $file->getPathName();
                }                
            }
        }

        return $data;
    }
}