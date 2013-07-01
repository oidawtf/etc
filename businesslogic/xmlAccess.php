<?php

class xmlAccess {

    const XMLPATH = "../data/seats.xml";
    
    public function ReadSeats() {
        $result = array();
            
        $xml = simplexml_load_file(self::XMLPATH);    
        foreach ($xml as $seat) {
            $result[] = new seat((integer)$seat['id'], (integer)$seat['row'], (string)$seat['name'], (string)$seat['status']);
        }
        
        return $result;
    }
    
    public function WriteSeats() {
        
    }
    
}

?>
