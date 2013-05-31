<?php

class menu {
    
    private $title;
    private $url;
    private $action;
    private $method;
    private $icon;
    private $image;
    private $submenu;
        
    public function __construct($title, $url, $action = '', $method = 'GET', $icon = NULL, $image = NULL, array $submenu = NULL) {
        $this->title = $title;
        $this->url = $url;
        $this->action = $action;
        $this->method = $method;
        $this->icon = $icon;
        $this->image = $image;
        $this->submenu = $submenu;
    }
    
    public function getTitle() {
        return $this->title;
    }
    
    public function getUrl() {
        return $this->url;
    }
    
    public function getAction() {
        return $this->action;
    }
    
    public function getMethod() {
        return $this->method;
    }
    
    public function getSubmenu() {
        return $this->submenu;
    }
    
    public function getIcon() {
        return $this->icon;
    }
    
    public function getImage() {
        return $this->image;
    }

    public static function getSeparator() {
        return '|';
    }
}

?>
