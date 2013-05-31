
<?php

@controller::checkAuthentication();

?>

<div class="page-header">
    <div class="page-header-content">
        <h1>
            Schedule
            <small>Find events in your area!</small>
        </h1>
        <a class="back-button big page-back" href="javascript:history.back()"></a>
    </div>
</div>
<div class="page-region">
    <div class="page-region-content">
        <div class="grid">
            <div class="grid">
                <div class="tiles clearfix">
                    
                    <?php
                    
                    function isMajor($event) {
                        if ($event->getIsMajor() == 1)
                            echo "double-vertical ";
                    }
                    
                    $events = controller::getEvents($_GET['search']);
                    
                    if (count($events) == 0)
                        echo "No events found! =(";
                    
                    foreach ($events as $event) {
                        echo "<form action='' method='GET'>";
                        echo    "<a href='javascript:;' onclick='parentNode.submit();'>";
                        echo        "<div class='tile double ",isMajor($event),"image-slider bg-color-".$event->getType()."' data-role='tile-slider' data-param-period='7000' data-param-duration='1000' data-param-direction='left'>";                    
                        echo            "<div class=\"tile-content\"><div class='padding10'><h2>"
                                            .$event->getName()."</h2>"
                                            .date("j F Y", strtotime($event->getDate()))."</br></br>"
                                            .$event->getType().
                                        "</div></div>";
                        echo            "<div class=\"tile-content\">";
                        echo                "<div class='padding10'><h3>".$event->getName()."</h3></div>";
                        echo                "<img src='" . $event->getImage() . "' />";
                        echo            "</div>";
                        echo        "</div>";
                        echo    "</a>";
                        echo    "<input type='hidden' name='content' value='".eventdetails."' />";
                        echo    "<input type='hidden' name='id' value='".$event->getId()."' />";
                        echo "</form>";
                    }
                    
                    ?>
                    
                </div>
                
                <?php
                
                if (controller::isAdmin()) {
                    echo "<div style='clear:both;margin-top:10px'>";
                    echo    "<form action='' method='GET'>";
                    echo        "<button type='submit' name='content' value='createevent'>Create new event</button>";
                    echo    "</form>";
                    echo "</div>";
                }
                        
                ?>
                
            </div>
        </div>
    </div>
</div>
