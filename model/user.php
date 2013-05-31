<?php

class user {
    
    private $id;
    private $firstname;
    private $lastname;
    private $password;
    private $email;
    private $isAdmin;
    
    public function __construct($id, $firstname, $lastname, $password, $email, $isAdmin) {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->password = $password;
        $this->email = $email;
        $this->isAdmin = $isAdmin;
    }
    
    public function getName() {
        return $this->firstname." ".$this->lastname;
    }
    
    public function getFirstName() {
        return $this->firstname;
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function getLastName() {
        return $this->lastname;
    }
    
    public function getPassword() {
        return $this->password;
    }
    
    public function getEmail() {
        return $this->email;
    }
    
    public function isAdmin() {
        return $this->isAdmin;
    }
    
    public function verify($password) {
        return $this->password == $password;
    }
}
?>
