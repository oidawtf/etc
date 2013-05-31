<?php

class seat {
    
    private $id;
    private $row;
    private $name;
    private $status;
    
    public function __construct($id, $row, $name, $status) {
        $this->id = $id;
        $this->row = $row;
        $this->name = $name;
        $this->status = $status;
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function getRow() {
        return $this->row;
    }
     
    public function getName() {
        return $this->name;
    }
     
    public function getStatus() {
        return $this->status;
    }
    
    public function setStatus($status) {
        $this->status = $status;
    }
}

?>
