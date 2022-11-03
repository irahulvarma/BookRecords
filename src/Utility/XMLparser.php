<?php
/**
 * Class to parse XML and perform manipulation 
 * and other functionalities
 */  

namespace BookRecords\Utility; 

class XMLparser {

    /**
     * derive records from the xml file passed
     *
     * @param string $file
     * @return array
     */
    public function deriveRecords($file = null) 
    {

        $data = [];        
        if ($file) {
            
            $xml = simplexml_load_file($file);            
            foreach ($xml->children() as $row) {
                $data[] = json_decode(json_encode($row));
            }
        }

        return $data;
    }
}
