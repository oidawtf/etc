<?php

@controller::checkAuthentication();

if (!isset($_GET['id']))
    return;

$eventId = $_GET['id'];

?>

<div class="page-header">
    <div class="page-header-content">
        <h1>
            Shopping Cart
            <small>Your recent events you wanna go to...</small>
        </h1>
        <a class="back-button big page-back" href="javascript:history.back()"></a>
    </div>
</div>
<div class="page-region">
    <div class="page-region-content">
        <div class="grid">
            <div class="grid">
                
                <?php
                
                $seats = controller::GetSeats();
                $event = controller::getEvent($eventId);                
                $sum = 0;
                
                echo "<div class='span15'>";
                echo    "<h2>".$event->getName()."</h2>";
                echo    "<div class='clearfix'>";
                echo        "<ul>";
                
                foreach ($seats as $seat) {
                    if ($seat->getStatus() == "reserved") {
                        PrintSeatReserved($seat, $event);
                        $sum += $event->getPrice();
                    }
                }
                echo        "</ul>";
                echo    "</div>";
                echo "</div>";
                
                echo "<div class='span15'>";
                echo    "</br>";
                echo    "<h2>Sum: € ".$sum."</h2>";
                echo    "</br>";
                echo    "<button class='big'>Order now!</button>";
                echo "</div>";
                
                ?>
                
            </div>
        </div>
    </div>
</div>
