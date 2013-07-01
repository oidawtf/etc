<?php

function PrintSeatFree($seat, $event) {
    echo "<li id=".$seat->getId()." class='tile bg-color-".$event->getType()."' onclick=\"changeState('".$event->getId()."', '".$seat->getId()."', '".$seat->getStatus()."', false);\">";
    echo    "<div title='Click to reserve this seat' class='tile-content padding10'>";
    echo        "<h2>".$seat->getName()."</h2>";
    echo        "€ ".$event->getPrice();
    echo    "</div>";
    echo "</li>";
}

function PrintSeatSold($seat) {
    echo "<li id=".$seat->getId()." class='tile'>";
    echo    "<div title='Already sold' class='tile-content padding10'>";
    //echo        "<h2>SOLD</h2>";
    echo    "</div>";
    echo "</li>";
}

function PrintSeatReserved($seat, $event) {
    echo "<li id=".$seat->getId()." class='tile selected bg-color-".$event->getType()."' onclick=\"changeState('".$event->getId()."', '".$seat->getId()."', '".$seat->getStatus()."', false);\">";
    echo    "<div title='Reserved for you' class='tile-content padding10'>";
    echo        "<h2>".$seat->getName()."</h2>";
    echo        "€ ".$event->getPrice();
    echo    "</div>";
    echo "</li>";
}

function PrintSeatBooked($seat, $event) {
    echo "<li id=".$seat->getId()." class='tile booked' onclick=\"select(this, ".$event->getId().");\">";
    echo    "<div title='Booked by another person' class='tile-content padding10'>";
    echo        "<h2>".$seat->getName()."</h2>";
    echo        "€ ".$event->getPrice();
    echo    "</div>";
    echo "</li>";
}

?>
