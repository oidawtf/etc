<?php

class xmlAccess {

    // W/ Ajax request different root from where to find location
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
    
    public function WriteSeats($seats, $path = NULL) {
        if ($path == NULL)
            $path = self::XMLPATH;
        
        $xml = simplexml_load_file($path);
        
        foreach ($xml as $seat)
            switch ($seats[(integer)$seat['id']]->getStatus()) {
                case "sold":
                case "reserved":
                    $seat['status'] = "sold";
                    break;
                default:
                    $seat['status'] = "free";
                    break;
            }
        
        $xml->asXml($path);
    }
    
}

?>
