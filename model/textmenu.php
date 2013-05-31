
<?php

class textmenu {
    
    private $name;
    private $placeholder;
    private $icon;
    private $url;
    
    public function __construct($name, $placeholder, $icon, $url) {
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->icon = $icon;
        $this->url = $url;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function getPlaceholder() {
        return $this->placeholder;
    }
    
    public function getIcon() {
        return $this->icon;
    }
    
    public function getUrl() {
        return $this->url;
    }
}

?>
