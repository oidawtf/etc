<?php

@controller::checkAuthentication();

if (isset($_GET['id']))
    $event = controller::getEvent($_GET['id']);

?>

<script>
    
    function getXmlHttpRequest()
    {
        var xmlhttp;

        if (window.XMLHttpRequest)  // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        else                        // code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

        return xmlhttp;
    }
    
    function OnSeatsLoad(eventId)
    {
        var xmlhttp = getXmlHttpRequest();
        var url = "ui/seats.php";
        var params = "eventId=" + eventId;

        xmlhttp.open("POST", url, true);

        xmlhttp.onreadystatechange = function()
        {
            if (xmlhttp.readyState===4 && xmlhttp.status===200)
                document.getElementById("seatlist").innerHTML=xmlhttp.responseText;
        };

        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.setRequestHeader("Content-length", params.length);
        xmlhttp.setRequestHeader("Connection", "close");

        xmlhttp.send(params);
    }
    
    setInterval(function(){
        OnSeatsLoad(<?php echo $event->getId(); ?>);
    },5000);
    
</script>

<div class="page-header">
    <div class="page-header-content">
        <h1>
            <?php echo $event->getName(); ?>
            <small>
                <?php
                
                switch ($event->getType()){
                    case 'theater':
                        echo 'What a great performance!';
                        break;
                    case 'cinema':
                        echo 'What a great movie!';
                        break;
                    case 'event':
                    default:
                        echo 'What a great event!';
                        break;
                }
                
                ?>
            </small>
        </h1>
        <a class="back-button big page-back" href="javascript:history.back()"></a>
    </div>
</div>
<div class="page-region">
    <div class="page-region-content">
        <div class="grid">
            <div class="grid">
                <div>
                    <div style="float:left">
                        <h2>
                            <?php echo date("j F Y, h:i a", strtotime($event->getDate())); ?>
                        </h2>
                    </div>
                    <div style="float:right" id="rating" data-param-rating="3" class="rating" data-role="rating">
                        <a class="rated" href="javascript:void(0)"></a>
                        <a class="rated" href="javascript:void(0)"></a>
                        <a class="rated" href="javascript:void(0)"></a>
                        <a class="" href="javascript:void(0)"></a>
                        <a class="" href="javascript:void(0)"></a>
                    </div>
                </div>
                <div style="clear:both;margin-top:80px">
                    <a href="<?php echo $event->getLink(); ?>">
                        <img style="margin-right:20px;margin-bottom:20px" align="left" width="450px" src="<?php echo $event->getImage(); ?>" />
                    </a>
                    <p>
                        <?php echo $event->getDescription(); ?>
                    </p>
                    </br>
                </div>
                <div>
                    <form method="GET" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                        <input type='hidden' name='content' value='cart' />
                        <input type='hidden' name='id' value='<?php echo $event->getId(); ?>' />
                        
                        <div id="seatlist" style="clear:both"></div>
                        
                        <button type="submit">
                            <i class="icon-cart"></i>
                            Add to shopping cart
                        </button>
                    </form>
                </div>
                
                <?php
                
                if (controller::isAdmin()) {
                    echo "<div>";
                    echo    "<form method='POST' action='".$_SERVER["PHP_SELF"]."'>";
                    echo        "<input type='hidden' name='delete' value='event' />";
                    echo        "<input type='hidden' name='id' value='".$event->getId()."' />";
                    echo        "<button type='submit'>";
                    echo            "<i class='icon-cancel-2'></i>";
                    echo            "Delete event";
                    echo        "</button>";
                    echo    "</form>";
                    echo    "<form method='GET' action='".$_SERVER["PHP_SELF"]."'>";
                    echo        "<input type='hidden' name='content' value='editevent' />";
                    echo        "<input type='hidden' name='id' value='".$event->getId()."' />";
                    echo        "<button type='submit'>";
                    echo            "<i class='icon-pencil'></i>";
                    echo            "Edit event";
                    echo        "</button>";
                    echo    "</form>";                    
                    echo "</div>";
                }
                
                echo "<script type='text/javascript'>";
                echo    "OnSeatsLoad(".$event->getId().");";
                echo "</script>";

                ?>        
                
            </div>
        </div>
    </div>
</div>
