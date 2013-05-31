<?php

require '../includes.php';

function PrintSeatFree($seat, $event) {
    echo "<li id=".$seat->getId()." class='tile bg-color-".$event->getType()."' onclick=\"changeState(".$seat->getId().", '".$seat->getStatus()."');\">";
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
    echo "<li id=".$seat->getId()." class='tile selected bg-color-".$event->getType()."' onclick=\"changeState(".$seat->getId().", '".$seat->getStatus()."');\">";
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

if ($_POST && array_key_exists("eventId", $_POST))
    $eventId = $_POST["eventId"];

$event = controller::getEvent($eventId);
$sum = 0;

echo "<div class='span15'>";
echo    "</br>";
echo    "<h2>Choose your favorite seats</h2>";
echo    "</br>";
echo    "<div class='clearfix'>";
echo        "<u1>";
foreach (controller::GetSeats() as $seat) {
    if ($seat->getStatus() == "reserved") {
        PrintSeatReserved($seat, $event);
        $sum += $event->getPrice();
    }
    else if ($seat->getStatus() == "booked")
        PrintSeatBooked($seat, $event);
    else if ($seat->getStatus() == "sold")
        PrintSeatSold($seat);
    else
        PrintSeatFree($seat, $event);
}
echo        "</u1>";
echo    "</div>";
echo    "</br>";
echo    "<h2>Sum: € ".$sum."</h2>";
echo "</div>";
echo "</br>";

?>
