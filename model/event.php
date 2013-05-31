<?php

class event {
    
    private $id;
    private $name;
    private $date;
    private $image;
    private $description;
    private $link;
    private $type;
    private $isMajor;
    private $price;
    
    public function __construct(
            $id,
            $name,
            $date,
            $image,
            $description,
            $link,
            $type,
            $isMajor,
            $price
            )
    {
        $this->id = $id;
        $this->name = $name;
        $this->date = $date;
        $this->image = $image;
        $this->description = $description;
        $this->link = $link;
        $this->type = $type;
        $this->isMajor = $isMajor;
        $this->price = $price;
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function getDate() {
        return $this->date;
    }
    
    public function getImage() {
        return $this->image;
    }
    
    public function getDescription() {
        return $this->description;
    }
    
    public function getLink() {
        return $this->link;
    }
    
    public function getType() {
        return $this->type;
    }
    
    public function getIsMajor() {
        return $this->isMajor;
    }
    
    public function getPrice() {
        return $this->price;
    }
    
    public function contains($str)
    {
        $a1 = strtolower($this->getName());
        $b1 = strtolower($str);
        return strlen(strpos($a1,$b1)) > 0 ? 1 : 0;
    }
}

?>
