<?php

@controller::checkAuthentication();

?>

<script>
    function select(obj, id) {
        document.getElementById(id).className = "tile padding4";
    }
</script>

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
                
                if (isset($_SESSION[controller::sessionIDEvents])) {
                    foreach ($_SESSION[controller::sessionIDEvents] as $key => $value) {
                        $sum = 0;
                        $event = controller::getEvent($key);
                        echo "<div class='span15'>";
                        echo    "<h2>".$event->getName()."</h2>";
                        echo        "<div class='clearfix'>";
                        for ($i = 0; $i < $value; $i++) {
                            $sum += $event->getPrice();
                            $id = "'event_".$event->getId()."_".$i."'";
                            echo            "<u1>";
                            echo                "<li id=".$id." class='tile selected bg-color-".$event->getType()."' onclick=\"select(this, ".$id.");\">";
                            echo                    "<div class='tile-content padding10'>";
                            echo                        "€ ".$event->getPrice();
                            echo                        "<h2>A3</h2>";
                            echo                    "</div>";
                            echo                "</li>";
                            echo            "</u1>";
                        }
                        echo        "</div>";
                        echo "</div>";
                    }
                    
                    echo "<div class='span15'>";
                    echo    "</br>";
                    echo    "<h2>Sum: € ".$sum."</h2>";
                    echo    "</br>";
                    echo    "<button class='big'>Order now!</button>";
                    echo "</div>";
                }
                else
                    echo "No cart items";
                
                ?>
                
            </div>
        </div>
    </div>
</div>
