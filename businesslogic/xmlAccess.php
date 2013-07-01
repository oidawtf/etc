<?php

class xmlAccess {

    const XMLPATH = "data/seats.xml";
    
    public function ReadSeats($path = NULL) {
        if ($path == NULL)
            $path = self::XMLPATH;
        
        $result = array();
            
        $xml = simplexml_load_file($path);
        foreach ($xml as $seat) {
            $result[] = new seat((integer)$seat['id'], (integer)$seat['row'], (string)$seat['name'], (string)$seat['status']);
        }
        
        return $result;
    }
    
    public function WriteSeats() {
        
    }
    
}

?>
