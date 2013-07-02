<?php

@controller::checkAuthentication();

if (isset($_GET['id']))
    $eventId = $_GET['id'];
else
    $eventId = 1;

// Wenn nicht direkt von den Eventdetails kam, sondern vom Shopping Cart, dann irgendein event nehmen... 1 zB
// Ist zwar nicht schoen, aber die Aufteilung auf xml und db auch nicht...
// Abgesehen gibt's keine Unterscheidung bei den Sitzplaetzen, weil es auch nicht gefordert war

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
                
                echo "<form method='POST' action=".$_SERVER["PHP_SELF"].">";
                echo    "<div class='span15'>";
                echo        "</br>";
                echo        "<h2>Sum: € ".$sum."</h2>";
                echo        "</br>";
                echo        "<input type='hidden' name='order' value='tickets' />";
                echo        "<input type='submit' class='big' value='Order now!' />";
                echo    "</div>";
                echo "</form>";
                
                ?>
                
            </div>
        </div>
    </div>
</div>
