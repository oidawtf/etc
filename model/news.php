<?php
class news {
    
    private $title;
    private $image;
    private $url;
    private $description;
    
    public function __construct($title, $image, $url, $description) {
        $this->title = $title;
        $this->image = $image;
        $this->url = $url;
        $this->description = $description;
    }
    
    public function getTitle() {
        return $this->title;
    }
    
    public function getImage() {
        return $this->image;
    }
    
    public function getUrl() {
        return $this->url;
    }
    
    public function getDescription() {
        return $this->description;
    }
}

?>
