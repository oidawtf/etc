<?php

require '../includes.php';

if ($_POST && array_key_exists("eventId", $_POST))
    $eventId = $_POST["eventId"];

$event = controller::getEvent($eventId);
$sum = 0;

echo "<div class='span15'>";
echo    "</br>";
echo    "<h2>Choose your favorite seats</h2>";
echo    "</br>";
echo    "<div class='clearfix'>";
echo        "<ul>";
foreach (controller::GetSeats('../data/seats.xml') as $seat) {
    if ($seat->getStatus() == "reserved") {
        utils::PrintSeatReserved($seat, $event);
        $sum += $event->getPrice();
    }
    else if ($seat->getStatus() == "booked")
        utils::PrintSeatBooked($seat, $event);
    else if ($seat->getStatus() == "sold")
        utils::PrintSeatSold($seat);
    else
        utils::PrintSeatFree($seat, $event);
}
echo        "</ul>";
echo    "</div>";
echo    "</br>";
echo    "<h2>Sum: € ".$sum."</h2>";
echo "</div>";
echo "</br>";

?>
